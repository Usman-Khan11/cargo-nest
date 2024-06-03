<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Milestone;
use App\Models\MilestoneDocument;
use App\Models\MilestoneOperational;
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

class MilestoneController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Se MileStone";
    //     $data['seo_desc']       = "Se MileStone";
    //     $data['seo_keywords']   = "Se MileStone";
    //     $data['page_title'] = "Se MileStone";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Milestone::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.milestone.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = Milestone::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        } 
        
        $data['seo_title']      = "Se MileStone";
        $data['seo_desc']       = "Se MileStone";
        $data['seo_keywords']   = "Se MileStone";
        $data['page_title'] = "Se MileStone";
        return view('admin.milestone.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Se MileStone";
        $data['seo_desc']       = "Se MileStone";
        $data['seo_keywords']   = "Se MileStone";
        $data['page_title'] = "Se MileStone";
        $data['milestone'] = Milestone::where("id", $id)->first();
        return view('admin.milestone.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Milestone::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'MileStone Deleted Successfully.'];
        return redirect()->route('admin.milestone.create')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required',
            'job_no' => 'required',
            'job_date' => 'required',
        ]);
        
        $milestone = new Milestone();
        $milestone->type = $request->type;
        $milestone->job_no = $request->job_no;
        $milestone->job_date = $request->job_date;
        $milestone->save();
        
        $d_code = $request->d_code;
        foreach($d_code as $key => $value) {
            $milestone_documents = new MilestoneDocument();
            $milestone_documents->milestone_id = $milestone->id;
            $milestone_documents->d_code = $request->d_code[$key];
            $milestone_documents->d_name = $request->d_name[$key];
            $milestone_documents->d_anticipated = $request->d_anticipated[$key];
            $milestone_documents->d_done = $request->d_done[$key];
            $milestone_documents->d_date = $request->d_date[$key];
            $milestone_documents->d_remarks = $request->d_remarks[$key];
            $milestone_documents->d_action = $request->d_action[$key];
            $milestone_documents->d_update_on = $request->d_update_on[$key];
            $milestone_documents->d_update_by = $request->d_update_by[$key];
            $milestone_documents->d_update_log = $request->d_update_log[$key];
        }    
      
        $o_code = $request->o_code;
        foreach($o_code as $key => $value) {
            $milestone_operationals = new MilestoneOperational();
            $milestone_operationals->milestone_id = $milestone->id;
            $milestone_operationals->o_code = $request->o_code[$key];
            $milestone_operationals->o_name = $request->o_name[$key];
            $milestone_operationals->o_anticipated = $request->o_anticipated[$key];
            $milestone_operationals->o_done = $request->o_done[$key];
            $milestone_operationals->o_date = $request->o_date[$key];
            $milestone_operationals->o_remarks = $request->o_remarks[$key];
            $milestone_operationals->o_action = $request->o_action[$key];
            $milestone_operationals->o_update_on = $request->o_update_on[$key];
            $milestone_operationals->o_update_by = $request->o_update_by[$key];
            $milestone_operationals->o_update_log = $request->o_update_log[$key];
        }    
      
        $notify[] = ['success', 'Milestone Added Successfully.'];
        return redirect()->route('admin.milestone.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required',
            'job_no' => 'required',
            'job_date' => 'required',
        ]);
        
        $milestone = Milestone::where("id", $request->id)->first();
        $milestone->type = $request->type;
        $milestone->job_no = $request->job_no;
        $milestone->job_date = $request->job_date;
        $milestone->save();
        
        $notify[] = ['success', 'Milestone Updated Successfully.'];
        return redirect()->route('admin.milestone.create')->withNotify($notify);
    }
    
     public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = Milestone::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = Milestone::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = Milestone::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = Milestone::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
   
    
}
