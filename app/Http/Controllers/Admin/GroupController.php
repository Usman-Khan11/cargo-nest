<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $data['seo_title']      = "Group";
        $data['seo_desc']       = "Group";
        $data['seo_keywords']   = "Group";
        $data['page_title'] = "All Group Record";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Role::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.group.index', $data);
    }
    
    
    public function create(Request $request)
    {
        $data['seo_title']      = "Add New Group";
        $data['seo_desc']       = "Add New Group";
        $data['seo_keywords']   = "Add New Group";
        $data['page_title'] = "Add New Group";
        return view('admin.group.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Group";
        $data['seo_desc']       = "Edit Group";
        $data['seo_keywords']   = "Edit Group";
        $data['page_title'] = "Edit Group";
        $data['group'] = Role::where("id", $id)->first();
        return view('admin.group.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Role::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Group Deleted Successfully.'];
        return redirect()->route('admin.group')->withNotify($notify);
    }
    
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $role = new Role();
        $role->name = $request->name;
        $role->save();
        
        $notify[] = ['success', 'Group Added Successfully.'];
        return redirect()->route('admin.group')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $role = Role::findOrFail($request->id);
        $role->name = $request->name;
        $role->save();
        
        $notify[] = ['success', 'Group Updated Successfully.'];
        return redirect()->route('admin.group')->withNotify($notify);
    }
    
}
