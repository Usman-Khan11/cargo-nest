@extends('admin.layouts.app')

@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="fiscalYearFormReset('/admin/fiscal-year/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/fiscal-year/delete')">
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
    <style>
        .row_active {
            background: rgba(113, 191, 69, 0.25) !important;
        }
    </style>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-7">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#fiscal_year" aria-controls="fiscal_year" aria-selected="true">Fiscal
                            Year</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#fiscal_year_selection" aria-controls="fiscal_year_selection"
                            aria-selected="false">Fiscal Year Selection</button>
                    </li>
                </ul>

                <div class="tab-content p-0">
                    <div class="tab-pane fade show active" id="fiscal_year" role="tabpanel">
                        <form id="myForm" method="post" action="{{ route('admin.fiscal_year.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card mb-4">
                                <div class="card-body">
                                    <input name="id" type="hidden" value="0" />
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">Description :</label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="description" type="text"
                                                        class="form-control description" value="{{ old('description') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Start Date :</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="start_date" type="date"
                                                        class="form-control start_date" value="{{ old('start_date') }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">End Date :</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="end_date" type="date" class="form-control end_date"
                                                        value="{{ old('end_date') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Doc Suffix :</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="doc_suffix" type="text"
                                                        class="form-control doc_suffix" value="{{ old('doc_suffix') }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="default">
                                                        <label class="form-check-label" for="default">
                                                            Default
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Status :</label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="status" class="form-select status">
                                                        <option value="1">Active</option>
                                                        <option value="2">Locked</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Period Base :</label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="period_base" class="form-select period_base">
                                                        <option value="month">Month</option>
                                                        <option value="quarter">Quarter</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">Company :</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="company_id" class="form-select company_id">
                                                        @foreach ($companies as $company)
                                                            <option value="{{ $company->id }}">{{ $company->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-end mt-3">
                                        <button type="button" onclick="generate()"
                                            class="btn btn-primary">Generate</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="fiscal_year_selection" role="tabpanel">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="responsive text-nowrap text-center">
                                    <table class="table table-bordered table-sm quotation_record"></table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="responsive text-nowrap">
                            <table class="table table-bordered table-sm text-center months_table">
                                <thead class="table-light">
                                    <tr>
                                        <th>From</th>
                                        <th>Till</th>
                                        <th>Prefix</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="/assets/js/extended-ui-treeview.js"></script>
    <script>
        $("#submitButton").click(function() {
            $("#myForm").submit();
        });

        function edit_row(e, data) {
            data = JSON.parse(data);

            if (data) {
                $(".description").val(data.description);
                $(".start_date").val(data.start_date);
                $(".end_date").val(data.end_date);
                $(".doc_suffix").val(data.doc_suffix);
                $("#default").removeAttr('checked');
                $(`#default[value=${data.default}]`).attr('checked', true);
                $(".status").val(data.status).trigger("change");
                $(".period_base").val(data.period_base);
                $(".company_id").val(data.company_id).trigger("change");

                $("#myForm").attr("action", "{{ route('admin.fiscal_year.update') }}");
                $("input[name=id]").val(data.id);
                generate();
            }
        }

        $(".navigation").click(function() {
            let id = $("input[name=id]").val();
            let route = "/admin/fiscal-year/get";
            let type = $(this).attr("data-type");
            let data = getList(route, type, id);
            if (data != null) {
                edit_row("", JSON.stringify(data));
            }
        });

        function fiscalYearFormReset(route) {
            document.getElementById('myForm').reset();
            $("#myForm").attr('action', route);
            $("#myForm").find("select option:first").attr("selected", true);
            $("#myForm").find("select").trigger("change");
            $(".months_table tbody").html("");
        }

        var datatable = $('.quotation_record').DataTable({
            select: {
                style: 'api'
            },
            "processing": true,
            "searching": false,
            "ordering": false,
            "serverSide": true,
            "lengthChange": false,
            "pageLength": 10,
            "scrollX": true,
            "ajax": {
                "url": "{{ route('admin.fiscal_year.create') }}",
                "type": "get",
                "data": function(d) {},
            },
            columns: [{
                    data: 'selected',
                    title: 'Select',
                    render: function(data, type, full, meta) {
                        let s = data == 1 ? "checked" : "";
                        return `<input type="checkbox" onclick="fiscal_selected(this, ${full.id})" value="1" ${s} />`;
                    }
                },
                {
                    data: 'description',
                    title: 'description'
                },
                {
                    data: 'end_date',
                    title: 'Date From'
                },
                {
                    data: 'start_date',
                    title: 'Date Till'
                },
                {
                    data: 'default',
                    title: 'default',
                    render: function(data, type, full, meta) {
                        let s = data == 1 ? "checked" : "";
                        return `<input type="checkbox" onclick="fiscal_default(this, ${full.id})" value="1" ${s} />`;
                    }
                },
                {
                    data: 'status',
                    title: 'status',
                    render: function(data) {
                        return data == 1 ? "Active" : "Locked";
                    }
                }
            ],
            "rowCallback": function(row, data) {
                // $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`);
                // $(row).addClass("cursor-pointer");
            }
        });

        $("button[data-bs-toggle=tab]").on("shown.bs.tab", function(event) {
            datatable.ajax.reload();
        });

        function fiscal_default(e, id) {
            var def = $(e).is(":checked") ? 1 : 0;
            if (id) {
                $.get("/admin/fiscal-year/create", {
                    def,
                    id,
                    type: "set_default"
                }, function(res) {
                    iziToast.success({
                        message: 'Updated successfully',
                        position: 'topRight'
                    })
                })
            }
        }

        function fiscal_selected(e, id) {
            var selected = $(e).is(":checked") ? 1 : 0;
            if (id) {
                $.get("/admin/fiscal-year/create", {
                    selected,
                    id,
                    type: "set_selected"
                }, function(res) {
                    iziToast.success({
                        message: 'Updated successfully',
                        position: 'topRight'
                    })
                })
            }
        }

        function generate() {
            let from = $(".start_date").val();
            let to = $(".end_date").val();
            let period = $(".period_base").val();

            if (from && to) {
                $.get("/admin/fiscal-year/create", {
                    from,
                    to,
                    period,
                    type: "generate"
                }, function(res) {
                    $(".months_table tbody").html("");
                    if (res) {
                        $(res).each(function(i, v) {
                            var from = v.from;
                            var to = v.to;
                            var prefix = v.prefix;
                            var status = $(".status").val() == 1 ? "Active" : "Locked";
                            $(".months_table tbody").append(`
                                <tr>
                                    <td>${from}</td>
                                    <td>${to}</td>
                                    <td>${prefix}</td>
                                    <td>${status}</td>
                                </tr>
                                `);
                        })
                    }
                })
            } else {
                iziToast.error({
                    message: 'Please select start and end date',
                    position: 'topRight'
                })
            }
        }
    </script>
@endpush
