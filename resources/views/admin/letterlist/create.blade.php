@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/letterlist/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/letterlist/delete')">
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
                <form id="myForm" method="post" action="{{ route('admin.letterlist.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                    <!--<hr />-->
                </div>
                <div class="card-body">
                    <input name="id" type="hidden" value="0"/>
                    <div class="row">
                       
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label">Trans #</label>
                                <input name="trans_number" type="text" class="form-control trans_number">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label">Letter</label>
                                <input name="letter" type="text" class="form-control letter">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label">Reference #</label>
                                <input name="reference_number" type="text" class="form-control reference_number">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label">Operation Type</label>
                                <select name="operation_type" class="form-select operation_type" >
                                    <option value="Air-Import">Air Import</option>
                                    <option value="Air-Export">Air Export</option>
                                    <option value="Sea-Import">Sea Import</option>
                                    <option value="Sea-Export">Sea Export</option>
                                    <option value="Logistics">Logistics</option>
                                    <option value="Warehouse">Warehouse</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label">Date From</label>
                                <input name="date_from" type="date" class="form-control date_from">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label">Date To</label>
                                <input name="date_to" type="date" class="form-control date_to">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label class="form-label">Type</label><br>
                                <label class="form-check-label">
                                    <input type="radio" name="type" value="Template" class="form-check-input type">
                                    Template
                                </label>
                                <label class="form-check-label mx-3">
                                    <input type="radio" name="type" value="Manual" class="form-check-input type">
                                    Manual
                                </label>
                                <label class="form-check-label">
                                    <input type="radio" name="type" value="Both" class="form-check-input type">
                                    Both
                                </label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-2 mt-4">
                                <div class="mb-2">
                                    <input type="radio" id="cash" name="consignee_type" value="Consignee" class="form-check-input">
                                    <label for="cash" class="form-check-label">Consignee</label>
                                </div>
                                <div class="mb-2">
                                    <input type="radio" id="bank" name="consignee_type" value="Coloader-Forwarder" class="form-check-input">
                                    <label for="bank" class="form-check-label">Coloader/Forwarder</label>
                                </div>
                                <div class="mb-2">
                                    <input type="radio" id="bank" name="consignee_type" value="Client" class="form-check-input">
                                    <label for="bank" class="form-check-label">Client</label>
                                </div>
                                <div class="mb-2">
                                    <input type="radio" id="bank" name="consignee_type" value="Clearing-Agent" class="form-check-input">
                                    <label for="bank" class="form-check-label">Clearing Agent</label>
                                </div>
                            </div>    
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-2 mt-5">
                                <button type="button" class="btn btn-primary btn-sm">Fetch</button>
                                <button type="button" class="btn btn-primary btn-sm mx-3">Clear</button>
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
            "url": "{{ route('admin.letterlist.create') }}",
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
                data: 'trans_number',
                title: 'Tran Number'
            },
            {
                data: 'letter',
                title: 'Letter:'
            },
            {
                data: 'reference_number',
                title: 'Ref Number'
            },
            {
                data: 'principle_code',
                title: 'Principle Code'
            },
            {
                data: 'type',
                title: 'Type'
            },
            {
                data: 'consignee_type',
                title: 'Consignee Type'
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
        $(".trans_number").val(data.trans_number);
        $(".letter").val(data.letter);
        $(".reference_number").val(data.reference_number);
        $(".operation_type").val(data.operation_type);
        $(".date_from").val(data.date_from);
        $(".date_to").val(data.date_to);
        $(`.type[value=${data.type}]`).prop("checked", true);
        $(`.consignee_type[value=${data.consignee_type}]`).prop("checked", true);
        
        $("#myForm").attr("action","{{ route('admin.letterlist.update') }}")
         $("input[name=id]").val(data.id);
    }
    
}


$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/letterlist/get";
  let type = $(this).attr("data-type");
  let data = getList(route, type, id);
  if (data != null) {
    edit_row("", JSON.stringify(data));
  }
});





</script>

@endpush









