<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
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
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Employee";
    //     $data['seo_desc']       = "Employee";
    //     $data['seo_keywords']   = "Employee";
    //     $data['page_title'] = "All Employee";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Employee::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.employee.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = Employee::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        // $data['employee_num'] = Employee::orderby('id','desc')->first();
        // if($data['employee_num']) {
        //     $data['employee_num'] = $data['employee_num']->code + 1;
        // } else {
        //     $data['employee_num'] = 1;
        // }
        
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
        return redirect()->route('admin.employee.create')->withNotify($notify);
    }
    
    
    public function store(Request $request)
    {
        $request->validate([
            'emp_name' => ['required', 'string', 'max:225', 'unique:employee']
        ]);
    
        $employee = new Employee();
        $employee->emp_code = $request->emp_code;
        $employee->pre_emp_code = $request->pre_emp_code;
        $employee->title = $request->title;
        $employee->machine_code = $request->machine_code;
        $employee->emp_name = $request->emp_name;
        $employee->father_name = $request->father_name;
        $employee->inactive = $request->inactive;
        $employee->nationality = $request->nationality;
        $employee->date = $request->date;
        $employee->appoint_date = $request->appoint_date;
        $employee->empoitment_status = $request->empoitment_status;
        $employee->rep = $request->rep;
        $employee->department = $request->department;
        $employee->location = $request->location;
        $employee->cost_center = $request->cost_center;
        $employee->designation = $request->designation;
        $employee->line_manager = $request->line_manager;
        $employee->company = $request->company;
        
        if ($request->hasFile('image')) 
        {
            $files = $request->file('image');
            $filename = uniqid().'.' . $files->getClientOriginalExtension();
            $directory = 'assets/upload/';
            $path = $files->move($directory, $filename);
            $employee->image = $filename;
        }
        
        $employee->salary_payable = $request->salary_payable;
        $employee->dob = $request->dob;
        $employee->gender = $request->gender;
        $employee->region = $request->region;
        $employee->marital_status = $request->marital_status;
        $employee->marriage_date = $request->marriage_date;
        $employee->nic_old = $request->nic_old;
        $employee->nic = $request->nic;
        $employee->issue_date = $request->issue_date;
        $employee->expiry = $request->expiry;
        $employee->phone_res = $request->phone_res;
        $employee->email = $request->email;
        $employee->mobile_no_1 = $request->mobile_no_1;
        $employee->mobile_no_2 = $request->mobile_no_2;
        $employee->address_no_1 = $request->address_no_1;
        $employee->address_no_2 = $request->address_no_2;
        $employee->bank = $request->bank;
        $employee->account_no = $request->account_no;
        $employee->last_working_date = $request->last_working_date;
        
        $employee->save();
        
        
        
        $notify[] = ['success', 'Employee Added Successfully.'];
        return redirect()->route('admin.employee.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'emp_name' => 'required'
        ]);
    
        $employee = Employee::where("id", $request->id)->first();
        
        $employee->emp_code = $request->emp_code;
        $employee->pre_emp_code = $request->pre_emp_code;
        $employee->title = $request->title;
        $employee->machine_code = $request->machine_code;
        $employee->emp_name = $request->emp_name;
        $employee->father_name = $request->father_name;
        $employee->inactive = $request->inactive;
        $employee->nationality = $request->nationality;
        $employee->date = $request->date;
        $employee->appoint_date = $request->appoint_date;
        $employee->empoitment_status = $request->empoitment_status;
        $employee->rep = $request->rep;
        $employee->department = $request->department;
        $employee->location = $request->location;
        $employee->cost_center = $request->cost_center;
        $employee->designation = $request->designation;
        $employee->line_manager = $request->line_manager;
        $employee->company = $request->company;
        
        if ($request->hasFile('image')) 
        {
            $files = $request->file('image');
            $filename = uniqid().'.' . $files->getClientOriginalExtension();
            $directory = 'assets/upload/';
            $path = $files->move($directory, $filename);
            $employee->image = $filename;
        }
        
        $employee->salary_payable = $request->salary_payable;
        $employee->dob = $request->dob;
        $employee->gender = $request->gender;
        $employee->region = $request->region;
        $employee->marital_status = $request->marital_status;
        $employee->marriage_date = $request->marriage_date;
        $employee->nic_old = $request->nic_old;
        $employee->nic = $request->nic;
        $employee->issue_date = $request->issue_date;
        $employee->expiry = $request->expiry;
        $employee->phone_res = $request->phone_res;
        $employee->email = $request->email;
        $employee->mobile_no_1 = $request->mobile_no_1;
        $employee->mobile_no_2 = $request->mobile_no_2;
        $employee->address_no_1 = $request->address_no_1;
        $employee->address_no_2 = $request->address_no_2;
        $employee->bank = $request->bank;
        $employee->account_no = $request->account_no;
        $employee->last_working_date = $request->last_working_date;
        $employee->update();
        
        $notify[] = ['success', 'Employee Updated Successfully.'];
        return redirect()->route('admin.employee.create')->withNotify($notify);
    }
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = Employee::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = Employee::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = Employee::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = Employee::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
