<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manifest;
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

class LoadingProgramController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Manifest";
    //     $data['seo_desc']       = "Manifest";
    //     $data['seo_keywords']   = "Manifest";
    //     $data['page_title'] = "Manifest";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Manifest::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.manifest.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=LoadingProgram::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        
        $data['seo_title']      = "Loading Program";
        $data['seo_desc']       = "Loading Program";
        $data['seo_keywords']   = "Loading Program";
        $data['page_title'] = "Loading Program";
        return view('admin.loading_program.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Loading Program";
        $data['seo_desc']       = "Edit Loading Program";
        $data['seo_keywords']   = "Edit Loading Program";
        $data['page_title'] = "Edit Loading Program";
        $data['loadingprogram'] = LoadingProgram::where("id", $id)->first();
        return view('admin.loading_program.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = LoadingProgram::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Loading Program Deleted Successfully.'];
        return redirect()->route('admin.loading_program.create')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tran' => 'required',
            'doc' => 'required',
            'year' => 'required',
        ]);
        
        $manifest = new LoadingProgram();
        $manifest->fill($request->all());
        $manifest->save();
      
        $notify[] = ['success', 'Loading Program Added Successfully.'];
        return redirect()->route('admin.loading_program.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'tran' => 'required',
            'doc' => 'required',
            'year' => 'required',
        ]);
        
        $manifest = LoadingProgram::where("id", $request->id)->first();
        $manifest->fill($request->all());
        $manifest->save();
        
        $notify[] = ['success', 'Loading Program Updated Successfully.'];
        return redirect()->route('admin.loading_program.create')->withNotify($notify);
    }
    
     
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = LoadingProgram::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = LoadingProgram::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = LoadingProgram::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = LoadingProgram::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
   
    
}
