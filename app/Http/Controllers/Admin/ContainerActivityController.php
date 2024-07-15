<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\ContainerActivity;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class ContainerActivityController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "ContainerActivity";
    //     $data['seo_desc']       = "ContainerActivity";
    //     $data['seo_keywords']   = "ContainerActivity";
    //     $data['page_title'] = "All ContainerActivity";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=ContainerActivity::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.ContainerActivity.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = ContainerActivity::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
       
        $data['seo_title']      = "Container Activity";
        $data['seo_desc']       = "Container Activity";
        $data['seo_keywords']   = "Container Activity";
        $data['page_title'] = "Container Activity";
        return view('admin.container_activity.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Container Activity";
        $data['seo_desc']       = "Edit Container Activity";
        $data['seo_keywords']   = "Edit Container Activity";
        $data['page_title'] = "Edit ContainerActivity";
        $data['containeractivity'] = ContainerActivity::where("id", $id)->first();
        return view('admin.container_activity.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = ContainerActivity::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Container Activity Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $container_activity = new ContainerActivity();
        $container_activity->fill($request->all());
        $container_activity->save();
        
        $notify[] = ['success', 'Container Activity Added Successfully.'];
        return redirect()->route('admin.container_activity.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
       
        $container_activity = ContainerActivity::where("id", $request->id)->first();
        $container_activity->inactive = $request->inactive ? $request->inactive : '';
        $container_activity->fill($request->all());
        $container_activity->update();
        
        $notify[] = ['success', 'Container Activity Updated Successfully.'];
        return redirect()->route('admin.container_activity.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = ContainerActivity::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = ContainerActivity::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = ContainerActivity::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = ContainerActivity::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
