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

class ManifestController extends Controller
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
            $query=Manifest::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        
        $data['seo_title']      = "Manifest";
        $data['seo_desc']       = "Manifest";
        $data['seo_keywords']   = "Manifest";
        $data['page_title'] = "Manifest";
        return view('admin.manifest.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Manifest";
        $data['seo_desc']       = "Edit Manifest";
        $data['seo_keywords']   = "Edit Manifest";
        $data['page_title'] = "Edit Manifest";
        $data['manifest'] = Manifest::where("id", $id)->first();
        return view('admin.manifest.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Manifest::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Manifest Deleted Successfully.'];
        return redirect()->route('admin.manifest')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tran' => 'required',
            'doc' => 'required',
            'year' => 'required',
        ]);
        
        $manifest = new Manifest();
        $manifest->fill($request->all());
        $manifest->save();
      
        $notify[] = ['success', 'Manifest Added Successfully.'];
        return redirect()->route('admin.manifest.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'tran' => 'required',
            'doc' => 'required',
            'year' => 'required',
        ]);
        
        $manifest = Manifest::where("id", $request->id)->first();
        $manifest->fill($request->all());
        $manifest->save();
        
        $notify[] = ['success', 'Manifest Updated Successfully.'];
        return redirect()->route('admin.manifest.create')->withNotify($notify);
    }
   
    
}
