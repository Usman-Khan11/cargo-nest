<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Packages;
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

class PackagesController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Packages Coding";
    //     $data['seo_desc']       = "Packages Coding";
    //     $data['seo_keywords']   = "Packages Coding";
    //     $data['page_title'] = "Packages Coding";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Packages::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.packages.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Packages::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        
        $data['seo_title']      = "Packages Coding";
        $data['seo_desc']       = "Packages Coding";
        $data['seo_keywords']   = "Packages Coding";
        $data['page_title'] = "Packages Coding";
        return view('admin.packages.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Packages Coding";
        $data['seo_desc']       = "Edit Packages Coding";
        $data['seo_keywords']   = "Edit Packages Coding";
        $data['page_title'] = "Edit Equipment Size Type";
        $data['packages'] = Packages::where("id", $id)->first();
        return view('admin.packages.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Packages::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Packages Coding Deleted Successfully.'];
        return redirect()->route('admin.packages')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pack_code' => 'required',
            'pack_name' => 'required',
        ]);
        
        $packages = new Packages();
        $packages->fill($request->all());
        $packages->save();
        
        $notify[] = ['success', 'Packages Added Successfully.'];
        return redirect()->route('admin.packages.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'pack_code' => 'required',
            'pack_name' => 'required',
        ]);
        
        $packages = Packages::where("id", $request->id)->first();
        $packages->default = $request->default ? $request->default : '';
        $packages->fill($request->all());
        $packages->save();
        
        $notify[] = ['success', 'Packages Updated Successfully.'];
        return redirect()->route('admin.packages.create')->withNotify($notify);
    }
    
}
