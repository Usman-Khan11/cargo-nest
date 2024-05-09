@extends('admin.layouts.app')

@section('panel')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8 text-md-start text-center">
                    <h4 class="fw-bold">{{ $page_title }}</h4>
                </div>
                <div class="col-md-4 text-md-end text-center">
                    <a href="/admin/staff/create" class="btn btn-primary btn-sm">Add New Staff</a>
                </div>
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
            "url": "{{ route('admin.staff') }}",
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
                data: 'name',
                title: 'Name'
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
                                    <li><a class="dropdown-item" href="/admin/staff/edit/${full.id}"><i class="ti ti-edit"></i> Edit</a></li>
                                    <li><a onclick="return checkDelete()" class="dropdown-item" href="/admin/staff/delete/${full.id}"><i class="ti ti-trash"></i> Delete</a></li>
                                </ul>
                            </div>
                        </div>`;
                    return button;
                }
            },
        ],          
         "rowCallback": function(row, data) {}
    });
});
</script>

@endpush