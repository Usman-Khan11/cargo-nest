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
            <div class="col-md-5">
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
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Vessel Code:</label>
                                <input name="vessel_code" type="text" value="{{$code}}" class="form-control vessel_code" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="mb-2">
                                <label class="form-label">Vessel Name:</label>
                                <input name="vessel_name" type="text" class="form-control vessel_name" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="mb-2">
                                <label class="form-label">Owner:</label>
                                <input name="owner" type="text" class="form-control owner" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Principle Code:</label>
                                <input name="principle_code" type="text" class="form-control principle_code" placeholder="" />
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Call Sign:</label>
                                <input name="call_sign" type="text" class="form-control call_sign" placeholder="" />
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">GRT:</label>
                                <input name="grt" type="text" class="form-control grt" placeholder="" />
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">NRT:</label>
                                <input name="nrt" type="text" class="form-control nrt" placeholder="" />
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">IMO No:</label>
                                <input name="imo_no" type="text" class="form-control imo_no" placeholder="" />
                            </div>
                        </div>
                        
                        <div class="col-md-8 col-12">
                            <div class="mb-2">
                                <label class="form-label">Country Of Registered:</label>
                                <input name="country_registered" type="text" class="form-control country_registered" placeholder="" />
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="mb-2 mt-2">
                                <a><button class="btn btn-primary btn-sm">Show Voyage</button></a>
                                <a><button class="btn btn-primary btn-sm">Download</button></a>
                                <a><button class="btn btn-primary btn-sm">Bulk Upload</button></a>
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









