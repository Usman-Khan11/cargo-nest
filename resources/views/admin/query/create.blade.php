@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/query/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/query/delete')">
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
            <div class="col-md-7">
                <form id="myForm" method="post" action="{{ route('admin.query.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0"/>
                            <div class="row">
                           
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label>Operation Type</label>
                                        <input type="text" name="operation_type" id="" class="form-control operation_type">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label>File</label>
                                        <input type="text" name="file" id="" class="form-control file">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label>Client :</label>
                                        <input type="text" name="client" id="" class="form-control client">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label>Manifest # :</label>
                                        <input type="text" name="manifest_no" id="" class="form-control manifest_no">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label>Index:</label>
                                        <input type="text" name="index" id="" class="form-control index">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label>IMG No:</label>
                                        <input type="text" name=" img_no" id="" class="form-control img_no">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label>Booking:</label>
                                        <input type="text" name=" booking" id="" class="form-control booking">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label>HBL#:</label>
                                        <input type="text" name=" hbl" id="" class="form-control hbl">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label>MBL#:</label>
                                        <input type="text" name=" mbl" id="" class="form-control mbl">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label>Job#:</label>
                                        <input type="text" name="job_no" id="" class="form-control 	job_no">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label>L/C:</label>
                                        <input type="text" name="lc" id="" class="form-control lc">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="mb-2">
                                        <label>Customer Referance#:</label>
                                        <input type="text" name=" customer_referance_no" id="" class="form-control customer_referance_no">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label>Shipper</label>
                                        <input type="text" name=" shipper" id="" class="form-control shipper">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label>Consignee</label>
                                        <input type="text" name=" consignee" id="" class="form-control consignee">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label>Port of Loading :</label>
                                        <input type="text" name=" port_of_loading" id="" class="form-control 	port_of_loading">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label>Port of discharging :</label>
                                        <input type="text" name="port_of_discharging" id="" class="form-control port_of_discharging">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label>Forword/coloader :</label>
                                        <input type="text" name="forword_coloader" id="" class="form-control forword_coloader">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label>Sales Rep :</label>
                                        <input type="text" name="sale_rep" id="" class="form-control sale_rep">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label>Commodity :</label>
                                        <input type="text" name="commodity" id="" class="form-control commodity">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label>Vessel :</label>
                                        <input type="text" name="vessel" id="" class="form-control 	vessel">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label>Custom clearance :</label>
                                        <input type="text" name=" custom_clearance" id="" class="form-control custom_clearance">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label>Voyage</label>
                                        <input type="text" name=" voyage" id="" class="form-control voyage">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label>Console Id</label>
                                        <input type="text" name=" console_id" id="" class="form-control console_id">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label>Container#:</label>
                                        <input type="text" name=" container_no" id="" class="form-control container_no">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label>Sub BL#:</label>
                                        <input type="text" name=" sub_bl_no" id="" class="form-control sub_bl_no">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label>overseas Agent :</label>
                                        <input type="text" name=" overseas_agent" id="" class="form-control overseas_agent">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label>Carrier :</label>
                                        <input type="text" name=" carrier" id="" class="form-control carrier">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label>Local Vendor :</label>
                                        <input type="text" name=" local_vendor" id="" class="form-control local_vendor">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label>Remarks :</label>
                                        <textarea type="text" name=" remarks" rows="5" id="" class="form-control remarks"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label>Cargo Manifest Remark :</label>
                                        <textarea type="text" name="cargo_manifest_remark" rows="5" id="" class="form-control cargo_manifest_remark"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label>Traacing Notes :</label>
                                        <textarea type="text" name=" traacing_notes"  rows="5" id="" class="form-control traacing_notes"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-2">
                                        <label class="form-label">Job Sub Type:</label>
                                        <div class="mb-3 d-flex">
                                            <label class="form-check-label">
                                                <input type="radio" name=" job_sub_type" value="template" class="form-check-input job_sub_type">
                                                All
                                            </label>
                                            <label class="form-check-label px-3">
                                                <input type="radio" name=" job_sub_type" value="manual" class="form-check-input job_sub_type">
                                                LCL
                                            </label>
                                            <label class="form-check-label px-3">
                                                <input type="radio" name=" job_sub_type" value="manual" class="form-check-input job_sub_type">
                                                FCL
                                            </label>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <div class="card">
                    
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
                                        <td></td>
                                       
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    $('#submitButton').click(function(){
        // Trigger form submission
        $('#myForm').submit();
      });
      
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
            "url": "{{ route('admin.query.create') }}",
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
                data: 'operation_type',
                title: 'Operation Type'
            },
            {
                data: 'file',
                title: 'File:'
            },
            {
                data: 'client',
                title: 'Client'
            },
            {
                data: 'manifest_no',
                title: 'Manifest No'
            },
            {
                data: 'index',
                title: 'Index'
            },
            {
                data: 'img_no',
                title: 'Img No'
            },
            {
                data: 'booking',
                title: 'Booking'
            },
            {
                data: 'hbl',
                title: 'HBL#'
            },
            {
                data: 'mbl',
                title: 'MBL#'
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
        $(".operation_type").val(data.operation_type);
        $(".file").val(data.file);
        $(".client").val(data.client);
        $(".manifest_no").val(data.manifest_no);
        $(".index").val(data.index);
        $(".img_no").val(data.img_no);
        $(".booking").val(data.booking);
        $(".hbl").val(data.hbl);
        $(".mbl").val(data.mbl);
        $(".job_no").val(data.job_no);
        $(".lc").val(data.lc);
        $(".customer_referance_no").val(data.customer_referance_no);
        $(".shipper").val(data.shipper);
        $(".consignee").val(data.consignee);
        $(".port_of_loading").val(data.port_of_loading);
        $(".port_of_discharging").val(data.port_of_discharging);
        $(".forword_coloader").val(data.forword_coloader);
        $(".sale_rep").val(data.sale_rep);
        $(".commodity").val(data.commodity);
        $(".vessel").val(data.vessel);
        $(".custom_clearance").val(data.custom_clearance);
        $(".voyage").val(data.voyage);
        $(".console_id").val(data.console_id);
        $(".container_no").val(data.container_no);
        $(".sub_bl_no").val(data.sub_bl_no);
        $(".overseas_agent").val(data.overseas_agent);
        $(".carrier").val(data.carrier);
        $(".local_vendor").val(data.local_vendor);
        $(".remarks").val(data.remarks);
        $(".cargo_manifest_remark").val(data.cargo_manifest_remark);
        $(".traacing_notes").val(data.traacing_notes);
        $(".job_sub_type").val(data.job_sub_type);
        
        $("#myForm").attr("action","{{ route('admin.query.update') }}")
         $("input[name=id]").val(data.id);
    }
    
}


$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/query/get";
  let type = $(this).attr("data-type");
  let data = getList(route, type, id);
  if (data != null) {
    edit_row("", JSON.stringify(data));
  }
});






</script>

@endpush









