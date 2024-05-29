@extends('admin.layouts.app')


@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/cro/store')"">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark">
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
            <div class="col-md-6">
                <form id="myForm" method="post" action="{{ route('admin.cro.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bold">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" />
                            <div class="row">
                                <div class="col-md-2 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">CRO No</label>
                                        <input name="cro_no" type="text" class="form-control cro_no" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">CRO Type</label>
                                        <select name="cro_type" class="form-select cro_type">
                                            <option value="job_booking">Against Job Booking</option>
                                            <option value="empty_movement">For Empty Movement</option>
                                            <option value="sale_off_hire">For Sale/Off-Hire</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Job#</label>
                                        <input name="job_number" type="text" class="form-control job_number" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Client</label>
                                        <input name="client" type="text" class="form-control client" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Issue Date</label>
                                        <input name="issue_date" type="date" class="form-control issue_date" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">CRO Valid For</label>
                                        <input name="cro_valid_for" type="text" class="form-control cro_valid_for" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Ref No</label>
                                        <input name="ref_number" type="text" class="form-control ref_number" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Equip Qty</label>
                                        <input name="equip_qty" type="text" class="form-control equip_qty" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Size Type</label>
                                        <input name="size_type" type="text" class="form-control size_type" />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                      <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">CRO Details</button>
                                    </li>
                                    <li class="nav-item">
                                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-subcompany" aria-controls="navs-top-subcompany" aria-selected="false">Gate Pass Detail</button>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Overseas Agent</label>
                                                    <input name="overseas_agent" type="text" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Clearing Agent</label>
                                                    <input name="clearing_agent" type="text" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Shipper</label>
                                                    <input name="shipper" type="text" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Pickup Location</label>
                                                    <input name="pickup_location" type="text" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Port of Loading</label>
                                                    <input name="port_of_loading" type="text" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Port of Discharge</label>
                                                    <input name="port_of_discharge" type="text" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Final Destination</label>
                                                    <input name="final_destination" type="text" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Commodity</label>
                                                    <input name="commodity" type="text" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Terminal</label>
                                                    <input name="terminal" type="text" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Empty Depot</label>
                                                    <input name="empty_depot" type="text" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Transporter</label>
                                                    <input name="transporter" type="text" class="form-control" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="navs-top-subcompany" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-4 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Book No</label>
                                                    <input name="book_no" type="text" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Gate Pass#</label>
                                                    <input name="gate_pass" type="text" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Date</label>
                                                    <input name="date" type="date" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Letter No</label>
                                                    <input name="letter_no" type="text" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Licence No</label>
                                                    <input name="licence_no" type="text" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Job No</label>
                                                    <input name="job_no" type="text" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Expiry Date</label>
                                                    <input name="expiry_date" type="date" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Shipping Agent</label>
                                                    <input name="shipping_agent" type="text" class="form-control" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-md-4 col-12">
                                    <label class="form-label">Cargo Type:</label><br>
                                    <div class="mb-3 d-flex">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input cargo_type" type="radio" name="cargo_type" id="general" value="general">
                                            <label class="form-check-label" for="general">General</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input cargo_type" type="radio" name="cargo_type" id="hazardous" value="hazardous">
                                            <label class="form-check-label" for="hazardous">Hazardous</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Vessel</label>
                                        <select name="vessel" class="form-select">
                                            <option selected disabled></option>
                                            @foreach($vessels as $vessel)
                                                <option value="{{ $vessel->id }}">{{ $vessel->vessel_name }}</option> 
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Voyage</label>
                                        <select name="voyage" class="form-select">
                                            <option selected disabled></option>
                                            @foreach($voyages as $voyage)
                                                <option value="{{ $voyage->id }}">{{ $voyage->voy }}</option> 
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Sailing Date</label>
                                        <input name="sailing_date" type="date" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="mb-3 mt-4 d-flex">
                                        <div>
                                            <input name="manual" value="Manual" type="checkbox" class="form-check-input Manual" /><span>&nbsp;&nbsp;Manual</span>
                                        </div>
                                        <div class="mx-2">
                                            <input name="manual_box" type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-3 mt-4">
                                        <button class="btn btn-primary btn-sm">Upload</button>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="mb-3 d-flex justify-content-between">
                                        <div>
                                            <input name="print_logo" value="Print-Logo" type="checkbox" class="form-check-input print_logo" class="form-check-input" /><span>&nbsp;&nbsp;Print Logo</span>
                                        </div>
                                        <div class="mx-2">
                                            <input name="continue_mode" Value="Continue-Mode" type="checkbox" class="form-check-input continue_mode" /><span>&nbsp;&nbsp;Continue Mode</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <label class="form-label">Haulage Instructions</label>
                                    <textarea name="haulage" rows="5" type="text" class="form-control"></textarea>
                                </div>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="card" id="manifest_list">
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
            <div class="col-md-12">
                <div id="job_allocation" class="card mt-3">
                    <div class="card-body">
                        <table class="datatables-basic table">
                            <thead>
                              <tr>
                                <th>...</th>
                                <th>S.No</th>
                                <th>Container No.</th>
                                <th>Container Size</th>
                              </tr>
                            </thead>
                            <tbody>
                                <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
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
            "url": "{{ route('admin.cro.create') }}",
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
                data: 'cro_no',
                title: 'Cro No'
            },
            {
                data: 'cro_type',
                title: 'Cro Type'
            },
            {
                data: 'job_number',
                title: 'Job Number'
            },
            {
                data: 'client',
                title: 'Client'
            },
            {
                data: 'issue_date',
                title: 'Issue Date'
            },
        ],          
         "rowCallback": function(row, data) {
             $(row).attr("onclick",`edit_row(this,'${JSON.stringify(data)}')`)
         }
    });
});

function edit_row(e, data) {
  data = JSON.parse(data);
  if (data) {
    $(".cro_no").val(data.cro_no);
    $(".cro_type").val(data.cro_type);
    $(".job_number").val(data.job_number);
    $(".client").val(data.client);
    $(".issue_date").val(data.issue_date);
    $(".cro_valid_for").val(data.cro_valid_for);
    $(".ref_number").val(data.ref_number);
    $(".equip_qty").val(data.equip_qty);
    $(".size_type").val(data.size_type);
    $(".overseas_agent").val(data.overseas_agent);
    $(".clearing_agent").val(data.clearing_agent);
    $(".shipper").val(data.shipper);
    $(".pickup_location").val(data.pickup_location);
    $(".port_of_loading").val(data.port_of_loading);
    $(".port_of_discharge").val(data.port_of_discharge);
    $(".final_destination").val(data.final_destination);
    $(".commodity").val(data.commodity);
    $(".terminal").val(data.terminal);
    $(".empty_depot").val(data.empty_depot);
    $(".transporter").val(data.transporter);
    $(".book_no").val(data.book_no);
    $(".gate_pass").val(data.gate_pass);
    $(".date").val(data.date);
    $(".letter_no").val(data.letter_no);
    $(".licence_no").val(data.licence_no);
    $(".job_no").val(data.job_no);
    $(".expiry_date").val(data.expiry_date);
    $(".shipping_agent").val(data.shipping_agent);
    
    $(".cargo_type").removeAttr('checked');
    $(`.cargo_type[value=${data.cargo_type}]`).attr('checked',true);
        
    $(".vessel").val(data.vessel);
    $(".voyage").val(data.voyage);
    $(".sailing_date").val(data.sailing_date);

    $(".manual").removeAttr('checked');
    $(`.manual[value=${data.manual}]`).attr('checked',true);

    $(".print_logo").removeAttr('checked');
    $(`.print_logo[value=${data.print_logo}]`).attr('checked',true);
    
    $(".continue_mode").removeAttr('checked');
    $(`.continue_mode[value=${data.continue_mode}]`).attr('checked',true);
    
    $(".haulage").val(data.haulage);
    $("#myForm").attr("action", "{{ route('admin.cro.update') }}");
    $("input[name=id]").val(data.id);
  }
}

 $('#submitButton').click(function(){
        // Trigger form submission
        $('#myForm').submit();
      });

$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/cro/get";
  let type = $(this).attr("data-type");
  let data = getList(route, type, id);
  if (data != null) {
    edit_row("", JSON.stringify(data));
  }
});


</script>

@endpush