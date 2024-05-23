<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
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
    public function index(Request $request)
    {
        $data['seo_title']      = "Se Invoice";
        $data['seo_desc']       = "Se Invoice";
        $data['seo_keywords']   = "Se Invoice";
        $data['page_title'] = "Se Invoice";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Invoice::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.invoice.index', $data);
    }
    
    
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
        return redirect()->route('admin.invoice')->withNotify($notify);
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
   
    
}
