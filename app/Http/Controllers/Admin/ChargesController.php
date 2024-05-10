<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quotation;
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
    public function index(Request $request)
    {
        $data['seo_title']      = "Charges";
        $data['seo_desc']       = "Charges";
        $data['seo_keywords']   = "Charges";
        $data['page_title'] = "All Charges";

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
        return view('admin.charges.index', $data);
    }
    
    
    public function create(Request $request)
    {
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
    
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'quotation_no' => 'required',
    //         'date' => 'required',
    //     ]);
        
    //     $quotation = new Quotation();
    //     $quotation->fill($request->all());
    //     $quotation->save();
        
    //     $notify[] = ['success', 'Quotation Added Successfully.'];
    //     return redirect()->route('admin.quotation')->withNotify($notify);
    // }
    
    // public function update(Request $request)
    // {
    //     $validated = $request->validate([
    //         'quotation_no' => 'required',
    //         'date' => 'required',
    //     ]);
        
    //     $quotation = Quotation::where("id", $request->id)->first();
    //     $quotation->fill($request->all());
    //     $quotation->save();
        
    //     $notify[] = ['success', 'Quotation Updated Successfully.'];
    //     return redirect()->route('admin.quotation')->withNotify($notify);
    // }
    
}
