<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrincipalManualSoa;
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

class PrincipalManualSoaController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "PrincipalManualSoa";
    //     $data['seo_desc']       = "PrincipalManualSoa";
    //     $data['seo_keywords']   = "PrincipalManualSoa";
    //     $data['page_title'] = "PrincipalManualSoa";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=PrincipalManualSoa::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.PrincipalManualSoa.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = PrincipalManualSoa::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "PrincipalManualSoa";
        $data['seo_desc']       = "PrincipalManualSoa";
        $data['seo_keywords']   = "PrincipalManualSoa";
        $data['page_title'] = "Principal Manual Soa";
        return view('admin.principal_manual_soa.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit PrincipalManualSoa";
        $data['seo_desc']       = "Edit PrincipalManualSoa";
        $data['seo_keywords']   = "Edit PrincipalManualSoa";
        $data['page_title'] = "Edit Principal Manual Soa";
        $data['PrincipalManualSoa'] = PrincipalManualSoa::where("id", $id)->first();
        return view('admin.principal_manual_soa.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = PrincipalManualSoa::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Principal Manual Soa Deleted Successfully.'];
        return redirect()->route('admin.principal_manual_soa.create')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'PrincipalManualSoa_no' => 'required',
            'PrincipalManualSoa_type' => 'required',
            'job_number' => 'required',
            'client' => 'required',
            'issue_date' => 'required',
        ]);
        
        $principal_manual_soa = new PrincipalManualSoa();
        $principal_manual_soa->PrincipalManualSoa_no = $request->PrincipalManualSoa_no;
        $principal_manual_soa->PrincipalManualSoa_type = $request->PrincipalManualSoa_type;
        $principal_manual_soa->save();
      
        $notify[] = ['success', 'Principal Manual Soa Added Successfully.'];
        return redirect()->route('admin.principal_manual_soa.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'PrincipalManualSoa_no' => 'required',
            'PrincipalManualSoa_type' => 'required',
            'job_number' => 'required',
            'client' => 'required',
            'issue_date' => 'required',
        ]);
        
        $principal_manual_soa = PrincipalManualSoa::where("id", $request->id)->first();
        $principal_manual_soa->PrincipalManualSoa_no = $request->PrincipalManualSoa_no;
        $principal_manual_soa->save();
        
        $notify[] = ['success', 'Principal Manual Soa Updated Successfully.'];
        return redirect()->route('admin.principal_manual_soa.create')->withNotify($notify);
    }
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = PrincipalManualSoa::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = PrincipalManualSoa::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = PrincipalManualSoa::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = PrincipalManualSoa::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
   
    
}
