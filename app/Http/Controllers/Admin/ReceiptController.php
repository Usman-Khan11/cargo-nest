<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receipt;
use App\Models\Receiptdetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminNotification;
use App\Models\PartyBasicInfo;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class ReceiptController extends Controller
{
    public function index(Request $request)
    {
        $data['seo_title']      = "Receipt";
        $data['seo_desc']       = "Receipt";
        $data['seo_keywords']   = "Receipt";
        $data['page_title'] = "All Receipt";

        // if ($request->ajax()) {
        //     $totalCount=0;
        //     $recordsFiltered=0;
        //     $pageSize = (int)($request->length) ? $request->length : 10;
        //     $start=(int)($request->start) ? $request->start : 0;
        //     $query=Receipt::Query();
        //     $totalCount=$query->count(); 

        //     $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();

        //     return Datatables::of($query)
        //         ->setOffset($start)->addIndexColumn()
        //         ->with(['recordsTotal'=>$totalCount])
        //         ->make(true);
        // }

        $data['client'] = PartyBasicInfo::select(["id", "party_name as text"])->get();
        $data['client'] = $data['client']->toArray();

        return view('admin.receipt.index', $data);
    }


    public function create(Request $request)
    {
        $data['seo_title']      = "Receipt";
        $data['seo_desc']       = "Receipt";
        $data['seo_keywords']   = "Receipt";
        $data['page_title'] = "Receipt";
        $data['client'] = PartyBasicInfo::select(["id", "party_name as text"])->get();
        $data['client'] = $data['client']->toArray();

        return view('admin.receipt.create', $data);
    }

    public function edit($id)
    {
        $data['seo_title']      = "Edit Receipt";
        $data['seo_desc']       = "Edit Receipt";
        $data['seo_keywords']   = "Edit Receipt";
        $data['page_title'] = "Edit Receipt";
        $data['receipt'] = Receipt::where("id", $id)->first();
        return view('admin.receipt.edit', $data);
    }

    public function delete($id)
    {
        $developer = Receipt::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Receipt Deleted Successfully.'];
        return redirect()->route('admin.receipt.create')->withNotify($notify);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tran_no' => 'required',
            'tran_date' => 'required',
            'status' => 'required',
        ]);

        // return $request;

        $receipt = new Receipt();
        $receipt->tran_no = $request->tran_no;
        $receipt->tran_date = $request->tran_date;
        $receipt->status = $request->status;
        $receipt->sequence = $request->sequence;
        $receipt->refund = (!empty($request->refund)) ? $request->refund : '';
        $receipt->hbl_no = $request->hbl_no;
        $receipt->advance_balance = $request->advance_balance;
        $receipt->cost_center = $request->cost_center;
        $receipt->cc_invoice = (!empty($request->cc_invoice)) ? $request->cc_invoice : '';
        $receipt->total_amount = $request->total_amount;
        $receipt->client = $request->client;
        $receipt->code = $request->code;
        $receipt->currency = $request->currency;
        $receipt->operation = $request->operation;
        $receipt->job_number = $request->job_number;
        $receipt->terminal_inv_number = $request->terminal_inv_number;
        $receipt->continue = (!empty($request->continue)) ? $request->continue : '';
        $receipt->exchange_rate = $request->exchange_rate;
        $receipt->multi_currency = (!empty($request->multi_currency)) ? $request->multi_currency : '';
        $receipt->payment_type = $request->payment_type;
        $receipt->account = $request->account;
        $receipt->code2 = $request->code2;
        $receipt->reversal = (!empty($request->reversal)) ? $request->reversal : '';
        $receipt->rev_tran_number = $request->rev_tran_number;
        $receipt->tax_authority = $request->tax_authority;
        $receipt->on_account = $request->on_account;
        $receipt->tax = $request->tax;
        $receipt->tax_amt = (!empty($request->tax_amt)) ? $request->tax_amt : '';
        $receipt->tax_amt_box = $request->tax_amt_box;
        $receipt->account_no_1 = $request->account_no_1;
        $receipt->code3 = $request->code3;
        $receipt->sub_type = $request->sub_type;
        $receipt->cheque_no = $request->cheque_no;
        $receipt->date = $request->date;
        $receipt->account_no = $request->account_no;
        $receipt->draw_at = $request->draw_at;
        $receipt->invoice_no = $request->invoice_no;
        $receipt->tax_authority_2 = $request->tax_authority_2;
        $receipt->tax_2 = $request->tax_2;
        $receipt->tax_amt_2 = (!empty($request->tax_amt_2)) ? $request->tax_amt_2 : '';
        $receipt->tax_amt_box_2 = $request->tax_amt_box_2;
        $receipt->account_no_2 = $request->account_no_2;
        $receipt->code4 = $request->code4;
        $receipt->tax_authority_3 = $request->tax_authority_3;
        $receipt->tax_3 = $request->tax_3;
        $receipt->tax_amt_3 = (!empty($request->tax_amt_3)) ? $request->tax_amt_3 : '';
        $receipt->tax_amt_box_3 = $request->tax_amt_box_3;
        $receipt->account_no_3 = $request->account_no_3;
        $receipt->code5 = $request->code5;
        $receipt->tax_authority_4 = $request->tax_authority_4;
        $receipt->tax_4 = $request->tax_4;
        $receipt->tax_amt_4 = (!empty($request->tax_amt_4)) ? $request->tax_amt_4 : '';
        $receipt->tax_amt_box_4 = $request->tax_amt_box_4;
        $receipt->account_no_4 = $request->account_no_4;
        $receipt->code6 = $request->code6;
        // $receipt->pay_to = $request->pay_to;
        $receipt->bank_charges = $request->bank_charges;
        $receipt->gain_loss_fc = $request->gain_loss_fc;
        $receipt->account_1 = $request->account_1;
        $receipt->code7 = $request->code7;
        $receipt->account_2 = $request->account_2;
        $receipt->code8 = $request->code8;
        $receipt->remarks = $request->remarks;
        $receipt->manual_remarks = $request->manual_remarks;
        $receipt->t_amount = $request->t_amount;
        $receipt->advance = $request->advance;
        $receipt->voucher_number = $request->voucher_number;
        $receipt->rf = $request->rf;
        $receipt->net_received = $request->net_received;
        $receipt->normal = $request->normal;
        $receipt->security = $request->security;
        $receipt->detension = $request->detension;
        $receipt->types = (!empty($request->types)) ? $request->types : '';
        $receipt->save();

        // $job_no = $request->job_no;
        // foreach ($job_no as $key => $value) {
        //     $receipt_details = new Receiptdetail();
        //     $receipt_details->receipt_id = $receipt->id;
        //     $receipt_details->job_no = $request->job_no[$key];
        //     $receipt_details->invoice_number = $request->invoice_number[$key];
        //     $receipt_details->invoice_date = $request->invoice_date[$key];
        //     $receipt_details->ref_no = $request->ref_no[$key];
        //     $receipt_details->hbl_no = $request->hbl_no[$key];
        //     $receipt_details->mbl_no = $request->mbl_no[$key];
        //     $receipt_details->inv_curr = $request->inv_curr[$key];
        //     $receipt_details->inv_bal = $request->inv_bal[$key];
        //     $receipt_details->rcvd_amount = $request->rcvd_amount[$key];
        //     $receipt_details->balance = $request->balance[$key];
        //     // $receipt_details->checkbox = $request->check[$key];
        //     $receipt_details->file_no = $request->file_no[$key];
        //     $receipt_details->container = $request->container[$key];
        //     $receipt_details->index_no = $request->index_no[$key];
        //     $receipt_details->igm_no = $request->igm_no[$key];
        //     $receipt_details->save();
        // }

        $notify[] = ['success', 'Receipt Added Successfully.'];
        return redirect()->route('admin.receipt.create')->withNotify($notify);
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'tran_no' => 'required',
            'tran_date' => 'required',
            'status' => 'required',
        ]);

        $receipt = Receipt::where("id", $request->id)->first();
        $receipt->tran_no = $request->tran_no;
        $receipt->tran_date = $request->tran_date;
        $receipt->status = $request->status;
        $receipt->sequence = $request->sequence;
        $receipt->refund = isset($request->refund) ? $request->refund : '';
        $receipt->hbl_no = $request->hbl_no;
        $receipt->advance_balance = $request->advance_balance;
        $receipt->cost_center = $request->cost_center;
        $receipt->cc_invoice = (!empty($request->cc_invoice)) ? $request->cc_invoice : '';
        $receipt->total_amount = $request->total_amount;
        $receipt->client = $request->client;
        $receipt->code = $request->code;
        $receipt->currency = $request->currency;
        $receipt->operation = $request->operation;
        $receipt->job_number = $request->job_number;
        $receipt->terminal_inv_number = $request->terminal_inv_number;
        $receipt->continue = (!empty($request->continue)) ? $request->continue : '';
        $receipt->exchange_rate = $request->exchange_rate;
        $receipt->multi_currency = (!empty($request->multi_currency)) ? $request->multi_currency : '';
        $receipt->payment_type = $request->payment_type;
        $receipt->account = $request->account;
        $receipt->code2 = $request->code2;
        $receipt->reversal = (!empty($request->reversal)) ? $request->reversal : '';
        $receipt->rev_tran_number = $request->rev_tran_number;
        $receipt->tax_authority = $request->tax_authority;
        $receipt->on_account = $request->on_account;
        $receipt->tax = $request->tax;
        $receipt->tax_amt = (!empty($request->tax_amt)) ? $request->tax_amt : '';
        $receipt->tax_amt_box = $request->tax_amt_box;
        $receipt->account_no_1 = $request->account_no_1;
        $receipt->code3 = $request->code3;
        $receipt->sub_type = $request->sub_type;
        $receipt->cheque_no = $request->cheque_no;
        $receipt->date = $request->date;
        $receipt->account_no = $request->account_no;
        $receipt->draw_at = $request->draw_at;
        $receipt->invoice_no = $request->invoice_no;
        $receipt->tax_authority_2 = $request->tax_authority_2;
        $receipt->tax_2 = $request->tax_2;
        $receipt->tax_amt_2 = (!empty($request->tax_amt_2)) ? $request->tax_amt_2 : '';
        $receipt->tax_amt_box_2 = $request->tax_amt_box_2;
        $receipt->account_no_2 = $request->account_no_2;
        $receipt->code4 = $request->code4;
        $receipt->tax_authority_3 = $request->tax_authority_3;
        $receipt->tax_3 = $request->tax_3;
        $receipt->tax_amt_3 = (!empty($request->tax_amt_3)) ? $request->tax_amt_3 : '';
        $receipt->tax_amt_box_3 = $request->tax_amt_box_3;
        $receipt->account_no_3 = $request->account_no_3;
        $receipt->code5 = $request->code5;
        $receipt->tax_authority_4 = $request->tax_authority_4;
        $receipt->tax_4 = $request->tax_4;
        $receipt->tax_amt_4 = (!empty($request->tax_amt_4)) ? $request->tax_amt_4 : '';
        $receipt->tax_amt_box_4 = $request->tax_amt_box_4;
        $receipt->account_no_4 = $request->account_no_4;
        $receipt->code6 = $request->code6;
        // $receipt->pay_to = $request->pay_to;
        $receipt->bank_charges = $request->bank_charges;
        $receipt->gain_loss_fc = $request->gain_loss_fc;
        $receipt->account_1 = $request->account_1;
        $receipt->code7 = $request->code7;
        $receipt->account_2 = $request->account_2;
        $receipt->code8 = $request->code8;
        $receipt->remarks = $request->remarks;
        $receipt->manual_remarks = (!empty($request->manual_remarks)) ? $request->manual_remarks : '';
        $receipt->t_amount = $request->t_amount;
        $receipt->advance = $request->advance;
        $receipt->voucher_number = $request->voucher_number;
        $receipt->rf = $request->rf;
        $receipt->net_received = $request->net_received;
        $receipt->normal = $request->normal;
        $receipt->security = $request->security;
        $receipt->detension = $request->detension;
        $receipt->types = (!empty($request->types)) ? $request->types : '';
        $receipt->save();

        $notify[] = ['success', 'Receipt Updated Successfully.'];
        return redirect()->route('admin.receipt.create')->withNotify($notify);
    }

    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = Receipt::Query();
        $arr = [
            "receipt" => [],
        ];

        if ($type == "first") {
            $data = $data->orderBy('id', 'asc');
        } else if ($type == "last") {
            $data = $data->orderBy('id', 'desc');
        } else if ($type == "forward") {
            $data = $data->where('id', '>', $id);
        } else if ($type == "backward") {
            $data = $data->where('id', '<', $id)->orderBy('id', 'desc');
        }

        $arr["receipt"] = $data->with('job')->first();
        $receipt_id = @$arr["receipt"]->id;

        return $arr;
    }
}
