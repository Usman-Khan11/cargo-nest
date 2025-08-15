<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChartAccount;
use App\Models\Currency;
use App\Models\DocsCompanyWise;
use App\Models\GlBill;
use App\Models\GlBillInvoiceDetail;
use App\Models\PartyBasicInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class GlBillController extends Controller
{
    protected $permissions;
    protected $name;
    protected $nav_id;

    public function __construct()
    {
        $this->name = "Bill";
        $this->nav_id = 'bill';
    }

    public function create(Request $request)
    {
        $user_info = session()->get('user_info');

        if ($request->ajax()) {
            $query = GlBill::with(['invoice_details', 'currency', 'company']);
            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['bill_no'] = DocsCompanyWise::getDocNumber($user_info['company_id'], $user_info['fiscal_year_id'], $this->name);

        $data['seo_title']      = "Bill";
        $data['seo_desc']       = "Bill";
        $data['seo_keywords']   = "Bill";
        $data['page_title'] = "Bill";
        $data['user_info'] = $user_info;

        $data['vendors'] = PartyBasicInfo::where('party_type', 'vendor')->orderBy('party_name', 'ASC')->get();
        $data['currencies'] = Currency::orderBy('name', 'ASC')->get();
        $data['chart_accounts'] = ChartAccount::where('allow_voucher_entry', 1)->orderBy('acc_code', 'ASC')->get();

        return view('admin.gl_bill.create', $data);
    }

    public function delete($id)
    {
        $developer = GlBill::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'GL Bill Deleted Successfully.'];
        return back()->withNotify($notify);
    }

    private function bill_validation($request)
    {
        $request->validate([
            'voucher_no' => 'required|string|max:20',
            'bill_no' => 'required|string|max:20',
            'gst_invoice_no' => 'required|string|max:20',
            'date' => 'required|date',
            'vendor_bill_date' => 'nullable|date',
            'due_date' => 'required|date',
            'vendor_id' => 'required|integer|exists:party_basic_infos,id',
            'company_id' => 'required|integer|exists:sub_company,id',
            'balance' => 'nullable|numeric|min:0.000001|max:999999999999.999999',
            'cost_center' => 'nullable|string|max:30',
            'currency_id' => 'required|integer|exists:currencies,id',
            'exchange_rate' => 'required|numeric|min:1|max:999999999999.999999',
            'print_on' => 'nullable|string|max:25',
            'narration' => 'nullable|string|max:1000',
            'invoice_amount' => 'required|numeric|min:0|max:999999999999.999999',
            'tax_amount' => 'required|numeric|min:0|max:999999999999.999999',
            'net_amount' => 'required|numeric|min:0|max:999999999999.999999',

            // Invoice Detail
            'detail_acc_code.*'    => 'required|integer|exists:chart_accounts,id',
            'detail_cost_center.*' => 'nullable|string|max:100',
            'detail_dr_cr.*'       => 'nullable|string|max:10',
            'detail_amount_vc.*'   => 'nullable|numeric|min:0',
            'detail_amount_lc.*'   => 'nullable|numeric|min:0',
            'detail_narration.*'   => 'nullable|string|max:250',
            'detail_tax_type.*'    => 'nullable|string|max:50',
        ]);
    }

    public function store(Request $request)
    {
        $user_info = session()->get('user_info');
        $this->bill_validation($request);

        try {
            DB::beginTransaction();
            $bill_no = DocsCompanyWise::getDocNumber($user_info['company_id'], $user_info['fiscal_year_id'], $this->name, true);

            $gl_bill = new GlBill();
            $gl_bill->fill($request->all());
            $gl_bill->voucher_no = $bill_no;
            $gl_bill->bill_no = $bill_no;
            $gl_bill->gst_invoice_no = $bill_no;
            $gl_bill->save();

            // save invoice detail
            $this->save_invoice_detail($request, $gl_bill->id);

            DB::commit();
            $notify[] = ['success', 'Bill created successfully.'];
        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['error', $e->getLine() . ': ' . $e->getMessage()];
        }

        return redirect()->route('admin.gl_bill.create')->withNotify($notify);
    }

    public function update(Request $request)
    {
        $this->bill_validation($request);

        $gl_bill = GlBill::where("id", $request->id)->first();
        try {
            DB::beginTransaction();

            $gl_bill = GlBill::where("id", $request->id)->first();
            $gl_bill->fill($request->all());
            $gl_bill->save();

            // save invoice detail
            $this->save_invoice_detail($request, $gl_bill->id);

            DB::commit();
            $notify[] = ['success', 'Bill updated successfully.'];
        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['error', $e->getLine() . ': ' . $e->getMessage()];
        }

        return redirect()->route('admin.gl_bill.create')->withNotify($notify);
    }

    private function save_invoice_detail($request, $bill_id)
    {
        $detail_acc_code = $request->detail_acc_code ?? [];
        $ids = [];

        foreach ($detail_acc_code as $key => $value) {
            if (empty($value)) {
                continue;
            }

            $bill_detail = GlBillInvoiceDetail::where('id', $request->detail_id[$key])->first();

            if (!$bill_detail) {
                $bill_detail = new GlBillInvoiceDetail();
                $bill_detail->gl_bill_id = $bill_id;
            }

            $bill_detail->account_id = $request->detail_acc_code[$key];
            $bill_detail->cost_center = $request->detail_cost_center[$key];
            $bill_detail->dr_cr = $request->detail_dr_cr[$key];
            $bill_detail->amount_vc = $request->detail_amount_vc[$key];
            $bill_detail->amount_lc = $request->detail_amount_lc[$key];
            $bill_detail->narration = $request->detail_narration[$key];
            $bill_detail->tax_type = $request->detail_tax_type[$key];
            $bill_detail->save();

            $ids[] = $bill_detail->id;
        }

        GlBillInvoiceDetail::where('gl_bill_id', $bill_id)->whereNotIn('id', $ids)->delete();
    }

    public function get_data(Request $request)
    {
        $user_info = session()->get('user_info');
        $id = $request->id;
        $type = $request->type;
        $data = GlBill::with(['company', 'currency', 'invoice_details'])->where('company_id', $user_info['company_id']);

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
