@extends('admin.layouts.app')

@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="formReset('/admin/ship_agency_license/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/ship_agency_license/delete')">
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

@section('panel')
    <style>
        .local_repeater .select2.select2-container {
            width: 450px !important;
        }
    </style>
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="myForm" method="post" action="{{ route('admin.ship_agency_license.store') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="row match-height">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0" />

                            {{-- <div class="row">
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
                            </div> --}}

                            <div class="row">
                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Agency Code</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="code" type="text" value="{{ old('code') }}"
                                                class="form-control code" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">License Prefix</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="license_prefix" type="text" value="{{ old('license_prefix') }}"
                                                class="form-control license_prefix" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">EPASS Code</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="epass_code" type="text" value="{{ old('epass_code') }}"
                                                class="form-control epass_code" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Agency Name</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="name" type="text" value="{{ old('name') }}"
                                                class="form-control name" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-5">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label w-100 m-0">Contact Person</label>
                                        </div>
                                        <div class="col-8">
                                            <input name="contact_person" type="text"
                                                value="{{ old('contact_person') }}" class="form-control contact_person" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Tell No</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="tell_no" type="text" value="{{ old('tell_no') }}"
                                                class="form-control tell_no" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-check mt-1">
                                        <input class="form-check-input default" type="checkbox" value="1"
                                            name="default" id="default">
                                        <label class="form-check-label" for="default">
                                            Default
                                        </label>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-2">
                                            <label class="form-label w-100 m-0">Fax</label>
                                        </div>
                                        <div class="col-10">
                                            <input name="fax" type="text" value="{{ old('fax') }}"
                                                class="form-control fax" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Mobile No</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="mobile_no" type="text" value="{{ old('mobile_no') }}"
                                                class="form-control mobile_no" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Email</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="email" type="text" value="{{ old('email') }}"
                                                class="form-control email" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Website</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="website" type="text" value="{{ old('website') }}"
                                                class="form-control website" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-1">
                                            <label class="form-label w-100 m-0">Address1</label>
                                        </div>
                                        <div class="col-11">
                                            <input name="address_1" type="text" value="{{ old('address_1') }}"
                                                class="form-control address_1" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-1">
                                            <label class="form-label w-100 m-0">Address2</label>
                                        </div>
                                        <div class="col-11">
                                            <input name="address_2" type="text" value="{{ old('address_2') }}"
                                                class="form-control address_2" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-1">
                                            <label class="form-label w-100 m-0">Address3</label>
                                        </div>
                                        <div class="col-11">
                                            <input name="address_3" type="text" value="{{ old('address_3') }}"
                                                class="form-control address_3" />
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
                                            <th width="12%">Terminal Code</th>
                                            <th width="15%">Terminal Name</th>
                                            <th width="35%">Sub Company</th>
                                            <th width="35%">Agency Code</th>
                                        </tr>
                                    </thead>
                                    <tbody class="detail_repeater">
                                        <tr>
                                            <td width="3%" class="text-center">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="delRow(this)">
                                                    <i class="fa fa-circle-xmark"></i>
                                                </button>
                                            </td>
                                            <td width="12%">
                                                <input name="terminal_code[]" type="text"
                                                    class="form-control terminal_code" />
                                            </td>
                                            <td width="15%">
                                                <input name="terminal_name[]" type="text"
                                                    class="form-control terminal_name" />
                                            </td>
                                            <td width="35%">
                                                <select name="sub_company[]" class="form-select sub_company">
                                                    <option value=""></option>
                                                    <option value="MACTER SHIPPING & LOGISTICS PAKISTAN">MACTER SHIPPING &
                                                        LOGISTICS PAKISTAN</option>
                                                    <option value="MASS FORWARDING & TRADING CO.">MASS FORWARDING & TRADING
                                                        CO.</option>
                                                    <option value="Modern Shipping Agencies (Pvt.) Ltd.">Modern Shipping
                                                        Agencies (Pvt.) Ltd.</option>
                                                </select>
                                            </td>
                                            <td width="35%">
                                                <input name="agency_code[]" type="text"
                                                    class="form-control agency_code" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="responsive text-nowrap">
                                <table class="table table-bordered table-sm quotation_record"></table>
                            </div>
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

        $(document).ready(function() {
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
                    "url": "{{ route('admin.ship_agency_license.create') }}",
                    "type": "get",
                    "data": function(d) {},
                },
                columns: [{
                        data: 'code',
                        title: 'Agency code'
                    },
                    {
                        data: 'name',
                        title: 'Agency name'
                    },
                    {
                        data: 'license_prefix',
                        title: 'License Prefix'
                    },
                    {
                        data: 'epass_code',
                        title: 'EPASS code'
                    },
                    {
                        data: 'tell_no',
                        title: 'tell no'
                    },
                    {
                        data: 'mobile_no',
                        title: 'Mobile no'
                    },
                    {
                        data: 'email',
                        title: 'email'
                    },
                    {
                        data: 'website',
                        title: 'website'
                    },
                ],
                "rowCallback": function(row, data) {
                    data = {
                        ship_agency_license: data,
                    };
                    $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`)
                }
            });
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

        function edit_row(e, data) {
            let res = JSON.parse(data);

            if (res.ship_agency_license) {
                data = res.ship_agency_license;
                $(".code").val(data.code);
                $(".name").val(data.name);
                $(".license_prefix").val(data.license_prefix);
                $(".epass_code").val(data.epass_code);
                $(".contact_person").val(data.contact_person);
                $(".contact_person").val(data.contact_person);
                $(".fax").val(data.fax);
                $(".mobile_no").val(data.mobile_no);
                $(".email").val(data.email);
                $(".website").val(data.website);
                $(".address_1").val(data.address_1);
                $(".address_2").val(data.address_2);
                $(".address_3").val(data.address_3);

                $(".default").removeAttr('checked');
                $(`.default[value=${data.default}]`).attr('checked', true);

                $("#myForm").attr("action", "{{ route('admin.ship_agency_license.update') }}")
                $("input[name=id]").val(data.id);

                if (data.lists) {
                    const obj = data.lists;
                    $(".detail_repeater tr:gt(0)").remove();

                    Object.keys(obj).forEach(function(key) {
                        let $newRow = $(".detail_repeater tr:first").clone();

                        $newRow.find('.terminal_code').val(obj[key].terminal_code);
                        $newRow.find('.terminal_name').val(obj[key].terminal_name);
                        $newRow.find('.sub_company').val(obj[key].sub_company).trigger('change');
                        $newRow.find('.agency_code').val(obj[key].agency_code);

                        $(".detail_repeater").append($newRow);
                    });

                    $(".detail_repeater tr:first").remove();
                } else {
                    $(".detail_repeater tr:gt(0)").remove();
                    $(".detail_repeater tr:first").find('input').val(null);
                    $(".detail_repeater tr:first").find('select').val(null).trigger('change');
                }
            }
        }

        $(".navigation").click(function() {
            let id = $("input[name=id]").val();
            let route = '/admin/ship_agency_license/get';
            let type = $(this).attr('data-type');
            let data = getList(route, type, id);
            if (data != null) {
                edit_row('', JSON.stringify(data));
            }
        })
    </script>
@endpush
