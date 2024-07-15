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
            <input type="text" class="form-control"/>
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
                <form id="myForm" method="post" action="{{ route('admin.employee.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0" />
                             <div class="row">
                                <div class="col-md-9">
                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label class="form-label">Emp Code:</label>
                                                <input name="emp_code" type="text" class="form-control emp_code">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label class="form-label">Pre-Emp Code:</label>
                                                <input name="pre_emp_code" type="text" class="form-control pre_emp_code">
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
                                                <input name="machine_code" type="text" class="form-control machine_code">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label">Employee Name:</label>
                                                        <input name="emp_name" type="text" class="form-control emp_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label">Father Name:</label>
                                                        <input name="father_name" type="text" class="form-control father_name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label class="form-check-label mt-4">
                                                    <input type="checkbox" name="inactive" value="Inactive" class="form-check-input inactive">
                                                    Inactive
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label">Nationality:</label>
                                                        <select name="nationality" class="form-control nationality">
                                                            <option value=""></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label">Date:</label>
                                                        <input name="date" type="date" class="form-control date">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label">Appointment:</label>
                                                        <input name="appoint_date" type="date" class="form-control appoint_date">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label">Empoitment Status:</label>
                                                        <select name="empoitment_status" class="form-control empoitment_status">
                                                            <option value="">Probation</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6" style="border: 1px solid #eee; background-color: #e7fcdc;">
                                                    <div class="py-3">
                                                        <label class="form-check-label mb-2">
                                                            <input type="checkbox" name="rep[]" value="Sales-Rep" class="form-check-input rep">
                                                            Sales Rep
                                                        </label><br>
                                                        <label class="form-check-label mb-2">
                                                            <input type="checkbox" name="rep[]" value="Docs-Rep" class="form-check-input rep">
                                                            Docs Rep
                                                        </label><br>
                                                        <label class="form-check-label">
                                                            <input type="checkbox" name="rep[]" value="Account-Rep" class="form-check-input rep">
                                                            Account Rep
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"> Show List </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label class="form-label">Department</label>
                                                <select name="department" class="form-select department">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label class="form-label">Location</label>
                                                <select name="location" class="form-select location">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label class="form-label">Cost Center</label>
                                                <select name="cost_center" class="form-select cost_center">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label class="form-label">Designation</label>
                                                <select name="designation" class="form-select designation">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label class="form-label">Line Manager</label>
                                                <select name="line_manager" class="form-select line_manager">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label class="form-label">Company</label>
                                                <select name="company" class="form-select company">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label class="form-label">Salary Payable Account:</label>
                                                <input name="salary_payable" type="text" class="form-control salary_payable">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="col-md-3 text-center">
                                    <h5>Image</h5>
                                    
                                    <div id="imageContainer">
                                        <img id="uploadedImage" src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png" width="75%" class="mb-2">
                                    </div>
                                    
                                    <div class="main-image" >
                                        <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('uploadInput').click()">Upload</button>
                                        <input type="file" hidden class="form-control" name="image" id="uploadInput" accept="image/*" />
                                        <button id="removeButton" type="button" class="btn btn-danger btn-sm mx-3">Remove</button>
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    <h5>personal Info</h5>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label>Date Of Birth:</label>
                                            <input name="dob" type="date" class="form-control dob">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label>Gender:</label>
                                            <select name="gender" class="form-control gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label>Region:</label>
                                            <select name="region" class="form-control region">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label>Maritel Status:</label>
                                            <select name="maritel_status" class="form-control maritel_status">
                                                <option>Single</option>
                                                <option>Married</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label>Marriage Date:</label>
                                            <input type="date" name="marrage_date" class="form-control marrage_date">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">NIC (Old):</label>
                                            <input name="NIC_Old" type="text" class="form-control NIC_Old">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label class="form-label">Nic:</label>
                                            <input name="nic" type="text" class="form-control nic">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Issue Date:</label>
                                            <input name="issue_date" type="date" class="form-control issue_date">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Expiry:</label>
                                            <input name="expiry" type="date" class="form-control expiry">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Phone (Res):</label>
                                            <input name="phone_res" type="text" class="form-control phone_res">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label class="form-label">Email:</label>
                                            <input name="email" type="email" class="form-control email">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label class="form-label">Mobile No 1:</label>
                                            <input name="mobile_no_1" type="text" class="form-control mobile_no_1">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label class="form-label">Mobile No 2:</label>
                                            <input name="mobile_no_2" type="text" class="form-control mobile_no_2">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label class="form-label">Address No 1:</label>
                                            <input name="address_no_1" type="text" class="form-control address_no_1">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label class="form-label">Address No 2:</label>
                                            <input name="address_no_2" type="text" class="form-control address_no_2">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label class="form-label">Bank:</label>
                                            <input name="bank" type="text" class="form-control bank">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label class="form-label">Account No:</label>
                                            <input name="account_no" type="text" class="form-control account_no">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label class="form-label">Last Working Date:</label>
                                            <input name="last_working_date" type="date" class="form-control last_working_date">
                                        </div>
                                    </div>
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
                <table class="table table-bordered table-sm quotation_record">
                    <thead class="table-primary">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
          </div>
          
        </div>
      </div>
    </div>


    
    
    
    
    
    
@endsection

@push('script')
<script>

var datatable = null;

  $(document).ready(function () {
    
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
        data: function (d) {},
      },
      columns: [
        {
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
      rowCallback: function (row, data) {
        $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`);
      },
    });
  });





    $('#submitButton').click(function(){
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
        $(`.inactive[value=${data.inactive}]`).attr('checked',true);
        
        $(".nationality").val(data.nationality);
        $(".date").val(data.date);
        $(".appoint_date").val(data.appoint_date);
        $(".empoitment_status").val(data.empoitment_status);
        
        $(".rep").removeAttr('checked');
        $(`.rep[value=${data.rep}]`).attr('checked',true);
        
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
        
        if(data.image){
            $('#uploadedImage').attr('src', "{{ asset('assets/upload/') }}/" + data.image)
        }
        else{
            $('#uploadedImage').attr('src', "https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png")
        }
        
        $("#myForm").attr("action", "{{ route('admin.employee.update') }}");
        $("input[name=id]").val(data.id);
    }
}


$(".navigation").click(function(){
    let id = $("input[name=id]").val();
    let route = '/admin/employee/get';
    let type = $(this).attr('data-type');
    let data = getList(route, type, id);
    if(data != null){
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
        $('#uploadedImage').attr('src',imageUrl)
        // imageElement.alt = 'Uploaded Image';
        // document.getElementById('imageContainer').innerHTML = '';
        // document.getElementById('imageContainer').appendChild(imageElement);
      };

      reader.readAsDataURL(file);
    });
    
    document.getElementById('removeButton').addEventListener('click', function() {
      const imageContainer = document.getElementById('imageContainer');
      imageContainer.innerHTML = '<img id="uploadedImage" src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png" width="75%" class="mb-2" alt="Static Image">';
      document.getElementById('removeButton').style.display = 'none'; 
      document.getElementById('uploadInput').value = '';
    });


</script>

@endpush









