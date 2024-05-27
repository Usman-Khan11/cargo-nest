<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

class VesselController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Vessel";
    //     $data['seo_desc']       = "Vessel";
    //     $data['seo_keywords']   = "Vessel";
    //     $data['page_title'] = "All Vessel";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Vessel::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.vessel.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = Vessel::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $check_last_code = Vessel::orderBy('id', 'desc')->first();
        if (!empty($check_last_code)) {
            $num = $check_last_code->vessel_code;
            $data['code'] = $num + 1;
        } else {
            $data['code'] = 1001;
        }
        
        $data['seo_title']      = "Vessel";
        $data['seo_desc']       = "Vessel";
        $data['seo_keywords']   = "Vessel";
        $data['page_title'] = "Vessel";
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
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vessel_code' => 'required',
            'vessel_name' => ['required', 'string', 'max:255', 'unique:vessels'],
        ]);
        
        $vessel = new Vessel();
        $vessel->fill($request->all());
        $vessel->save();
        
        $notify[] = ['success', 'Vessel Added Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'vessel_code' => 'required',
            'vessel_name' => 'required',
        ]);
        
        $vessel = Vessel::where("id", $request->id)->first();
        $vessel->fill($request->all());
        $vessel->save();
        
        $notify[] = ['success', 'Vessel Updated Successfully.'];
        return redirect()->route('admin.vessel.create')->withNotify($notify);
    }
    
    public function bulkUpload(Request $request)
    {
        $file = $request->file('import_file');
        $tempPath = $file->getPathname();
        $extension = $file->getClientOriginalExtension();
        $i = 0;

        if ($extension == "csv"){
            $handle = fopen($tempPath, 'r');
            while (($line = fgetcsv($handle, 10000, ",")) !== FALSE) {
                if($i > 0) {
                    
                    $check_last_code = Vessel::orderBy('id', 'desc')->first();
                    if (!empty($check_last_code)) {
                        $num = $check_last_code->vessel_code;
                        $check_last_code = $num + 1;
                    } else {
                        $check_last_code = 1001;
                    }
                    
                    $chk = Vessel::where('vessel_name', strtolower($line[0]))->count();
                    if($chk == 0){
                        $vessel = new Vessel();
                        $vessel->vessel_code = $check_last_code;
                        $vessel->vessel_name = $line[0];
                        $vessel->ship_id = $line[1];
                        $vessel->owner = $line[2];
                        $vessel->principle_code = $line[3];
                        $vessel->call_sign = $line[4];
                        $vessel->grt = $line[5];
                        $vessel->nrt = $line[6];
                        $vessel->imo_no = $line[7];
                        $vessel->country_registered = $line[8];
                        $vessel->save();
                    }
                }
                $i++;
            }
            fclose($handle);
            return ['success', 'Upload Successfully.'];
        } else {
            return ['error', 'Only csv file allowed.'];
        }
        
        return ['error', 'Something went wrong!'];
    }
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = Vessel::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = Vessel::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = Vessel::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = Vessel::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
