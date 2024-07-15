@extends('admin.layouts.app')


@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/loading_program/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/loading_program/delete')">
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
                <form id="myForm" method="post" action="{{ route('admin.loading_program.store') }}" enctype="multipart/form-data">
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
                                                <label class="form-label">Job #</label>
                                                <input name="job_no" type="text" class="form-control job-no" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Local Custom</label>
                                                <input name="local_custom" type="text" class="form-control local_custom" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Wharf</label>
                                               <select name="wharf" class="form-select wharf">
                                                    <option>dummy</option>
                                                    <option>dummy</option>
                                                    <option>dummy</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                               <label class="form-label">Port of Discharge</label>
                                                <input name="port_of_discharge" type="text" class="form-control port_of_discharge" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Loading Terminal</label>
                                                <input name="loading_terminal" type="text" class="form-control loading_terminal" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Discharge Terminal</label>
                                                <input name="discharge_terminal" type="text" class="form-control discharge_terminal" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Loading Date</label>
                                                <input name="loading_date" type="date" class="form-control loading_date" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                 <label class="form-label">Book #</label>
                                                <input name="book_no" class="form-control book_no" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Loading Time</label>
                                                <input name="loading_time" type="time" class="form-control loading_time" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Gate Pass</label>
                                                <input name="gate_pass" type="text" class="form-control gate_pass" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Arrival Date</label>
                                                <input name="arrival_date" type="date" class="form-control arrival_date" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                               <label class="form-label">Gate Pass Date</label>
                                                <input name="gate_pass_date" type="date" class="form-control gate_pass_date" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                 <label class="form-label">CRO Issue Date</label>
                                                <input name="cro_issue_date" type="date" class="form-control cro_issue_date" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Letter</label>
                                                <input name="letter" type="text" class="form-control letter" placeholder="" />    
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Expiry Date</label>
                                                <input name="expiry_date" type="date" class="form-select expiry_date" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">CRO #</label>
                                                <input name="cro_no" type="text" class="form-select cro_no" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">EGM #</label>
                                                <input name="egm_no" type="text" class="form-select egm_no" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Validity Date</label>
                                                <input name="validity_date" type="date" class="form-select validity_date" />
                                            </div>
                                        </div>
                                        
                                        <!---->
                                        
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                               <label class="form-label">ETD</label>
                                                <input name="etd" type="date" class="form-select etd" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Cut Off Date</label>
                                                <input name="cut_off_date" type="date" class="form-select cut_off_date" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Cut Off Time</label>
                                                <input name="cut_off_time" type="time" class="form-select cut_off_time" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Berth</label>
                                                <input name="berth" type="text" class="form-control berth" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Via Port/label>
                                                <input name="via_port" type="text" class="form-control via_port" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Container Info</label>
                                                <input name="container_info" type="text" class="form-control container_info" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Port Of Receipt</label>
                                                <input name="port_of_receipt" type="text" class="form-control port_of_receipt" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Special Instruction</label>
                                                <textarea name="special_instruction" type="text" class="form-control special_instruction"> </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Text 1</label>
                                                <textarea name="text_one" type="text" class="form-control text_one"></textarea>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Cargo Status</label>
                                                <select name="cargo_status" class="form-select cargo_status">
                                                    <option>LCL/LCL</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Loading Flag</label>
                                                <input name="loading_flag" type="text" class="form-control loading_flag" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Status</label>
                                                    <br>
                                                  <input class="form-check-input" type="radio" name="status" id="ok">
                                                  <label class="form-check-label" for="ok">OK</label>
                                                  <input class="form-check-input" type="radio" name="status" id="cancel" checked>
                                                  <label class="form-check-label" for="cancel">Cancel</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Cost Center</label>
                                                <select name="cost_center" class="form-select cost_center">
                                                    <option>Head Office</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Alloc Available</label>
                                                <select name="alloc_available" class="form-select alloc_available">
                                                    <option>YES</option>
                                                    <option>NO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Cont Available</label>
                                                <select name="cont_available" class="form-select cont_available">
                                                    <option>YES</option>
                                                    <option>NO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">SOB Date</label>
                                                <input name="sob_date" type="date" class="form-control sob_date" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Container Split</label>
                                                <input name="container_split" type="text" class="form-control container_split" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">B/L Required</label>
                                                <input name="bl_required" type="text" class="form-control bl_required" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Container WT</label>
                                                <br>
                                                  <input class="form-check-input" type="radio" name="container_wt" id="estimated">
                                                  <label class="form-check-label" for="estimated">Estimated</label>
                                                  <br>
                                                  <input class="form-check-input" type="radio" name="container_wt" id="actual" checked>
                                                  <label class="form-check-label" for="actual">Actual</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Custom Clearance</label>
                                                <input name="custom_clearance" type="text" class="form-control custom_clearance" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Container Pickup</label>
                                                <input name="container_pickup" type="text" class="form-control container_pickup" />
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Port Of Loading</label>
                                                <input name="port_of_loading" type="text" class="form-control port_of_loading" />
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Container Temperature</label>
                                                <input name="container_temperature" type="text" class="form-control container_temperature" />
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-12">
                                            <div class="mb-2">
                                            <label class="form-label">Vent</label>
                                            <input name="vent" type="text" class="form-control vent" />
                                        </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="mt-3" style="display:flex; align-items:center; gap:4rem">
                                                <div>
                                                    <input class="form-check-input" type="checkbox" value="" id="text_1" name="text_1">
                                                    <label class="form-check-label" for="text_1">Text 1</label>
                                                </div>
                                                <div>
                                                  <input class="form-check-input" type="checkbox" value="" id="loading_terms" name="loading_terms" checked>
                                                  <label class="form-check-label" for="loading_terms_1">Loading Terms</label>
                                                </div>
                                              <button type="button" class="btn btn-primary">Edit</button>
                                        </div>
                                        </div>
                                        <div class="col-md-7 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Loading Terms</label> 
                                                <textarea name="loading_terms_2" type="text" class="form-control loading_terms"></textarea>
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
        "searching":false,
        "pageLength": 15,
        "scrollX": true,
        "ajax": {
            "url": "{{ route('admin.loading_program.create') }}",
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
        $(".job_no").val(data.job_no);
        $(".local_custom").val(data.local_custom);
        $(".wharf").val(data.wharf);
        $(".port_of_discharge").val(data.port_of_discharge);
        $(".loading_terminal").val(data.loading_terminal);
        $(".discharge_terminal").val(data.discharge_terminal);
        $(".loading_date").val(data.loading_date);
        $(".book_no").val(data.book_no);
        $(".loading_time").val(data.loading_time);
        $(".gate_pass").val(data.gate_pass);
        $(".arrival_date").val(data.arrival_date);
        $(".gate_pass_date").val(data.gate_pass_date);
        $(".cro_issue_date").val(data.cro_issue_date);
        $(".letter").val(data.letter);
        $(".expiry_date").val(data.expiry_date);
        $(".cro_no").val(data.cro_no);
        $(".egm_no").val(data.egm_no);
        $(".validity_date").val(data.validity_date);
        $(".etd").val(data.etd);
        $(".cut_off_date").val(data.cut_off_date);
        $(".cut_off_time").val(data.cut_off_time);
        
        $(".berth").val(data.berth);
        $(".via_port").val(data.via_port);
        $(".container_info").val(data.container_info);
        $(".port_of_receipt").val(data.port_of_receipt);
        $(".special_instruction").val(data.special_instruction);
        
        // 
        
        $(".text_one").val(data.text_one);
        $(".cargo_status").val(data.cargo_status);
        $(".loading_flag").val(data.loading_flag);
        $(".status").prop("checked", data.status);
        $(".cost_center").val(data.cost_center);
        
        
        
        $(".alloc_available").val(data.alloc_available);
        $(".cont_available").val(data.cont_available);
        $(".sob_date").val(data.sob_date);
        $(".container_split").val(data.container_split);
        
        
        $(".bl_required").val(data.bl_required);
        $(".container_wt").prop("checked", data.container_wt);
        $(".custom_clearance").val(data.custom_clearance);
        
        
        $(".container_pickup").val(data.container_pickup);
        $(".port_of_loading").val(data.port_of_loading);
        $(".container_temperature").val(data.container_temperature);
        $(".vent").val(data.vent);
        
        
        if(data.text_1){
            $(".text_1").removeAttr('checked');
            $(.text_1[value=${data.text_1}]).attr('checked',true);
        }
        else{
            $(".text_1").removeAttr('checked');
        }
        
         if(data.loading_terms_1){
            $(".loading_terms_1").removeAttr('checked');
            $(.loading_terms_1[value=${data.loading_terms_1}]).attr('checked',true);
        }
        else{
            $(".loading_terms_1").removeAttr('checked');
        }
        
        
        
        $(".loading_terms_2").val(data.loading_terms_2);
        
        
        
        $("#myForm").attr("action","{{ route('admin.loading_program.update') }}")
        $("input[name=id]").val(data.id);
    }
    
}

$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/loading_program/get";
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