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
                    "url": "{{ route('admin.currency.create') }}",
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
                        data: 'code',
                        title: 'Code'
                    },
                    {
                        data: 'name',
                        title: 'Name'
                    },
                    {
                        data: 'main_symbol',
                        title: 'Main Symbol'
                    },
                    {
                        data: 'unit_symbol',
                        title: 'Unit Symbol'
                    },
                    {
                        data: 'decimal_portion_digits',
                        title: 'Decimal Digits'
                    },
                    
                ],          
                 "rowCallback": function(row, data) {
                     $(row).attr("onclick",`edit_row(this,'${JSON.stringify(data)}')`)
                 }
            });
        });


@endpush









