@extends('admin.layouts.app')

@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="formReset('/admin/manifest/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/manifest/delete')">
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

@section('style')
    <style>
        label.w-100 {
            text-align: right;
            padding-right: 8px;
            text-wrap: nowrap;
        }
    </style>
@endsection

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <form id="myForm" method="post" action="{{ route('admin.manifest.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="0">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bold">{{ $page_title }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="row gy-1 gx-3">
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Tran #</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="tran" value="{{ old('tran', $manifest_no) }}"
                                                        type="text" class="form-control tran" readonly />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Doc #</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="doc" value="{{ old('doc') }}" type="text"
                                                        class="form-control doc" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Year</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="year" value="{{ old('year') }}" type="text"
                                                        class="form-control year" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Shipping Line/Agent</label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="agent" class="agent search_select2"
                                                        data-url="{{ route('admin.party.get_all_data') }}"
                                                        data-type="get_sline_carrier"></select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Operation</label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="operation" class="form-select operation">
                                                        {{-- <option value=""></option> --}}
                                                        @foreach (operations() as $key => $value)
                                                            <option value="{{ $key }}">{{ $value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Book No</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="book_no" type="text" class="form-control book_no"
                                                        value="{{ old('book_no') }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Vessel</label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="vessel" class="vessel search_select2"
                                                        data-url="{{ route('admin.vessel.get_all_data') }}"
                                                        data-type="get_vessel"></select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Voyage</label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="voyage_no" class="voyage_no search_select2"
                                                        data-url="/admin/cro/create" data-type="get_voyage"></select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">ETD Date</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="etd_date" type="date" value="{{ old('etd_date') }}"
                                                        class="form-control etd_date" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Terminals</label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="terminals" class="terminals search_select2"
                                                        data-url="{{ route('admin.party_location.get_all_data') }}"
                                                        data-type="get_terminal_location"></select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">EGM No</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="egm_no" type="text" class="form-control egm_no"
                                                        value="{{ old('egm_no') }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">EGM Date</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="egm_date" type="date" value="{{ old('egm_date') }}"
                                                        class="form-control egm_date" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Shipping License</label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="license" class="license search_select2"
                                                        data-url="{{ route('admin.ship_agency_license.get_all_data') }}"
                                                        data-type="get_ship_agency_license"></select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Seq No</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="seq_no" type="text" class="form-control seq_no"
                                                        value="{{ old('seq_no') }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0"># of Install</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="install_count" type="text"
                                                        value="{{ old('install_count') }}"
                                                        class="form-control install_count" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Local Port</label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="port" class="port search_select2"
                                                        data-url="{{ route('admin.location.get_all_data') }}"
                                                        data-type="get_local_port"></select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">VIR No</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="vir_no" type="text" class="form-control vir_no"
                                                        value="{{ old('vir_no') }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Guarantee</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="guarantee" type="text"
                                                        value="{{ old('guarantee') }}" class="form-control guarantee" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Ship Company</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="ship_company" type="text"
                                                        value="{{ old('ship_company') }}"
                                                        class="form-control ship_company" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Captain</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="captain_name" type="text"
                                                        value="{{ old('captain_name') }}"
                                                        class="form-control captain_name" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Shad No</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="shad_no" type="text" class="form-control shad_no"
                                                        value="{{ old('shad_no') }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Berth/Wharf</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="berth_wharf" type="text"
                                                        value="{{ old('berth_wharf') }}"
                                                        class="form-control berth_wharf" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Cost Cntr</label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="cost_center" class="form-select cost_center">
                                                        <option value="">Head Office</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Time</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="time" type="time" class="form-control time"
                                                        value="{{ old('time') }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Custom Report</label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="custom_report" class="form-select custom_report">
                                                        <option value="Manifest">Manifest</option>
                                                        <option value="Loading List">Loading List</option>
                                                        <option value="Manifest Summary">Manifest Summary</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Date of Amendment</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="date_of_amendment" type="date"
                                                        value="{{ old('date_of_amendment') }}"
                                                        class="form-control date_of_amendment" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Operator Code</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="operator_code" type="text"
                                                        value="{{ old('operator_code') }}"
                                                        class="form-control operator_code" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Pre Alert Date</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="pre_alert_date" type="date"
                                                        value="{{ old('pre_alert_date') }}"
                                                        class="form-control pre_alert_date" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Ground Date</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="ground_date" type="date"
                                                        value="{{ old('ground_date') }}"
                                                        class="form-control ground_date" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Docs Rcv Frm S/Line</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="docs_rcvd" type="date"
                                                        value="{{ old('docs_rcvd') }}" class="form-control docs_rcvd" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Manifest Ref#</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="manifest_ref" type="text"
                                                        value="{{ old('manifest_ref') }}"
                                                        class="form-control manifest_ref" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Agent Code</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="agent_code" type="text"
                                                        value="{{ old('agent_code') }}"
                                                        class="form-control agent_code" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Line Code</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="line_code" type="text"
                                                        value="{{ old('line_code') }}" class="form-control line_code" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">Remarks</label>
                                                </div>
                                                <div class="col-10">
                                                    <textarea name="remarks" class="form-control remarks">{{ old('remarks') }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">Same Bottom Cargo</label>
                                                </div>
                                                <div class="col-10">
                                                    <textarea name="same_bottom_cargo" class="form-control same_bottom_cargo">{{ old('same_bottom_cargo') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-2 text-center">
                                        <div>
                                            <button type="button" class="btn btn-primary btn-sm">Clear</button>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#manifestListModal" class="btn btn-primary btn-sm">Show
                                                Manifest List</button>
                                            <button type="button" id="se_job_btn" data-type="hide"
                                                class="btn btn-primary btn-sm">Show
                                                Jobs</button>
                                            <button type="button" class="btn btn-primary btn-sm">Show Summary</button>
                                            <button type="button" class="btn btn-primary btn-sm">Pre Alert</button>
                                            <button type="button" class="btn btn-primary btn-sm">PEDI</button>
                                        </div>
                                    </div>

                                    <div class="mt-2 text-center">
                                        <button type="button" class="btn btn-primary btn-md">Weboc</button>
                                        <button type="button" class="btn btn-primary btn-md">Crucial Changes</button>
                                        <button type="button" class="btn btn-primary btn-sm">Draft</button>
                                        <button type="button" class="btn btn-primary btn-sm">Finalize</button>
                                        <button type="button" class="btn btn-primary btn-sm">Create & Allocate
                                            Job</button>
                                        <button type="button" class="btn btn-primary btn-sm">Letter Generation</button>
                                        <button type="button" class="btn btn-primary btn-sm">Letter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <style>
                #get_hbls thead th,
                #get_mbls thead th {
                    background: #71bf45;
                    color: #fff;
                }
            </style>

            <div class="col-md-12">
                <div id="job_allocation" class="card mt-1">
                    <div class="card-body">
                        <h4 class="text-center m-0 py-1 bg-primary text-white">Job Allocation</h4>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-top-home" aria-controls="navs-top-home"
                                    aria-selected="true">HBL/Index</button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-top-subcompany" aria-controls="navs-top-subcompany"
                                    aria-selected="false">Master B/Ls</button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                                <div class="card-datatable table-responsive pt-0">
                                    <div id="get_hbls"></div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navs-top-subcompany" role="tabpanel">
                                <div class="card-datatable table-responsive pt-0">
                                    <div id="get_mbls"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="manifestListModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollabl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Manifest List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" id="list_search_form" class="row mb-2">
                        <div class="form-group col-4">
                            <label class="form-label">Vessel</label>
                            <select name="vessel" class="form-select select2 search_vessel"></select>
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Voyage</label>
                            <select name="voyage" class="form-select select2 search_voyage"></select>
                        </div>
                    </form>
                    <div class="responsive text-nowrap">
                        <table class="table table-bordered table-sm quotation_record"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/js/app/manifest.js') }}"></script>
    <script type="text/javascript">
        let vessels = @json($vessels);
        $(document).ready(function() {
            var datatable = $('.quotation_record').DataTable({
                select: {
                    style: 'api'
                },
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "searching": false,
                "pageLength": 10,
                "scrollX": true,
                "ajax": {
                    "url": "{{ route('admin.manifest.create') }}",
                    "type": "get",
                    "data": function(d) {
                        var frm_data = $('#list_search_form').serializeArray();
                        $.each(frm_data, function(key, val) {
                            d[val.name] = val.value;
                        });
                    },
                },
                columns: [{
                        data: 'operation_value',
                        title: 'Operation'
                    },
                    {
                        data: 'shipping_line.party_name',
                        title: 'ShippingLine Agent',
                        "render": function(data, type, full, meta) {
                            if (full.shipping_line) {
                                return full.shipping_line.party_name;
                            }

                            return '-';
                        }
                    },
                    {
                        data: 'year',
                        title: 'Year'
                    },
                    {
                        data: 'shipping_license.name',
                        title: 'Shipping Licens',
                        "render": function(data, type, full, meta) {
                            if (full.shipping_license) {
                                return full.shipping_license.name;
                            }

                            return '-';
                        }
                    },
                    {
                        data: 'manifest_ref',
                        title: 'Manifest Ref'
                    },

                ],
                "rowCallback": function(row, data) {
                    $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`)
                }
            });

            $('#manifestListModal').on('shown.bs.modal', function() {
                datatable.ajax.reload();

                $(".search_vessel").html('');
                $(".search_vessel").append(`<option value=""></option>`);
                $(vessels).each(function(i, v) {
                    $(".search_vessel").append(`<option value="${v.id}">${v.text}</option>`);
                })
            });

            $(".search_vessel, .search_voyage").change(function() {
                datatable.ajax.reload();
            })
        });

        function edit_row(e, data) {
            let res = JSON.parse(data);
            if (res.manifest) {
                data = res.manifest;
                $(".tran").val(data.tran);
                $(".doc").val(data.doc);
                $(".year").val(data.year);
                $(".ship_company").val(data.ship_company);
                $(".captain_name").val(data.captain_name);
                $(".berth_wharf").val(data.berth_wharf);
                $(".remarks").val(data.remarks);
                $(".same_bottom_cargo").val(data.same_bottom_cargo);
                $(".manifest_ref").val(data.manifest_ref);
                $(".shad_no").val(data.shad_no);
                $(".ground_date").val(data.ground_date);
                $(".docs_rcvd").val(data.docs_rcvd);
                $(".time").val(data.time);
                $(".agent_code").val(data.agent_code);
                $(".line_code").val(data.line_code);
                $(".cost_center").val(data.cost_center);
                $(".custom_report").val(data.custom_report);
                $(".operation").val(data.operation);
                $(".book_no").val(data.book_no);
                $(".etd_date").val(data.etd_date);
                $(".egm_date").val(data.egm_date);
                $(".egm_no").val(data.egm_no);
                $(".seq_no").val(data.seq_no);
                $(".install_count").val(data.install_count);
                $(".vir_no").val(data.vir_no);
                $(".date_of_amendment").val(data.date_of_amendment);
                $(".operator_code").val(data.operator_code);
                $(".guarantee").val(data.guarantee);
                $(".pre_alert_date").val(data.pre_alert_date);

                if (data.vessels) {
                    var option = new Option(data.vessels.vessel_name, data.vessels.id, true, true);
                    $(".vessel").append(option).trigger('change');
                } else {
                    $(".vessel").val(null).trigger('change');
                }

                if (data.voyages) {
                    var option = new Option(data.voyages.voy, data.voyages.id, true, true);
                    $(".voyage_no").append(option).trigger('change');
                } else {
                    $(".voyage_no").val(null).trigger('change');
                }

                if (data.terminals) {
                    var option = new Option(data.terminals.location_name, data.terminals.id, true, true);
                    $(".terminals").append(option).trigger('change');
                } else {
                    $(".terminals").val(null).trigger('change');
                }

                if (data.shipping_license) {
                    var option = new Option(data.shipping_license.name, data.shipping_license.id, true, true);
                    $(".license").append(option).trigger('change');
                } else {
                    $(".license").val(null).trigger('change');
                }

                if (data.local_port) {
                    var option = new Option(data.local_port.location, data.local_port.id, true, true);
                    $(".port").append(option).trigger('change');
                } else {
                    $(".port").val(null).trigger('change');
                }

                if (data.shipping_line) {
                    var option = new Option(data.shipping_line.party_name, data.shipping_line.id, true, true);
                    $(".agent").append(option).trigger('change');
                } else {
                    $(".agent").val(null).trigger('change');
                }

                $("#myForm").attr("action", "{{ route('admin.manifest.update') }}")
                $("input[name=id]").val(data.id);
            }
        }

        $(".navigation").click(function() {
            let id = $("input[name=id]").val();
            let route = "/admin/manifest/get";
            let type = $(this).attr("data-type");
            let data = getList(route, type, id);
            if (data != null) {
                edit_row("", JSON.stringify(data));
            }
        });

        $('#submitButton').click(function() {
            $('#myForm').submit();
        });

        $(document).ready(function() {
            $("#job_allocation").hide();

            $("#se_job_btn").click(function() {
                let type = $(this).data('type');
                let manifest_id = $("input[name=id]").val();

                if (type == "show") {
                    $("#job_allocation").hide();
                    $(this).data('type', 'hide');
                    $(this).text('Show Jobs');
                    return;
                }

                if (manifest_id > 0) {
                    $.get("/admin/manifest/allocation", {
                        manifest_id,
                        type: 'hbl'
                    }, function(res) {
                        $("#get_hbls").html(res);
                    })

                    $.get("/admin/manifest/allocation", {
                        manifest_id,
                        type: 'mbl'
                    }, function(res) {
                        $("#get_mbls").html(res);
                    })

                    $("#job_allocation").show();
                    $(this).data('type', 'show');
                    $(this).text('Hide Jobs');
                } else {
                    alert('Something went wrong!')
                }
            })
        })

        $(document).ready(function() {
            $("#manifest_list").hide();
            $("#manifest_list_btn").click(function() {
                $("#manifest_list").show();
            })
        })
    </script>
@endpush
