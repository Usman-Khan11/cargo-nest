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

class CommodityController extends Controller
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
            $query = Commodity::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['commodity_num'] = Commodity::orderby('id','desc')->first();
        if($data['commodity_num']) {
            $data['commodity_num'] = $data['commodity_num']->code + 1;
        } else {
            $data['commodity_num'] = 1;
        }
        
        $data['seo_title']      = "Commodity";
        $data['seo_desc']       = "Commodity";
        $data['seo_keywords']   = "Commodity";
        $data['page_title'] = "Commodity";
        return view('admin.commodity.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Commodity";
        $data['seo_desc']       = "Edit Commodity";
        $data['seo_keywords']   = "Edit Commodity";
        $data['page_title'] = "Edit Commodity";
        $data['commodity'] = Commodity::where("id", $id)->first();
        return view('admin.commodity.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Commodity::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Commodity Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
        
        if($request->hazmat_product == "Yes") {
            $validated = $request->validate([
                'hazmat_code' => 'required',
                'hazmat_class' => 'required'
            ]);
        }
        
        $commodity = new Commodity();
        $commodity->fill($request->all());
        $commodity->save();
        
        $notify[] = ['success', 'Commodity Added Successfully.'];
        return redirect()->route('admin.commodity.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        $commodity = Commodity::where("id", $request->id)->first();
        $commodity->inactive = $request->inactive ? $request->inactive : '';
        $commodity->fill($request->all());
        $commodity->update();
        
        $notify[] = ['success', 'Commodity Updated Successfully.'];
        return redirect()->route('admin.commodity.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = Commodity::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = Commodity::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = Commodity::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = Commodity::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
