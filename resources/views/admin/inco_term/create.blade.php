@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/inco_term/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/inco_term/delete')">
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
            <input type="text" class="form-control" />
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
            <form id="myForm" method="post" action="{{ route('admin.inco_term.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                    </div>
                    <div class="card-body">
                        <input name="id" type="hidden" value="0" />
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="mb-2">
                                    <label class="form-label">Code: <span class="text-danger">*</span></label>
                                    <input name="code" type="text" class="form-control code" value="{{ old('code') }}" placeholder="" />
                                </div>
                            </div>

                            <div class="col-md-8 col-12">
                                <div class="mb-2">
                                    <label class="form-label">Name: <span class="text-danger">*</span></label>
                                    <input name="name" type="text" class="form-control name" value="{{ old('name') }}" placeholder="" />
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
                        <table class="table table-bordered table-sm quotation_record"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $("#submitButton").click(function() {
        $("#myForm").submit();
    });

    $(document).ready(function() {
        var datatable = $(".quotation_record").DataTable({
            select: {
                style: "api",
            },
            processing: true,
            serverSide: true,
            lengthChange: false,
            pageLength: 15,
            scrollX: true,
            ordering: false,
            ajax: {
                url: "{{ route('admin.inco_term.create') }}",
                type: "get",
                data: function(d) {
                    var frm_data = $("#result_report_form").serializeArray();
                    $.each(frm_data, function(key, val) {
                        d[val.name] = val.value;
                    });
                },
            },
            columns: [{
                    data: "code",
                    title: "Code",
                },
                {
                    data: "name",
                    title: "Name",
                },
            ],
            rowCallback: function(row, data) {
                $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`);
            },
        });
    });

    function edit_row(e, data) {
        data = JSON.parse(data);
        if (data) {
            $(".code").val(data.code);
            $(".name").val(data.name);

            $("#myForm").attr("action", "{{ route('admin.inco_term.update') }}");
            $("input[name=id]").val(data.id);
        }
    }

    $(".navigation").click(function() {
        let id = $("input[name=id]").val();
        let route = "/admin/inco_term/get";
        let type = $(this).attr("data-type");
        let data = getList(route, type, id);
        if (data != null) {
            edit_row("", JSON.stringify(data));
        }
    });
</script>
@endpush