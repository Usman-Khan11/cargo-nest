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

class VoyageController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Voyage";
    //     $data['seo_desc']       = "Voyage";
    //     $data['seo_keywords']   = "Voyage";
    //     $data['page_title'] = "All Voyage";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Voyage::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.voyage.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        
        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Voyage::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        
        $data['seo_title']      = "Voyage";
        $data['seo_desc']       = "Voyage";
        $data['seo_keywords']   = "Voyage";
        $data['page_title'] = "Voyage";
        return view('admin.voyage.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Voyage";
        $data['seo_desc']       = "Edit Voyage";
        $data['seo_keywords']   = "Edit Voyage";
        $data['page_title'] = "Edit Voyage";
        $data['voyage'] = Voyage::where("id", $id)->first();
        return view('admin.voyage.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Voyage::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Voyage Deleted Successfully.'];
        return redirect()->route('admin.voyage')->withNotify($notify);
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
