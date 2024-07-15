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

class VoucherPropertiesController extends Controller
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
        
        $data['seo_title']      = "Voucher Properties";
        $data['seo_desc']       = "Voucher Properties";
        $data['seo_keywords']   = "Voucher Properties";
        $data['page_title'] = "Voucher Properties";
        return view('admin.voucher_properties.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Voucher Properties";
        $data['seo_desc']       = "Edit Voucher Properties";
        $data['seo_keywords']   = "Edit Voucher Properties";
        $data['page_title'] = "Edit Voucher Properties";
        $data['voucherproperties'] = VoucherProperties::where("id", $id)->first();
        return view('admin.voucher_properties.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = VoucherProperties::where("id", $id);
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
       
        $Voucher_properties = new VoucherProperties();
        $Voucher_properties->fill($request->all());
        $Voucher_properties->save();
        
        $notify[] = ['success', 'Voucher Added Successfully.'];
        return redirect()->route('admin.voucher_properties.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        $Voucher_properties = VoucherProperties::where("id", $request->id)->first();
        $Voucher_properties->inactive = $request->inactive ? $request->inactive : '';
        $Voucher_properties->fill($request->all());
        $Voucher_properties->update();
        
        $notify[] = ['success', 'Voucher Updated Successfully.'];
        return redirect()->route('admin.voucher_properties.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = VoucherProperties::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = VoucherProperties::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = VoucherProperties::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = VoucherProperties::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
