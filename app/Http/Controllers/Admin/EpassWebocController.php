<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Commodity;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class EpassWebocController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Commodity";
    //     $data['seo_desc']       = "Commodity";
    //     $data['seo_keywords']   = "Commodity";
    //     $data['page_title'] = "All Commodity";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Commodity::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.commodity.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = EpassWeboc::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Epass Weboc";
        $data['seo_desc']       = "Epass Weboc";
        $data['seo_keywords']   = "Epass Weboc";
        $data['page_title'] = "Epass Weboc";
        return view('admin.epass_weboc.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Epass Weboc";
        $data['seo_desc']       = "Edit Epass Weboc";
        $data['seo_keywords']   = "Edit Epass Weboc";
        $data['page_title'] = "Edit Epass Weboc";
        $data['epassweboc'] = EpassWeboc::where("id", $id)->first();
        return view('admin.epass_weboc.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = EpassWeboc::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Epass Weboc Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            // 'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $epass_weboc = new EpassWeboc();
        $epass_weboc ->fill($request->all());
        $epass_weboc ->save();
         
        $notify[] = ['success', 'Epass Weboc Added Successfully.'];
        return redirect()->route('admin.epass_weboc.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        $epass_weboc = EpassWeboc::where("id", $request->id)->first();
        $epass_weboc->inactive = $request->inactive ? $request->inactive : '';
        $epass_weboc->fill($request->all());
        $epass_weboc->update();
        
        $notify[] = ['success', 'Epass Weboc Updated Successfully.'];
        return redirect()->route('admin.epass_weboc.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = EpassWeboc::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = EpassWeboc::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = EpassWeboc::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = EpassWeboc::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
