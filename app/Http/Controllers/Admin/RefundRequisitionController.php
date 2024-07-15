<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\RefundRequisition;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class RefundRequisitionController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "RefundRequisition";
    //     $data['seo_desc']       = "RefundRequisition";
    //     $data['seo_keywords']   = "RefundRequisition";
    //     $data['page_title'] = "All RefundRequisition";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=RefundRequisition::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.RefundRequisition.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = RefundRequisition::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
       
        $data['seo_title']      = "Refund Requisition";
        $data['seo_desc']       = "Refund Requisition";
        $data['seo_keywords']   = "Refund Requisition";
        $data['page_title'] = "Refund Requisition";
        return view('admin.refund_requisition.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Refund Requisition";
        $data['seo_desc']       = "Edit Refund Requisition";
        $data['seo_keywords']   = "Edit Refund Requisition";
        $data['page_title'] = "Edit RefundRequisition";
        $data['refundrequisition'] = RefundRequisition::where("id", $id)->first();
        return view('admin.refund_requisition.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = RefundRequisition::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Refund Requisition Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $refund_requisition = new RefundRequisition();
        $refund_requisition->fill($request->all());
        $refund_requisition->save();
        
        $notify[] = ['success', 'Refund Requisition Added Successfully.'];
        return redirect()->route('admin.refund_requisition.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
       
        $refund_requisition = RefundRequisition::where("id", $request->id)->first();
        $refund_requisition->inactive = $request->inactive ? $request->inactive : '';
        $refund_requisition->fill($request->all());
        $refund_requisition->update();
        
        $notify[] = ['success', 'Refund Requisition Updated Successfully.'];
        return redirect()->route('admin.refund_requisition.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = RefundRequisition::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = RefundRequisition::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = RefundRequisition::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = RefundRequisition::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
