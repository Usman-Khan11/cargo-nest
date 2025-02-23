@extends('admin.layouts.app')


@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="formReset('/admin/bl/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/bl/delete')">
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
            <div class="file_line" onclick="print()">
                <i class="fa fa-file-lines"></i>
            </div>
        </div>
    </div>
@endsection

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <form id="myForm" method="post" action="{{ route('admin.bl.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input name="id" type="hidden" value="0" />
                    @if (isset($_GET['job_id']))
                        <input name="job_id" type="hidden" class="job_id" value="{{ $_GET['job_id'] }}" />
                    @else
                        <input name="job_id" type="hidden" class="job_id" value="0" />
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bold m-0">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bl"
                                        type="button" role="tab" aria-controls="bl" aria-selected="true">BL
                                        Info</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#container" type="button" role="tab" aria-controls="container"
                                        aria-selected="false">Container Info</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#bl_detail" type="button" role="tab"
                                        aria-controls="bl_detail" aria-selected="false">BL Detail</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="four-tab" data-bs-toggle="tab"
                                        data-bs-target="#ref_no" type="button" role="tab" aria-controls="ref_no"
                                        aria-selected="false">Ref No's / Stamps</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="bl" role="tabpanel"
                                    aria-labelledby="home-tab">

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Job#</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="job_no" type="text" class="form-control job_no"
                                                        readonly />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Status</label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="status" class="form-select status">
                                                        <option value="draft">Draft</option>
                                                        <option value="final">Final</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Source</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="source_date" type="text"
                                                        class="form-control source_date" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">HBL#</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="hbl" type="text" class="form-control hbl" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">HBL Date</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="hbl_date" type="date"
                                                        class="form-control hbl_date" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input hbl_issue" name="hbl_issue"
                                                    type="checkbox" id="hbl_issue" value="1">
                                                <label class="form-check-label" for="hbl_issue">HBL Issue</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">MBL#</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="mbl" type="text" class="form-control mbl" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">MBL Date</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="mbl_date" type="date"
                                                        class="form-control mbl_date" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="col-md-12">
                                                <div class="">
                                                    <button type="button" class="btn btn-primary btn-sm">Pick SI</button>
                                                    <button type="button" class="btn btn-primary btn-sm mx-2">Show
                                                        Log</button>
                                                    <button type="button" class="btn btn-primary btn-sm">Copy BL</button>
                                                    <button type="button" class="btn btn-primary btn-sm mx-2">Import
                                                        BL</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />

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
                                            <label class="form-label w-100 m-0">Consignee</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="consignee" class="consignee search_select2"
                                                data-url="{{ route('admin.party.get_all_data') }}"
                                                data-type="get_client"></select>
                                        </div>
                                    </div>

                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Notify Part 1</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="notify1" class="notify1 search_select2"
                                                data-url="{{ route('admin.party.get_all_data') }}"
                                                data-type="get_client"></select>
                                        </div>
                                    </div>

                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Notify Part 2</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="notify2" class="notify2 search_select2"
                                                data-url="{{ route('admin.party.get_all_data') }}"
                                                data-type="get_client"></select>
                                        </div>
                                    </div>

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

                                    <div class="row">
                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Sailing Date</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="sailing_date" type="date"
                                                        class="form-control sailing_date" placeholder="" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4 ms-5">
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
                                    </div>

                                    <div class="my-2">
                                        <h4 class="text-center m-0 py-1 bg-light">Booking Info</h4>
                                    </div>

                                    <div class="row">
                                        <div class="col-5">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">POL</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="pol" class="pol search_select2"
                                                        data-type="get_location"
                                                        data-url="{{ route('admin.location.get_all_data') }}"></select>
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">POFD</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="pofd" class="pofd search_select2"
                                                        data-type="get_location"
                                                        data-url="{{ route('admin.location.get_all_data') }}"></select>
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">POT</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="pot" class="pot search_select2"
                                                        data-type="get_location"
                                                        data-url="{{ route('admin.location.get_all_data') }}"></select>
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Final Dest</label>
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
                                        </div>

                                        <div class="col-5">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Reference #</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="reference_number" type="text"
                                                        class="form-control reference_number" />
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Overseas Agent</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="overseas_agent" class="overseas_agent search_select2"
                                                        data-url="{{ route('admin.party.get_all_data') }}"
                                                        data-type="get_overseas"></select>
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">S/Line Carrier</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="shipping_line_carrier"
                                                        class="shipping_line_carrier search_select2"
                                                        data-url="{{ route('admin.party.get_all_data') }}"
                                                        data-type="get_sline_carrier"></select>
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Total Container</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="total_container" type="text"
                                                        class="form-control total_container" />
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Delivery</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="delivery" type="text"
                                                        class="form-control delivery" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="container" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="table-responsive pt-0">
                                        <table class="table table-bordered container_table" style="width:350%;">
                                            <thead class="text-center">
                                                <tr>
                                                    <th width="2%">
                                                        <button type="button" class="btn btn-info btn-sm btn_add">
                                                            <i class="fa fa-plus-circle"></i>
                                                        </button>
                                                    </th>
                                                    {{-- <th>S.No</th> --}}
                                                    <th width="5%">Container #</th>
                                                    <th width="4%">Seal #</th>
                                                    <th width="4%">Size Type</th>
                                                    <th width="4%">Rate Group</th>
                                                    <th width="4%">Gross WT</th>
                                                    <th width="4%">Net WT</th>
                                                    <th width="4%">Tare WT</th>
                                                    <th width="5%">WT Unit</th>
                                                    <th width="4%">CBM</th>
                                                    <th width="4%">Packages</th>
                                                    <th width="5%">Unit</th>
                                                    <th width="4%">Temperature</th>
                                                    <th width="4%">Voltage</th>
                                                    <th width="4%">Load Type</th>
                                                    <th width="10%">Remarks</th>
                                                    <th width="4%">Detention</th>
                                                    <th width="4%">Demurrage</th>
                                                    <th width="4%">Plugin</th>
                                                    <th width="4%">Line Code</th>
                                                    <th width="2%">Part FCL</th>
                                                    <th width="2%">SOC</th>
                                                    <th width="4%">DG Non DG</th>
                                                    <th width="4%">IMDG</th>
                                                    <th width="6%">UN No</th>
                                                    <th width="6%">Number</th>
                                                    <th width="5%">Date</th>
                                                    <th width="2%">OOG</th>
                                                    <th width="4%">Top</th>
                                                    <th width="4%">Right</th>
                                                    <th width="4%">Left</th>
                                                    <th width="4%">Front</th>
                                                    <th width="4%">Back</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td width="2%" class="text-center">
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="delContainer(this)">
                                                            <i class="fa fa-circle-xmark"></i>
                                                        </button>
                                                    </td>
                                                    {{-- <td><input type="text" name="c_s_no" class="form-control"
                                                            style="width: 100%;" /></td> --}}
                                                    <td width="5%">
                                                        <input type="text" name="c_container_no[]"
                                                            class="form-control c_container_no" />
                                                    </td>
                                                    <td width="4%">
                                                        <input type="text" name="c_seal[]"
                                                            class="form-control c_seal" />
                                                    </td>
                                                    <td width="4%">
                                                        <select name="c_size_type[]" class="form-select c_size_type">
                                                            <option value=""></option>
                                                        </select>
                                                    </td>
                                                    <td width="4%">
                                                        <input type="text" name="c_rate_group[]"
                                                            class="form-control c_rate_group" />
                                                    </td>
                                                    <td width="4%">
                                                        <input type="text" name="c_gross_wt[]"
                                                            class="form-control c_gross_wt" />
                                                    </td>
                                                    <td width="4%">
                                                        <input type="text" name="c_net_wt[]"
                                                            class="form-control c_net_wt" />
                                                    </td>
                                                    <td width="4%">
                                                        <input type="text" name="c_tare_wt[]"
                                                            class="form-control c_tare_wt" />
                                                    </td>
                                                    <td width="5%">
                                                        <select name="c_wt_unit[]" class="form-select c_wt_unit">
                                                            <option value=""></option>
                                                            <option value="LBS">LBS</option>
                                                            <option value="KG">KG</option>
                                                            <option value="MTON">MTON</option>
                                                        </select>
                                                    </td>
                                                    <td width="4%">
                                                        <input type="text" name="c_cbm[]"
                                                            class="form-control c_cbm" />
                                                    </td>
                                                    <td width="4%">
                                                        <input type="text" name="c_packages[]"
                                                            class="form-control c_packages" />
                                                    </td>
                                                    <td width="5%">
                                                        <select name="c_unit[]" class="form-select c_unit">
                                                            <option value=""></option>
                                                        </select>
                                                    </td>
                                                    <td width="4%">
                                                        <input type="text" name="c_temperature[]"
                                                            class="form-control c_temperature" />
                                                    </td>
                                                    <td width="4%">
                                                        <input type="text" name="c_voltage[]"
                                                            class="form-control c_voltage" />
                                                    </td>
                                                    <td width="4%">
                                                        <select name="c_load_type[]" class="form-select c_load_type">
                                                            <option value=""></option>
                                                            <option value="Full">Full</option>
                                                            <option value="Empty">Empty</option>
                                                        </select>
                                                    </td>
                                                    <td width="10%">
                                                        <input type="text" name="c_remarks[]"
                                                            class="form-control c_remarks" />
                                                    </td>
                                                    <td width="4%">
                                                        <input type="text" name="c_free_days_detention[]"
                                                            class="form-control c_free_days_detention" />
                                                    </td>
                                                    <td width="4%">
                                                        <input type="text" name="c_free_days_demurrage[]"
                                                            class="form-control c_free_days_demurrage" />
                                                    </td>
                                                    <td width="4%">
                                                        <input type="text" name="c_free_days_plugin[]"
                                                            class="form-control c_free_days_plugin" />
                                                    </td>
                                                    <td width="4%">
                                                        <input type="text" name="c_line_code[]"
                                                            class="form-control c_line_code" />
                                                    </td>
                                                    <td width="2%">
                                                        <input type="checkbox" name="c_part_fcl[]"
                                                            class="form-check c_part_fcl" value="1" />
                                                    </td>
                                                    <td width="2%">
                                                        <input type="checkbox" name="c_soc[]" class="form-check c_soc"
                                                            value="1" />
                                                    </td>
                                                    <td width="4%">
                                                        <select name="c_dg[]" class="form-select c_dg">
                                                            <option value=""></option>
                                                            <option value="DG">DG</option>
                                                            <option value="Non DG">Non DG</option>
                                                        </select>
                                                    </td>
                                                    <td width="4%">
                                                        <select name="c_imdg[]" class="form-select c_imdg">
                                                            <option value=""></option>
                                                            <option value="Class not specified">Class not specified
                                                            </option>
                                                            <option value="1">1</option>
                                                            <option value="1.1">1.1</option>
                                                            <option value="1.2">1.2</option>
                                                            <option value="1.3">1.3</option>
                                                            <option value="1.4">1.4</option>
                                                            <option value="1.5">1.5</option>
                                                            <option value="1.6">1.6</option>
                                                            <option value="2">2</option>
                                                            <option value="2.1">2.1</option>
                                                            <option value="2.2">2.2</option>
                                                            <option value="2.3">2.3</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="4.1">4.1</option>
                                                            <option value="4.2">4.2</option>
                                                            <option value="4.3">4.3</option>
                                                            <option value="5.0">5.0</option>
                                                            <option value="5.1">5.1</option>
                                                            <option value="5.2">5.2</option>
                                                            <option value="6">6</option>
                                                            <option value="6.1">6.1</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </td>
                                                    <td width="6%">
                                                        <input type="text" name="c_un_no[]"
                                                            class="form-control c_un_no" />
                                                    </td>
                                                    <td width="6%">
                                                        <input type="text" name="c_number[]"
                                                            class="form-control c_number" />
                                                    </td>
                                                    <td width="5%">
                                                        <input type="date" name="c_date[]"
                                                            class="form-control c_date" />
                                                    </td>
                                                    <td width="2%">
                                                        <input type="checkbox" name="c_oog[]" class="form-check c_oog"
                                                            value="1" />
                                                    </td>
                                                    <td width="4%">
                                                        <input type="text" name="c_top[]"
                                                            class="form-control c_top" />
                                                    </td>
                                                    <td width="4%">
                                                        <input type="text" name="c_right[]"
                                                            class="form-control c_right" />
                                                    </td>
                                                    <td width="4%">
                                                        <input type="text" name="c_left[]"
                                                            class="form-control c_left" />
                                                    </td>
                                                    <td width="4%">
                                                        <input type="text" name="c_front[]"
                                                            class="form-control c_front" />
                                                    </td>
                                                    <td width="4%">
                                                        <input type="text" name="c_back[]"
                                                            class="form-control c_back" />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="bl_detail" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Shipper</label>
                                                <textarea name="b_shipper" class="form-control b_shipper" rows="4" placeholder=""></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Consignee</label>
                                                <textarea name="b_consignee" class="form-control b_consignee" rows="4" placeholder=""></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Notify Part(1)</label>
                                                <textarea name="b_notify_part1" class="form-control b_notify_part1" rows="4" placeholder=""></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Notify Part(2)</label>
                                                <textarea name="b_notify_part2" class="form-control b_notify_part2" rows="4" placeholder=""></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Place of Receipt</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="b_place_of_receipt"
                                                        class="b_place_of_receipt search_select2" data-type="get_location"
                                                        data-url="{{ route('admin.location.get_all_data') }}"></select>
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Port of Loading</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="b_port_of_loading"
                                                        class="b_port_of_loading search_select2" data-type="get_location"
                                                        data-url="{{ route('admin.location.get_all_data') }}"></select>
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Port of Discharge</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="b_port_of_discharge"
                                                        class="b_port_of_discharge search_select2"
                                                        data-type="get_location"
                                                        data-url="{{ route('admin.location.get_all_data') }}"></select>
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Port of Delivery</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="b_place_of_delivery"
                                                        class="b_place_of_delivery search_select2"
                                                        data-type="get_location"
                                                        data-url="{{ route('admin.location.get_all_data') }}"></select>
                                                </div>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Agent Stamp</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="b_agent_stamp" type="text"
                                                        class="form-control b_agent_stamp" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Delivery Agent</label>
                                                <textarea name="b_delivery_agent" class="form-control b_delivery_agent" rows="4" placeholder=""></textarea>
                                            </div>

                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">No of Original B/L's</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="b_no_of_bl" class="form-control b_no_of_bl"
                                                        type="text" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-3">
                                                            <label class="form-label w-100 m-0">Freight Type</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <select name="b_freight_type"
                                                                class="form-select b_freight_type">
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-3">
                                                            <label class="form-label w-100 m-0">Unit</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <select name="b_unit" class="form-select b_unit">
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input b_manual" name="b_manual"
                                                            type="checkbox" id="b_manual" value="Manual">
                                                        <label class="form-check-label" for="b_manual">Manual</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-2">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <label class="form-label w-100 m-0">Net WT</label>
                                                        </div>
                                                        <div class="col-8">
                                                            <input name="b_net_wt" class="form-control b_net_wt"
                                                                type="text" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-2">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <label class="form-label w-100 m-0">Gross WT</label>
                                                        </div>
                                                        <div class="col-8">
                                                            <input name="b_gross_wt" class="form-control b_gross_wt"
                                                                type="text" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-2">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <label class="form-label w-100 m-0">Tare WT</label>
                                                        </div>
                                                        <div class="col-8">
                                                            <input name="b_tare_wt" class="form-control b_tare_wt"
                                                                type="text" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-2">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <label class="form-label w-100 m-0">CBM</label>
                                                        </div>
                                                        <div class="col-8">
                                                            <input name="b_cbm" class="form-control b_cbm"
                                                                type="text" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-2">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <label class="form-label w-100 m-0">Pkgs</label>
                                                        </div>
                                                        <div class="col-8">
                                                            <input name="b_pkgs" class="form-control b_pkgs"
                                                                type="text" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-2">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <label class="form-label w-100 m-0">Unit</label>
                                                        </div>
                                                        <div class="col-8">
                                                            <input name="b_unit" class="form-control b_unit"
                                                                type="text" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <label class="form-label w-100 m-0">HS Code</label>
                                                        </div>
                                                        <div class="col-8">
                                                            <input name="b_hs_code" class="form-control b_hs_code"
                                                                type="text" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <label class="form-label w-100 m-0">Packing Group</label>
                                                        </div>
                                                        <div class="col-8">
                                                            <select name="b_packing_group"
                                                                class="form-select b_packing_group">
                                                                <option value="none">None</option>
                                                                <option value="high_danger">I (High Danger)</option>
                                                                <option value="med_danger">II (Med Danger)</option>
                                                                <option value="low_danger">III (Low Danger)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <label class="form-label w-100 m-0">Hazmat Class</label>
                                                        </div>
                                                        <div class="col-8">
                                                            <select name="b_packing_group"
                                                                class="form-select b_packing_group">
                                                                <option value=""></option>
                                                                <option value="class_not_specified">Class not specified
                                                                </option>
                                                                <option value="">Class 1 Explosive: division not
                                                                    specified</option>
                                                                <option value="">Class 1.1 Explosive: mass</option>
                                                                <option value="">Class 1.2 Explosive: projection
                                                                </option>
                                                                <option value="">Class 1.3 Explosive: fire and minor
                                                                    blast/projection</option>
                                                                <option value="">Class 1.4 Explosive: minor</option>
                                                                <option value="">Class 1.5 Explosive: insensitive
                                                                    mass</option>
                                                                <option value="">Class 1.6 Explosive: insensitive
                                                                    minor</option>
                                                                <option value="">Class 2 Gas: division not specified
                                                                </option>
                                                                <option value="">Class 2.1 Gas: flammable</option>
                                                                <option value="">Class 2.2 Gas:
                                                                    nonflammable/nonpoisonous/oxygen</option>
                                                                <option value="">Class 3 Flammable Liquid and
                                                                    Combustible Liquid</option>
                                                                <option value="">Class 4 Solid: division not
                                                                    specified</option>
                                                                <option value="">Class 4.1 Flammable Solid</option>
                                                                <option value="">Class 4.2 Spontaneously Combustible
                                                                    Solid</option>
                                                                <option value="">Class 4.3 Dangerous When Wet
                                                                </option>
                                                                <option value="">Class 5 Oxidizer: division not
                                                                    specified</option>
                                                                <option value="">Class 5.1 Oxidizer</option>
                                                                <option value="">Class 5.2 Organic Peroxide</option>
                                                                <option value="">Class 6 Poison, Toxic or Inhalation
                                                                    Hazard</option>
                                                                <option value="">Class 6.1 Poison, Toxic or
                                                                    Inhalation Hazard</option>
                                                                <option value="">Class 7 Radioactive Materials
                                                                </option>
                                                                <option value="">Class 8 Corrosive</option>
                                                                <option value="">Class 9 Miscellaneous</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <label class="form-label w-100 m-0">UNO Code</label>
                                                        </div>
                                                        <div class="col-8">
                                                            <input name="b_uno_code" class="form-control b_uno_code"
                                                                type="text" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <label class="form-label w-100 m-0">Serial Type</label>
                                                        </div>
                                                        <div class="col-8">
                                                            <select name="b_unit" class="form-select b_unit">
                                                                <option value=""></option>
                                                                <option value="Afghan Cargo">Afghan Cargo</option>
                                                                <option value="Auto & Trucks Parts">Auto & Trucks Parts
                                                                </option>
                                                                <option value="Billets">Billets</option>
                                                                <option value="Bulk">Bulk</option>
                                                                <option value="Carbon Black & Powder">Carbon Black & Powder
                                                                </option>
                                                                <option value="chemicals">chemicals</option>
                                                                <option value="Construction Mat.">Construction Mat.
                                                                </option>
                                                                <option value="Diplomatic">Diplomatic</option>
                                                                <option value="Dry Bulk">Dry Bulk</option>
                                                                <option value="Dyes & Colours">Dyes & Colours</option>
                                                                <option value="Earthenware">Earthenware</option>
                                                                <option value="Edible Oil">Edible Oil</option>
                                                                <option value="Electrical Goods">Electrical Goods</option>
                                                                <option value="Fibre">Fibre</option>
                                                                <option value="Food Stuff">Food Stuff</option>
                                                                <option value="General">General</option>
                                                                <option value="Glass Ware">Glass Ware</option>
                                                                <option value="Government">Government</option>
                                                                <option value="Hardboard">Hardboard</option>
                                                                <option value="Hardware">Hardware</option>
                                                                <option value="hazardous">hazardous</option>
                                                                <option value="Iron & Steel">Iron & Steel</option>
                                                                <option value="Jute">Jute</option>
                                                                <option value="Lubricating Oil">Lubricating Oil</option>
                                                                <option value="Machinery">Machinery</option>
                                                                <option value="Medicine">Medicine</option>
                                                                <option value="Moduling Components">Moduling Components
                                                                </option>
                                                                <option value="Motor Cars">Motor Cars</option>
                                                                <option value="Motor Cycles">Motor Cycles</option>
                                                                <option value="Old Clothing">Old Clothing</option>
                                                                <option value="Other">Other</option>
                                                                <option value="Other Iron">Other Iron</option>
                                                                <option value="Paper">Paper</option>
                                                                <option value="Personal">Personal</option>
                                                                <option value="Pig Iron">Pig Iron</option>
                                                                <option value="Rails">Rails</option>
                                                                <option value="Scrap">Scrap</option>
                                                                <option value="Sheets & Pallets">Sheets & Pallets</option>
                                                                <option value="Sugar">Sugar</option>
                                                                <option value="Tallow">Tallow</option>
                                                                <option value="Tea G2">Tea G2</option>
                                                                <option value="Timber & bamboo">Timber & bamboo</option>
                                                                <option value="Transshipment">Transshipment</option>
                                                                <option value="Tyres and Tubes">Tyres and Tubes</option>
                                                                <option value="Wire/Nails">Wire/Nails</option>
                                                                <option value="Yarn">Yarn</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <label class="form-label w-100 m-0">Serial Category</label>
                                                        </div>
                                                        <div class="col-8">
                                                            <select name="b_packing_group"
                                                                class="form-select b_packing_group">
                                                                <option value=""></option>
                                                                <option value="Break Bulk / LCL">Break Bulk / LCL</option>
                                                                <option value="Dry Bulk">Dry Bulk</option>
                                                                <option value="Empty Containers">Empty Containers</option>
                                                                <option value="FCL">FCL</option>
                                                                <option value="Liquid Bulk">Liquid Bulk</option>
                                                                <option value="Transhipment">Transhipment</option>
                                                                <option value="Vehicles/Tyres/Tyres Scrape/Animals/Birds">
                                                                    Vehicles/Tyres/Tyres Scrape/Animals/Birds</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 border border-dark my-2 p-2">
                                            <div class="row g-1">
                                                <div class="col-md-2 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label">Marks No</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label">No of Pkgs or Shipping Units</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label">Description of Goods & Pkgs</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label">Gross Weight</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label">Measurement</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-1">
                                                <div class="col-md-2 col-12">
                                                    <div class="mb-0">
                                                        <textarea name="b_marks_no" class="form-control b_marks_no" rows="3" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <div class="mb-0">
                                                        <textarea name="b_no_of_pkgs" class="form-control b_no_of_pkgs" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-0">
                                                        <textarea name="b_description" class="form-control b_description" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <div class="mb-0">
                                                        <textarea name="b_gross_weight" class="form-control b_gross_weight" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <div class="mb-0">
                                                        <textarea name="b_measurement" class="form-control b_measurement" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <label class="form-label w-100 m-0">On Board Date</label>
                                                        </div>
                                                        <div class="col-8">
                                                            <input name="b_on_board_date" type="date"
                                                                class="form-control b_on_board_date" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <label class="form-label w-100 m-0">Place and Date of
                                                                Issue</label>
                                                        </div>
                                                        <div class="col-5">
                                                            <input name="b_place_of_issue" type="text"
                                                                class="form-control b_place_of_issue" />
                                                        </div>
                                                        <div class="col-3">
                                                            <input name="b_date_of_issue" type="date"
                                                                class="form-control b_date_of_issue" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <label class="form-label w-100 m-0">F.I No/Form E #</label>
                                                        </div>
                                                        <div class="col-8">
                                                            <input name="b_fi_no" type="text"
                                                                class="form-control b_fi_no" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-3">
                                                            <label class="form-label w-100 m-0">Date</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input name="b_date" type="date"
                                                                class="form-control b_date" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="ref_no" role="tabpanel" aria-labelledby="four-tab">

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Invoice #</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="r_invoice_number" type="text"
                                                        class="form-control r_invoice_number" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Date</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="r_inv_date" type="date"
                                                        class="form-control r_inv_date" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Export #</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="r_export_number" type="text"
                                                        class="form-control r_export_number" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Date</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="r_exp_date" type="date"
                                                        class="form-control r_exp_date" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Contact #</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="r_contact_number" type="text"
                                                        class="form-control r_contact_number" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Date</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="r_contact_date" type="date"
                                                        class="form-control r_contact_date" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">L/C #</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="r_lc_number" type="text"
                                                        class="form-control r_lc_number" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Date</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="r_lc_date" type="date"
                                                        class="form-control r_lc_date" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Client Ref #</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="r_client_ref_number" type="text"
                                                        class="form-control r_client_ref_number" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Shipper Ref #</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="r_shipper_ref_number" type="text"
                                                        class="form-control r_shipper_ref_number" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">S Bill #</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="r_s_bill" type="text"
                                                        class="form-control r_s_bill" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-9">
                                                    <input name="r_date" type="date"
                                                        class="form-control r_date" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="my-2">
                                        <h4 class="text-center m-0 py-1 bg-light">STAMPS</h4>
                                        <table class="table table-bordered stamp_repeater">
                                            <thead class="text-center">
                                                <tr>
                                                    <th width="5%">
                                                        <button type="button" class="btn btn-info btn-sm btn_add">
                                                            <i class="fa fa-plus-circle"></i>
                                                        </button>
                                                    </th>
                                                    <th width="12%">S.No</th>
                                                    <th width="13%">Code</th>
                                                    <th width="17%">Stamp</th>
                                                    <th width="15%">Stamp Group</th>
                                                    <th width="10%">Stamp Date</th>
                                                    <th width="28%">Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td width="5%" class="text-center">
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="delStamp(this)">
                                                            <i class="fa fa-circle-xmark"></i>
                                                        </button>
                                                    </td>
                                                    <td width="12%">
                                                        <input class="form-control r_sno" type="text"
                                                            name="r_sno[]" />
                                                    </td>
                                                    <td width="13%">
                                                        <input class="form-control r_code" type="text"
                                                            name="r_code[]" />
                                                    </td>
                                                    <td width="17%">
                                                        <input class="form-control r_stamp" type="text"
                                                            name="r_stamp[]" />
                                                    </td>
                                                    <td width="15%">
                                                        <select name="r_stamp_group[]"
                                                            class="r_stamp_group form-select">
                                                            <option value=""></option>
                                                            <option value="Group 1">Group 1</option>
                                                            <option value="Group 2">Group 2</option>
                                                            <option value="Group 3">Group 3</option>
                                                            <option value="Group 4">Group 4</option>
                                                            <option value="Group 5">Group 5</option>
                                                            <option value="Group 6">Group 6</option>
                                                            <option value="Group 7">Group 7</option>
                                                            <option value="Group 8">Group 8</option>
                                                            <option value="Group 9">Group 9</option>
                                                            <option value="Group 10">Group 10</option>
                                                            <option value="Group 11">Group 11</option>
                                                            <option value="Group 12">Group 12</option>
                                                            <option value="Group 13">Group 13</option>
                                                            <option value="Group 14">Group 14</option>
                                                            <option value="Group 15">Group 15</option>
                                                        </select>
                                                    </td>
                                                    <td width="10%">
                                                        <input class="form-control r_stamp_date" type="date"
                                                            name="r_stamp_date[]" />
                                                    </td>
                                                    <td width="28%">
                                                        <input class="form-control r_remarks" type="text"
                                                            name="r_remarks[]" />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/js/app/bl.js') }}"></script>
    <script>
        function edit_row(e, data) {
            let res = JSON.parse(data);

            if (res.bl) {
                data = res.bl;
                $(".job_id").val(data.job_id);
                $(".job_no").val(data.job_no);
                $(".status").val(data.status);
                $(".hbl").val(data.hbl);
                $(".hbl_date").val(data.hbl_date);
                $(".mbl").val(data.mbl);
                $(".mbl_date").val(data.mbl_date);
                $(".source_date").val(data.source_date);
                $(".hbl_issue").prop("checked", data.hbl_issue === "1");
                $(".sailing_date").val(data.sailing_date);

                $("#myForm").attr("action", "{{ route('admin.bl.update') }}")
                $("input[name=id]").val(data.id);

                if (data.shippers) {
                    var option = new Option(data.shippers.party_name, data.shippers.id, true, true);
                    $(".shipper").append(option).trigger('change');
                } else {
                    $(".shipper").val(null).trigger('change');
                }

                if (data.consignees) {
                    var option = new Option(data.consignees.party_name, data.consignees.id, true, true);
                    $(".consignee").append(option).trigger('change');
                } else {
                    $(".consignee").val(null).trigger('change');
                }

                if (data.notify_party_1) {
                    var option = new Option(data.notify_party_1.party_name, data.notify_party_1.id, true, true);
                    $(".notify1").append(option).trigger('change');
                } else {
                    $(".notify1").val(null).trigger('change');
                }

                if (data.notify_party_2) {
                    var option = new Option(data.notify_party_2.party_name, data.notify_party_2.id, true, true);
                    $(".notify2").append(option).trigger('change');
                } else {
                    $(".notify2").val(null).trigger('change');
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

                if (data.port_of_loading) {
                    var option = new Option(data.port_of_loading.location, data.port_of_loading.id, true, true);
                    $(".pol").append(option).trigger('change');
                } else {
                    $(".pol").val(null).trigger('change');
                }

                if (data.port_of_final_dest) {
                    var option = new Option(data.port_of_final_dest.location, data.port_of_final_dest.id, true, true);
                    $(".pofd").append(option).trigger('change');
                } else {
                    $(".pofd").val(null).trigger('change');
                }

                if (data.port_of_terminal) {
                    var option = new Option(data.port_of_terminal.location, data.port_of_terminal.id, true, true);
                    $(".pot").append(option).trigger('change');
                } else {
                    $(".pot").val(null).trigger('change');
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

                if (data.overseas_agents) {
                    var option = new Option(data.overseas_agents.party_name, data.overseas_agents.id, true, true);
                    $(".overseas_agent").append(option).trigger('change');
                } else {
                    $(".overseas_agent").val(null).trigger('change');
                }

                if (data.sline_carriers) {
                    var option = new Option(data.sline_carriers.party_name, data.sline_carriers.id, true, true);
                    $(".shipping_line_carrier").append(option).trigger('change');
                } else {
                    $(".shipping_line_carrier").val(null).trigger('change');
                }

                $(".reference_number").val(data.reference_number);
                $(".total_container").val(data.total_container);
                $(".delivery").val(data.delivery);
            }

            if (res.bl_details) {
                data = res.bl_details;
                $(".b_shipper").val(data.b_shipper);
                $(".b_consignee").val(data.b_consignee);
                $(".b_notify_part1").val(data.b_notify_part1);
                $(".b_notify_part2").val(data.b_notify_part2);
                $(".b_delivery_agent").val(data.b_delivery_agent);
                $(".b_agent_stamp").val(data.b_agent_stamp);
                $(".b_freight_type").val(data.b_freight_type);
                $(".b_unit").val(data.b_unit);
                $(".b_manual").prop("checked", data.b_manual);
                $(".b_no_of_bl").val(data.b_no_of_bl);
                $(".b_net_wt").val(data.b_net_wt);
                $(".b_gross_wt").val(data.b_gross_wt);
                $(".b_tare_wt").val(data.b_tare_wt);
                $(".b_cbm").val(data.b_cbm);
                $(".b_pkgs").val(data.b_pkgs);
                $(".b_unit").val(data.b_unit);
                $(".b_hs_code").val(data.b_hs_code);
                $(".b_packing_group").val(data.b_packing_group);
                $(".b_hazmat_class").val(data.b_hazmat_class);
                $(".b_uno_code").val(data.b_uno_code);
                $(".b_marks_no").val(data.b_marks_no);
                $(".b_no_of_pkgs").val(data.b_no_of_pkgs);
                $(".b_description").val(data.b_description);
                $(".b_gross_weight").val(data.b_gross_weight);
                $(".b_measurement").val(data.b_measurement);
                $(".b_on_board_date").val(data.b_on_board_date);
                $(".b_place_of_issue").val(data.b_place_of_issue);
                $(".b_date_of_issue").val(data.b_date_of_issue);
                $(".b_fi_no").val(data.b_fi_no);
                $(".b_date").val(data.b_date);

                if (data.place_of_receipt) {
                    var option = new Option(data.place_of_receipt.location, data.place_of_receipt.id, true, true);
                    $(".b_place_of_receipt").append(option).trigger('change');
                } else {
                    $(".b_place_of_receipt").val(null).trigger('change');
                }

                if (data.port_of_loading) {
                    var option = new Option(data.port_of_loading.location, data.port_of_loading.id, true, true);
                    $(".b_port_of_loading").append(option).trigger('change');
                } else {
                    $(".b_port_of_loading").val(null).trigger('change');
                }

                if (data.port_of_discharge) {
                    var option = new Option(data.port_of_discharge.location, data.port_of_discharge.id, true, true);
                    $(".b_port_of_discharge").append(option).trigger('change');
                } else {
                    $(".b_port_of_discharge").val(null).trigger('change');
                }

                if (data.place_of_delivery) {
                    var option = new Option(data.place_of_delivery.location, data.place_of_delivery.id, true, true);
                    $(".b_place_of_delivery").append(option).trigger('change');
                } else {
                    $(".b_place_of_delivery").val(null).trigger('change');
                }
            }

            if (res.bl_ref_info) {
                data = res.bl_ref_info;
                $(".r_invoice_number").val(data.r_invoice_number);
                $(".r_inv_date").val(data.r_inv_date);
                $(".r_export_number").val(data.r_export_number);
                $(".r_exp_date").val(data.r_exp_date);
                $(".r_contact_number").val(data.r_contact_number);
                $(".r_contact_date").val(data.r_contact_date);
                $(".r_lc_number").val(data.r_lc_number);
                $(".r_lc_date").val(data.r_lc_date);
                $(".r_client_ref_number").val(data.r_client_ref_number);
                $(".r_shipper_ref_number").val(data.r_shipper_ref_number);
                $(".r_s_bill").val(data.r_s_bill);
                $(".r_date").val(data.r_date);
            }

            if (res.bl_stamps.length) {
                data = res.bl_stamps;
                $(".stamp_repeater tbody tr:gt(0)").remove();

                $(data).each(function(key, value) {
                    let $newRow = $(".stamp_repeater tbody tr:first").clone();

                    $newRow.find('.r_code').val(value.r_code);
                    $newRow.find('.r_stamp').val(value.r_stamp);
                    $newRow.find('.r_stamp_group').val(value.r_stamp_group).trigger('change');
                    $newRow.find('.r_stamp_date').val(value.r_stamp_date);
                    $newRow.find('.r_remarks').val(value.r_remarks);

                    $(".stamp_repeater tbody").append($newRow);
                })

                $(".stamp_repeater tbody tr:first").remove();
            } else {
                $(".stamp_repeater tbody tr:gt(0)").remove();
            }

            if (res.container_info.length) {
                data = res.container_info;
                $(".container_table tbody tr:gt(0)").remove();

                $(data).each(function(key, value) {
                    let $newRow = $(".container_table tbody tr:first").clone();

                    $newRow.find('.c_container_no').val(value.c_container_no);
                    $newRow.find('.c_seal').val(value.c_seal);
                    $newRow.find('.c_size_type').val(value.c_size_type).trigger('change');
                    $newRow.find('.c_rate_group').val(value.c_rate_group);
                    $newRow.find('.c_gross_wt').val(value.c_gross_wt);
                    $newRow.find('.c_net_wt').val(value.c_net_wt);
                    $newRow.find('.c_tare_wt').val(value.c_tare_wt);
                    $newRow.find('.c_wt_unit').val(value.c_wt_unit).trigger('change');
                    $newRow.find('.c_cbm').val(value.c_cbm);
                    $newRow.find('.c_packages').val(value.c_packages);
                    $newRow.find('.c_unit').val(value.c_unit).trigger('change');
                    $newRow.find('.c_temperature').val(value.c_temperature);
                    $newRow.find('.c_voltage').val(value.c_voltage);
                    $newRow.find('.c_load_type').val(value.c_load_type).trigger('change');
                    $newRow.find('.c_remarks').val(value.c_remarks);
                    $newRow.find('.c_free_days_detention').val(value.c_free_days_detention);
                    $newRow.find('.c_free_days_demurrage').val(value.c_free_days_demurrage);
                    $newRow.find('.c_free_days_plugin').val(value.c_free_days_plugin);
                    $newRow.find('.c_line_code').val(value.c_line_code);
                    $newRow.find('.c_part_fcl').prop("checked", value.c_part_fcl === "1");
                    $newRow.find('.c_soc').prop("checked", value.c_soc === "1");
                    $newRow.find('.c_dg').val(value.c_dg).trigger('change');
                    $newRow.find('.c_imdg').val(value.c_imdg).trigger('change');
                    $newRow.find('.c_un_no').val(value.c_un_no);
                    $newRow.find('.c_number').val(value.c_number);
                    $newRow.find('.c_date').val(value.c_date);
                    $newRow.find('.c_oog').prop("checked", value.c_oog === "1");
                    $newRow.find('.c_top').val(value.c_top);
                    $newRow.find('.c_right').val(value.c_right);
                    $newRow.find('.c_left').val(value.c_left);
                    $newRow.find('.c_front').val(value.c_front);
                    $newRow.find('.c_back').val(value.c_back);

                    $(".container_table tbody").append($newRow);
                })

                $(".container_table tbody tr:first").remove();
            } else {
                $(".container_table tbody tr:gt(0)").remove();
            }
        }

        @if (isset($_GET['job_id']))
            setTimeout(() => {
                edit_row('', '@json($job_data)');
            }, 500);
        @endif

        function print() {
            let id = $("input[name=id]").val();
            if (id > 0) {
                window.open("/admin/bl/print/" + id);
            }
        }
    </script>
@endpush
