@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/location/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/location/delete')">
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
                <form id="myForm" method="post" action="{{ route('admin.location.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0" />
                            <div class="row">
                                <div class="col-md-5 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Code:</label>
                                        <input name="code" type="text" class="form-control code" />
                                    </div>
                                </div>
                                <div class="col-md-7 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Location:</label>
                                        <input name="location" type="text" class="form-control locate" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-2">
                                                <input name="location_check[]" class="form-check-input location_check" type="checkbox" value="country" /><span>&nbsp;&nbsp;Country</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-2">
                                                <input name="location_check[]" class="form-check-input location_check" type="checkbox" value="city" /><span>&nbsp;&nbsp;City</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-2">
                                                <input name="location_check[]" class="form-check-input location_check" type="checkbox" value="airport" /><span>&nbsp;&nbsp;Airport</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-2">
                                                <input name="location_check[]" class="form-check-input location_check" type="checkbox" value="seaport" /><span>&nbsp;&nbsp;Seaport</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-2">
                                                <input name="location_check[]" class="form-check-input location_check" type="checkbox" value="terminals" /><span>&nbsp;&nbsp;Terminals</span>
                                            </div>
                                        </div>
                                    </div>
        
                                    
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Co-ordinates:</label>
                                        <input name="co_ordinates" type="text" class="form-control co_ordinates" placeholder="" />
                                    </div>
                                </div> 
                                <div class="col-md-4 col-12">
                                    <div class="mb-2 input_flex mt-1">
                                        <input name="inactive" class="form-check-input inactive" type="checkbox" value="In-Active" /><span>&nbsp;&nbsp;In-Active</span>
                                    </div>
                                </div> 
                                <div class="col-md-4 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Latitude:</label>
                                        <input name="latitude" type="number" class="form-control latitude" placeholder="0.000000" />
                                    </div>
                                </div> 
                                <div class="col-md-4 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">State:</label>
                                        <input name="state" type="text" class="form-control state" placeholder="" />
                                    </div>
                                </div> 
                                <div class="col-md-4 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Longitude:</label>
                                        <input name="longitude" type="number" class="form-control longitude" placeholder="0.000000" />
                                    </div>
                                </div> 
                                <div class="col-md-4 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Phone Prefix:</label>
                                        <input name="phone_prefix" type="text" class="form-control phone_prefix" placeholder="" />
                                    </div>
                                </div> 
                                <div class="col-md-4 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">EPASS Code:</label>
                                        <input name="epass_code" type="text" class="form-control epass_code" placeholder="" />
                                    </div>
                                </div> 
                                <div class="col-md-8 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Country/Region:</label>
                                        <textarea name="country_region" type="text" rows="4" class="form-control country_region" placeholder=""></textarea>
                                    </div>
                                </div> 
                                <div class="col-md-12 col-12">
                                    <a><button type="button" class="btn btn-primary btn-sm">Change Utility</button></a>
                                    <a><button type="button" class="btn btn-primary btn-sm">Active & Inactive Log</button></a>
                                    <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('sortExcel').click()">Bulk Upload</button>
                                    <input type="file" id="sortExcel" hidden class="form-control" onchange="excelFileImporter(this)" accept=".csv" />
                                </div> 
                                
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="p-3">
                            <table class="datatables-basic table">
                                <thead>
                                  <tr>
                                    <th>...</th>
                                    <th>Alias</th>
                                  </tr>
                                </thead>
                                <tbody class="detail_repeater">
                                    <td><i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i>
                                    <i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info mx-2"></i></td>
                                    <td><input type="text" class="form-control" style="width: 100%;"/></td>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </form>
            </div>
            <div class="col-md-5">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="responsive text-nowrap">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Country:</label><br>
                                        <select id="search_country" class="custom_select">
                                            <option selected disabled></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">City:</label>
                                        <input id="search_city" name="" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                            </div>
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
          
    $(".custom_select").select2({
      data: @json($countries)
    });   
        
    var datatable = $('.quotation_record').DataTable({
        select: {
            style: 'api'
        },
        "processing": true,
        "searching": false,
        "serverSide": true,
        "info": false,
        "lengthChange": false,
        "pageLength": 15,
        "scrollX": true,
        /*"ajax": {
            "url": "{{ route('admin.location.create') }}",
            "type": "get",
            "data": function(d) {
               d.search_country = $("#search_country").val();
               d.search_city = $("#search_city").val();
               limit: data.length,
                offset: data.start
            },
        },*/
        "ajax": function(data, callback, settings) {
            console.log(data)
          $.get("{{ route('admin.location.create') }}?page=1", {
            limit: data.length,
            offset: data.start,
            search_country: $("#search_country").val(),
            search_city: $("#search_city").val()
          },
          function(json) {
            callback({
              recordsTotal: json.total,
              recordsFiltered: json.total,
              data: json.data
            });
          });
        },
        columns: [
            {
                data: 'code',
                title: 'Code'
            },
            {
                data: 'location',
                title: 'Location'
            },
            {
                data: 'location_check',
                title: 'Check'
            },
            {
                data: 'latitude',
                title: 'Latitude'
            },
            {
                data: 'longitude',
                title: 'Longitude'
            }
            
        ],          
         "rowCallback": function(row, data) {
             $(row).attr("onclick",`edit_row(this,'${JSON.stringify(data)}')`)
         }
    });
    
     $("#search_country").change(function(){
        datatable.ajax.reload();
    })
    $("#search_city").keyup(function(){
        datatable.ajax.reload();
    })
    
});

function addNewRow(e){
        $(e).parent().parent().clone().prependTo(".detail_repeater");
    }
    
    function delRow(e){
        if($(".detail_repeater tr").length <= 1) return;
        $(e).parent().parent().remove();
    }


function edit_row(e,data){
    data = JSON.parse(data);
    if(data){
        console.log(data);
        $(".code").val(data.code);
        $(".locate").val(data.location);
        
        $(".location_check").removeAttr('checked');
        $(data.location_check).each(function(i, v){
            $(`.location_check[value=${v}]`).attr("checked", true);
        })
        
        $(".co_ordinates").val(data.co_ordinates);
        
        if(data.inactive){
            $(".inactive").removeAttr('checked');
            $(`.inactive[value=${data.inactive}]`).attr('checked',true);
        }
        else{
            $(".inactive").removeAttr('checked');
        }
       
        $(".latitude").val(data.latitude);
        $(".state").val(data.state);
        $(".longitude").val(data.longitude);
        $(".phone_prefix").val(data.phone_prefix);
        $(".epass_code").val(data.epass_code);
        $(".country_region").val(data.country_region);
        
        //var locations = JSON.stringify(data.location_check);
        //locations = JSON.parse(locations);
        //console.log(locations);
        
        
        
        $("#myForm").attr("action","{{ route('admin.location.update') }}")
         $("input[name=id]").val(data.id);
    }
    
}

$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/location/get";
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
      url: "/admin/location/import",
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










