<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\SiEquipmentInvoiceOther;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class SiEquipmentInvoiceOtherController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "SiEquipmentInvoiceOther";
    //     $data['seo_desc']       = "SiEquipmentInvoiceOther";
    //     $data['seo_keywords']   = "SiEquipmentInvoiceOther";
    //     $data['page_title'] = "All SiEquipmentInvoiceOther";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=SiEquipmentInvoiceOther::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.SiEquipmentInvoiceOther.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = SiEquipmentInvoiceOther::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
       
        $data['seo_title']      = "Si Equipment Invoice Other";
        $data['seo_desc']       = "Si Equipment Invoice Other";
        $data['seo_keywords']   = "Si Equipment Invoice Other";
        $data['page_title'] = "Si Equipment Invoice Other";
        return view('admin.si_equipment_invoice_other_charges.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Si Equipment Invoice Other";
        $data['seo_desc']       = "Edit Si Equipment Invoice Other";
        $data['seo_keywords']   = "Edit Si Equipment Invoice Other";
        $data['page_title'] = "Edit SiEquipmentInvoiceOther";
        $data['SiEquipmentInvoiceOther'] = SiEquipmentInvoiceOther::where("id", $id)->first();
        return view('admin.security_deposite_status_report.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = SiEquipmentInvoiceOther::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Si Equipment Invoice Other Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $si_equipment_invoice_other_charges = new SiEquipmentInvoiceOther();
        $si_equipment_invoice_other_charges->fill($request->all());
        $si_equipment_invoice_other_charges->save();
        
        $notify[] = ['success', 'Si Equipment Invoice Other Added Successfully.'];
        return redirect()->route('admin.si_equipment_invoice_other_charges.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
       
        $si_equipment_invoice_other_charges = SiEquipmentInvoiceOther::where("id", $request->id)->first();
        $si_equipment_invoice_other_charges->inactive = $request->inactive ? $request->inactive : '';
        $si_equipment_invoice_other_charges->fill($request->all());
        $si_equipment_invoice_other_charges->update();
        
        $notify[] = ['success', 'Si Equipment Invoice Other Updated Successfully.'];
        return redirect()->route('admin.si_equipment_invoice_other_charges.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = SiEquipmentInvoiceOther::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = SiEquipmentInvoiceOther::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = SiEquipmentInvoiceOther::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = SiEquipmentInvoiceOther::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
