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

class VoucherController extends Controller
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
            $query = Voucher::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Voucher";
        $data['seo_desc']       = "Voucher";
        $data['seo_keywords']   = "Voucher";
        $data['page_title'] = "Voucher";
        return view('admin.voucher.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Voucher";
        $data['seo_desc']       = "Edit Voucher";
        $data['seo_keywords']   = "Edit Voucher";
        $data['page_title'] = "Edit Voucher";
        $data['voucher'] = Voucher::where("id", $id)->first();
        return view('admin.voucher.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Voucher::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Voucher Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            // 'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $Voucher = new Voucher();
        $Voucher->fill($request->all());
        $Voucher->save();
        
        $notify[] = ['success', 'Voucher Added Successfully.'];
        return redirect()->route('admin.voucher.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        $Voucher = Voucher::where("id", $request->id)->first();
        $Voucher->inactive = $request->inactive ? $request->inactive : '';
        $Voucher->fill($request->all());
        $Voucher->update();
        
        $notify[] = ['success', 'Voucher Updated Successfully.'];
        return redirect()->route('admin.voucher.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = Voucher::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = Voucher::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = Voucher::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = Voucher::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
