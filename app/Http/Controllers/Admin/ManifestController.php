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

class ManifestController extends Controller
{
    public function index(Request $request)
    {
        $data['seo_title']      = "Manifest";
        $data['seo_desc']       = "Manifest";
        $data['seo_keywords']   = "Manifest";
        $data['page_title'] = "Manifest";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Manifest::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.manifest.index', $data);
    }
    
    
    public function create(Request $request)
    {
        $data['seo_title']      = "Manifest";
        $data['seo_desc']       = "Manifest";
        $data['seo_keywords']   = "Manifest";
        $data['page_title'] = "Manifest";
        return view('admin.manifest.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Manifest";
        $data['seo_desc']       = "Edit Manifest";
        $data['seo_keywords']   = "Edit Manifest";
        $data['page_title'] = "Edit Manifest";
        $data['manifest'] = Manifest::where("id", $id)->first();
        return view('admin.manifest.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Manifest::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Manifest Deleted Successfully.'];
        return redirect()->route('admin.manifest')->withNotify($notify);
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
