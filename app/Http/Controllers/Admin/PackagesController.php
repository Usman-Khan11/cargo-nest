<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Packages;
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
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = Packages::Query();
            $query = $query->orderby('id', 'asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }

        $data['seo_title']      = "Packages Coding";
        $data['seo_desc']       = "Packages Coding";
        $data['seo_keywords']   = "Packages Coding";
        $data['page_title'] = "Packages Coding";
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
        return back()->withNotify($notify);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pack_code' => ['required', 'string', 'max:225', 'unique:packages'],
            'pack_name' => ['required', 'string', 'max:225', 'unique:packages'],
        ]);

        $packages = new Packages();
        $packages->fill($request->all());
        $packages->save();

        $notify[] = ['success', 'Packages Added Successfully.'];
        return redirect()->route('admin.packages.create')->withNotify($notify);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'pack_code' => ['required', 'string', 'max:225'],
            'pack_name' => ['required', 'string', 'max:225'],
        ]);

        $packages = Packages::where("id", $request->id)->first();
        $packages->default = $request->default ? $request->default : '';
        $packages->fill($request->all());
        $packages->save();

        $notify[] = ['success', 'Packages Updated Successfully.'];
        return redirect()->route('admin.packages.create')->withNotify($notify);
    }

    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;

        if ($type == "first") {
            $data = Packages::orderBy('id', 'asc')->first();
        } else if ($type == "last") {
            $data = Packages::orderBy('id', 'desc')->first();
        } else if ($type == "forward") {
            $data = Packages::where('id', '>', $id)->first();
        } else if ($type == "backward") {
            $data = Packages::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }

        return $data;
    }
}
