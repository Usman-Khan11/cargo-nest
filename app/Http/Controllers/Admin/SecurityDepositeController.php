<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\SecurityDeposite;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class SecurityDepositeController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "SecurityDeposite";
    //     $data['seo_desc']       = "SecurityDeposite";
    //     $data['seo_keywords']   = "SecurityDeposite";
    //     $data['page_title'] = "All SecurityDeposite";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=SecurityDeposite::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.SecurityDeposite.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = SecurityDeposite::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
       
        $data['seo_title']      = "Security Deposite";
        $data['seo_desc']       = "Security Deposite";
        $data['seo_keywords']   = "Security Deposite";
        $data['page_title'] = "Security Deposite";
        return view('admin.security_deposite.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Security Deposite";
        $data['seo_desc']       = "Edit Security Deposite";
        $data['seo_keywords']   = "Edit Security Deposite";
        $data['page_title'] = "Edit SecurityDeposite";
        $data['securitydeposite'] = SecurityDeposite::where("id", $id)->first();
        return view('admin.security_deposite.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = SecurityDeposite::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Security Deposite Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $security_deposite = new SecurityDeposite();
        $security_deposite->fill($request->all());
        $security_deposite->save();
        
        $notify[] = ['success', 'Security Deposite Added Successfully.'];
        return redirect()->route('admin.security_deposite.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
       
        $security_deposite = SecurityDeposite::where("id", $request->id)->first();
        $security_deposite->inactive = $request->inactive ? $request->inactive : '';
        $security_deposite->fill($request->all());
        $security_deposite->update();
        
        $notify[] = ['success', 'Security Deposite Updated Successfully.'];
        return redirect()->route('admin.security_deposite.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = SecurityDeposite::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = SecurityDeposite::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = SecurityDeposite::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = SecurityDeposite::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
