@extends('admin.layouts.app')


@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="croFormReset('/admin/cro/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/cro/delete')">
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
    <form class="container-xxl flex-grow-1 container-p-y" id="myForm" method="post"
        action="{{ route('admin.cro.store') }}" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                <div>
                    @csrf
                    <div class="card">
                        <div class="card-header pt-3 pb-1">
                            <h4 class="fw-bold m-0">{{ $page_title }}</h4>
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0" />

                            <div class="row">
                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">CRO No</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="cro_no" type="text" class="form-control cro_no" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">CRO Type</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="cro_type" class="form-select cro_type">
                                                <option value="job_booking">Against Job Booking</option>
                                                <option value="empty_movement">For Empty Movement</option>
                                                <option value="sale_off_hire">For Sale/Off-Hire</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Job #</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="job_number" type="text" class="form-control job_number" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 text-center">
                                    <button class="btn btn-primary btn-sm">Show List</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Client</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="client" class="client search_select2"
                                                data-url="{{ route('admin.party.get_all_data') }}" data-type="get_client"
                                                data-placeholder="Select Client"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Issue Date</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="issue_date" type="date" class="form-control issue_date" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">CRO Valid For</label>
                                        </div>
                                        <div class="col-7">
                                            <input name="cro_valid_for" type="text"
                                                class="form-control cro_valid_for" />
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label w-100 m-0">&nbsp; Days</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Equip Qty</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="equip_qty" type="text" class="form-control equip_qty" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Ref No</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="ref_number" type="text" class="form-control ref_number" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Size Type</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="size_type" type="text" class="form-control size_type" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-7">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <button type="button" class="nav-link active" role="tab"
                                                data-bs-toggle="tab" data-bs-target="#navs-top-home"
                                                aria-controls="navs-top-home" aria-selected="true">CRO Details</button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#navs-top-subcompany" aria-controls="navs-top-subcompany"
                                                aria-selected="false">Gate Pass Detail</button>
                                        </li>
                                    </ul>

                                    <div class="tab-content px-0 py-2">
                                        <!-- CRO Details -->
                                        <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Overseas Agent</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="overseas" class="overseas search_select2"
                                                        data-url="{{ route('admin.party.get_all_data') }}"
                                                        data-type="get_overseas"></select>
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Clearing Agent</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="clearing_agent" class="clearing_agent search_select2"
                                                        data-url="{{ route('admin.party.get_all_data') }}"
                                                        data-type="get_clearing_agent"></select>
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Shipper</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="shipper" class="shipper search_select2"
                                                        data-url="{{ route('admin.party.get_all_data') }}"
                                                        data-type="get_shipper"></select>
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Pickup Location</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="pickup_location" class="pickup_location search_select2"
                                                        data-url="{{ route('admin.party_location.get_all_data') }}"
                                                        data-type="get_pickup_location"></select>
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Port of Loading</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="port_of_loading" class="port_of_loading search_select2"
                                                        data-type="get_location"
                                                        data-url="{{ route('admin.location.get_all_data') }}"></select>
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Port of Discharge</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="port_of_discharge"
                                                        class="port_of_discharge search_select2" data-type="get_location"
                                                        data-url="{{ route('admin.location.get_all_data') }}"></select>
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Final Destination</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="final_destination"
                                                        class="final_destination search_select2" data-type="get_location"
                                                        data-url="{{ route('admin.location.get_all_data') }}"></select>
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Commodity</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="commodity" class="commodity search_select2"
                                                        data-url="{{ route('admin.commodity.get_all_data') }}"
                                                        data-type="get_commodity"></select>
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Terminal</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="terminal" class="terminal search_select2"
                                                        data-url="{{ route('admin.party_location.get_all_data') }}"
                                                        data-type="get_terminal_location"></select>
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Empty Depot</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="empty_depot" class="empty_depot search_select2"
                                                        data-url="{{ route('admin.party_location.get_all_data') }}"
                                                        data-type="get_empty_depot"></select>
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Transporter</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="transporter" class="transporter search_select2"
                                                        data-url="{{ route('admin.party.get_all_data') }}"
                                                        data-type="get_transporter"></select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Gate Pass Detail -->
                                        <div class="tab-pane fade" id="navs-top-subcompany" role="tabpanel">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-3">
                                                            <label class="form-label w-100 m-0">Book No</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input name="book_no" type="text"
                                                                class="form-control book_no" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-3">
                                                            <label class="form-label w-100 m-0">Gate Pass#</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input name="gate_pass" type="text"
                                                                class="form-control gate_pass" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-3">
                                                            <label class="form-label w-100 m-0">Date</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input name="date" type="date"
                                                                class="form-control date" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-3">
                                                            <label class="form-label w-100 m-0">Letter No</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input name="letter_no" type="text"
                                                                class="form-control letter_no" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-3">
                                                            <label class="form-label w-100 m-0">Licence No</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input name="licence_no" type="text"
                                                                class="form-control licence_no" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-3">
                                                            <label class="form-label w-100 m-0">Job No</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input name="job_no" type="text"
                                                                class="form-control job_no" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-3">
                                                            <label class="form-label w-100 m-0">Expiry Date</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input name="expiry_date" type="date"
                                                                class="form-control expiry_date" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-3">
                                                            <label class="form-label w-100 m-0">Shipping Agent</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input name="shipping_agent" type="text"
                                                                class="form-control shipping_agent" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="border p-2 border-primary mt-1 mb-3">
                                <div class="form-check form-check-inline p-0">
                                    <label class="form-check-label fw-bold">Cargo Type:</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input cargo_type" name="cargo_type" type="radio"
                                        id="general" value="general" checked>
                                    <label class="form-check-label" for="general">General</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input cargo_type" name="cargo_type" type="radio"
                                        id="hazardous" value="hazardous">
                                    <label class="form-check-label" for="hazardous">Hazardous</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Vessel</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="vessel" class="vessel search_select2"
                                                data-url="{{ route('admin.vessel.get_all_data') }}"
                                                data-type="get_vessel"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Voyage</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="voyage" class="voyage search_select2"
                                                data-url="/admin/cro/create" data-type="get_voyage"></select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label w-100 m-0">Sailing Date</label>
                                        </div>
                                        <div class="col-8">
                                            <input name="sailing_date" type="date" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input manual" name="manual" type="checkbox"
                                                    id="manual" value="manual">
                                                <label class="form-check-label" for="manual">Manual</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <input name="manual_box" type="text" class="form-control" />
                                        </div>
                                        <div class="col-3">
                                            &nbsp;
                                            <button class="btn btn-primary btn-sm">Upload</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <div class="mb-3 d-flex justify-content-between">
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input print_logo" name="print_logo"
                                                    type="checkbox" id="print_logo" value="Print-Logo">
                                                <label class="form-check-label" for="print_logo">Print Logo</label>
                                            </div>
                                        </div>
                                        <div class="mx-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input continue_mode" name="continue_mode"
                                                    type="checkbox" id="continue_mode" value="Continue-Mode">
                                                <label class="form-check-label" for="continue_mode">Continue Mode</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <label class="form-label">Haulage Instructions</label>
                                    <textarea name="haulage" rows="5" type="text" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-6">
                <div class="card" id="manifest_list">
                    <div class="card-body">
                        <div class="responsive text-nowrap">
                            <table class="table table-bordered table-sm quotation_record">
                                <thead class="table-primary">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="col-md-12">
                <div id="job_allocation" class="card mt-2">
                    <div class="card-body">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th width="10%">...</th>
                                    <th width="10%">S.No</th>
                                    <th width="50%">Container No.</th>
                                    <th width="30%">Container Size</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td width="10%">
                                    <i class="fa fa-circle-xmark fa-lg text-danger"></i>
                                    &nbsp;
                                    <i class="fa fa-copy fa-lg text-info"></i>
                                </td>
                                <td width="10%"><input type="text" class="form-control" name="r_sno[]" /></td>
                                <td width="50%"><input type="text" class="form-control" name="r_container_no[]" />
                                </td>
                                <td width="30%"><input type="text" class="form-control"
                                        name="r_container_size[]" /></td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


@push('script')
    <script src="{{ asset('assets/js/app/cro.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var datatable = $('.quotation_record').DataTable({
                select: {
                    style: 'api'
                },
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "pageLength": 15,
                "scrollX": true,
                "ajax": {
                    "url": "{{ route('admin.cro.create') }}",
                    "type": "get",
                    "data": function(d) {
                        var frm_data = $('#result_report_form').serializeArray();
                        $.each(frm_data, function(key, val) {
                            d[val.name] = val.value;
                        });
                    },
                },
                columns: [{
                        data: 'DT_RowIndex',
                        title: 'Sr No'
                    },
                    {
                        data: 'cro_no',
                        title: 'Cro No'
                    },
                    {
                        data: 'cro_type',
                        title: 'Cro Type'
                    },
                    {
                        data: 'job_number',
                        title: 'Job Number'
                    },
                    {
                        data: 'client',
                        title: 'Client'
                    },
                    {
                        data: 'issue_date',
                        title: 'Issue Date'
                    },
                ],
                "rowCallback": function(row, data) {
                    $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`)
                }
            });
        });

        function edit_row(e, data) {
            data = JSON.parse(data);
            if (data) {
                $(".cro_no").val(data.cro_no);
                $(".cro_type").val(data.cro_type);
                $(".job_number").val(data.job_number);
                $(".issue_date").val(data.issue_date);
                $(".cro_valid_for").val(data.cro_valid_for);
                $(".ref_number").val(data.ref_number);
                $(".equip_qty").val(data.equip_qty);
                $(".size_type").val(data.size_type);
                $(".book_no").val(data.book_no);
                $(".gate_pass").val(data.gate_pass);
                $(".date").val(data.date);
                $(".letter_no").val(data.letter_no);
                $(".licence_no").val(data.licence_no);
                $(".job_no").val(data.job_no);
                $(".expiry_date").val(data.expiry_date);
                $(".shipping_agent").val(data.shipping_agent);

                $(".cargo_type").removeAttr('checked');
                $(`.cargo_type[value=${data.cargo_type}]`).attr('checked', true);
                $(".sailing_date").val(data.sailing_date);

                $(".manual").removeAttr('checked');
                if (data.manual) {
                    $(`.manual[value=${data.manual}]`).attr('checked', true);
                }

                $(".print_logo").removeAttr('checked');
                if (data.print_logo) {
                    $(`.print_logo[value=${data.print_logo}]`).attr('checked', true);
                }

                $(".continue_mode").removeAttr('checked');
                if (data.continue_mode) {
                    $(`.continue_mode[value=${data.continue_mode}]`).attr('checked', true);
                }

                $(".haulage").val(data.haulage);
                $("#myForm").attr("action", "{{ route('admin.cro.update') }}");
                $("input[name=id]").val(data.id);

                if (data.clients) {
                    var option = new Option(data.clients.party_name, data.clients.id, true, true);
                    $(".client").append(option).trigger('change');
                } else {
                    $(".client").val(null).trigger('change');
                }

                if (data.overseas_agents) {
                    var option = new Option(data.overseas_agents.party_name, data.overseas_agents.id, true, true);
                    $(".overseas_agent").append(option).trigger('change');
                } else {
                    $(".overseas_agent").val(null).trigger('change');
                }

                if (data.clearing_agent) {
                    var option = new Option(data.clearing_agent.party_name, data.clearing_agent.id, true, true);
                    $(".clearing_agent").append(option).trigger('change');
                } else {
                    $(".clearing_agent").val(null).trigger('change');
                }

                if (data.shippers) {
                    var option = new Option(data.shippers.party_name, data.shippers.id, true, true);
                    $(".shipper").append(option).trigger('change');
                } else {
                    $(".shipper").val(null).trigger('change');
                }

                if (data.pickup_location) {
                    var option = new Option(data.pickup_location.location_name, data.pickup_location.id, true, true);
                    $(".pickup_location").append(option).trigger('change');
                } else {
                    $(".pickup_location").val(null).trigger('change');
                }

                if (data.port_of_loading) {
                    var option = new Option(data.port_of_loading.location, data.port_of_loading.id, true, true);
                    $(".port_of_loading").append(option).trigger('change');
                } else {
                    $(".port_of_loading").val(null).trigger('change');
                }

                if (data.port_of_discharge) {
                    var option = new Option(data.port_of_discharge.location, data.port_of_discharge.id, true, true);
                    $(".port_of_discharge").append(option).trigger('change');
                } else {
                    $(".port_of_discharge").val(null).trigger('change');
                }

                if (data.final_destination) {
                    var option = new Option(data.final_destination.location, data.final_destination.id, true, true);
                    $(".final_destination").append(option).trigger('change');
                } else {
                    $(".final_destination").val(null).trigger('change');
                }

                if (data.commodities) {
                    var option = new Option(data.commodities.name, data.commodities.id, true, true);
                    $(".commodity").append(option).trigger('change');
                } else {
                    $(".commodity").val(null).trigger('change');
                }

                if (data.terminals) {
                    var option = new Option(data.terminals.name, data.terminals.id, true, true);
                    $(".terminal").append(option).trigger('change');
                } else {
                    $(".terminal").val(null).trigger('change');
                }

                if (data.empty_depot) {
                    var option = new Option(data.empty_depot.location_name, data.empty_depot.id, true, true);
                    $(".empty_depot").append(option).trigger('change');
                } else {
                    $(".empty_depot").val(null).trigger('change');
                }

                if (data.transporters) {
                    var option = new Option(data.transporters.party_name, data.transporters.id, true, true);
                    $(".transporter").append(option).trigger('change');
                } else {
                    $(".transporter").val(null).trigger('change');
                }

                if (data.vessels) {
                    var option = new Option(data.vessels.vessel_name, data.vessels.id, true, true);
                    $(".vessel").append(option).trigger('change');
                } else {
                    $(".vessel").val(null).trigger('change');
                }

                if (data.voyages) {
                    var option = new Option(data.voyages.voy, data.voyages.id, true, true);
                    $(".voyage").append(option).trigger('change');
                } else {
                    $(".voyage").val(null).trigger('change');
                }
            }
        }

        function croFormReset(route) {
            document.getElementById("myForm").reset();
            $("#myForm").attr("action", route);
            $("#myForm").find("select").trigger("change");
            $("#myForm")
                .find(
                    ".client, .overseas_agent, .clearing_agent, .shipper, .pickup_location, .port_of_loading, .port_of_discharge, .final_destination, .commodity, .terminal, .empty_depot, .transporter, .vessel, .voyage"
                )
                .val(null)
                .trigger("change");

            setTimeout(() => {
                $(".voyage").html(null).trigger("change");
            }, 500);
        }
    </script>
@endpush
