<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\DetensionSummary;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class DetensionSummaryController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "DetensionSummary";
    //     $data['seo_desc']       = "DetensionSummary";
    //     $data['seo_keywords']   = "DetensionSummary";
    //     $data['page_title'] = "All DetensionSummary";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=DetensionSummary::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.DetensionSummary.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = DetensionSummary::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
       
        $data['seo_title']      = "Detension Summary";
        $data['seo_desc']       = "Detension Summary";
        $data['seo_keywords']   = "Detension Summary";
        $data['page_title'] = "Detension Summary";
        return view('admin.detension_summary.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Detension Summary";
        $data['seo_desc']       = "Edit Detension Summary";
        $data['seo_keywords']   = "Edit Detension Summary";
        $data['page_title'] = "Edit DetensionSummary";
        $data['detensionsummary'] = DetensionSummary::where("id", $id)->first();
        return view('admin.detension_summary.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = DetensionSummary::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Detension Summary Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $detension_summary = new DetensionSummary();
        $detension_summary->fill($request->all());
        $detension_summary->save();
        
        $notify[] = ['success', 'Detension Summary Added Successfully.'];
        return redirect()->route('admin.detension_summary.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
       
        $detension_summary = DetensionSummary::where("id", $request->id)->first();
        $detension_summary->inactive = $request->inactive ? $request->inactive : '';
        $detension_summary->fill($request->all());
        $detension_summary->update();
        
        $notify[] = ['success', 'Detension Summary Updated Successfully.'];
        return redirect()->route('admin.detension_summary.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = DetensionSummary::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = DetensionSummary::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = DetensionSummary::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = DetensionSummary::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
