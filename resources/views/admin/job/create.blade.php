@extends('admin.layouts.app')

@section('style')
    <style>
        .input_flex{
            display:flex !important;
            align-items:center;
        }
        .form-label{
            width:55%;
            margin-right:10px;
        }
        
    </style>
@endsection


@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/job/store')">
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
            <input type="text" class="form-control"/>
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
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bl" type="button" role="tab" aria-controls="bl" aria-selected="true">Booking Info</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#container" type="button" role="tab" aria-controls="container" aria-selected="false">Equipments</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bl_detail" type="button" role="tab" aria-controls="bl_detail" aria-selected="false">Charges</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="four-tab" data-bs-toggle="tab" data-bs-target="#ref_no" type="button" role="tab" aria-controls="ref_no" aria-selected="false">Routing</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="five-tab" data-bs-toggle="tab" data-bs-target="#other_info" type="button" role="tab" aria-controls="other_info" aria-selected="false">Other Info</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent" style="background-color:#f4ffed;">
                                <input name="id" type="hidden" value="0"/>
                                
                                <div class="tab-pane fade show active" id="bl" role="tabpanel" aria-labelledby="home-tab">
                                    
                                    <div class="row">
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Job #</label>
                                                <input name="job_number" type="text" class="form-control job_number" value="MSA-SEJ-{{ $job_no }}/{{date('Y')}}" readonly />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Nature <span class="text-danger">*</span></label>
                                                <select name="nature" class="form-select nature">
                                                    <option value="Parent">Parent</option>
                                                    <option value="Child">Child</option>
                                                    <option value="None" selected>None</option>  
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Job Date <span class="text-danger">*</span></label>
                                                <input name="job_date" type="date" class="form-control jodate" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <input name="mty_move" class="form-check-input mty_move" value="MTY-Move" type="checkbox" /><span>&nbsp;&nbsp;MTY Move</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Job Type</label>
                                                <select name="job_type"  class="form-select job_type">
                                                    <option value="Direct">Direct</option>
                                                    <option value="Coloaded">Coloaded</option>
                                                    <option value="Cross-Trade">Cross Trade</option>
                                                    <option value="Liner-Agency" selected>Liner Agency</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Book Rep</label>
                                                <input name="book_rec" type="text" class="form-control book_rec" placeholder="" />
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
                                                <input name="console_id" type="text" class="form-control console_id" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Job Kind <span class="text-danger">*</span></label>
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
                                                <input name="part_fcl" class="part_fcl form-check-input" value="Part-FCL" type="checkbox" /><span>&nbsp;&nbsp;Part FCL</span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Quotation</label>
                                                <input name="quotation" type="text" class="form-control quotation" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Job Status <span class="text-danger">*</span></label>
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
                                                <label class="form-label">Shipt Status <span class="text-danger">*</span></label>
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
                                                <input name="shipt_date" type="date" class="form-control shipt_date" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Customer Ref</label>
                                                <input name="customer_reference" type="text" class="form-control customer_reference" placeholder="" />
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
                                                <input name="file_no" type="text" class="form-control file_no" placeholder="" />
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
                                                <label>B/L Imformation: N/A</label><br>
                                                <label>Tariff Applied: N/A</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-primary btn-sm">Parent Job</button><br>
                                                <button type="button" class="btn btn-primary btn-sm mx-2">Shipment List</button>
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
                                                <label class="form-label">Client <span class="text-danger">*</span></label>
                                                <select name="client" class="client">
                                                    <option selected disabled>Select</option>
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
                                                <label class="form-label">Port of Loading <span class="text-danger">*</span></label>
                                                <select name="port_of_loading" class="port_of_loading">
                                                    <option selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Port of Discharge <span class="text-danger">*</span></label>
                                                <select name="port_of_discharge" class="port_of_discharge">
                                                    <option selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Final Destination</label>
                                                <select name="final_destination" class="final_destination">
                                                    <option selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Custom Clearance</label>
                                                <select name="custom_clearance" class="custom_clearance">
                                                    <option selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Transportation</label>
                                                <input name="transportation" type="text" class="form-control transportation">
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
                                                        <input name="ckg_ed" type="text" class="form-control ckg_ed">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="mb-2 input_flex">
                                                        <label class="form-label">ETD</label>
                                                        <input name="etd" type="text" class="form-control etd">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="mb-2 input_flex">
                                                        <label class="form-label">ETA</label>
                                                        <input name="eta" type="text" class="form-control eta">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="mb-2 input_flex">
                                                        <label class="form-label">Cut Off</label>
                                                        <input name="cut_off" type="text" class="form-control cut_off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2 input_flex mt-1">
                                                        <button type="button" class="btn btn-primary btn-sm">Dates</button>
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
                                                        <input name="weight" type="text" class="form-control weight">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 col-12">
                                                    <div class="mb-2 input_flex">
                                                        <label class="form-label">B.KG Wt</label>
                                                        <input name="kg_weight" type="text" class="form-control kg_weight">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 col-12">
                                                    <div class="mb-2 input_flex">
                                                        <label class="form-label">Container</label>
                                                        <input name="container" type="text" class="form-control container">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 col-12">
                                                    <div class="mb-2 input_flex">
                                                        <label class="form-label">Shp Vol</label>
                                                        <input name="ship_volume" type="text" class="form-control ship_volume">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 col-12">
                                                    <div class="mb-2 input_flex">
                                                        <label class="form-label">Teu</label>
                                                        <input name="teu" type="text" class="form-control teu">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 col-12">
                                                    <div class="mb-2 input_flex">
                                                        <label class="form-label">Vol</label>
                                                        <input name="volume" type="text" class="form-control volume">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 col-12">
                                                    <div class="mb-2 input_flex">
                                                        <label class="form-label">Pcs</label>
                                                        <input name="pieces" type="text" class="form-control pieces">
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
                                                <button type="button" class="btn btn-primary btn-sm">Allocate</button>
                                                <button type="button" class="btn btn-primary btn-sm">De Allocate</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="mb-3">
                                                <button type="button" class="btn btn-primary btn-sm">BL</button>
                                                <button type="button" class="btn btn-primary btn-sm mx-3">CRO</button>
                                                <button type="button" class="btn btn-primary btn-sm">Loading Program</button>
                                                <button type="button" class="btn btn-primary btn-sm mx-3">Milestone</button>
                                                <button type="button" class="btn btn-primary btn-sm">Invoice</button>
                                                <button type="button" class="btn btn-primary btn-sm mx-3">Bill</button>
                                                <button type="button" class="btn btn-primary btn-sm">Crucial Changes</button>
                                                <button type="button" class="btn btn-primary btn-sm mx-3">Agent Invoice</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="mb-2">
                                                <button type="button" class="btn btn-primary btn-sm">Bulk Upload</button>
                                                <button type="button" class="btn btn-primary btn-sm mx-3">Export Detention</button>
                                                <button type="button" class="btn btn-primary btn-sm">Letter Generation</button>
                                                <button type="button" class="btn btn-primary btn-sm mx-3">Letters</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="container" role="tabpanel" aria-labelledby="profile-tab">
                                    
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="mb-3">
                                                <label>B/L Imformation:&nbsp; N/A</label><br>
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
                                                    <td><i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                    <td><i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                                    <td><select name="e_size_type[]" class="e_size_type" style="width: 100%;">
                                                        <option selected disabled>Select Size</option>
                                                    </select></td>
                                                    <td><input type="text" name="e_rate_group[]" class="form-control e_rate_group" style="width: 100%;"/></td>
                                                    <td><input type="text" name="e_qty[]" class="form-control e_qty" style="width: 100%;"/></td>
                                                    <td><input type="text" name="e_code[]" class="form-control e_code" style="width: 100%;"/></td>
                                                    <td><input type="text" name="e_name[]" class="form-control e_name" style="width: 100%;"/></td>
                                                    <td><select name="e_dg_non_dg[]" class="form-select e_dg_non_dg" style="width: 100%;">
                                                        <option value="Non-DG" selected>Non-DG</option>
                                                        <option value="DG">DG</option>
                                                        <option value="All">All</option>
                                                    </select></td>
                                                    <td><input type="text" name="e_gross_wt_cnt[]" class="form-control e_gross_wt_cnt" style="width: 100%;"/></td>
                                                    <td><input type="text" name="e_teu[]" class="form-control e_teu" style="width: 100%;"/></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="bl_detail" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label>B/L Imformation:&nbsp; N/A</label><br>
                                                <label>Tariff Applied:&nbsp; N/A</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label>Terminal:&nbsp; N/A</label><br>
                                                <button type="button" class="btn btn-primary btn-sm">Pick Charges(Pay)</button>
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
                                                        <input type="checkbox" name="quotation" class="quotation" value="Quotation" style="width:18px; height:18px;"/><span>&nbsp;Quotation</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <button type="button" class="btn btn-primary btn-sm">Pick Charges Rate(Pay)</button>
                                                    <button type="button" class="btn btn-primary btn-sm">Multi Delt</button>
                                                    <button type="button" class="btn btn-primary btn-sm">Auto Agent Invoice(s)</button>
                                                    <button type="button" class="btn btn-primary btn-sm">Auto Invoice(s)</button>
                                                    <button type="button" class="btn btn-primary btn-sm">Auto Bill(s)</button>
                                                    <button type="button" class="btn btn-primary btn-sm">Charges Tariff</button>
                                                    <button type="button" class="btn btn-primary btn-sm">Auto</button>
                                                    <button type="button" class="btn btn-primary btn-sm">Bill</button>
                                                    <button type="button" class="btn btn-primary btn-sm">Agent Invoice</button>
                                                    <button type="button" class="btn btn-primary btn-sm">Direct Job Exp/Rev</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                            <li class="nav-item" role="presentation">
                                              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Receivable</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Payable</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                              <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Summary</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                              <button class="nav-link" id="principal-tab" data-bs-toggle="tab" data-bs-target="#principal" type="button" role="tab" aria-controls="principal" aria-selected="false">Principal</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="mb-4">
                                                    <h5 class="text-center">Charges Imformation</h5>
                                                    <table class="datatables-basic table" style="">
                                                    <thead>
                                                      <tr>
                                                        <th>...</th>
                                                        <th><input type="checkbox" class="form-check-input"/></th>
                                                        <th>S.No</th>
                                                        <th>Bill#/Invoice</th>
                                                        <th>Chrg</th>
                                                        <th>Particular</th>
                                                        <th>Description</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                        <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                        <td><input name="" type="checkbox" class="form-check-input"/></td>
                                                        <td><input name="cr_s.no" class="form-control" type="text" style="width: 100%;"/></td>
                                                        <td><input name="cr_bill_invoice" class="form-control" type="text" style="width: 100%;"/></td>
                                                        <td><input name="cr_chrg" class="form-control" type="text" style="width: 100%;"/></td>
                                                        <td><input name="cr_particular" class="form-control" type="text" style="width: 100%;"/></td>
                                                        <td><input name="cr_description" class="form-control" type="text" style="width: 100%;"/></td>
                                                    </tbody>
                                                </table>
                                                </div>
                                                <div class="mb-2">
                                                    <h5 class="text-center">Principal Imformation</h5>
                                                    <div class="card-datatable table-responsive pt-0">
                                                        <table class="datatables-basic table" style="width:350%;">
                                                            <thead>
                                                              <tr>
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
                                                            <tbody>
                                                                <tr>
                                                                    <td><input name="crp_type" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_basis" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_pp_cc" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_collect_by" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_size_type" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_rate_group" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_dg_non_dg" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_shared" class="form-check-input" type="checkbox"/></td>
                                                                    <td><input name="crp_code" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_name_1" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_manual" class="form-check-input" type="checkbox"/></td>
                                                                    <td><input name="crp_city" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_rate" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_currency" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_margin" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_amount" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_discount" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_tax_apple" class="form-check-input" type="checkbox"/></td>
                                                                    <td><input name="crp_tax_rev" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_tax_amount_lc" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_net_amount" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_ex_rate" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_local_amount" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_code" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_name_2" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_manifest_remarks" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_tariff_code" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_approved" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_approved_by" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_approved_date" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="crp_approved_log" class="form-control" type="text" style="width: 100%;"/></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                <div class="mb-4">
                                                    <h5 class="text-center">Charges Imformation</h5>
                                                    <table class="datatables-basic table" style="">
                                                        <thead>
                                                          <tr>
                                                            <th>...</th>
                                                            <th><input type="checkbox" class="form-check-input"/></th>
                                                            <th>S.No</th>
                                                            <th>Bill#/Invoice</th>
                                                            <th>Chrg</th>
                                                            <th>Particular</th>
                                                            <th>Description</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                            <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                            <td><input type="checkbox" class="form-check-input"/></td>
                                                            <td><input name="cp_s_no" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cp_bill_invoice"  class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cp_chrg"  class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cp_particular"  class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cp_description"  class="form-control" type="text" style="width: 100%;"/></td>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="mb-2">
                                                    <h5 class="text-center">Principal / Vender Imformation</h5>
                                                    <div class="card-datatable table-responsive pt-0">
                                                        <table class="datatables-basic table" style="width:350%;">
                                                            <thead>
                                                              <tr>
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
                                                            <tbody>
                                                                <tr>
                                                                    <td><input name="cpp_type" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_basis" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_pp_cc" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_collect_by" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_size_type" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_rate_group" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_dg_non_dg" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_shared" class="form-check-input" type="checkbox"/></td>
                                                                    <td><input name="cpp_code_1" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_name_1" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_manual" class="form-check-input" type="checkbox"/></td>
                                                                    <td><input name="cpp_city" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_rate" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_currency" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_margin" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_amount" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_discount" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_tax_apply" class="form-check-input" type="checkbox"/></td>
                                                                    <td><input name="cpp_tax_rev" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_tax_amount_lc" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_net_amount" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_ex_rate" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_local_amount" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_rotate" class="form-check-input" type="checkbox"/></td>
                                                                    <td><input name="cpp_code_2" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_name_2" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_manifest_remarks" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_tariff_code" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_approved" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_approved_by" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_approved_date" class="form-control" type="text" style="width: 100%;"/></td>
                                                                    <td><input name="cpp_approved_log" class="form-control" type="text" style="width: 100%;"/></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                                <div class="card-datatable table-responsive pt-0">
                                                    <table class="datatables-basic table" style="width:200%;">
                                                        <thead>
                                                          <tr>
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
                                                        <tbody>
                                                            <tr>
                                                                <td><input name="cs_s_no" class="form-control" type="text" style="width: 100%;"/></td>
                                                                <td><input name="cs_code" class="form-control" type="text" style="width: 100%;"/></td>
                                                                <td><input name="cs_charges" class="form-control" type="text" style="width: 100%;"/></td>
                                                                <td><input name="cs_realize_revenue_1" class="form-control" type="text" style="width: 100%;"/></td>
                                                                <td><input name="cs_unrealize_revenue_1" class="form-control" type="text" style="width: 100%;"/></td>
                                                                <td><input name="cs_total_revenue" class="form-control" type="text" style="width: 100%;"/></td>
                                                                <td><input name="cs_realize_revenue_2" class="form-control" type="text" style="width: 100%;"/></td>
                                                                <td><input name="cs_unrealize_revenue_2" class="form-control" type="text" style="width: 100%;"/></td>
                                                                <td><input name="cs_total_cost" class="form-control" type="text" style="width: 100%;"/></td>
                                                                <td><input name="cs_realize_net_3" class="form-control" type="text" style="width: 100%;"/></td>
                                                                <td><input name="cs_unrealize_net_3" class="form-control" type="text" style="width: 100%;"/></td>
                                                                <td><input name="cs_total_net" class="form-control" type="text" style="width: 100%;"/></td>
                                                                <td><input name="cs_detail" class="form-control" type="text" style="width: 100%;"/></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            
                                            <div class="tab-pane fade" id="principal" role="tabpanel" aria-labelledby="principal-tab">
                                                <h5 class="text-center">Charges/Principle Imformation</h5>
                                                <div class="card-datatable table-responsive pt-0">
                                                    <table class="datatables-basic table" style="width:300%;">
                                                        <thead>
                                                          <tr>
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
                                                        <tbody>
                                                            <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                            <td><input name="cpc_s_no" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_principal" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_chrg" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_name_1" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_description" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_charges_type" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_rec_pay_type" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_code" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_name_2" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_size_type" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_rate_group" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_dg_non_dg" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_manual" class="form-control" type="checkbox" style="width: 16px; height: 16px;"/></td>
                                                            <td><input name="cpc_qty" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_rate" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_currency" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_amount" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_discount" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_net_amount" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_manual_ex_rate" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_ex_rate" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_local_amount" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_tariff_code" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_approved" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_approved_by" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_approved_date" class="form-control" type="text" style="width: 100%;"/></td>
                                                            <td><input name="cpc_approval_log" class="form-control" type="text" style="width: 100%;"/></td>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="ref_no" role="tabpanel" aria-labelledby="four-tab">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Service Type</label>
                                                <input name="r_service_type" type="text" class="r_service_type form-control">
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
                                                <label class="form-label">Port of Loading <span class="text-danger">*</span></label>
                                                <select name="r_port_of_loading" class="r_port_of_loading">
                                                    <option Selected disabled></option>
                                                </select>
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
                                                <label class="form-label">Port of Discharge <span class="text-danger">*</span></label>
                                                <select name="r_port_of_discharge" class="r_port_of_discharge">
                                                    <option Selected disabled></option>
                                                </select>
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
                                                <label class="form-label">Final Destination <span class="text-danger">*</span></label>
                                                <select name="r_final_destination" class="r_final_destination">
                                                    <option Selected disabled></option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Freight Payable Date</label>
                                                <input name="r_freight_payable_date" type="text" class="r_freight_payable_date form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">CFS/Depot Facility</label>
                                                <input name="r_cfs_depot_facility" type="text" class="r_cfs_depot_facility form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Terminal</label>
                                                <select name="r_terminal" class="r_terminal">
                                                    <option selected disabled></option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Via Port</label>
                                                <input name="r_via_port" type="text" class="r_via_port form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Feeder Vessel</label>
                                                <input name="r_feeder_vessel" type="text" class="r_feeder_vessel form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Voyage Transhipment</label>
                                                <input name="r_voyage_transhipment" type="text" class="r_voyage_transhipment form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex  mt-1">
                                                <button type="button" class="btn btn-primary btn-sm">Show Transhipment</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                                <div class="tab-pane fade" id="other_info" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="mb-3 input_flex">
                                                <label class="form-label">Agree Rate</label>
                                                <input name="o_agree_rate" type="text" class="form-control o_agree_rate">
                                            </div>
                                            <div class="mb-2 input_flex">
                                                <input type="checkbox" name="o_transhipment_cargo" class="form-check-input o_transhipment_cargo"/><span>&nbsp;&nbsp;Transhipment Cargo</span>
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
                                                <button type="button" class="btn btn-primary btn-sm">Update Document Type</button>
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
                                                <input name="o_buying_house" type="text" class="form-control o_buying_house">
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
                                                <input name="o_no_of_original_bl" type="number" class="form-control o_no_of_original_bl">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Destination Charges</label>
                                                <select name="o_destination_charges" class="form-select o_destination_charges">
                                                    <option value="None">None</option>
                                                    <option value="DDC-Prepaid">DDC Prepaid</option>
                                                    <option value="DDC-Collect">DDC Collect</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Cargo Pickup</label>
                                                <input name="o_cargo_pickup" type="text" class="form-control o_cargo_pickup">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Date</label>
                                                <input name="o_pickup_date" type="date" class="form-control o_pickup_date">
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
                                                <input name="o_cargo_drop_off" type="text" class="form-control o_cargo_drop_off">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Date</label>
                                                <input name="o_drop_date" type="date" class="form-control o_drop_date">
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
                                                <input name="o_container_pickup" type="text" class="form-control o_container_pickup">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Pickup Ref#</label>
                                                <input name="o_pickup_ref" type="text" class="form-control o_pickup_ref">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Container Drop</label>
                                                <input name="o_container_drop" type="text" class="form-control o_container_drop">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Drop Off Ref#</label>
                                                <input name="o_drop_off_ref" type="text" class="form-control o_drop_off_ref">
                                            </div>
                                        </div>


                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">AES Number</label>
                                                <input name="o_aes_number" type="text" class="form-control o_aes_number">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Telex Number</label>
                                                <input name="o_telex_number" type="text" class="form-control o_telex_number">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">B13 Number</label>
                                                <input name="o_b13_number" type="text" class="form-control o_b13_number">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Delivery Date</label>
                                                <input name="o_delivery_date" type="date" class="form-control o_delivery_date">
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
@endsection


@push('script') 
<script>

$(document).ready(function () {
    
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
    
    $(".port_of_loading").select2({
      data: @json($locations)
    });
    
    $(".port_of_discharge").select2({
      data: @json($locations)
    });
    
    $(".final_destination").select2({
      data: @json($locations)
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
    
    $(".custom_clearance").select2({
      data: @json($clearance)
    });
    
    
    
    
    
    $(".r_place_of_receipt").select2({
      data: @json($locations)
    });
    
    $(".r_port_of_loading").select2({
      data: @json($locations)
    });
    
    $(".r_port_of_discharge").select2({
      data: @json($locations)
    });
    
    $(".r_final_destination").select2({
      data: @json($locations)
    });
   
    $(".r_terminal").select2({
      data: @json($locations)
    });
    
    $(".e_size_type").select2({
      data: @json($sizes)
    });
    
    
   

})

    $("select[name=vessel]").change(function () {
        var id = $(this).val();
        $(".voyage").html(null);
        
        $.get("/admin/quotation/create", { fetch_vessel_voyages: id }, function (res) {
          $(".voyage").select2({
              data: res
            });
        })
    })
    
    

 function addNewRow(e){
        $(e).parent().parent().clone().prependTo(".detail_repeater");
    }
    
    function delRow(e){
        if($(".detail_repeater tr").length <= 1) return;
        $(e).parent().parent().remove();
    }


function edit_row(e,data){
    data = JSON.parse(data);
    if(data){
        $(".job_number").val(data.job_number);
        $(".nature").val(data.nature);
        $(".job_date").val(data.job_date);
        $(".mty_move").prop('checked', data.mty_move);
        $(".job_type").val(data.job_type);
        $(".book_rec").val(data.book_rec);
        $(".cost_center").val(data.cost_center);
        $(".console_id").val(data.console_id);
        $(".job_kind").val(data.job_kind);
        $(".part_fcl").prop('checked', data.part_fcl);
        $(".sub_type").val(data.sub_type);
        $(".dg_non").val(data.dg_non);
        $(".quotation").val(data.quotation);
        $(".job_status").val(data.job_status);
        $(".shipt_status").val(data.shipt_status);
        $(".shipt_date").val(data.shipt_date);
        $(".customer_reference").val(data.customer_reference);
        $(".delivery").val(data.delivery);
        $(".foreign_type").val(data.foreign_type);
        $(".nomination").val(data.nomination);
        $(".file_no").val(data.file_no);
        $(".inco_term").val(data.inco_term).trigger('change');
        $(".tax_distribution").val(data.tax_distribution);
        $(".client").val(data.client).trigger('change');
        $(".shipper").val(data.shipper).trigger('change');
        $(".consignee").val(data.consignee).trigger('change');
        $(".commodity").val(data.commodity).trigger('change');
        $(".port_of_loading").val(data.port_of_loading).trigger('change');
        $(".port_of_discharge").val(data.port_of_discharge).trigger('change');
        $(".final_destination").val(data.final_destination).trigger('change');
        $(".custom_clearance").val(data.custom_clearance);
        $(".transportation").val(data.transportation).trigger('change');
        $(".forwarder_coloader").val(data.forwarder_coloader).trigger('change');
        $(".sales_rep").val(data.sales_rep).trigger('change');
        $(".sline_carrier").val(data.sline_carrier).trigger('change');
        $(".local_vendor").val(data.local_vendor).trigger('change');
        $(".overseas_agent").val(data.overseas_agent).trigger('change');
        $(".principal").val(data.principal).trigger('change');
        $(".vessel").val(data.vessel).trigger('change');
        $(".voyage").val(data.voyage).trigger('change');
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
        
        // ROUTING
        $(".r_service_type").val(data.r_service_type);
        $(".r_place_of_receipt").val(data.r_place_of_receipt);
        $(".r_date_1").val(data.r_date_1);
        $(".r_port_of_loading").val(data.r_port_of_loading);
        $(".r_date_2").val(data.r_date_2);
        $(".r_port_of_discharge").val(data.r_port_of_discharge);
        $(".r_date_3").val(data.r_date_3);
        $(".r_final_destination").val(data.r_final_destination);
        $(".r_freight_payable_date").val(data.r_freight_payable_date);
        $(".r_cfs_depot_facility").val(data.r_cfs_depot_facility);
        $(".r_terminal").val(data.r_terminal);
        $(".r_via_port").val(data.r_via_port);
        $(".r_feeder_vessel").val(data.r_feeder_vessel);
        $(".r_voyage_transhipment").val(data.r_voyage_transhipment);
        
        // OTHER INFO
        $(".o_agree_rate").val(data.o_agree_rate);
        $(".o_transhipment_cargo").prop('checked', data.o_transhipment_cargo);
        $(".o_any_other_information").val(data.o_any_other_information);
        $(".o_remarks").val(data.o_remarks);
        $(".o_cargo_manifest_remarks").val(data.o_cargo_manifest_remarks);
        $(".o_document_type").val(data.o_document_type);
        $(".o_buyer").val(data.o_buyer);
        $(".o_buying_house").val(data.o_buying_house);
        $(".o_remarks_2").val(data.o_remarks_2);
        $(".o_no_of_original_bl").val(data.o_no_of_original_bl);
        $(".o_destination_charges").val(data.o_destination_charges);
        $(".o_cargo_pickup").val(data.o_cargo_pickup);
        $(".o_pickup_date").val(data.o_pickup_date);
        $(".o_time").val(data.o_time);
        $(".o_cargo_drop_off").val(data.o_cargo_drop_off);
        $(".o_drop_date").val(data.o_drop_date);
        $(".o_time_2").val(data.o_time_2);
        $(".o_container_pickup").val(data.o_container_pickup);
        $(".o_pickup_ref").val(data.o_pickup_ref);
        $(".o_container_drop").val(data.o_container_drop);
        $(".o_drop_off_ref").val(data.o_drop_off_ref);
        $(".o_aes_number").val(data.o_aes_number);
        $(".o_telex_number").val(data.o_telex_number);
        $(".o_b13_number").val(data.o_b13_number);
        $(".o_delivery_date").val(data.o_delivery_date);
        
        $("#myForm").attr("action","{{ route('admin.job.update') }}")
        $("input[name=id]").val(data.id);
    }
    
}


$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/job/get";
  let type = $(this).attr("data-type");
  let data = getList(route, type, id);
  if (data != null) {
    edit_row("", JSON.stringify(data));
  }
});


$('#submitButton').click(function(){
    $('#myForm').submit();
});


@if(isset($_GET["quot_id"]))
    get_quot_data('{{ $_GET["quot_id"] }}')
@endif

function get_quot_data(id){
    $.get("/admin/job/get_quot",{quot_id:id},function(res){
        
        if(res.quotation) {
            $("input.book_rec").val(res.quotation.book_rep);
            $("input.quotation").val(res.quotation.quotation_no);
            $("select.cost_center").val(res.quotation.cost_center);
            $("select.inco_term").val(res.quotation.inco_term).trigger('change');
            $("select.client").val(res.quotation.client).trigger('change');
            $("select.vessel").val(res.quotation.vessel).trigger('change');
            $("select.voyage").val(res.quotation.voyage).trigger('change');
            $("select.commodity").val(res.quotation.commodity).trigger('change');
            $("select.sales_rep").val(res.quotation.sale_rep).trigger('change');
        }
        
        if(res.quotation_detail) {
            $("select.dg_non").val(res.quotation.dg_type);
        }
        
        if(res.routing) {
            $("select.shipper").val(res.routing.shipper).trigger('change');
            $("select.consignee").val(res.routing.consignee).trigger('change');
            $("select.port_of_loading").val(res.routing.port_of_loading).trigger('change');
            $("select.port_of_discharge").val(res.routing.port_of_discharge).trigger('change');
            $("select.final_destination").val(res.routing.final_destination).trigger('change');
            $("select.local_vendor").val(res.routing.vendor).trigger('change');
            $("select.sline_carrier").val(res.routing.sline_carrier).trigger('change');
            $("select.overseas_agent").val(res.routing.overseas).trigger('change');
            $("select.principal").val(res.routing.principal).trigger('change');
            
            $("select.r_service_type").val(res.routing.service_type);
            $("select.r_place_of_receipt").val(res.routing.place_of_receipt).trigger('change');
            $("select.r_port_of_loading").val(res.routing.port_of_loading).trigger('change');
            $("select.r_port_of_discharge").val(res.routing.port_of_discharge).trigger('change');
            $("select.r_final_destination").val(res.routing.final_destination).trigger('change');
            $("select.r_terminal").val(res.routing.terminals).trigger('change');
            
        }
        
      
        if(res.equipment){
        let length = res.equipment.length;
        $(".detail_repeater tr").each(function(i,v){
            if (i > 0) { $(v).remove(); }
        })
        $(res.equipment).each(function(key, value){
            if (key > 0) {
                $(".detail_repeater tr:first").find("i.fa-clone").click();
            }
        })
        $(res.equipment).each(function(key, value){
            var size_type = $(`.e_size_type`).get(key);
            $(size_type).val(value.size_type).trigger('change');
            
            var qty = $(`.e_qty`).get(key);
            $(qty).val(value.qty);
            
            var teu = $(`.e_teu`).get(key);
            $(teu).val(value.teu);
            
            // var dg_type = $(`.dg_type`).get(key);
            // $(dg_type).val(value.dg_type);
    
        })
    }
        
        
        
    })
}

</script>
@endpush