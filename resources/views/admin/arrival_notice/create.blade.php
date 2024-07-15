@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/vessel/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/vessel/delete')">
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
                <form id="myForm" method="post" action="{{ route('admin.vessel.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                    <!--<hr />-->
                </div>
                <div class="card-body">
                    <input name="id" type="hidden" value="0" />
                    <div class="row">
                        <h5>Report Type</h5>
                        <div class="col-md-4" style="border: 1px solid black; padding: 10px 20px; margin: 10px 0px;">
                            <div class="mb-2">
                                <input type="radio" id="Vissel Wise" name="fav_language" value="HTML">
                                <label for="Vissel Wise">Arrivel Notice</label><br>
                                <input type="radio" id="Shiping Line Wise" name="fav_language" value="CSS">
                                <label for="Shiping Line Wise">Adress List</label>
                                
                            </div>
                        </div>
                        <div class="col-md-4" style="border: 1px solid black; padding: 10px 20px; margin: 10px 10px;">
                            <div class="mb-2">
                                <input type="radio" id="Vissel Wise" name="fav_language" value="HTML">
                                <label for="Vissel Wise">Consignee</label><br>
                                <input type="radio" id="Shiping Line Wise" name="fav_language" value="CSS">
                                <label for="Shiping Line Wise">Colpader/forwarded</label><br>
                                <input type="radio" id="No Grouping" name="fav_language" value="JavaScript">
                                <label for="No Grouping">Client</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                         <div class="row">
                            <div class="col-md-4">
                                <div class="mb-2">
                                   <label for="cost" class="form-label">Manifest#:</label>
                                   <input id="cost" name="Manifest" type="text" step="0.01" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-2">
                                   <label for="cost" class="form-label">POl :</label>
                                   <input id="cost" name="POl " type="text" step="0.01" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-2">
                                   <label for="cost" class="form-label">Vessel:</label>
                                   <input id="cost" name="Vessel" type="text" step="0.01" class="form-control" required>
                                </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-4">
                                <div class="mb-2">
                                   <label for="cost" class="form-label">Dacument#:</label>
                                   <input id="cost" name="Dacument" type="text" step="0.01" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                   <label for="cost" class="form-label">Year :</label>
                                   <input id="cost" name="CostCenter" type="text" step="0.01" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                   <label for="cost" class="form-label">Arrivel Date:</label>
                                   <input id="cost" name="Arrivel Date" type="date" step="0.01" class="form-control" required>
                                </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-12">
                                <div class="mb-2">
                                   <label for="cost" class="form-label">Local Port :</label>
                                   <input id="cost" name="Local Port " type="text" step="0.01" class="form-control" required>
                                </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                   <label for="cost" class="form-label">Date :</label>
                                   <input id="cost" name="Date" type="date" step="0.01" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2" style="margin-top: 35px;">
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                        Show Charges
                                    </label>
                                </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-8">
                                <div class="mb-2">
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                        Index Range Index Form
                                    </label>
                                    <input type="text" name="" id="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                   <label for="cost" class="form-label">Index Till :</label>
                                   <input id="cost" name="Index Till" type="text" step="0.01" class="form-control" required>
                                </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                   <label for="cost" class="form-label">Letter:</label>
                                   <input id="cost" name="Letter" type="text" step="0.01" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                   <label for="cost" class="form-label">Template:</label>
                                   <input id="cost" name="Template" type="text" step="0.01" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-2">
                                   <label for="cost" class="form-label">Remarks:</label>
                                   <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                   <label for="cost" class="form-label">Importer:</label>
                                   <input id="cost" name="Importer" type="text" step="0.01" class="form-control" required>
                                </div>
                            </div>
                         </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label class="form-check-label mb-2">
                                            <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                            With Arrivel Vessel
                                        </label><br>
                                        <label class="form-check-label mb-2">
                                            <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                            All MBL/MAWB No
                                        </label><br>
                                        <label class="form-check-label mb-2" style="margin-top: 20px;">
                                            <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                            All Index HBL No
                                        </label><br>
                                        <label class="form-check-label mb-2" style="margin-top: 20px;">
                                            <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                            All Index Type
                                        </label><br>
                                    </div>
                                </div>
                                <div class="col-md-8" >
                                    <div class="col-md-12" style="border: 1px solid black; margin-bottom: 5px;">
                                        <div class="mb-2">
                                            <input type="radio" id="Vissel Wise" name="fav_language" value="HTML">
                                            <label for="Vissel Wise">Karachi</label>
                                            <input type="radio" id="Shiping Line Wise" name="fav_language" value="CSS">
                                            <label for="Shiping Line Wise">All</label>
                                            <input type="radio" id="No Grouping" name="fav_language" value="JavaScript">
                                            <label for="No Grouping">Other Then Karachi</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                           <input id="cost" name="Emp Code" type="text" step="0.01" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                               <input id="cost" name="Emp Code" type="text" step="0.01" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                <option value="Sort">Sort:</option>
                                              </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                           <select name="Loading List" id="cars" step="0.01" class="form-control">
                                               <option value="Loading List"></option>
                                             </select>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                       <input id="cost" name="Emp Code" type="text" step="0.01" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                            <label class="form-check-label mb-2">
                                                <input type="checkbox" name="Sales Rep" value="Soc" class="form-check-input">
                                                Overwrite Arrivel Notice Data To All Previous BL(s) 
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">F/Hand/Nom:</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                   <option value="Loading List"></option>
                                                 </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Out Put:</label>
                                               <select name="Out Put" id="cars" step="0.01" class="form-control">
                                                   <option value="Preview">Preview</option>
                                                 </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Arrivel Notice:</label>
                                               <select name="Arrivel Notice" id="cars" step="0.01" class="form-control">
                                                   <option value="MSA-AN">MSA-AN</option>
                                                 </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Date From:</label>
                                               <input id="cost" name="Date From" type="date" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2" style="border: 1px solid black; margin-bottom: 10px;">
                                        <label class="form-check-label mb-2">
                                            <input type="checkbox" name="All" value="Soc" class="form-check-input">
                                            Print Without Sign
                                        </label><br>
                                        <label class="form-check-label mb-2">
                                            <input type="checkbox" name="All" value="Soc" class="form-check-input">
                                            Print On Letter Head
                                        </label><br>
                                        <label class="form-check-label mb-2">
                                            <input type="checkbox" name="All" value="Soc" class="form-check-input">
                                            Print Company Logo
                                        </label><br>
                                        <label class="form-check-label mb-2">
                                            <input type="checkbox" name="All" value="Soc" class="form-check-input">
                                            Print IGM No
                                        </label><br>
                                        <label class="form-check-label mb-2">
                                            <input type="checkbox" name="All" value="Soc" class="form-check-input">
                                            Print Index No
                                        </label><br>
                                        <label class="form-check-label mb-2">
                                            <input type="checkbox" name="All" value="Soc" class="form-check-input">
                                            Print EDI
                                        </label><br>
                                        <label class="form-check-label mb-2">
                                            <input type="checkbox" name="All" value="Soc" class="form-check-input">
                                            Manifested desc
                                        </label><br>
                                    </div>
                                    <div class="btn">
                                        <button class="btn btn-primary btn-sm">Edit Text</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-2">
                                <label>Text 1 :</label>
                                <textarea class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-2">
                                <label>Text 2 :</label>
                                <textarea class="form-control"></textarea>
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
      url: "{{ route('admin.arrival_notice.create') }}",
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
  let route = "/admin/vessel/get";
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









