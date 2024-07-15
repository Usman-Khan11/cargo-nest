@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/delivery_order/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/delivery_order/delete')">
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
                <form id="myForm" method="post" action="{{ route('admin.delivery_order.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                    <!--<hr />-->
                </div>
                <div class="card-body">
                    <input name="id" type="hidden" value="0" />
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-2">
                               <label for="cost" class="form-label">DO#:</label>
                               <input id="cost" name="Tran" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Job #:</label>
                               <input id="cost" name="Tran" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label for="" class="form-label">DO Relese Status:</label>
                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                
                                <option value="Sort"></option>
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Arrivel Date:</label>
                               <input id="cost" name="Arrivel Date" type="date" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-2">
                               <label for="cost" class="form-label">velid Date:</label>
                               <input id="cost" name="velid Date" type="date" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-2" style="border: 1px solid rgb(63, 63, 255); margin-top: 27px; padding: 5px;">
                               <label for="cost" class="form-label">Delivery:</label>
                               <label for="cost" class="form-label">Sub Type:</label>
                               <label for="cost" class="form-label">Delivery Location:</label>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="border-top: 1px solid rgb(23, 23, 247);">
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Exporter :</label>
                               <input id="cost" name="Exporter" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">MBL # :</label>
                               <input id="cost" name="MBL" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Importer :</label>
                               <input id="cost" name="Importer" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Net Amount :</label>
                               <input id="cost" name="Net Amount" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Vessel:</label>
                               <input id="cost" name="Vessel" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Recived :</label>
                               <input id="cost" name="Recived" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Voyage :</label>
                               <input id="cost" name="Voyage" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Balence :</label>
                               <input id="cost" name="Balence" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-2">
                               <label for="cost" class="form-label">HBL # :</label>
                               <input id="cost" name="Balence" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-2">
                               <label for="cost" class="form-label">HBL Date :</label>
                               <input id="cost" name="Balence" type="date" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Refrence No :</label>
                               <input id="cost" name="Balence" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="border-top: 1px solid rgb(23, 23, 247);">
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Clearing Agent :</label>
                               <input id="cost" name="Clearing Agent" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Local Custume:</label>
                               <input id="cost" name="Local Custume" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Deliverd To :</label>
                               <input id="cost" name="Deliverd To " type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Deliverd Req To :</label>
                               <textarea class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">On Account Of :</label>
                               <textarea class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label for="cost" class="form-label">CNIC No :</label>
                                        <input id="cost" name="CNIC No " type="number" step="0.01" class="form-control" required>
                                     </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label for="cost" class="form-label">Expiry Date :</label>
                                        <input id="cost" name="CNIC No " type="date" step="0.01" class="form-control" required>
                                     </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label for="cost" class="form-label">Mobile No :</label>
                                        <input id="cost" name="number " type="tel" step="0.01" class="form-control" required>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Name:</label>
                               <input id="cost" name="Name" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Remarks:</label>
                               <input id="cost" name="Remarks " type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Print By:</label>
                               <input id="cost" name="Print By " type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Return AT :</label>
                               <input id="cost" name="Return AT" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Custume Code :</label>
                               <input id="cost" name="Custume Code " type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Empty Return Remarks:</label>
                               <input id="cost" name="Empty Return Remarks " type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-2" style="margin-top: 35px;">
                                <label class="form-check-label mb-2">
                                    <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                    Clearing Agent
                                </label>
                                <label class="form-check-label mb-2">
                                    <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                    Consignee
                                </label>
                                <label class="form-check-label mb-2">
                                    <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                    Client
                                </label>
                                <label class="form-check-label mb-2">
                                    <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                    CC To Admin
                                </label>
                                <label class="form-check-label mb-2">
                                    <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                    CC To Me
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Acknowledge Email:</label>
                               <input id="cost" name="Acknowledge email " type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Endoresement Instruction:</label>
                               <input id="cost" name="Endoresement Instruction " type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
            </div>
            <div class="col-md-7">
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
$("#submitButton").click(function () {
  $("#myForm").submit();
});

var datatable = null;

$(document).ready(function () {
  datatable = $(".quotation_record").DataTable({
    select: {
      style: "api",
    },
    processing: true,
    serverSide: true,
    lengthChange: false,
    pageLength: 10,
    scrollX: true,
    ajax: {
      url: "{{ route('admin.delivery_order.create') }}",
      type: "get",
      data: function (d) {
        var frm_data = $("#result_report_form").serializeArray();
        $.each(frm_data, function (key, val) {
          d[val.name] = val.value;
        });
      },
    },
    columns: [
      {
        data: "vessel_code",
        title: "Vessel Code",
      },
      {
        data: "vessel_name",
        title: "Vessel Name:",
      },
      {
        data: "ship_id",
        title: "Ship ID:",
      },
      {
        data: "owner",
        title: "Owner",
      },
      {
        data: "principle_code",
        title: "Principle Code",
      },
      {
        data: "call_sign",
        title: "Call Sign",
      },
      {
        data: "grt",
        title: "GRT",
      },
      {
        data: "nrt",
        title: "NRT",
      },
      {
        data: "imo_no",
        title: "IMO No",
      },
      {
        data: "country_registered",
        title: "Country of Registered",
      },
    ],
    rowCallback: function (row, data) {
      $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`);
    },
  });
});

function edit_row(e, data) {
  data = JSON.parse(data);
  if (data) {
    $(".vessel_code").val(data.vessel_code);
    $(".vessel_name").val(data.vessel_name);
    $(".ship_id").val(data.ship_id);
    $(".owner").val(data.owner);
    $(".principle_code").val(data.principle_code);
    $(".call_sign").val(data.call_sign);
    $(".grt").val(data.grt);
    $(".nrt").val(data.nrt);
    $(".imo_no").val(data.imo_no);
    $(".country_registered").val(data.country_registered);
    $("#myForm").attr("action", "{{ route('admin.delivery_order.update') }}");
    $("input[name=id]").val(data.id);
  }
}

$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/delivery_order/get";
  let type = $(this).attr("data-type");
  let data = getList(route, type, id);
  if (data != null) {
    edit_row("", JSON.stringify(data));
  }
});

function excelFileImporter(e) {
  let file = $(e).val();
  if (file) {
    var file_data = $("#sortExcel").prop("files")[0];
    var form_data = new FormData();
    form_data.append("_token", "{{ csrf_token() }}");
    form_data.append("import_file", file_data);
    form_data.append("excelFileImporter", "true");

    $.ajax({
      url: "/admin/delivery_order/import",
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      type: "post",
      success: function (res) {
        if (res[0] == "success") {
          iziToast.success({ message: res[1], position: "topRight" });
          datatable.ajax.reload();
        } else {
          iziToast.error({ message: res[1], position: "topRight" });
        }
      },
    });
  }
}

</script>
@endpush









