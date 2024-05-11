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

class PartyController extends Controller
{
    public function index(Request $request)
    {
        $data['seo_title']      = "Party";
        $data['seo_desc']       = "Party";
        $data['seo_keywords']   = "Party";
        $data['page_title'] = "All Party";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Party::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.party.index', $data);
    }
    
    
    public function create(Request $request)
    {
        $data['seo_title']      = "Party";
        $data['seo_desc']       = "Party";
        $data['seo_keywords']   = "Party";
        $data['page_title'] = "Party";
        return view('admin.party.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Party";
        $data['seo_desc']       = "Edit Party";
        $data['seo_keywords']   = "Edit Party";
        $data['page_title'] = "Edit Party";
        $data['party'] = Party::where("id", $id)->first();
        return view('admin.party.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Party::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Party Deleted Successfully.'];
        return redirect()->route('admin.party')->withNotify($notify);
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
