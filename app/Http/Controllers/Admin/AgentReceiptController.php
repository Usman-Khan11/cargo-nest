<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeAgentReceipt;
use App\Models\SeAgentReceiptDetail;
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

class AgentReceiptController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Se Agent Receipt";
    //     $data['seo_desc']       = "Se Agent Receipt";
    //     $data['seo_keywords']   = "Se Agent Receipt";
    //     $data['page_title'] = "Se Agent Receipt";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=AgentReceipt::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.agent_receipt.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = SeAgentReceipt::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        
        $data['seo_title']      = "Se Agent Receipt";
        $data['seo_desc']       = "Se Agent Receipt";
        $data['seo_keywords']   = "Se Agent Receipt";
        $data['page_title'] = "Se Agent Receipt";
        return view('admin.agent_receipt.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Se Agent Receipt";
        $data['seo_desc']       = "Se Agent Receipt";
        $data['seo_keywords']   = "Se Agent Receipt";
        $data['page_title'] = "Se Agent Receipt";
        $data['agentreceipt'] = AgentReceipt::where("id", $id)->first();
        return view('admin.agent_receipt.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = SeAgentReceipt::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Agent Receipt Deleted Successfully.'];
        return redirect()->route('admin.agent_receipt.create')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tran_no' => ['required', 'unique:se_agent_receipt'],
            'tran_date' => 'required',
        ]);
        
        $se_agent_receipt = new SeAgentReceipt();
        $se_agent_receipt->fill($request->all());
        $se_agent_receipt->save();
        
        $operation = $request->operation;
        foreach($operation as $key => $value) {
            $se_agent_receipt_detail = new SeAgentReceiptDetail();
            $se_agent_receipt_detail->agent_receipt_id = $se_agent_receipt->id;
            $se_agent_receipt_detail->operation = $request->operation[$key];
            $se_agent_receipt_detail->job_no = $request->job_no[$key];
            $se_agent_receipt_detail->invoice_no = $request->invoice_no[$key];
            $se_agent_receipt_detail->invoice_date = $request->invoice_date[$key];
            $se_agent_receipt_detail->dn_cn = $request->dn_cn[$key];
            $se_agent_receipt_detail->ref_no = $request->ref_no[$key];
            $se_agent_receipt_detail->hbl_hawb_no = $request->hbl_hawb_no[$key];
            $se_agent_receipt_detail->mbl_mawb_no = $request->mbl_mawb_no[$key];
            $se_agent_receipt_detail->container_no = $request->container_no[$key];
            $se_agent_receipt_detail->file_no = $request->file_no[$key];
            $se_agent_receipt_detail->inv_curr = $request->inv_curr[$key];
            $se_agent_receipt_detail->inv_ex_rate = $request->inv_ex_rate[$key];
            $se_agent_receipt_detail->inv_bal_fc = $request->inv_bal_fc[$key];
            $se_agent_receipt_detail->amount_fc = $request->amount_fc[$key];
            $se_agent_receipt_detail->ex_rate = $request->ex_rate[$key];
            $se_agent_receipt_detail->balance_fc = $request->balance_fc[$key];
            $se_agent_receipt_detail->save();
        }
        
        
        $notify[] = ['success', 'Agent Invoice Added Successfully.'];
        return redirect()->route('admin.agent_receipt.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'tran_no' => ['required', 'unique:se_agent_invoice'],
            'tran_date' => 'required',
        ]);
        
        $se_agent_receipt = SeAgentReceipt::where("id", $request->id)->first();
        $se_agent_receipt->fill($request->all());
        $se_agent_receipt->update();
        
        $notify[] = ['success', 'Agent Invoice Updated Successfully.'];
        return redirect()->route('admin.agent_receipt.create')->withNotify($notify);
    }
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = SeAgentReceipt::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = SeAgentReceipt::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = SeAgentReceipt::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = SeAgentReceipt::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
   
    
}
