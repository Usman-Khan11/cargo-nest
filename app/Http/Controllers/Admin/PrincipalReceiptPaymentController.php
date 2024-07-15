<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrincipalReceiptPayment;
use App\Models\Vessel;
use App\Models\Voyage;
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

class PrincipalReceiptPaymentController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "PrincipalReceiptPayment";
    //     $data['seo_desc']       = "PrincipalReceiptPayment";
    //     $data['seo_keywords']   = "PrincipalReceiptPayment";
    //     $data['page_title'] = "PrincipalReceiptPayment";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=PrincipalReceiptPayment::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.PrincipalReceiptPayment.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = PrincipalReceiptPayment::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "PrincipalReceiptPayment";
        $data['seo_desc']       = "PrincipalReceiptPayment";
        $data['seo_keywords']   = "PrincipalReceiptPayment";
        $data['page_title'] = "Principal Receipt Payment";
        return view('admin.principal_receipt_payment.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit PrincipalReceiptPayment";
        $data['seo_desc']       = "Edit PrincipalReceiptPayment";
        $data['seo_keywords']   = "Edit PrincipalReceiptPayment";
        $data['page_title'] = "Edit Principal Receipt Payment";
        $data['PrincipalReceiptPayment'] = PrincipalReceiptPayment::where("id", $id)->first();
        return view('admin.principal_receipt_payment.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = PrincipalReceiptPayment::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Principal Receipt Payment Deleted Successfully.'];
        return redirect()->route('admin.principal_receipt_payment.create')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'PrincipalReceiptPayment_no' => 'required',
            'PrincipalReceiptPayment_type' => 'required',
            'job_number' => 'required',
            'client' => 'required',
            'issue_date' => 'required',
        ]);
        
        $principal_receipt_payment = new PrincipalReceiptPayment();
        $principal_receipt_payment->PrincipalReceiptPayment_no = $request->PrincipalReceiptPayment_no;
        $principal_receipt_payment->PrincipalReceiptPayment_type = $request->PrincipalReceiptPayment_type;
        $principal_receipt_payment->save();
      
        $notify[] = ['success', 'Principal Receipt Payment Added Successfully.'];
        return redirect()->route('admin.principal_receipt_payment.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'PrincipalReceiptPayment_no' => 'required',
            'PrincipalReceiptPayment_type' => 'required',
            'job_number' => 'required',
            'client' => 'required',
            'issue_date' => 'required',
        ]);
        
        $principal_receipt_payment = PrincipalReceiptPayment::where("id", $request->id)->first();
        $principal_receipt_payment->PrincipalReceiptPayment_no = $request->PrincipalReceiptPayment_no;
        $principal_receipt_payment->save();
        
        $notify[] = ['success', 'Principal Receipt Payment Updated Successfully.'];
        return redirect()->route('admin.principal_receipt_payment.create')->withNotify($notify);
    }
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = PrincipalReceiptPayment::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = PrincipalReceiptPayment::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = PrincipalReceiptPayment::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = PrincipalReceiptPayment::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
   
    
}
