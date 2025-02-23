<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeQuery;
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

class QueryController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Se Query";
    //     $data['seo_desc']       = "Se Query";
    //     $data['seo_keywords']   = "Se Query";
    //     $data['page_title'] = "Se Query";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Query::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.query.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = SeQuery::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Se Query";
        $data['seo_desc']       = "Se Query";
        $data['seo_keywords']   = "Se Query";
        $data['page_title'] = "Se Query";
        return view('admin.query.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Se Query";
        $data['seo_desc']       = "Edit Se Query";
        $data['seo_keywords']   = "Edit Se Query";
        $data['page_title'] = "Edit Se Query";
        $data['query'] = SeQuery::where("id", $id)->first();
        return view('admin.query.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = SeQuery::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Se Query Deleted Successfully.'];
        return redirect()->route('admin.query.create')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'operation_type' => 'required',
            'file' => ['required', 'string', 'max:255', 'alpha', 'unique:se_query'],
        ]);
        
        
        $se_query = new SeQuery();
        $se_query->fill($request->all());
        $se_query->save();
        
        $notify[] = ['success', 'Se Query Added Successfully.'];
        return redirect()->route('admin.query.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'operation_type' => 'required',
            'file' => 'required',
        ]);
        
        $se_query = SeQuery::where("id", $request->id)->first();
        $se_query->fill($request->all());
        $se_query->update();
        
        $notify[] = ['success', 'Se Query Updated Successfully.'];
        return redirect()->route('admin.query.create')->withNotify($notify);
    }
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = SeQuery::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = SeQuery::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = SeQuery::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = SeQuery::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
   
    
}
