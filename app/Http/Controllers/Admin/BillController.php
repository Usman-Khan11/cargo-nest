<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\BillDetail;
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

class BillController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Se Bill";
    //     $data['seo_desc']       = "Se Bill";
    //     $data['seo_keywords']   = "Se Bill";
    //     $data['page_title'] = "Se Bill";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Bill::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.bill.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = Bill::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        } 
        
        $data['seo_title']      = "Se Bill";
        $data['seo_desc']       = "Se Bill";
        $data['seo_keywords']   = "Se Bill";
        $data['page_title'] = "Se Bill";
        return view('admin.bill.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Se Bill";
        $data['seo_desc']       = "Se Bill";
        $data['seo_keywords']   = "Se Bill";
        $data['page_title'] = "Se Bill";
        $data['bill'] = Bill::where("id", $id)->first();
        return view('admin.bill.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Bill::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Bill Deleted Successfully.'];
        return redirect()->route('admin.bill.create')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tran_number' => 'required',
            'bill_date' => 'required',
            'reference_number' => ['required', 'string', 'max:150' , 'unique:bill'],
            'status' => 'required',
        ]);
        
        $bill = new Bill();
        $bill->fill($request->all());
        $bill->save();
        
        $b_job_no = $request->b_job_no;
        foreach($b_job_no as $key => $value) {
            $bill_details = new BillDetail();
            $bill_details->bill_id = $bill->id;
            $bill_details->b_job_no = $request->b_job_no[$key];
            $bill_details->b_charges_code = $request->b_charges_code[$key];
            $bill_details->b_charges_name = $request->b_charges_name[$key];
            $bill_details->b_charges_desc = $request->b_charges_desc[$key];
            $bill_details->b_rate_group = $request->b_rate_group[$key];
            $bill_details->b_dg = $request->b_dg[$key];
            $bill_details->mark = ( $request->mark[$key]) ?  $request->mark[$key] : '';
            $bill_details->b_container = $request->b_container[$key];
            $bill_details->b_qty = $request->b_qty[$key];
            $bill_details->b_rate = $request->b_rate[$key];
            $bill_details->b_currency = $request->b_currency[$key];
            $bill_details->b_amount = $request->b_amount[$key];
            $bill_details->b_discount = $request->b_discount[$key];
            $bill_details->b_net_amount = $request->b_net_amount[$key];
            $bill_details->b_margin = $request->b_margin[$key];
            $bill_details->b_tax = $request->b_tax[$key];
            $bill_details->b_tax_amt = $request->b_tax_amt[$key];
            $bill_details->b_net_amt = $request->b_net_amt[$key];
            $bill_details->b_ex_rate = $request->b_ex_rate[$key];
            $bill_details->b_local_amount = $request->b_local_amount[$key];
            $bill_details->b_code = $request->b_code[$key];
            $bill_details->b_principal_name = $request->b_principal_name[$key];
            $bill_details->tpgl_payment = $request->tpgl_payment[$key];
            $bill_details->tpgl_invoice = $request->tpgl_invoice[$key];
            $bill_details->save();
        }    
      
        $notify[] = ['success', 'Bill Added Successfully.'];
        return redirect()->route('admin.bill.create')->withNotify($notify);
     }
     
      public function update(Request $request)
        {
            $validated = $request->validate([
                'tran_number' => 'required',
                'bill_date' => 'required',
                'reference_number' => 'required',
                'status' => 'required',
            ]);
            
            $bill = Bill::where("id", $request->id)->first();
            $bill->fill($request->all());
            $bill->update();
            
            $notify[] = ['success', 'Bill Updated Successfully.'];
            return redirect()->route('admin.bill.create')->withNotify($notify);
        }
        
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = Bill::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = Bill::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = Bill::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = Bill::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }    
   
    
}
