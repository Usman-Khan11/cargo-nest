<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voyage;
use App\Models\Vessel;
use App\Models\VoyageDetail;
use App\Models\VoyageLocal;
use App\Models\Currency;
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

class VoyageController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Voyage";
    //     $data['seo_desc']       = "Voyage";
    //     $data['seo_keywords']   = "Voyage";
    //     $data['page_title'] = "All Voyage";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Voyage::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.voyage.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = Voyage::Query();
            $query = $query->with('vessel');
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        
        $data['seo_title']      = "Voyage";
        $data['seo_desc']       = "Voyage";
        $data['seo_keywords']   = "Voyage";
        $data['page_title'] = "Voyage";
        $data['vessels'] = Vessel::get();
        $data['currencies'] = Currency::get();
        return view('admin.voyage.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Voyage";
        $data['seo_desc']       = "Edit Voyage";
        $data['seo_keywords']   = "Edit Voyage";
        $data['page_title'] = "Edit Voyage";
        $data['voyage'] = Voyage::where("id", $id)->first();
        return view('admin.voyage.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Voyage::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Voyage Deleted Successfully.'];
        return redirect()->route('admin.voyage')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vessel' => 'required',
            'voy' => ['required', 'string', 'max:255', 'unique:voyages'],
        ]);
        
        $voyage = new Voyage();
        $voyage->fill($request->all());
        $voyage->save();
        
        $currency = $request->currency;
        foreach($currency as $key => $value) {
            $voyage_detail = new VoyageDetail();
            $voyage_detail->voyage_id = $voyage->id;
            $voyage_detail->currency = $request->currency[$key];
            $voyage_detail->selling = $request->selling[$key];
            $voyage_detail->buying = $request->buying[$key];
            $voyage_detail->save();
        }  
        
        $code = $request->code;
        foreach($code as $key => $value) {
            $voyage_local = new VoyageLocal();
            $voyage_local->voyage_id = $voyage->id;
            $voyage_local->code = $request->code[$key];
            $voyage_local->local_port = $request->local_port[$key];
            $voyage_local->arrival_date = $request->arrival_date[$key];
            $voyage_local->sailing_date = $request->sailing_date[$key];
            $voyage_local->vir_no = $request->vir_no[$key];
            $voyage_local->egm_no = $request->egm_no[$key];
            $voyage_local->egm_date = $request->egm_date[$key];
            $voyage_local->code2 = $request->code2[$key];
            $voyage_local->slot_operator = $request->slot_operator[$key];
            $voyage_local->scn = $request->scn[$key];
            $voyage_local->sa_code = $request->sa_code[$key];
            $voyage_local->opening_date = $request->opening_date[$key];
            $voyage_local->opening_time = $request->opening_time[$key];
            $voyage_local->closing_date = $request->closing_date[$key];
            $voyage_local->closing_time = $request->closing_time[$key];
            $voyage_local->save();
        }    
        
        $notify[] = ['success', 'Voyage Added Successfully.'];
        return redirect()->route('admin.voyage.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'vessel' => 'required',
            'voy' => 'required',
        ]);
        
        $voyage = Voyage::where("id", $request->id)->first();
        $voyage->fill($request->all());
        $voyage->save();
        
        $notify[] = ['success', 'Voyage Updated Successfully.'];
        return redirect()->route('admin.voyage.create')->withNotify($notify);
    }
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = Voyage::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = Voyage::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = Voyage::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = Voyage::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
