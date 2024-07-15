<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\SecurityDepositeStatusReport;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class SecurityDepositeStatusReportController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "SecurityDepositeStatusReport";
    //     $data['seo_desc']       = "SecurityDepositeStatusReport";
    //     $data['seo_keywords']   = "SecurityDepositeStatusReport";
    //     $data['page_title'] = "All SecurityDepositeStatusReport";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=SecurityDepositeStatusReport::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.SecurityDepositeStatusReport.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = SecurityDepositeStatusReport::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
       
        $data['seo_title']      = "Security Deposite Status Report";
        $data['seo_desc']       = "Security Deposite Status Report";
        $data['seo_keywords']   = "Security Deposite Status Report";
        $data['page_title'] = "Security Deposite Status Report";
        return view('admin.security_deposite_activity_report.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Security Deposite Status Report";
        $data['seo_desc']       = "Edit Security Deposite Status Report";
        $data['seo_keywords']   = "Edit Security Deposite Status Report";
        $data['page_title'] = "Edit SecurityDepositeStatusReport";
        $data['securitydepositestatusreport'] = SecurityDepositeStatusReport::where("id", $id)->first();
        return view('admin.security_deposite_status_report.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = SecurityDepositeStatusReport::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Security Deposite Status Report Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $security_deposite_activity_report = new SecurityDepositeStatusReport();
        $security_deposite_activity_report->fill($request->all());
        $security_deposite_activity_report->save();
        
        $notify[] = ['success', 'Security Deposite Status Report Added Successfully.'];
        return redirect()->route('admin.security_deposite_activity_report.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
       
        $security_deposite_activity_report = SecurityDepositeStatusReport::where("id", $request->id)->first();
        $security_deposite_activity_report->inactive = $request->inactive ? $request->inactive : '';
        $security_deposite_activity_report->fill($request->all());
        $security_deposite_activity_report->update();
        
        $notify[] = ['success', 'Security Deposite Status Report Updated Successfully.'];
        return redirect()->route('admin.security_deposite_activity_report.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = SecurityDepositeStatusReport::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = SecurityDepositeStatusReport::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = SecurityDepositeStatusReport::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = SecurityDepositeStatusReport::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
