@extends('admin.layouts.app')


@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/switchbl/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/switchbl/delete')">
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
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <form id="myForm" method="post" action="{{ route('admin.manifest.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bold">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bl" type="button" role="tab" aria-controls="bl" aria-selected="true">BL Info</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#container" type="button" role="tab" aria-controls="container" aria-selected="false">Container Info</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bl_detail" type="button" role="tab" aria-controls="bl_detail" aria-selected="false">BL Detail</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="four-tab" data-bs-toggle="tab" data-bs-target="#ref_no" type="button" role="tab" aria-controls="ref_no" aria-selected="false">Ref No's / Stamps</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="bl" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="row">
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Job#</label>
                                                        <input name="job" class="job form-control" type="text" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">HBL#</label>
                                                        <input name="hbl" class="hbl form-control" type="text" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Counter</label>
                                                        <input name="counter" class="counter form-control" type="text" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">HBL Date</label>
                                                        <input name="hbl_date" class="hbl_date form-control" type="date" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">SW/HBL#.</label>
                                                        <input name="sw_hbl" class="sw_hbl form-control" type="date" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">MBL#</label>
                                                        <input name="mbl" class="mbl form-control" type="text" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Manual SW/HBL#.</label>
                                                        <input name="manual_sw_hbl" class="manual_sw_hbl form-control" type="date" placeholder="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Shipper</label>
                                                        <input name="shipper" class="shipper form-control" type="text" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Consignee</label>
                                                        <input name="consignee" class="consignee form-control" type="text" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Notify Part 1</label>
                                                        <input name="notify1" class="notify1 form-control" type="text" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">SLine/Carrier</label>
                                                        <input name="notify2" class="notify2 form-control" type="text" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Vessel</label>
                                                        <input name="vessel" class="vessel form-control" type="text" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Sailing Date</label>
                                                        <input name="sailing_date" class="sailing_date form-control" type="date" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Voyage</label>
                                                        <input name="voyage" class="voyage form-control" type="text" placeholder="" />
                                                    </div>
                                                </div>
                                            </div>
        
                                        </div>
                                        <div class="col-md-12">
                                            <h4 class="text-center pt-2">Booking Info</h4>
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">POL</label>
                                                        <input name="pol" class="pol form-control" type="text" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">POFD</label>
                                                        <input name="pofd" class="pofd form-control" type="text" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">POT</label>
                                                        <input name="pot" class="pot form-control" type="text" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Reference #</label>
                                                        <input name="reference_number" class="reference_number form-control" type="text" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Overseas Agent</label>
                                                        <input name="overseas_agent" class="overseas_agent form-control" type="text" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Total Container</label>
                                                        <input name="total_container" class="total_container form-control" type="text" placeholder="" />
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="container" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card-datatable table-responsive pt-0">
                                        <table class="datatables-basic table" style="width:200%;">
                                            <thead>
                                              <tr>
                                                <th>...</th>
                                                <th>S.No</th>
                                                <th>Container #</th>
                                                <th>Seal</th>
                                                <th>Size Type</th>
                                                <th>Rate Group</th>
                                                <th>Gross Wt</th>
                                                <th>Net Wt</th>
                                                <th>CBM</th>
                                                <th>Packages</th>
                                                <th>Unit</th>
                                                <th>Temperature</th>
                                                <th>Load Type</th>
                                                <th>Remarks</th>
                                                <th>Principal Code</th>
                                                <th>Principal Name</th>
                                                <th>Free Days Detention</th>
                                                <th>Free Days Plugin</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                 <tr>
                                                    <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                    <td><input name="c_sno" type="text" class="form-control" style="width: 100%;"/></td>
                                                    <td><input name="c_container_number[]" type="text" class="form-control" style="width: 100%;"/></td>
                                                    <td><input name="c_seal[]" type="text" class="form-control" style="width: 100%;"/></td>
                                                    <td><input name="c_size_type[]" type="text" class="form-control" style="width: 100%;"/></td>
                                                    <td><input name="c_rate_group[]" type="text" class="form-control" style="width: 100%;"/></td>
                                                    <td><input name="c_gross_weight[]" type="text" class="form-control" style="width: 100%;"/></td>
                                                    <td><input name="c_net_weight[]" type="text" class="form-control" style="width: 100%;"/></td>
                                                    <td><input name="c_cbm[]" type="text" class="form-control" style="width: 100%;"/></td>
                                                    <td><input name="c_packages[]" type="text" class="form-control" style="width: 100%;"/></td>
                                                    <td><input name="c_unit[]" type="text" class="form-control" style="width: 100%;"/></td>
                                                    <td><input name="c_temperature[]" type="text" class="form-control" style="width: 100%;"/></td>
                                                    <td><input name="c_load_type[]" type="text" class="form-control" style="width: 100%;"/></td>
                                                    <td><input name="c_remarks[]" type="text" class="form-control" style="width: 100%;"/></td>
                                                    <td><input name="c_principal_code[]" type="text" class="form-control" style="width: 100%;"/></td>
                                                    <td><input name="c_principal_name[]" type="text" class="form-control" style="width: 100%;"/></td>
                                                    <td><input name="c_free_days_detention[]" type="text" class="form-control" style="width: 100%;"/></td>
                                                    <td><input name="c_free_days_plugin[]" type="text" class="form-control" style="width: 100%;"/></td>
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
                                                <textarea name="b_shipper" class="b_shipper form-control" rows="4" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Consignee</label>
                                                <textarea name="b_consignee" class="b_consignee form-control" rows="4" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Notify Part(1)</label>
                                                <textarea name="b_notify_part1" class="b_notify_part1 form-control" rows="4" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Notify Part(2)</label>
                                                <textarea name="b_notify_part2" class="b_notify_part2 form-control" rows="4" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Delivery Agent</label>
                                                <textarea name="b_delivery_part" class="b_delivery_part form-control" rows="4" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Port of Loading</label>
                                                <input name="b_port_of_loading" type="text" class="b_port_of_loading form-control" placeholder="" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Port of Discharge</label>
                                                <input name="b_port_of_discharge" type="text" class="b_port_of_discharge form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Place of Delivery</label>
                                                <input name="b_place_of_delivery" type="text" class="b_place_of_delivery form-control" placeholder="" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Agent Stamp</label>
                                                <input name="b_agent_stamp" type="text" class="b_agent_stamp form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Freight Type</label>
                                                <select name="b_freight_type" class="b_freight_type form-select">
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Unit</label>
                                                <select name="b_unit" class="b_unit form-select">
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2 mt-4">
                                                <!--<label class="form-label">Manual</label>-->
                                                <input name="b_manual" type="checkbox" class="b_manual form-control" placeholder="" /><span>&nbsp;&nbsp;Manual</span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">No of Original B/L's</label>
                                                <input name="b_no_of_bl" type="text" class="b_no_of_bl form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Freight Payable At</label>
                                                <input name="b_freight_payable_at" type="text" class="b_freight_payable_at form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Place of Receipt</label>
                                                <input name="b_place_of_receipt" type="text" class="b_place_of_receipt form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Marks of No. Container No's</label>
                                                <textarea name="b_container_marks" class="b_container_marks form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">No of Pkgs or Shipping Units</label>
                                                <textarea name="b_package_count" class="b_package_count form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Description Of Goods & Packages</label>
                                                <textarea name="b_goods_description" class="b_goods_description form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Gross Weight</label>
                                                <textarea name="b_gross_weight" class="b_gross_weight form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Measurement</label>
                                                <textarea name="b_measurement" class="b_measurement form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">On Board Date</label>
                                                <input name="b_on_board_date" type="date" class="b_on_board_date form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Place And Date of Issue</label>
                                                <input name="b_place_and_date_of_issue" type="text" class="b_place_and_date_of_issue form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Date</label>
                                                <input name="b_date" type="date" class="b_date form-control">
                                            </div>
                                        </div>
                                        
                                   </div>
                                </div>
                                <div class="tab-pane fade" id="ref_no" role="tabpanel" aria-labelledby="four-tab">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Invoice #</label>
                                                <input name="r_invoice_number" type="text" class="r_invoice_number form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="r_inv_date" type="date" class="r_date form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Export #</label>
                                                <input name="r_export_number" type="text" class="r_export_number form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="r_exp_date" type="date" class="r_date form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Contact #</label>
                                                <input name="r_contact_number" type="text" class="r_contact_number form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="r_con_date" type="date" class="r_date form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">L/C #</label>
                                                <input name="r_lc_number" type="text" class="r_lc_number form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="r_lc_date" type="date" class="r_date form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Client Ref #</label>
                                                <input name="r_client_ref_number" type="text" class="r_client_ref_number form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Shipper Ref #</label>
                                                <input name="r_shipper_ref_number" type="text" class="r_shipper_ref_number form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">S Bill #</label>
                                                <input name="r_s_bill" type="text" class="r_s_bill form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="r_date" type="date" class="r_date form-control" placeholder="" />
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="text-center pt-3">STAMPS</h4>
                                    <table class="datatables-basic table">
                                        <thead>
                                          <tr>
                                            <th>...</th>
                                            <th>S.No</th>
                                            <th>Code</th>
                                            <th>Stamp</th>
                                            <th>Stamp Group</th>
                                            <th>Remarks</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                            <td><input class="form-control" name="r_s_no" type="text" style="width: 100%;"/></td>
                                            <td><input class="form-control" name="r_code[]" type="text" style="width: 100%;"/></td>
                                            <td><input class="form-control" name="r_stamp[]" type="text" style="width: 100%;"/></td>
                                            <td><input class="form-control" name="r_stamp_group[]" type="text" style="width: 100%;"/></td>
                                            <td><input class="form-control" name="r_remarks[]" type="text" style="width: 100%;"/></td>
                                        </tbody>
                                    </table>
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


function edit_row(e,data){
    data = JSON.parse(data);
    if(data){
        $(".job").val(data.job);
        $(".hbl").val(data.hbl);
        $(".counter").val(data.counter);
        $(".hbl_date").val(data.hbl_date);
        $(".sw_hbl").val(data.sw_hbl);
        $(".mbl").val(data.mbl);
        $(".manual_sw_hbl").val(data.manual_sw_hbl);
        $(".shipper").val(data.shipper);
        $(".consignee").val(data.consignee);
        $(".notify1").val(data.notify1);
        $(".notify2").val(data.notify2);
        $(".vessel").val(data.vessel);
        $(".sailing_date").val(data.sailing_date);
        $(".voyage").val(data.voyage);
        $(".pol").val(data.pol);
        $(".pofd").val(data.pofd);
        $(".pot").val(data.pot);
        $(".reference_number").val(data.reference_number);
        $(".overseas_agent").val(data.overseas_agent);
        $(".total_container").val(data.total_container);
        
        // BL DETAIL TAB
        $(".b_shipper").val(data.shipper);
        $(".b_consignee").val(data.consignee);
        $(".b_notify_part1").val(data.notify_part1);
        $(".b_notify_part2").val(data.notify_part2);
        $(".b_delivery_agent").val(data.delivery_agent);
        $(".b_port_of_loading").val(data.port_of_loading);
        $(".b_port_of_discharge").val(data.port_of_discharge);
        $(".b_place_of_delivery").val(data.place_of_delivery);
        $(".b_agent_stamp").val(data.agent_stamp);
        $(".b_freight_type").val(data.freight_type);
        $(".b_unit").val(data.unit);
        $(".b_manual").prop("checked", data.manual);
        $(".b_no_of_bl").val(data.no_of_bl);
        $(".b_freight_payable_at").val(data.freight_payable_at);
        $(".b_place_of_receipt").val(data.place_of_receipt);
        $(".b_container_marks").val(data.container_marks);
        $(".b_package_count").val(data.package_count);
        $(".b_goods_description").val(data.goods_description);
        $(".b_gross_weight").val(data.gross_weight);
        $(".b_measurement").val(data.measurement);
        $(".b_on_board_date").val(data.on_board_date);
        $(".b_place_and_date_of_issue").val(data.place_and_date_of_issue);
        $(".b_date").val(data.date);
        
        // REF NO / STAMP
        $(".r_invoice_number").val(data.invoice_number);
        $(".r_inv_date").val(data.invoice_date);
        $(".r_export_number").val(data.export_number);
        $(".r_exp_date").val(data.export_date);
        $(".r_contact_number").val(data.contact_number);
        $(".r_con_date").val(data.contact_date);
        $(".r_lc_number").val(data.lc_number);
        $(".r_lc_date").val(data.lc_date);
        $(".r_client_ref_number").val(data.client_ref_number);
        $(".r_shipper_ref_number").val(data.shipper_ref_number);
        $(".r_s_bill").val(data.s_bill);
        $(".r_date").val(data.date);
        
        
        $("#myForm").attr("action","{{ route('admin.switchbl.update') }}")
        $("input[name=id]").val(data.id);
    }
    
}


$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/switchbl/get";
  let type = $(this).attr("data-type");
  let data = getList(route, type, id);
  if (data != null) {
    edit_row("", JSON.stringify(data));
  }
});


$('#submitButton').click(function(){
    // Trigger form submission
    $('#myForm').submit();
});



</script>

@endpush





