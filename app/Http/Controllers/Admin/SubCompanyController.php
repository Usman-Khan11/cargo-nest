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
// use DataTables;
use File;
use Yajra\DataTables\Facades\DataTables;

class SubCompanyController extends Controller
{
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = SubCompany::Query();
            $query = $query->with('country', 'currency');
            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
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
        $request->validate([
            'name' => 'required|string|max:200|unique:sub_company',
            'displayName' => 'nullable|string|max:200',
            'shortName' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:1000',
            'phone' => 'nullable|string|max:25',
            'email' => 'nullable|string|max:200',
            'fax' => 'nullable|string|max:25',
            'website' => 'nullable|string|max:200',
            'taxNumber' => 'nullable|string|max:150',
            'regNumber' => 'nullable|string|max:150',
            'localization' => 'nullable|string|max:100',
            'region' => 'nullable|string|max:100',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10000',
            'report_header' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10000',
            'currency' => 'nullable|integer',
            'country' => 'nullable|integer',
            'manualHeader1' => 'nullable|string|max:1000',
            'manualHeader2' => 'nullable|string|max:1000',
            'manualHeader3' => 'nullable|string|max:1000',
            'manualHeader4' => 'nullable|string|max:1000',
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

        if ($request->hasFile('company_logo')) {
            $files = $request->file('company_logo');
            $filename = uniqid() . '.' . $files->getClientOriginalExtension();
            $directory = 'assets/upload/';
            $path = $files->move($directory, $filename);
            $sub_company->company_logo = $directory . $filename;
        }

        if ($request->hasFile('report_header')) {
            $files = $request->file('report_header');
            $filename = uniqid() . '.' . $files->getClientOriginalExtension();
            $directory = 'assets/upload/';
            $path = $files->move($directory, $filename);
            $sub_company->report_header = $directory . $filename;
        }

        $sub_company->currency = $request->currency;
        $sub_company->country = $request->country;
        $sub_company->manual_header = isset($request->manual_header) ? 1 : 0;
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
        $request->validate([
            'name' => 'required|string|max:200',
            'displayName' => 'nullable|string|max:200',
            'shortName' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:1000',
            'phone' => 'nullable|string|max:25',
            'email' => 'nullable|string|max:200',
            'fax' => 'nullable|string|max:25',
            'website' => 'nullable|string|max:200',
            'taxNumber' => 'nullable|string|max:150',
            'regNumber' => 'nullable|string|max:150',
            'localization' => 'nullable|string|max:100',
            'region' => 'nullable|string|max:100',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10000',
            'report_header' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10000',
            'currency' => 'nullable|integer',
            'country' => 'nullable|integer',
            'manualHeader1' => 'nullable|string|max:1000',
            'manualHeader2' => 'nullable|string|max:1000',
            'manualHeader3' => 'nullable|string|max:1000',
            'manualHeader4' => 'nullable|string|max:1000',
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

        if ($request->hasFile('company_logo')) {
            $files = $request->file('company_logo');
            $filename = uniqid() . '.' . $files->getClientOriginalExtension();
            $directory = 'assets/upload/';
            $path = $files->move($directory, $filename);
            $sub_company->company_logo = $directory . $filename;
        }

        if ($request->hasFile('report_header')) {
            $files = $request->file('report_header');
            $filename = uniqid() . '.' . $files->getClientOriginalExtension();
            $directory = 'assets/upload/';
            $path = $files->move($directory, $filename);
            $sub_company->report_header = $directory . $filename;
        }

        $sub_company->currency = $request->currency;
        $sub_company->c_code = $request->c_code;
        $sub_company->country = $request->country;
        $sub_company->manual_header = isset($request->manual_header) ? 1 : 0;
        $sub_company->manualHeader1 = $request->manualHeader1;
        $sub_company->manualHeader2 = $request->manualHeader2;
        $sub_company->manualHeader3 = $request->manualHeader3;
        $sub_company->manualHeader4 = $request->manualHeader4;
        $sub_company->save();

        $notify[] = ['success', 'Sub Company Updated Successfully.'];
        return redirect()->route('admin.sub_company.create')->withNotify($notify);
    }


    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = SubCompany::Query();

        if ($type == "first") {
            $data = $data->orderBy('id', 'asc');
        } else if ($type == "last") {
            $data = $data->orderBy('id', 'desc');
        } else if ($type == "forward") {
            $data = $data->where('id', '>', $id);
        } else if ($type == "backward") {
            $data = $data->where('id', '<', $id)->orderBy('id', 'desc');
        }

        $data = $data->with(
            'country',
            'currency'
        )->first();

        return $data;
    }
}
