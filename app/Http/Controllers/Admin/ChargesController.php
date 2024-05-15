<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Charges;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminNotification;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class ChargesController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Charges";
    //     $data['seo_desc']       = "Charges";
    //     $data['seo_keywords']   = "Charges";
    //     $data['page_title'] = "All Charges";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Charges::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.charges.index', $data);
    // }
    
    
    public function create(Request $request)
    {
         if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Charges::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        
        $data['seo_title']      = "Charges";
        $data['seo_desc']       = "Charges";
        $data['seo_keywords']   = "Charges";
        $data['page_title'] = "Charges";
        return view('admin.charges.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Charges";
        $data['seo_desc']       = "Edit Charges";
        $data['seo_keywords']   = "Edit Charges";
        $data['page_title'] = "Edit Charges";
        $data['charges'] = Charges::where("id", $id)->first();
        return view('admin.charges.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Charges::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Charges Deleted Successfully.'];
        return redirect()->route('admin.charges')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'currency' => 'required',
            'name' => 'required',
            'localize_name' => 'required',
            'short_name' => 'required',
        ]);
        
        $charges = new Charges();
        $charges->code = $request->code;
        $charges->currency = $request->currency;
        $charges->name = $request->	name;
        $charges->localize_name = $request->localize_name;
        $charges->short_name = $request->short_name;
        $charges->charges_type = $request->charges_type;
        $charges->order = $request->order;
        $charges->inactive = $request->inactive;
        $charges->type = $request->type;
        $charges->reporting_group = $request->reporting_group;
        $charges->tag = $request->tag;
        $charges->printing_name = $request->printing_name;
        $charges->calculation_type = $request->calculation_type;
        $charges->tax=json_encode($request->tax);
        $charges->payable_party_type = $request->payable_party_type;
        $charges->recevable_party_type = $request->recevable_party_type;
        $charges->c_category = $request->c_category;
        $charges->save();
        
        $notify[] = ['success', 'Charges Added Successfully.'];
        return redirect()->route('admin.charges')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'currency' => 'required',
            'name' => 'required',
            'localize_name' => 'required',
            'short_name' => 'required',
        ]);
        
        $charges = Charges::where("id", $request->id)->first();
        $charges->code = $request->code;
        $charges->currency = $request->currency;
        $charges->name = $request->	name;
        $charges->localize_name = $request->localize_name;
        $charges->short_name = $request->short_name;
        $charges->charges_type = $request->charges_type;
        $charges->order = $request->order;
        $charges->inactive = $request->inactive;
        $charges->type = $request->type;
        $charges->reporting_group = $request->reporting_group;
        $charges->tag = $request->tag;
        $charges->printing_name = $request->printing_name;
        $charges->calculation_type = $request->calculation_type;
        $charges->tax=json_encode($request->tax);
        $charges->payable_party_type = $request->payable_party_type;
        $charges->recevable_party_type = $request->recevable_party_type;
        $charges->c_category = $request->c_category;
        $charges->save();
        
        $notify[] = ['success', 'Charges Updated Successfully.'];
        return redirect()->route('admin.charges.create')->withNotify($notify);
    }
    
}
