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

class GlBudgetController extends Controller
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
            $query = GlBudget::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "GL Budgets";
        $data['seo_desc']       = "GL Budgets";
        $data['seo_keywords']   = "GL Budgets";
        $data['page_title'] = "GL Budgets";
        return view('admin.gl_budget.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Voucher";
        $data['seo_desc']       = "Edit Voucher";
        $data['seo_keywords']   = "Edit Voucher";
        $data['page_title'] = "Edit Voucher";
        $data['GlBudget'] = GlBudget::where("id", $id)->first();
        return view('admin.gl_budget.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = GlBudget::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'GL Budget Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            // 'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $gl_budget = new GlBudget();
        $gl_budget->fill($request->all());
        $gl_budget->save();
        
        $notify[] = ['success', 'GL Budget Added Successfully.'];
        return redirect()->route('admin.gl_budget.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        $gl_budget = GlBudget::where("id", $request->id)->first();
        $gl_budget->inactive = $request->inactive ? $request->inactive : '';
        $gl_budget->fill($request->all());
        $gl_budget->update();
        
        $notify[] = ['success', 'GL Budget Updated Successfully.'];
        return redirect()->route('admin.gl_budget.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = GlBudget::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = GlBudget::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = GlBudget::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = GlBudget::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
