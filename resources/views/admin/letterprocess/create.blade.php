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
                        
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label class="form-label">Letter</label>
                                <input name="letter" type="text" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label class="form-label">Vessel/Airline</label>
                                <input name="vessel_airline" type="text" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label class="form-label">Manifest</label>
                                <input name="manifest" type="text" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label">Operation Type</label>
                                <select name="operation_type" class="form-control">
                                    <option value="option1">Option 1</option>
                                    <option value="option2">Option 2</option>
                                    <option value="option3">Option 3</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label">HBL #</label>
                                <input name="hbl_number" type="text" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label">MBL #</label>
                                <input name="mbl_number" type="text" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label">Date</label>
                                <input name="date" type="date" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label">Job #</label>
                                <input name="job_number" type="text" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label class="form-label">Voyage</label>
                                <input name="voyage" type="text" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="mb-2">
                                <label class="form-label">Runtime Field1</label>
                                <input name="runtime_field1" type="text" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="mb-2">
                                <label class="form-label">Runtime Field2</label>
                                <input name="runtime_field2" type="text" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="mb-2">
                                <label class="form-label">Runtime Field3</label>
                                <input name="runtime_field3" type="text" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="mb-2">
                                <label class="form-label">Runtime Field4</label>
                                <input name="runtime_field4" type="text" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="mb-2">
                                <label class="form-label">Runtime Field5</label>
                                <input name="runtime_field5" type="text" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-check-label">
                                    <input type="checkbox" name="hide_ref" class="form-check-input">
                                    Hide Ref#
                                </label>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label class="form-check-label">
                                    <input type="checkbox" name="print_on_letterhead" class="form-check-input">
                                    Print on Letter Head
                                </label>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label class="form-label">Out Put:</label>
                                <div class="mb-3 d-flex">
                                    <label class="form-check-label">
                                        <input type="radio" name="radio_option" value="template" class="form-check-input">
                                        PDF
                                    </label>
                                    <label class="form-check-label px-3">
                                        <input type="radio" name="radio_option" value="manual" class="form-check-input">
                                        DOCX
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2">
                                <!--<label class="form-label">Out Put:</label>-->
                                <div class="mb-3 d-flex">
                                    <label class="form-check-label">
                                        <input type="radio" name="radio_option" value="template" class="form-check-input">
                                        Download
                                    </label>
                                    <label class="form-check-label px-3">
                                        <input type="radio" name="radio_option" value="manual" class="form-check-input">
                                        Preview
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2">
                                <button class="btn btn-primary btn-sm">Generate</button>
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="mb-2">
                                <label class="form-check-label">
                                    <input type="checkbox" name="print_on_letterhead" class="form-check-input">
                                        Individual Job Wise
                                </label>
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
            "url": "{{ route('admin.letter.create') }}",
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









