@extends('admin.layouts.app')

@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="formReset('/admin/voyage/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/voyage/delete')">
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
                <i class="fa fa-forward-step" title="Back"></i>
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

@php
    $vessel_id = @$_GET['vessel_id'];
@endphp

@section('panel')
    <style>
        .local_repeater .select2.select2-container {
            width: 450px !important;
        }
    </style>
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="myForm" method="post" action="{{ route('admin.voyage.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row match-height">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0" />

                            <div class="row">
                                <div class="col-12">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Vessel</label>
                                        </div>
                                        <div class="col-7">
                                            <select name="vessel" class="vessel search_select2"
                                                data-url="{{ route('admin.vessel.get_all_data') }}"
                                                data-type="get_vessel"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Voyage</label>
                                        </div>
                                        <div class="col-5">
                                            <input name="voy" type="text" value="{{ old('voy') }}"
                                                class="form-control voy" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Port of Dischage</label>
                                        </div>
                                        <div class="col-7">
                                            <input name="discharge_code" type="hidden" class="discharge_code" />
                                            <select name="port_of_discharge" class="port_of_discharge search_select2"
                                                data-type="get_location"
                                                data-url="{{ route('admin.location.get_all_data') }}"></select>
                                        </div>
                                        <div class="col-2">
                                            <small> (For Export)</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Port of Loading</label>
                                        </div>
                                        <div class="col-7">
                                            <input name="loading_code" type="hidden" class="loading_code" />
                                            <select name="port_of_loading" class="port_of_loading search_select2"
                                                data-type="get_location"
                                                data-url="{{ route('admin.location.get_all_data') }}"></select>
                                        </div>
                                        <div class="col-2">
                                            <small> (For Import)</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-12">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Type</label>
                                        </div>
                                        <div class="col-9">
                                            <div class="d-flex">
                                                <div class="mb-2">
                                                    <input name="type" type="radio" class="form-check-input type"
                                                        value="Import" id="defaultRadio1" />
                                                    <label class="form-check-label" for="defaultRadio1">Import</label>
                                                </div>
                                                <div class="mb-2 px-3">
                                                    <input name="type" type="radio" class="form-check-input type"
                                                        value="Export" id="defaultRadio2" />
                                                    <label class="form-check-label" for="defaultRadio2">Export</label>
                                                </div>
                                                <div class="mb-2 px-3">
                                                    <input name="type" type="radio" class="form-check-input type"
                                                        value="Both" id="defaultRadio3" />
                                                    <label class="form-check-label" for="defaultRadio3">Both</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="p-3">
                            <div class="card-datatable table-responsive pt-0">
                                <table class="table table-bordered" style="width:150%;">
                                    <thead class="text-center">
                                        <tr>
                                            <th width="3%">
                                                <button type="button" class="btn btn-info btn-sm"
                                                    onclick="addNewRow(this)">
                                                    <i class="fa fa-plus-circle"></i>
                                                </button>
                                            </th>
                                            <th width="10%">S.No</th>
                                            <th width="15%">Currency</th>
                                            <th width="15%">Selling</th>
                                            <th width="15%">Buying</th>
                                            <th width="15%">Sline/Carrier Code</th>
                                            <th width="15%">Sline/Carrier Name</th>
                                        </tr>
                                    </thead>
                                    <tbody class="detail_repeater">
                                        <tr>
                                            <td width="3%">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="delRow(this)">
                                                    <i class="fa fa-circle-xmark"></i>
                                                </button>
                                            </td>
                                            <td width="10%">
                                                <input name="" type="text" class="form-control" />
                                            </td>
                                            <td width="15%">
                                                <select name="currency[]" class="form-select currency">
                                                    <option selected disabled value=""></option>
                                                    @foreach ($currencies as $currency)
                                                        <option value="{{ $currency->id }}">{{ $currency->code }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td width="15%">
                                                <input name="selling[]" type="text" class="form-control selling" />
                                            </td>
                                            <td width="15%">
                                                <input name="buying[]" type="text" class="form-control buying" />
                                            </td>
                                            <td width="15%">
                                                <input name="s_line_code[]" type="text"
                                                    class="form-control s_line_code" />
                                            </td>
                                            <td width="15%">
                                                <input name="s_line_name[]" type="text"
                                                    class="form-control s_line_name" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Vessel:</label>
                                        <select name="vessel_search" class="custom_select">
                                            <option selected disabled></option>
                                            {{-- @foreach ($vessels as $value)
                                            <option @if ($vessel_id == $value->id) selected @endif value="{{ $value->id }}">{{ $value->vessel_name }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Voyage</label>
                                        <input name="voyage_name" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="responsive text-nowrap">
                                <table class="table table-bordered table-sm quotation_record"></table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="p-3">
                        <h4 class="text-center bg-primary text-white">Local Port</h4>
                        <div class="card-datatable table-responsive pt-0">
                            <table class="table table-bordered" style="width:240%;">
                                <thead class="text-center">
                                    <tr>
                                        <th width="4%">
                                            <button type="button" class="btn btn-info btn-sm"
                                                onclick="addlocalRow(this)">
                                                <i class="fa fa-plus-circle"></i>
                                            </button>
                                        </th>
                                        {{-- <th>...</th>
                                        <th>S.No</th> --}}
                                        <th width="7%">Code</th>
                                        <th width="20%">Local Port</th>
                                        <th width="6%">Arrival Date (Local Inward)</th>
                                        <th width="6%">Sailing Date (Local Outward)</th>
                                        <th width="7%">VIR No/ Rotation #</th>
                                        <th width="7%">EGM No</th>
                                        <th width="6%">EGM Date</th>
                                        <th width="5%">Code</th>
                                        <th width="6%">Slot Operator Name</th>
                                        <th width="6%">SCN #</th>
                                        <th width="6%">SA Code</th>
                                        <th width="6%">Yard Opening Date</th>
                                        <th width="6%">Yard Opening Time</th>
                                        <th width="6%">Yard Closing Date</th>
                                        <th width="6%">Yard Closing Time</th>
                                    </tr>
                                </thead>
                                <tbody class="local_repeater">
                                    <tr>
                                        <td width="4%" class="text-center">
                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="dellocalRow(this)">
                                                <i class="fa fa-circle-xmark"></i>
                                            </button>
                                        </td>
                                        {{-- <td><i onclick="addlocalRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                        <td><input name="" type="text" style="width: 100%;" /></td> --}}
                                        <td width="7%">
                                            <input name="code[]" type="text" class="form-control code" />
                                        </td>
                                        <td width="20%">
                                            <select name="local_port[]" class="local_port search_select2"
                                                data-url="{{ route('admin.location.get_all_data') }}"
                                                data-type="get_local_port"></select>
                                        </td>
                                        <td width="6%">
                                            <input name="arrival_date[]" type="date"
                                                class="form-control arrival_date" />
                                        </td>
                                        <td width="6%">
                                            <input name="sailing_date[]" type="date"
                                                class="form-control sailing_date" />
                                        </td>
                                        <td width="7%">
                                            <input name="vir_no[]" type="text" class="form-control vir_no" />
                                        </td>
                                        <td width="7%">
                                            <input name="egm_no[]" type="text" class="form-control egm_no" />
                                        </td>
                                        <td width="6%">
                                            <input name="egm_date[]" type="date" class="form-control egm_date" />
                                        </td>
                                        <td width="5%">
                                            <input name="code2[]" type="text" class="form-control code2" />
                                        </td>
                                        <td width="6%">
                                            <input name="slot_operator[]" type="text"
                                                class="form-control slot_operator" />
                                        </td>
                                        <td width="6%">
                                            <input name="scn[]" type="text" class="form-control scn" />
                                        </td>
                                        <td width="6%">
                                            <input name="sa_code[]" type="text" class="form-control sa_code" />
                                        </td>
                                        <td width="6%">
                                            <input name="opening_date[]" type="date"
                                                class="form-control opening_date" />
                                        </td>
                                        <td width="6%">
                                            <input name="opening_time[]" type="time"
                                                class="form-control opening_time" />
                                        </td>
                                        <td width="6%">
                                            <input name="closing_date[]" type="date"
                                                class="form-control closing_date" />
                                        </td>
                                        <td width="6%">
                                            <input name="closing_time[]" type="time"
                                                class="form-control closing_time" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script>
        $('#submitButton').click(function() {
            $('#myForm').submit();
        });

        let vessel_id = $("select[name=vessel_search]").val();

        $(document).ready(function() {

            $(".custom_select").select2({
                data: @json($vessels)
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
                })
            }

            var datatable = $('.quotation_record').DataTable({
                select: {
                    style: 'api'
                },
                "processing": true,
                "searching": false,
                "serverSide": true,
                "lengthChange": false,
                "pageLength": 10,
                "scrollX": true,
                "ajax": {
                    "url": "{{ route('admin.voyage.create') }}",
                    "type": "get",
                    "data": function(d) {
                        d.vessel_id = $("select[name=vessel_search]").val();
                        d.voyage_name = $("input[name=voyage_name]").val();
                    },
                },
                columns: [{
                        title: 'Vessel',
                        "render": function(data, type, full, meta) {
                            if (full.vessel) {
                                return full.vessel.vessel_name;
                            } else {
                                return '-';
                            }
                        }
                    },
                    {
                        data: 'voy',
                        title: 'Voyage'
                    },
                    {
                        data: 'port_of_discharge',
                        title: 'Port of Dischage'
                    },
                    {
                        data: 'port_of_loading',
                        title: 'Port of Loading'
                    },
                    {
                        data: 'type',
                        title: 'Type'
                    },

                ],
                "rowCallback": function(row, data) {
                    $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`)
                }
            });

            $("select[name=vessel_search]").change(function() {
                datatable.ajax.reload();
            })
            $("input[name=voyage_name]").keyup(function() {
                datatable.ajax.reload();
            })
        });

        function addNewRow(e) {
            $('.detail_repeater tr:last').clone().appendTo(".detail_repeater");
            $(".detail_repeater tr:last").find("input").val(null);
            $(".detail_repeater tr:last").find("option").val(null).trigger('change');
        }

        function delRow(e) {
            if ($(".detail_repeater tr").length <= 1) return;
            $(e).parent().parent().remove();
        }

        function addlocalRow(e) {
            $(".local_repeater .search_select2").select2('destroy');
            $('.local_repeater tr:last').clone().appendTo(".local_repeater");
            $(".local_repeater tr:last").find("input").val(null);
            $(".local_repeater tr:last select").val(null).trigger("change");

            $(".local_repeater .search_select2").each(function(i, v) {
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
            })
        }

        function dellocalRow(e) {
            if ($(".local_repeater tr").length <= 1) return;
            $(e).parent().parent().remove();
        }

        function edit_row(e, data) {
            let res = JSON.parse(data);

            if (res.voyage) {
                data = res.voyage;
                $(".voy").val(data.voy);
                $(".type").removeAttr('checked');
                $(`.type[value=${data.type}]`).attr('checked', true);
                $("#myForm").attr("action", "{{ route('admin.voyage.update') }}")
                $("input[name=id]").val(data.id);

                if (data.vessel) {
                    var option = new Option(data.vessel.vessel_name, data.vessel.id, true, true);
                    $(".vessel").append(option).trigger('change');
                } else {
                    $(".vessel").val(null).trigger('change');
                }

                if (data.port_of_discharge) {
                    var option = new Option(data.port_of_discharge.location, data.port_of_discharge.id, true, true);
                    $(".port_of_discharge").append(option).trigger('change');
                } else {
                    $(".port_of_discharge").val(null).trigger('change');
                }

                if (data.port_of_loading) {
                    var option = new Option(data.port_of_loading.location, data.port_of_loading.id, true, true);
                    $(".port_of_loading").append(option).trigger('change');
                } else {
                    $(".port_of_loading").val(null).trigger('change');
                }
            }

            if (res.voyage_details) {
                data = res.voyage_details;
            }

            if (res.voyage_local_port.length) {
                data = res.voyage_local_port;
                $(".local_repeater tr:gt(0)").remove();
                $(".local_repeater .search_select2").select2('destroy');

                $(data).each(function(key, value) {
                    let $newRow = $(".local_repeater tr:first").clone();

                    if (value.local_ports) {
                        var option = new Option(value.local_ports.location, value.local_ports.id, true, true);
                        $newRow.find('.local_port').append(option).trigger('change');
                    } else {
                        $newRow.find('.local_port').val(null).trigger('change');
                    }

                    $newRow.find('.code').val(value.code);
                    // $newRow.find('.local_port').val(value.local_port);
                    $newRow.find('.arrival_date').val(value.arrival_date);
                    $newRow.find('.sailing_date').val(value.sailing_date);
                    $newRow.find('.vir_no').val(value.vir_no);
                    $newRow.find('.egm_no').val(value.egm_no);
                    $newRow.find('.egm_date').val(value.egm_date);
                    $newRow.find('.code2').val(value.code2);
                    $newRow.find('.slot_operator').val(value.slot_operator);
                    $newRow.find('.scn').val(value.scn);
                    $newRow.find('.sa_code').val(value.sa_code);
                    $newRow.find('.opening_date').val(value.opening_date);
                    $newRow.find('.opening_time').val(value.opening_time);
                    $newRow.find('.closing_date').val(value.closing_date);
                    $newRow.find('.closing_time').val(value.closing_time);

                    $(".local_repeater").append($newRow);
                })

                $(".local_repeater .search_select2").each(function(i, v) {
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
                })

                $(".local_repeater tr:first").remove();
            } else {
                $(".local_repeater tr:gt(0)").remove();
            }
        }

        $(".navigation").click(function() {
            let id = $("input[name=id]").val();
            let route = '/admin/voyage/get';
            let type = $(this).attr('data-type');
            let data = getList(route, type, id);
            if (data != null) {
                edit_row('', JSON.stringify(data));
            }
        })
    </script>
@endpush
