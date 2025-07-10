<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Voucher;
use Yajra\DataTables\Facades\DataTables;

class VoucherController extends Controller
{
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = Voucher::Query();
            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['seo_title']      = "Voucher";
        $data['seo_desc']       = "Voucher";
        $data['seo_keywords']   = "Voucher";
        $data['page_title'] = "Voucher";
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

    public function store(Request $request)
    {
        $request->validate([
            'voucher_no'         => 'required|string|max:30',
            'date'              => 'required|date',
            'type'              => 'nullable|string|max:50',
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
        ]);

        $Voucher = new Voucher();
        $Voucher->fill($request->all());
        $Voucher->save();

        $notify[] = ['success', 'Voucher Added Successfully.'];
        return redirect()->route('admin.voucher.create')->withNotify($notify);
    }

    public function update(Request $request)
    {
        $request->validate([
            'voucher_no'         => 'required|string|max:30',
            'date'              => 'required|date',
            'type'              => 'nullable|string|max:50',
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
        ]);

        $Voucher = Voucher::where("id", $request->id)->first();
        $Voucher->fill($request->all());
        $Voucher->update();

        $notify[] = ['success', 'Voucher Updated Successfully.'];
        return redirect()->route('admin.voucher.create')->withNotify($notify);
    }


    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = Voucher::with('company', 'currency');

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
