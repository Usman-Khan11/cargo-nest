@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus">
            <i class="fa fa-square-plus"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton"></i>
        </div>
        <div class="xmark">
            <i class="fa fa-circle-xmark"></i>
        </div>
        <div class="refresh">
            <i class="fa fa-refresh"></i>
        </div>
        <div class="lock">
            <i class="fa fa-lock"></i>
        </div>
        <div class="ban">
            <i class="fa fa-ban"></i>
        </div>
        <div class="backward">
            <i class="fa fa-backward-step"></i>
        </div>
        <div class="backward">
            <i class="fa fa-backward"></i>
        </div>
        <div class="forward">
            <i class="fa fa-forward"></i>
        </div>
        <div class="forward">
            <i class="fa fa-forward-step"></i>
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
                            <input name="id" type="hidden" />
                             <div class="row">
                <div class="col-md-9">
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-2">
                       <label for="cost" class="form-label"> Emp Code:</label>
                       <input id="cost" name="Emp Code" type="text" step="0.01" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-2">
                       <label for="cost" class="form-label"> Pre-Emp Code:</label>
                       <input id="cost" name="Pre-Emp Code" type="date" step="0.01" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-2">
                       <label for="cost" class="form-label"> Title:</label>
                       <select name="Mr" id="cars" step="0.01" class="form-control">
                        <option value="MR">MR.</option>
                      </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-2">
                       <label for="cost" class="form-label">Machine Code:</label>
                       <input id="cost" name="Machine Code" type="text" step="0.01" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Employee Name:</label>
                               <input id="cost" name=" Employee Name" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Father Name:</label>
                               <input id="cost" name=" Father Name" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-2">
                        <label class="form-check-label mb-2">
                            <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
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
                               <select name="Nationality" id="cars" step="0.01" class="form-control">
                                   <option value="Nationality">Pakistan</option>
                                 </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Date:</label>
                               <input id="cost" name="Date Till" type="date" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Appointment:</label>
                               <input id="cost" name="Date Till" type="date" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label class="form-label">Empoitment Status:</label>
                               <select name="Empoitment Status" id="cars" step="0.01" class="form-control">
                                   <option value="Probation">Probation</option>
                                 </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6" style="border: 1px solid black; margin-bottom: 10px;">
                            <div class="mb-2">
                                <label class="form-check-label mb-2">
                                    <input type="checkbox" name="Sales Rep" value="Soc" class="form-check-input">
                                    Sales Rep
                                </label><br>
                                <label class="form-check-label mb-2">
                                    <input type="checkbox" name="Docs Rep" value="Soc" class="form-check-input">
                                    Docs Rep
                                </label><br>
                                <label class="form-check-label mb-2">
                                    <input type="checkbox" name="Account Rep" value="Soc" class="form-check-input">
                                    Account Rep
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary btn-sm">Show List</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-2">
                        <label class="form-label">Department</label>
                       <select name="Department" id="cars" step="0.01" class="form-control">
                           <option value="Sector"></option>
                         </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label class="form-label">Location</label>
                       <select name="Location" id="cars" step="0.01" class="form-control">
                           <option value="Location"></option>
                         </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label class="form-label">Cost Center</label>
                       <select name="Cost Center" id="cars" step="0.01" class="form-control">
                           <option value="Location"></option>
                         </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label class="form-label">Designation</label>
                       <select name="Designation" id="cars" step="0.01" class="form-control">
                           <option value="Designation"></option>
                         </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label class="form-label">Line Manager</label>
                       <select name="Line Manager" id="cars" step="0.01" class="form-control">
                           <option value="Line Manager"></option>
                         </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label class="form-label">Company</label>
                       <select name="Company" id="cars" step="0.01" class="form-control">
                           <option value="Company"></option>
                         </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                       <label for="cost" class="form-label">Salery Payable Account:</label>
                       <input id="cost" name="Request" type="text" step="0.01" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <h5>Image</h5>
            <img src="blank-profile-picture-973460_960_720.webp" alt=""style="width: 100%;" class="mb-2">
            <div class="main-image" >
                <button>Upload</button>
                <button>Remove</button>
            </div>
            </div>
        </div>
        <div class="row">
            <h5>personal Info</h5>
            <div class="col-md-4">
                <div class="mb-2">
                    <label >Date Of Birth:</label>
                   <select name="Date Of Birth" id="cars" step="0.01" class="form-control">
                       <option value="Date Of Birth"></option>
                     </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-2">
                    <label >Gender:</label>
                   <select name="Gender" id="cars" step="0.01" class="form-control">
                       <option value="Male"></option>
                     </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-2">
                    <label >Region:</label>
                   <select name="Region" id="cars" step="0.01" class="form-control">
                       <option value=""></option>
                     </select>
                </div>
            </div>
        </div>
        <div class="row">

         <div class="col-md-4">
                            <div class="mb-2">
                                <label >Maritel Status</label>
                               <select name="Maritel Status" id="cars" step="0.01" class="form-control">
                                   <option value="Selling Date"></option>
                                 </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label >Merriage Date</label>
                               <select name="Merriage Date" id="cars" step="0.01" class="form-control">
                                   <option value="Merriage Date"></option>
                                 </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2">
                               <label for="cost" class="form-label">NIC (Old):</label>
                               <input id="cost" name="NIC (Old)" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="mb-2">
               <label for="cost" class="form-label">Nic:</label>
               <input id="cost" name="Nic" type="text" step="0.01" class="form-control" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-2">
               <label for="cost" class="form-label">Issue Date:</label>
               <input id="cost" name="Issue Date" type="date" step="0.01" class="form-control" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-2">
               <label for="cost" class="form-label">Expiry:</label>
               <input id="cost" name="Expiry" type="date" step="0.01" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-2">
               <label for="cost" class="form-label">Phone (Res):</label>
               <input id="cost" name="Phone (Res)" type="text" step="0.01" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-2">
               <label for="cost" class="form-label">Email:</label>
               <input id="cost" name="Email" type="email" step="0.01" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-2">
               <label for="cost" class="form-label">Mobile No 1:</label>
               <input id="cost" name="Mobile No 1" type="text" step="0.01" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-2">
               <label for="cost" class="form-label">Mobile No 2:</label>
               <input id="cost" name="Mobile No 2" type="text" step="0.01" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-2">
               <label for="cost" class="form-label">Adress No 1:</label>
               <input id="cost" name="Adress No 1" type="text" step="0.01" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-2">
               <label for="cost" class="form-label">Adress No 2:</label>
               <input id="cost" name="Adress No 2" type="text" step="0.01" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-2">
               <label for="cost" class="form-label">Bank:</label>
               <input id="cost" name="Bank" type="text" step="0.01" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-2">
               <label for="cost" class="form-label">Account No:</label>
               <input id="cost" name="Account No" type="text" step="0.01" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-2">
               <label for="cost" class="form-label">Last Working Date:</label>
               <input id="cost" name="Last Working Date" type="date" step="0.01" class="form-control" required>
            </div>
        </div>
    </div>
</div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-7">
                <div class="card">
                    
                    <div class="card-body">
                        <div class="responsive text-nowrap">
                            <table class="table table-bordered table-sm quotation_record">
                                <thead class="table-primary">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
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
    </div>
@endsection

@push('script')
<script>
    $('#submitButton').click(function(){
        // Trigger form submission
        $('#myForm').submit();
      });
      
$(document).ready(function(){
    var datatable = $('.quotation_record').DataTable({
        select: {
            style: 'api'
        },
        "processing": true,
        "serverSide": true,
        "lengthChange": false,
        "pageLength": 15,
        "scrollX": true,
        "ajax": {
            "url": "{{ route('admin.vessel.create') }}",
            "type": "get",
            "data": function(d) {
                var frm_data = $('#result_report_form').serializeArray();
                $.each(frm_data, function(key, val) {
                    d[val.name] = val.value;
                });
            },
        },
        columns: [
            
            {
                data: 'DT_RowIndex',
                title: 'Sr No'
            },
            {
                data: 'vessel_code',
                title: 'Vessel Code'
            },
            {
                data: 'vessel_name',
                title: 'Vessel Name:'
            },
            {
                data: 'owner',
                title: 'Owner'
            },
            {
                data: 'principle_code',
                title: 'Principle Code'
            },
            {
                data: 'call_sign',
                title: 'Call Sign'
            },
            {
                data: 'grt',
                title: 'GRT'
            },
            {
                data: 'nrt',
                title: 'NRT'
            },
            {
                data: 'imo_no',
                title: 'IMO No'
            },
            {
                data: 'country_registered',
                title: 'Country of Registered'
            },
           
        ],          
         "rowCallback": function(row, data) {
             $(row).attr("onclick",`edit_row(this,'${JSON.stringify(data)}')`)
         }
    });
});

function edit_row(e,data){
    data = JSON.parse(data);
    if(data){
        $(".vessel_code").val(data.vessel_code);
        $(".vessel_name").val(data.vessel_name);
        $(".owner").val(data.owner);
        $(".principle_code").val(data.principle_code);
        $(".call_sign").val(data.call_sign);
        $(".grt").val(data.grt);
        $(".nrt").val(data.nrt);
        $(".imo_no").val(data.imo_no);
        $(".country_registered").val(data.country_registered);
        $("#myForm").attr("action","{{ route('admin.vessel.update') }}")
         $("input[name=id]").val(data.id);
    }
    
}







</script>

@endpush









