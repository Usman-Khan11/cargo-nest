@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/party_location/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/party_location/delete')">
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
                <form id="myForm" method="post" action="{{ route('admin.equipment.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0" />
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Code:</label>
                                       <input  name="code" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Loc Name:</label>
                                       <input  name="location_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Short Name:</label>
                                       <input  name="short_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">contact Person:</label>
                                       <input  name="contact_person" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">City:</label>
                                       <input  name="city" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Address:</label>
                                       <textarea name="address" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">State:</label>
                                       <input  name="state" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Zip Code:</label>
                                       <input  name="zipcode" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Phone:</label>
                                       <input  name="phone" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Mobile:</label>
                                       <input  name="mobile" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Email:</label>
                                       <input  name="email" type="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Website:</label>
                                       <input  name="website" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Facsimile:</label>
                                       <input  name="facsimile" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Codeco EDI Text:</label>
                                       <input  name="codeco" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Code:</label>
                                       <input name="party_code" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Party:</label>
                                       <input name="Party" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-2">
                                <label class="form-check-label mb-2">Location Type: </label>
                                <div class="col-md-3">
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="sales" value="Sales" class="form-check-input">
                                        Sales
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Operation" value="Operation" class="form-check-input">
                                       Operation
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Chasis Pick/Drop" value="Soc" class="form-check-input">
                                        Chasis Pick/Drop
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Terminel" value="Soc" class="form-check-input">
                                        Terminel
                                    </label>
                                </div>
                                
                                <div class="col-md-3">
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Dacumentation" value="Soc" class="form-check-input">
                                        Dacumentation
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Warehouse" value="Soc" class="form-check-input">
                                        Warehouse
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Off Dock Yard" value="Soc" class="form-check-input">
                                        Off Dock Yard
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Enable EDo" value="Soc" class="form-check-input">
                                        Enable EDo
                                    </label>
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Factory/Office" value="Soc" class="form-check-input">
                                        Factory/Office
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Container Pick/Drop Loc" value="Soc" class="form-check-input">
                                        Container Pick/Drop Loc
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name=" Container Depot" value="Soc" class="form-check-input">
                                        Container Depot
                                    </label>
                                    <div class="mb-2">
                                        <select name="Loading List" id="cars" class="form-select">
                                            <option value="Sort"></option>
                                        </select>
                                    </div>
                                    <div class="mb-2 d-flex">
                                        <label for="cost" class="form-label">sender: </label>
                                        <input name="sender" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Remarks:</label>
                                       <textarea name="remarks" rows="4" type="text" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">LP Header:</label>
                                       <textarea name="lp_header" rows="4" type="text" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Empty Remarks:</label>
                                       <textarea name="empty_remarks" rows="4" type="text" class="form-control"></textarea>
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
                        
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-2">
                                   <label for="cost" class="form-label">Code:</label>
                                   <input name="Code" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="mb-2">
                                   <label for="cost" class="form-label">Name:</label>
                                   <input name="name" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <div class="mb-3">
                                   <button class="btn btn-primary btn-sm">Show General Location</button>
                                </div>
                            </div>
                        </div>        
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
        "searching": false,
        "serverSide": true,
        "lengthChange": false,
        "pageLength": 10,
        "scrollX": true,
        "ajax": {
            "url": "{{ route('admin.equipment.create') }}",
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
                data: 'code',
                title: 'LocationCode'
            },
            {
                data: 'size',
                title: 'LocationName'
            },
            {
                data: 'type',
                title: 'ShortNamw'
            },
            {
                data: 'teu',
                title: 'Portcode'
            },
            {
                data: 'old_iso',
                title: 'Old Iso Code'
            },
            {
                data: 'iso',
                title: 'Iso Code'
            },
            {
                data: 'weight',
                title: 'Weight'
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
        $(".code").val(data.code);
        $(".size").val(data.size);
        $(".type").val(data.type);
        $(".teu").val(data.teu);
        $(".old_iso").val(data.old_iso);
        $(".iso").val(data.iso);
        $(".weight").val(data.weight);
        
        //$(".type").removeAttr('checked');
        //$(`.type[value=${data.type}]`).attr('checked',true);
        
        $("#myForm").attr("action","{{ route('admin.party_location.update') }}")
         $("input[name=id]").val(data.id);
    }
    
}



$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/party_location/get";
  let type = $(this).attr("data-type");
  let data = getList(route, type, id);
  if (data != null) {
    edit_row("", JSON.stringify(data));
  }
});


// function excelFileImporter(e) {
//   let file = $(e).val();
//   if (file) {
//     var file_data = $("#sortExcel").prop("files")[0];
//     var form_data = new FormData();
//     form_data.append("_token", "{{ csrf_token() }}");
//     form_data.append("import_file", file_data);
//     form_data.append("excelFileImporter", "true");

//     $.ajax({
//       url: "/admin/party_location/import",
//       cache: false,
//       contentType: false,
//       processData: false,
//       data: form_data,
//       type: "post",
//       success: function (res) {
//         if (res[0] == "success") {
//           iziToast.success({ message: res[1], position: "topRight" });
//           datatable.ajax.reload();
//         } else {
//           iziToast.error({ message: res[1], position: "topRight" });
//         }
//       },
//     });
//   }
// }

</script>

@endpush










