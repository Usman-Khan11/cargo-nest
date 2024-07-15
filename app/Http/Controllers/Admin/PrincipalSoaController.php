<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrincipalSoa;
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

class PrincipalSoaController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "PrincipalSoa";
    //     $data['seo_desc']       = "PrincipalSoa";
    //     $data['seo_keywords']   = "PrincipalSoa";
    //     $data['page_title'] = "PrincipalSoa";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=PrincipalSoa::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.PrincipalSoa.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = PrincipalSoa::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "PrincipalSoa";
        $data['seo_desc']       = "PrincipalSoa";
        $data['seo_keywords']   = "PrincipalSoa";
        $data['page_title'] = "Principal Soa";
        return view('admin.principal_soa.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit PrincipalSoa";
        $data['seo_desc']       = "Edit PrincipalSoa";
        $data['seo_keywords']   = "Edit PrincipalSoa";
        $data['page_title'] = "Edit Principal Soa";
        $data['principalsoa'] = PrincipalSoa::where("id", $id)->first();
        return view('admin.principal_soa.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = PrincipalSoa::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Principal Soa Deleted Successfully.'];
        return redirect()->route('admin.principal_soa.create')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'PrincipalSoa_no' => 'required',
            'PrincipalSoa_type' => 'required',
            'job_number' => 'required',
            'client' => 'required',
            'issue_date' => 'required',
        ]);
        
        $principal_soa = new PrincipalSoa();
        $principal_soa->PrincipalSoa_no = $request->PrincipalSoa_no;
        $principal_soa->PrincipalSoa_type = $request->PrincipalSoa_type;
        $principal_soa->save();
      
        $notify[] = ['success', 'Principal Soa Added Successfully.'];
        return redirect()->route('admin.principal_soa.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'PrincipalSoa_no' => 'required',
            'PrincipalSoa_type' => 'required',
            'job_number' => 'required',
            'client' => 'required',
            'issue_date' => 'required',
        ]);
        
        $principal_soa = PrincipalSoa::where("id", $request->id)->first();
        $principal_soa->PrincipalSoa_no = $request->PrincipalSoa_no;
        $principal_soa->save();
        
        $notify[] = ['success', 'Principal Soa Updated Successfully.'];
        return redirect()->route('admin.principal_soa.create')->withNotify($notify);
    }
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = PrincipalSoa::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = PrincipalSoa::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = PrincipalSoa::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = PrincipalSoa::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
   
    
}
