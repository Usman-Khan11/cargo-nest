<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PartyBasicInfo;
use App\Models\PartyOtherInfo;
use App\Models\PartyAccountDetail;
use App\Models\PartyAchBankDetail;
use App\Models\PartyLocalizeKyc;
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

class QueryController extends Controller
{
    public function index(Request $request)
    {
        $data['seo_title']      = "Se Query";
        $data['seo_desc']       = "Se Query";
        $data['seo_keywords']   = "Se Query";
        $data['page_title'] = "Se Query";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Query::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.query.index', $data);
    }
    
    
    public function create(Request $request)
    {
        $data['seo_title']      = "Se Query";
        $data['seo_desc']       = "Se Query";
        $data['seo_keywords']   = "Se Query";
        $data['page_title'] = "Se Query";
        return view('admin.query.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Se Query";
        $data['seo_desc']       = "Edit Se Query";
        $data['seo_keywords']   = "Edit Se Query";
        $data['page_title'] = "Edit Se Query";
        $data['query'] = Letter::where("id", $id)->first();
        return view('admin.query.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Query::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Se Query Deleted Successfully.'];
        return redirect()->route('admin.query')->withNotify($notify);
    }
    
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'short_name' => 'required',
    //         'reg_date' => 'required',
    //         'license_no' => 'required',
    //         'contact_person' => 'required',
    //     ]);
        
    //     $partybasicinfo = new PartyBasicInfo();
    //     $partybasicinfo->short_name = $request->short_name;
    //     $partybasicinfo->reg_date = $request->reg_date;
    //     $partybasicinfo->license_no = $request->license_no;
    //     $partybasicinfo->save();
      
    //     $notify[] = ['success', 'Party Added Successfully.'];
    //     return redirect()->route('admin.party')->withNotify($notify);
    // }
   
    
}
