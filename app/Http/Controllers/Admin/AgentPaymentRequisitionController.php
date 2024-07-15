<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgentPaymentRequisition;
use App\Models\AgentPaymentRequisitionDetail;
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

class AgentPaymentRequisitionController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Se Agent Payment Requisition";
    //     $data['seo_desc']       = "Se Agent Payment Requisition";
    //     $data['seo_keywords']   = "Se Agent Payment Requisition";
    //     $data['page_title'] = "Se Agent Payment Requisition";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=AgentPaymentRequisition::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.agent_payment_requisition.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = AgentPaymentRequisition::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Se Agent Payment Requisition";
        $data['seo_desc']       = "Se Agent Payment Requisition";
        $data['seo_keywords']   = "Se Agent Payment Requisition";
        $data['page_title'] = "Se Agent Payment Requisition";
        return view('admin.agent_payment_requisition.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Se Agent Payment Requisition";
        $data['seo_desc']       = "Se Agent Payment Requisition";
        $data['seo_keywords']   = "Se Agent Payment Requisition";
        $data['page_title'] = "Se Agent Payment Requisition";
        $data['agentpaymentrequisition'] = AgentPaymentRequisition::where("id", $id)->first();
        return view('admin.agent_payment_requisition.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = AgentPaymentRequisition::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Agent Payment Requisition Deleted Successfully.'];
        return redirect()->route('admin.agent_payment_requisition.create')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'train_number' => ['required', 'string', 'max:255', 'unique:agent_payment_requisition'],
            'train_date' => 'required',
        ]);
       
        $agent_payment_requisition = new AgentPaymentRequisition();
        $agent_payment_requisition->fill($request->all());
        $agent_payment_requisition->save();
        
        
        $operations = $request->operations;
        if($operations){
            foreach($operations as $key => $value) {
            $agent_payment_requisition_detail = new AgentPaymentRequisitionDetail();
            $agent_payment_requisition_detail->agent_payment_requisition_id = $agent_payment_requisition->id;
            $agent_payment_requisition_detail->operations = $request->operations[$key];
            $agent_payment_requisition_detail->job_number = $request->job_number[$key];
            $agent_payment_requisition_detail->invoice_number = $request->invoice_number[$key];
            $agent_payment_requisition_detail->invoice_date = $request->invoice_date[$key];
            $agent_payment_requisition_detail->dn_cn = $request->dn_cn[$key];
            $agent_payment_requisition_detail->ref_number = $request->ref_number[$key];
            $agent_payment_requisition_detail->hbl_hawb_number = $request->hbl_hawb_number[$key];
            $agent_payment_requisition_detail->mbl_mawb_number = $request->mbl_mawb_number[$key];
            $agent_payment_requisition_detail->container_number = $request->container_number[$key];
            $agent_payment_requisition_detail->inv_curr = $request->inv_curr[$key];
            $agent_payment_requisition_detail->inv_exrate = $request->inv_exrate[$key];
            $agent_payment_requisition_detail->inv_bal_fc = $request->inv_bal_fc[$key];
            $agent_payment_requisition_detail->amount_fc = $request->amount_fc[$key];
            $agent_payment_requisition_detail->ex_rate = $request->ex_rate[$key];
            $agent_payment_requisition_detail->balance_fc = $request->balance_fc[$key];
            $agent_payment_requisition_detail->save();
            }    
        }
        
        
        $notify[] = ['success', 'Agent Payment Requisition Added Successfully.'];
        return redirect()->route('admin.agent_payment_requisition.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'train_number' => 'required',
            'train_date' => 'required',
        ]);
        
        $agent_payment_requisition = AgentPaymentRequisition::where("id", $request->id)->first();
        $agent_payment_requisition->fill($request->all());
        $agent_payment_requisition->update();
        
        $notify[] = ['success', 'Agent Payment Requisition Updated Successfully.'];
        return redirect()->route('admin.agent_payment_requisition.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = AgentPaymentRequisition::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = AgentPaymentRequisition::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = AgentPaymentRequisition::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = AgentPaymentRequisition::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
   
    
}
