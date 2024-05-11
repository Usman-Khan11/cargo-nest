<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

class EquipmentController extends Controller
{
    public function index(Request $request)
    {
        $data['seo_title']      = "Equipment Size Type";
        $data['seo_desc']       = "Equipment Size Type";
        $data['seo_keywords']   = "Equipment Size Type";
        $data['page_title'] = "Equipment Size Type";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Equipment::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.equipment.index', $data);
    }
    
    
    public function create(Request $request)
    {
        $data['seo_title']      = "Equipment Size Type";
        $data['seo_desc']       = "Equipment Size Type";
        $data['seo_keywords']   = "Equipment Size Type";
        $data['page_title'] = "Equipment Size Type";
        return view('admin.equipment.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Equipment Size Type";
        $data['seo_desc']       = "Edit Equipment Size Type";
        $data['seo_keywords']   = "Edit Equipment Size Type";
        $data['page_title'] = "Edit Equipment Size Type";
        $data['equipment'] = Equipment::where("id", $id)->first();
        return view('admin.equipment.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Equipment::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Equipment Size Type Deleted Successfully.'];
        return redirect()->route('admin.equipment')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'size' => 'required',
            'type' => 'required',
        ]);
        
        $equipment = new Equipment();
        $equipment->fill($request->all());
        $equipment->save();
        
        $notify[] = ['success', 'Equipment Size Type Added Successfully.'];
        return redirect()->route('admin.equipment')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'size' => 'required',
            'type' => 'required',
        ]);
        
        $equipment = Equipment::where("id", $request->id)->first();
        $equipment->fill($request->all());
        $equipment->save();
        
        $notify[] = ['success', 'Equipment Size Type Updated Successfully.'];
        return redirect()->route('admin.equipment')->withNotify($notify);
    }
    
}
