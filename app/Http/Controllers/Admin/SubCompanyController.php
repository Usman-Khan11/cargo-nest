<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCompany;
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

class SubCompanyController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Stuffing";
    //     $data['seo_desc']       = "Stuffing";
    //     $data['seo_keywords']   = "Stuffing";
    //     $data['page_title'] = "All Stuffing";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Stuffing::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.stuffing.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = SubCompany::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Sub Company";
        $data['seo_desc']       = "Sub Company";
        $data['seo_keywords']   = "Sub Company";
        $data['page_title'] = "Sub Company";
        return view('admin.sub_company.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Sub Company";
        $data['seo_desc']       = "Edit Sub Company";
        $data['seo_keywords']   = "Edit Sub Company";
        $data['page_title'] = "Edit Sub Company";
        $data['subcompany'] = SubCompany::where("id", $id)->first();
        return view('admin.sub_company.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = SubCompany::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Sub Company Deleted Successfully.'];
        return redirect()->route('admin.sub_company.create')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:225', 'unique:sub_company']
        ]);
        
        $sub_company = new SubCompany();
        $sub_company->name = $request->name;
        $sub_company->displayName = $request->displayName;
        $sub_company->shortName = $request->shortName;
        $sub_company->address = $request->address;
        $sub_company->phone = $request->phone;
        $sub_company->email = $request->email;
        $sub_company->fax = $request->fax;
        $sub_company->website = $request->website;
        $sub_company->taxNumber = $request->taxNumber;
        $sub_company->regNumber = $request->regNumber;
        $sub_company->localization = $request->localization;
        $sub_company->region = $request->region;
        
        if ($request->hasFile('company_logo')) 
        {
            $files = $request->file('company_logo');
            $filename = uniqid().'.' . $files->getClientOriginalExtension();
            $directory = 'assets/upload/';
            $path = $files->move($directory, $filename);
            $sub_company->company_logo = $filename;
        }
        
        if ($request->hasFile('report_header')) 
        {
            $files = $request->file('report_header');
            $filename = uniqid().'.' . $files->getClientOriginalExtension();
            $directory = 'assets/upload/';
            $path = $files->move($directory, $filename);
            $sub_company->report_header = $filename;
        }
        
        $sub_company->currency = $request->currency;
        $sub_company->c_code = $request->c_code;
        $sub_company->country = $request->country;
        $sub_company->manual_header = $request->manual_header;
        $sub_company->manualHeader1 = $request->manualHeader1;
        $sub_company->manualHeader2 = $request->manualHeader2;
        $sub_company->manualHeader3 = $request->manualHeader3;
        $sub_company->manualHeader4 = $request->manualHeader4;
        $sub_company->save();
     
        $notify[] = ['success', 'Sub Company Added Successfully.'];
        return redirect()->route('admin.sub_company.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);
        
        $sub_company = SubCompany::where("id", $request->id)->first();
        $sub_company->name = $request->name;
        $sub_company->displayName = $request->displayName;
        $sub_company->shortName = $request->shortName;
        $sub_company->address = $request->address;
        $sub_company->phone = $request->phone;
        $sub_company->email = $request->email;
        $sub_company->fax = $request->fax;
        $sub_company->website = $request->website;
        $sub_company->taxNumber = $request->taxNumber;
        $sub_company->regNumber = $request->regNumber;
        $sub_company->localization = $request->localization;
        $sub_company->region = $request->region;
        
        if ($request->hasFile('company_logo')) 
        {
            $files = $request->file('company_logo');
            $filename = uniqid().'.' . $files->getClientOriginalExtension();
            $directory = 'assets/upload/';
            $path = $files->move($directory, $filename);
            $sub_company->company_logo = $filename;
        }
        
        if ($request->hasFile('report_header')) 
        {
            $files = $request->file('report_header');
            $filename = uniqid().'.' . $files->getClientOriginalExtension();
            $directory = 'assets/upload/';
            $path = $files->move($directory, $filename);
            $sub_company->report_header = $filename;
        }
        
        $sub_company->currency = $request->currency;
        $sub_company->c_code = $request->c_code;
        $sub_company->country = $request->country;
        $sub_company->manual_header = $request->manual_header;
        $sub_company->manualHeader1 = $request->manualHeader1;
        $sub_company->manualHeader2 = $request->manualHeader2;
        $sub_company->manualHeader3 = $request->manualHeader3;
        $sub_company->manualHeader4 = $request->manualHeader4;
        $sub_company->update();
        
        $notify[] = ['success', 'Sub Company Updated Successfully.'];
        return redirect()->route('admin.sub_company.create')->withNotify($notify);
    }
    
     
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = SubCompany::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = SubCompany::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = SubCompany::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = SubCompany::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
    
}
