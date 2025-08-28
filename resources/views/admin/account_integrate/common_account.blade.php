@extends('admin.layouts.app')

@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="commonAccountFormReset('/admin/account_integrate_common_account/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/account_integrate_common_account/delete')">
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
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                    </div>
                    <div class="col-6 text-end">
                        <a href="" class="btn btn-primary">
                            Get Fiels List
                        </a>
                        <a href="" class="btn btn-outline-primary">
                            WIP Policy
                        </a>
                        <a href="{{ route('admin.account_integrate.create') }}" class="btn btn-outline-primary">
                            View Simple
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('admin.account_integrate_charges.create') }}"
                        class="btn btn-outline-secondary">Charges</a>
                    <a href="#" class="btn btn-secondary">Common Account</a>
                    <a href="{{ route('admin.account_integrate_party_parent.create') }}"
                        class="btn btn-outline-secondary">Party Parent</a>
                </div>

                <form id="myForm" method="post" action="{{ route('admin.account_integrate_common_account.store') }}">
                    @csrf
                    <input name="id" type="hidden" value="0" />

                    <div class="bg-primary my-1 p-2">
                        <h5 class="m-0 text-white">Common Accounts</h5>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="row g-0 align-items-center mb-1">
                                <div class="col-2">
                                    <label class="form-label w-100">Account Code</label>
                                </div>
                                <div class="col-10">
                                    <select name="account_id" class="account_id form-select search_select2"
                                        data-type="get_chart_account" data-url="/admin/chart_account/get_all_data"></select>
                                </div>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="row g-0 align-items-center mb-1">
                                <div class="col-4">
                                    <label class="form-label w-100">Account Type</label>
                                </div>
                                <div class="col-8">
                                    <select name="account_type" class="account_type form-select select2">
                                        <option value=""></option>
                                        @foreach (account_types_common() as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="row g-0 align-items-center mb-1">
                                <div class="col-3">
                                    <label class="form-label w-100">Operation</label>
                                </div>
                                <div class="col-9">
                                    <select name="operation" class="operation form-select">
                                        <option value="all">All</option>
                                        @foreach (operations() as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="row g-0 align-items-center mb-1">
                                <div class="col-3">
                                    <label class="form-label w-100">Sub Type</label>
                                </div>
                                <div class="col-9">
                                    <select name="sub_type" class="sub_type form-select">
                                        <option value="all">All</option>
                                        @foreach (sub_types() as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="row g-0 align-items-center mb-1">
                                <div class="col-3">
                                    <label class="form-label w-100">Job Type</label>
                                </div>
                                <div class="col-9">
                                    <select name="job_type" class="job_type form-select">
                                        <option value="all">All</option>
                                        @foreach (job_types() as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div>
                    <table class="table table-bordered align-middle table-sm" id="my_table"></table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#submitButton').click(function() {
                $('#myForm').submit();
            });

            $(".navigation").click(function() {
                let id = $("input[name=id]").val();
                let route = "/admin/account_integrate_common_account/get";
                let type = $(this).attr("data-type");
                let data = getList(route, type, id);
                if (data != null) {
                    edit_row("", JSON.stringify(data));
                }
            });

            const search_select2 = $(".search_select2");
            if (search_select2.length) {
                $(search_select2).each(function(i, v) {
                    let url = $(v).data("url");
                    let type = $(v).data("type");
                    let placeholder = $(v).data("placeholder") || 'Search for...';

                    $(v).select2({
                        ajax: {
                            url: url,
                            dataType: "json",
                            data: (params) => ({
                                search: params.term,
                                type: type,
                            }),
                            processResults: (data) => ({
                                results: data
                            }),
                        },
                        cache: true,
                        allowClear: true,
                        placeholder: placeholder,
                        minimumInputLength: 1,
                        minimumResultsForSearch: 25,
                    });
                });
            }

            var datatable = $('#my_table').DataTable({
                select: {
                    style: 'api'
                },
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "pageLength": 7,
                "ordering": false,
                "scrollX": true,
                "ajax": {
                    "url": "{{ route('admin.account_integrate_common_account.create') }}",
                    "type": "get",
                    "data": function(d) {},
                },
                columns: [{
                        data: 'operation_value',
                        title: 'Operation',
                    },
                    {
                        data: 'sub_type_value',
                        title: 'Sub Type'
                    },
                    {
                        data: 'account_type_value',
                        title: 'Account Type'
                    },
                    {
                        data: 'job_type_value',
                        title: 'Job Type'
                    },
                    {
                        data: 'account.title',
                        title: 'Account',
                        "render": function(data, type, full, meta) {
                            if (full.account) {
                                return full.account.acc_code + ' - ' + full.account.title;
                            } else {
                                return '-';
                            }
                        }
                    },
                ],
                "rowCallback": function(row, data) {
                    $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`)
                }
            });
        })

        function edit_row(e, data) {
            data = JSON.parse(data);
            if (data) {
                $(".job_type").val(data.job_type).trigger('change');
                $(".account_type").val(data.account_type).trigger('change');
                $(".operation").val(data.operation).trigger('change');
                $(".sub_type").val(data.sub_type).trigger('change');

                if (data.account) {
                    var option = new Option(data.account.acc_code + ' - ' + data.account.title, data.account.id, true,
                        true);
                    $(".account_id").append(option).trigger('change');
                } else {
                    $(".account_id").val(null).trigger('change');
                }

                $("#myForm").attr("action", "{{ route('admin.account_integrate_common_account.update') }}")
                $("input[name=id]").val(data.id);
            }
        }

        function commonAccountFormReset(route) {
            document.getElementById("myForm").reset();
            $("#myForm").attr("action", route);
            $("#myForm").find(".account_id, .account_type").val(null).trigger("change");
            $("input[name=id]").val(0);
        }
    </script>
@endpush
