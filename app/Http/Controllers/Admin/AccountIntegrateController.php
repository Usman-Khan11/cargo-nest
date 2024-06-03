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

class AccountIntegrateController extends Controller
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
            $query = AccountIntegrate::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Account Integration";
        $data['seo_desc']       = "Account Integration";
        $data['seo_keywords']   = "Account Integration";
        $data['page_title'] = "Account Integration";
        return view('admin.account_integrate.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Account Integrate";
        $data['seo_desc']       = "Edit Account Integrate";
        $data['seo_keywords']   = "Edit Account Integrate";
        $data['page_title'] = "Edit Account Integrate";
        $data['accountintegrate'] = AccountIntegrate::where("id", $id)->first();
        return view('admin.account_integrate.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = AccountIntegrate::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Account Integration Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            // 'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $accountintegrate = new AccountIntegrate();
        $accountintegrate ->fill($request->all());
        $accountintegrate ->save();
         
        $notify[] = ['success', 'Account Integration Added Successfully.'];
        return redirect()->route('admin.account_integrate.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        $accountintegrate = AccountIntegrate::where("id", $request->id)->first();
        $accountintegrate->inactive = $request->inactive ? $request->inactive : '';
        $accountintegrate->fill($request->all());
       $accountintegrate->update();
        
        $notify[] = ['success', 'Account Integration Updated Successfully.'];
        return redirect()->route('admin.account_integrate.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = AccountIntegrate::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = AccountIntegrate::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = AccountIntegrate::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = AccountIntegrate::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
