@extends('admin.layouts.app')

@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="formReset('/admin/party_location/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/party_location/delete')">
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
            <div class="col-md-7">
                <form id="myForm" method="post" action="{{ route('admin.party_location.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0" />

                            <div class="row">
                                <div class="col-7">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Code</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="code" value="{{ old('code') }}" type="text"
                                                class="form-control code" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Loc Name</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="location_name" value="{{ old('location_name') }}" type="text"
                                                class="form-control location_name" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-5">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Short Name</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="short_name" value="{{ old('short_name') }}" type="text"
                                                class="form-control short_name" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Contact Person</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="contact_person" value="{{ old('contact_person') }}"
                                                type="text" class="form-control contact_person" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">City</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="city" class="city search_select2"
                                                data-url="{{ route('admin.location.get_all_data') }}"
                                                data-type="get_city"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Address</label>
                                        </div>
                                        <div class="col-9">
                                            <textarea name="address" class="form-control address">{{ old('address') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">State</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="state" type="text" class="form-control state"
                                                value="{{ old('state') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-5">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Zip Code</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="zipcode" type="text" class="form-control zipcode"
                                                value="{{ old('zipcode') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Phone</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="phone" type="text" class="form-control phone"
                                                value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-5">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Mobile</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="mobile" type="text" class="form-control mobile"
                                                value="{{ old('mobile') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Email</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="email" type="text" class="form-control email"
                                                value="{{ old('email') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-5">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Website</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="website" type="text" class="form-control website"
                                                value="{{ old('website') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Facsimile</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="facsimile" type="text" class="form-control facsimile"
                                                value="{{ old('facsimile') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-5">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Codeco EDI Text</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="codeco" type="text" class="form-control codeco"
                                                value="{{ old('codeco') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-10">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Party</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="party_code" type="hidden" class="form-control party_code">
                                            <select name="party" class="party search_select2"
                                                data-url="{{ route('admin.party.get_all_data') }}"
                                                data-type="get_terminals"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <label class="form-check-label mb-2">Location Type: </label>
                                <div class="col-md-3">
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Type[]" value="Sales"
                                            class="form-check-input Type">
                                        Sales
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Type[]" value="Operation"
                                            class="form-check-input Type">
                                        Operation
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Type[]" value="Chasis-Pick-Drop"
                                            class="form-check-input Type">
                                        Chasis Pick/Drop
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Type[]" value="Terminel"
                                            class="form-check-input Type">
                                        Terminel
                                    </label>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Type[]" value="Documentation"
                                            class="form-check-input Type">
                                        Documentation
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Type[]" value="Warehouse"
                                            class="form-check-input Type">
                                        Warehouse
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Type[]" value="Off-Dock-Yard"
                                            class="form-check-input Type">
                                        Off Dock Yard
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Enable EDo" value="Enable-EDO"
                                            class="form-check-input Type">
                                        Enable EDo
                                    </label>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Type[]" value="Factory-Office"
                                            class="form-check-input Type">
                                        Factory/Office
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Type[]" value="Container-Pick-Drop-Loc"
                                            class="form-check-input Type">
                                        Container Pick/Drop Loc
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Type[]" value="Container-Depot"
                                            class="form-check-input Type">
                                        Container Depot
                                    </label>
                                    <div class="mb-2">
                                        <select name="Loading List" id="cars" class="form-select">
                                            <option value="Sort"></option>
                                        </select>
                                    </div>
                                    <div class="mb-2 d-flex">
                                        <label class="form-label">sender: </label>
                                        <input name="sender" type="text" class="form-control sender">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">Remarks:</label>
                                        <textarea name="remarks" rows="4" type="text" class="form-control remarks"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">LP Header:</label>
                                        <textarea name="lp_header" rows="4" type="text" class="form-control lp_header"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-2">
                                        <label class="form-label">Empty Remarks:</label>
                                        <textarea name="empty_remarks" rows="4" type="text" class="form-control empty_remarks"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label class="form-label">Code:</label>
                                    <input name="Code" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="mb-2">
                                    <label class="form-label">Name:</label>
                                    <input name="name" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <div class="mb-3">
                                    <button class="btn btn-primary btn-sm">Show General Location</button>
                                </div>
                            </div>
                        </div>
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
        $('#submitButton').click(function() {
            $('#myForm').submit();
        });

        $(document).ready(function() {
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
                    "url": "{{ route('admin.party_location.create') }}",
                    "type": "get",
                    "data": function(d) {
                        var frm_data = $('#result_report_form').serializeArray();
                        $.each(frm_data, function(key, val) {
                            d[val.name] = val.value;
                        });
                    },
                },
                columns: [{
                        data: 'code',
                        title: 'Code'
                    },
                    {
                        data: 'location_name',
                        title: 'LocationName'
                    },
                    {
                        data: 'short_name',
                        title: 'ShortNamw'
                    },
                    {
                        data: 'city',
                        title: 'City',
                        render: function(data, type, full, meta) {
                            if (full.city) {
                                return full.city.location;
                            } else {
                                return '-';
                            }
                        }
                    },
                    {
                        data: 'address',
                        title: 'Address'
                    },
                    {
                        data: 'phone',
                        title: 'Phone'
                    },

                ],
                "rowCallback": function(row, data) {
                    $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`)
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
                })
            }
        });

        function edit_row(e, data) {
            data = JSON.parse(data);
            if (data) {
                $(".code").val(data.code);
                $(".location_name").val(data.location_name);
                $(".short_name").val(data.short_name);
                $(".contact_person").val(data.contact_person);
                $(".address").val(data.address);
                $(".state").val(data.state);
                $(".zipcode").val(data.zipcode);
                $(".phone").val(data.phone);
                $(".mobile").val(data.mobile);
                $(".email").val(data.email);
                $(".website").val(data.website);
                $(".facsimile").val(data.facsimile);
                $(".codeco").val(data.codeco);
                $(".party_code").val(data.party_code);

                $(".Type").removeAttr('checked');
                $(data.Type).each(function(i, v) {
                    $(`.Type[value=${v}]`).attr("checked", true);
                })

                $(".sender").val(data.sender);
                $(".remarks").val(data.remarks);
                $(".lp_header").val(data.lp_header);
                $(".empty_remarks").val(data.empty_remarks);

                if (data.city) {
                    var option = new Option(data.city.location, data.city.id, true, true);
                    $(".city").append(option).trigger('change');
                } else {
                    $(".city").val(null).trigger('change');
                }

                if (data.party) {
                    var option = new Option(data.party.party_name, data.party.id, true, true);
                    $(".party").append(option).trigger('change');
                } else {
                    $(".party").val(null).trigger('change');
                }

                $("#myForm").attr("action", "{{ route('admin.party_location.update') }}")
                $("input[name=id]").val(data.id);
            }

        }

        $(".navigation").click(function() {
            let id = $("input[name=id]").val();
            let route = "/admin/party_location/get";
            let type = $(this).attr("data-type");
            let data = getList(route, type, id);
            if (data != null) {
                edit_row("", JSON.stringify(data));
            }
        });
    </script>
@endpush
