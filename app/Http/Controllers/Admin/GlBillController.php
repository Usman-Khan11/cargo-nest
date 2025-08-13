<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChartAccount;
use App\Models\Currency;
use App\Models\GlBill;
use App\Models\PartyBasicInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class GlBillController extends Controller
{
    public function create(Request $request)
    {
        $user_info = session()->get('user_info');

        if ($request->ajax()) {
            $query = GlBill::Query();
            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

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
            'voucher_no' => 'required|string|max:20|exists:vouchers,voucher_no',
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
        ]);
    }

    public function store(Request $request)
    {
        $this->bill_validation($request);

        try {
            DB::beginTransaction();

            $gl_bill = new GlBill();
            $gl_bill->fill($request->all());
            $gl_bill->save();

            // save voucher detail
            // $this->save_voucher_detail($request, $voucher->id);

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

            // save voucher detail
            // $this->save_voucher_detail($request, $voucher->id);

            DB::commit();
            $notify[] = ['success', 'Bill updated successfully.'];
        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['error', $e->getLine() . ': ' . $e->getMessage()];
        }

        return redirect()->route('admin.gl_bill.create')->withNotify($notify);
    }


    public function get_data(Request $request)
    {
        $user_info = session()->get('user_info');
        $id = $request->id;
        $type = $request->type;
        $data = GlBill::with(['company', 'currency'])->where('company_id', $user_info['company_id']);

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
