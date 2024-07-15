<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\BulkDeleteContainerActivity;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class BulkDeleteContainerActivityController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "BulkDeleteContainerActivity";
    //     $data['seo_desc']       = "BulkDeleteContainerActivity";
    //     $data['seo_keywords']   = "BulkDeleteContainerActivity";
    //     $data['page_title'] = "All BulkDeleteContainerActivity";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=BulkDeleteContainerActivity::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.BulkDeleteContainerActivity.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = BulkDeleteContainerActivity::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
       
        $data['seo_title']      = "Bulk Delete Container Activity";
        $data['seo_desc']       = "Bulk Delete Container Activity";
        $data['seo_keywords']   = "Bulk Delete Container Activity";
        $data['page_title'] = "Bulk Delete Container Activity";
        return view('admin.bulk_delete_container_activity.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Bulk Delete Container Activity";
        $data['seo_desc']       = "Edit Bulk Delete Container Activity";
        $data['seo_keywords']   = "Edit Bulk Delete Container Activity";
        $data['page_title'] = "Edit BulkDeleteContainerActivity";
        $data['bulkdeletecontaineractivity'] = BulkDeleteContainerActivity::where("id", $id)->first();
        return view('admin.bulk_delete_container_activity.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = BulkDeleteContainerActivity::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Bulk Delete Container Activity Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $bulk_delete_container_activity = new BulkDeleteContainerActivity();
        $bulk_delete_container_activity->fill($request->all());
        $bulk_delete_container_activity->save();
        
        $notify[] = ['success', 'Bulk Delete Container Activity Added Successfully.'];
        return redirect()->route('admin.bulk_delete_container_activity.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
       
        $bulk_delete_container_activity = BulkDeleteContainerActivity::where("id", $request->id)->first();
        $bulk_delete_container_activity->inactive = $request->inactive ? $request->inactive : '';
        $bulk_delete_container_activity->fill($request->all());
        $bulk_delete_container_activity->update();
        
        $notify[] = ['success', 'Bulk Delete Container Activity Updated Successfully.'];
        return redirect()->route('admin.bulk_delete_container_activity.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = BulkDeleteContainerActivity::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = BulkDeleteContainerActivity::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = BulkDeleteContainerActivity::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = BulkDeleteContainerActivity::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
