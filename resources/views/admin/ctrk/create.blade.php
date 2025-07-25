@extends('admin.layouts.app')

@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="formReset('/admin/ctrk/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/ctrk/delete')">
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
        <div class="row g-3">
            <div class="col-md-6">
                <form id="myForm" method="post" action="{{ route('admin.ctrk.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card h-100">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0" />

                            <div class="row">
                                <div class="col-6">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Container#</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="container_no" type="text" class="form-control container_no"
                                                value="{{ old('container_no') }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Size Type</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="size_type" class="form-select select2 size_type">
                                                <option value="" selected>Select</option>
                                                @foreach ($equipments as $value)
                                                    <option @if (old('size_type') == $value->id) selected @endif
                                                        value="{{ $value->id }}">{{ $value->code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">YOM</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="yom" type="text" class="form-control yom"
                                                value="{{ old('yom') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Principal</label>
                                        </div>
                                        <div class="col-9">
                                            {{-- <input name="principal" type="text" class="form-control principal" /> --}}
                                            <select name="principal" class="form-select select2 principal">
                                                <option value="" selected>Select</option>
                                                @foreach ($principals as $value)
                                                    <option @if (old('principal') == $value->id) selected @endif
                                                        value="{{ $value->id }}">{{ $value->party_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Weight Limit</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="weight_limit" type="text" class="form-control weight_limit"
                                                value="{{ old('weight_limit') }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Top</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="top" type="text" class="form-control top"
                                                value="{{ old('top') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Right</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="right" type="text" class="form-control right"
                                                value="{{ old('right') }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Left</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="left" type="text" class="form-control left"
                                                value="{{ old('left') }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Front</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="front" type="text" class="form-control front"
                                                value="{{ old('front') }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Back</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="back" type="text" class="form-control back"
                                                value="{{ old('back') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <div class="col-7">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-12">
                                            <label class="form-label">Remarks</label>
                                        </div>
                                        <div class="col-12">
                                            <textarea name="remarks" rows="4" class="form-control remarks" placeholder="">{{ old('remarks') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            @if (old('show_on_gci')) checked @endif name="show_on_gci"
                                            id="show_on_gci">
                                        <label class="form-check-label" for="show_on_gci">
                                            Show on Global Container Inventory
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Principal Code:</label>
                                        <input name="principal_code" type="text" class="form-control principal_code"
                                            placeholder="" />
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-md-12">
                                <div class="mb-2 mt-2">
                                    <a class="btn btn-primary btn-sm" href="{{ asset('assets/ctrk.csv') }}"
                                        download>Download</a>
                                    <button type="button" class="btn btn-primary btn-sm"
                                        onclick="document.getElementById('sortExcel').click()">Bulk Upload</button>
                                    <input type="file" id="sortExcel" hidden class="form-control"
                                        onchange="excelFileImporter(this)" accept=".csv" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <div class="card h-100">
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

        var datatable = null;

        $(document).ready(function() {
            datatable = $(".quotation_record").DataTable({
                select: {
                    style: "api",
                },
                processing: true,
                serverSide: true,
                lengthChange: false,
                pageLength: 10,
                scrollX: true,
                ajax: {
                    url: "{{ route('admin.ctrk.create') }}",
                    type: "get",
                    data: function(d) {
                        var frm_data = $("#result_report_form").serializeArray();
                        $.each(frm_data, function(key, val) {
                            d[val.name] = val.value;
                        });
                    },
                },
                columns: [{
                        data: "container_no",
                        title: "Container No",
                    },
                    {
                        data: "sizetype.code",
                        title: "Size Type",
                        render: function(data, type, full, meta) {
                            if (full.sizetype) {
                                return full.sizetype.code;
                            }

                            return '-';
                        }
                    },
                    {
                        data: "principals.party_name",
                        title: "Principal",
                        render: function(data, type, full, meta) {
                            if (full.principals) {
                                return full.principals.party_name;
                            }

                            return '-';
                        }
                    },
                    {
                        data: "show_on_gci",
                        title: "Global Container Inventory",
                        render: function(data, type, full, meta) {
                            if (data == 1) {
                                return 'Yes';
                            } else {
                                return 'No';
                            }
                        }
                    },
                    {
                        data: "weight_limit",
                        title: "Weight Limit",
                    },
                    {
                        data: "top",
                        title: "Top",
                    },
                    {
                        data: "right",
                        title: "Right",
                    },
                    {
                        data: "left",
                        title: "Left",
                    },
                    {
                        data: "front",
                        title: "Front",
                    },
                    {
                        data: "back",
                        title: "Back",
                    },
                    {
                        data: "remarks",
                        title: "Remarks",
                    }
                ],
                rowCallback: function(row, data) {
                    $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`);
                },
            });
        });

        function edit_row(e, data) {
            data = JSON.parse(data);
            if (data) {
                $(".container_no").val(data.container_no);
                $(".size_type").val(data.size_type).trigger('change');
                $(".yom").val(data.yom);
                $(".weight_limit").val(data.weight_limit);
                $(".principal").val(data.principal).trigger('change');
                $(".principal_code").val(data.principal_code);
                $(".top").val(data.top);
                $(".right").val(data.right);
                $(".left").val(data.left);
                $(".front").val(data.front);
                $(".back").val(data.back);
                $(".remarks").val(data.remarks);
                $("#show_on_gci").prop('checked', data.show_on_gci === 1);
                $("#myForm").attr("action", "{{ route('admin.ctrk.update') }}");
                $("input[name=id]").val(data.id);
            }
        }

        $(".navigation").click(function() {
            let id = $("input[name=id]").val();
            let route = "/admin/ctrk/get";
            let type = $(this).attr("data-type");
            let data = getList(route, type, id);
            if (data != null) {
                edit_row("", JSON.stringify(data));
            }
        });

        function excelFileImporter(e) {
            let file = $(e).val();
            if (file) {
                var file_data = $("#sortExcel").prop("files")[0];
                var form_data = new FormData();
                form_data.append("_token", "{{ csrf_token() }}");
                form_data.append("import_file", file_data);
                form_data.append("excelFileImporter", "true");

                $.ajax({
                    url: "/admin/ctrk/import",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: "post",
                    success: function(res) {
                        if (res[0] == "success") {
                            iziToast.success({
                                message: res[1],
                                position: "topRight"
                            });
                            datatable.ajax.reload();
                        } else {
                            iziToast.error({
                                message: res[1],
                                position: "topRight"
                            });
                        }
                    },
                });
            }
        }
    </script>
@endpush
