@extends('admin.layouts.app')

@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="chartAccFormReset('/admin/chart_account/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/chart_account/delete')">
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

@section('style')
    <style>
        .tree ul {
            list-style-type: none;
            padding-left: 0px;
            font-size: 13px;
            cursor: pointer;
        }

        .tree li {
            line-height: 1.8;
            margin-left: 10px;
        }

        .toggle {
            cursor: pointer;
            color: blue;
        }

        .tree ul ul {
            display: none;
        }

        /* .tree_div { */
        /* max-height: 320px; */
        /* overflow-y: auto; */
        /* } */

        .text-active {
            color: #71bf45;
        }
    </style>
@endsection

@php
    $accounts = fetchAccounts();
    $tree = buildTree($accounts);
@endphp

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-2 tree_div">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Accounts:</h5>
                    </div>
                    <div class="card-body">
                        <div class="tree">@php echo renderTree($tree); @endphp</div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 d-none">
                <div class="card mb-2 tree_div">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Parties:</h5>
                    </div>
                    <div class="card-body">
                        <div class="tree">
                            <div class="parties"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <form id="myForm" method="post" action="{{ route('admin.chart_account.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4" style="background-color: #f4ffed">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem">
                                {{ $page_title }}
                            </h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0" />

                            <div class="row g-3">
                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label">Account Code</label>
                                        </div>
                                        <div class="col-8">
                                            <input value="{{ old('acc_code') }}" name="acc_code" type="text"
                                                class="form-control acc_code" readonly />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-5">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Title Of Account</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="title" type="text" class="form-control title" required
                                                value="{{ old('title') }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Parent Account</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="parent_acc" type="text" class="form-control parent_acc"
                                                onchange="getSeries(this)"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label">Alias</label>
                                        </div>
                                        <div class="col-8">
                                            <input name="alias" type="text" class="form-control alias" required
                                                value="{{ old('alias') }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-6">
                                            <label class="form-check-label mb-2">
                                                <input type="checkbox" name="allow_voucher_entry" value="1"
                                                    class="form-check-input allow_voucher_entry"
                                                    @if (old('allow_voucher_entry') == 1) checked @endif />
                                                Allow Voucher Entry
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-check-label mb-2 mx-3">
                                                <input type="checkbox" name="in_active" value="yes"
                                                    class="form-check-input in_active"
                                                    @if (old('in_active') == 1) checked @endif />
                                                In-Active
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label">Max Child Account</label>
                                        </div>
                                        <div class="col-8">
                                            <select name="max_child_acc" class="form-select max_child_acc">
                                                <option value="99">99</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Category</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="category" class="form-select category"></select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Sub Category</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="sub_category" class="form-select sub_category"></select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">P&L Category</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="pl_category" class="form-select pl_category"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">REFRENCE NO</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="reference_no" type="text" class="form-control reference_no"
                                                required value="{{ old('reference_no') }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label">User Defined Feild 2</label>
                                        </div>
                                        <div class="col-8">
                                            <input name="user_field_2" type="text" class="form-control user_field_2"
                                                required value="{{ old('user_field_2') }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label">User Defined Feild 3</label>
                                        </div>
                                        <div class="col-8">
                                            <input name="user_field_3" type="text" class="form-control user_field_3"
                                                required value="{{ old('user_field_3') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-5">
                                    <div class="">
                                        <button class="btn btn-primary btn-sm acc_movement_btn" type="button"
                                            data-bs-toggl="modal" data-bs-targe="#accountMovement">
                                            Account Movement
                                        </button>
                                        <button class="btn btn-primary btn-sm mx-3">Upload</button>
                                        <button class="btn btn-primary btn-sm">
                                            Credit Limit/Day UpLoad
                                        </button>
                                    </div>
                                </div>

                                <div class="col-3"></div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label">User Defined Feild 4</label>
                                        </div>
                                        <div class="col-8">
                                            <input name="user_field_4" type="text" class="form-control user_field_4"
                                                required value="{{ old('user_field_4') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        .datatables-basic tr th {
                            font-size: 13px;
                            color: #111 !important;
                        }
                    </style>
                    <div class="card mb-4" style="background-color: #f4ffed">
                        <div class="p-3">
                            <table class="datatables-basic table table-sm">
                                <thead>
                                    <tr class="text-center fw-bolder">
                                        <th>...</th>
                                        <th>Short Name</th>
                                        <th>Company</th>
                                        <th>Credit Limit</th>
                                        <th>Payable Credit Limit</th>
                                        <th>Credit Days</th>
                                    </tr>
                                </thead>
                                <tbody class="detail_repeater">
                                    @foreach ($sub_companies as $sub_company)
                                        <tr>
                                            <td width="8%">
                                                <label class="form-check-label mx-3">
                                                    <input type="checkbox" name="company_active" value="yes"
                                                        class="form-check-input company_active" />
                                                </label>
                                            </td>
                                            {{-- <td>
                                                <i onclick="delRow(this)"
                                                    class="fa fa-circle-xmark fa-lg text-danger"></i>
                                            </td>
                                            <td>
                                                <i onclick="addNewRow(this)" class="fa fa-clone fa-lg text-info"></i>
                                            </td> --}}
                                            <td width="15%">
                                                <input class="form-control" type="text" name="short_name[]"
                                                    style="width: 100%" readonly value="{{ $sub_company->shortName }}" />
                                            </td>
                                            <td width="30%">
                                                <input class="form-control" type="text" name="company[]"
                                                    style="width: 100%" value="{{ $sub_company->displayName }}" />
                                            </td>
                                            <td width="15%">
                                                <input class="form-control" type="text" name=""
                                                    style="width: 100%" />
                                            </td>
                                            <td width="17%">
                                                <input class="form-control" type="text" name=""
                                                    style="width: 100%" />
                                            </td>
                                            <td width="15%">
                                                <input class="form-control" type="text" name=""
                                                    style="width: 100%" />
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="accountMovement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="post" action="{{ route('admin.chart_account.movement') }}"
            class="modal-dialog modal-dialog-centered">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Account Movement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Account</label>
                        <div class="input-group">
                            <input type="text" class="form-control w-25 main_acc_code" name="main_acc_code" readonly>
                            <input type="text" class="form-control w-75 main_acc_name" name="main_acc_name" readonly>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Old Parent Account</label>
                        <div class="input-group">
                            <input type="text" class="form-control w-25 old_acc_code" name="old_acc_code" readonly>
                            <input type="text" class="form-control w-75 old_acc_name" name="old_acc_name" readonly>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">New Parent Account</label>
                        <style>
                            .input-group .position-relative {
                                width: 75% !important;
                            }
                        </style>
                        <div class="input-group">
                            <input type="text" class="form-control new_acc_code w-25" name="new_acc_code" required
                                readonly>
                            {{-- <input type="text" class="form-control w-75 new_acc_name" name="new_acc_name"> --}}
                            <select name="new_acc_name" class="form-select select2 w-100" required>
                                <option value="">Select</option>
                                @foreach ($sub_accounts as $sub_account)
                                    <option value="{{ $sub_account->acc_code }}">
                                        {{ $sub_account->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
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
                $(".acc_code").val(data.acc_code);
                $(".title").val(data.title);
                $(".alias").val(data.alias);
                $(".max_child_acc").val(data.max_child_acc).trigger('change');
                $(".category").val(data.category).trigger('change');
                $(".sub_category").val(data.sub_category).trigger('change');
                $(".pl_category").val(data.pl_category).trigger('change');
                $(".reference_no").val(data.reference_no);
                $(".user_field_2").val(data.user_field_2);
                $(".user_field_3").val(data.user_field_3);
                $(".user_field_4").val(data.user_field_4);

                $("input[name='allow_voucher_entry']").prop('checked', false);
                $("input[name='in_active']").prop('checked', false);
                $("input[name='allow_voucher_entry'][value='" + data.allow_voucher_entry + "']").prop('checked', true);
                $("input[name='in_active'][value='" + data.in_active + "']").prop('checked', true);

                $("#myForm").attr("action", "{{ route('admin.chart_account.update') }}");
                $("input[name=id]").val(data.id);

                if (data.parent_acc) {
                    var option = new Option(data.parent_acc.title, data.parent_acc.id, true, true);
                    $(".parent_acc").append(option).trigger('change');
                } else {
                    $(".parent_acc").val(null).trigger('change');
                }
            }
        }

        $(".navigation").click(function() {
            let id = $("input[name=id]").val();
            let route = "/admin/chart_account/get";
            let type = $(this).attr("data-type");
            let data = getList(route, type, id);
            if (data != null) {
                edit_row("", JSON.stringify(data));
            }
        });

        function addNewRow(e) {
            $(e).parent().parent().clone().appendTo(".detail_repeater");
            $(".detail_repeater tr:last").find("input").val(null);
        }

        function delRow(e) {
            if ($(".detail_repeater tr").length <= 1) return;
            $(e).parent().parent().remove();
        }

        $(document).ready(function() {
            $(".parent_acc").select2({
                ajax: {
                    url: "/admin/chart_account/create",
                    dataType: "json",
                    data: function(params) {
                        var query = {
                            search: params.term,
                            type: "get_parent_acc",
                        };
                        return query;
                    },
                    processResults: function(data) {
                        return {
                            results: data,
                        };
                    },
                },
                cache: true,
                allowClear: true,
                placeholder: "Search for...",
                minimumInputLength: 1,
                minimumResultsForSearch: 50,
            });

            $(".acc_list").click(function() {
                $('span').removeClass("text-active");
                $(this).addClass("text-active");
                let id = $(this).attr("data-id")
                if (id) {
                    $.get("/admin/chart_account/create", {
                        get_party: id,
                        _token: '{{ csrf_token() }}'
                    }, function(res) {
                        if (res.party) {
                            $('.parties').find('ul').remove();
                            let html = '<ul style="display: block;">';
                            $(res.party).each(function(i, v) {
                                if (v.party_basic_id) {
                                    html += '<li> ' + v.party_basic_id.party_name +
                                        ' </li>';
                                }
                            })
                            $('.parties').append(html);
                        }

                        if (res.chart_account) {
                            edit_row("", JSON.stringify(res.chart_account));
                        }
                    })
                }
            })

        });

        document.addEventListener('DOMContentLoaded', function() {
            const toggles = document.querySelectorAll('.toggle');
            toggles.forEach(function(toggle) {
                toggle.addEventListener('click', function() {
                    const nextUl = toggle.parentElement.querySelector('ul');
                    if (nextUl) {
                        if (nextUl.style.display === 'none' || nextUl.style.display === '') {
                            nextUl.style.display = 'block';
                            toggle.textContent = '[-]';
                        } else {
                            nextUl.style.display = 'none';
                            toggle.textContent = '[+]';
                        }
                    }
                });
            });
        });

        let i = $(".acc_code").val();

        function getSeries(e) {
            let val = $(e).val();
            let chk = $("#myForm").attr("action");

            if (chk == "{{ route('admin.chart_account.store') }}" || chk == "/admin/chart_account/store") {
                $.get("/admin/chart_account/create", {
                    getSeries: val,
                    _token: '{{ csrf_token() }}'
                }, function(res) {
                    if (res > 0) {
                        $(".acc_code").val(res);
                    } else {
                        $(".acc_code").val(i);
                    }
                })
            }
        }

        function chartAccFormReset(route) {
            let title = $("input[name=title]").val();
            let id = $("input[name=id]").val();
            document.getElementById('myForm').reset();
            $("#myForm").attr('action', route);
            $("#myForm").find("select").trigger("change");
            $("#myForm").find(".parent_acc").val(null).trigger("change");

            if (title && id) {
                var option = new Option(title, id, true, true);
                $(".parent_acc").append(option).trigger('change');
            }
        }

        $(".acc_movement_btn").click(function() {
            let id = $("input[name=id]").val();
            let parent_acc = $("select.parent_acc").val();

            if (!id || id <= 0) {
                iziToast.error({
                    message: "Please select Account",
                    position: "topRight"
                });
                return;
            }

            if (!parent_acc) {
                iziToast.error({
                    message: "This is root level Account. You cannot move it.",
                    position: "topRight"
                });
                return;
            }

            $.get("/admin/chart_account/create", {
                _token: '{{ csrf_token() }}',
                get_account: id
            }, function(res) {
                if (res) {
                    $("#accountMovement .main_acc_code").val(res.acc_code);
                    $("#accountMovement .main_acc_name").val(res.title);
                    $("#accountMovement .old_acc_code").val(res.parent_acc.acc_code);
                    $("#accountMovement .old_acc_name").val(res.parent_acc.title);
                    $("#accountMovement").modal('show');
                }
            })
        })

        $("select[name=new_acc_name]").change(function() {
            let val = $(this).val();
            $("input[name=new_acc_code]").val(val);
        })

        $('#accountMovement').on('shown.bs.modal', function(e) {
            let acc_code = $("#accountMovement .main_acc_code").val();
            // $.get("{{ route('admin.chart_account.get_sub_accounts') }}", {
            //     acc_code
            // }, function(res) {
            //     console.log(res)
            // })
        })
    </script>
@endpush
