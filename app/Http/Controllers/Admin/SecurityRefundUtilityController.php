<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\SecurityRefundUtility;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class SecurityRefundUtilityController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "SecurityRefundUtility";
    //     $data['seo_desc']       = "SecurityRefundUtility";
    //     $data['seo_keywords']   = "SecurityRefundUtility";
    //     $data['page_title'] = "All SecurityRefundUtility";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=SecurityRefundUtility::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.SecurityRefundUtility.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = SecurityRefundUtility::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
       
        $data['seo_title']      = "Security Refund Utility";
        $data['seo_desc']       = "Security Refund Utility";
        $data['seo_keywords']   = "Security Refund Utility";
        $data['page_title'] = "Security Refund Utility";
        return view('admin.security_refund_utility.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Security Refund Utility";
        $data['seo_desc']       = "Edit Security Refund Utility";
        $data['seo_keywords']   = "Edit Security Refund Utility";
        $data['page_title'] = "Edit SecurityRefundUtility";
        $data['SecurityRefundUtility'] = SecurityRefundUtility::where("id", $id)->first();
        return view('admin.security_deposite_status_report.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = SecurityRefundUtility::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Security Refund Utility Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $security_refund_utility = new SecurityRefundUtility();
        $security_refund_utility->fill($request->all());
        $security_refund_utility->save();
        
        $notify[] = ['success', 'Security Refund Utility Added Successfully.'];
        return redirect()->route('admin.security_refund_utility.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
       
        $security_refund_utility = SecurityRefundUtility::where("id", $request->id)->first();
        $security_refund_utility->inactive = $request->inactive ? $request->inactive : '';
        $security_refund_utility->fill($request->all());
        $security_refund_utility->update();
        
        $notify[] = ['success', 'Security Refund Utility Updated Successfully.'];
        return redirect()->route('admin.security_refund_utility.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = SecurityRefundUtility::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = SecurityRefundUtility::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = SecurityRefundUtility::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = SecurityRefundUtility::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
