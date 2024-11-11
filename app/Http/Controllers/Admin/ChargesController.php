<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Charges;
use App\Models\Currency;
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
            $query = Charges::Query();
            $query = $query->with('currency');
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Charges";
        $data['seo_desc']       = "Charges";
        $data['seo_keywords']   = "Charges";
        $data['page_title'] = "Charges";
        
        $data['currencies'] = Currency::select(["id", "code as text"])->orderBy('id','desc')->get();
        $data['currencies'] = $data['currencies']->toArray();
        
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
        return redirect()->route('admin.charges.create')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'max:100', 'unique:charges'],
            'currency' => 'required',
            'name' => 'required',
            // 'localize_name' => 'required',
            'short_name' => 'required',
        ]);
        
        $charges = new Charges();
        $charges->code = $request->code;
        $charges->currency = $request->currency;
        $charges->name = $request->	name;
        $charges->localize_name = $request->localize_name;
        $charges->short_name = $request->short_name;
        $charges->charges_type = $request->charges_type;
        $charges->order = number_format($request->order, 2);
        $charges->inactive = $request->inactive;
        $charges->type = $request->type;
        $charges->reporting_group = $request->reporting_group;
        $charges->tag = $request->tag;
        $charges->printing_name = $request->printing_name;
        $charges->calculation_type = $request->calculation_type;
        $charges->tax=$request->tax;
        $charges->payable_party_type = $request->payable_party_type;
        $charges->recevable_party_type = $request->recevable_party_type;
        $charges->c_category = $request->c_category;
        $charges->save();
        
        $notify[] = ['success', 'Charges Added Successfully.'];
        return redirect()->route('admin.charges.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'currency' => 'required',
            'name' => 'required',
            // 'localize_name' => 'required',
            'short_name' => 'required',
        ]);
        
        $charges = Charges::where("id", $request->id)->first();
        $charges->code = $request->code;
        $charges->currency = $request->currency;
        $charges->name = $request->	name;
        $charges->localize_name = $request->localize_name;
        $charges->short_name = $request->short_name;
        $charges->charges_type = $request->charges_type;
        $charges->order = number_format($request->order, 2);
        $charges->inactive = $request->inactive;
        $charges->type = $request->type;
        $charges->reporting_group = $request->reporting_group;
        $charges->tag = $request->tag;
        $charges->printing_name = $request->printing_name;
        $charges->calculation_type = $request->calculation_type;
        $charges->tax=($request->tax);
        $charges->payable_party_type = $request->payable_party_type;
        $charges->recevable_party_type = $request->recevable_party_type;
        $charges->c_category = $request->c_category;
        $charges->update();
        
        $notify[] = ['success', 'Charges Updated Successfully.'];
        return redirect()->route('admin.charges.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = Charges::orderBy('id', 'asc')->with('currency')->first();
        }
        else if($type == "last") {
            $data = Charges::orderBy('id', 'desc')->with('currency')->first();
        }
        else if($type == "forward") {
            $data = Charges::where('id', '>', $id)->with('currency')->first();
        }
        else if($type == "backward") {
            $data = Charges::where('id', '<', $id)->orderBy('id', 'desc')->with('currency')->first();
        }
        
        return $data;
    }
    
}
