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

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $data['seo_title']      = "Employee";
        $data['seo_desc']       = "Employee";
        $data['seo_keywords']   = "Employee";
        $data['page_title'] = "All Employee";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Employee::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.employee.index', $data);
    }
    
    
    public function create(Request $request)
    {
        $data['seo_title']      = "Employee";
        $data['seo_desc']       = "Employee";
        $data['seo_keywords']   = "Employee";
        $data['page_title'] = "Employee";
        return view('admin.employee.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Employee";
        $data['seo_desc']       = "Employee";
        $data['seo_keywords']   = "Employee";
        $data['page_title'] = "Employee";
        $data['employee'] = Role::where("id", $id)->first();
        return view('admin.employee.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Employee::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Employee Deleted Successfully.'];
        return redirect()->route('admin.employee')->withNotify($notify);
    }
    
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->save();
        
        $notify[] = ['success', 'Employee Added Successfully.'];
        return redirect()->route('admin.employee')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $employee = Role::findOrFail($request->id);
        $employee->name = $request->name;
        $employee->save();
        
        $notify[] = ['success', 'Employee Updated Successfully.'];
        return redirect()->route('admin.employee')->withNotify($notify);
    }
    
}
