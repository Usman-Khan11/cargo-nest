<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\EquipmentInvoiceProcess;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class EquipmentInvoiceProcessController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "EquipmentInvoiceProcess";
    //     $data['seo_desc']       = "EquipmentInvoiceProcess";
    //     $data['seo_keywords']   = "EquipmentInvoiceProcess";
    //     $data['page_title'] = "All EquipmentInvoiceProcess";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=EquipmentInvoiceProcess::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.EquipmentInvoiceProcess.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = EquipmentInvoiceProcess::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
       
        $data['seo_title']      = "Equipment Invoice Process";
        $data['seo_desc']       = "Equipment Invoice Process";
        $data['seo_keywords']   = "Equipment Invoice Process";
        $data['page_title'] = "Equipment Invoice Process";
        return view('admin.equipment_invoice_process.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Equipment Invoice Process";
        $data['seo_desc']       = "Edit Equipment Invoice Process";
        $data['seo_keywords']   = "Edit Equipment Invoice Process";
        $data['page_title'] = "Edit EquipmentInvoiceProcess";
        $data['equipmentinvoiceprocess'] = EquipmentInvoiceProcess::where("id", $id)->first();
        return view('admin.equipment_invoice_process.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = EquipmentInvoiceProcess::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Equipment Invoice Process Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $equipment_invoice_process = new EquipmentInvoiceProcess();
        $equipment_invoice_process->fill($request->all());
        $equipment_invoice_process->save();
        
        $notify[] = ['success', 'Equipment Invoice Process Added Successfully.'];
        return redirect()->route('admin.equipment_invoice_process.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
       
        $equipment_invoice_process = EquipmentInvoiceProcess::where("id", $request->id)->first();
        $equipment_invoice_process->inactive = $request->inactive ? $request->inactive : '';
        $equipment_invoice_process->fill($request->all());
        $equipment_invoice_process->update();
        
        $notify[] = ['success', 'Equipment Invoice Process Updated Successfully.'];
        return redirect()->route('admin.equipment_invoice_process.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = EquipmentInvoiceProcess::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = EquipmentInvoiceProcess::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = EquipmentInvoiceProcess::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = EquipmentInvoiceProcess::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
