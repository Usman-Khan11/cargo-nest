<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Switchbl;
use App\Models\SwitchBlContainer;
use App\Models\SwitchBlDetail;
use App\Models\SwitchBlStamp;
use App\Models\SwitchBlRef;
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

class SwitchblController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Se Switch B/L";
    //     $data['seo_desc']       = "Se Switch B/L";
    //     $data['seo_keywords']   = "Se Switch B/L";
    //     $data['page_title'] = "Se Switch B/L";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Switchbl::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.switchbl.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = Switchbl::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Se Switch B/L";
        $data['seo_desc']       = "Se Switch B/L";
        $data['seo_keywords']   = "Se Switch B/L";
        $data['page_title'] = "Se Switch B/L";
        return view('admin.switchbl.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Se Switch B/L";
        $data['seo_desc']       = "Edit Se Switch B/L";
        $data['seo_keywords']   = "Edit Se Switch B/L";
        $data['page_title'] = "Edit Se Switch B/L";
        $data['switchbl'] = Switchbl::where("id", $id)->first();
        return view('admin.switchbl.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Switchbl::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Se Switch B/L Deleted Successfully.'];
        return redirect()->route('admin.switchbl.create')->withNotify($notify);
    }
    
   public function store(Request $request)
    {
        $validated = $request->validate([
            // 'job_no' => ['required', 'string', 'max:255', 'alpha', 'unique:se_bl'],
            'job_no' => 'required',
        ]);
        
        $switch_bl = new Switchbl();
        $switch_bl->fill($request->all());
        $switch_bl->save();
        
        $c_container_number = $request->c_container_number;
        foreach($c_container_number as $key => $value) {
            $switch_bl_container = new SwitchBlContainer();
            $switch_bl_container->switch_bl_id = $bl->id;
            $switch_bl_container->c_container_number = $request->c_container_number[$key];
            $switch_bl_container->c_seal = $request->c_seal[$key];
            $switch_bl_container->c_size_type = $request->c_size_type[$key];
            $switch_bl_container->c_rate_group = $request->c_rate_group[$key];
            $switch_bl_container->c_gross_wt = $request->c_gross_wt[$key];
            $switch_bl_container->c_net_wt = $request->c_net_wt[$key];
            $switch_bl_container->c_cbm = $request->c_cbm[$key];
            $switch_bl_container->c_packages = $request->c_packages[$key];
            $switch_bl_container->c_unit = $request->c_unit[$key];
            $switch_bl_container->c_temperature = $request->c_temperature[$key];
            $switch_bl_container->c_load_type = $request->c_load_type[$key];
            $switch_bl_container->c_remarks = $request->c_remarks[$key];
            $switch_bl_container->c_principal_code = $request->c_principal_code[$key];
            $switch_bl_container->c_principal_name = $request->c_principal_name[$key];
            $switch_bl_container->c_free_days_detention = $request->c_free_days_detention[$key];
            $switch_bl_container->c_free_days_plugin = $request->c_free_days_plugin[$key];
            $switch_bl_container->save();
        }    
        
        
        $this->switch_bl_detail_store($request,$bl->id);
        $this->switch_bl_stamps_store($request,$bl->id);
      
        $notify[] = ['success', 'BL Added Successfully.'];
        return redirect()->route('admin.bl.create')->withNotify($notify);
    }
    
    public function switch_bl_detail_store($request,$id)
    {
        $switch_bl_detail = new SwitchBlDetail();
        $switch_bl_detail->switch_bl_id = $id;
        $switch_bl_detail->fill($request->all());
        $switch_bl_detail->save();
    }
    
    public function switch_bl_stamps_store($request,$id)
    {
        $switch_bl_stamp = new SwitchBlStamp();
        $switch_bl_stamp->switch_bl_id = $id;
        $switch_bl_stamp->fill($request->all());
        $switch_bl_stamp->save();
        
        $r_code = $request->r_code;
        foreach($r_code as $key => $value) {
            $switch_bl_ref = new SwitchBlRef();
            $switch_bl_ref->bl_id = $bl->id;
            $switch_bl_ref->r_code = $request->r_code[$key];
            $switch_bl_ref->r_stamp = $request->r_stamp[$key];
            $switch_bl_ref->r_stamp_group = $request->r_stamp_group[$key];
            $switch_bl_ref->r_stamp_date = $request->r_stamp_date[$key];
            $switch_bl_ref->r_remarks = $request->r_remarks[$key];
            $switch_bl_ref->save();
        }    
        
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'job_no' => 'required',
        ]);
        
        $switch_bl = Switchbl::where("id", $request->id)->first();
        $switch_bl->fill($request->all());
        $switch_bl->update();
        
        $notify[] = ['success', 'BL Updated Successfully.'];
        return redirect()->route('admin.bl.create')->withNotify($notify);
    }
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = Switchbl::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = Switchbl::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = Switchbl::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = Switchbl::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
   
    
}
