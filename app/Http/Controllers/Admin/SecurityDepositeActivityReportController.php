<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\SecurityDepositeActivityReport;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class SecurityDepositeActivityReportController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "SecurityDepositeActivityReport";
    //     $data['seo_desc']       = "SecurityDepositeActivityReport";
    //     $data['seo_keywords']   = "SecurityDepositeActivityReport";
    //     $data['page_title'] = "All SecurityDepositeActivityReport";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=SecurityDepositeActivityReport::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.SecurityDepositeActivityReport.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = SecurityDepositeActivityReport::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
       
        $data['seo_title']      = "Security Deposite Activity Report";
        $data['seo_desc']       = "Security Deposite Activity Report";
        $data['seo_keywords']   = "Security Deposite Activity Report";
        $data['page_title'] = "Security Deposite Activity Report";
        return view('admin.security_deposite_activity_report.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Security Deposite Activity Report";
        $data['seo_desc']       = "Edit Security Deposite Activity Report";
        $data['seo_keywords']   = "Edit Security Deposite Activity Report";
        $data['page_title'] = "Edit SecurityDepositeActivityReport";
        $data['securitydepositeactivityreport'] = SecurityDepositeActivityReport::where("id", $id)->first();
        return view('admin.security_deposite_activity_report_report.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = SecurityDepositeActivityReport::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Security Deposite Activity Report Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $security_deposite_activity_report = new SecurityDepositeActivityReport();
        $security_deposite_activity_report->fill($request->all());
        $security_deposite_activity_report->save();
        
        $notify[] = ['success', 'Security Deposite Activity Report Added Successfully.'];
        return redirect()->route('admin.security_deposite_activity_report.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
       
        $security_deposite_activity_report = SecurityDepositeActivityReport::where("id", $request->id)->first();
        $security_deposite_activity_report->inactive = $request->inactive ? $request->inactive : '';
        $security_deposite_activity_report->fill($request->all());
        $security_deposite_activity_report->update();
        
        $notify[] = ['success', 'Security Deposite Activity Report Updated Successfully.'];
        return redirect()->route('admin.security_deposite_activity_report.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = SecurityDepositeActivityReport::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = SecurityDepositeActivityReport::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = SecurityDepositeActivityReport::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = SecurityDepositeActivityReport::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
