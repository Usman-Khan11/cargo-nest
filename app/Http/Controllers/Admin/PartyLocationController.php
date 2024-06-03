<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PartyLocation;
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

class PartyLocationController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Party Location";
    //     $data['seo_desc']       = "Party Location";
    //     $data['seo_keywords']   = "Party Location";
    //     $data['page_title'] = "All Party Location";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=PartyLocation::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.party.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        $data['seo_title']      = "Party Location";
        $data['seo_desc']       = "Party Location";
        $data['seo_keywords']   = "Party Location";
        $data['page_title'] = "Party Location";
        return view('admin.party_location.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Party Location";
        $data['seo_desc']       = "Edit Party Location";
        $data['seo_keywords']   = "Edit Party Location";
        $data['page_title'] = "Edit Party Location";
        $data['party'] = PartyLocation::where("id", $id)->first();
        return view('admin.party.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = PartyLocation::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Party Location Deleted Successfully.'];
        return redirect()->route('admin.party_location')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            
        ]);
        
        $party_location = new PartyLocation();
        $party_location->short_name = $request->short_name;
        $party_location->reg_date = $request->reg_date;
        
        
        $notify[] = ['success', 'Party Location Added Successfully.'];
        return redirect()->route('admin.party_location.create')->withNotify($notify);

    
    }
    
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'quotation_no' => 'required',
            'date' => 'required',
        ]);
        
        $quotation = Quotation::where("id", $request->id)->first();
        $quotation->fill($request->all());
        $quotation->save();
        
        $notify[] = ['success', 'Quotation Updated Successfully.'];
        return redirect()->route('admin.party_location.create')->withNotify($notify);
    }
    
}
