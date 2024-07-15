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
                            <div class="row">
                                <input type="hidden" name="id" value="0">
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Tran #</label>
                                                <input name="tran" type="text" class="form-control tran" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Doc #</label>
                                                <input name="doc" type="text" class="form-control doc" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Year</label>
                                                <input name="year" type="text" class="form-control year" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Shipping Line Agent</label>
                                                <input name="agent" type="text" class="form-control agent" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Vessel</label>
                                                <select name="vessel" class="vessel custom_select">
                                                    <option selected disabled></option>
                                                    {{--@foreach($vessels as $value)
                                                    <option @if($vessel_id == $value->id) selected @endif value="{{ $value->id }}">{{ $value->vessel_name }}</option>
                                                    @endforeach--}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Terminals</label>
                                                <input name="terminals" type="text" class="form-control terminals" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Shipping License</label>
                                                <input name="license" type="text" class="form-control license" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Local Port</label>
                                                <input name="port" type="text" class="form-control port" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Ship Company</label>
                                                <input name="ship_company" type="text" class="form-control ship_company" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Captain Name</label>
                                                <input name="captain_name" type="text" class="form-control captain_name" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Berth/Wharf</label>
                                                <input name="berth_wharf" type="text" class="form-control berth_wharf" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Remarks</label>
                                                <textarea name="remarks" class="form-control remarks" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Same Bottom Cargo</label>
                                                <textarea name="same_bottom_cargo" class="form-control same_bottom_cargo" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Manifest Ref#</label>
                                                <input name="manifest_ref" type="text" class="form-control manifest_ref" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Shad No</label>
                                                <input name="shad_no" type="text" class="form-control shad_no" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Ground Date</label>
                                                <input name="ground_date" type="date" class="form-control ground_date" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Docs Rcvd From S/Line</label>
                                                <input name="docs_rcvd" type="date" class="form-control docs_rcvd" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Time</label>
                                                <input name="time" type="time" class="form-control time" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Agent Code</label>
                                                <input name="agent_code" type="text" class="form-control agent_code" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Line Code</label>
                                                <input name="line_code" type="text" class="form-control line_code" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Cost Center</label>
                                                <select name="cost_center" class="form-select cost_center">
                                                    <option value="">Head Office</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Custom Report</label>
                                                <select name="custom_report" class="form-select custom_report">
                                                    <option value="Manifest">Manifest</option>
                                                    <option value="Loading List">Loading List</option>
                                                    <option value="Manifest Summary">Manifest Summary</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Operation</label>
                                                <select name="operation" class="form-select operation">
                                                    <option Selected></option>
                                                    <option value="sea-import">Sea Import</option>
                                                    <option value="sea-export">Sea Export</option>
                                                    <option value="air-import">Air Import</option>
                                                    <option value="air-export">Air Export</option>
                                                    <option value="logistics">Logistics</option>
                                                    <option value="warehouse">Warehouse</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Book No</label>
                                                <input name="book_no" type="text" class="form-control book_no" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Voyage#</label>
                                                <input name="voyage_no" type="text" class="form-control voyage_no" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">ETD Date</label>
                                                <input name="etd_date" type="date" class="form-control etd_date" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">EGM Date</label>
                                                <input name="egm_date" type="date" class="form-control egm_date" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">EGM No</label>
                                                <input name="egm_no" type="text" class="form-control egm_no" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Seq No</label>
                                                <input name="seq_no" type="text" class="form-control seq_no" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">No of Install</label>
                                                <input name="install_count" type="text" class="form-control install_count" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">VIR No</label>
                                                <input name="vir_no" type="text" class="form-control vir_no" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Date of Amendment</label>
                                                <input name="date_of_amendment" type="date" class="form-control date_of_amendment" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Operator Code</label>
                                                <input name="operator_code" type="text" class="form-control operator_code" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Guarantee</label>
                                                <input name="guarantee" type="text" class="form-control guarantee" />
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Pre Alert Date</label>
                                                <input name="pre_alert_date" type="date" class="form-control pre_alert_date" />
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-12">
                                            <div class="mb-2 mt-4">
                                                <button type="button" class="btn btn-primary">Clear</button>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary btn-sm">Show Manifest List</button>
                                            <button type="button" id="se_job_btn" class="btn btn-primary btn-sm mx-4">Show Jobs</button>
                                            <button type="button" class="btn btn-primary btn-sm">Show Summary</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            

                        </div>
                    </div>
                </form>
                
            </div>
         
            
            <div class="col-md-12">
                <div id="job_allocation" class="card mt-3">
                    <div class="card-body">
                        <h5 class="text-center">Job Allocation</h5>
                        <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">HBL/Index</button>
                          </li>
                          <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-subcompany" aria-controls="navs-top-subcompany" aria-selected="false">Master B/Ls</button>
                          </li>
                        </ul>
                        <div class="tab-content">
                              <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                                <div class="card-datatable table-responsive pt-0">
                                    
                                    <table class="datatables-basic table" style="width: 200%;">
                                    <thead>
                                      <tr>
                                        <th>...</th>
                                        <th>S.No</th>
                                        <th>Job #</th>
                                        <th>Job Date</th>
                                        <th>Job Nature</th>
                                        <th>HBL #</th>
                                        <th>HBL Date</th>
                                        <th>Client Name</th>
                                        <th>Volume</th>
                                        <th>Packages</th>
                                        <th>Port of Discharge</th>
                                        <th>Port of Receipt</th>
                                        <th>Total Container</th>
                                        <th>20FT</th>
                                        <th>40FT</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="h_job_no[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="h_job_date[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="h_job_nature[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="h_hbl_no[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="h_hbl_date[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="h_client_name[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="h_volume[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="h_packages[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="h_port_of_discharge[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="h_port_of_receipt[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="h_total_container[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="h_20ft" class="form-control[]" type="text" style="width: 100%;"/></td>
                                            <td><input name="h_40ft" class="form-control[]" type="text" style="width: 100%;"/></td>
                                        </tr>
                                    </tbody>
                                </table>
                                  
                                </div>
                              </div>
                              <div class="tab-pane fade" id="navs-top-subcompany" role="tabpanel">
                                <table class="datatables-basic table" style="width:150%; overflow:scroll;">
                                    <thead>
                                      <tr>
                                        <th>...</th>  
                                        <th>S.No</th>
                                        <th>Job #</th>
                                        <th>Job Date</th>
                                        <th>Job Nature</th>
                                        <th>Job Type</th>
                                        <th>MBL #</th>
                                        <th>MBL Date</th>
                                        <th>Destuffing Date</th>
                                        <th>Total HBL</th>
                                        <th>Volume</th>
                                        <th>Total Container</th>
                                        <th>20FT</th>
                                        <th>40FT</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="m_job_no[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="m_job_date[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="m_job_nature[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="m_job_type[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="m_mbl_no[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="m_mbl_date[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="m_destuffing_date[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="m_total[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="m_volume[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="m_total_cont[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="m_20ft[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="m_40ft[]" class="form-control" type="text" style="width: 100%;"/></td>
                                        </tr>    
                                    </tbody>
                                </table>
                                  
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Manifest List</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
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
  </div>
</div>
    
@endsection


@push('script') 
<script type="text/javascript">

let vessel_id = $("select[name=vessel_search]").val();

$(document).ready(function(){
    
    $(".custom_select").select2({
      data: @json($vessels)
    });
    
    var datatable = $('.quotation_record').DataTable({
        select: {
            style: 'api'
        },
        "processing": true,
        "serverSide": true,
        "lengthChange": false,
        "searching":false,
        "pageLength": 15,
        "scrollX": true,
        "ajax": {
            "url": "{{ route('admin.manifest.create') }}",
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
                data: 'operation',
                title: 'Operation'
            },
            {
                data: 'agent',
                title: 'ShippingLine Agent'
            },
            {
                data: 'year',
                title: 'Year'
            },
            {
                data: 'vessel',
                title: 'Vessel'
            },
            {
                data: 'license',
                title: 'ShippingLicens'
            },
            {
                data: 'manifest_ref',
                title: 'Manifest Ref'
            },
          
        ],          
         "rowCallback": function(row, data) {
             $(row).attr("onclick",`edit_row(this,'${JSON.stringify(data)}')`)
         }
    });
});

function edit_row(e,data){
    data = JSON.parse(data);
    if(data){
        $(".tran").val(data.tran);
        $(".doc").val(data.doc);
        $(".year").val(data.year);
        $(".agent").val(data.agent);
        $(".vessel").val(data.vessel);
        $(".voy").val(data.voy);
        $(".port_of_discharge").val(data.port_of_discharge);
        $(".port_of_loading").val(data.port_of_loading);
        $(".terminals").val(data.terminals);
        $(".license").val(data.license);
        $(".port").val(data.port);
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
        $(".voyage_no").val(data.voyage_no);
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
        
        $("#myForm").attr("action","{{ route('admin.manifest.update') }}")
        $("input[name=id]").val(data.id);
    }
    
}

$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/manifest/get";
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