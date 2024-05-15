<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
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
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Location";
    //     $data['seo_desc']       = "Location";
    //     $data['seo_keywords']   = "Location";
    //     $data['page_title'] = "Location";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Location::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.location.index', $data);
    // }
    
    
    public function create(Request $request)
    {
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
        
        $data['seo_title']      = "Location";
        $data['seo_desc']       = "Location";
        $data['seo_keywords']   = "Location";
        $data['page_title'] = "Location";
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
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'location' => 'required',
            'location_check' => 'required',
        ]);
        
        $location = new Location();
        $location->location = $request->location;
        $location->location_check=json_encode($request->location_check);
        $location->co_ordinates = $request->co_ordinates;
        $location->inactive = $request->inactive;
        $location->latitude = $request->latitude;
        $location->state = $request->state;
        $location->longitude = $request->longitude;
        $location->phone_prefix = $request->phone_prefix;
        $location->epass_code = $request->epass_code;
        $location->country_region = $request->country_region;
        
        // $location->fill($request->all());
        $location->save();
        
        $notify[] = ['success', 'Location Added Successfully.'];
        return redirect()->route('admin.location.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'location' => 'required',
            //'location_check' => 'required',
        ]);
        
        $location = Location::where("id", $request->id)->first();
        $location->inactive = $request->inactive ? $request->inactive : '';
        $location->fill($request->all());
        $location->save();
        
        $notify[] = ['success', 'Location Updated Successfully.'];
        return redirect()->route('admin.location.create')->withNotify($notify);
    }
    
}
