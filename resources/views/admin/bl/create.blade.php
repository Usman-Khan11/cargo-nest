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
                <form id="myForm" method="post" action="{{ route('admin.bl.store') }}" enctype="multipart/form-data">
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
                                        <input name="id" type="hidden" value="0"/>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Job#</label>
                                                        <input name="job_no" type="text" class="form-control job_no" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Status</label>
                                                        <input name="status" type="text" class="form-control status" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">HBL#</label>
                                                        <input name="hbl" type="text" class="form-control hbl" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">HBL Date</label>
                                                        <input name="hbl_date" type="date" class="form-control hbl_date" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">MBL#</label>
                                                        <input name="mbl" type="text" class="form-control mbl" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">MBL Date</label>
                                                        <input name="mbl_date" type="date" class="form-control mbl_date" placeholder="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                               <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Source:</label>
                                                        <input name="source_date" type="date" class="form-control source_date" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="mb-2 mt-4">
                                                        <label class="form-label"></label>
                                                        <input name="hbl_issue" type="checkbox" value="HBL-Issue" class="hbl_issue" /><span>&nbsp;&nbsp;HBL Issue</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-2 mt-4">
                                                        <button class="btn btn-primary btn-sm">Pick SI</button>
                                                        <button class="btn btn-primary btn-sm mx-2">Show Log</button>
                                                        <button class="btn btn-primary btn-sm">Copy BL</button>
                                                        <button class="btn btn-primary btn-sm mx-2">Import BL</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Shipper</label>
                                                        <input name="shipper" type="text" class="form-control shipper" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Consignee</label>
                                                        <input name="consignee" type="text" class="form-control consignee" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Notify Part 1</label>
                                                        <input name="notify1" type="text" class="form-control notify1" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Notify Part 2</label>
                                                        <input name="notify2" type="text" class="form-control notify2" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Vessel</label>
                                                        <select name="vessel" class="vessel form-select custom_select">
                                                            <option selected disabled></option>
                                                            {{--@foreach($vessels as $value)
                                                            <option @if($vessel_id == $value->id) selected @endif value="{{ $value->id }}">{{ $value->vessel_name }}</option>
                                                            @endforeach--}}
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Sailing Date</label>
                                                        <input name="sailing_date" type="date" class="form-control sailing_date" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Voyage</label>
                                                        <select name="voyage" class="voyage form-select">
                                                            <option selected disabled></option>
                                                            @foreach($voyages as $value)
                                                            <option value="{{ $value->id }}">{{ $value->voy }}</option>
                                                            @endforeach
                                                        </select>
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
                                                        <input name="pol" type="text" class="form-control pol" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">POFD</label>
                                                        <input name="pofd" type="text" class="form-control pofd" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">POT</label>
                                                        <input name="pot" type="text" class="form-control pot" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Final Destination</label>
                                                        <input name="final_destination" type="text" class="form-control final_destination" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Commodity</label>
                                                        <input name="commodity" type="text" class="form-control commodity" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Reference #</label>
                                                        <input name="reference_number" type="text" class="form-control reference_number" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Overseas Agent</label>
                                                        <input name="overseas_agent" type="text" class="form-control overseas_agent" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">S/Line Carrier</label>
                                                        <input name="shipping_line_carrier" type="text" class="form-control shipping_line_carrier" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Total Container</label>
                                                        <input name="total_container" type="text" class="form-control total_container" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Delivery</label>
                                                        <input name="delivery" type="text" class="form-control delivery" placeholder="" />
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
                                                    <td><input type="text" name="c_s_no" class="form-control" style="width: 100%;"/></td>
                                                    <td><input type="text" name="c_container_no[]" class="form-control" style="width: 100%;"/></td>
                                                    <td><input type="text" name="c_seal[]" class="form-control" style="width: 100%;"/></td>
                                                    <td><input type="text" name="c_size_type[]" class="form-control" style="width: 100%;"/></td>
                                                    <td><input type="text" name="c_rate_group[]" class="form-control" style="width: 100%;"/></td>
                                                    <td><input type="text" name="c_gross_wt[]" class="form-control" style="width: 100%;"/></td>
                                                    <td><input type="text" name="c_net_wt[]" class="form-control" style="width: 100%;"/></td>
                                                    <td><input type="text" name="c_cbm[]" class="form-control" style="width: 100%;"/></td>
                                                    <td><input type="text" name="c_packages[]" class="form-control" style="width: 100%;"/></td>
                                                    <td><input type="text" name="c_unit[]" class="form-control" style="width: 100%;"/></td>
                                                    <td><input type="text" name="c_temperature[]" class="form-control" style="width: 100%;"/></td>
                                                    <td><input type="text" name="c_load_type[]" class="form-control" style="width: 100%;"/></td>
                                                    <td><input type="text" name="c_remarks[]" class="form-control" style="width: 100%;"/></td>
                                                    <td><input type="text" name="c_principal_code[]" class="form-control" style="width: 100%;"/></td>
                                                    <td><input type="text" name="c_principal_name[]" class="form-control" style="width: 100%;"/></td>
                                                    <td><input type="text" name="c_free_days_detention[]" class="form-control" style="width: 100%;"/></td>
                                                    <td><input type="text" name="c_free_days_plugin[]" class="form-control" style="width: 100%;"/></td>
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
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Notify Part(1)</label>
                                                <textarea name="b_notify_part1" class="form-control b_notify_part1" rows="4" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Notify Part(2)</label>
                                                <textarea name="b_notify_part2" class="form-control b_notify_part2" rows="4" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Delivery Agent</label>
                                                <textarea name="b_delivery_agent" class="form-control b_delivery_agent" rows="4" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Place of Receipt</label>
                                                <input name="b_place_of_receipt" type="text" class="form-control b_place_of_receipt" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Port of Loading</label>
                                                <input name="b_port_of_loading" type="text" class="form-control b_port_of_loading" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Port of Discharge</label>
                                                <input name="b_port_of_discharge" type="text" class="form-control b_port_of_discharge" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Place of Delivery</label>
                                                <input name="b_place_of_delivery" type="text" class="form-control b_place_of_delivery" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Agent Stamp</label>
                                                <input name="b_agent_stamp" type="text" class="form-control b_agent_stamp" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Freight Type</label>
                                                <select name="b_freight_type" class="form-select b_freight_type">
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Unit</label>
                                                <select name="b_unit" class="form-select b_unit">
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2 mt-4">
                                                <!--<label class="form-label">Manual</label>-->
                                                <input name="b_manual" type="checkbox" value="Manual" class="form-control b_manual" placeholder="" /><span>&nbsp;&nbsp;Manual</span>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">No of Original B/L's</label>
                                                <input name="b_no_of_bl" class="form-control b_no_of_bl" type="text" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Net WT</label>
                                                <input name="b_net_wt" class="form-control b_net_wt" type="text" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Gross WT</label>
                                                <input name="b_gross_wt" class="form-control b_gross_wt" type="text" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Tare WT</label>
                                                <input name="b_tare_wt" class="form-control b_tare_wt" type="text" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">CBM</label>
                                                <input name="b_cbm" class="form-control b_cbm" type="text" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Pkgs</label>
                                                <input name="b_pkgs" class="form-control b_pkgs" type="text" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Unit</label>
                                                <input name="b_unit" class="form-control b_unit" type="text" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">HS Code</label>
                                                <input name="b_hs_code" class="form-control b_hs_code" type="text" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Packing Group</label>
                                                <select name="b_packing_group" class="form-select b_packing_group">
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Hazmat Class</label>
                                                <input name="b_hazmat_class" class="form-control b_hazmat_class" type="text" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">UNO Code</label>
                                                <input name="b_uno_code" class="form-control b_uno_code" type="text" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Marks No</label>
                                                <textarea name="b_marks_no" class="form-control b_marks_no" rows="3" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">No of Pkgs or Shipping</label>
                                                <textarea name="b_no_of_pkgs" class="form-control b_no_of_pkgs" rows="3" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Description of Goods & Pkgs</label>
                                                <textarea name="b_description" class="form-control b_description" rows="3" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Gross Weight</label>
                                                <textarea name="b_gross_weight" class="form-control b_gross_weight" rows="3" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Measurement</label>
                                                <textarea name="b_measurement" class="form-control b_measurement" rows="3" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">On Board Date</label>
                                                <input name="b_on_board_date" type="date" class="form-control b_on_board_date" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Place of Issue</label>
                                                <input name="b_place_of_issue" type="text" class="form-control b_place_of_issue" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date of Issue</label>
                                                <input name="b_date_of_issue" type="date" class="form-control b_date_of_issue" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2 mt-4">
                                                <button class="btn btn-primary btn-sm">B/L Charges</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">F.I No/Form E #</label>
                                                <input name="b_fi_no" type="text" class="form-control b_fi_no" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="b_date" type="date" class="form-control b_date" placeholder="" />
                                            </div>
                                        </div>



                                        
                                        
                                   </div>
                                </div>
                                <div class="tab-pane fade" id="ref_no" role="tabpanel" aria-labelledby="four-tab">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Invoice #</label>
                                                <input name="r_invoice_number" type="text" class="form-control r_invoice_number" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="r_inv_date" type="date" class="form-control r_date" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Export #</label>
                                                <input name="r_export_number" type="text" class="form-control r_export_number" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="r_exp_date" type="date" class="form-control r_date" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Contact #</label>
                                                <input name="r_contact_number" type="text" class="form-control r_contact_number" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="r_contact_date" type="date" class="form-control r_date" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">L/C #</label>
                                                <input name="r_lc_number" type="text" class="form-control r_lc_number" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="r_lc_date" type="date" class="form-control r_date" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Client Ref #</label>
                                                <input name="r_client_ref_number" type="text" class="form-control r_client_ref_number" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Shipper Ref #</label>
                                                <input name="r_shipper_ref_number" type="text" class="form-control r_shipper_ref_number" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">S Bill #</label>
                                                <input name="r_s_bill" type="text" class="form-control r_s_bill" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="r_date" type="date" class="form-control r_date" placeholder="" />
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
                                            <th>Stamp Date</th>
                                            <th>Remarks</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                            <td><input class="form-control" type="text" name="r_sno[]" style="width: 100%;" /></td>
                                            <td><input class="form-control" type="text" name="r_code[]" style="width: 100%;" /></td>
                                            <td><input class="form-control" type="text" name="r_stamp[]" style="width: 100%;" /></td>
                                            <td><input class="form-control" type="text" name="r_stamp_group[]" style="width: 100%;" /></td>
                                            <td><input class="form-control" type="text" name="r_stamp_date[]" style="width: 100%;" /></td>
                                            <td><input class="form-control" type="text" name="r_remarks[]" style="width: 100%;" /></td>
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

let vessel_id = $("select[name=vessel_search]").val();

$(document).ready(function(){
        
    $(".custom_select").select2({
      data: @json($vessels)
    });
    
})    

function edit_row(e,data){
    data = JSON.parse(data);
    if(data){
        $(".job_no").val(data.job_no);
        $(".status").val(data.status);
        $(".hbl").val(data.hbl);
        $(".hbl_date").val(data.hbl_date);
        $(".mbl").val(data.mbl);
        $(".mbl_date").val(data.mbl_date);
        $(".source_date").val(data.source_date);
        $(".hbl_issue").prop("checked", data.hbl_issue === "HBL-Issue");
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
        $(".final_destination").val(data.final_destination);
        $(".commodity").val(data.commodity);
        $(".reference_number").val(data.reference_number);
        $(".overseas_agent").val(data.overseas_agent);
        $(".shipping_line_carrier").val(data.shipping_line_carrier);
        $(".total_container").val(data.total_container);
        $(".delivery").val(data.delivery);
        
        // BL DETAIL TAB
        $(".b_shipper").val(data.b_shipper);
        $(".b_consignee").val(data.b_consignee);
        $(".b_notify_part1").val(data.b_notify_part1);
        $(".b_notify_part2").val(data.b_notify_part2);
        $(".b_delivery_agent").val(data.b_delivery_agent);
        $(".b_place_of_receipt").val(data.b_place_of_receipt);
        $(".b_port_of_loading").val(data.b_port_of_loading);
        $(".b_port_of_discharge").val(data.b_port_of_discharge);
        $(".b_place_of_delivery").val(data.b_place_of_delivery);
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
        
        // REF NO / STAMP
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
        
        
        $("#myForm").attr("action","{{ route('admin.bl.update') }}")
        $("input[name=id]").val(data.id);
    }
    
}


$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/bl/get";
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