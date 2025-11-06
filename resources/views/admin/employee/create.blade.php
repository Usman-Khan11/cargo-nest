@extends('admin.layouts.app')

@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="formReset('/admin/employee/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/employee/delete')">
                <i class="fa fa-circle-xmark" title="Delete"></i>
            </div>
            <div class="refresh">
                <i class="fa fa-refresh" title="Reload"></i>
            </div>
            <div class="lock">
                <i class="fa fa-lock" title="Lock"></i>
            </div>
            <div class="ban">
                <i class="fa fa-ban" title="Void"></i>
            </div>
            <div class="backward navigation" data-type="first">
                <i class="fa fa-backward-step" title="First"></i>
            </div>
            <div class="backward navigation" data-type="backward">
                <i class="fa fa-backward" title="Backward"></i>
            </div>
            <div class="forward navigation" data-type="forward">
                <i class="fa fa-forward" title="Forward"></i>
            </div>
            <div class="forward navigation" data-type="last">
                <i class="fa fa-forward-step" title="Last"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-7">
                <div class="d-flex align-items-center">
                    <label style="padding:0px 10px;">Search</label>
                    <select class="form-select">
                        <option></option>
                        <option>Search</option>
                    </select>
                </div>
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control" />
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="d-flex">
            <div class="check">
                <i class="fa fa-circle-check"></i>
            </div>
            <div class="file-check">
                <i class="fa fa-file-circle-check"></i>
            </div>
            <div class="file_line">
                <i class="fa fa-file-lines"></i>
            </div>
        </div>

    </div>
@endsection

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <form id="myForm" method="post" action="{{ route('admin.employee.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0" />

                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="border">
                                        <h5 class="mb-1 p-1 px-2 text-white bg-primary text-center">Personal Information
                                        </h5>
                                        <div class="row px-1">
                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Emp Code</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="code" type="text" class="form-control code"
                                                            value="{{ old('code') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-5">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Employee Name</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="name" type="text" class="form-control name"
                                                            value="{{ old('name') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Gender</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select name="gender" class="form-select gender">
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Date of Birth</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="dob" type="date" class="form-control dob"
                                                            value="{{ old('dob') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-5">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Father Name</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="father_name" type="text"
                                                            class="form-control father_name"
                                                            value="{{ old('father_name') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Marital</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select name="maritel_status" class="form-select maritel_status">
                                                            <option value="Single">Single</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Divorced">Divorced</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Blood Group</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select name="blood_group" class="form-select blood_group">
                                                            <option value=""></option>
                                                            <option value="A+">A+</option>
                                                            <option value="O+">O+</option>
                                                            <option value="B+">B+</option>
                                                            <option value="AB+">AB+</option>
                                                            <option value="A-">A-</option>
                                                            <option value="O-">O-</option>
                                                            <option value="B-">B-</option>
                                                            <option value="AB-">AB-</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-5">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Mother Name</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="mother_name" type="text"
                                                            class="form-control mother_name"
                                                            value="{{ old('mother_name') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Tax No.</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="tax_no" type="text" class="form-control tax_no"
                                                            value="{{ old('tax_no') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Nationality</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="nationality" type="text"
                                                            class="form-control nationality"
                                                            value="{{ old('nationality') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-5">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Qualification</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="qualification" type="text"
                                                            class="form-control qualification"
                                                            value="{{ old('qualification') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Work Expr</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="work_experience" type="text"
                                                            class="form-control work_experience"
                                                            value="{{ old('work_experience') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">CNIC</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="cnic" type="text" class="form-control cnic"
                                                            value="{{ old('cnic') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-5">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Health Issues</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="health_issue" type="text"
                                                            class="form-control health_issue"
                                                            value="{{ old('health_issue') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">CNIC Issue</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="cnic_issue_date" type="date"
                                                            class="form-control cnic_issue_date"
                                                            value="{{ old('cnic_issue_date') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">CNIC Expiry</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="cnic_expiry" type="date"
                                                            class="form-control cnic_expiry"
                                                            value="{{ old('cnic_expiry') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="border">
                                        <h5 class="mb-1 p-1 px-2 text-white bg-primary text-center">
                                            Contact Details
                                        </h5>
                                        <div class="row px-1">
                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-3">
                                                        <label class="form-label">Official Email</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <input name="official_email" type="email"
                                                            class="form-control official_email"
                                                            value="{{ old('official_email') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-3">
                                                        <label class="form-label">Personal Email</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <input name="personal_email" type="email"
                                                            class="form-control personal_email"
                                                            value="{{ old('personal_email') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-3">
                                                        <label class="form-label">Country</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <input name="country" type="text" class="form-control country"
                                                            value="{{ old('country') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-3">
                                                        <label class="form-label">City</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <input name="city" type="text" class="form-control city"
                                                            value="{{ old('city') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-3">
                                                        <label class="form-label">State</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <input name="state" type="text" class="form-control state"
                                                            value="{{ old('state') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-3">
                                                        <label class="form-label">Address</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <input name="address" type="text" class="form-control address"
                                                            value="{{ old('address') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-3">
                                                        <label class="form-label">ZIP</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <input name="zip" type="text" class="form-control zip"
                                                            value="{{ old('zip') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-3">
                                                        <label class="form-label">Phone #</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <input name="phone" type="text" class="form-control phone"
                                                            value="{{ old('phone') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-3">
                                                        <label class="form-label">Cell Phone</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <input name="cell_phone" type="text"
                                                            class="form-control cell_phone"
                                                            value="{{ old('cell_phone') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-3">
                                                        <label class="form-label">Alt. Phone</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <input name="alt_phone" type="text"
                                                            class="form-control alt_phone"
                                                            value="{{ old('alt_phone') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-3">
                                                        <label class="form-label">Cost Center</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <select name="cost_center" class="form-select cost_center">
                                                            <option value=""></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="border">
                                        <h5 class="mb-1 p-1 px-2 text-white bg-primary text-center">
                                            Payment Information
                                        </h5>
                                        <div class="row px-1">
                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-3">
                                                        <label class="form-label">Payment Mode</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <select name="payment_mode" class="form-select payment_mode">
                                                            <option value="cash">Cash</option>
                                                            <option value="cheque">Cheque</option>
                                                            <option value="bank">Bank</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-3">
                                                        <label class="form-label">Bank</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <select name="bank_name" class="form-select bank_name">
                                                            <option value="cash"></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-3">
                                                        <label class="form-label">Branch Name</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <input name="branch_name" type="text"
                                                            class="form-control branch_name"
                                                            value="{{ old('branch_name') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-3">
                                                        <label class="form-label">Account Title</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <input name="account_title" type="text"
                                                            class="form-control account_title"
                                                            value="{{ old('account_title') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-3">
                                                        <label class="form-label">Account Number</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <input name="account_number" type="text"
                                                            class="form-control account_number"
                                                            value="{{ old('account_number') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-2">
                                        <div class="row px-1">
                                            <div class="col-md-6">
                                                <div class="p-3"
                                                    style="border: 1px solid #eee; background-color: #e7fcdc;">
                                                    <label class="form-check-label mb-2">
                                                        <input type="checkbox" name="rep[]" value="Sales-Rep"
                                                            class="form-check-input rep">
                                                        Sales Rep
                                                    </label><br>
                                                    <label class="form-check-label mb-2">
                                                        <input type="checkbox" name="rep[]" value="Docs-Rep"
                                                            class="form-check-input rep">
                                                        Docs Rep
                                                    </label><br>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name="rep[]" value="Account-Rep"
                                                            class="form-check-input rep">
                                                        Account Rep
                                                    </label>
                                                </div>

                                                <button type="button" class="btn btn-primary btn-sm mt-2"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"> Show List
                                                </button>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <h5>Image</h5>
                                                <div id="imageContainer">
                                                    <img id="uploadedImage"
                                                        src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png"
                                                        width="75%" class="mb-2">
                                                </div>
                                                <div class="main-image">
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="document.getElementById('uploadInput').click()">Upload</button>
                                                    <input type="file" hidden class="form-control" name="image"
                                                        id="uploadInput" accept="image/*" />
                                                    <button id="removeButton" type="button"
                                                        class="btn btn-danger btn-sm mx-3">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="border">
                                        <h5 class="mb-1 p-1 px-2 text-white bg-primary text-center">
                                            Official Status
                                        </h5>
                                        <div class="row px-1">
                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Last Salary</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="last_salary" type="text"
                                                            class="form-control last_salary"
                                                            value="{{ old('last_salary') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Joining Date</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="joining_date" type="date"
                                                            class="form-control joining_date"
                                                            value="{{ old('joining_date') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Salary Acc</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select name="salary_account" class="form-select salary_account">
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Job Status</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select name="job_status" class="form-select job_status">
                                                            <option value="Permanent">Permanent</option>
                                                            <option value="Probation">Probation</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Salary Policy</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select name="salary_policy" class="form-select salary_policy">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Employement Status</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select name="job_type" class="form-select job_type">
                                                            <option value="1">Full Time Contract</option>
                                                            <option value="2">Full Time Internship</option>
                                                            <option value="3">Full Time Permanent</option>
                                                            <option value="4">Part Time Contract</option>
                                                            <option value="5">Part Time Internship</option>
                                                            <option value="6">Part Time Permanent</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Department</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select name="department" class="form-select department">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Designation</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select name="designation" class="form-select designation">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Line Manager</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select name="line_manager" class="form-select line_manager">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Immediate Manager</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select name="immediate_manager"
                                                            class="form-select immediate_manager">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Immediate Manager 2</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select name="immediate_manager_2"
                                                            class="form-select immediate_manager_2">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Immediate Manager 3</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select name="immediate_manager_3"
                                                            class="form-select immediate_manager_3">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Basic Salary</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="basic_salary" type="number" step="any"
                                                            value="{{ old('basic_salary') }}"
                                                            class="form-control basic_salary">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Overtime Hourly Rate</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="overtime_hourly_rate" type="number" step="any"
                                                            value="{{ old('overtime_hourly_rate') }}"
                                                            class="form-control overtime_hourly_rate">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Fixed Hourly Rate</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="fixed_hourly_rate" type="number" step="any"
                                                            value="{{ old('fixed_hourly_rate') }}"
                                                            class="form-control fixed_hourly_rate">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Fixed Sunday Hourly Rate</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="fixed_sunday_hourly_rate" type="number"
                                                            step="any" value="{{ old('fixed_sunday_hourly_rate') }}"
                                                            class="form-control fixed_sunday_hourly_rate">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">EOBI</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="eobi" type="number" step="any"
                                                            value="{{ old('eobi') }}" class="form-control eobi">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Bonus</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="bonus" type="number" step="any"
                                                            value="{{ old('bonus') }}" class="form-control bonus">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Bonus Duration (Months)</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="bonus_duration_month" type="number" step="any"
                                                            value="{{ old('bonus_duration_month') }}"
                                                            class="form-control bonus_duration_month">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Limit Company</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select name="limit_company[]" multiple
                                                            class="form-select limit_company select2"></select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Enable Attendance Punching</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select name="is_attendance_punching_enabled"
                                                            class="form-select attendance_punching">
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Employee Shift</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select name="employee_shift" class="form-select employee_shift">
                                                            <option value="Morning">Morning</option>
                                                            <option value="Evening">Evening</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="border">
                                        <h5 class="mb-1 p-1 px-2 text-white bg-primary text-center">
                                            Employee Documents
                                        </h5>
                                        <div class="row px-1">
                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Resume</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input type="file" name="resume" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Offer Letter</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input type="file" name="offer_letter" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Joining Letter</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input type="file" name="joining_letter" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Appointment Letter</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input type="file" name="appointment_letter"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Contract Paper</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input type="file" name="contract_paper" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">ID Proff Front</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input type="file" name="id_front" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">ID Proff Back</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input type="file" name="id_back" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Character Certificate</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input type="file" name="character_certificate"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Education Document (16 Years)</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input type="file" name="education_doc_16_years"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Education Document (14 Years)</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input type="file" name="education_doc_14_years"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Education Document (Other)</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input type="file" name="education_doc_other"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label">Education Document (Other 2)</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input type="file" name="education_doc_other_2"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="border">
                                        <h5 class="mb-1 p-1 px-2 text-white bg-primary text-center">
                                            Reference
                                        </h5>

                                        <div>
                                            <table class="table table-bordered text-center" id="reference_table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <button type="button" class="btn btn-primary btn-sm"
                                                                onclick="addReference()">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </th>
                                                        <th width="20%">Name</th>
                                                        <th width="20%">CNIC</th>
                                                        <th width="20%">Contact No</th>
                                                        <th width="20%">Company</th>
                                                        <th width="20%">Designation</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                onclick="deleteReference(this)">
                                                                <i class="fa fa-trash-alt"></i>
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="reference[0][name]"
                                                                class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="reference[0][cnic]"
                                                                class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="reference[0][contact_no]"
                                                                class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="reference[0][company]"
                                                                class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="reference[0][designation]"
                                                                class="form-control">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="border mt-2">
                                        <h5 class="mb-1 p-1 px-2 text-white bg-primary text-center">
                                            Dependants
                                        </h5>

                                        <div>
                                            <table class="table table-bordered text-center" id="dependants_table">
                                                <thead>
                                                    <tr>
                                                        <th width="10%">
                                                            <button type="button" class="btn btn-primary btn-sm"
                                                                onclick="addDependant()">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </th>
                                                        <th width="30%">Dependant</th>
                                                        <th width="30%">Relation</th>
                                                        <th width="30%">Contact No</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                onclick="deleteDependant(this)">
                                                                <i class="fa fa-trash-alt"></i>
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="dependant[0][name]"
                                                                class="form-control">
                                                        </td>
                                                        <td>
                                                            <select name="dependant[0][relation]" class="form-select">
                                                                <option value="1">Parent</option>
                                                                <option value="2">Spouse</option>
                                                                <option value="3">Children</option>
                                                                <option value="4">Siblings</option>
                                                                <option value="8">Other</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="dependant[0][contact_no]"
                                                                class="form-control">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    {{-- <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label class="form-label">Pre-Emp Code:</label>
                                                <input name="pre_emp_code" type="text"
                                                    class="form-control pre_emp_code">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label class="form-label">Title:</label>
                                                <select name="title" class="form-select title">
                                                    <option selected></option>
                                                    <option value="MR">MR.</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label class="form-label">Machine Code:</label>
                                                <input name="machine_code" type="text"
                                                    class="form-control machine_code">
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Employee List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive w-100">
                        <table class="table table-bordered table-sm quotation_record"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        var datatable = null;

        $(document).ready(function() {

            datatable = $(".quotation_record").DataTable({
                select: {
                    style: "api",
                },
                processing: true,
                searching: false,
                serverSide: true,
                lengthChange: false,
                pageLength: 10,
                //   scrollX: true,
                ajax: {
                    url: "{{ route('admin.employee.create') }}",
                    type: "get",
                    data: function(d) {},
                },
                columns: [{
                        data: "emp_code",
                        title: "Emp Code",
                    },
                    {
                        data: "emp_name",
                        title: "Emp Name",
                    },
                    {
                        data: "dob",
                        title: "DOB",
                    },
                    {
                        data: "gender",
                        title: "Gender",
                    },
                    {
                        data: "image",
                        title: "Image",
                        "render": function(data, type, full, meta) {
                            return `<img src="{{ asset('assets/upload/') }}/${full.image}" width="100px" loading="lazy" />`;
                        }
                    },
                ],
                rowCallback: function(row, data) {
                    $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`);
                },
            });
        });





        $('#submitButton').click(function() {
            // Trigger form submission
            $('#myForm').submit();
        });

        function edit_row(e, data) {
            data = JSON.parse(data);
            if (data) {
                $(".emp_code").val(data.emp_code);
                $(".pre_emp_code").val(data.pre_emp_code);
                $(".title").val(data.title);
                $(".machine_code").val(data.machine_code);
                $(".emp_name").val(data.emp_name);
                $(".father_name").val(data.father_name);

                $(".inactive").removeAttr('checked');
                $(`.inactive[value=${data.inactive}]`).attr('checked', true);

                $(".nationality").val(data.nationality);
                $(".date").val(data.date);
                $(".appoint_date").val(data.appoint_date);
                $(".empoitment_status").val(data.empoitment_status);

                $(".rep").removeAttr('checked');
                $(`.rep[value=${data.rep}]`).attr('checked', true);

                $(".department").val(data.department);
                $(".location").val(data.location);
                $(".cost_center").val(data.cost_center);
                $(".designation").val(data.designation);
                $(".line_manager").val(data.line_manager);
                $(".company").val(data.company);
                $(".salary_payable").val(data.salary_payable);
                $(".dob").val(data.dob);
                $(".gender").val(data.gender);
                $(".region").val(data.region);
                $(".maritel_status").val(data.maritel_status);
                $(".marrage_date").val(data.marrage_date);
                $(".NIC_Old").val(data.NIC_Old);
                $(".nic").val(data.nic);
                $(".issue_date").val(data.issue_date);
                $(".expiry").val(data.expiry);
                $(".phone_res").val(data.phone_res);
                $(".email").val(data.email);
                $(".mobile_no_1").val(data.mobile_no_1);
                $(".mobile_no_2").val(data.mobile_no_2);
                $(".address_no_1").val(data.address_no_1);
                $(".address_no_2").val(data.address_no_2);
                $(".bank").val(data.bank);
                $(".account_no").val(data.account_no);
                $(".last_working_date").val(data.last_working_date);

                if (data.image) {
                    $('#uploadedImage').attr('src', "{{ asset('assets/upload/') }}/" + data.image)
                } else {
                    $('#uploadedImage').attr('src',
                        "https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png"
                    )
                }

                $("#myForm").attr("action", "{{ route('admin.employee.update') }}");
                $("input[name=id]").val(data.id);
            }
        }


        $(".navigation").click(function() {
            let id = $("input[name=id]").val();
            let route = '/admin/employee/get';
            let type = $(this).attr('data-type');
            let data = getList(route, type, id);
            if (data != null) {
                edit_row('', JSON.stringify(data));
            }
        })


        document.getElementById('uploadInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();

            reader.onload = function(e) {
                const imageUrl = e.target.result;
                const imageElement = document.createElement('img');
                imageElement.src = imageUrl;
                $('#uploadedImage').attr('src', imageUrl)
                // imageElement.alt = 'Uploaded Image';
                // document.getElementById('imageContainer').innerHTML = '';
                // document.getElementById('imageContainer').appendChild(imageElement);
            };

            reader.readAsDataURL(file);
        });

        document.getElementById('removeButton').addEventListener('click', function() {
            const imageContainer = document.getElementById('imageContainer');
            imageContainer.innerHTML =
                '<img id="uploadedImage" src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png" width="75%" class="mb-2" alt="Static Image">';
            document.getElementById('removeButton').style.display = 'none';
            document.getElementById('uploadInput').value = '';
        });

        function addReference() {
            let $lastRow = $("#reference_table tbody tr:last");
            let $newRow = $lastRow.clone();

            $newRow.find("textarea, input").val('');
            $("#reference_table tbody").append($newRow);
            referenceReindexRows();
        }

        function deleteReference(e) {
            if ($("#reference_table tbody tr").length > 1) {
                $(e).closest("tr").remove();
                referenceReindexRows();
            } else {
                $("#reference_table tbody tr:last").find("textarea, input").val('');
            }
        }

        function referenceReindexRows() {
            $("#reference_table tbody tr").each(function(index) {
                $(this).find("input").each(function() {
                    let name = $(this).attr("name");
                    if (name) {
                        name = name.replace(/\[\d+\]/, "[" + index + "]");
                        $(this).attr("name", name);
                    }
                });
            });
        }

        function addDependant() {
            let $lastRow = $("#dependants_table tbody tr:last");
            let $newRow = $lastRow.clone();

            $newRow.find("textarea, input").val('');
            $newRow.find("select").val('').trigger('change');
            $("#dependants_table tbody").append($newRow);
            DependantsReindexRows();
        }

        function deleteDependant(e) {
            if ($("#dependants_table tbody tr").length > 1) {
                $(e).closest("tr").remove();
                DependantsReindexRows();
            } else {
                $("#dependants_table tbody tr:last").find("textarea, input").val('');
                $("#dependants_table tbody tr:last").find("select").val('').trigger('change');
            }
        }

        function DependantsReindexRows() {
            $("#dependants_table tbody tr").each(function(index) {
                $(this).find("input, select").each(function() {
                    let name = $(this).attr("name");
                    if (name) {
                        name = name.replace(/\[\d+\]/, "[" + index + "]");
                        $(this).attr("name", name);
                    }
                });
            });
        }
    </script>
@endpush
