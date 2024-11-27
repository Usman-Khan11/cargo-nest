@extends('admin.layouts.app')

@section('style')
    <style>
        .input_flex {
            display: flex !important;
            align-items: center;
        }

        .form-label {
            width: 55%;
            margin-right: 10px;
        }

        .input_flex .form-control {
            padding: 0rem 0.875rem !important;
        }
    </style>
@endsection


@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="jobFormReset('/admin/job/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/job/delete')">
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
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <form id="myForm" method="post" action="{{ route('admin.job.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card" style="background-color:#f4ffed;">
                        <div class="card-header">
                            <h4 class="fw-bold">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">

                            <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color:#f4ffed;">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bl"
                                        type="button" role="tab" aria-controls="bl" aria-selected="true">Booking
                                        Info</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#container" type="button" role="tab" aria-controls="container"
                                        aria-selected="false">Equipments</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#bl_detail" type="button" role="tab" aria-controls="bl_detail"
                                        aria-selected="false">Charges</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="four-tab" data-bs-toggle="tab"
                                        data-bs-target="#ref_no" type="button" role="tab" aria-controls="ref_no"
                                        aria-selected="false">Routing</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="five-tab" data-bs-toggle="tab"
                                        data-bs-target="#other_info" type="button" role="tab"
                                        aria-controls="other_info" aria-selected="false">Other Info</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent" style="background-color:#f4ffed;">
                                <input name="id" type="hidden" value="0" />

                                <div class="tab-pane fade show active" id="bl" role="tabpanel"
                                    aria-labelledby="home-tab">

                                    <div class="row">
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Job #</label>
                                                <input name="job_number" type="text" class="form-control job_number"
                                                    value="MSA-SEJ-{{ $job_no }}/{{ date('Y') }}" readonly />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Nature <span
                                                        class="text-danger">*</span></label>
                                                <select name="nature" class="form-select nature">
                                                    <option value="Parent">Parent</option>
                                                    <option value="Child">Child</option>
                                                    <option value="None" selected>None</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Job Date <span
                                                        class="text-danger">*</span></label>
                                                <input name="job_date" type="date" value="{{ date('Y-m-d') }}"
                                                    class="form-control jodate" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <input name="mty_move" class="form-check-input mty_move" value="MTY-Move"
                                                    type="checkbox" /><span>&nbsp;&nbsp;MTY Move</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Job Type</label>
                                                <select name="job_type" class="form-select job_type"
                                                    onchange="jobTypeToggle(this)">
                                                    <option value="direct">Direct</option>
                                                    <option value="coloaded">Coloaded</option>
                                                    <option value="coloaded">Cross Trade</option>
                                                    <option value="liner agency">Liner Agency</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Book Rep</label>
                                                <input name="book_rec" type="text" class="form-control book_rec"
                                                    placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Cost Center</label>
                                                <select name="cost_center" class="form-select cost_center">
                                                    <option value="head-office">Head Office</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Console ID</label>
                                                <input name="console_id" type="text" class="form-control console_id"
                                                    placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Job Kind <span
                                                        class="text-danger">*</span></label>
                                                <select name="job_kind" class="form-select job_kind">
                                                    <option value="Current">Current</option>
                                                    <option value="Opening">Opening</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Sub Type</label>
                                                <select name="sub_type" class="form-select sub_type">
                                                    <option></option>
                                                    <option value="LCL">LCL</option>
                                                    <option value="FCL" selected>FCL</option>
                                                    <option value="Car">Car</option>
                                                    <option value="Breakbulk">Breakbulk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">DG/Non-DG</label>
                                                <select name="dg_non" class="form-select dg_non">
                                                    <option value="DG">DG</option>
                                                    <option value="Non-DG" selected>Non-DG</option>
                                                    <option value="All">All</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2 input_flex">
                                                <input name="part_fcl" class="part_fcl form-check-input" value="Part-FCL"
                                                    type="checkbox" /><span>&nbsp;&nbsp;Part FCL</span>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Quotation</label>
                                                <input name="quotation" type="text" class="form-control quotation"
                                                    placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Job Status <span
                                                        class="text-danger">*</span></label>
                                                <select name="job_status" class="form-select job_status">
                                                    <option value="Opened" selected>Opened</option>
                                                    <option value="Closed">Closed</option>
                                                    <option value="Cancel">Cancel</option>
                                                    <option value="Merge">Merge</option>
                                                    <option value="Financial-Close">Financial Close</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Shipt Status <span
                                                        class="text-danger">*</span></label>
                                                <select name="shipt_status" class="form-select shipt_status">
                                                    <option selected disabled></option>
                                                    <option value="Shipped">Shipped</option>
                                                    <option value="Hold">Hold</option>
                                                    <option value="Delivered">Delivered</option>
                                                    <option value="Booked" selected>Booked</option>
                                                    <option value="Close">Close</option>
                                                    <option value="Confirmed">Confirmed</option>
                                                    <option value="Late-Running">Late Running</option>
                                                    <option value="Loaded">Loaded</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Shipt Date</label>
                                                <input name="shipt_date" type="date" class="form-control shipt_date"
                                                    placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Customer Ref</label>
                                                <input name="customer_reference" type="text"
                                                    class="form-control customer_reference" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Delivery</label>
                                                <select name="delivery" class="form-select delivery">
                                                    <option selected disabled></option>
                                                    <option value="Airport/Door">Airport / Door</option>
                                                    <option value="CFS/CFS">CFS / CFS</option>
                                                    <option value="CFS/CY">CFS / Cy</option>
                                                    <option value="CFS/DR">CFS / DR</option>
                                                    <option value="CY/CY" selected>CY / CY</option>
                                                    <option value="CY/DR">CY / DR</option>
                                                    <option value="CY/SD">CY / SD</option>
                                                    <option value="DOOR/DOOR">DOOR / DOOR</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Freight Type</label>
                                                <select name="foreign_type" class="form-select foreign_type">
                                                    <option value="Prepaid" selected>Prepaid</option>
                                                    <option value="Collect">Collect</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Nomination</label>
                                                <select name="nomination" class="form-select nomination">
                                                    <option value="Free-hand" selected>Free hand</option>
                                                    <option value="Nominated">Nominated</option>
                                                    <option value="B2B">B2B</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">File #</label>
                                                <input name="file_no" type="text" class="form-control file_no"
                                                    placeholder="" />
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Inco Terms</label>
                                                <select name="inco_term" class="form-select inco_term">
                                                    <option selected disabled></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Tax Distribution</label>
                                                <select name="tax_distribution" class="form-select tax_distribution">
                                                    <option value="option-2">Option 2</option>
                                                    <option value="option-3">Option 3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row" style="align-items:center;">
                                        <div class="col-md-4">
                                            <div class="py-3">
                                                <label>B/L Information: N/A</label><br>
                                                <label>Tariff Applied: N/A</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-primary btn-sm">Parent
                                                    Job</button><br>
                                                <button type="button" class="btn btn-primary btn-sm mx-2">Shipment
                                                    List</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="py-3">
                                                <label>Total Container# : N/A</label><br>
                                                <label>Parent Job#: N/A</label>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Client <span
                                                        class="text-danger">*</span></label>
                                                <select name="client" class="client">
                                                    <option selected disabled value="">Select</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Shipper</label>
                                                <select name="shipper" class="shipper">
                                                    <option selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Consignee</label>
                                                <select name="consignee" class="consignee">
                                                    <option selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Commodity</label>
                                                <select name="commodity" class="commodity">
                                                    <option selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Port of Loading <span
                                                        class="text-danger">*</span></label>
                                                <select name="port_of_loading" class="port_of_loading"></select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Port of Discharge <span
                                                        class="text-danger">*</span></label>
                                                <select name="port_of_discharge" class="port_of_discharge"></select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Final Destination</label>
                                                <select name="final_destination" class="final_destination"></select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Custom Clearance</label>
                                                <select name="custom_clearance" class="custom_clearance"></select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Transportation</label>
                                                <input name="transportation" type="text"
                                                    class="form-control transportation">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Forwarder/Coloader</label>
                                                <select name="forwarder_coloader" class="forwarder_coloader">
                                                    <option selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Sales Rep</label>
                                                <select name="sales_rep" class="sales_rep">
                                                    <option selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Sline/Carrier</label>
                                                <select name="sline_carrier" class="sline_carrier">
                                                    <option selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Local Vendor</label>
                                                <select name="local_vendor" class="local_vendor">
                                                    <option selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Overseas Agent</label>
                                                <select name="overseas_agent" class="overseas_agent">
                                                    <option selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Principal</label>
                                                <select name="principal" class="principal">
                                                    <option selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <hr>

                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div style="border:1px solid #ccc; padding:20px; background-color:#f4ffed;">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-2 input_flex">
                                                            <label class="form-label">Vessel</label>
                                                            <select name="vessel" class="vessel">
                                                                <option selected disabled>Select</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-2 input_flex">
                                                            <label class="form-label">Voyage</label>
                                                            <select name="voyage" class="voyage">
                                                                <option selected disabled>Select</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-2 input_flex">
                                                            <label class="form-label">C.B KG/ED</label>
                                                            <input name="ckg_ed" type="text"
                                                                class="form-control ckg_ed">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-2 input_flex">
                                                            <label class="form-label">ETD</label>
                                                            <input name="etd" type="text"
                                                                class="form-control etd">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-2 input_flex">
                                                            <label class="form-label">ETA</label>
                                                            <input name="eta" type="text"
                                                                class="form-control eta">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-2 input_flex">
                                                            <label class="form-label">Cut Off</label>
                                                            <input name="cut_off" type="text"
                                                                class="form-control cut_off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-2 input_flex mt-1">
                                                            <button type="button"
                                                                class="btn btn-primary btn-sm">Dates</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div style="border:1px solid #ccc; padding:20px; background-color:#f4ffed;">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-2 input_flex">
                                                            <label class="form-label">Weight</label>
                                                            <input name="weight" type="text"
                                                                class="form-control weight">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-2 input_flex">
                                                            <label class="form-label">B.KG Wt</label>
                                                            <input name="kg_weight" type="text"
                                                                class="form-control kg_weight">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-2 input_flex">
                                                            <label class="form-label">Container</label>
                                                            <input name="container" type="text"
                                                                class="form-control container">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-2 input_flex">
                                                            <label class="form-label">Shp Vol</label>
                                                            <input name="ship_volume" type="text"
                                                                class="form-control ship_volume">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-2 input_flex">
                                                            <label class="form-label">Teu</label>
                                                            <input name="teu" type="text"
                                                                class="form-control teu">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-2 input_flex">
                                                            <label class="form-label">Vol</label>
                                                            <input name="volume" type="text"
                                                                class="form-control volume">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-2 input_flex">
                                                            <label class="form-label">Pcs</label>
                                                            <input name="pieces" type="text"
                                                                class="form-control pieces">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row mt-3">
                                        <div class="col-md-12 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Tracking Notes:&nbsp;&nbsp;</label>
                                                <button type="button" class="btn btn-primary btn-sm">Add/Edit</button>
                                                <button type="button" class="btn btn-primary btn-sm">View Notes</button>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Notes</label>
                                                <textarea name="notes" class="form-control notes" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Manifest#: N/A&nbsp;&nbsp;</label><br>
                                                <button type="button"
                                                    class="btn btn-primary btn-sm allocate_btn">Allocate</button>
                                                <button type="button" class="btn btn-primary btn-sm de_allocate_btn">De
                                                    Allocate</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="mb-3">
                                                <button type="button" class="btn btn-primary btn-sm bl_btn">BL</button>
                                                <button type="button"
                                                    class="btn btn-primary btn-sm mx-3 cro_btn">CRO</button>
                                                <button type="button"
                                                    class="btn btn-primary btn-sm loading_program_btn">Loading
                                                    Program</button>
                                                <button type="button"
                                                    class="btn btn-primary btn-sm mx-3">Milestone</button>
                                                <button type="button" class="btn btn-primary btn-sm">Invoice</button>
                                                <button type="button" class="btn btn-primary btn-sm mx-3">Bill</button>
                                                <button type="button" class="btn btn-primary btn-sm">Crucial
                                                    Changes</button>
                                                <button type="button" class="btn btn-primary btn-sm mx-3">Agent
                                                    Invoice</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12 mb-2">
                                            <div class="mb-2">
                                                <button type="button" class="btn btn-primary btn-sm">Bulk Upload</button>
                                                <button type="button" class="btn btn-primary btn-sm mx-3">Export
                                                    Detention</button>
                                                <button type="button" class="btn btn-primary btn-sm">Letter
                                                    Generation</button>
                                                <button type="button"
                                                    class="btn btn-primary btn-sm mx-3">Letters</button>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div>
                                                <b>Created By:</b> <span id="created_by"></span>
                                                <br />
                                                <b>last Updated By:</b> <span id="last_updated_by"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div>
                                                <b>Approved By:</b> <span id="approved_by"></span>
                                                <br />
                                                <b>Approved At:</b> <span id="approved_at"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <button type="button" class="btn btn-primary btn-sm"
                                                onclick="approvalStatusChange('Approved')">Approved</button>
                                            <button type="button" class="btn btn-primary btn-sm"
                                                onclick="approvalStatusChange('Un-approved')">Un Approved</button>
                                            <div class="mb-2">
                                                <label class="form-label">Approval Status:</label>
                                                <select name="approval_status" id="status_check" onchange=""
                                                    class="form-select approval_status" disabled>
                                                    <option value="Draft">Draft</option>
                                                    <option value="Approved">Approved</option>
                                                    <option value="Un-approved">Un-approved</option>
                                                    <option value="Pending">Pending</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="container" role="tabpanel" aria-labelledby="profile-tab">

                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="mb-3">
                                                <label>B/L Information:&nbsp; N/A</label><br>
                                                <label>Tariff Applied:&nbsp; N/A</label>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label>Total Container: N/A</label><br>
                                                <label>Parent Job: N/A</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-datatable table-responsive pt-0">
                                        <table class="datatables-basic table" style="width:150%;">
                                            <thead>
                                                <tr>
                                                    <th>...</th>
                                                    <th>...</th>
                                                    <th>Size Type</th>
                                                    <th>Rate Group</th>
                                                    <th>Qty</th>
                                                    <th>Code</th>
                                                    <th>Name</th>
                                                    <th>DG/Non DG</th>
                                                    <th>Gross WT/CNT</th>
                                                    <th>TEU</th>
                                                </tr>
                                            </thead>
                                            <tbody class="detail_repeater">
                                                <tr>
                                                    <td><i onclick="delRow(this)"
                                                            class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                    <td><i onclick="addNewRow(this)"
                                                            class="fa fa-print fa-lg text-info"></i></td>
                                                    <td><select name="e_size_type[]" class="e_size_type"
                                                            style="width: 100%;">
                                                            <option selected disabled>Select Size</option>
                                                        </select></td>
                                                    <td><input type="text" name="e_rate_group[]"
                                                            class="form-control e_rate_group" style="width: 100%;" /></td>
                                                    <td><input type="text" name="e_qty[]" class="form-control e_qty"
                                                            style="width: 100%;" /></td>
                                                    <td><input type="text" name="e_code[]" class="form-control e_code"
                                                            style="width: 100%;" /></td>
                                                    <td><input type="text" name="e_name[]" class="form-control e_name"
                                                            style="width: 100%;" /></td>
                                                    <td><select name="e_dg_non_dg[]" class="form-select e_dg_non_dg"
                                                            style="width: 100%;">
                                                            <option value="Non-DG" selected>Non-DG</option>
                                                            <option value="DG">DG</option>
                                                            <option value="All">All</option>
                                                        </select></td>
                                                    <td><input type="text" name="e_gross_wt_cnt[]"
                                                            class="form-control e_gross_wt_cnt" style="width: 100%;" />
                                                    </td>
                                                    <td><input type="text" name="e_teu[]" class="form-control e_teu"
                                                            style="width: 100%;" /></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="bl_detail" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label>B/L Information:&nbsp; N/A</label><br>
                                                <label>Tariff Applied:&nbsp; N/A</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label>Terminal:&nbsp; N/A</label><br>
                                                <button type="button" class="btn btn-primary btn-sm">Pick
                                                    Charges(Pay)</button>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label>Total Container: N/A</label><br>
                                                <label>Parent Job: N/A</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label>Vessel: N/A</label><br>
                                                <label>Voyage: N/A</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="mb-3">
                                                        <input type="checkbox" name="quotation" class="quotation"
                                                            value="Quotation"
                                                            style="width:18px; height:18px;" /><span>&nbsp;Quotation</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <button type="button" class="btn btn-primary btn-sm">Pick Charges
                                                        Rate(Pay)</button>
                                                    <button type="button" class="btn btn-primary btn-sm">Multi
                                                        Delt</button>
                                                    <button type="button" class="btn btn-primary btn-sm">Auto Agent
                                                        Invoice(s)</button>
                                                    <button type="button" class="btn btn-primary btn-sm">Auto
                                                        Invoice(s)</button>
                                                    <button type="button" class="btn btn-primary btn-sm">Auto
                                                        Bill(s)</button>
                                                    <button type="button" class="btn btn-primary btn-sm">Charges
                                                        Tariff</button>
                                                    <button type="button" class="btn btn-primary btn-sm">Auto</button>
                                                    <button type="button" class="btn btn-primary btn-sm">Bill</button>
                                                    <button type="button" class="btn btn-primary btn-sm">Agent
                                                        Invoice</button>
                                                    <button type="button" class="btn btn-primary btn-sm">Direct Job
                                                        Exp/Rev</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <ul class="nav nav-tabs" id="myTabs" role="tablist"
                                            style="background-color:#f4ffed;">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                    data-bs-target="#home" type="button" role="tab"
                                                    aria-controls="home" aria-selected="true">Receivable</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                                    data-bs-target="#profile" type="button" role="tab"
                                                    aria-controls="profile" aria-selected="false">Payable</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                                    data-bs-target="#contact" type="button" role="tab"
                                                    aria-controls="contact" aria-selected="false">Summary</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="principal-tab" data-bs-toggle="tab"
                                                    data-bs-target="#principal" type="button" role="tab"
                                                    aria-controls="principal" aria-selected="false">Principal</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent" style="background-color:#f4ffed;">

                                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="mb-4">
                                                    <h5 class="text-center">Charges Information</h5>
                                                    <div class="card-datatable table-responsive pt-0">
                                                        <table class="datatables-basic table" style="width:450%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>...</th>
                                                                    <th>...</th>
                                                                    <th><input type="checkbox" class="form-check-input" />
                                                                    </th>
                                                                    <th>S.No</th>
                                                                    <th>Bill#/Invoice</th>
                                                                    <th>Chrg</th>
                                                                    <th>Particular</th>
                                                                    <th>Description</th>
                                                                    <th>Type</th>
                                                                    <th>Basis</th>
                                                                    <th>PP/CC</th>
                                                                    <th>Collect By</th>
                                                                    <th>Size Type</th>
                                                                    <th>Rate Group</th>
                                                                    <th>DG/Non DG</th>
                                                                    <th>Shared</th>
                                                                    <th>Code</th>
                                                                    <th>Name</th>
                                                                    <th>Manual</th>
                                                                    <th>City</th>
                                                                    <th>Rate</th>
                                                                    <th>Currency</th>
                                                                    <th>Margin</th>
                                                                    <th>Amount</th>
                                                                    <th>Discount</th>
                                                                    <th>Tax Apply</th>
                                                                    <th>Tax Rev</th>
                                                                    <th>Tax Amount(LC)</th>
                                                                    <th>Net Amount</th>
                                                                    <th>Ex Rate</th>
                                                                    <th>Local Amount</th>
                                                                    <th>Code</th>
                                                                    <th>Name</th>
                                                                    <th>Manifest Remarks</th>
                                                                    <th>Tariff Code</th>
                                                                    <th>Approved</th>
                                                                    <th>Approved By</th>
                                                                    <th>Approved Date</th>
                                                                    <th>Approval Log</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="receivable_charges_repeater">
                                                                <tr>
                                                                    <td><i onclick="delNewReceivableChargesRepeaterRow(this)"
                                                                            class="fa fa-circle-xmark fa-lg text-danger"></i>
                                                                    </td>
                                                                    <td><i onclick="addNewReceivableChargesRepeaterRow(this)"
                                                                            class="fa fa-clone fa-lg text-info"></i></td>
                                                                    <td><input name="" type="checkbox"
                                                                            class="form-check-input" /></td>
                                                                    <td><input name="cr_s.no" class="form-control"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="cr_bill_invoice[]"
                                                                            class="form-control cr_bill_invoice"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td>
                                                                        <select class="form-select cr_chrg"
                                                                            onchange="getChargesCurrency(this)"
                                                                            style="width: 100%;" name="cr_chrg[]">
                                                                            <option selected disabled value="">Select
                                                                                Charges</option>
                                                                        </select>
                                                                    </td>
                                                                    <td><input name="cr_particular[]"
                                                                            class="form-control cr_particular"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="cr_description[]"
                                                                            class="form-control cr_description"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td>
                                                                        <select name="crp_type[]"
                                                                            class="form-select crp_type"
                                                                            style="width: 100%;">
                                                                            <option></option>
                                                                            <option value="Unit">Unit</option>
                                                                            <option value="Ship">Ship</option>
                                                                        </select>
                                                                    </td>
                                                                    <td><input name="crp_basis[]"
                                                                            class="form-control crp_basis" type="text"
                                                                            style="width: 100%;" /></td>
                                                                    <td><input name="crp_pp_cc[]"
                                                                            class="form-control crp_pp_cc" type="text"
                                                                            style="width: 100%;" /></td>
                                                                    <td><input name="crp_collect_by[]"
                                                                            class="form-control crp_collect_by"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td width="4%">
                                                                        <select name="crp_size_type[]"
                                                                            class="form-select crp_size_type"
                                                                            style="width: 100%;">
                                                                            <option value="0" selected disabled>Select
                                                                            </option>
                                                                        </select>
                                                                    </td>
                                                                    <td><input name="crp_rate_group[]"
                                                                            class="form-control crp_rate_group"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td>
                                                                        <select name="crp_dg_non_dg[]"
                                                                            class="form-select crp_dg_non_dg"
                                                                            style="width: 100%;">
                                                                            <option value="Non-DG" selected>Non-DG</option>
                                                                            <option value="DG">DG</option>
                                                                            <option value="All">All</option>
                                                                        </select>
                                                                    </td>
                                                                    <td><input name="crp_shared[]"
                                                                            class="form-check-input crp_shared"
                                                                            value="shared" type="checkbox" /></td>
                                                                    <td><input name="crp_code[]"
                                                                            class="form-control crp_code" type="text"
                                                                            style="width: 100%;" /></td>
                                                                    <td><input name="crp_name_1[]"
                                                                            class="form-control crp_name_1" type="text"
                                                                            style="width: 100%;" /></td>
                                                                    <td><input name="crp_manual[]"
                                                                            class="form-check-input crp_manual"
                                                                            value="manual" type="checkbox" /></td>
                                                                    <td><input name="crp_city[]"
                                                                            class="form-control crp_city" type="text"
                                                                            style="width: 100%;" /></td>
                                                                    <td><input name="crp_rate[]"
                                                                            class="form-control crp_rate" type="text"
                                                                            style="width: 100%;" /></td>
                                                                    <td>
                                                                        <select name="crp_currency[]"
                                                                            class="form-select crp_currency"
                                                                            style="width: 100%;">
                                                                            <option>Select</option>
                                                                        </select>
                                                                    </td>
                                                                    <td><input name="crp_margin[]"
                                                                            class="form-control crp_margin" type="text"
                                                                            style="width: 100%;" /></td>
                                                                    <td><input name="crp_amount[]"
                                                                            class="form-control crp_amount" type="text"
                                                                            style="width: 100%;" /></td>
                                                                    <td><input name="crp_discount[]"
                                                                            class="form-control crp_discount"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="crp_tax_apple[]"
                                                                            class="form-check-input crp_tax_apple"
                                                                            value="tax_apply" type="checkbox" /></td>
                                                                    <td><input name="crp_tax_rev[]"
                                                                            class="form-control crp_tax_rev"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="crp_tax_amount_lc[]"
                                                                            class="form-control crp_tax_amount_lc"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="crp_net_amount[]"
                                                                            class="form-control crp_net_amount"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="crp_ex_rate[]"
                                                                            class="form-control crp_ex_rate"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="crp_local_amount[]"
                                                                            class="form-control crp_local_amount"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="crp_code_2[]"
                                                                            class="form-control crp_code_2" type="text"
                                                                            style="width: 100%;" /></td>
                                                                    <td><input name="crp_name_2[]"
                                                                            class="form-control crp_name_2" type="text"
                                                                            style="width: 100%;" /></td>
                                                                    <td><input name="crp_manifest_remarks[]"
                                                                            class="form-control crp_manifest_remarks"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="crp_tariff_code[]"
                                                                            class="form-control crp_tariff_code"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="crp_approved[]"
                                                                            class="form-control crp_approved"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="crp_approved_by[]"
                                                                            class="form-control crp_approved_by"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="crp_approved_date[]"
                                                                            class="form-control crp_approved_date"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="crp_approved_log[]"
                                                                            class="form-control crp_approved_log"
                                                                            type="text" style="width: 100%;" /></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="profile" role="tabpanel"
                                                aria-labelledby="profile-tab">
                                                <div class="mb-4">
                                                    <h5 class="text-center">Charges Information</h5>
                                                    <div class="card-datatable table-responsive pt-0">
                                                        <table class="datatables-basic table" style="width:450%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>...</th>
                                                                    <th>...</th>
                                                                    <th><input type="checkbox" class="form-check-input" />
                                                                    </th>
                                                                    <th>S.No</th>
                                                                    <th>Bill#/Invoice</th>
                                                                    <th>Chrg</th>
                                                                    <th>Particular</th>
                                                                    <th>Description</th>
                                                                    <th>Type</th>
                                                                    <th>Basis</th>
                                                                    <th>PP/CC</th>
                                                                    <th>Collect By</th>
                                                                    <th>Size Type</th>
                                                                    <th>Rate Group</th>
                                                                    <th>DG/Non DG</th>
                                                                    <th>Shared</th>
                                                                    <th>Code</th>
                                                                    <th>Name</th>
                                                                    <th>Manual</th>
                                                                    <th>City</th>
                                                                    <th>Rate</th>
                                                                    <th>Currency</th>
                                                                    <th>Margin</th>
                                                                    <th>Amount</th>
                                                                    <th>Discount</th>
                                                                    <th>Tax Apply</th>
                                                                    <th>Tax Rev</th>
                                                                    <th>Tax Amount(LC)</th>
                                                                    <th>Net Amount</th>
                                                                    <th>Ex Rate</th>
                                                                    <th>Local Amount</th>
                                                                    <th>Rotate</th>
                                                                    <th>Code</th>
                                                                    <th>Name</th>
                                                                    <th>Manifest Remarks</th>
                                                                    <th>Tariff Code</th>
                                                                    <th>Approved</th>
                                                                    <th>Approved By</th>
                                                                    <th>Approved Date</th>
                                                                    <th>Approval Log</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="payable_charges_repeater">
                                                                <tr>
                                                                    <td><i onclick="delNewPayableChargesRepeaterRow(this)"
                                                                            class="fa fa-circle-xmark fa-lg text-danger"></i>
                                                                    </td>
                                                                    <td><i onclick="addNewPayableChargesRepeaterRow(this)"
                                                                            class="fa fa-clone fa-lg text-info"></i></td>
                                                                    <td><input type="checkbox" class="form-check-input" />
                                                                    </td>
                                                                    <td><input name="cp_s_no[]"
                                                                            class="form-control cp_s_no" type="text"
                                                                            style="width: 100%;" /></td>
                                                                    <td><input name="cp_bill_invoice[]"
                                                                            class="form-control cp_bill_invoice"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td>
                                                                        <select class="form-select cp_chrg"
                                                                            onchange="getChargesCurrency(this)"
                                                                            style="width: 100%;" name="cp_chrg[]">
                                                                            <option selected disabled value="">Select
                                                                                Charges</option>
                                                                        </select>
                                                                    </td>
                                                                    <td><input name="cp_particular[]"
                                                                            class="form-control cp_particular"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="cp_description[]"
                                                                            class="form-control cp_description"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td>
                                                                        <select name="cpp_type[]"
                                                                            class="form-select cpp_type"
                                                                            style="width: 100%;">
                                                                            <option></option>
                                                                            <option value="Unit">Unit</option>
                                                                            <option value="Ship">Ship</option>
                                                                        </select>
                                                                    </td>
                                                                    <td><input name="cpp_basis[]"
                                                                            class="form-control cpp_basis" type="text"
                                                                            style="width: 100%;" /></td>
                                                                    <td><input name="cpp_pp_cc[]"
                                                                            class="form-control cpp_pp_cc" type="text"
                                                                            style="width: 100%;" /></td>
                                                                    <td><input name="cpp_collect_by[]"
                                                                            class="form-control cpp_collect_by"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td width="4%">
                                                                        <select name="cpp_size_type[]"
                                                                            class="form-select cpp_size_type"
                                                                            style="width: 100%;">
                                                                            <option value="0" selected disabled>Select
                                                                            </option>
                                                                        </select>
                                                                    </td>
                                                                    <td><input name="cpp_rate_group[]"
                                                                            class="form-control cpp_rate_group"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td>
                                                                        <select name="cpp_dg_non_dg[]"
                                                                            class="form-select cpp_dg_non_dg"
                                                                            style="width: 100%;">
                                                                            <option value="Non-DG" selected>Non-DG</option>
                                                                            <option value="DG">DG</option>
                                                                            <option value="All">All</option>
                                                                        </select>
                                                                    </td>
                                                                    <td><input name="cpp_shared[]"
                                                                            class="form-check-input cpp_shared"
                                                                            value="shared" type="checkbox" /></td>
                                                                    <td><input name="cpp_code_1[]"
                                                                            class="form-control cpp_code_1" type="text"
                                                                            style="width: 100%;" /></td>
                                                                    <td><input name="cpp_name_1[]"
                                                                            class="form-control cpp_name_1" type="text"
                                                                            style="width: 100%;" /></td>
                                                                    <td><input name="cpp_manual[]"
                                                                            class="form-check-input cpp_manual"
                                                                            value="manual" type="checkbox" /></td>
                                                                    <td><input name="cpp_city[]"
                                                                            class="form-control cpp_city" type="text"
                                                                            style="width: 100%;" /></td>
                                                                    <td><input name="cpp_rate[]"
                                                                            class="form-control cpp_rate" type="text"
                                                                            style="width: 100%;" /></td>
                                                                    <td>
                                                                        <select name="cpp_currency[]"
                                                                            class="form-select cpp_currency"
                                                                            style="width: 100%;">
                                                                            <option>Select</option>
                                                                        </select>
                                                                    </td>
                                                                    <td><input name="cpp_margin[]"
                                                                            class="form-control cpp_margin" type="text"
                                                                            style="width: 100%;" /></td>
                                                                    <td><input name="cpp_amount[]"
                                                                            class="form-control cpp_amount" type="text"
                                                                            style="width: 100%;" /></td>
                                                                    <td><input name="cpp_discount[]"
                                                                            class="form-control cpp_discount"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="cpp_tax_apply[]"
                                                                            class="form-check-input cpp_tax_apply"
                                                                            value="tax_apply" type="checkbox" /></td>
                                                                    <td><input name="cpp_tax_rev[]"
                                                                            class="form-control cpp_tax_rev"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="cpp_tax_amount_lc[]"
                                                                            class="form-control cpp_tax_amount_lc"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="cpp_net_amount[]"
                                                                            class="form-control cpp_net_amount"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="cpp_ex_rate[]"
                                                                            class="form-control cpp_ex_rate"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="cpp_local_amount[]"
                                                                            class="form-control cpp_local_amount"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="cpp_rotate[]"
                                                                            class="form-check-input cpp_rotate"
                                                                            value="rotate" type="checkbox" /></td>
                                                                    <td><input name="cpp_code_2[]"
                                                                            class="form-control cpp_code_2"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="cpp_name_2[]"
                                                                            class="form-control cpp_name_2"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="cpp_manifest_remarks[]"
                                                                            class="form-control cpp_manifest_remarks"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="cpp_tariff_code[]"
                                                                            class="form-control cpp_tariff_code"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="cpp_approved[]"
                                                                            class="form-control cpp_approved"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="cpp_approved_by[]"
                                                                            class="form-control cpp_approved_by"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="cpp_approved_date[]"
                                                                            class="form-control cpp_approved_date"
                                                                            type="text" style="width: 100%;" /></td>
                                                                    <td><input name="cpp_approved_log[]"
                                                                            class="form-control cpp_approved_log"
                                                                            type="text" style="width: 100%;" /></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="contact" role="tabpanel"
                                                aria-labelledby="contact-tab">
                                                <div class="card-datatable table-responsive pt-0">
                                                    <table class="datatables-basic table" style="width:200%;">
                                                        <thead>
                                                            <tr>
                                                                <th>...</th>
                                                                <th>...</th>
                                                                <th>S.NO</th>
                                                                <th>Code</th>
                                                                <th>Charges</th>
                                                                <th>Realize Revenue</th>
                                                                <th>Unrealize Revenue</th>
                                                                <th>Total Revenue</th>
                                                                <th>Realize Cost</th>
                                                                <th>Unrealize Cost</th>
                                                                <th>Total Cost</th>
                                                                <th>Realize Net</th>
                                                                <th>Unrealize Net</th>
                                                                <th>Total Net</th>
                                                                <th>Detail</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="summary_charges_repeater">
                                                            <tr>
                                                                <td><i onclick="delNewSummaryChargesRepeaterRow(this)"
                                                                        class="fa fa-circle-xmark fa-lg text-danger"></i>
                                                                </td>
                                                                <td><i onclick="addNewSummaryChargesRepeaterRow(this)"
                                                                        class="fa fa-clone fa-lg text-info"></i></td>
                                                                <td><input name="cs_s_no[]" class="form-control cs_s_no"
                                                                        type="text" style="width: 100%;" /></td>
                                                                <td><input name="cs_code[]" class="form-control cs_code"
                                                                        type="text" style="width: 100%;" /></td>
                                                                <td>
                                                                    <select class="form-select cs_charges"
                                                                        style="width: 100%;" name="cs_charges[]">
                                                                        <option selected disabled value="">Select
                                                                            Charges</option>
                                                                    </select>
                                                                </td>
                                                                <td><input name="cs_realize_revenue_1[]"
                                                                        class="form-control cs_realize_revenue_1"
                                                                        type="text" style="width: 100%;" /></td>
                                                                <td><input name="cs_unrealize_revenue_1[]"
                                                                        class="form-control cs_unrealize_revenue_1"
                                                                        type="text" style="width: 100%;" /></td>
                                                                <td><input name="cs_total_revenue[]"
                                                                        class="form-control cs_total_revenue"
                                                                        type="text" style="width: 100%;" /></td>
                                                                <td><input name="cs_realize_revenue_2[]"
                                                                        class="form-control cs_realize_revenue_2"
                                                                        type="text" style="width: 100%;" /></td>
                                                                <td><input name="cs_unrealize_revenue_2[]"
                                                                        class="form-control cs_unrealize_revenue_2"
                                                                        type="text" style="width: 100%;" /></td>
                                                                <td><input name="cs_total_cost[]"
                                                                        class="form-control cs_total_cost"
                                                                        type="text" style="width: 100%;" /></td>
                                                                <td><input name="cs_realize_net_3[]"
                                                                        class="form-control cs_realize_net_3"
                                                                        type="text" style="width: 100%;" /></td>
                                                                <td><input name="cs_unrealize_net_3[]"
                                                                        class="form-control cs_unrealize_net_3"
                                                                        type="text" style="width: 100%;" /></td>
                                                                <td><input name="cs_total_net[]"
                                                                        class="form-control cs_total_net" type="text"
                                                                        style="width: 100%;" /></td>
                                                                <td><input name="cs_detail[]"
                                                                        class="form-control cs_detail" type="text"
                                                                        style="width: 100%;" /></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="principal" role="tabpanel"
                                                aria-labelledby="principal-tab">
                                                <h5 class="text-center">Charges/Principle Information</h5>
                                                <div class="card-datatable table-responsive pt-0">
                                                    <table class="datatables-basic table" style="width:300%;">
                                                        <thead>
                                                            <tr>
                                                                <th>...</th>
                                                                <th>...</th>
                                                                <th>S.NO</th>
                                                                <th>Principal</th>
                                                                <th>Chrg</th>
                                                                <th>Name</th>
                                                                <th>Description</th>
                                                                <th>Charges Type</th>
                                                                <th>Rec/Pay Type</th>
                                                                <th>Code</th>
                                                                <th>Name</th>
                                                                <th>Size Type</th>
                                                                <th>Rate Group</th>
                                                                <th>DG/Non DG</th>
                                                                <th>Manual</th>
                                                                <th>Qty</th>
                                                                <th>Rate</th>
                                                                <th>Currency</th>
                                                                <th>Amount</th>
                                                                <th>Discount</th>
                                                                <th>Net Amount</th>
                                                                <th>Manual Ex.Rate</th>
                                                                <th>Ex.Rate</th>
                                                                <th>Local Amount</th>
                                                                <th>Tariff Code</th>
                                                                <th>Approved</th>
                                                                <th>Approved By</th>
                                                                <th>Approved Date</th>
                                                                <th>Approval Log</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="principal_charges_repeater">
                                                            <tr>
                                                                <td><i onclick="delNewPrincipalChargesRepeaterRow(this)"
                                                                        class="fa fa-circle-xmark fa-lg text-danger"></i>
                                                                </td>
                                                                <td><i onclick="addNewPrincipalChargesRepeaterRow(this)"
                                                                        class="fa fa-clone fa-lg text-info"></i></td>
                                                                <td><input name="cpc_s_no[]"
                                                                        class="form-control cpc_s_no" type="text"
                                                                        style="width: 100%;" /></td>
                                                                <td><input name="cpc_principal[]"
                                                                        class="form-control cpc_principal"
                                                                        type="text" style="width: 100%;" /></td>
                                                                <td>
                                                                    <select class="form-select cpc_chrg"
                                                                        style="width: 100%;" name="cpc_chrg[]">
                                                                        <option selected disabled value="">Select
                                                                            Charges</option>
                                                                    </select>
                                                                </td>
                                                                <td><input name="cpc_name_1[]"
                                                                        class="form-control cpc_name_1" type="text"
                                                                        style="width: 100%;" /></td>
                                                                <td><input name="cpc_description[]"
                                                                        class="form-control cpc_description"
                                                                        type="text" style="width: 100%;" /></td>
                                                                <td>
                                                                    <select name="cpc_charges_type[]"
                                                                        class="form-select cpc_charges_type"
                                                                        style="width: 100%;">
                                                                        <option></option>
                                                                        <option value="Unit">Unit</option>
                                                                        <option value="Ship">Ship</option>
                                                                    </select>
                                                                </td>
                                                                <td><input name="cpc_rec_pay_type[]"
                                                                        class="form-control cpc_rec_pay_type"
                                                                        type="text" style="width: 100%;" /></td>
                                                                <td><input name="cpc_code[]"
                                                                        class="form-control cpc_code" type="text"
                                                                        style="width: 100%;" /></td>
                                                                <td><input name="cpc_name_2[]"
                                                                        class="form-control cpc_name_2" type="text"
                                                                        style="width: 100%;" /></td>
                                                                <td width="4%">
                                                                    <select name="cpc_size_type[]"
                                                                        class="form-select cpc_size_type"
                                                                        style="width: 100%;">
                                                                        <option value="0" selected disabled>Select
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td><input name="cpc_rate_group[]"
                                                                        class="form-control cpc_rate_group"
                                                                        type="text" style="width: 100%;" /></td>
                                                                <td>
                                                                    <select name="cpc_dg_non_dg[]"
                                                                        class="form-select cpc_dg_non_dg"
                                                                        style="width: 100%;">
                                                                        <option value="Non-DG" selected>Non-DG</option>
                                                                        <option value="DG">DG</option>
                                                                        <option value="All">All</option>
                                                                    </select>
                                                                </td>
                                                                <td><input name="cpc_manual[]"
                                                                        class="form-control cpc_manual" type="checkbox"
                                                                        style="width: 16px; height: 16px;" /></td>
                                                                <td><input name="cpc_qty[]" class="form-control cpc_qty"
                                                                        type="text" style="width: 100%;" /></td>
                                                                <td><input name="cpc_rate[]"
                                                                        class="form-control cpc_rate" type="text"
                                                                        style="width: 100%;" /></td>
                                                                <td>
                                                                    <select name="cpc_currency[]"
                                                                        class="form-select cpc_currency"
                                                                        style="width: 100%;">
                                                                        <option>Select</option>
                                                                    </select>
                                                                </td>
                                                                <td><input name="cpc_amount[]"
                                                                        class="form-control cpc_amount" type="text"
                                                                        style="width: 100%;" /></td>
                                                                <td><input name="cpc_discount[]"
                                                                        class="form-control cpc_discount" type="text"
                                                                        style="width: 100%;" /></td>
                                                                <td><input name="cpc_net_amount[]"
                                                                        class="form-control cpc_net_amount"
                                                                        type="text" style="width: 100%;" /></td>
                                                                <td><input name="cpc_manual_ex_rate[]"
                                                                        class="form-control cpc_manual_ex_rate"
                                                                        value="manual" type="checkbox"
                                                                        style="width: 100%;" /></td>
                                                                <td><input name="cpc_ex_rate[]"
                                                                        class="form-control cpc_ex_rate" type="text"
                                                                        style="width: 100%;" /></td>
                                                                <td><input name="cpc_local_amount[]"
                                                                        class="form-control cpc_local_amount"
                                                                        type="text" style="width: 100%;" /></td>
                                                                <td><input name="cpc_tariff_code[]"
                                                                        class="form-control cpc_tariff_code"
                                                                        type="text" style="width: 100%;" /></td>
                                                                <td><input name="cpc_approved[]"
                                                                        class="form-control cpc_approved" type="text"
                                                                        style="width: 100%;" /></td>
                                                                <td><input name="cpc_approved_by[]"
                                                                        class="form-control cpc_approved_by"
                                                                        type="text" style="width: 100%;" /></td>
                                                                <td><input name="cpc_approved_date[]"
                                                                        class="form-control cpc_approved_date"
                                                                        type="text" style="width: 100%;" /></td>
                                                                <td><input name="cpc_approval_log[]"
                                                                        class="form-control cpc_approval_log"
                                                                        type="text" style="width: 100%;" /></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>

                                    </div>



                                </div>

                                <div class="tab-pane fade" id="ref_no" role="tabpanel"
                                    aria-labelledby="four-tab">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Service Type</label>
                                                <!--<input name="r_service_type" type="text" class="r_service_type form-control">-->
                                                <select name="r_service_type" class="form-select r_service_type">
                                                    <option selected disabled>Select</option>
                                                    <option value="A">A</option>
                                                    <option value="B">b</option>
                                                    <option value="C">c</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Place of Receipt</label>
                                                <select name="r_place_of_receipt" class="r_place_of_receipt">
                                                    <option selected disabled></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Date</label>
                                                <input name="r_date_1" type="date" class="r_date_1 form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Port of Loading <span
                                                        class="text-danger">*</span></label>
                                                <select name="r_port_of_loading" class="r_port_of_loading"></select>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Date</label>
                                                <input name="r_date_2" type="date" class="r_date_2 form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Port of Discharge <span
                                                        class="text-danger">*</span></label>
                                                <select name="r_port_of_discharge" class="r_port_of_discharge"></select>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Date</label>
                                                <input name="r_date_3" type="date" class="r_date_3 form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Final Destination <span
                                                        class="text-danger">*</span></label>
                                                <select name="r_final_destination" class="r_final_destination"></select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Freight Payable Date</label>
                                                <input name="r_freight_payable_date" type="text"
                                                    class="r_freight_payable_date form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">CFS/Depot Facility</label>
                                                <input name="r_cfs_depot_facility" type="text"
                                                    class="r_cfs_depot_facility form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Terminal</label>
                                                <select name="r_terminal" class="r_terminal"></select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Via Port</label>
                                                <input name="r_via_port" type="text"
                                                    class="r_via_port form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Feeder Vessel</label>
                                                <input name="r_feeder_vessel" type="text"
                                                    class="r_feeder_vessel form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Voyage Transhipment</label>
                                                <input name="r_voyage_transhipment" type="text"
                                                    class="r_voyage_transhipment form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex  mt-1">
                                                <button type="button" class="btn btn-primary btn-sm">Show
                                                    Transhipment</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="tab-pane fade" id="other_info" role="tabpanel"
                                    aria-labelledby="contact-tab">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="mb-3 input_flex">
                                                <label class="form-label">Agree Rate</label>
                                                <input name="o_agree_rate" type="text"
                                                    class="form-control o_agree_rate">
                                            </div>
                                            <div class="mb-2 input_flex">
                                                <input type="checkbox" name="o_transhipment_cargo"
                                                    class="form-check-input o_transhipment_cargo" /><span>&nbsp;&nbsp;Transhipment
                                                    Cargo</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Any Other Information</label>
                                                <textarea name="o_any_other_information" class="form-control o_any_other_information" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Remarks</label>
                                                <textarea name="o_remarks" class="form-control o_remarks" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Cargo Manifest Remarks</label>
                                                <textarea name="o_cargo_manifest_remarks" class="form-control o_cargo_manifest_remarks" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-3 input_flex">
                                                <label class="form-label">Document Type</label>
                                                <select name="o_document_type" class="form-select o_document_type">
                                                    <option></option>
                                                </select>
                                            </div>
                                            <div class="mb-2 input_flex">
                                                <button type="button" class="btn btn-primary btn-sm">Update Document
                                                    Type</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Buyer</label>
                                                <input name="o_buyer" type="text" class="form-control o_buyer">
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Buying House</label>
                                                <input name="o_buying_house" type="text"
                                                    class="form-control o_buying_house">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Remarks</label>
                                                <textarea name="o_remarks_2" class="form-control o_remarks_2" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">No of Original B/L</label>
                                                <input name="o_no_of_original_bl" type="number"
                                                    class="form-control o_no_of_original_bl">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Destination Charges</label>
                                                <select name="o_destination_charges"
                                                    class="form-select o_destination_charges">
                                                    <option value="None">None</option>
                                                    <option value="DDC-Prepaid">DDC Prepaid</option>
                                                    <option value="DDC-Collect">DDC Collect</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Cargo Pickup</label>
                                                <input name="o_cargo_pickup" type="text"
                                                    class="form-control o_cargo_pickup">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Date</label>
                                                <input name="o_pickup_date" type="date"
                                                    class="form-control o_pickup_date">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Time</label>
                                                <select name="o_time" class="form-select o_time">
                                                    <option></option>
                                                    <option value="06:00">06:00 AM</option>
                                                    <option value="06:30">06:30 AM</option>
                                                    <option value="07:00">07:00 AM</option>
                                                    <option value="07:30">07:30 AM</option>
                                                    <option value="08:00">08:00 AM</option>
                                                    <option value="08:30">08:30 AM</option>
                                                    <option value="09:00">09:00 AM</option>
                                                    <option value="09:30">09:30 AM</option>
                                                    <option value="10:00">10:00 AM</option>
                                                    <option value="10:30">10:30 AM</option>
                                                    <option value="11:00">11:00 AM</option>
                                                    <option value="11:30">11:30 AM</option>
                                                    <option value="12:00">12:00 PM</option>
                                                    <option value="12:30">12:30 PM</option>
                                                    <option value="13:00">01:00 PM</option>
                                                    <option value="13:30">01:30 PM</option>
                                                    <option value="14:00">02:00 PM</option>
                                                    <option value="14:30">02:30 PM</option>
                                                    <option value="15:00">03:00 PM</option>
                                                    <option value="15:30">03:30 PM</option>
                                                    <option value="16:00">04:00 PM</option>
                                                    <option value="16:30">04:30 PM</option>
                                                    <option value="17:00">05:00 PM</option>
                                                    <option value="17:30">05:30 PM</option>
                                                    <option value="18:00">06:00 PM</option>
                                                    <option value="18:30">06:30 PM</option>
                                                    <option value="19:00">07:00 PM</option>
                                                    <option value="19:30">07:30 PM</option>
                                                    <option value="20:00">08:00 PM</option>
                                                    <option value="20:30">08:30 PM</option>
                                                    <option value="21:00">09:00 PM</option>
                                                    <option value="21:30">09:30 PM</option>
                                                    <option value="22:00">10:00 PM</option>
                                                    <option value="22:30">10:30 PM</option>
                                                    <option value="23:00">11:00 PM</option>
                                                    <option value="23:30">11:30 PM</option>
                                                    <option value="00:00">12:00 AM</option>
                                                    <option value="00:30">12:30 AM</option>
                                                    <option value="01:00">01:00 AM</option>
                                                    <option value="01:30">01:30 AM</option>
                                                    <option value="02:00">02:00 AM</option>
                                                    <option value="02:30">02:30 AM</option>
                                                    <option value="03:00">03:00 AM</option>
                                                    <option value="03:30">03:30 AM</option>
                                                    <option value="04:00">04:00 AM</option>
                                                    <option value="04:30">04:30 AM</option>
                                                    <option value="05:00">05:00 AM</option>
                                                    <option value="05:30">05:30 AM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Cargo Drop Off</label>
                                                <input name="o_cargo_drop_off" type="text"
                                                    class="form-control o_cargo_drop_off">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Date</label>
                                                <input name="o_drop_date" type="date"
                                                    class="form-control o_drop_date">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Time</label>
                                                <select name="o_time_2" class="form-select o_time_2">
                                                    <option></option>
                                                    <option value="06:00">06:00 AM</option>
                                                    <option value="06:30">06:30 AM</option>
                                                    <option value="07:00">07:00 AM</option>
                                                    <option value="07:30">07:30 AM</option>
                                                    <option value="08:00">08:00 AM</option>
                                                    <option value="08:30">08:30 AM</option>
                                                    <option value="09:00">09:00 AM</option>
                                                    <option value="09:30">09:30 AM</option>
                                                    <option value="10:00">10:00 AM</option>
                                                    <option value="10:30">10:30 AM</option>
                                                    <option value="11:00">11:00 AM</option>
                                                    <option value="11:30">11:30 AM</option>
                                                    <option value="12:00">12:00 PM</option>
                                                    <option value="12:30">12:30 PM</option>
                                                    <option value="13:00">01:00 PM</option>
                                                    <option value="13:30">01:30 PM</option>
                                                    <option value="14:00">02:00 PM</option>
                                                    <option value="14:30">02:30 PM</option>
                                                    <option value="15:00">03:00 PM</option>
                                                    <option value="15:30">03:30 PM</option>
                                                    <option value="16:00">04:00 PM</option>
                                                    <option value="16:30">04:30 PM</option>
                                                    <option value="17:00">05:00 PM</option>
                                                    <option value="17:30">05:30 PM</option>
                                                    <option value="18:00">06:00 PM</option>
                                                    <option value="18:30">06:30 PM</option>
                                                    <option value="19:00">07:00 PM</option>
                                                    <option value="19:30">07:30 PM</option>
                                                    <option value="20:00">08:00 PM</option>
                                                    <option value="20:30">08:30 PM</option>
                                                    <option value="21:00">09:00 PM</option>
                                                    <option value="21:30">09:30 PM</option>
                                                    <option value="22:00">10:00 PM</option>
                                                    <option value="22:30">10:30 PM</option>
                                                    <option value="23:00">11:00 PM</option>
                                                    <option value="23:30">11:30 PM</option>
                                                    <option value="00:00">12:00 AM</option>
                                                    <option value="00:30">12:30 AM</option>
                                                    <option value="01:00">01:00 AM</option>
                                                    <option value="01:30">01:30 AM</option>
                                                    <option value="02:00">02:00 AM</option>
                                                    <option value="02:30">02:30 AM</option>
                                                    <option value="03:00">03:00 AM</option>
                                                    <option value="03:30">03:30 AM</option>
                                                    <option value="04:00">04:00 AM</option>
                                                    <option value="04:30">04:30 AM</option>
                                                    <option value="05:00">05:00 AM</option>
                                                    <option value="05:30">05:30 AM</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Container Pickup</label>
                                                <input name="o_container_pickup" type="text"
                                                    class="form-control o_container_pickup">
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Pickup Ref#</label>
                                                <input name="o_pickup_ref" type="text"
                                                    class="form-control o_pickup_ref">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Container Drop</label>
                                                <input name="o_container_drop" type="text"
                                                    class="form-control o_container_drop">
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Drop Off Ref#</label>
                                                <input name="o_drop_off_ref" type="text"
                                                    class="form-control o_drop_off_ref">
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">AES Number</label>
                                                <input name="o_aes_number" type="text"
                                                    class="form-control o_aes_number">
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Telex Number</label>
                                                <input name="o_telex_number" type="text"
                                                    class="form-control o_telex_number">
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">B13 Number</label>
                                                <input name="o_b13_number" type="text"
                                                    class="form-control o_b13_number">
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Delivery Date</label>
                                                <input name="o_delivery_date" type="date"
                                                    class="form-control o_delivery_date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Allocation Modal -->
    <div class="modal fade" id="allocation_modal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Manifest Header</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <td></td>
                                <td>Trans Number</td>
                                <td>Vessel</td>
                                <td>Voyage</td>
                                <td>Terminal</td>
                                <td>Local Port</td>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>
        $(document).ready(function() {

            enable_allocate_button('');
            enable_de_allocate_button('');

            $(".inco_term").select2({
                data: @json($incoterms)
            });

            $(".client").select2({
                data: @json($client)
            });

            $(".shipper").select2({
                data: @json($shippers)
            });

            $(".consignee").select2({
                data: @json($consignees)
            });

            $(".commodity").select2({
                data: @json($commodities)
            });

            $(".port_of_loading, .port_of_discharge, .final_destination, .r_place_of_receipt, .r_port_of_loading, .r_port_of_discharge, .r_final_destination")
                .select2({
                    ajax: {
                        url: "/admin/job/create",
                        dataType: 'json',
                        data: function(params) {
                            var query = {
                                search: params.term,
                                type: 'get_location'
                            }
                            return query;
                        },
                        processResults: function(data) {
                            return {
                                results: data
                            };
                        }
                    },
                    cache: true,
                    allowClear: true,
                    placeholder: 'Search for...',
                    minimumInputLength: 1,
                    minimumResultsForSearch: 50
                });

            $(".r_terminal").select2({
                ajax: {
                    url: "/admin/job/create",
                    dataType: 'json',
                    data: function(params) {
                        var query = {
                            search: params.term,
                            type: 'get_terminal_location'
                        }
                        return query;
                    },
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    }
                },
                cache: true,
                allowClear: true,
                placeholder: 'Search for...',
                minimumInputLength: 1,
                minimumResultsForSearch: 50
            });

            $(".sales_rep").select2({
                data: @json($employees)
            });

            $(".sline_carrier").select2({
                data: @json($shipping_lines)
            });

            $(".local_vendor").select2({
                data: @json($vendors)
            });

            $(".overseas_agent").select2({
                data: @json($overseas)
            });

            $(".principal").select2({
                data: @json($principals)
            });

            $(".vessel").select2({
                data: @json($vessels)
            });

            $(".voyage").select2({
                data: @json($voyages)
            });

            $(".forwarder_coloader").select2({
                data: @json($forwarder)
            });

            $(".transportation").select2({
                data: @json($transport)
            });

            // $(".custom_clearance").select2({
            //   data: @json($clearance)
            // });

            $(".custom_clearance").select2({
                ajax: {
                    url: "/admin/job/create",
                    dataType: 'json',
                    data: function(params) {
                        var query = {
                            search: params.term,
                            type: 'get_custom_clearance'
                        }
                        return query;
                    },
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    }
                },
                cache: true,
                allowClear: true,
                placeholder: 'Search for...',
                minimumInputLength: 1,
                minimumResultsForSearch: 50
            });

            $(".e_size_type, .crp_size_type, .cpp_size_type, .cpc_size_type").select2({
                data: @json($sizes)
            });

            $(".cr_chrg, .cp_chrg, .cs_charges, .cpc_chrg").select2({
                data: @json($charges)
            });

            $(".crp_currency, .cpp_currency, .cpc_currency").select2({
                data: @json($currencies)
            });
        })


        $("select[name=vessel]").change(function() {
            var id = $(this).val();
            $(".voyage").html(null);

            $.get(
                "/admin/quotation/create", {
                    fetch_vessel_voyages: id
                },
                function(res) {
                    $(".voyage").select2({
                        data: res,
                    });
                }
            );
        });

        function addNewRow(e) {
            $(e).parent().parent().clone().prependTo(".detail_repeater");
        }

        function delRow(e) {
            if ($(".detail_repeater tr").length <= 1) return;
            $(e).parent().parent().remove();
        }

        function addNewReceivableChargesRepeaterRow(e) {
            $('select.cr_chrg, select.size_type, select.crp_currency').select2('destroy');
            $(e).parent().parent().clone().appendTo(".receivable_charges_repeater");
            initializeSelect2([
                'select.cr_chrg',
                'select.size_type',
                'select.crp_currency'
            ]);
            $(".receivable_charges_repeater tr:last").find("input").val(null);
            $(".receivable_charges_repeater tr:last").find("select option:first").attr("selected", true)
        }

        function delNewReceivableChargesRepeaterRow(e) {
            if ($(".receivable_charges_repeater tr").length <= 1) return;
            $(e).parent().parent().remove();
        }

        function addNewPayableChargesRepeaterRow(e) {
            $('select.cp_chrg, select.cpp_size_type, select.cpp_currency').select2('destroy');
            $(e).parent().parent().clone().appendTo(".payable_charges_repeater");
            initializeSelect2([
                'select.cp_chrg',
                'select.cpp_size_type',
                'select.cpp_currency'
            ]);
            $(".payable_charges_repeater tr:last").find("input").val(null);
            $(".payable_charges_repeater tr:last").find("select option:first").attr("selected", true)
        }

        function delNewPayableChargesRepeaterRow(e) {
            if ($(".payable_charges_repeater tr").length <= 1) return;
            $(e).parent().parent().remove();
        }

        function addNewSummaryChargesRepeaterRow(e) {
            $('select.cs_charges').select2('destroy');
            $(e).parent().parent().clone().appendTo(".summary_charges_repeater");
            initializeSelect2([
                'select.cs_charges'
            ]);
            $(".summary_charges_repeater tr:last").find("input").val(null);
            $(".summary_charges_repeater tr:last").find("select option:first").attr("selected", true)
        }

        function delNewSummaryChargesRepeaterRow(e) {
            if ($(".summary_charges_repeater tr").length <= 1) return;
            $(e).parent().parent().remove();
        }

        function addNewPrincipalChargesRepeaterRow(e) {
            $('select.cpc_chrg, select.cpc_size_type, select.cpc_currency').select2('destroy');
            $(e).parent().parent().clone().appendTo(".principal_charges_repeater");
            initializeSelect2([
                'select.cpc_chrg',
                'select.cpc_size_type',
                'select.cpc_currency'
            ]);
            $(".principal_charges_repeater tr:last").find("input").val(null);
            $(".principal_charges_repeater tr:last").find("select option:first").attr("selected", true)
        }

        function delNewPrincipalChargesRepeaterRow(e) {
            if ($(".principal_charges_repeater tr").length <= 1) return;
            $(e).parent().parent().remove();
        }

        function edit_row(e, data) {
            let res = JSON.parse(data);

            if (res.booking_info) {
                data = res.booking_info;
                $(".job_number").val(data.job_number);
                $(".nature").val(data.nature).trigger('change');
                $(".job_date").val(data.job_date);
                $(".mty_move").removeAttr("checked");
                $(`.mty_move[value=${data.mty_move}]`).attr("checked", true);
                $(".job_type").val(data.job_type).trigger('change');
                $(".book_rec").val(data.book_rec);
                $(".cost_center").val(data.cost_center).trigger('change');
                $(".console_id").val(data.console_id);
                $(".job_kind").val(data.job_kind).trigger('change');
                $(".part_fcl").removeAttr("checked");
                $(`.part_fcl[value=${data.part_fcl}]`).attr("checked", true);
                $(".sub_type").val(data.sub_type).trigger('change');
                $(".dg_non").val(data.dg_non).trigger('change');
                $(".quotation").val(data.quotation);
                $(".job_status").val(data.job_status).trigger('change');
                $(".shipt_status").val(data.shipt_status).trigger('change');
                $(".shipt_date").val(data.shipt_date);
                $(".customer_reference").val(data.customer_reference);
                $(".delivery").val(data.delivery).trigger('change');
                $(".foreign_type").val(data.foreign_type).trigger('change');
                $(".nomination").val(data.nomination).trigger('change');
                $(".file_no").val(data.file_no);
                $(".inco_term").val(data.inco_term).trigger("change");
                $(".tax_distribution").val(data.tax_distribution).trigger("change");
                $(".client").val(data.client).trigger("change");
                $(".shipper").val(data.shipper).trigger("change");
                $(".consignee").val(data.consignee).trigger("change");
                $(".commodity").val(data.commodity).trigger("change");

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

                if (data.custom_clearance) {
                    var option = new Option(data.custom_clearance.party_name, data.custom_clearance.id, true, true);
                    $(".custom_clearance").append(option).trigger('change');
                } else {
                    $(".custom_clearance").val(null).trigger('change');
                }

                $(".transportation").val(data.transportation).trigger("change");
                $(".forwarder_coloader").val(data.forwarder_coloader).trigger("change");
                $(".sales_rep").val(data.sales_rep).trigger("change");
                $(".sline_carrier").val(data.sline_carrier).trigger("change");
                $(".local_vendor").val(data.local_vendor).trigger("change");
                $(".overseas_agent").val(data.overseas_agent).trigger("change");
                $(".principal").val(data.principal).trigger("change");
                $(".vessel").val(data.vessel).trigger("change");
                $(".voyage").val(data.voyage).trigger("change");
                $(".ckg_ed").val(data.ckg_ed);
                $(".etd").val(data.etd);
                $(".eta").val(data.eta);
                $(".cut_off").val(data.cut_off);
                $(".weight").val(data.weight);
                $(".kg_weight").val(data.kg_weight);
                $(".container").val(data.container);
                $(".ship_volume").val(data.ship_volume);
                $(".teu").val(data.teu);
                $(".volume").val(data.volume);
                $(".pieces").val(data.pieces);
                $(".notes").val(data.notes);
                $(".approval_status").val(data.approval_status);
                $("#approved_at").text(data.approved_at);
                if (data.approved_by) {
                    $("#approved_by").text(data.approved_by.username);
                    enable_allocate_button(data.id);
                } else {
                    $("#approved_by").text(null);
                    enable_allocate_button('');
                }

                if (data.created_by) {
                    $("#created_by").text(data.created_by.username);
                } else {
                    $("#created_by").text(null)
                }

                if (data.last_updated_by) {
                    $("#last_updated_by").text(data.last_updated_by.username);
                } else {
                    $("#last_updated_by").text(null)
                }

                $("#myForm").attr("action", "{{ route('admin.job.update') }}");
                $("input[name=id]").val(data.id);
                enable_BL_button(data.id);
            }

            // ROUTING
            if (res.routing) {
                data = res.routing;
                $(".r_service_type").val(data.service_type).trigger('change');
                $(".r_place_of_receipt").val(data.r_place_of_receipt).trigger('change');
                $(".r_date_1").val(data.r_date_1);
                $(".r_date_2").val(data.r_date_2);
                $(".r_date_3").val(data.r_date_3);
                $(".r_freight_payable_date").val(data.r_freight_payable_date);
                $(".r_cfs_depot_facility").val(data.r_cfs_depot_facility);
                $(".r_via_port").val(data.r_via_port);
                $(".r_feeder_vessel").val(data.r_feeder_vessel);
                $(".r_voyage_transhipment").val(data.r_voyage_transhipment);

                if (data.port_of_loading) {
                    var option = new Option(data.port_of_loading.location, data.port_of_loading.id, true, true);
                    $(".r_port_of_loading, .port_of_loading").append(option).trigger('change');
                } else {
                    $(".r_port_of_loading, .port_of_loading").val(null).trigger('change');
                }

                if (data.port_of_discharge) {
                    var option = new Option(data.port_of_discharge.location, data.port_of_discharge.id, true, true);
                    $(".r_port_of_discharge, .port_of_discharge").append(option).trigger('change');
                } else {
                    $(".r_port_of_discharge, .port_of_discharge").val(null).trigger('change');
                }

                if (data.final_destination) {
                    var option = new Option(data.final_destination.location, data.final_destination.id, true, true);
                    $(".r_final_destination, .final_destination").append(option).trigger('change');
                } else {
                    $(".r_final_destination, .final_destination").val(null).trigger('change');
                }

                if (data.terminals) {
                    var option = new Option(data.terminals.location_name, data.terminals.id, true, true);
                    $(".r_terminal").append(option).trigger('change');
                } else {
                    $(".r_terminal").val(null).trigger('change');
                }
            }


            // OTHER INFO
            if (res.other_info) {
                data = res.other_info;
                $(".o_agree_rate").val(data.o_agree_rate);
                $(".o_transhipment_cargo").prop("checked", data.o_transhipment_cargo);
                $(".o_any_other_information").val(data.o_any_other_information);
                $(".o_remarks").val(data.o_remarks);
                $(".o_cargo_manifest_remarks").val(data.o_cargo_manifest_remarks);
                $(".o_document_type").val(data.o_document_type).trigger('change');
                $(".o_buyer").val(data.o_buyer);
                $(".o_buying_house").val(data.o_buying_house);
                $(".o_remarks_2").val(data.o_remarks_2);
                $(".o_no_of_original_bl").val(data.o_no_of_original_bl);
                $(".o_destination_charges").val(data.o_destination_charges).trigger('change');
                $(".o_cargo_pickup").val(data.o_cargo_pickup);
                $(".o_pickup_date").val(data.o_pickup_date);
                $(".o_time").val(data.o_time).trigger('change');
                $(".o_cargo_drop_off").val(data.o_cargo_drop_off);
                $(".o_drop_date").val(data.o_drop_date);
                $(".o_time_2").val(data.o_time_2).trigger('change');
                $(".o_container_pickup").val(data.o_container_pickup);
                $(".o_pickup_ref").val(data.o_pickup_ref);
                $(".o_container_drop").val(data.o_container_drop);
                $(".o_drop_off_ref").val(data.o_drop_off_ref);
                $(".o_aes_number").val(data.o_aes_number);
                $(".o_telex_number").val(data.o_telex_number);
                $(".o_b13_number").val(data.o_b13_number);
                $(".o_delivery_date").val(data.o_delivery_date);
            }

            // EQUIPMENT
            if (res.equipments) {
                data = res.equipments;

                $(".detail_repeater tr").each(function(i, v) {
                    if (i > 0) {
                        $(v).remove();
                    }
                });
                $(data).each(function(key, value) {
                    if (key > 0) {
                        $(".detail_repeater tr:first").find("i.fa-print").click();
                    }
                });

                $(data).each(function(key, value) {
                    var size_type = $(`.e_size_type`).get(key);
                    $(size_type).val(value.e_size_type).trigger("change");

                    var rate_group = $(`.e_rate_group`).get(key);
                    $(rate_group).val(value.e_rate_group);

                    var qty = $(`.e_qty`).get(key);
                    $(qty).val(value.e_qty);

                    var e_code = $(`.e_code`).get(key);
                    $(e_code).val(value.e_code);

                    var e_name = $(`.e_name`).get(key);
                    $(e_name).val(value.e_name);

                    var teu = $(`.e_teu`).get(key);
                    $(teu).val(value.e_teu);

                    var gross_wt_cnt = $(`.e_gross_wt_cnt`).get(key);
                    $(gross_wt_cnt).val(value.e_gross_wt_cnt);

                    var dg_type = $(`.dg_type`).get(key);
                    $(dg_type).val(value.e_dg_non_dg).trigger('change');
                });
            }

            // Receivable Charges
            if (res.receivable_charges) {
                data = res.receivable_charges;

                $(".receivable_charges_repeater tr").each(function(i, v) {
                    if (i > 0) {
                        $(v).remove();
                    }
                })
                $(res.quotation_detail).each(function(key, value) {
                    if (key > 0) {
                        $(".receivable_charges_repeater tr:first").find("i.fa-clone").click();
                    }
                })

                $(data).each(function(key, value) {
                    var cr_bill_invoice = $(`.cr_bill_invoice`).get(key);
                    $(cr_bill_invoice).val(value.cr_bill_invoice);

                    var cr_chrg = $(`.cr_chrg`).get(key);
                    $(cr_chrg).val(value.cr_chrg).trigger("change");

                    var cr_particular = $(`.cr_particular`).get(key);
                    $(cr_particular).val(value.cr_particular);

                    var cr_description = $(`.cr_description`).get(key);
                    $(cr_description).val(value.cr_description);

                    var crp_type = $(`.crp_type`).get(key);
                    $(crp_type).val(value.crp_type).trigger("change");

                    var crp_basis = $(`.crp_basis`).get(key);
                    $(crp_basis).val(value.crp_basis);

                    var crp_pp_cc = $(`.crp_pp_cc`).get(key);
                    $(crp_pp_cc).val(value.crp_pp_cc);

                    var crp_collect_by = $(`.crp_collect_by`).get(key);
                    $(crp_collect_by).val(value.crp_collect_by);

                    var crp_size_type = $(`.crp_size_type`).get(key);
                    $(crp_size_type).val(value.crp_size_type).trigger("change");

                    var crp_rate_group = $(`.crp_rate_group`).get(key);
                    $(crp_rate_group).val(value.crp_rate_group);

                    var crp_dg_non_dg = $(`.crp_dg_non_dg`).get(key);
                    $(crp_dg_non_dg).val(value.crp_dg_non_dg).trigger("change");

                    var crp_code = $(`.crp_code`).get(key);
                    $(crp_code).val(value.crp_code);

                    var crp_name_1 = $(`.crp_name_1`).get(key);
                    $(crp_name_1).val(value.crp_name_1);

                    var crp_manual = $(`.crp_manual`).get(key);
                    $(crp_manual).val(value.crp_manual);

                    var crp_city = $(`.crp_city`).get(key);
                    $(crp_city).val(value.crp_city);

                    var crp_rate = $(`.crp_rate`).get(key);
                    $(crp_rate).val(value.crp_rate);

                    var crp_currency = $(`.crp_currency`).get(key);
                    $(crp_currency).val(value.crp_currency).trigger("change");

                    var crp_margin = $(`.crp_margin`).get(key);
                    $(crp_margin).val(value.crp_margin);

                    var crp_amount = $(`.crp_amount`).get(key);
                    $(crp_amount).val(value.crp_amount);

                    var crp_discount = $(`.crp_discount`).get(key);
                    $(crp_discount).val(value.crp_discount);

                    var crp_tax_apple = $(`.crp_tax_apple`).get(key);
                    $(crp_tax_apple).val(value.crp_tax_apple);

                    var crp_tax_rev = $(`.crp_tax_rev`).get(key);
                    $(crp_tax_rev).val(value.crp_tax_rev);

                    var crp_tax_amount_lc = $(`.crp_tax_amount_lc`).get(key);
                    $(crp_tax_amount_lc).val(value.crp_tax_amount_lc);

                    var crp_net_amount = $(`.crp_net_amount`).get(key);
                    $(crp_net_amount).val(value.crp_net_amount);

                    var crp_ex_rate = $(`.crp_ex_rate`).get(key);
                    $(crp_ex_rate).val(value.crp_ex_rate);

                    var crp_local_amount = $(`.crp_local_amount`).get(key);
                    $(crp_local_amount).val(value.crp_local_amount);

                    var crp_code_2 = $(`.crp_code_2`).get(key);
                    $(crp_code_2).val(value.crp_code_2);

                    var crp_name_2 = $(`.crp_name_2`).get(key);
                    $(crp_name_2).val(value.crp_name_2);

                    var crp_manifest_remarks = $(`.crp_manifest_remarks`).get(key);
                    $(crp_manifest_remarks).val(value.crp_manifest_remarks);

                    var crp_tariff_code = $(`.crp_tariff_code`).get(key);
                    $(crp_tariff_code).val(value.crp_tariff_code);

                    var crp_approved = $(`.crp_approved`).get(key);
                    $(crp_approved).val(value.crp_approved);

                    var crp_approved_by = $(`.crp_approved_by`).get(key);
                    $(crp_approved_by).val(value.crp_approved_by);

                    var crp_approved_date = $(`.crp_approved_date`).get(key);
                    $(crp_approved_date).val(value.crp_approved_date);

                    var crp_approved_log = $(`.crp_approved_log`).get(key);
                    $(crp_approved_log).val(value.crp_approved_log);
                })
            }

            // Payable Charges
            if (res.payable_charges) {
                data = res.payable_charges;

                $(".payable_charges_repeater tr").each(function(i, v) {
                    if (i > 0) {
                        $(v).remove();
                    }
                })
                $(res.quotation_detail).each(function(key, value) {
                    if (key > 0) {
                        $(".payable_charges_repeater tr:first").find("i.fa-clone").click();
                    }
                })

                $(data).each(function(key, value) {
                    var cp_bill_invoice = $(`.cp_bill_invoice`).get(key);
                    $(cp_bill_invoice).val(value.cp_bill_invoice);

                    var cp_chrg = $(`.cp_chrg`).get(key);
                    $(cp_chrg).val(value.cp_chrg).trigger("change");

                    var cp_particular = $(`.cp_particular`).get(key);
                    $(cp_particular).val(value.cp_particular);

                    var cp_description = $(`.cp_description`).get(key);
                    $(cp_description).val(value.cp_description);

                    var cpp_type = $(`.cpp_type`).get(key);
                    $(cpp_type).val(value.cpp_type).trigger("change");

                    var cpp_basis = $(`.cpp_basis`).get(key);
                    $(cpp_basis).val(value.cpp_basis);

                    var cpp_pp_cc = $(`.cpp_pp_cc`).get(key);
                    $(cpp_pp_cc).val(value.cpp_pp_cc);

                    var cpp_collect_by = $(`.cpp_collect_by`).get(key);
                    $(cpp_collect_by).val(value.cpp_collect_by);

                    var cpp_size_type = $(`.cpp_size_type`).get(key);
                    $(cpp_size_type).val(value.cpp_size_type).trigger("change");

                    var cpp_rate_group = $(`.cpp_rate_group`).get(key);
                    $(cpp_rate_group).val(value.cpp_rate_group);

                    var cpp_dg_non_dg = $(`.cpp_dg_non_dg`).get(key);
                    $(cpp_dg_non_dg).val(value.cpp_dg_non_dg).trigger("change");

                    var cpp_code_1 = $(`.cpp_code_1`).get(key);
                    $(cpp_code_1).val(value.cpp_code_1);

                    var cpp_name_1 = $(`.cpp_name_1`).get(key);
                    $(cpp_name_1).val(value.cpp_name_1);

                    var cpp_manual = $(`.cpp_manual`).get(key);
                    $(cpp_manual).val(value.cpp_manual);

                    var cpp_city = $(`.cpp_city`).get(key);
                    $(cpp_city).val(value.cpp_city);

                    var cpp_rate = $(`.cpp_rate`).get(key);
                    $(cpp_rate).val(value.cpp_rate);

                    var cpp_currency = $(`.cpp_currency`).get(key);
                    $(cpp_currency).val(value.cpp_currency).trigger("change");

                    var cpp_margin = $(`.cpp_margin`).get(key);
                    $(cpp_margin).val(value.cpp_margin);

                    var cpp_amount = $(`.cpp_amount`).get(key);
                    $(cpp_amount).val(value.cpp_amount);

                    var cpp_discount = $(`.cpp_discount`).get(key);
                    $(cpp_discount).val(value.cpp_discount);

                    var cpp_tax_apply = $(`.cpp_tax_apply`).get(key);
                    $(cpp_tax_apply).val(value.cpp_tax_apply);

                    var cpp_tax_rev = $(`.cpp_tax_rev`).get(key);
                    $(cpp_tax_rev).val(value.cpp_tax_rev);

                    var cpp_tax_amount_lc = $(`.cpp_tax_amount_lc`).get(key);
                    $(cpp_tax_amount_lc).val(value.cpp_tax_amount_lc);

                    var cpp_net_amount = $(`.cpp_net_amount`).get(key);
                    $(cpp_net_amount).val(value.cpp_net_amount);

                    var cpp_ex_rate = $(`.cpp_ex_rate`).get(key);
                    $(cpp_ex_rate).val(value.cpp_ex_rate);

                    var cpp_local_amount = $(`.cpp_local_amount`).get(key);
                    $(cpp_local_amount).val(value.cpp_local_amount);

                    var cpp_code_2 = $(`.cpp_code_2`).get(key);
                    $(cpp_code_2).val(value.cpp_code_2);

                    var cpp_name_2 = $(`.cpp_name_2`).get(key);
                    $(cpp_name_2).val(value.cpp_name_2);

                    var cpp_manifest_remarks = $(`.cpp_manifest_remarks`).get(key);
                    $(cpp_manifest_remarks).val(value.cpp_manifest_remarks);

                    var cpp_tariff_code = $(`.cpp_tariff_code`).get(key);
                    $(cpp_tariff_code).val(value.cpp_tariff_code);

                    var cpp_approved = $(`.cpp_approved`).get(key);
                    $(cpp_approved).val(value.cpp_approved);

                    var cpp_approved_by = $(`.cpp_approved_by`).get(key);
                    $(cpp_approved_by).val(value.cpp_approved_by);

                    var cpp_approved_date = $(`.cpp_approved_date`).get(key);
                    $(cpp_approved_date).val(value.cpp_approved_date);

                    var cpp_approved_log = $(`.cpp_approved_log`).get(key);
                    $(cpp_approved_log).val(value.cpp_approved_log);
                })
            }

            // Summary Charges
            if (res.summary_charges) {
                data = res.summary_charges;

                $(".summary_charges_repeater tr").each(function(i, v) {
                    if (i > 0) {
                        $(v).remove();
                    }
                })
                $(res.quotation_detail).each(function(key, value) {
                    if (key > 0) {
                        $(".summary_charges_repeater tr:first").find("i.fa-clone").click();
                    }
                })

                $(data).each(function(key, value) {
                    var cs_code = $(`.cs_code`).get(key);
                    $(cs_code).val(value.cs_code);

                    var cs_charges = $(`.cs_charges`).get(key);
                    $(cs_charges).val(value.cs_charges).trigger("change");

                    var cs_realize_revenue_1 = $(`.cs_realize_revenue_1`).get(key);
                    $(cs_realize_revenue_1).val(value.cs_realize_revenue_1);

                    var cs_unrealize_revenue_1 = $(`.cs_unrealize_revenue_1`).get(key);
                    $(cs_unrealize_revenue_1).val(value.cs_unrealize_revenue_1);

                    var cs_total_revenue = $(`.cs_total_revenue`).get(key);
                    $(cs_total_revenue).val(value.cs_total_revenue);

                    var cs_realize_revenue_2 = $(`.cs_realize_revenue_2`).get(key);
                    $(cs_realize_revenue_2).val(value.cs_realize_revenue_2);

                    var cs_unrealize_revenue_2 = $(`.cs_unrealize_revenue_2`).get(key);
                    $(cs_unrealize_revenue_2).val(value.cs_unrealize_revenue_2);

                    var cs_total_cost = $(`.cs_total_cost`).get(key);
                    $(cs_total_cost).val(value.cs_total_cost);

                    var cs_realize_net_3 = $(`.cs_realize_net_3`).get(key);
                    $(cs_realize_net_3).val(value.cs_realize_net_3);

                    var cs_unrealize_net_3 = $(`.cs_unrealize_net_3`).get(key);
                    $(cs_unrealize_net_3).val(value.cs_unrealize_net_3);

                    var cs_total_net = $(`.cs_total_net`).get(key);
                    $(cs_total_net).val(value.cs_total_net);

                    var cs_detail = $(`.cs_detail`).get(key);
                    $(cs_detail).val(value.cs_detail);
                })
            }

            // Principal Charges
            if (res.principal_charges) {
                data = res.principal_charges;

                $(".principal_charges_repeater tr").each(function(i, v) {
                    if (i > 0) {
                        $(v).remove();
                    }
                })
                $(res.quotation_detail).each(function(key, value) {
                    if (key > 0) {
                        $(".principal_charges_repeater tr:first").find("i.fa-clone").click();
                    }
                })

                $(data).each(function(key, value) {
                    var cpc_principal = $(`.cpc_principal`).get(key);
                    $(cpc_principal).val(value.cpc_principal);

                    var cpc_chrg = $(`.cpc_chrg`).get(key);
                    $(cpc_chrg).val(value.cpc_chrg).trigger("change");

                    var cpc_name_1 = $(`.cpc_name_1`).get(key);
                    $(cpc_name_1).val(value.cpc_name_1);

                    var cpc_description = $(`.cpc_description`).get(key);
                    $(cpc_description).val(value.cpc_description);

                    var cpc_charges_type = $(`.cpc_charges_type`).get(key);
                    $(cpc_charges_type).val(value.cpc_charges_type).trigger("change");

                    var cpc_rec_pay_type = $(`.cpc_rec_pay_type`).get(key);
                    $(cpc_rec_pay_type).val(value.cpc_rec_pay_type);

                    var cpc_code = $(`.cpc_code`).get(key);
                    $(cpc_code).val(value.cpc_code);

                    var cpc_name_2 = $(`.cpc_name_2`).get(key);
                    $(cpc_name_2).val(value.cpc_name_2);

                    var cpc_size_type = $(`.cpc_size_type`).get(key);
                    $(cpc_size_type).val(value.cpc_size_type).trigger("change");

                    var cpc_rate_group = $(`.cpc_rate_group`).get(key);
                    $(cpc_rate_group).val(value.cpc_rate_group);

                    var cpc_dg_non_dg = $(`.cpc_dg_non_dg`).get(key);
                    $(cpc_dg_non_dg).val(value.cpc_dg_non_dg).trigger("change");

                    var cpc_manual = $(`.cpc_manual`).get(key);
                    $(cpc_manual).val(value.cpc_manual);

                    var cpc_qty = $(`.cpc_qty`).get(key);
                    $(cpc_qty).val(value.cpc_qty);

                    var cpc_rate = $(`.cpc_rate`).get(key);
                    $(cpc_rate).val(value.cpc_rate);

                    var cpc_currency = $(`.cpc_currency`).get(key);
                    $(cpc_currency).val(value.cpc_currency).trigger("change");

                    var cpc_amount = $(`.cpc_amount`).get(key);
                    $(cpc_amount).val(value.cpc_amount);

                    var cpc_discount = $(`.cpc_discount`).get(key);
                    $(cpc_discount).val(value.cpc_discount);

                    var cpc_net_amount = $(`.cpc_net_amount`).get(key);
                    $(cpc_net_amount).val(value.cpc_net_amount);

                    var cpc_manual_ex_rate = $(`.cpc_manual_ex_rate`).get(key);
                    $(cpc_manual_ex_rate).val(value.cpc_manual_ex_rate);

                    var cpc_ex_rate = $(`.cpc_ex_rate`).get(key);
                    $(cpc_ex_rate).val(value.cpc_ex_rate);

                    var cpc_local_amount = $(`.cpc_local_amount`).get(key);
                    $(cpc_local_amount).val(value.cpc_local_amount);

                    var cpc_tariff_code = $(`.cpc_tariff_code`).get(key);
                    $(cpc_tariff_code).val(value.cpc_tariff_code);

                    var cpc_approved = $(`.cpc_approved`).get(key);
                    $(cpc_approved).val(value.cpc_approved);

                    var cpc_approved_by = $(`.cpc_approved_by`).get(key);
                    $(cpc_approved_by).val(value.cpc_approved_by);

                    var cpc_approved_date = $(`.cpc_approved_date`).get(key);
                    $(cpc_approved_date).val(value.cpc_approved_date);

                    var cpc_approval_log = $(`.cpc_approval_log`).get(key);
                    $(cpc_approval_log).val(value.cpc_approval_log);
                })
            }
        }

        $(".navigation").click(function() {
            let id = $("input[name=id]").val();
            let route = "/admin/job/get";
            let type = $(this).attr("data-type");
            let data = getList(route, type, id);
            if (data != null) {
                edit_row("", JSON.stringify(data));
            }
        });

        $("#submitButton").click(function() {
            $("#myForm").submit();
        });

        @if (isset($_GET['quot_id']))
            get_quot_data('{{ $_GET['quot_id'] }}')
        @endif

        function jobTypeToggle(e) {
            let val = $(e).val();
            if (val == "direct") {
                $(".cro_btn").attr("disabled", true);
                $(".loading_program_btn").attr("disabled", true);
            } else {
                $(".cro_btn").attr("disabled", false);
                $(".loading_program_btn").attr("disabled", false);
            }
        }

        jobTypeToggle($(".job_type"));

        function approvalStatusChange(status) {
            let id = $("input[name=id]").val();
            if (id > 0) {
                $("select[name=approval_status]").find(`option`).attr("selected", false);
                $("select[name=approval_status]").attr("disabled", false);
                $("select[name=approval_status]").find(`option[value=${status}]`).attr("selected", true);
                $("select[name=approval_status]").val(status);
                $('#myForm').submit();
            }
        }

        function get_quot_data(id) {
            $.get("/admin/job/get_quot", {
                quot_id: id
            }, function(res) {
                if (res.quotation) {
                    $(".job_type").val(res.quotation.job_type).trigger("change");
                    $("input.book_rec").val(res.quotation.book_rep);
                    $("input.quotation").val(res.quotation.quotation_no);
                    $("select.cost_center").val(res.quotation.cost_center);
                    $("select.inco_term").val(res.quotation.inco_term).trigger("change");
                    $("select.client").val(res.quotation.client).trigger("change");
                    $("select.vessel").val(res.quotation.vessel).trigger("change");
                    $("select.voyage").val(res.quotation.voyage).trigger("change");
                    $("select.commodity").val(res.quotation.commodity).trigger("change");
                    $("select.sales_rep").val(res.quotation.sale_rep).trigger("change");
                }

                if (res.quotation_detail) {
                    let length = res.quotation_detail.length;
                    $(".receivable_charges_repeater tr").each(function(i, v) {
                        if (i > 0) {
                            $(v).remove();
                        }
                    })
                    $(res.quotation_detail).each(function(key, value) {
                        if (key > 0) {
                            $(".receivable_charges_repeater tr:first").find("i.fa-clone").click();
                        }
                    })
                    $(res.quotation_detail).each(function(key, value) {
                        var charges = $(`.cr_chrg`).get(key);
                        $(charges).val(value.charges).trigger('change');

                        var cr_description = $(`.cr_description`).get(key);
                        $(cr_description).val(value.charges_desc);

                        var crp_rate = $(`.crp_rate`).get(key);
                        $(crp_rate).val(value.rate);

                        var crp_dg_non_dg = $(`.crp_dg_non_dg`).get(key);
                        $(crp_dg_non_dg).val(value.dg_type);

                        var crp_size_type = $(`.crp_size_type`).get(key);
                        $(crp_size_type).val(value.size_type).trigger('change');

                        var crp_amount = $(`.crp_amount`).get(key);
                        $(crp_amount).val(value.amount);

                        var crp_ex_rate = $(`.crp_ex_rate`).get(key);
                        $(crp_ex_rate).val(value.ex_rate);

                        var crp_local_amount = $(`.crp_local_amount`).get(key);
                        $(crp_local_amount).val(value.local_amount);
                    })
                }

                if (res.routing) {
                    $("select.shipper").val(res.routing.shipper).trigger("change");
                    $("select.consignee").val(res.routing.consignee).trigger("change");

                    if (res.routing.port_of_loading) {
                        var option = new Option(res.routing.port_of_loading.location, res.routing.port_of_loading
                            .id, true, true);
                        $(".r_port_of_loading, .port_of_loading").append(option).trigger('change');
                    } else {
                        $(".r_port_of_loading, .port_of_loading").val(null).trigger('change');
                    }

                    if (res.routing.port_of_discharge) {
                        var option = new Option(res.routing.port_of_discharge.location, res.routing
                            .port_of_discharge.id, true, true);
                        $(".r_port_of_discharge, .port_of_discharge").append(option).trigger('change');
                    } else {
                        $(".r_port_of_discharge, .port_of_discharge").val(null).trigger('change');
                    }

                    if (res.routing.final_destination) {
                        var option = new Option(res.routing.final_destination.location, res.routing
                            .final_destination.id, true, true);
                        $(".r_final_destination, .final_destination").append(option).trigger('change');
                    } else {
                        $(".r_final_destination, .final_destination").val(null).trigger('change');
                    }

                    if (res.routing.place_of_receipt) {
                        var option = new Option(res.routing.place_of_receipt.location, res.routing.place_of_receipt
                            .id, true, true);
                        $(".r_place_of_receipt").append(option).trigger('change');
                    } else {
                        $(".r_place_of_receipt").val(null).trigger('change');
                    }

                    if (res.routing.terminals) {
                        var option = new Option(res.routing.terminals.location_name, res.routing.terminals.id, true,
                            true);
                        $(".r_terminal").append(option).trigger('change');
                    } else {
                        $(".r_terminal").val(null).trigger('change');
                    }

                    if (res.routing.custom_clearance) {
                        var option = new Option(res.routing.custom_clearance.party_name, res.routing
                            .custom_clearance.id, true, true);
                        $(".custom_clearance").append(option).trigger('change');
                    } else {
                        $(".custom_clearance").val(null).trigger('change');
                    }

                    $("select.r_service_type").val(res.routing.service_type).trigger('change');
                    $(".sline_carrier").val(res.routing.sline_carrier).trigger('change');
                    $(".local_vendor").val(res.routing.vendor).trigger('change');
                    $("select.overseas_agent").val(res.routing.overseas).trigger("change");
                    $("select.principal").val(res.routing.principal).trigger("change");

                }

                if (res.equipment) {
                    let length = res.equipment.length;
                    $(".detail_repeater tr").each(function(i, v) {
                        if (i > 0) {
                            $(v).remove();
                        }
                    });
                    $(res.equipment).each(function(key, value) {
                        if (key > 0) {
                            $(".detail_repeater tr:first").find("i.fa-print").click();
                        }
                    });
                    $(res.equipment).each(function(key, value) {
                        var size_type = $(`.e_size_type`).get(key);
                        $(size_type).val(value.size_type).trigger("change");

                        var rate_group = $(`.e_rate_group`).get(key);
                        $(rate_group).val(value.rate_group);

                        var qty = $(`.e_qty`).get(key);
                        $(qty).val(value.qty);

                        var teu = $(`.e_teu`).get(key);
                        $(teu).val(value.tue);

                        var gross_wt_cnt = $(`.e_gross_wt_cnt`).get(key);
                        $(gross_wt_cnt).val(value.gross);

                        var dg_type = $(`.dg_type`).get(key);
                        $(dg_type).val(value.dg_type).trigger('change');
                    });
                }
            });
        }


        function getChargesCurrency(e) {
            let val = $(e).val();
            if (val) {
                $.get("/admin/job/create", {
                    fetch_charges_currency: val
                }, function(res) {
                    if (res) {
                        $(e).parent().parent().find("select.crp_currency").val(res.currency).trigger('change');
                        $(e).parent().parent().find(".crp_type option").attr("selected", false);
                        if (res.calculation_type == "Per-Unit") {
                            $(e).parent().parent().find(".crp_type option[value=Unit]").attr("selected", true);
                        } else if (res.calculation_type == "Per-Shipment") {
                            $(e).parent().parent().find(".crp_type option[value=Ship]").attr("selected", true);
                        }
                    } else {
                        $(e).parent().parent().find("select.crp_currency").val(null).trigger('change');
                    }
                })
            }
        }


        function jobFormReset(route) {
            document.getElementById('myForm').reset();
            $("#myForm").attr('action', route);
            $("#myForm").find("select").trigger("change");
            $("#myForm").find(
                ".custom_clearance, .r_terminal, .port_of_loading, .port_of_discharge, .final_destination, .r_place_of_receipt, .r_port_of_loading, .r_port_of_discharge, .r_final_destination"
            ).val(null).trigger("change");
        }

        function enable_BL_button(job_id) {
            let btn = $('.bl_btn');
            if (job_id) {
                $(btn).attr("onclick", `window.location.assign('/admin/bl/create?job_id=${job_id}')`);
            } else {
                $(btn).removeAttr("onclick");
            }
        }

        function enable_allocate_button(job_id) {
            let btn = $('.allocate_btn');
            if (job_id) {
                $(btn).removeAttr("disabled");
            } else {
                $(btn).attr("disabled", true);
            }
        }

        function enable_de_allocate_button(job_id) {
            let btn = $('.de_allocate_btn');
            if (job_id) {
                $(btn).removeAttr("disabled");
            } else {
                $(btn).attr("disabled", true);
            }
        }

        $(".allocate_btn").click(function() {
            let vessel = $(".vessel").val();
            let voyage = $(".voyage").val();

            if (vessel && voyage) {
                $.get("/admin/job/create", {
                    vessel,
                    voyage,
                    type: "get_allocation"
                }, function(res) {
                    if (res) {
                        $("#allocation_modal table tbody").html(res);
                        $("#allocation_modal").modal('show');
                    }
                })
            }
        })
    </script>
@endpush
