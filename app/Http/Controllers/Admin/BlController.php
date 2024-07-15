<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bl;
use App\Models\BlDetail;
use App\Models\BlStamp;
use App\Models\BlContainer;
use App\Models\BlRef;
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

class BlController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "B/L";
    //     $data['seo_desc']       = "B/L";
    //     $data['seo_keywords']   = "B/L";
    //     $data['page_title'] = "B/L";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Bl::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.bl.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = Bl::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "B/L";
        $data['seo_desc']       = "B/L";
        $data['seo_keywords']   = "B/L";
        $data['page_title'] = "B/L";
        $data['vessels'] = Vessel::select(["id", "vessel_name as text"])->get();
        $data['vessels'] = $data['vessels']->toArray();
        $data['voyages'] = Voyage::get();
        return view('admin.bl.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit B/L";
        $data['seo_desc']       = "Edit B/L";
        $data['seo_keywords']   = "Edit B/L";
        $data['page_title'] = "Edit B/L";
        $data['bl'] = Bl::where("id", $id)->first();
        return view('admin.bl.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Bl::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'BL Deleted Successfully.'];
        return redirect()->route('admin.bl.create')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_no' => ['required', 'unique:bl'],
        ]);
        
        $bl = new Bl();
        $bl->job_no = $request->job_no;
        $bl->status = $request->status;
        $bl->hbl = $request->hbl;
        $bl->hbl_date = $request->hbl_date;
        $bl->mbl = $request->mbl;
        $bl->mbl_date = $request->mbl_date;
        $bl->source_date = $request->source_date;
        $bl->hbl_issue = isset($request->hbl_issue) ? $request->hbl_issue : '';
        $bl->shipper = $request->shipper;
        $bl->consignee = $request->consignee;
        $bl->notify1 = $request->notify1;
        $bl->notify2 = $request->notify2;
        $bl->vessel = $request->vessel;
        $bl->sailing_date = $request->sailing_date;
        $bl->voyage = $request->voyage;
        $bl->pol = $request->pol;
        $bl->pofd = $request->pofd;
        $bl->pot = $request->pot;
        $bl->final_destination = $request->final_destination;
        $bl->commodity = $request->commodity;
        $bl->reference_number = $request->reference_number;
        $bl->overseas_agent = $request->overseas_agent;
        $bl->shipping_line_carrier = $request->shipping_line_carrier;
        $bl->total_container = $request->total_container;
        $bl->delivery = $request->delivery;
        $bl->save();
        
        $c_container_no = $request->c_container_no;
        foreach($c_container_no as $key => $value) {
            $bl_container = new BlContainer();
            $bl_container->bl_id = $bl->id;
            $bl_container->c_container_no = $request->c_container_no[$key];
            $bl_container->c_seal = $request->c_seal[$key];
            $bl_container->c_size_type = $request->c_size_type[$key];
            $bl_container->c_rate_group = $request->c_rate_group[$key];
            $bl_container->c_gross_wt = $request->c_gross_wt[$key];
            $bl_container->c_net_wt = $request->c_net_wt[$key];
            $bl_container->c_cbm = $request->c_cbm[$key];
            $bl_container->c_packages = $request->c_packages[$key];
            $bl_container->c_unit = $request->c_unit[$key];
            $bl_container->c_temperature = $request->c_temperature[$key];
            $bl_container->c_load_type = $request->c_load_type[$key];
            $bl_container->c_remarks = $request->c_remarks[$key];
            $bl_container->c_principal_code = $request->c_principal_code[$key];
            $bl_container->c_principal_name = $request->c_principal_name[$key];
            $bl_container->c_free_days_detention = $request->c_free_days_detention[$key];
            $bl_container->c_free_days_plugin = $request->c_free_days_plugin[$key];
            $bl_container->save();
        }    
        
        
        $this->bl_detail_store($request,$bl->id);
        $this->bl_stamps_store($request,$bl->id);
      
        $notify[] = ['success', 'BL Added Successfully.'];
        return redirect()->route('admin.bl.create')->withNotify($notify);
    }
    
    public function bl_detail_store($request,$id)
    {
        $bl_detail = new BlDetail();
        $bl_detail->bl_id = $id;
        $bl_detail->fill($request->all());
        $bl_detail->save();
    }
    
    public function bl_stamps_store($request,$id)
    {
        $bl_stamp = new BlStamp();
        $bl_stamp->bl_id = $id;
        $bl_stamp->fill($request->all());
        $bl_stamp->save();
        
        $r_code = $request->r_code;
        foreach($r_code as $key => $value) {
            $bl_ref = new BlRef();
            $bl_ref->bl_id = $id;
            $bl_ref->r_code = $request->r_code[$key];
            $bl_ref->r_stamp = $request->r_stamp[$key];
            $bl_ref->r_stamp_group = $request->r_stamp_group[$key];
            $bl_ref->r_stamp_date = $request->r_stamp_date[$key];
            $bl_ref->r_remarks = $request->r_remarks[$key];
            $bl_ref->save();
        }    
        
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'job_no' => 'required',
        ]);
        
        $bl = Bl::where("id", $request->id)->first();
        $bl->fill($request->all());
        $bl->update();
        
        $notify[] = ['success', 'BL Updated Successfully.'];
        return redirect()->route('admin.bl.create')->withNotify($notify);
    }
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = Bl::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = Bl::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = Bl::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = Bl::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
   
    
}
