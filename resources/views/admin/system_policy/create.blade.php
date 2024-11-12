@extends('admin.layouts.app')

@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="formReset('/admin/system_policy/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/system_policy/delete')">
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
                    <label style="padding: 0px 10px">Search</label>
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
            <div class="col-md-12">
                <form id="myForm" method="post" action="{{ route('admin.system_policy.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4" style="background-color: #f4ffed">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem">
                                {{ $page_title }}
                            </h4>
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0" />
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label class="form-label"> Element:</label>
                                        <input name="element" type="text" class="form-control element"
                                            value="{{ old('element') }}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label"> Value:</label>
                                        <select name="value" type="text" class="form-select value">
                                            <option @if (old('value') == 'Yes') selected @endif value="Yes">Yes
                                            </option>
                                            <option @if (old('value') == 'No') selected @endif value="No">No
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4" style="background-color: #f4ffed">
                        <div class="p-3">
                            <table class="table table-bordered"></table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $("#submitButton").click(function() {
            $("#myForm").submit();
        });

        function edit_row(e, data) {
            data = JSON.parse(data);
            if (data) {
                $(".element").val(data.element);
                $(".value").val(data.value).trigger('value');
                $("#myForm").attr("action", "{{ route('admin.system_policy.update') }}");
                $("input[name=id]").val(data.id);
            }
        }

        $(".navigation").click(function() {
            let id = $("input[name=id]").val();
            let route = "/admin/system_policy/get";
            let type = $(this).attr("data-type");
            let data = getList(route, type, id);
            if (data != null) {
                edit_row("", JSON.stringify(data));
            }
        });

        $(document).ready(function() {
            $("table.table").DataTable({
                select: {
                    style: "api",
                },
                processing: true,
                searching: false,
                serverSide: true,
                lengthChange: false,
                pageLength: 10,
                ajax: {
                    url: "{{ route('admin.system_policy.create') }}",
                    type: "get",
                    data: function(d) {},
                },
                columns: [{
                        data: "element",
                        title: "element",
                    },
                    {
                        data: "value",
                        title: "value",
                    },
                ],
                rowCallback: function(row, data) {
                    $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`);
                },
            });
        });
    </script>
@endpush
