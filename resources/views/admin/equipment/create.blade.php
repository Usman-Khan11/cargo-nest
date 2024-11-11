@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/equipment/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/equipment/delete')">
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
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Code: <span class="text-danger">*</span></label>
                                        <input name="code" value="{{ old('code') }}" type="text" class="form-control code" />
                                    </div>
                                </div>
        
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Size <span class="text-danger">*</span></label>
                                        <select name="size" class="form-select size">
                                            <option selected disabled></option>
                                            <option @if(old('size') == 10) selected @endif value="10">10</option>
                                            <option @if(old('size') == 20) selected @endif value="20">20</option>
                                            <option @if(old('size') == 40) selected @endif value="40">40</option>
                                            <option @if(old('size') == 43) selected @endif value="43">43</option>
                                            <option @if(old('size') == 45) selected @endif value="45">45</option>
                                            <option @if(old('size') == 60) selected @endif value="60">60</option>
                                        </select>
                                    </div>    
                                </div>
                                
                                <div class="col-md-5 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Type <span class="text-danger">*</span></label>
                                        <select name="type" class="form-select type">
                                            <option value="" selected disabled></option>
                                            <option @if(old('type') == 'Dry Container') selected @endif value="Dry Container">Dry Container</option>
                                            <option @if(old('type') == 'Flat Rack') selected @endif value="Flat Rack">Flat Rack</option>
                                            <option @if(old('type') == 'High Cube') selected @endif value="High Cube">High Cube</option>
                                            <option @if(old('type') == 'Hdc') selected @endif value="Hdc">Hdc</option>
                                            <option @if(old('type') == 'Open Top') selected @endif value="Open Top">Open Top</option>
                                            <option @if(old('type') == 'Refrigerated Container') selected @endif value="Refrigerated Container">Refrigerated Container</option>
                                            <option @if(old('type') == 'SRFR') selected @endif value="SRFR">SRFR</option>
                                            <option @if(old('type') == 'Tank') selected @endif value="Tank">Tank</option>
                                            <option @if(old('type') == 'Truck & Trailer') selected @endif value="Truck & Trailer">Truck & Trailer</option>
                                            <option @if(old('type') == 'Ventilated') selected @endif value="Ventilated">Ventilated</option>
                                            <option @if(old('type') == 'Bulk') selected @endif value="Bulk">Bulk</option>
                                        </select>
                                    </div>    
                                </div>
                                
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">TEU:</label>
                                        <input name="teu" type="text" value="{{ old('teu') }}" class="form-control teu" placeholder="0.00" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Old ISO Code:</label>
                                        <input name="old_iso" type="text" value="{{ old('old_iso') }}" class="form-control old_iso" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">ISO Code:</label>
                                        <input name="iso" type="text" value="{{ old('iso') }}" class="form-control iso" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Weight:</label>
                                        <input name="weight" type="text" value="{{ old('weight') }}" class="form-control weight" placeholder="0.00" />
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="mb-2 mt-2">
                                        <a class="btn btn-primary btn-sm" href="{{ asset('assets/equipment.csv') }}" download>Download</a>
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
                            <table class="table table-bordered table-sm quotation_record"></table>
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
        "pageLength": 10,
        "scrollX": true,
        "ordering": false,
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
                title: 'Code'
            },
            {
                data: 'size',
                title: 'Size'
            },
            {
                data: 'type',
                title: 'Type'
            },
            {
                data: 'teu',
                title: 'TEU'
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
        
        $("#myForm").attr("action","{{ route('admin.equipment.update') }}")
         $("input[name=id]").val(data.id);
    }
    
}



$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/equipment/get";
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
      url: "/admin/equipment/import",
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










