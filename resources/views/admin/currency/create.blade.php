@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/currency/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/currency/delete')">
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
            <div class="col-md-5">
                <form id="myForm" method="post" action="{{ route('admin.currency.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                    <!--<hr />-->
                </div>
                <div class="card-body">
                    <input name="id" type="hidden" value="0"/>
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Code:</label>
                                <input name="code" type="text" class="form-control code" placeholder="" />
                            </div>
                        </div>
                        
                        <div class="col-md-8 col-12">
                            <div class="mb-2">
                                <label class="form-label">Name:</label>
                                <input name="name" type="text" class="form-control name" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-2">
                                <label class="form-label">Main Symbol:</label>
                                <input name="main_symbol" type="text" class="form-control main_symbol" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-2">
                                <label class="form-label">Sub Unit Symbol:</label>
                                <input name="unit_symbol" type="text" class="form-control unit_symbol" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-5 col-12">
                            <div class="mb-2">
                                <label class="form-label">Decimal Portion Digits:</label>
                                <input name="decimal_portion_digits" type="text" class="form-control decimal_portion_digits" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-3 col-12 d-none">
                            <div class="mb-2">
                                <label class="form-label">Ex Rate:</label>
                                <input name="ex_rate" type="text" class="form-control decimal_portion_digits" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-7 col-12">
                            <div class="mb-2 mt-4">
                                <a class="btn btn-primary btn-sm" href="{{ asset('assets/currency.csv') }}" download>Download</a>
                                <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('sortExcel').click()">Bulk Upload</button>
                                <input type="file" id="sortExcel" hidden class="form-control" onchange="excelFileImporter(this)" accept=".csv" />
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
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
      
      var datatable = null;
      $(document).ready(function(){
            datatable = $('.quotation_record').DataTable({
                select: {
                    style: 'api'
                },
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "pageLength": 15,
                "scrollX": true,
                "ajax": {
                    "url": "{{ route('admin.currency.create') }}",
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
                        title: 'Code'
                    },
                    {
                        data: 'name',
                        title: 'Name'
                    },
                    {
                        data: 'main_symbol',
                        title: 'Main Symbol'
                    },
                    {
                        data: 'unit_symbol',
                        title: 'Unit Symbol'
                    },
                    {
                        data: 'decimal_portion_digits',
                        title: 'Decimal Digits'
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
        $(".name").val(data.name);
        $(".main_symbol").val(data.main_symbol);
        $(".unit_symbol").val(data.unit_symbol);
        $(".decimal_portion_digits").val(data.decimal_portion_digits);
        
        $("#myForm").attr("action","{{ route('admin.currency.update') }}")
        $("input[name=id]").val(data.id);
    }
    
}


$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/currency/get";
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
      url: "/admin/currency/import",
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









