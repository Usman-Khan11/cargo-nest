<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\VesselArrivalDepartureReport;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class VesselArrivalDepartureReportController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "VesselArrivalDepartureReport";
    //     $data['seo_desc']       = "VesselArrivalDepartureReport";
    //     $data['seo_keywords']   = "VesselArrivalDepartureReport";
    //     $data['page_title'] = "All VesselArrivalDepartureReport";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=VesselArrivalDepartureReport::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.VesselArrivalDepartureReport.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = VesselArrivalDepartureReport::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
       
        $data['seo_title']      = "Vessel Arrival Departure Report";
        $data['seo_desc']       = "Vessel Arrival Departure Report";
        $data['seo_keywords']   = "Vessel Arrival Departure Report";
        $data['page_title'] = "Vessel Arrival Departure Report";
        return view('admin.vessel_arrival_departure_report.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Vessel Arrival Departure Report";
        $data['seo_desc']       = "Edit Vessel Arrival Departure Report";
        $data['seo_keywords']   = "Edit Vessel Arrival Departure Report";
        $data['page_title'] = "Edit VesselArrivalDepartureReport";
        $data['vesselarrivaldeparturereport'] = VesselArrivalDepartureReport::where("id", $id)->first();
        return view('admin.vessel_arrival_departure_report.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = VesselArrivalDepartureReport::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Vessel Arrival Departure Report Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $vessel_arrival_departure_report = new VesselArrivalDepartureReport();
        $vessel_arrival_departure_report->fill($request->all());
        $vessel_arrival_departure_report->save();
        
        $notify[] = ['success', 'Vessel Arrival Departure Report Added Successfully.'];
        return redirect()->route('admin.vessel_arrival_departure_report.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
       
        $vessel_arrival_departure_report = VesselArrivalDepartureReport::where("id", $request->id)->first();
        $vessel_arrival_departure_report->inactive = $request->inactive ? $request->inactive : '';
        $vessel_arrival_departure_report->fill($request->all());
        $vessel_arrival_departure_report->update();
        
        $notify[] = ['success', 'Vessel Arrival Departure Report Updated Successfully.'];
        return redirect()->route('admin.vessel_arrival_departure_report.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = VesselArrivalDepartureReport::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = VesselArrivalDepartureReport::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = VesselArrivalDepartureReport::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = VesselArrivalDepartureReport::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
