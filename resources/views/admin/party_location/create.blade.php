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
                <form id="myForm" method="post" action="{{ route('admin.party_location.store') }}" enctype="multipart/form-data">
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
                                       <label class="form-label">Code:</label>
                                       <input name="code" type="text" class="form-control code" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                       <label class="form-label">Loc Name:</label>
                                       <input name="location_name" type="text" class="form-control location_name" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                       <label class="form-label">Short Name:</label>
                                       <input name="short_name" type="text" class="form-control short_name" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                       <label class="form-label">contact Person:</label>
                                       <input name="contact_person" type="text" class="form-control contact_person" >
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-2">
                                       <label class="form-label">City:</label>
                                       <input name="city" type="text" class="form-control city" >
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="mb-2">
                                       <label class="form-label">Address:</label>
                                       <textarea name="address" class="form-control address"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                       <label class="form-label">State:</label>
                                       <input name="state" type="text" class="form-control state" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                       <label class="form-label">Zip Code:</label>
                                       <input name="zipcode" type="text" class="form-control zipcode" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                       <label class="form-label">Phone:</label>
                                       <input name="phone" type="text" class="form-control phone" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                       <label class="form-label">Mobile:</label>
                                       <input name="mobile" type="text" class="form-control mobile" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                       <label class="form-label">Email:</label>
                                       <input name="email" type="email" class="form-control email" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                       <label class="form-label">Website:</label>
                                       <input name="website" type="text" class="form-control website" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                       <label class="form-label">Facsimile:</label>
                                       <input name="facsimile" type="text" class="form-control facsimile" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                       <label class="form-label">Codeco EDI Text:</label>
                                       <input name="codeco" type="text" class="form-control codeco" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                       <label class="form-label">Code:</label>
                                       <input name="party_code" type="text" class="form-control party_code" >
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="mb-2">
                                       <label class="form-label">Party:</label>
                                       <input name="party" type="text" class="form-control party" >
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-2">
                                <label class="form-check-label mb-2">Location Type: </label>
                                <div class="col-md-3">
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Type[]" value="Sales" class="form-check-input Type">
                                        Sales
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Type[]" value="Operation" class="form-check-input Type">
                                       Operation
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Type[]" value="Chasis-Pick-Drop" class="form-check-input Type">
                                        Chasis Pick/Drop
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Type[]" value="Terminel" class="form-check-input Type">
                                        Terminel
                                    </label>
                                </div>
                                
                                <div class="col-md-3">
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Type[]" value="Documentation" class="form-check-input Type">
                                        Documentation
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Type[]" value="Warehouse" class="form-check-input Type">
                                        Warehouse
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Type[]" value="Off-Dock-Yard" class="form-check-input Type">
                                        Off Dock Yard
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Enable EDo" value="Enable-EDO" class="form-check-input Type">
                                        Enable EDo
                                    </label>
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Type[]" value="Factory-Office" class="form-check-input Type">
                                        Factory/Office
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Type[]" value="Container-Pick-Drop-Loc" class="form-check-input Type">
                                        Container Pick/Drop Loc
                                    </label><br>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Type[]" value="Container-Depot" class="form-check-input Type">
                                        Container Depot
                                    </label>
                                    <div class="mb-2">
                                        <select name="Loading List" id="cars" class="form-select">
                                            <option value="Sort"></option>
                                        </select>
                                    </div>
                                    <div class="mb-2 d-flex">
                                        <label class="form-label">sender: </label>
                                        <input name="sender" type="text" class="form-control sender">
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                       <label class="form-label">Remarks:</label> 
                                       <textarea name="remarks" rows="4" type="text" class="form-control remarks"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                       <label class="form-label">LP Header:</label>
                                       <textarea name="lp_header" rows="4" type="text" class="form-control lp_header"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-2">
                                       <label class="form-label">Empty Remarks:</label>
                                       <textarea name="empty_remarks" rows="4" type="text" class="form-control empty_remarks"></textarea>
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
                                   <label class="form-label">Code:</label>
                                   <input name="Code" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="mb-2">
                                   <label class="form-label">Name:</label>
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
            "url": "{{ route('admin.party_location.create') }}",
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
                data: 'location_name',
                title: 'LocationName'
            },
            {
                data: 'short_name',
                title: 'ShortNamw'
            },
            {
                data: 'city',
                title: 'City'
            },
            {
                data: 'address',
                title: 'Address'
            },
            {
                data: 'phone',
                title: 'Phone'
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
        $(".location_name").val(data.location_name);
        $(".short_name").val(data.short_name);
        $(".contact_person").val(data.contact_person);
        $(".city").val(data.city);
        $(".address").val(data.address);
        $(".state").val(data.state);
        $(".zipcode").val(data.zipcode);
        $(".phone").val(data.phone);
        $(".mobile").val(data.mobile);
        $(".email").val(data.email);
        $(".website").val(data.website);
        $(".facsimile").val(data.facsimile);
        $(".codeco").val(data.codeco);
        $(".party_code").val(data.party_code);
        $(".party").val(data.party);
        
        $(".Type").removeAttr('checked');
        $(data.Type).each(function(i, v){
            $(`.Type[value=${v}]`).attr("checked", true);
        })
        
        $(".sender").val(data.sender);
        $(".remarks").val(data.remarks);
        $(".lp_header").val(data.lp_header);
        $(".empty_remarks").val(data.empty_remarks);
        
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


</script>

@endpush










