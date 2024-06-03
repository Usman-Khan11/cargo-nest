<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stuffing;
use App\Models\Vessel;
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

class StuffingController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Stuffing";
    //     $data['seo_desc']       = "Stuffing";
    //     $data['seo_keywords']   = "Stuffing";
    //     $data['page_title'] = "All Stuffing";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Stuffing::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.stuffing.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Stuffing::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        
        $data['seo_title']      = "Stuffing";
        $data['seo_desc']       = "Stuffing";
        $data['seo_keywords']   = "Stuffing";
        $data['page_title'] = "Stuffing";
        $data['vessels'] = Vessel::get();
        return view('admin.stuffing.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Stuffing";
        $data['seo_desc']       = "Edit Stuffing";
        $data['seo_keywords']   = "Edit Stuffing";
        $data['page_title'] = "Edit Stuffing";
        $data['stuffing'] = Stuffing::where("id", $id)->first();
        return view('admin.stuffing.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Stuffing::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Stuffing Deleted Successfully.'];
        return redirect()->route('admin.stuffing')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tran_number' => 'required',
            'date' => 'required',
        ]);
        
        $stuffing = new Stuffing();
        $stuffing->fill($request->all());
        $stuffing->save();
     
        $notify[] = ['success', 'Stuffing Added Successfully.'];
        return redirect()->route('admin.stuffing.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'tran_number' => 'required',
            'date' => 'required',
        ]);
        
        $stuffing = Stuffing::where("id", $request->id)->first();
        $stuffing->fill($request->all());
        $stuffing->save();
        
        $notify[] = ['success', 'Stuffing Updated Successfully.'];
        return redirect()->route('admin.stuffing.create')->withNotify($notify);
    }
    
     
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = Stuffing::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = Stuffing::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = Stuffing::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = Stuffing::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
    
}
