<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\SiBlAmendment;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class SiBlAmendmentController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "SiBlAmendment";
    //     $data['seo_desc']       = "SiBlAmendment";
    //     $data['seo_keywords']   = "SiBlAmendment";
    //     $data['page_title'] = "All SiBlAmendment";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=SiBlAmendment::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.SiBlAmendment.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = SiBlAmendment::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
       
        $data['seo_title']      = "Si Bl Amendment";
        $data['seo_desc']       = "Si Bl Amendment";
        $data['seo_keywords']   = "Si Bl Amendment";
        $data['page_title'] = "Si Bl Amendment";
        return view('admin.si_bl_amendment.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Si Bl Amendment";
        $data['seo_desc']       = "Edit Si Bl Amendment";
        $data['seo_keywords']   = "Edit Si Bl Amendment";
        $data['page_title'] = "Edit SiBlAmendment";
        $data['siblamendment'] = SiBlAmendment::where("id", $id)->first();
        return view('admin.security_deposite_status_report.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = SiBlAmendment::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Si Bl Amendment Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $si_bl_amendment = new SiBlAmendment();
        $si_bl_amendment->fill($request->all());
        $si_bl_amendment->save();
        
        $notify[] = ['success', 'Si Bl Amendment Added Successfully.'];
        return redirect()->route('admin.si_bl_amendment.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
       
        $si_bl_amendment = SiBlAmendment::where("id", $request->id)->first();
        $si_bl_amendment->inactive = $request->inactive ? $request->inactive : '';
        $si_bl_amendment->fill($request->all());
        $si_bl_amendment->update();
        
        $notify[] = ['success', 'Si Bl Amendment Updated Successfully.'];
        return redirect()->route('admin.si_bl_amendment.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = SiBlAmendment::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = SiBlAmendment::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = SiBlAmendment::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = SiBlAmendment::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
