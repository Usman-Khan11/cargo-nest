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

class PackagesController extends Controller
{
    public function index(Request $request)
    {
        $data['seo_title']      = "Packages Coding";
        $data['seo_desc']       = "Packages Coding";
        $data['seo_keywords']   = "Packages Coding";
        $data['page_title'] = "All Packages Coding";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Packages::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.packages.index', $data);
    }
    
    
    public function create(Request $request)
    {
        $data['seo_title']      = "Add New Packages Coding";
        $data['seo_desc']       = "Add New Packages Coding";
        $data['seo_keywords']   = "Add New Packages Coding";
        $data['page_title'] = "Add New Packages Coding";
        return view('admin.packages.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Packages Coding";
        $data['seo_desc']       = "Edit Packages Coding";
        $data['seo_keywords']   = "Edit Packages Coding";
        $data['page_title'] = "Edit Equipment Size Type";
        $data['packages'] = Packages::where("id", $id)->first();
        return view('admin.packages.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Packages::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Packages Coding Deleted Successfully.'];
        return redirect()->route('admin.packages')->withNotify($notify);
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
