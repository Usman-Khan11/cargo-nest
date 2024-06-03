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

class ChartAccountController extends Controller
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
            $query = ChartAccount::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Chart Of Account";
        $data['seo_desc']       = "Chart Of Account";
        $data['seo_keywords']   = "Chart Of Account";
        $data['page_title'] = "Chart Of Account";
        return view('admin.chart_account.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Chart Of Account";
        $data['seo_desc']       = "Edit Chart Of Account";
        $data['seo_keywords']   = "Edit Chart Of Account";
        $data['page_title'] = "Edit Chart Of Account";
        $data['chartaccount'] = ChartAccount::where("id", $id)->first();
        return view('admin.chart_account.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = ChartAccount::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Chart Of Account Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            // 'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $chartaccount = new ChartAccount();
        $chartaccount->fill($request->all());
        $chartaccount->save();
        
        $notify[] = ['success', 'Chart Of Account Added Successfully.'];
        return redirect()->route('admin.chart_account.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        $chartaccount = ChartAccount::where("id", $request->id)->first();
        $chartaccount->inactive = $request->inactive ? $request->inactive : '';
        $chartaccount->fill($request->all());
        $chartaccount->update();
        
        $notify[] = ['success', 'Chart Of Account Updated Successfully.'];
        return redirect()->route('admin.chart_account.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = ChartAccount::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = ChartAccount::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = ChartAccount::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = ChartAccount::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
