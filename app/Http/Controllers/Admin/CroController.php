<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cro;
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

class CroController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "CRO";
    //     $data['seo_desc']       = "CRO";
    //     $data['seo_keywords']   = "CRO";
    //     $data['page_title'] = "CRO";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Cro::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.cro.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = Cro::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "CRO";
        $data['seo_desc']       = "CRO";
        $data['seo_keywords']   = "CRO";
        $data['page_title'] = "CRO";
        $data['vessels'] = Vessel::get();
        $data['voyages'] = Voyage::get();
        return view('admin.cro.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit CRO";
        $data['seo_desc']       = "Edit CRO";
        $data['seo_keywords']   = "Edit CRO";
        $data['page_title'] = "Edit CRO";
        $data['cro'] = Cro::where("id", $id)->first();
        return view('admin.cro.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Cro::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'CRO Deleted Successfully.'];
        return redirect()->route('admin.cro')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cro_no' => 'required',
            'cro_type' => 'required',
            'job_number' => 'required',
            'client' => 'required',
            'issue_date' => 'required',
        ]);
        
        $cro = new Cro();
        $cro->cro_no = $request->cro_no;
        $cro->cro_type = $request->cro_type;
        $cro->job_number = $request->job_number;
        $cro->client = $request->client;
        $cro->issue_date = $request->issue_date;
        $cro->cro_valid_for = $request->cro_valid_for;
        $cro->ref_number = $request->ref_number;
        $cro->equip_qty = $request->equip_qty;
        $cro->size_type = $request->size_type;
        $cro->overseas_agent = $request->overseas_agent;
        $cro->clearing_agent = $request->clearing_agent;
        $cro->shipper = $request->shipper;
        $cro->pickup_location = $request->pickup_location;
        $cro->port_of_loading = $request->port_of_loading;
        $cro->port_of_discharge = $request->port_of_discharge;
        $cro->final_destination = $request->final_destination;
        $cro->commodity = $request->commodity;
        $cro->terminal = $request->terminal;
        $cro->empty_depot = $request->empty_depot;
        $cro->transporter = $request->transporter;
        $cro->book_no = $request->book_no;
        $cro->gate_pass = $request->gate_pass;
        $cro->date = $request->date;
        $cro->letter_no = $request->letter_no;
        $cro->licence_no = $request->licence_no;
        $cro->job_no = $request->job_no;
        $cro->expiry_date = $request->expiry_date;
        $cro->shipping_agent = $request->shipping_agent;
        $cro->cargo_type = $request->cargo_type;
        $cro->vessel = $request->vessel;
        $cro->voyage = $request->voyage;
        $cro->sailing_date = $request->sailing_date;
        $cro->manual = $request->manual;
        $cro->upload = $request->upload;
        $cro->print_logo = $request->print_logo;
        $cro->continue_mode = $request->continue_mode;
        $cro->haulage = $request->haulage;
        $cro->save();
      
        $notify[] = ['success', 'CRO Added Successfully.'];
        return redirect()->route('admin.cro.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'cro_no' => 'required',
            'cro_type' => 'required',
            'job_number' => 'required',
            'client' => 'required',
            'issue_date' => 'required',
        ]);
        
        $cro = Cro::where("id", $request->id)->first();
        $cro->cro_no = $request->cro_no;
        $cro->cro_type = $request->cro_type;
        $cro->job_number = $request->job_number;
        $cro->client = $request->client;
        $cro->issue_date = $request->issue_date;
        $cro->cro_valid_for = $request->cro_valid_for;
        $cro->ref_number = $request->ref_number;
        $cro->equip_qty = $request->equip_qty;
        $cro->size_type = $request->size_type;
        $cro->overseas_agent = $request->overseas_agent;
        $cro->clearing_agent = $request->clearing_agent;
        $cro->shipper = $request->shipper;
        $cro->pickup_location = $request->pickup_location;
        $cro->port_of_loading = $request->port_of_loading;
        $cro->port_of_discharge = $request->port_of_discharge;
        $cro->final_destination = $request->final_destination;
        $cro->commodity = $request->commodity;
        $cro->terminal = $request->terminal;
        $cro->empty_depot = $request->empty_depot;
        $cro->transporter = $request->transporter;
        $cro->book_no = $request->book_no;
        $cro->gate_pass = $request->gate_pass;
        $cro->date = $request->date;
        $cro->letter_no = $request->letter_no;
        $cro->licence_no = $request->licence_no;
        $cro->job_no = $request->job_no;
        $cro->expiry_date = $request->expiry_date;
        $cro->shipping_agent = $request->shipping_agent;
        $cro->cargo_type = $request->cargo_type;
        $cro->vessel = $request->vessel;
        $cro->voyage = $request->voyage;
        $cro->sailing_date = $request->sailing_date;
        $cro->manual = $request->manual;
        $cro->upload = $request->upload;
        $cro->print_logo = $request->print_logo;
        $cro->continue_mode = $request->continue_mode;
        $cro->haulage = $request->haulage;
        $cro->save();
        
        $notify[] = ['success', 'CRO Updated Successfully.'];
        return redirect()->route('admin.cro.create')->withNotify($notify);
    }
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = Cro::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = Cro::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = Cro::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = Cro::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
   
    
}
