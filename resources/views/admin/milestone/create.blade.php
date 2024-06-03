@extends('admin.layouts.app')


@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/milestone/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/milestone/delete')">
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
        <form id="myForm" method="post" action="{{ route('admin.milestone.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                            <div class="card-header">
                                <h4 class="fw-bold">{{ $page_title }}</h4>
                                <!--<hr />-->
                            </div>
                            <div class="card-body">
                                <input name="id" type="hidden" value="0"/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input type" type="radio" name="type" id="job_wise" value="Job-wise"  checked>
                                                <label class="form-check-label" for="job_wise">Job wise</label>
                                            </div>
                                            <div class="form-check mx-3">
                                                <input class="form-check-input type" type="radio" name="type" id="milestone_wise" value="Milestone-wise">
                                                <label class="form-check-label" for="milestone_wise">Milestone wise</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Job#</label>
                                            <input name="job_no" type="text" class="form-control job_no">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Job Date</label>
                                            <input name="job_date" type="date" class="form-control job_date">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="responsive text-nowrap">
                                <table class="table table-bordered table-sm quotation_record">
                                    <thead class="table-primary">
                                        <tr>
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
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Documentational</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Operational</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card-datatable table-responsive pt-0">
                                        <table class="datatables-basic table" style="width: 135%;">
                                            <thead>
                                              <tr>
                                                <th>--</th>
                                                <th>--</th>
                                                <th>S.No</th>
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Anticipated Date</th>
                                                <th>Done</th>
                                                <th>Actual Date</th>
                                                <th>Remarks</th>
                                                <th>Action</th>
                                                <th>Update On</th>
                                                <th>Update By</th>
                                                <th>Update log</th>
                                              </tr>
                                            </thead>
                                            <tbody class="detail_repeater">
                                                <td><i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                <td><i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                                <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_code" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_name" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_anticipated" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_done" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_date" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_remarks" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_action" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_update_on" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_update_by" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_update_log" class="form-control" type="text" style="width: 100%;"/></td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card-datatable table-responsive pt-0">
                                        <table class="datatables-basic table" style="width: 135%;">
                                            <thead>
                                              <tr>
                                                <th>--</th>
                                                <th>--</th>
                                                <th>S.No</th>
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Anticipated Date</th>
                                                <th>Done</th>
                                                <th>Actual Date</th>
                                                <th>Remarks</th>
                                                <th>Action</th>
                                                <th>Update On</th>
                                                <th>Update By</th>
                                                <th>Update log</th>
                                              </tr>
                                            </thead>
                                            <tbody class="local_repeater">
                                                <td><i onclick="dellocalRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                <td><i onclick="addlocalRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                                <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="o_code" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="o_name" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="o_anticipated" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="o_done" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="o_date" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="o_remarks" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="o_action" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="o_update_on" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="o_update_by" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="o_update_log" class="form-control" type="text" style="width: 100%;"/></td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>    
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>    
    </div>
@endsection


@push('script') 
<script type="text/javascript">
$(document).ready(function(){
    var datatable = $('.quotation_record').DataTable({
        select: {
            style: 'api'
        },
        "processing": true,
        "serverSide": true,
        "lengthChange": false,
        "pageLength": 10,
        "scrollX": true,
        "ajax": {
            "url": "{{ route('admin.milestone.create') }}",
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
                data: 'type',
                title: 'Type'
            },
            {
                data: 'job_no',
                title: 'Job No'
            },
            {
                data: 'job_date',
                title: 'Job Date'
            },
           
        ],          
         "rowCallback": function(row, data) {
             $(row).attr("onclick",`edit_row(this,'${JSON.stringify(data)}')`);
         }
    });
});

function edit_row(e,data){
    data = JSON.parse(data);
    if(data){
        $(".type").removeAttr('checked');
        $(`.type[value=${data.type}]`).attr('checked',true);
        $(".job_no").val(data.job_no);
        $(".job_date").val(data.job_date);
        
        $("#myForm").attr("action","{{ route('admin.milestone.update') }}")
        $("input[name=id]").val(data.id);
    }
    
}

$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/milestone/get";
  let type = $(this).attr("data-type");
  let data = getList(route, type, id);
  if (data != null) {
    edit_row("", JSON.stringify(data));
  }
});


$('#submitButton').click(function(){
        // Trigger form submission
        $('#myForm').submit();
      });
      
      
 function addNewRow(e){
    $(e).parent().parent().clone().prependTo(".detail_repeater");
    $(".detail_repeater tr:last").find("input").val(null);
    $(".detail_repeater tr:last select").find("option").attr("selected",false);
}
    
function delRow(e){
    if($(".detail_repeater tr").length <= 1) return;
    $(e).parent().parent().remove();
}

function addlocalRow(e){
    $(e).parent().parent().clone().prependTo(".local_repeater");
    $(".local_repeater tr:last").find("input").val(null);
    $(".local_repeater tr:last select").find("option").attr("selected",false);
}
    
function dellocalRow(e){
    if($(".local_repeater tr").length <= 1) return;
    $(e).parent().parent().remove();
}


</script>

@endpush