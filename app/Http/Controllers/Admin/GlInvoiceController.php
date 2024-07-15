<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Commodity;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class GlInvoiceController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Commodity";
    //     $data['seo_desc']       = "Commodity";
    //     $data['seo_keywords']   = "Commodity";
    //     $data['page_title'] = "All Commodity";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Commodity::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.commodity.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = GlInvoice::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Invoice";
        $data['seo_desc']       = "Invoice";
        $data['seo_keywords']   = "Invoice";
        $data['page_title'] = "Invoice";
        return view('admin.gl_invoice.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Voucher";
        $data['seo_desc']       = "Edit Voucher";
        $data['seo_keywords']   = "Edit Voucher";
        $data['page_title'] = "Edit Voucher";
        $data['glinvoice'] = GlInvoice::where("id", $id)->first();
        return view('admin.gl_invoice.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = GlInvoice::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'GL Invoice Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            // 'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $gl_invoice = new GlInvoice();
        $gl_invoice->fill($request->all());
        $gl_invoice->save();
        
        $notify[] = ['success', 'GL Invoice Added Successfully.'];
        return redirect()->route('admin.gl_invoice.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        $gl_invoice = GlInvoice::where("id", $request->id)->first();
        $gl_invoice->inactive = $request->inactive ? $request->inactive : '';
        $gl_invoice->fill($request->all());
        $gl_invoice->update();
        
        $notify[] = ['success', 'GL Invoice Updated Successfully.'];
        return redirect()->route('admin.gl_invoice.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = GlInvoice::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = GlInvoice::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = GlInvoice::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = GlInvoice::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
