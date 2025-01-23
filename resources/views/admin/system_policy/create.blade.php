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
                <form id="myForm" method="post" action="{{ route('admin.system_policy.store') }}">
                    @csrf
                    <input type="hidden" name="type" value="system_policy" />
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem">
                                {{ $page_title }}
                            </h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#system_policy" type="button" role="tab"
                                        aria-controls="system_policy" aria-selected="true">System Policy</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#docs_company_wise" type="button" role="tab"
                                        aria-controls="docs_company_wise" aria-selected="false">Docs. Company Wise</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#customer_portal" type="button" role="tab"
                                        aria-controls="customer_portal" aria-selected="false">Customer Portal</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="system_policy" role="tabpanel">
                                    <input name="id" type="hidden" value="0" />
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">Element</label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="element" type="text" class="form-control element"
                                                        value="{{ old('element') }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">Value</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="value" type="text" class="form-select value">
                                                        <option @if (old('value') == 'Yes') selected @endif
                                                            value="Yes">Yes
                                                        </option>
                                                        <option @if (old('value') == 'No') selected @endif
                                                            value="No">No
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <table class="table table-bordered system_policy_table"></table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="docs_company_wise" role="tabpanel">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">Document</label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="document" type="text" class="form-control document"
                                                        value="{{ old('document') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-5">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">Company</label>
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
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Fiscal Year</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="fiscal_year" class="form-select fiscal_year">
                                                        <option value="" selected disabled></option>
                                                        @foreach ($fiscal_years as $fiscal_year)
                                                            <option data-doc_suffix="{{ $fiscal_year->doc_suffix }}"
                                                                value="{{ $fiscal_year->id }}">
                                                                {{ $fiscal_year->description }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Prefix</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="prefix" type="text" class="form-control prefix"
                                                        value="{{ old('prefix') }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-6">
                                                    <label class="form-label w-100 m-0">No Seperator</label>
                                                </div>
                                                <div class="col-6">
                                                    <input name="no_seperator" type="text"
                                                        class="form-control no_seperator"
                                                        value="{{ old('no_seperator') }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Suffix</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="suffix" type="text" class="form-control suffix"
                                                        value="{{ old('suffix') }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Start No</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="start_no" type="text" class="form-control start_no"
                                                        value="{{ old('start_no') }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Last No</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="last_no" type="text" class="form-control last_no"
                                                        value="{{ old('last_no', 0) }}" readonly />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-3 text-nowrap table-responsive">
                                        <table class="table table-bordered docs_company_wise_table"></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4" style="background-color: #f4ffed">

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $("#submitButton").click(function() {
            let type = $(".tab-pane.active").attr("id");
            $("input[name=type]").val(type);
            $("#myForm").submit();
        });

        $("button[data-bs-toggle=tab]").on("shown.bs.tab", function(event) {
            let type = $(".tab-pane.active").attr("id");
            $("input[name=id]").val(0);
            $("input[name=type]").val(type);

            if (type == "system_policy") {
                $("div.xmark").attr("onclick", "deleteData('/admin/system_policy/delete')");
            } else if (type == "docs_company_wise") {
                $("div.xmark").attr("onclick", "deleteData('/admin/docs_company_wise/delete')");
            }
        });

        function edit_row(e, data) {
            let type = $(".tab-pane.active").attr("id");
            data = JSON.parse(data);

            if (data) {
                if (type == "system_policy") {
                    $(".element").val(data.element);
                    $(".value").val(data.value).trigger('change');
                    $("#myForm").attr("action", "{{ route('admin.system_policy.update') }}");
                    $("input[name=id]").val(data.id);
                } else if (type == "docs_company_wise") {
                    $(".document").val(data.document);
                    $(".company_id").val(data.company_id).trigger('change');
                    if (data.fiscal_year) {
                        $(".fiscal_year").val(data.fiscal_year.id).trigger('change');
                    }
                    $(".prefix").val(data.prefix);
                    $(".no_seperator").val(data.no_seperator);
                    $(".suffix").val(data.suffix);
                    $(".start_no").val(data.start_no);
                    $(".last_no").val(data.last_no);
                    $("#myForm").attr("action", "{{ route('admin.system_policy.update') }}");
                    $("input[name=id]").val(data.id);
                }
            }
        }

        $(".navigation").click(function() {
            let t = $(".tab-pane.active").attr("id");
            let id = $("input[name=id]").val();
            let route = "/admin/system_policy/get";
            if (t == "docs_company_wise") {
                route = "/admin/docs_company_wise/get";
            }
            let type = $(this).attr("data-type");
            let data = getList(route, type, id);
            if (data != null) {
                edit_row("", JSON.stringify(data));
            }
        });

        $(document).ready(function() {
            $(".system_policy_table").DataTable({
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
                    data: function(d) {
                        d.type = "system_policy";
                    },
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

            $(".docs_company_wise_table").DataTable({
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
                    data: function(d) {
                        d.type = "docs_company_wise";
                    },
                },
                columns: [{
                        data: "document",
                        title: "document",
                    },
                    {
                        data: "company_id",
                        title: "Company",
                        render: function(data, type, full, meta) {
                            if (full.company) {
                                return full.company.name;
                            } else {
                                return "";
                            }
                        }
                    },
                    {
                        data: "fiscal_year",
                        title: "fiscal year",
                        render: function(data, type, full, meta) {
                            if (full.fiscal_year) {
                                return full.fiscal_year.description;
                            } else {
                                return "";
                            }
                        }
                    },
                    {
                        data: "prefix",
                        title: "prefix",
                    },
                    {
                        data: "no_seperator",
                        title: "no seperator",
                    },
                    {
                        data: "suffix",
                        title: "suffix",
                    },
                    {
                        data: "start_no",
                        title: "start_no",
                    },
                    {
                        data: "last_no",
                        title: "last_no",
                    },
                ],
                rowCallback: function(row, data) {
                    $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`);
                },
            });

            $(".fiscal_year").change(function() {
                let doc_suffix = $(this).find("option:selected").attr("data-doc_suffix");
                $(".suffix").val(doc_suffix);
            })
        });
    </script>
@endpush
