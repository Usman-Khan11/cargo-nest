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
                                                        <input name="job" type="text" class="form-control" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">HBL#</label>
                                                        <input name="hbl" type="text" class="form-control" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Counter</label>
                                                        <input name="counter" type="text" class="form-control" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">HBL Date</label>
                                                        <input name="hbl_date" type="date" class="form-control" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">SW/HBL#.</label>
                                                        <input name="hbl_date" type="date" class="form-control" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">MBL#</label>
                                                        <input name="mbl" type="text" class="form-control" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Manual SW/HBL#.</label>
                                                        <input name="hbl_date" type="date" class="form-control" placeholder="" />
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
                                                        <input name="shipper" type="text" class="form-control" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Consignee</label>
                                                        <input name="consignee" type="text" class="form-control" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Notify Part 1</label>
                                                        <input name="notify1" type="text" class="form-control" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">SLine/Carrier</label>
                                                        <input name="notify2" type="text" class="form-control" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Vessel</label>
                                                        <input name="vessel" type="text" class="form-control" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Sailing Date</label>
                                                        <input name="sailing_date" type="date" class="form-control" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Voyage</label>
                                                        <input name="voyage" type="text" class="form-control" placeholder="" />
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
                                                        <input name="pol" type="text" class="form-control" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">POFD</label>
                                                        <input name="pofd" type="text" class="form-control" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">POT</label>
                                                        <input name="pot" type="text" class="form-control" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Reference #</label>
                                                        <input name="reference_number" type="text" class="form-control" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Overseas Agent</label>
                                                        <input name="overseas_agent" type="text" class="form-control" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Total Container</label>
                                                        <input name="total_container" type="text" class="form-control" placeholder="" />
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
                                                <td><input type="text" style="width: 100%;"/></td>
                                                <td><input type="text" style="width: 100%;"/></td>
                                                <td><input type="text" style="width: 100%;"/></td>
                                                <td><input type="text" style="width: 100%;"/></td>
                                                <td><input type="text" style="width: 100%;"/></td>
                                            </tbody>
                                        </table>
                                    </div>    
                                </div>
                                <div class="tab-pane fade" id="bl_detail" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Shipper</label>
                                                <textarea name="shipper" class="form-control" rows="4" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Consignee</label>
                                                <textarea name="consignee" class="form-control" rows="4" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Notify Part(1)</label>
                                                <textarea name="notify_part1" class="form-control" rows="4" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Notify Part(2)</label>
                                                <textarea name="notify_part2" class="form-control" rows="4" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Delivery Agent</label>
                                                <textarea name="notify_part2" class="form-control" rows="4" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Port of Loading</label>
                                                <input name="port_of_loading" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Port of Discharge</label>
                                                <input name="port_of_discharge" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Place of Delivery</label>
                                                <input name="place_of_delivery" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Agent Stamp</label>
                                                <input name="agent_stamp" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Freight Type</label>
                                                <select name="freight_type" class="form-select">
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Unit</label>
                                                <select name="unit" class="form-select">
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2 mt-4">
                                                <!--<label class="form-label">Manual</label>-->
                                                <input name="manual" type="checkbox" class="" placeholder="" /><span>&nbsp;&nbsp;Manual</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">No of Original B/L's</label>
                                                <input name="no_of_bl" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Freight Payable At</label>
                                                <input name="freight_payable_at" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Place of Receipt</label>
                                                <input name="place_of_receipt" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Marks of No. Container No's</label>
                                                <textarea name="container_marks" class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">No of Pkgs or Shipping Units</label>
                                                <textarea name="package_count" class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Description Of Goods & Packages</label>
                                                <textarea name="goods_description" class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Gross Weight</label>
                                                <textarea name="gross_weight" class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Measurement</label>
                                                <textarea name="measurement" class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                         <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">On Board Date</label>
                                                <input name="on_board_date" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Place And Date of Issue</label>
                                                <input name="place_and_date_of_issue" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Date</label>
                                                <input name="date" type="date" class="form-control">
                                            </div>
                                        </div>
                                    
                                        
                                   </div>
                                </div>
                                <div class="tab-pane fade" id="ref_no" role="tabpanel" aria-labelledby="four-tab">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Invoice #</label>
                                                <input name="invoice_number" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="date" type="date" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Export #</label>
                                                <input name="export_number" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="date" type="date" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Contact #</label>
                                                <input name="contact_number" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="date" type="date" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">L/C #</label>
                                                <input name="lc_number" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="date" type="date" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Client Ref #</label>
                                                <input name="client_ref_number" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Shipper Ref #</label>
                                                <input name="shipper_ref_number" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">S Bill #</label>
                                                <input name="s_bill" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date</label>
                                                <input name="date" type="date" class="form-control" placeholder="" />
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