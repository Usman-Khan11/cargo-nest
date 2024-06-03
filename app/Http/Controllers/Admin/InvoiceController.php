<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
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

class InvoiceController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Se Invoice";
    //     $data['seo_desc']       = "Se Invoice";
    //     $data['seo_keywords']   = "Se Invoice";
    //     $data['page_title'] = "Se Invoice";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Invoice::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.invoice.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        $data['seo_title']      = "Se Invoice";
        $data['seo_desc']       = "Se Invoice";
        $data['seo_keywords']   = "Se Invoice";
        $data['page_title'] = "Se Invoice";
        return view('admin.invoice.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Se Invoice";
        $data['seo_desc']       = "Se Invoice";
        $data['seo_keywords']   = "Se Invoice";
        $data['page_title'] = "Se Invoice";
        $data['invoice'] = Invoice::where("id", $id)->first();
        return view('admin.invoice.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Invoice::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Invoice Deleted Successfully.'];
        return redirect()->route('admin.invoice.create')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tran_number' => 'required',
            'inv_date' => 'required',
            'reference' => 'required',
            'status' => 'required',
        ]);
        
        $invoice = new Invoice();
        $invoice->fill($request->all());
        $invoice->save();
        
        $charges_code = $request->charges_code;
        foreach($charges_code as $key => $value) {
            $invoice_details = new InvoiceDetail();
            $invoice_details->invoice_id = $milestone->id;
            $invoice_details->charges_code = $request->charges_code[$key];
            $invoice_details->charges_name = $request->charges_name[$key];
            $invoice_details->charges_description = $request->charges_description[$key];
            $invoice_details->size_type = $request->size_type[$key];
            $invoice_details->rate_group = $request->rate_group[$key];
            $invoice_details->dg_nondg = $request->dg_nondg[$key];
            $invoice_details->container = $request->container[$key];
            $invoice_details->qty = $request->qty[$key];
            $invoice_details->rate = $request->rate[$key];
            $invoice_details->currency = $request->currency[$key];
            $invoice_details->amount = $request->amount[$key];
            $invoice_details->discount = $request->discount[$key];
            $invoice_details->net_amount = $request->net_amount[$key];
            $invoice_details->margin = $request->margin[$key];
            $invoice_details->tax = $request->tax[$key];
            $invoice_details->tax_amount = $request->tax_amount[$key];
            $invoice_details->inc_tax = $request->inc_tax[$key];
            $invoice_details->ex_rate = $request->ex_rate[$key];
            $invoice_details->local_amount = $request->local_amount[$key];
        }  
      
        $notify[] = ['success', 'Invoice Added Successfully.'];
        return redirect()->route('admin.invoice.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'tran_number' => 'required',
            'inv_date' => 'required',
            'reference' => 'required',
            'status' => 'required',
        ]);
        
        $invoice = Invoice::where("id", $request->id)->first();
        $invoice->fill($request->all());
        $invoice->save();
        
        $notify[] = ['success', 'Invoice Updated Successfully.'];
        return redirect()->route('admin.invoice.create')->withNotify($notify);
    }
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = Invoice::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = Invoice::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = Invoice::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = Invoice::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
   
    
}
