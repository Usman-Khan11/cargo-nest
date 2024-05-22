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
            <div class="col-md-7">
                <form id="myForm" method="post" action="{{ route('admin.manifest.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bold">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
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
                                        <input name="vessel" type="text" class="form-control vessel" placeholder="" />
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
                    </div>
                </form>
                <div class="mt-3">
                    <button id="manifest_list_btn" class="btn btn-primary btn-sm">Show Manifest List</button>
                    <button id="se_job_btn" class="btn btn-primary btn-sm mx-4">Show Jobs</button>
                    <button class="btn btn-primary btn-sm">Show Summary</button>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="mb-2">
                                    <label class="form-label">Operation</label>
                                    <select name="operation" class="form-select">
                                        <option value="">Sea Export</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-2">
                                    <label class="form-label">Book No</label>
                                    <input name="book_no" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-2">
                                    <label class="form-label">Voyage#</label>
                                    <input name="voyage_no" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-2">
                                    <label class="form-label">ETD Date</label>
                                    <input name="etd_date" type="date" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-2">
                                    <label class="form-label">EGM Date</label>
                                    <input name="egm_date" type="date" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-2">
                                    <label class="form-label">EGM No</label>
                                    <input name="egm_no" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-2">
                                    <label class="form-label">Seq No</label>
                                    <input name="seq_no" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-2">
                                    <label class="form-label">No of Install</label>
                                    <input name="install_count" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-2">
                                    <label class="form-label">VIR No</label>
                                    <input name="vir_no" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-2">
                                    <label class="form-label">Date of Amendment</label>
                                    <input name="date_of_amendment" type="date" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-2">
                                    <label class="form-label">Operator Code</label>
                                    <input name="operator_code" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-2">
                                    <label class="form-label">Guarantee</label>
                                    <input name="guarantee" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-5 col-12">
                                <div class="mb-2">
                                    <label class="form-label">Pre Alert Date</label>
                                    <input name="pre_alert_date" type="date" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-7 col-12">
                                <div class="mb-2 mt-4">
                                    <button class="btn btn-primary">Clear</button>
                                </div>
                            </div>


                            
                        </div>
                    </div>
                </div>
                <div class="card mt-3" id="manifest_list">
                    <div class="card-body">
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
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
                                    </tbody>
                                </table>
                                  
                                </div>
                              </div>
                              <div class="tab-pane fade" id="navs-top-subcompany" role="tabpanel">
                                <table class="datatables-basic table" style="width:150%; overflow:scroll;">
                                    <thead>
                                      <tr>
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
                </div>
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
                data: 'DT_RowIndex',
                title: 'Sr No'
            },
            {
                data: 'tran',
                title: 'Tran'
            },
            {
                data: 'doc',
                title: 'Doc'
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
                data: 'terminals',
                title: 'Terminals'
            },
            {
                data: 'ship_company',
                title: 'Ship Company'
            },
            {
                data: 'captain_name',
                title: 'Captain Name'
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
        $(".tran input[name='tran']").val(data.tran);
        $(".doc input[name='doc']").val(data.doc);
        $(".year input[name='year']").val(data.year);
        $(".agent input[name='agent']").val(data.agent);
        $(".vessel input[name='vessel']").val(data.vessel);
        $(".voy input[name='voy']").val(data.voy);
        $(".port_of_discharge input[name='port_of_discharge']").val(data.port_of_discharge);
        $(".port_of_loading input[name='port_of_loading']").val(data.port_of_loading);
        $(".terminals input[name='terminals']").val(data.terminals);
        $(".license input[name='license']").val(data.license);
        $(".port input[name='port']").val(data.port);
        $(".ship_company input[name='ship_company']").val(data.ship_company);
        $(".captain_name input[name='captain_name']").val(data.captain_name);
        $(".berth_wharf input[name='berth_wharf']").val(data.berth_wharf);
        $(".remarks textarea[name='remarks']").val(data.remarks);
        $(".same_bottom_cargo textarea[name='same_bottom_cargo']").val(data.same_bottom_cargo);
        $(".manifest_ref input[name='manifest_ref']").val(data.manifest_ref);
        $(".shad_no input[name='shad_no']").val(data.shad_no);
        $(".ground_date input[name='ground_date']").val(data.ground_date);
        $(".docs_rcvd input[name='docs_rcvd']").val(data.docs_rcvd);
        $(".time input[name='time']").val(data.time);
        $(".agent_code input[name='agent_code']").val(data.agent_code);
        $(".line_code input[name='line_code']").val(data.line_code);
        $(".cost_center select[name='cost_center']").val(data.cost_center);
        $(".custom_report select[name='custom_report']").val(data.custom_report);
        $("#myForm").attr("action","{{ route('admin.manifest.update') }}")
        $("input[name=id]").val(data.id);
    }
    
}


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