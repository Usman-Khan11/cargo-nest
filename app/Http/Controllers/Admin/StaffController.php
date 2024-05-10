<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
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

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $data['seo_title']      = "Staff";
        $data['seo_desc']       = "Staff";
        $data['seo_keywords']   = "Staff";
        $data['page_title'] = "All Staff Record";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Admin::Query();
            $totalCount=$query->count(); 
            $query = $query->where('id', '!=', 1);
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.staff.index', $data);
    }
    
    
    public function create(Request $request)
    {
        $data['seo_title']      = "Staff";
        $data['seo_desc']       = "Staff";
        $data['seo_keywords']   = "Staff";
        $data['page_title'] = "Staff";
        $data['roles'] = Role::get();
        return view('admin.staff.create', $data);
    }
    
    public function edit($id)
    {
        if($id == 1) {
            return back();
        }
        $data['seo_title']      = "Edit Staff";
        $data['seo_desc']       = "Edit Staff";
        $data['seo_keywords']   = "Edit Staff";
        $data['page_title'] = "Edit Staff";
        $data['staff'] = Admin::where("id", $id)->first();
        $data['roles'] = Role::get();
        return view('admin.staff.edit', $data);
    }
    
    public function delete($id)
    {
        if($id == 1) {
            return back();
        }
        Admin::where("id", $id)->delete();
        $notify[] = ['success', 'Staff Deleted Successfully.'];
        return redirect()->route('admin.staff')->withNotify($notify);
    }
    
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'group_id' => 'required',
            'username' => 'required|string|max:20',
            'password' => 'required|string|max:20',
        ]);
    
        $staff = new Admin();
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->username = $request->username;
        $staff->password = Hash::make($request->password);
        $staff->role_id = $request->group_id;
        $staff->save();
        
        $notify[] = ['success', 'Staff Added Successfully.'];
        return redirect()->route('admin.staff')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'group_id' => 'required',
            'username' => 'required|string|max:20',
            'password' => 'required|string|max:20',
        ]);
    
        $staff = Admin::findOrFail($request->id);
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->username = $request->username;
        $staff->password = Hash::make($request->password);
        $staff->role_id = $request->group_id;
        $staff->save();
        
        $notify[] = ['success', 'Staff Updated Successfully.'];
        return redirect()->route('admin.staff')->withNotify($notify);
    }
    
}
