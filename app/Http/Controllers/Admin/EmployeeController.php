<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\SubCompany;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends AppBaseController
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

        $data['companies'] = SubCompany::select('id', 'name', 'shortName')->get();

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

            'image'                 => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'resume'                => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'offer_letter'          => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'joining_letter'        => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'appointment_letter'    => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'contract_paper'        => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'character_certificate' => 'nullable|file|mimes:pdf,doc,docx|max:2048',

            'id_front' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'id_back'  => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',

            'education_doc_16_years' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'education_doc_14_years' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'education_doc_other'    => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'education_doc_other_2'  => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);
    }

    public function store(Request $request)
    {
        $this->employee_validate($request);

        try {
            $employee = new Employee();
            $employee->fill($request->except([
                '_token',
                'last_salary',
                'basic_salary',
                'overtime_hourly_rate',
                'fixed_hourly_rate',
                'fixed_sunday_hourly_rate',
                'eobi',
                'bonus',
                'bonus_duration_month',
                'image',
                'resume',
                'offer_letter',
                'joining_letter',
                'appointment_letter',
                'contract_paper',
                'character_certificate',
                'id_front',
                'id_back',
                'education_doc_16_years',
                'education_doc_14_years',
                'education_doc_other',
                'education_doc_other_2'
            ]));

            $employee->last_salary = $request->last_salary ?? 0;
            $employee->basic_salary = $request->basic_salary ?? 0;
            $employee->overtime_hourly_rate = $request->overtime_hourly_rate ?? 0;
            $employee->fixed_hourly_rate = $request->fixed_hourly_rate ?? 0;
            $employee->fixed_sunday_hourly_rate = $request->fixed_sunday_hourly_rate ?? 0;
            $employee->eobi = $request->eobi ?? 0;
            $employee->bonus = $request->bonus ?? 0;
            $employee->bonus_duration_month = $request->bonus_duration_month ?? 0;

            if ($request->hasFile('image')) {
                $employee->image = uploadImage($request->file('image'), 'assets/uploads/');
            }

            if ($request->hasFile('resume')) {
                $employee->resume = uploadImage($request->file('resume'), 'assets/uploads/');
            }

            if ($request->hasFile('offer_letter')) {
                $employee->offer_letter = uploadImage($request->file('offer_letter'), 'assets/uploads/');
            }

            if ($request->hasFile('joining_letter')) {
                $employee->joining_letter = uploadImage($request->file('joining_letter'), 'assets/uploads/');
            }

            if ($request->hasFile('appointment_letter')) {
                $employee->appointment_letter = uploadImage($request->file('appointment_letter'), 'assets/uploads/');
            }

            if ($request->hasFile('contract_paper')) {
                $employee->contract_paper = uploadImage($request->file('contract_paper'), 'assets/uploads/');
            }

            if ($request->hasFile('id_front')) {
                $employee->id_front = uploadImage($request->file('id_front'), 'assets/uploads/');
            }

            if ($request->hasFile('id_back')) {
                $employee->id_back = uploadImage($request->file('id_back'), 'assets/uploads/');
            }

            if ($request->hasFile('character_certificate')) {
                $employee->character_certificate = uploadImage($request->file('character_certificate'), 'assets/uploads/');
            }

            if ($request->hasFile('education_doc_16_years')) {
                $employee->education_doc_16_years = uploadImage($request->file('education_doc_16_years'), 'assets/uploads/');
            }

            if ($request->hasFile('education_doc_14_years')) {
                $employee->education_doc_14_years = uploadImage($request->file('education_doc_14_years'), 'assets/uploads/');
            }

            if ($request->hasFile('education_doc_other')) {
                $employee->education_doc_other = uploadImage($request->file('education_doc_other'), 'assets/uploads/');
            }

            if ($request->hasFile('education_doc_other_2')) {
                $employee->education_doc_other_2 = uploadImage($request->file('education_doc_other_2'), 'assets/uploads/');
            }

            $employee->save();

            return $this->sendSuccess('Employee Added Successfully.');
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function update(Request $request)
    {
        $this->employee_validate($request);

        try {
            $employee = Employee::where("id", $request->id)->firstOrFail();
            $employee->fill($request->except([
                '_token',
                'last_salary',
                'basic_salary',
                'overtime_hourly_rate',
                'fixed_hourly_rate',
                'fixed_sunday_hourly_rate',
                'eobi',
                'bonus',
                'bonus_duration_month',
                'image'
            ]));

            $employee->last_salary = $request->last_salary ?? 0;
            $employee->basic_salary = $request->basic_salary ?? 0;
            $employee->overtime_hourly_rate = $request->overtime_hourly_rate ?? 0;
            $employee->fixed_hourly_rate = $request->fixed_hourly_rate ?? 0;
            $employee->fixed_sunday_hourly_rate = $request->fixed_sunday_hourly_rate ?? 0;
            $employee->eobi = $request->eobi ?? 0;
            $employee->bonus = $request->bonus ?? 0;
            $employee->bonus_duration_month = $request->bonus_duration_month ?? 0;

            if ($request->hasFile('image')) {
                $employee->image = uploadImage($request->file('image'), 'assets/uploads/', $employee->image);
            }

            if ($request->hasFile('resume')) {
                $employee->resume = uploadImage($request->file('resume'), 'assets/uploads/', $employee->resume);
            }

            if ($request->hasFile('offer_letter')) {
                $employee->offer_letter = uploadImage($request->file('offer_letter'), 'assets/uploads/', $employee->offer_letter);
            }

            if ($request->hasFile('joining_letter')) {
                $employee->joining_letter = uploadImage($request->file('joining_letter'), 'assets/uploads/', $employee->joining_letter);
            }

            if ($request->hasFile('appointment_letter')) {
                $employee->appointment_letter = uploadImage($request->file('appointment_letter'), 'assets/uploads/', $employee->appointment_letter);
            }

            if ($request->hasFile('contract_paper')) {
                $employee->contract_paper = uploadImage($request->file('contract_paper'), 'assets/uploads/', $employee->contract_paper);
            }

            if ($request->hasFile('id_front')) {
                $employee->id_front = uploadImage($request->file('id_front'), 'assets/uploads/', $employee->id_front);
            }

            if ($request->hasFile('id_back')) {
                $employee->id_back = uploadImage($request->file('id_back'), 'assets/uploads/', $employee->id_back);
            }

            if ($request->hasFile('character_certificate')) {
                $employee->character_certificate = uploadImage($request->file('character_certificate'), 'assets/uploads/', $employee->character_certificate);
            }

            if ($request->hasFile('education_doc_16_years')) {
                $employee->education_doc_16_years = uploadImage($request->file('education_doc_16_years'), 'assets/uploads/', $employee->education_doc_16_years);
            }

            if ($request->hasFile('education_doc_14_years')) {
                $employee->education_doc_14_years = uploadImage($request->file('education_doc_14_years'), 'assets/uploads/', $employee->education_doc_14_years);
            }

            if ($request->hasFile('education_doc_other')) {
                $employee->education_doc_other = uploadImage($request->file('education_doc_other'), 'assets/uploads/', $employee->education_doc_other);
            }

            if ($request->hasFile('education_doc_other_2')) {
                $employee->education_doc_other_2 = uploadImage($request->file('education_doc_other_2'), 'assets/uploads/', $employee->education_doc_other_2);
            }

            $employee->save();

            return $this->sendSuccess('Employee Added Successfully.');
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
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

    public function getAllData(Request $request)
    {
        if (isset($request->type) && $request->type == 'get_sales_rep') {
            $search_term = $request->search;
            $data = Employee::where('rep', 'LIKE', '%Sales-Rep%')
                ->where(function ($query) use ($search_term) {
                    $query->where('name', 'like', "%{$search_term}%")
                        ->orWhere('code', 'like', "%{$search_term}%");
                })
                ->select(['id', 'name as text'])
                ->get();
            return $data;
        }
    }
}
