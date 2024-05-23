@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus">
            <a href="{{route('admin.currency.create')}}"><i class="fa fa-square-plus"></i></a>
        </div>
        <div class="save">
            <i class="fa fa-save"></i>
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
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8 text-md-start text-center">
                    <h4 class="fw-bold">{{ $page_title }}</h4>
                </div>
                <!--<div class="col-md-4 text-md-end text-center">-->
                <!--    <a href="/admin/quotation/create" class="btn btn-primary btn-sm">Add New Quotation</a>-->
                <!--</div>-->
            </div>
            <hr />
        </div>
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
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
        "pageLength": 15,
        "scrollX": true,
        "ajax": {
            "url": "{{ route('admin.currency') }}",
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
            {
                title: 'Options',
                "render": function(data, type, full, meta) {
                    var button = `
                        <div class="demo-inline-spacing">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-icon dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-cog"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{ route("admin.quotation.edit",":edit_id") }}"><i class="ti ti-edit"></i> Edit</a></li>
                                    <li><a onclick="return checkDelete()" class="dropdown-item" href="{{ route("admin.quotation.delete",":delete_id") }}"><i class="ti ti-trash"></i> Delete</a></li>
                                </ul>
                            </div>
                        </div>`;
                    button = button.replace(':edit_id',full.id);
                    button = button.replace(':delete_id',full.id);
                    return button;
                }
            },
        ],          
         "rowCallback": function(row, data) {}
    });
});
</script>

@endpush