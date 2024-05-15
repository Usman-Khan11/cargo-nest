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

class JobController extends Controller
{
    public function index(Request $request)
    {
        $data['seo_title']      = "Se Job";
        $data['seo_desc']       = "Se Job";
        $data['seo_keywords']   = "Se Job";
        $data['page_title'] = "Se Job";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Job::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.job.index', $data);
    }
    
    
    public function create(Request $request)
    {
        $data['seo_title']      = "Se Job";
        $data['seo_desc']       = "Se Job";
        $data['seo_keywords']   = "Se Job";
        $data['page_title'] = "Se Job";
        return view('admin.job.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Se Job";
        $data['seo_desc']       = "Edit Se Job";
        $data['seo_keywords']   = "Edit Se Job";
        $data['page_title'] = "Edit Se Job";
        $data['job'] = Job::where("id", $id)->first();
        return view('admin.job.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Job::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Se Job Deleted Successfully.'];
        return redirect()->route('admin.job')->withNotify($notify);
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
