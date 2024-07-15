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

class DeliveryOrderController extends Controller
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
            $query = DeliveryOrder::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Delivery Order";
        $data['seo_desc']       = "Delivery Order";
        $data['seo_keywords']   = "Delivery Order";
        $data['page_title'] = "Delivery Order";
        return view('admin.delivery_order.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Delivery Order";
        $data['seo_desc']       = "Edit Delivery Order";
        $data['seo_keywords']   = "Edit Delivery Order";
        $data['page_title'] = "Edit Delivery Order";
        $data['deliveryorder'] = DeliveryOrder::where("id", $id)->first();
        return view('admin.delivery_order.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = DeliveryOrder::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Delivery Order Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            // 'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $epass_weboc = new DeliveryOrder();
        $epass_weboc ->fill($request->all());
        $epass_weboc ->save();
         
        $notify[] = ['success', 'Delivery Order Added Successfully.'];
        return redirect()->route('admin.delivery_order.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        $epass_weboc = DeliveryOrder::where("id", $request->id)->first();
        $epass_weboc->inactive = $request->inactive ? $request->inactive : '';
        $epass_weboc->fill($request->all());
        $epass_weboc->update();
        
        $notify[] = ['success', 'Delivery Order Updated Successfully.'];
        return redirect()->route('admin.delivery_order.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = DeliveryOrder::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = DeliveryOrder::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = DeliveryOrder::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = DeliveryOrder::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
