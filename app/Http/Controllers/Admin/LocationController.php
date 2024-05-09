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

class LocationController extends Controller
{
    public function index(Request $request)
    {
        $data['seo_title']      = "Location";
        $data['seo_desc']       = "Location";
        $data['seo_keywords']   = "Location";
        $data['page_title'] = "All Location";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Location::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.location.index', $data);
    }
    
    
    public function create(Request $request)
    {
        $data['seo_title']      = "Add New Location";
        $data['seo_desc']       = "Add New Location";
        $data['seo_keywords']   = "Add New Location";
        $data['page_title'] = "Add New Location";
        return view('admin.location.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Location";
        $data['seo_desc']       = "Edit Location";
        $data['seo_keywords']   = "Edit Location";
        $data['page_title'] = "Edit Location";
        $data['location'] = Location::where("id", $id)->first();
        return view('admin.location.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Location::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Location Deleted Successfully.'];
        return redirect()->route('admin.location')->withNotify($notify);
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
