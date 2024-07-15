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

class ArrivalNoticeController extends Controller
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
            $query = ArrivalNotice::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Arrival Notice";
        $data['seo_desc']       = "Arrival Notice";
        $data['seo_keywords']   = "Arrival Notice";
        $data['page_title'] = "Arrival Notice";
        return view('admin.arrival_notice.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Arrival Notice";
        $data['seo_desc']       = "Edit Arrival Notice";
        $data['seo_keywords']   = "Edit Arrival Notice";
        $data['page_title'] = "Edit Arrival Notice";
        $data['arrivalnotice'] = ArrivalNotice::where("id", $id)->first();
        return view('admin.arrival_notice.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = ArrivalNotice::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Arrival Notice Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            // 'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $arrival_notice = new ArrivalNotice();
        $arrival_notice ->fill($request->all());
        $arrival_notice ->save();
         
        $notify[] = ['success', 'Arrival Notice Added Successfully.'];
        return redirect()->route('admin.arrival_notice.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        $arrival_notice = ArrivalNotice::where("id", $request->id)->first();
        $arrival_notice->inactive = $request->inactive ? $request->inactive : '';
        $arrival_notice->fill($request->all());
        $arrival_notice->update();
        
        $notify[] = ['success', 'Arrival Notice Updated Successfully.'];
        return redirect()->route('admin.arrival_notice.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = ArrivalNotice::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = ArrivalNotice::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = ArrivalNotice::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = ArrivalNotice::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
