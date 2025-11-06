<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = Employee::Query();
            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
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

    public function delete($id)
    {
        $developer = Employee::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Employee Deleted Successfully.'];
        return redirect()->route('admin.employee.create')->withNotify($notify);
    }

    protected function employee_validate($request)
    {
        $request->validate([
            'code' => 'required|string|unique:employees,code,' . $request->id,
            'name' => 'required|string|max:100',
            'gender' => 'nullable|string',
            'dob' => 'nullable|date',
            'father_name' => 'nullable|string|max:100',
            'maritel_status' => 'nullable|string|max:50',
            'blood_group' => 'nullable|string|max:10',
            'mother_name' => 'nullable|string|max:100',
            'tax_no' => 'nullable|string|max:100',
            'nationality' => 'nullable|string|max:50',
            'qualification' => 'nullable|string|max:50',
            'work_experience' => 'nullable|string|max:50',
            'cnic' => 'nullable|string|max:20',
            'cnic_issue' => 'nullable|date',
            'cnic_expiry' => 'nullable|date',
            'health_issue' => 'nullable|string|max:100',

            'official_email' => 'nullable|email|max:200',
            'personal_email' => 'nullable|email|max:200',
            'country'        => 'nullable|string|max:50',
            'city'           => 'nullable|string|max:50',
            'state'          => 'nullable|string|max:50',
            'address'        => 'nullable|string|max:250',
            'zip'            => 'nullable|string|max:50',
            'phone'          => 'nullable|numeric',
            'cell_phone'     => 'nullable|numeric',
            'alt_phone'      => 'nullable|numeric',
            'cost_center'    => 'nullable|string|max:50',

            'payment_mode'   => 'nullable|string|max:20',
            'bank_name'      => 'nullable|string|max:100',
            'branch_name'    => 'nullable|string|max:100',
            'account_title'  => 'nullable|string|max:100',
            'account_number' => 'nullable|string|max:100',

            'last_salary'                    => 'nullable|numeric',
            'joining_date'                   => 'nullable|date',
            'salary_account'                 => 'nullable|in:0,1',
            'job_status'                     => 'nullable|string|max:30',
            'salary_policy'                  => 'nullable|string|max:50',
            'job_type'                       => 'nullable|string|max:50',
            'department_id'                  => 'nullable|integer|exists:',
            'designation_id'                 => 'nullable|integer|exists:',
            'line_manager_id'                => 'nullable|integer|exists:',
            'immediate_manager_id'           => 'nullable|integer|exists:',
            'immediate_manager_2_id'         => 'nullable|integer|exists:',
            'immediate_manager_3_id'         => 'nullable|integer|exists:',
            'basic_salary'                   => 'nullable|numeric',
            'overtime_hourly_rate'           => 'nullable|numeric',
            'fixed_hourly_rate'              => 'nullable|numeric',
            'fixed_sunday_hourly_rate'       => 'nullable|numeric',
            'eobi'                           => 'nullable|numeric',
            'bonus'                          => 'nullable|numeric',
            'bonus_duration_month'           => 'nullable|integer',
            'limit_company'                  => 'nullable',
            'is_attendance_punching_enabled' => 'nullable|in:0,1',
            'employee_shift'                 => 'nullable|string|max:30',
        ]);
    }

    public function store(Request $request)
    {


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

        if ($request->hasFile('image')) {
            $files = $request->file('image');
            $filename = uniqid() . '.' . $files->getClientOriginalExtension();
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

        if ($request->hasFile('image')) {
            $files = $request->file('image');
            $filename = uniqid() . '.' . $files->getClientOriginalExtension();
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

        if ($type == "first") {
            $data = Employee::orderBy('id', 'asc')->first();
        } else if ($type == "last") {
            $data = Employee::orderBy('id', 'desc')->first();
        } else if ($type == "forward") {
            $data = Employee::where('id', '>', $id)->first();
        } else if ($type == "backward") {
            $data = Employee::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }

        return $data;
    }
}
