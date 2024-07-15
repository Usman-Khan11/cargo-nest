<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingInstruction;
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

class ShippingInstructionController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Shipping Instruction";
    //     $data['seo_desc']       = "Shipping Instruction";
    //     $data['seo_keywords']   = "Shipping Instruction";
    //     $data['page_title'] = "Shipping Instruction";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=ShippingInstruction::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.shipping_instruction.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = ShippingInstruction::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Shipping Instruction";
        $data['seo_desc']       = "Shipping Instruction";
        $data['seo_keywords']   = "Shipping Instruction";
        $data['page_title'] = "Shipping Instruction";
        return view('admin.shipping_instruction.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Shipping Instruction";
        $data['seo_desc']       = "Edit Shipping Instruction";
        $data['seo_keywords']   = "Edit Shipping Instruction";
        $data['page_title'] = "Edit Se Job";
        $data['shippinginstruction'] = ShippingInstruction::where("id", $id)->first();
        return view('admin.shipping_instruction.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = ShippingInstruction::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Shipping Instruction Deleted Successfully.'];
        return redirect()->route('admin.shipping_instruction.create')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'template_name' => ['required', 'string', 'max:255', 'alpha', 'unique:shipping_instruction'],
        ]);
        
        $shipping_instruction = new ShippingInstruction();
        $shipping_instruction->fill($request->all());
        $shipping_instruction->save();
        
        $notify[] = ['success', 'Shipping Instruction Added Successfully.'];
        return redirect()->route('admin.shipping_instruction.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'template_name' => 'required',
        ]);
        
        $shipping_instruction = ShippingInstruction::where("id", $request->id)->first();
        // $shipping_instruction->inactive = $request->inactive ? $request->inactive : '';
        $shipping_instruction->fill($request->all());
        $shipping_instruction->update();
        
        $notify[] = ['success', 'Shipping Instruction Updated Successfully.'];
        return redirect()->route('admin.shipping_instruction.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = ShippingInstruction::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = ShippingInstruction::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = ShippingInstruction::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = ShippingInstruction::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
   
    
}
