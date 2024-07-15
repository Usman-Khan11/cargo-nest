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

class GlBillController extends Controller
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
            $query = GlBill::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "GL Bills";
        $data['seo_desc']       = "GL Bills";
        $data['seo_keywords']   = "GL Bills";
        $data['page_title'] = "GL Bills";
        return view('admin.gl_bill.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Voucher";
        $data['seo_desc']       = "Edit Voucher";
        $data['seo_keywords']   = "Edit Voucher";
        $data['page_title'] = "Edit Voucher";
        $data['glbill'] = GlBill::where("id", $id)->first();
        return view('admin.gl_bill.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = GlBill::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'GL Bill Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            // 'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $gl_bill = new GlBill();
        $gl_bill->fill($request->all());
        $gl_bill->save();
        
        $notify[] = ['success', 'GL Bill Added Successfully.'];
        return redirect()->route('admin.gl_bill.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        $gl_bill = GlBill::where("id", $request->id)->first();
        $gl_bill->inactive = $request->inactive ? $request->inactive : '';
        $gl_bill->fill($request->all());
        $gl_bill->update();
        
        $notify[] = ['success', 'GL Bill Updated Successfully.'];
        return redirect()->route('admin.gl_bill.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = GlBill::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = GlBill::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = GlBill::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = GlBill::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
