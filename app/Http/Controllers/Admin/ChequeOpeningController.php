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

class ChequeOpeningController extends Controller
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
            $query = ChequeOpening::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Cheque Opening";
        $data['seo_desc']       = "Cheque Opening";
        $data['seo_keywords']   = "Cheque Opening";
        $data['page_title'] = "Cheque Opening";
        return view('admin.cheque_opening.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Cheque Opening";
        $data['seo_desc']       = "Edit Cheque Opening";
        $data['seo_keywords']   = "Edit Cheque Opening";
        $data['page_title'] = "Edit Cheque Opening";
        $data['chequeopening'] = ChequeOpening::where("id", $id)->first();
        return view('admin.cheque_opening.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = ChequeOpening::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Cheque Opening Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            // 'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $cheque_opening = new ChequeOpening();
        $cheque_opening->fill($request->all());
        $cheque_opening->save();
        
        $notify[] = ['success', 'Cheque Opening Added Successfully.'];
        return redirect()->route('admin.cheque_opening.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        $cheque_opening = ChequeOpening::where("id", $request->id)->first();
        $cheque_opening->inactive = $request->inactive ? $request->inactive : '';
        $cheque_opening->fill($request->all());
        $cheque_opening->update();
        
        $notify[] = ['success', 'Cheque Opening Updated Successfully.'];
        return redirect()->route('admin.cheque_opening.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = ChequeOpening::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = ChequeOpening::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = ChequeOpening::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = ChequeOpening::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
