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
                <form id="myForm" method="post" action="{{ route('admin.packages.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" />
                            <div class="row">
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Pack Code:</label>
                                        <input name="pack_code" type="text" class="form-control pack_code" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2 mt-4">
                                        <label class="form-label"></label>
                                        <input name="default" class="default" type="checkbox" style="width:16px; height:16px;" value="default"/><span>&nbsp;&nbsp;Default</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Pack Name:</label>
                                        <input name="pack_name" type="text" class="form-control pack_name" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">STD Code 2Digit:</label>
                                        <input name="std_2digit" type="text" class="form-control std_2digit" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">STD Code 3Digit:</label>
                                        <input name="std_3digit" type="text" class="form-control std_3digit" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">EPAS Code:</label>
                                        <input name="epas_code" type="text" class="form-control epas_code" placeholder="" />
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
                "url": "{{ route('admin.packages.create') }}",
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
                    data: 'pack_code',
                    title: 'Package Code'
                },
                {
                    data: 'pack_name',
                    title: 'Package Name'
                },
                {
                    data: 'std_2digit',
                    title: '2Digit Code'
                },
                {
                    data: 'std_3digit',
                    title: '3Digit Code'
                },
                {
                    data: 'epas_code',
                    title: 'EPAS Code'
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
        $(".pack_code").val(data.pack_code);
        $(".pack_name").val(data.pack_name);
        $(".std_2digit").val(data.std_2digit);
        $(".std_3digit").val(data.std_3digit);
        $(".epas_code").val(data.epas_code);
        
        $(".default").removeAttr('checked');
        $(`.default[value=${data.default}]`).attr('checked',true);
        $("#myForm").attr("action","{{ route('admin.packages.update') }}")
         $("input[name=id]").val(data.id);
    }
    
}     
      
</script>
@endpush









