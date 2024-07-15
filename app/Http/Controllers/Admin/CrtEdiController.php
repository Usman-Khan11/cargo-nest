<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CrtEdi;
use App\Models\Vessel;
use App\Models\Voyage;
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

class CrtEdiController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "CrtEdi";
    //     $data['seo_desc']       = "CrtEdi";
    //     $data['seo_keywords']   = "CrtEdi";
    //     $data['page_title'] = "CrtEdi";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=CrtEdi::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.CrtEdi.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = CrtEdi::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "CrtEdi";
        $data['seo_desc']       = "CrtEdi";
        $data['seo_keywords']   = "CrtEdi";
        $data['page_title'] = "Crt Edi";
        return view('admin.crt_edi.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit CrtEdi";
        $data['seo_desc']       = "Edit CrtEdi";
        $data['seo_keywords']   = "Edit CrtEdi";
        $data['page_title'] = "Edit Crt Edi";
        $data['CrtEdi'] = CrtEdi::where("id", $id)->first();
        return view('admin.crt_edi.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = CrtEdi::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Crt Edi Deleted Successfully.'];
        return redirect()->route('admin.crt_edi.create')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'CrtEdi_no' => 'required',
            'CrtEdi_type' => 'required',
            'job_number' => 'required',
            'client' => 'required',
            'issue_date' => 'required',
        ]);
        
        $CrtEdi = new CrtEdi();
        $CrtEdi->CrtEdi_no = $request->CrtEdi_no;
        $CrtEdi->CrtEdi_type = $request->CrtEdi_type;
        $CrtEdi->save();
      
        $notify[] = ['success', 'Crt Edi Added Successfully.'];
        return redirect()->route('admin.crt_edi.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'CrtEdi_no' => 'required',
            'CrtEdi_type' => 'required',
            'job_number' => 'required',
            'client' => 'required',
            'issue_date' => 'required',
        ]);
        
        $CrtEdi = CrtEdi::where("id", $request->id)->first();
        $CrtEdi->CrtEdi_no = $request->CrtEdi_no;
        $CrtEdi->save();
        
        $notify[] = ['success', 'Crt Edi Updated Successfully.'];
        return redirect()->route('admin.crt_edi.create')->withNotify($notify);
    }
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = CrtEdi::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = CrtEdi::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = CrtEdi::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = CrtEdi::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
   
    
}
