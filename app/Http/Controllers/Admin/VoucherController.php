<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChartAccount;
use App\Models\Currency;
use App\Models\DocsCompanyWise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Voucher;
use App\Models\VoucherAccountDetail;
use Yajra\DataTables\Facades\DataTables;

class VoucherController extends Controller
{
    protected $permissions;
    protected $name;
    protected $nav_id;

    public function __construct()
    {
        $this->name = "Voucher";
        $this->nav_id = 'voucher';
    }

    public function create(Request $request)
    {
        $user_info = session()->get('user_info');

        if ($request->ajax()) {
            $query = Voucher::with('company')->where('company_id', $user_info['company_id']);
            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['voucher_no'] = DocsCompanyWise::getDocNumber($user_info['company_id'], $user_info['fiscal_year_id'], $this->name);

        $data['seo_title']      = "Voucher";
        $data['seo_desc']       = "Voucher";
        $data['seo_keywords']   = "Voucher";
        $data['page_title'] = "Voucher";
        $data['user_info'] = $user_info;

        $data['currencies'] = Currency::orderBy('name', 'ASC')->get();
        $data['chart_accounts'] = ChartAccount::where('allow_voucher_entry', 1)->orderBy('acc_code', 'ASC')->get();

        return view('admin.voucher.create', $data);
    }

    public function edit($id)
    {
        $data['seo_title']      = "Edit Voucher";
        $data['seo_desc']       = "Edit Voucher";
        $data['seo_keywords']   = "Edit Voucher";
        $data['page_title'] = "Edit Voucher";
        $data['voucher'] = Voucher::where("id", $id)->first();
        return view('admin.voucher.edit', $data);
    }

    public function delete($id)
    {
        $developer = Voucher::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Voucher Deleted Successfully.'];
        return back()->withNotify($notify);
    }

    private function voucher_validation($request)
    {
        $request->validate([
            'voucher_no'        => 'required|string|max:30',
            'date'              => 'required|date',
            'type'              => 'required|string|max:50',
            'company_id'        => 'required|integer',
            'settlement'        => 'nullable|string|max:100',
            'cost_center'       => 'nullable|string|max:50',
            'bank_sub_type'     => 'nullable|string|max:100',
            'currency_id'       => 'required|integer',
            'exchange_rate'     => 'nullable|string|max:50',
            'cheque_no'         => 'nullable|string|max:150',
            'cheque_date'       => 'nullable|date',
            'pay_to'           => 'nullable|string|max:150',
            'print_on_letter_head' => 'nullable|boolean',
            'extended_voucher'     => 'nullable|boolean',
            'debit'            => 'nullable|string|max:50',
            'credit'           => 'nullable|string|max:50',
            'net_amount'       => 'nullable|string|max:50',
            'show_narration'   => 'nullable|boolean',
            'receipt_check'    => 'nullable|boolean',
            'narration_check'  => 'nullable|boolean',
            'apply_check'      => 'nullable|boolean',
            'remark'           => 'nullable|string',
            'drawn_at'         => 'nullable|string',

            // Account Detail
            'detail_acc_code.*'    => 'required|integer|exists:chart_accounts,id',
            'detail_cost_center.*' => 'nullable|string|max:100',
            'detail_debit_vc.*'    => 'nullable|numeric|min:0',
            'detail_credit_vc.*'   => 'nullable|numeric|min:0',
            'detail_debit_lc.*'    => 'nullable|numeric|min:0',
            'detail_credit_lc.*'   => 'nullable|numeric|min:0',
            'detail_narration.*'   => 'nullable|string|max:250',
        ]);
    }

    public function store(Request $request)
    {
        $user_info = session()->get('user_info');
        $this->voucher_validation($request);

        try {
            DB::beginTransaction();
            $voucher_no = DocsCompanyWise::getDocNumber($user_info['company_id'], $user_info['fiscal_year_id'], $this->name, true);

            $voucher = new Voucher();
            $voucher->fill($request->all());
            $voucher->voucher_no = $voucher_no;
            $voucher->save();

            // save voucher detail
            $this->save_voucher_detail($request, $voucher->id);

            DB::commit();
            $notify[] = ['success', 'Voucher created successfully.'];
        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['error', $e->getLine() . ': ' . $e->getMessage()];
        }

        return redirect()->route('admin.voucher.create')->withNotify($notify);
    }

    public function update(Request $request)
    {
        $this->voucher_validation($request);

        try {
            DB::beginTransaction();

            $voucher = Voucher::where("id", $request->id)->first();
            $voucher->fill($request->all());
            $voucher->save();

            // save voucher detail
            $this->save_voucher_detail($request, $voucher->id);

            DB::commit();
            $notify[] = ['success', 'Voucher updated successfully.'];
        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['error', $e->getLine() . ': ' . $e->getMessage()];
        }

        return redirect()->route('admin.voucher.create')->withNotify($notify);
    }

    public function save_voucher_detail($request, $voucher_id)
    {
        $detail_acc_code = $request->detail_acc_code ?? [];
        $ids = [];

        if (count($detail_acc_code) == 0) {
            return;
        }

        foreach ($detail_acc_code as $key => $value) {
            if (empty($value)) {
                continue;
            }

            $voucher_detail = VoucherAccountDetail::where('id', $request->detail_id[$key])->first();

            if (!$voucher_detail) {
                $voucher_detail = new VoucherAccountDetail();
                $voucher_detail->voucher_id = $voucher_id;
            }

            $voucher_detail->account_id = $request->detail_acc_code[$key];
            $voucher_detail->cost_center = $request->detail_cost_center[$key];
            $voucher_detail->debit_vc = $request->detail_debit_vc[$key];
            $voucher_detail->credit_vc = $request->detail_credit_vc[$key];
            $voucher_detail->debit_lc = $request->detail_debit_lc[$key];
            $voucher_detail->credit_lc = $request->detail_credit_lc[$key];
            $voucher_detail->narration = $request->detail_narration[$key];
            $voucher_detail->save();

            $ids[] = $voucher_detail->id;
        }

        VoucherAccountDetail::where('voucher_id', $voucher_id)->whereNotIn('id', $ids)->delete();
    }

    public function get_data(Request $request)
    {
        $user_info = session()->get('user_info');
        $id = $request->id;
        $type = $request->type;
        $data = Voucher::with(['company', 'currency', 'account_details'])->where('company_id', $user_info['company_id']);

        if ($type == "first") {
            $data = $data->orderBy('id', 'asc');
        } else if ($type == "last") {
            $data = $data->orderBy('id', 'desc');
        } else if ($type == "forward") {
            $data = $data->where('id', '>', $id);
        } else if ($type == "backward") {
            $data = $data->where('id', '<', $id)->orderBy('id', 'desc');
        }

        return $data->first();
    }
}
