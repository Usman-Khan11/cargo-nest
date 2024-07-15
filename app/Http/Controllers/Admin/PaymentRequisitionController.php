<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentRequisition;
use App\Models\PaymentRequisitionDetail;
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

class PaymentRequisitionController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Se Payment Requisition";
    //     $data['seo_desc']       = "Se Payment Requisition";
    //     $data['seo_keywords']   = "Se Payment Requisition";
    //     $data['page_title'] = "Se Payment Requisition";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=PaymentRequisition::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.payment_requisition.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = PaymentRequisition::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Se Payment Requisition";
        $data['seo_desc']       = "Se Payment Requisition";
        $data['seo_keywords']   = "Se Payment Requisition";
        $data['page_title'] = "Se Payment Requisition";
        return view('admin.payment_requisition.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Se Payment Requisition";
        $data['seo_desc']       = "Se Payment Requisition";
        $data['seo_keywords']   = "Se Payment Requisition";
        $data['page_title'] = "Se Payment Requisition";
        $data['paymentrequisition'] = PaymentRequisition::where("id", $id)->first();
        return view('admin.payment_requisition.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = PaymentRequisition::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Payment Requisition Deleted Successfully.'];
        return redirect()->route('admin.payment_requisition.create')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'train_number' => ['required', 'string', 'max:255', 'unique:payment_requisition'],
            'train_date' => 'required',
        ]);
       
        $payment_requisition = new PaymentRequisition();
        $payment_requisition->fill($request->all());
        $payment_requisition->save();
        
        
        $operations = $request->operations;
        if($operations){
            foreach($operations as $key => $value) {
            $payment_requisition_detail = new PaymentRequisitionDetail();
            $payment_requisition_detail->payment_requisition_id = $payment_requisition->id;
            $payment_requisition_detail->operations = $request->operations[$key];
            $payment_requisition_detail->container_number = $request->container_number[$key];
            $payment_requisition_detail->bill_number = $request->bill_number[$key];
            $payment_requisition_detail->bill_date = $request->bill_date[$key];
            $payment_requisition_detail->ref_number = $request->ref_number[$key];
            $payment_requisition_detail->hbl_number = $request->hbl_number[$key];
            $payment_requisition_detail->mbl_number = $request->mbl_number[$key];
            $payment_requisition_detail->inv_curr = $request->inv_curr[$key];
            $payment_requisition_detail->inv_ex_rate = $request->inv_ex_rate[$key];
            $payment_requisition_detail->bill_bal_fc = $request->bill_bal_fc[$key];
            $payment_requisition_detail->payment_amount_fc = $request->payment_amount_fc[$key];
            $payment_requisition_detail->balance_fc = $request->balance_fc[$key];
            $payment_requisition_detail->balance_checkbox = isset($request->hbl_issue) ? $request->balance_checkbox : '';
            $payment_requisition_detail->file_number = $request->file_number[$key];
            $payment_requisition_detail->container_number = $request->container_number[$key];
            $payment_requisition_detail->index_number = $request->index_number[$key];
            $payment_requisition_detail->vessel = $request->vessel[$key];
            $payment_requisition_detail->voyage = $request->voyage[$key];
            $payment_requisition_detail->save();
            }    
        }
        
        
        $notify[] = ['success', 'Payment Requisition Added Successfully.'];
        return redirect()->route('admin.payment_requisition.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'train_number' => 'required',
            'train_date' => 'required',
        ]);
        
        $payment_requisition = PaymentRequisition::where("id", $request->id)->first();
        $payment_requisition->fill($request->all());
        $payment_requisition->update();
        
        $notify[] = ['success', 'Payment Requisition Updated Successfully.'];
        return redirect()->route('admin.payment_requisition.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = PaymentRequisition::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = PaymentRequisition::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = PaymentRequisition::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = PaymentRequisition::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
   
    
}
