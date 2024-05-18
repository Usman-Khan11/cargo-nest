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
            <div class="col-md-7">
                <form id="myForm" method="post" action="{{ route('admin.vessel.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                    <!--<hr />-->
                </div>
                <div class="card-body">
                    <input name="id" type="hidden" />
                    <div class="row">
                       
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label">Trans #</label>
                                <input name="trans_number" type="text" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label">Letter</label>
                                <input name="letter" type="text" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label">Reference #</label>
                                <input name="reference_number" type="text" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label">Operation Type</label>
                                <select name="operation_type" class="form-select">
                                    <option value="option1">Air Import</option>
                                    <option value="option2">Air Export</option>
                                    <option value="option3">Sea Import</option>
                                    <option value="option3">Sea Export</option>
                                    <option value="option3">Warehouse</option>
                                    <option value="option3">Other</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label">Date From</label>
                                <input name="date_from" type="date" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label">Date To</label>
                                <input name="date_to" type="date" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label class="form-label">Type</label><br>
                                <label class="form-check-label">
                                    <input type="radio" name="type" value="Template" class="form-check-input">
                                    Template
                                </label>
                                <label class="form-check-label mx-3">
                                    <input type="radio" name="type" value="Manual" class="form-check-input">
                                    Manual
                                </label>
                                <label class="form-check-label">
                                    <input type="radio" name="type" value="Both" class="form-check-input">
                                    Both
                                </label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-2 mt-4">
                                <div class="mb-2">
                                    <input type="radio" id="cash" name="type" value="Consignee" class="form-check-input">
                                    <label for="cash" class="form-check-label">Consignee</label>
                                </div>
                                <div class="mb-2">
                                    <input type="radio" id="bank" name="type" value="Coloader/Forwarder" class="form-check-input">
                                    <label for="bank" class="form-check-label">Coloader/Forwarder</label>
                                </div>
                                <div class="mb-2">
                                    <input type="radio" id="bank" name="type" value="Client" class="form-check-input">
                                    <label for="bank" class="form-check-label">Client</label>
                                </div>
                                <div class="mb-2">
                                    <input type="radio" id="bank" name="type" value="Clearing Agent" class="form-check-input">
                                    <label for="bank" class="form-check-label">Clearing Agent</label>
                                </div>
                            </div>    
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-2 mt-5">
                                <button class="btn btn-primary btn-sm">Fetch</button>
                                <button class="btn btn-primary btn-sm mx-3">Clear</button>
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









