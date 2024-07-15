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

class AdvanceDetensionController extends Controller
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
            $query = AdvanceDetension::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Advance Detension";
        $data['seo_desc']       = "Advance Detension";
        $data['seo_keywords']   = "Advance Detension";
        $data['page_title'] = "Advance Detension";
        return view('admin.advance_detension.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Advance Detension";
        $data['seo_desc']       = "Edit Advance Detension";
        $data['seo_keywords']   = "Edit Advance Detension";
        $data['page_title'] = "Edit Advance Detension";
        $data['advancedetension'] = AdvanceDetension::where("id", $id)->first();
        return view('admin.advance_detension.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = AdvanceDetension::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Advance Detension Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            // 'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $advance_detension = new AdvanceDetension();
        $advance_detension ->fill($request->all());
        $advance_detension ->save();
         
        $notify[] = ['success', 'Advance Detension Added Successfully.'];
        return redirect()->route('admin.advance_detension.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        $advance_detension = AdvanceDetension::where("id", $request->id)->first();
        $advance_detension->inactive = $request->inactive ? $request->inactive : '';
        $advance_detension->fill($request->all());
        $advance_detension->update();
        
        $notify[] = ['success', 'Advance Detension Updated Successfully.'];
        return redirect()->route('admin.advance_detension.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = AdvanceDetension::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = AdvanceDetension::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = AdvanceDetension::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = AdvanceDetension::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
