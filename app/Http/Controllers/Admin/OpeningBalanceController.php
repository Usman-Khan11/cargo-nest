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

class OpeningBalanceController extends Controller
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
            $query = OpeningBalance::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Opening Balance";
        $data['seo_desc']       = "Opening Balance";
        $data['seo_keywords']   = "Opening Balance";
        $data['page_title'] = "Opening Balance";
        return view('admin.opening_balance.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit OpeningBalance";
        $data['seo_desc']       = "Edit OpeningBalance";
        $data['seo_keywords']   = "Edit OpeningBalance";
        $data['page_title'] = "Edit OpeningBalance";
        $data['openingbalance'] = OpeningBalance::where("id", $id)->first();
        return view('admin.opening_balance.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = OpeningBalance::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Opening Balance Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            // 'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $OpeningBalance = new OpeningBalance();
        $OpeningBalance->fill($request->all());
        $OpeningBalance->save();
         
        $notify[] = ['success', 'Opening Balance Added Successfully.'];
        return redirect()->route('admin.opening_balance.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        $OpeningBalance = OpeningBalance::where("id", $request->id)->first();
        $OpeningBalance->inactive = $request->inactive ? $request->inactive : '';
        $OpeningBalance->fill($request->all());
        $OpeningBalance->update();
        
        $notify[] = ['success', 'Opening Balance Updated Successfully.'];
        return redirect()->route('admin.opening_balance.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = OpeningBalance::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = OpeningBalance::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = OpeningBalance::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = OpeningBalance::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
