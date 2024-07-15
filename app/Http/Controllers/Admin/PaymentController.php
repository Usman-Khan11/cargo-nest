<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SePayment;
use App\Models\SePaymentDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminNotification;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class PaymentController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Se Payment";
    //     $data['seo_desc']       = "Se Payment";
    //     $data['seo_keywords']   = "Se Payment";
    //     $data['page_title'] = "Se Payment";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Payment::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.payment.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = Payment::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Se Payment";
        $data['seo_desc']       = "Se Payment";
        $data['seo_keywords']   = "Se Payment";
        $data['page_title'] = "Se Payment";
        return view('admin.payment.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Se Payment";
        $data['seo_desc']       = "Edit Se Payment";
        $data['seo_keywords']   = "Edit Se Payment";
        $data['page_title'] = "Edit Se Payment";
        $data['payment'] = Payment::where("id", $id)->first();
        return view('admin.payment.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Payment::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Se Payment Deleted Successfully.'];
        return redirect()->route('admin.payment.create')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tran_no' => ['required', 'string', 'max:150' , 'unique:se_payments'],
            'tran_date' => 'required',
            'status' => 'required',
        ]);
        
        $se_payment = new SePayment();
        $se_payment->fill($request->all());
        $se_payment->save();
        
        $t_operation = $request->t_operation;
        foreach($t_operation as $key => $value) {
            $se_payment_details = new SePaymentDetail();
            $se_payment_details->payment_id = $se_payment->id;
            $se_payment_details->t_operation = $request->t_operation[$key];
            $se_payment_details->t_job_no = $request->t_job_no[$key];
            $se_payment_details->t_bii_no = $request->t_bii_no[$key];
            $se_payment_details->t_bill_date = $request->t_bill_date[$key];
            $se_payment_details->t_ref_no = $request->t_ref_no[$key];
            $se_payment_details->t_hbl_no = $request->t_hbl_no[$key];
            $se_payment_details->t_mbl_no = $request->t_mbl_no[$key];
            $se_payment_details->t_inv_curr = $request->t_inv_curr[$key];
            $se_payment_details->t_ex_rate = $request->t_ex_rate[$key];
            $se_payment_details->t_bill_bal = $request->t_bill_bal[$key];
            $se_payment_details->t_payment_amt = $request->t_payment_amt[$key];
            $se_payment_details->t_balance = $request->t_balance[$key];
            $se_payment_details->mark = ( $request->mark[$key]) ?  $request->mark[$key] : '';
            $se_payment_details->t_file_no = $request->t_file_no[$key];
            $se_payment_details->t_container_no = $request->t_container_no[$key];
            $se_payment_details->t_index_no = $request->t_index_no[$key];
            $se_payment_details->t_vessel = $request->t_vessel[$key];
            $se_payment_details->t_voyage = $request->t_voyage[$key];
            $se_payment_details->t_vndr_tax = $request->t_vndr_tax[$key];
            $se_payment_details->t_vndr_comm = $request->t_vndr_comm[$key];
            $se_payment_details->t_vndr_inv_date = $request->t_vndr_inv_date[$key];
            $se_payment_details->save();
        }    
        
      
        $notify[] = ['success', 'Se Payment Added Successfully.'];
        return redirect()->route('admin.payment.create')->withNotify($notify);
    }
    
     public function update(Request $request)
    {
        $validated = $request->validate([
            'tran_no' => 'required',
            'tran_date' => 'required',
            'status' => 'required',
        ]);
        
        $se_payment = SePayment::where("id", $request->id)->first();
        $se_payment->fill($request->all());
        $se_payment->update();
        
        $notify[] = ['success', 'Se Payment Updated Successfully.'];
        return redirect()->route('admin.payment.create')->withNotify($notify);
    }
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = SePayment::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = SePayment::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = SePayment::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = SePayment::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
   
    
}
