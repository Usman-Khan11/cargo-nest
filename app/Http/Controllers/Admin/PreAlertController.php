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

class PreAlertController extends Controller
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
            $query = PreAlert::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Pre Alert Input";
        $data['seo_desc']       = "Pre Alert Input";
        $data['seo_keywords']   = "Pre Alert Input";
        $data['page_title'] = "Pre Alert Input";
        return view('admin.pre_alert_input.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Pre Alert Input";
        $data['seo_desc']       = "Edit Pre Alert Input";
        $data['seo_keywords']   = "Edit Pre Alert Input";
        $data['page_title'] = "Edit Pre Alert Input";
        $data['prealert'] = PreAlert::where("id", $id)->first();
        return view('admin.pre_alert_input.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = PreAlert::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Pre Alert Input Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            // 'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $pre_alert_input = new PreAlert();
        $pre_alert_input ->fill($request->all());
        $pre_alert_input ->save();
         
        $notify[] = ['success', 'Pre Alert Input Added Successfully.'];
        return redirect()->route('admin.pre_alert_input.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        $pre_alert_input = PreAlert::where("id", $request->id)->first();
        $pre_alert_input->inactive = $request->inactive ? $request->inactive : '';
        $pre_alert_input->fill($request->all());
        $pre_alert_input->update();
        
        $notify[] = ['success', 'Pre Alert Input Updated Successfully.'];
        return redirect()->route('admin.pre_alert_input.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = PreAlert::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = PreAlert::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = PreAlert::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = PreAlert::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
