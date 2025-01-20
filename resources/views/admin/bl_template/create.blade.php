@extends('admin.layouts.app')


@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="formReset('/admin/bl_template/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/bl_template/delete')">
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
                <form id="myForm" method="post" action="{{ route('admin.bl_template.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input name="id" type="hidden" value="0" />
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bold m-0">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bl"
                                        type="button" role="tab" aria-controls="bl" aria-selected="true">Original
                                        Sheet</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#container" type="button" role="tab" aria-controls="container"
                                        aria-selected="false">Attach Sheets</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="bl" role="tabpanel"
                                    aria-labelledby="home-tab">

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <label class="form-label w-100 m-0">Format Name</label>
                                                        </div>
                                                        <div class="col-8">
                                                            <input name="format_name" type="text"
                                                                class="form-control format_name" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <label class="form-label w-100 m-0">Sub Company</label>
                                                        </div>
                                                        <div class="col-8">
                                                            <select name="status" class="form-select status">
                                                                <option value="draft">Draft</option>
                                                                <option value="final">Final</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-2">
                                                            <label class="form-label w-100 m-0">Mark's & Container #:
                                                            </label>
                                                        </div>
                                                        <div class="col-3 text-center">
                                                            <label class="form-label w-100 m-0"># Of Lines Per Page :
                                                            </label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="mark_container_line_per_page" type="text"
                                                                class="form-control mark_container_line_per_page" />
                                                        </div>
                                                        <div class="col-3 text-center">
                                                            <label class="form-label w-100 m-0"># Of Character Per Page :
                                                            </label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="mark_container_character_per_page" type="text"
                                                                class="form-control mark_container_character_per_page" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-2">
                                                            <label class="form-label w-100 m-0">Description :
                                                            </label>
                                                        </div>
                                                        <div class="col-3 text-center">
                                                            <label class="form-label w-100 m-0"># Of Lines Per Page :
                                                            </label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="description_line_per_page" type="text"
                                                                class="form-control description_line_per_page" />
                                                        </div>
                                                        <div class="col-3 text-center">
                                                            <label class="form-label w-100 m-0"># Of Character Per Page :
                                                            </label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="description_character_per_page" type="text"
                                                                class="form-control description_character_per_page" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-2">
                                                            <label class="form-label w-100 m-0">Packages :
                                                            </label>
                                                        </div>
                                                        <div class="col-3 text-center">
                                                            <label class="form-label w-100 m-0"># Of Lines Per Page :
                                                            </label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="packages_line_per_page" type="text"
                                                                class="form-control packages_line_per_page" />
                                                        </div>
                                                        <div class="col-3 text-center">
                                                            <label class="form-label w-100 m-0"># Of Character Per Page :
                                                            </label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="packages_character_per_page" type="text"
                                                                class="form-control packages_character_per_page" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-2">
                                                            <label class="form-label w-100 m-0">Container Data :
                                                            </label>
                                                        </div>
                                                        <div class="col-3 text-center">
                                                            <label class="form-label w-100 m-0"># Of Lines Per Page :
                                                            </label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="container_line_per_page" type="text"
                                                                class="form-control container_line_per_page" />
                                                        </div>
                                                        <div class="col-3 text-center">
                                                            <label class="form-label w-100 m-0"># Of Character Per Page :
                                                            </label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="container_character_per_page" type="text"
                                                                class="form-control container_character_per_page" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-2">
                                                            <label class="form-label w-100 m-0">Principal :</label>
                                                        </div>
                                                        <div class="col-10">
                                                            <input name="principal" type="text"
                                                                class="form-control principal" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-2">
                                                            <label class="form-label w-100 m-0">Templates :
                                                            </label>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" name="templates" id="templates">
                                                                <label class="form-check-label" for="templates">
                                                                    Available All Companies
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-5"></div>
                                                        <div class="col-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" name="fix_format" id="fix_format">
                                                                <label class="form-check-label" for="fix_format">
                                                                    Fix Format
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-2">
                                                            <label class="form-label w-100 m-0">Blank Page Path :</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input name="blank_page_path" type="text"
                                                                class="form-control blank_page_path" />
                                                        </div>
                                                        <div class="col-1 text-center">
                                                            <button class="btn btn-primary btn-sm" type="button">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-2">
                                                            <label class="form-label w-100 m-0">Pre Printed Path :</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input name="pre_printed_path" type="text"
                                                                class="form-control pre_printed_path" />
                                                        </div>
                                                        <div class="col-1 text-center">
                                                            <button class="btn btn-primary btn-sm" type="button">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" name="auto_generate_bl_no"
                                                                    id="auto_generate_bl_no">
                                                                <label class="form-check-label" for="auto_generate_bl_no">
                                                                    Auto Generate BL Number
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" name="edit_allowed" id="edit_allowed">
                                                                <label class="form-check-label" for="edit_allowed">
                                                                    Edit Allowed
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" name="default" id="default">
                                                                <label class="form-check-label" for="default">
                                                                    Default
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="">
                                                <div id="imageContainer">
                                                    <img id="uploadedImage"
                                                        src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png"
                                                        width="75%" class="mb-2">
                                                </div>

                                                <div class="main-image">
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="document.getElementById('uploadInput').click()">Upload</button>
                                                    <input type="file" hidden class="form-control" name="image"
                                                        id="uploadInput" accept="image/*" />
                                                    <button id="removeButton" type="button"
                                                        class="btn btn-danger btn-sm mx-3">Remove</button>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-primary mt-5">Download Tags</button>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="table-responsive pt-0">
                                                <table class="table table-bordered container_table">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th width="5%">...</th>
                                                            <th width="95%">Name</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="container" role="tabpanel" aria-labelledby="profile-tab">

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

                $("#myForm").attr("action", "{{ route('admin.bl_template.update') }}")
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

        document.getElementById('uploadInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();

            reader.onload = function(e) {
                const imageUrl = e.target.result;
                const imageElement = document.createElement('img');
                imageElement.src = imageUrl;
                $('#uploadedImage').attr('src', imageUrl)
            };

            reader.readAsDataURL(file);
        });

        document.getElementById('removeButton').addEventListener('click', function() {
            const imageContainer = document.getElementById('imageContainer');
            imageContainer.innerHTML =
                '<img id="uploadedImage" src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png" width="75%" class="mb-2" alt="Static Image">';
            document.getElementById('removeButton').style.display = 'none';
            document.getElementById('uploadInput').value = '';
        });
    </script>
@endpush
