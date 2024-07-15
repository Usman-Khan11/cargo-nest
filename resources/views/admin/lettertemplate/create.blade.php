@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/lettertemplate/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/lettertemplate/delete')">
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
            <div class="col-md-7">
                <form id="myForm" method="post" action="{{ route('admin.lettertemplate.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                    <!--<hr />-->
                </div>
                <div class="card-body">
                    <input type="hidden" name="id" value="0">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label">Letter Code</label>
                                <input name="letter_code" type="text" class="form-control letter_code">
                            </div>
                        </div>
                        
                        <div class="col-md-5">
                            <div class="mb-2">
                                <label class="form-label">Name</label>
                                <input name="name" type="text" class="form-control name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label class="form-label">Type:</label>
                                <div class="mb-3 d-flex">
                                    <label class="form-check-label">
                                        <input type="radio" name="radio_option" value="template" class="form-check-input radio_option">
                                        Template
                                    </label>
                                    <label class="form-check-label px-3">
                                        <input type="radio" name="radio_option" value="manual" class="form-check-input radio_option">
                                        Manual
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label class="form-label">Operation Type</label>
                                <select name="operation_type" class="form-control operation_type">
                                    <option Selected></option>
                                    <option value="sea-import">Sea Import</option>
                                    <option value="sea-export">Sea Export</option>
                                    <option value="air-import">Air Import</option>
                                    <option value="air-export">Air Export</option>
                                    <option value="logistics">Logistics</option>
                                    <option value="warehouse">Warehouse</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-5">
                            <div class="mb-2">
                                <label class="form-label">Path</label>
                                <input name="path" type="text" class="form-control path">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-2">
                                <button type="button" class="btn btn-primary btn-sm mb-2">Show Tags</button>
                                <button type="button" class="btn btn-primary btn-sm">Download Tags</button>
                            </div>
                        </div>

                    
                        <div class="col-md-12">
                            <h4>Reference</h4>
                        </div>
                        
                        
                        <div class="col">
                            <div class="mb-2">
                                <label class="form-label">Prefix</label>
                                <input name="prefix" type="text" class="form-control prefix">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label">P-Seperate</label>
                                <input name="p_separate" type="text" class="form-control p_separate">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label">Number</label>
                                <input name="number" type="text" class="form-control number">
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <div class="mb-2">
                                <label class="form-label">S-Seperator</label>
                                <input name="s_separator" type="text" class="form-control s_separator">
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <div class="mb-2">
                                <label class="form-label">Suffix</label>
                                <input name="suffix" type="text" class="form-control suffix">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label class="form-label">Type</label>
                                <select name="type" class="form-select type">
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label class="form-label">Based On</label>
                                <select name="based_On" class="form-select based_On">
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-8">
                            <div class="mb-2">
                                <label class="form-label">Type:</label>
                                <div class="mb-3 d-flex">
                                    <label class="form-check-label">
                                        <input type="radio" name="job_option" value="Available-For-Job" class="form-check-input job_option">
                                        Available For Job
                                    </label>
                                    <label class="form-check-label px-3">
                                        <input type="radio" name="job_option" value="Available-For-Manifest-Header" class="form-check-input job_option">
                                        Available For Manifest Header
                                    </label>
                                </div>
                            </div>
                        </div>


                        
                    </div>
                </div>
            </div>
        </form>
            </div>
            <div class="col-md-5">
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
            "url": "{{ route('admin.lettertemplate.create') }}",
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
                data: 'letter_code',
                title: 'Letter Code'
            },
            {
                data: 'name',
                title: 'Name:'
            },
            {
                data: 'radio_option',
                title: 'Type'
            },
            {
                data: 'operation_type',
                title: 'Operation'
            },
            {
                data: 'path',
                title: 'Path'
            },
            {
                data: 'prefix',
                title: 'Prefix'
            },
            {
                data: 'suffix',
                title: 'Suffix'
            },
            {
                data: 'job_option',
                title: 'Job Type'
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
        $(".letter_code").val(data.letter_code);
        $(".name").val(data.name);
        $(`.radio_option[value=${data.radio_option}]`).prop("checked", true);
        $(".operation_type").val(data.operation_type);
        $(".path").val(data.path);
        $(".prefix").val(data.prefix);
        $(".p_separate").val(data.p_separate);
        $(".number").val(data.number);
        $(".s_separator").val(data.s_separator);
        $(".suffix").val(data.suffix);
        $(".type").val(data.type);
        $(".based_On").val(data.based_On);
        $(`.job_option[value=${data.job_option}]`).prop("checked", true);
        $("#myForm").attr("action","{{ route('admin.lettertemplate.update') }}")
         $("input[name=id]").val(data.id);
    }
    
}


$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/lettertemplate/get";
  let type = $(this).attr("data-type");
  let data = getList(route, type, id);
  if (data != null) {
    edit_row("", JSON.stringify(data));
  }
});




</script>

@endpush









