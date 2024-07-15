<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeAgentInvoice;
use App\Models\AgentInvoiceDetail;
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

class AgentInvoiceController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Se Agent Invoice";
    //     $data['seo_desc']       = "Se Agent Invoice";
    //     $data['seo_keywords']   = "Se Agent Invoice";
    //     $data['page_title'] = "Se Agent Invoice";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=AgentInvoice::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.agent_invoice.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = SeAgentInvoice::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Se Agent Invoice";
        $data['seo_desc']       = "Se Agent Invoice";
        $data['seo_keywords']   = "Se Agent Invoice";
        $data['page_title'] = "Se Agent Invoice";
        return view('admin.agent_invoice.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Se Agent Invoice";
        $data['seo_desc']       = "Se Agent Invoice";
        $data['seo_keywords']   = "Se Agent Invoice";
        $data['page_title'] = "Se Agent Invoice";
        $data['seagentinvoice'] = SeAgentInvoice::where("id", $id)->first();
        return view('admin.agent_invoice.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = SeAgentInvoice::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Agent Invoice Deleted Successfully.'];
        return redirect()->route('admin.agent_invoice.create')->withNotify($notify);
    }
   
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'invoice_no' => ['required', 'unique:se_agent_invoice'],
            'inv_date' => 'required',
        ]);
        
        $se_agent_invoice = new SeAgentInvoice();
        $se_agent_invoice->fill($request->all());
        $se_agent_invoice->save();
        
        $t_job_no = $request->t_job_no;
        foreach($t_job_no as $key => $value) {
            $agent_invoice_detail = new AgentInvoiceDetail();
            $agent_invoice_detail->agent_invoice_id = $se_agent_invoice->id;
            $agent_invoice_detail->t_job_no = $request->t_job_no[$key];
            $agent_invoice_detail->t_charge_code = $request->t_charge_code[$key];
            $agent_invoice_detail->t_charge_name = $request->t_charge_name[$key];
            $agent_invoice_detail->t_charge_description = $request->t_charge_description[$key];
            $agent_invoice_detail->t_size_type = $request->t_size_type[$key];
            $agent_invoice_detail->t_rate_group = $request->t_rate_group[$key];
            $agent_invoice_detail->t_dg_non_dg = $request->t_dg_non_dg[$key];
            $agent_invoice_detail->t_containers = $request->t_containers[$key];
            $agent_invoice_detail->t_hbl_no = $request->t_hbl_no[$key];
            $agent_invoice_detail->t_mbl_no = $request->t_mbl_no[$key];
            $agent_invoice_detail->t_dr_cr = $request->t_dr_cr[$key];
            $agent_invoice_detail->t_qty = $request->t_qty[$key];
            $agent_invoice_detail->t_rate = $request->t_rate[$key];
            $agent_invoice_detail->t_currency1 = $request->t_currency1[$key];
            $agent_invoice_detail->t_amount = $request->t_amount[$key];
            $agent_invoice_detail->t_discount = $request->t_discount[$key];
            $agent_invoice_detail->t_net_amount = $request->t_net_amount[$key];
            $agent_invoice_detail->t_margin = $request->t_margin[$key];
            $agent_invoice_detail->t_tax = $request->t_tax[$key];
            $agent_invoice_detail->t_tax_amount = $request->t_tax_amount[$key];
            $agent_invoice_detail->t_net_amount_inc_tax = $request->t_net_amount_inc_tax[$key];
            $agent_invoice_detail->t_currency2 = $request->t_currency2[$key];
            $agent_invoice_detail->t_ex_rate = $request->t_ex_rate[$key];
            $agent_invoice_detail->t_local_amount = $request->t_local_amount[$key];
            $agent_invoice_detail->t_tpgl_invoice = $request->t_tpgl_invoice[$key];
            $agent_invoice_detail->t_tpgl_payment = $request->t_tpgl_payment[$key];
            $agent_invoice_detail->save();
        }
        
        
        $notify[] = ['success', 'Agent Invoice Added Successfully.'];
        return redirect()->route('admin.agent_invoice.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'invoice_no' => ['required', 'unique:se_agent_invoice'],
            'inv_date' => 'required',
        ]);
        
        $se_agent_invoice = SeAgentInvoice::where("id", $request->id)->first();
        // $se_agent_invoice->inactive = $request->inactive ? $request->inactive : '';
        $se_agent_invoice->fill($request->all());
        $se_agent_invoice->update();
        
        $notify[] = ['success', 'Agent Invoice Updated Successfully.'];
        return redirect()->route('admin.agent_invoice.create')->withNotify($notify);
    }
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = SeAgentInvoice::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = SeAgentInvoice::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = SeAgentInvoice::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = SeAgentInvoice::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
   
    
}
