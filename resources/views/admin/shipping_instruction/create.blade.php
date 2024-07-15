@extends('admin.layouts.app')


@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/shipping_instruction/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteDate('/admin/shipping_instruction/delete')">
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
<div class="col-md-5">
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
<div class="col-md-3">
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
                <form id="myForm" method="post" action="{{ route('admin.shipping_instruction.store') }}" enctype="multipart/form-data"> 
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bold">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">Shipping Info</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">Container</button>
                                </li>
                            </ul>
                            
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                    <input name="id" type="hidden" value="0"/>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <label>Template name :</label>
                                                <input type="text" name="template_name" id="" class="form-control template_name">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>Secuidy Doc # :</label>
                                                <input type="text" name="secuidy_doc_no" id="" class="form-control secuidy_doc_no">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>C.Booking # :</label>
                                                <input type="text" name="c_booking_no" id="" class="form-control c_booking_no">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>Source :</label>
                                                <input type="text" name="source" id="" class="form-control source">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>Tran # :</label>
                                                <input type="text" name="tran_no" id="" class="form-control tran_no">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Job No :</label>
                                                <input type="text" name="job_no" id="" class="form-control job_no">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <label>Cost Center :</label>
                                                <select class="form-select cost_center"  name="cost_center">
                                                    <option>Head Office</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label>Shipper</label>
                                                <textarea class="form-control shipper" name="shipper" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label>Consignee</label>
                                                <textarea class="form-control consignee" name="consignee" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label>Notify Party (1) :</label>
                                                <textarea class="form-control notify_party_1" name="notify_party_1" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label>Notify Party (2) :</label>
                                                <textarea class="form-control notify_party_2" name="notify_party_2" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Port Of Loading :</label>
                                                <input type="text" name="port_of_loading" id="" class="form-control port_of_loading">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Delivery Agent :</label>
                                                <textarea class="form-control delivery_agent" name="delivery_agent">
                                                    
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Port Of Recepit :</label>
                                                <input type="text" name="port_of_reciept" id="" class="form-control port_of_reciept">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Port Of Discharge:</label>
                                                <input type="text" name="port_of_discharge" id="" class="form-control port_of_discharge">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Place Of Delivery :</label>
                                                <input type="text" name="place_of_delivery" id="" class="form-control place_of_delivery">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Feight Type</label>
                                                <select class="form-select feight_type" name="feight_type">
                                                    <option>Prepaid</option>
                                                    <option>Collect</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>Unit :</label>
                                                <select class="form-select unit" name="unit">
                                                    <option>LBS</option>
                                                    <option>KG</option>
                                                    <option>MTON</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>No Of Original B/L s :</label>
                                                <input type="text" name="no_of_orignal" id="" class="form-control no_of_orignal">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>No Of NNBL :</label>
                                                <input type="text" name="no_of_nnbl" id="" class="form-control no_of_nnbl">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>DDC:</label>
                                                <select class="form-select ddc" name="ddc">
                                                    <option>Prepaid</option>
                                                    <option>Collect</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>Hs Code:</label>
                                                <input type="text" name="hs_code" class="form-control hs_code">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>Agent Stamp:</label>
                                                <input type="text" name="agent_stamp" id="" class="form-control agent_stamp">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>Gross WT:</label>
                                                <input type="text" name="gross_wt" id="" class="form-control gross_wt">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>Net WT :</label>
                                                <input type="text" name="net_wt" id="" class="form-control net_wt">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>NBM :</label>
                                                <input type="text" name="nbm" id="" class="form-control nbm">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>Packages :</label>
                                                <input type="text" name="packages" id="" class="form-control packages">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>Packages Code :</label>
                                                <input type="text" name="packages_code" id="" class="form-control packages_code">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Marks No Container No s:</label>
                                                <textarea class="form-control marks_no_container" name="marks_no_container"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>No Of Pckqs Or Shipping Units:</label>
                                                <textarea class="form-control no_of_pckqs" name="no_of_pckqs"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Description Of Goods and PKgs:</label>
                                                <textarea class="form-control description_of_goods" name="description_of_goods"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Gross Weight:</label>
                                                <textarea class="form-control gross_weight" name="gross_weight"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Measurement:</label>
                                                <textarea class="form-control measurement" name="measurement"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>On Board Date :</label>
                                                <input type="date" name="on_board_date" id="" class="form-control on_board_date">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Form E:</label>
                                                <input type="text" name="form_e" id="" class="form-control form_e">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Date:</label>
                                                <input type="date" name="date" id="" class="form-control date">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                                    <div class="card-datatable table-responsive pt-0">
                                                <table class="datatables-basic table" style="width: 180%;">
                                                    <thead>
                                                      <tr>
                                                        <th>...</th>
                                                        <th>S.No</th>
                                                        <th>Container</th>
                                                        <th>Seal #</th>
                                                        <th>Size Type</th>
                                                        <th>Rate Group</th>
                                                        <th>Gross Wt</th>
                                                        <th>Net wt</th>
                                                        <th>CBM</th>
                                                        <th>Packages</th>
                                                        <th>Unit</th>
                                                        <th>Temperature</th>
                                                        <th>Remarks</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                        <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                        <td><input type="text" class="form-control" name="s_no" style="width: 100%;"/></td>
                                                        <td><input type="text" class="form-control" name="container" style="width: 100%;"/></td>
                                                        <td><input type="text" class="form-control" name="seal_no" style="width: 100%;"/></td>
                                                        <td><input type="text" class="form-control" name="size_type" style="width: 100%;"/></td>
                                                        <td><input type="text" class="form-control" name="rate_group" style="width: 100%;"/></td>
                                                        <td><input type="text" class="form-control" name="s_gross_wt" style="width: 100%;"/></td>
                                                        <td><input type="text" class="form-control" name="net" style="width: 100%;"/></td>
                                                        <td><input type="text" class="form-control" name="cbm" style="width: 100%;"/></td>
                                                        <td><input type="text" class="form-control" name="s_packages" style="width: 100%;"/></td>
                                                        <td><input type="text" class="form-control" name="s_unit" style="width: 100%;"/></td>
                                                        <td><input type="text" class="form-control" name="temperature" style="width: 100%;"/></td>
                                                        <td><input type="text" class="form-control" name="remarks" style="width: 100%;"/></td>

                                                        
                                                       
                                                       
                                                    </tbody>
                                                </table>
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

 $('#submitButton').click(function(){
    // Trigger form submission
    $('#myForm').submit();
  });
  
   function addNewRow(e){
        $(e).parent().parent().clone().prependTo(".detail_repeater");
    }
    
    function delRow(e){
        if($(".detail_repeater tr").length <= 1) return;
        $(e).parent().parent().remove();
    }


function edit_row(e, data) {
  data = JSON.parse(data);
  if (data) {
    $(".template_name").val(data.template_name);
    $(".secuidy_doc_no").val(data.secuidy_doc_no);
    $(".c_booking_no").val(data.c_booking_no);
    $(".source").val(data.source);
    $(".tran_no").val(data.tran_no);
    $(".job_no").val(data.job_no);
    $(".cost_center").val(data.cost_center);
    $(".shipper").val(data.shipper);
    $(".consignee").val(data.consignee);
    $(".notify_party_1").val(data.notify_party_1);
    $(".notify_party_2").val(data.notify_party_2);
    $(".port_of_loading").val(data.port_of_loading);
    $(".delivery_agent").val(data.delivery_agent);
    $(".port_of_reciept").val(data.port_of_reciept);
    $(".port_of_discharge").val(data.port_of_discharge);
    $(".place_of_delivery").val(data.place_of_delivery);
    $(".feight_type").val(data.feight_type);
    $(".unit").val(data.unit);
    $(".no_of_orignal").val(data.no_of_orignal);
    $(".no_of_nnbl").val(data.no_of_nnbl);
    $(".ddc").val(data.ddc);
    $(".hs_code").val(data.hs_code);
    $(".agent_stamp").val(data.agent_stamp);
    $(".gross_wt").val(data.gross_wt);
    $(".net_wt").val(data.net_wt);
    $(".nbm").val(data.nbm);
    $(".packages").val(data.packages);
    $(".packages_code").val(data.packages_code);
    $(".marks_no_container").val(data.marks_no_container);
    $(".no_of_pckqs").val(data.no_of_pckqs);
    $(".description_of_goods").val(data.description_of_goods);
    $(".gross_weight").val(data.gross_weight);
    $(".measurement").val(data.measurement);
    $(".on_board_date").val(data.on_board_date);
    $(".form_e").val(data.form_e);
    $(".date").val(data.date);
    

  
    $("#myForm").attr("action", "{{ route('admin.shipping_instruction.update') }}");
    $("input[name=id]").val(data.id);
  }
}


$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/shipping_instruction/get";
  let type = $(this).attr("data-type");
  let data = getList(route, type, id);
  if (data != null) {
    edit_row("", JSON.stringify(data));
  }
});


</script>

@endpush
