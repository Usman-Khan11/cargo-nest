@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/epass_weboc/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/epass_weboc/delete')">
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
                <form id="myForm" method="post" action="{{ route('admin.epass_weboc.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                    <!--<hr />-->
                </div>
                <div class="card-body">
                    <input name="id" type="hidden" value="0" />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Tran#:</label>
                               <input id="cost" name="Tran" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Dacument#:</label>
                               <input id="cost" name="Dacumen" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">IGM No:</label>
                               <input id="cost" name="IGM No" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Year:</label>
                               <input id="cost" name="Year" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Local Custome:</label>
                               <input id="cost" name="Manifest" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label class="form-check-label mb-2">
                                    <input type="checkbox" name="Sales Rep" value="Soc" class="form-check-input">
                                    Apply Index Renge
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Index:</label>
                               <input id="cost" name="Index" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
        </div>
            <div class="row" style="border: 1px solid rgb(54, 54, 254);">
                <div class="col-md-6">
                    <div class="mb-2">
                       <label for="cost" class="form-label">Index Form:</label>
                       <input id="cost" name="Index Form" type="text" step="0.01" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                       <label for="cost" class="form-label">To:</label>
                       <input id="cost" name="To" type="text" step="0.01" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <label>Up Load To:</label>
                <div class="col-md-6" style="border: 1px solid rgb(54, 54, 254);">
                    <div class="mb-2">
                        <input type="radio" id="Vissel Wise" name="fav_language" value="HTML">
                        <label for="Vissel Wise">Epass</label><br>
                        <input type="radio" id="Shiping Line Wise" name="fav_language" value="CSS">
                        <label for="Shiping Line Wise">Export.MDB</label><br>
                        <input type="radio" id="No Grouping" name="fav_language" value="JavaScript">
                        <label for="No Grouping">We BOC</label>
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="mb-2"style="border: 1px solid rgb(54, 54, 254);">
                        <input type="radio" id="Vissel Wise" name="fav_language" value="HTML">
                        <label for="Vissel Wise">Containerized</label>
                        <input type="radio" id="Shiping Line Wise" name="fav_language" value="CSS">
                        <label for="Shiping Line Wise">Bulk</label><br>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-2">
                                <label for="" class="form-label">Operation:</label>
                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                
                                <option value="Sort">Sea Import</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-2">
                                <label for="" class="form-label">Finel Destination:</label>
                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                <option value="Sort">Recorded</option>
                              </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2" style="margin-top: 35px;">
                        <label class="form-check-label mb-2">
                            <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                            Exclude Empty Imdex 
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-2" style="margin-top: 35px;">
                        <label class="form-check-label mb-2">
                            <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                            Transfer Growth Weight To Net Weight When Empty
                        </label><br>
                        <label class="form-check-label mb-2">
                            <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                            Transfer No. Of Packs To Quantity
                        </label><br>
                        <label class="form-check-label mb-2">
                            <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                            Net Wt To Decimel
                        </label><br>
                        <label class="form-check-label mb-2">
                            <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                            Gross Weight Same As Job
                        </label><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="btn">
                        <button class="btn btn-primary btn-sm">Download</button>
                    </div>
                    <div class="btn">
                        <button class="btn btn-primary btn-sm">Exit</button>
                    </div>
                    <div class="btn">
                        <button class="btn btn-primary btn-sm">Upload E Pass</button>
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
    
    <div class="modal fade" id="voyageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Voyages</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-sm voyage_table"></table>
          </div>
          <!--<div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>-->
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
      url: "{{ route('admin.epass_weboc.create') }}",
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
    $("#myForm").attr("action", "{{ route('admin.vessel.update') }}");
    $("input[name=id]").val(data.id);
  }
}

$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/epass_weboc/get";
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
      url: "/admin/vessel/import",
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


let voyage_table = null;
$(".show_voyage").click(function(){
    
    let id = $("#myForm input[name=id]").val();
    if(id > 0){
        window.location.assign('/admin/voyage/create?vessel_id=' + id);
    }
    return;
    
    voyage_table = $(".voyage_table").DataTable({
    select: {
      style: "api",
    },
    processing: true,
    serverSide: true,
    lengthChange: false,
    searching: false,
    pageLength: 10,
    scrollX: true,
    ajax: {
      url: "{{ route('admin.vessel') }}",
      type: "get",
      data: function (d) {
        d.vessel = $("#myForm input[name=id]").val();
      },
    },
    columns: [
      {
        title: 'Vessel',
        "render": function(data, type, full, meta) {
            if(full.vessel){
                return full.vessel.vessel_name;
            } else {
                return '-';
            }
        }
    },
    {
        data: 'voy',
        title: 'Voyage'
    },
    {
        data: 'port_of_discharge',
        title: 'Port of Dischage'
    },
    {
        data: 'port_of_loading',
        title: 'Port of Loading'
    },
    {
        data: 'type',
        title: 'Type'
    },
    ],
  });
})

$('#voyageModal').on('hidden.bs.modal', function () {
    voyage_table.destroy();
});

</script>
@endpush









