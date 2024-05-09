<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\Customer;
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

class VesselController extends Controller
{
    public function index(Request $request)
    {
        $data['seo_title']      = "Vessel";
        $data['seo_desc']       = "Vessel";
        $data['seo_keywords']   = "Vessel";
        $data['page_title'] = "All Vessel";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Vessel::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.quotation.index', $data);
    }
    
    
    public function create(Request $request)
    {
        $data['seo_title']      = "Add New Vessel";
        $data['seo_desc']       = "Add New Vessel";
        $data['seo_keywords']   = "Add New Vessel";
        $data['page_title'] = "Add New Vessel";
        return view('admin.vessel.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Vessel";
        $data['seo_desc']       = "Edit Vessel";
        $data['seo_keywords']   = "Edit Vessel";
        $data['page_title'] = "Edit Vessel";
        $data['vessel'] = Vessel::where("id", $id)->first();
        return view('admin.vessel.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Vessel::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Vessel Deleted Successfully.'];
        return redirect()->route('admin.vessel')->withNotify($notify);
    }
    
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'quotation_no' => 'required',
    //         'date' => 'required',
    //     ]);
        
    //     $quotation = new Quotation();
    //     $quotation->fill($request->all());
    //     $quotation->save();
        
    //     $notify[] = ['success', 'Quotation Added Successfully.'];
    //     return redirect()->route('admin.quotation')->withNotify($notify);
    // }
    
    // public function update(Request $request)
    // {
    //     $validated = $request->validate([
    //         'quotation_no' => 'required',
    //         'date' => 'required',
    //     ]);
        
    //     $quotation = Quotation::where("id", $request->id)->first();
    //     $quotation->fill($request->all());
    //     $quotation->save();
        
    //     $notify[] = ['success', 'Quotation Updated Successfully.'];
    //     return redirect()->route('admin.quotation')->withNotify($notify);
    // }
    
}
