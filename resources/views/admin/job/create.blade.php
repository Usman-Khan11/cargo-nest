@extends('admin.layouts.app')


@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus">
            <i class="fa fa-square-plus"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton"></i>
        </div>
        <div class="xmark">
            <i class="fa fa-circle-xmark"></i>
        </div>
        <div class="refresh">
            <i class="fa fa-refresh"></i>
        </div>
        <div class="lock">
            <i class="fa fa-lock"></i>
        </div>
        <div class="ban">
            <i class="fa fa-ban"></i>
        </div>
        <div class="backward">
            <i class="fa fa-backward-step"></i>
        </div>
        <div class="backward">
            <i class="fa fa-backward"></i>
        </div>
        <div class="forward">
            <i class="fa fa-forward"></i>
        </div>
        <div class="forward">
            <i class="fa fa-forward-step"></i>
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
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('admin.manifest.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bold">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
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
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="bl" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Job #</label>
                                                <input name="job_number" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Nature</label>
                                                <select name="nature" class="form-select">
                                                    <option></option>
                                                    <option value="Option 1">Option 1</option>
                                                    <option value="Option 2">Option 2</option>
                                                    <option value="Option 3">Option 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Job Date</label>
                                                <input name="job_date" type="date" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2 mt-4">
                                                <!--<label class="form-label">MTY Move</label>-->
                                                <input name="mty_move" type="checkbox" style="width:17px; height:17px;" /><span>&nbsp;&nbsp;MTY Move</span>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Job Type</label>
                                                <select name="job_type" class="form-select">
                                                    <option></option>
                                                    <option value="Option 1">Option 1</option>
                                                    <option value="Option 2">Option 2</option>
                                                    <option value="Option 3">Option 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Book Rec</label>
                                                <input name="book_rec" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Cost Center</label>
                                                <select name="cost_center" class="form-select">
                                                    <option></option>
                                                    <option value="Option 1">Option 1</option>
                                                    <option value="Option 2">Option 2</option>
                                                    <option value="Option 3">Option 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Console ID</label>
                                                <input name="console_id" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Job Kind</label>
                                                <select name="job_kind" class="form-select">
                                                    <option></option>
                                                    <option value="Option 1">Option 1</option>
                                                    <option value="Option 2">Option 2</option>
                                                    <option value="Option 3">Option 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2 mt-4">
                                                <!--<label class="form-label">Part FCL</label>-->
                                                <input name="part_fcl" type="checkbox" style="width:17px; height:17px;" /><span>&nbsp;&nbsp;Part FCL</span>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Sub Type</label>
                                                <select name="sub_type" class="form-select">
                                                    <option></option>
                                                    <option value="Option 1">Option 1</option>
                                                    <option value="Option 2">Option 2</option>
                                                    <option value="Option 3">Option 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">.</label>
                                                <select name="sub_type" class="form-select">
                                                    <option>DG</option>
                                                    <option>Non-DG</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Quotation</label>
                                                <input name="quotation" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Job Status</label>
                                                <select name="job_status" class="form-select">
                                                    <option>Open</option>
                                                    <option>Closed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Shipt Status</label>
                                                <select name="shipt_status" class="form-select">
                                                    <option>Booked</option>
                                                    <option>Un-Booked</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Shipt Date</label>
                                                <input name="shipt_date" type="date" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Customer Reference</label>
                                                <input name="customer Reference" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Delivery</label>
                                                <select name="delivery" class="form-select">
                                                    <option value="option1">Option 1</option>
                                                    <option value="option2">Option 2</option>
                                                    <option value="option3">Option 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Foreign Type</label>
                                                <select name="foreign_type" class="form-select">
                                                    <option value="option1">Option 1</option>
                                                    <option value="option2">Option 2</option>
                                                    <option value="option3">Option 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Nomination</label>
                                                <select name="nomination" class="form-select">
                                                    <option value="option1">Option 1</option>
                                                    <option value="option2">Option 2</option>
                                                    <option value="option3">Option 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">File #</label>
                                                <input name="file" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Inco Terms</label>
                                                <select name="inco_terms" class="form-select">
                                                    <option value="option1">Option 1</option>
                                                    <option value="option2">Option 2</option>
                                                    <option value="option3">Option 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Tax Distribution</label>
                                                <select name="tax_distribution" class="form-select">
                                                    <option value="option1">Option 1</option>
                                                    <option value="option2">Option 2</option>
                                                    <option value="option3">Option 3</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="py-3">
                                                <label>B/L Imformation: N/A</label><br>
                                                <label>Tariff Applied: N/A</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="py-3">
                                                <button class="btn btn-primary btn-sm">Parent Job</button><br>
                                                <button class="btn btn-primary btn-sm mt-2">Shipment List</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="py-3">
                                                <label>Total Container# : N/A</label><br>
                                                <label>Parent Job#: N/A</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Client</label>
                                                <input name="client" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Shipper</label>
                                                <input name="shipper" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Consignee</label>
                                                <input name="consignee" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Commodity</label>
                                                <input name="commodity" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Port of Loading</label>
                                                <input name="port_of_loading" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Port of Discharge</label>
                                                <input name="port_of_discharge" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Final Destination</label>
                                                <input name="final_destination" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Custom Clearance</label>
                                                <input name="custom_clearance" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Transportation</label>
                                                <input name="transportation" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Forwarder/Coloader</label>
                                                <input name="forwarder_coloader" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Sales Rep</label>
                                                <input name="sales_rep" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Sline/Carrier</label>
                                                <input name="sline_carrier" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Local Vendor</label>
                                                <input name="local_vendor" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Overseas Agent</label>
                                                <input name="overseas_agent" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Principal</label>
                                                <input name="principal" type="text" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="row p-2" style="border:1px solid #ccc;">
                                                <div class="col-md-6 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Vessel</label>
                                                        <input name="vessel" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Voyage</label>
                                                        <input name="voyage" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">C.B KG/ED</label>
                                                        <input name="cb_kg_ed" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">ETD</label>
                                                        <input name="etd" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">ETA</label>
                                                        <input name="eta" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Cut Off</label>
                                                        <input name="cut_off" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2 mt-4">
                                                        <button class="btn btn-primary btn-sm">Dates</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row p-2" style="border:1px solid #ccc;">
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Weight</label>
                                                        <input name="weight" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">B.KG Wt</label>
                                                        <input name="b_kg_weight" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Container</label>
                                                        <input name="container" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Shp Vol</label>
                                                        <input name="ship_volume" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Teu</label>
                                                        <input name="teu" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Vol</label>
                                                        <input name="volume" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Pcs</label>
                                                        <input name="pieces" type="text" class="form-control">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Tracking Notes:&nbsp;&nbsp;</label>
                                                <button class="btn btn-primary btn-sm">Add/Edit</button>
                                                <button class="btn btn-primary btn-sm">View Notes</button>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Notes</label>
                                                <textarea name="notes" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Manifest#: N/A&nbsp;&nbsp;</label><br>
                                                <button class="btn btn-primary btn-sm">Allocate</button>
                                                <button class="btn btn-primary btn-sm">De Allocate</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="mb-3">
                                                <button class="btn btn-primary btn-sm">BL</button>
                                                <button class="btn btn-primary btn-sm mx-3">CRO</button>
                                                <button class="btn btn-primary btn-sm">Loading Program</button>
                                                <button class="btn btn-primary btn-sm mx-3">Milestone</button>
                                                <button class="btn btn-primary btn-sm">Invoice</button>
                                                <button class="btn btn-primary btn-sm mx-3">Bill</button>
                                                <button class="btn btn-primary btn-sm">Crucial Changes</button>
                                                <button class="btn btn-primary btn-sm mx-3">Agent Invoice</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="mb-2">
                                                <button class="btn btn-primary btn-sm">Bulk Upload</button>
                                                <button class="btn btn-primary btn-sm mx-3">Export Detention</button>
                                                <button class="btn btn-primary btn-sm">Letter Generation</button>
                                                <button class="btn btn-primary btn-sm mx-3">Letters</button>
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
                                    <table class="datatables-basic table" style="">
                                        <thead>
                                          <tr>
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
                                        <tbody>
                                            <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                            <td><input type="text" style="width: 100%;"/></td>
                                            <td><input type="text" style="width: 100%;"/></td>
                                            <td><input type="text" style="width: 100%;"/></td>
                                            <td><input type="text" style="width: 100%;"/></td>
                                            <td><input type="text" style="width: 100%;"/></td>
                                            <td><input type="text" style="width: 100%;"/></td>
                                            <td><input type="text" style="width: 100%;"/></td>
                                            <td><input type="text" style="width: 100%;"/></td>
                                        </tbody>
                                    </table>
                                    
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
                                                <button class="btn btn-primary btn-sm">Pick Charges(Pay)</button>
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
                                                        <input type="checkbox" style="width:18px; height:18px;"/><span>&nbsp;Quotation</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <button class="btn btn-primary btn-sm">Pick Charges Rate(Pay)</button>
                                                    <button class="btn btn-primary btn-sm">Multi Delt</button>
                                                    <button class="btn btn-primary btn-sm">Auto Agent Invoice(s)</button>
                                                    <button class="btn btn-primary btn-sm">Auto Invoice(s)</button>
                                                    <button class="btn btn-primary btn-sm">Auto Bill(s)</button>
                                                    <button class="btn btn-primary btn-sm">Charges Tariff</button>
                                                    <button class="btn btn-primary btn-sm">Auto</button>
                                                    <button class="btn btn-primary btn-sm">Bill</button>
                                                    <button class="btn btn-primary btn-sm">Agent Invoice</button>
                                                    <button class="btn btn-primary btn-sm">Direct Job Exp/Rev</button>
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
                                                        <th><input type="checkbox" style="width:16px; height:16px;"/></th>
                                                        <th>S.No</th>
                                                        <th>Bill#/Invoice</th>
                                                        <th>Chrg</th>
                                                        <th>Particular</th>
                                                        <th>Description</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                        <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                        <td><input type="checkbox" style="width:16px; height:16px;"/></td>
                                                        <td><input type="text" style="width: 100%;"/></td>
                                                        <td><input type="text" style="width: 100%;"/></td>
                                                        <td><input type="text" style="width: 100%;"/></td>
                                                        <td><input type="text" style="width: 100%;"/></td>
                                                        <td><input type="text" style="width: 100%;"/></td>
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
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="checkbox" style="width:16px; height:16px;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="checkbox" style="width:16px; height:16px;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="checkbox" style="width:16px; height:16px;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
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
                                                            <th><input type="checkbox" style="width:16px; height:16px;"/></th>
                                                            <th>S.No</th>
                                                            <th>Bill#/Invoice</th>
                                                            <th>Chrg</th>
                                                            <th>Particular</th>
                                                            <th>Description</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                            <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                            <td><input type="checkbox" style="width:16px; height:16px;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
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
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="checkbox" style="width:16px; height:16px;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="checkbox" style="width:16px; height:16px;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="checkbox" style="width:16px; height:16px;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="checkbox" style="width:16px; height:16px;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
                                                                <td><input type="text" style="width: 100%;"/></td>
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
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
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
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="checkbox" style="width: 16px; height: 16px;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="checkbox" style="width: 16px; height: 16px;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
                                                            <td><input type="text" style="width: 100%;"/></td>
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
                                            <div class="mb-2">
                                                <label class="form-label">Service Type</label>
                                                <input name="service_type" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Place of Receipt</label>
                                                <input name="place_of_receipt" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="date" type="date" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Port of Loading</label>
                                                <input name="port_of_loading" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="date" type="date" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Port of Discharge</label>
                                                <input name="port_of_discharge" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="date" type="date" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Final Destination</label>
                                                <input name="final_destination" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Freight Payable Date</label>
                                                <input name="freight_payable_date" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">CFS/Depot Facility</label>
                                                <input name="cfs_depot_facility" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Terminal</label>
                                                <input name="terminal" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Via Port</label>
                                                <input name="via_port" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Feeder Vessel</label>
                                                <input name="feeder_vessel" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Voyage Transhipment</label>
                                                <input name="voyage_transhipment" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2 mt-4">
                                                <button class="btn btn-primary btn-sm">Show Transhipment</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class="tab-pane fade" id="other_info" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Agree Rate</label>
                                                <input name="agree_rate" type="text" class="form-control">
                                            </div>
                                            <div class="mb-2">
                                                <input type="checkbox" style="width:16px; height:16px;"/><span>&nbsp;&nbsp;Transhipment Cargo</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Any Other Information</label>
                                                <textarea name="any_other_information" class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Remarks</label>
                                                <textarea name="remarks" class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Cargo Manifest Remarks</label>
                                                <textarea name="cargo_manifest_remarks" class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Document Type</label>
                                                <select name="document_type" class="form-select">
                                                    <option></option>
                                                </select>
                                            </div>
                                            <div class="mb-2">
                                                <button class="btn btn-primary btn-sm">Update Document Type</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Buyer</label>
                                                <input name="buyer" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Buying House</label>
                                                <input name="buying_house" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Remarks</label>
                                                <textarea name="remarks" class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">No of Original B/L</label>
                                                <input name="no_of_original_bl" type="number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Destination Charges</label>
                                                <select name="destination_charges" class="form-select">
                                                    <option value="None">None</option>
                                                    <option value="DDC Prepaid">DDC Prepaid</option>
                                                    <option value="DDC Collect">DDC Collect</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Cargo Pickup</label>
                                                <input name="cargo_pickup" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="pickup_date" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Time</label>
                                                <select name="time" class="form-select">
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
                                            <div class="mb-2">
                                                <label class="form-label">Cargo Drop Off</label>
                                                <input name="cargo_drop_off" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="drop_date" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Time</label>
                                                <select name="time" class="form-select">
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
                                            <div class="mb-2">
                                                <label class="form-label">Container Pickup</label>
                                                <input name="container_pickup" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Pickup Ref#</label>
                                                <input name="pickup_ref" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Container Drop</label>
                                                <input name="container_drop" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Drop Off Ref#</label>
                                                <input name="drop_off_ref" type="text" class="form-control">
                                            </div>
                                        </div>


                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">AES Number</label>
                                                <input name="aes_number" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Telex Number</label>
                                                <input name="telex_number" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">B13 Number</label>
                                                <input name="b13_number" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Delivery Date</label>
                                                <input name="delivery_date" type="date" class="form-control">
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
<script type="text/javascript">
$(document).ready(function(){
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
            "url": "{{ route('admin.customer') }}",
            "type": "get",
            "data": function(d) {
                var frm_data = $('#result_report_form').serializeArray();
                $.each(frm_data, function(key, val) {
                    d[val.name] = val.value;
                });
            },
        },
        columns: [
            {
                data: 'DT_RowIndex',
                title: 'Sr No'
            },
            {
                data: 'name',
                title: 'Name'
            },
            {
                data: 'address',
                title: 'Address'
            },
            {
                data: 'email',
                title: 'Email'
            },
            {
                data: 'phone',
                title: 'Phone'
            },
        ],          
         "rowCallback": function(row, data) {}
    });
});





$(document).ready(function(){
        $("#job_allocation").hide();
        $("#se_job_btn").click(function(){
            $("#job_allocation").show();
        })
})   

$(document).ready(function(){
        $("#manifest_list").hide();
        $("#manifest_list_btn").click(function(){
            $("#manifest_list").show();
        })
})    


</script>

@endpush