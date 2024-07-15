<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\AutoDetension;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class AutoDetensionController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "AutoDetension";
    //     $data['seo_desc']       = "AutoDetension";
    //     $data['seo_keywords']   = "AutoDetension";
    //     $data['page_title'] = "All AutoDetension";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=AutoDetension::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.AutoDetension.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = AutoDetension::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
       
        $data['seo_title']      = "Auto Detension";
        $data['seo_desc']       = "Auto Detension";
        $data['seo_keywords']   = "Auto Detension";
        $data['page_title'] = "Auto Detension";
        return view('admin.auto_detension.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Auto Detension";
        $data['seo_desc']       = "Edit Auto Detension";
        $data['seo_keywords']   = "Edit Auto Detension";
        $data['page_title'] = "Edit AutoDetension";
        $data['autodetension'] = AutoDetension::where("id", $id)->first();
        return view('admin.auto_detension.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = AutoDetension::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Auto Detension Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $auto_detension = new AutoDetension();
        $auto_detension->fill($request->all());
        $auto_detension->save();
        
        $notify[] = ['success', 'Auto Detension Added Successfully.'];
        return redirect()->route('admin.auto_detension.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
       
        $auto_detension = AutoDetension::where("id", $request->id)->first();
        $auto_detension->inactive = $request->inactive ? $request->inactive : '';
        $auto_detension->fill($request->all());
        $auto_detension->update();
        
        $notify[] = ['success', 'Auto Detension Updated Successfully.'];
        return redirect()->route('admin.auto_detension.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = AutoDetension::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = AutoDetension::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = AutoDetension::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = AutoDetension::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
