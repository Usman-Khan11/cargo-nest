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

class BankReconcilationController extends Controller
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
            $query = BankReconcilation::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Bank Reconcilation";
        $data['seo_desc']       = "Bank Reconcilation";
        $data['seo_keywords']   = "Bank Reconcilation";
        $data['page_title'] = "Bank Reconcilation";
        return view('admin.bank_reconcilation.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Bank Reconcilation";
        $data['seo_desc']       = "Edit Bank Reconcilation";
        $data['seo_keywords']   = "Edit Bank Reconcilation";
        $data['page_title'] = "Edit Bank Reconcilation";
        $data['BankReconcilation'] = BankReconcilation::where("id", $id)->first();
        return view('admin.bank_reconcilation.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = BankReconcilation::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Bank Reconcilation Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            // 'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $bank_reconcilation = new BankReconcilation();
        $bank_reconcilation->fill($request->all());
        $bank_reconcilation->save();
        
        $notify[] = ['success', 'Bank Reconcilation Added Successfully.'];
        return redirect()->route('admin.bank_reconcilation.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        $bank_reconcilation = BankReconcilation::where("id", $request->id)->first();
        $bank_reconcilation->inactive = $request->inactive ? $request->inactive : '';
        $bank_reconcilation->fill($request->all());
        $bank_reconcilation->update();
        
        $notify[] = ['success', 'Bank Reconcilation Updated Successfully.'];
        return redirect()->route('admin.bank_reconcilation.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = BankReconcilation::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = BankReconcilation::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = BankReconcilation::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = BankReconcilation::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
