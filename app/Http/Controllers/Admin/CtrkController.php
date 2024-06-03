<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ctrk;
use App\Models\Equipment;
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

class CtrkController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Ctrk Container";
    //     $data['seo_desc']       = "Ctrk Container";
    //     $data['seo_keywords']   = "Ctrk Container";
    //     $data['page_title'] = "All Ctrk Container";

    //     if ($request->ajax()) {
    //         $query = Voyage::Query();
    //         $query = $query->with('vessel');
    //         $query = $query->where('vessel', $request->vessel);
    //         $query = $query->orderby('id','asc')->get();
    //         return Datatables::of($query)->addIndexColumn()->make(true);
    //     }
    //     return view('admin.vessel.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = ctrk::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Ctrk Container";
        $data['seo_desc']       = "Ctrk Container";
        $data['seo_keywords']   = "Ctrk Container";
        $data['page_title'] = "Ctrk Container";
        $data['equipments'] = Equipment::get();
        return view('admin.ctrk.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Ctrk Container";
        $data['seo_desc']       = "Edit Ctrk Container";
        $data['seo_keywords']   = "Edit Ctrk Container";
        $data['page_title'] = "Edit Ctrk Container";
        $data['ctrk'] = Ctrk::where("id", $id)->first();
        return view('admin.ctrk.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Ctrk::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Ctrk Container Deleted Successfully.'];
        return redirect()->route('admin.ctrk.create')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'container_no' => ['required', 'string', 'max:255', 'unique:ctrk'],
            'size_type' => 'required',
        ]);
        
        $ctrk = new Ctrk();
        $ctrk->fill($request->all());
        $ctrk->save();
        
        $notify[] = ['success', 'Ctrk Container Added Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'container_no' => 'required',
            'size_type' => 'required',
        ]);
        
        $ctrk = Ctrk::where("id", $request->id)->first();
        $ctrk->fill($request->all());
        $ctrk->save();
        
        $notify[] = ['success', 'Ctrk Container Updated Successfully.'];
        return redirect()->route('admin.ctrk.create')->withNotify($notify);
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
                    
                    $chk = Ctrk::where('container_no', strtolower($line[0]))->count();
                    if($chk == 0){
                        $ctrk = new Ctrk();
                        $ctrk->container_no = $line[0];
                        $ctrk->size_type = $line[1];
                        $ctrk->yom = $line[2];
                        $ctrk->weight_limit = $line[3];
                        $ctrk->principal = $line[4];
                        $ctrk->principal_code = $line[5];
                        $ctrk->top = $line[6];
                        $ctrk->right = $line[7];
                        $ctrk->left = $line[8];
                        $ctrk->front = $line[9];
                        $ctrk->back = $line[10];
                        $ctrk->remarks = $line[11];
                        $ctrk->save();
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
            $data = Ctrk::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = Ctrk::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = Ctrk::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = Ctrk::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
