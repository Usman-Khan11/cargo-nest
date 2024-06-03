@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/opening_balance/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark">
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
                <form id="myForm" method="post" action="{{ route('admin.opening_balance.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" />
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label"> Dacument#:</label>
                                       <input id="cost" name="Request" type="text" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Date:</label>
                                       <input id="cost" name="Date From" type="date" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Company:</label>
                                       <input id="cost" name="Company" type="text" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Balence Account:</label>
                                       <input id="cost" name="Balence Account" type="text" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="p-3 table-responsive">
                            <table class="datatables-basic table">
                                <thead>
                                  <tr>
                                    <th scope="col">--</th>
                                    <th scope="col">Account Code</th>
                                    <th scope="col">Title Of Account</th>
                                    <th scope="col">Currency</th>
                                    <th scope="col">Cost Center</th>
                                    <th scope="col">Debit (Vc)</th>
                                    <th scope="col">Credir (Vc)</th>
                                    <th scope="col">Currency</th>
                                    <th scope="col">Exchange Rate</th>
                                    <th scope="col">Manual</th>
                                    <th scope="col">Debit LC</th>
                                    <th scope="col">Credit LC</th>
                                    <th scope="col">Narration</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                    <td><input type="text" style="width: 100%;"/></td>
                                    <td><input type="text" style="width: 100%;"/></td>
                                    <td><input type="text" style="width: 100%;"/></td>
                                    <td><input type="text" style="width: 100%;"/></td>
                                    <td><input type="text" style="width: 100%;"/></td>
                                    <td><input type="text" style="width: 100%;"/></td>
                                    <td><input type="text" style="width: 100%;"/></td>
                                    <td><input type="text" style="width: 100%;"/></td>
                                    <td><input type="text" style="width: 100%;"/></td>
                                    <td><input type="text" style="width: 100%;"/></td>
                                    <td><input type="text" style="width: 100%;"/></td>
                                    <td><input type="text" style="width: 100%;"/></td>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                    <div class="row" style="border: 1px solid black; margin-top: 20px;">
                        <div class="col-md-9">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Narration:</label>
                               <input id="cost" name="Narration" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-2">
                                <button class="btn btn-primary btn-sm">Auto Balence</button>
                            </div>
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
                                        <label class="form-label">Country:</label>
                                        <select name="" class="form-select">
                                            <option selected disabled></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">City:</label>
                                        <input name="" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                            </div>
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
    
    $(document).ready(function(){
    var datatable = $('.quotation_record').DataTable({
        select: {
            style: 'api'
        },
        "processing": true,
        "searching": false,
        "serverSide": true,
        "lengthChange": false,
        "pageLength": 15,
        "scrollX": true,
        "ajax": {
            "url": "{{ route('admin.opening_balance.create') }}",
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
});




function edit_row(e,data){
    data = JSON.parse(data);
    if(data){
        $(".code").val(data.code);
        $(".locate").val(data.location);
        $(".location_check").removeAttr('checked');
        $(`.location_check[value=${data.location_check}]`).attr('checked',true);
        
        $(".co_ordinates").val(data.co_ordinates);
        $(".inactive").removeAttr('checked');
        $(`.inactive[value=${data.inactive}]`).attr('checked',true);
       
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
  let route = "/admin/opening_balance/get";
  let type = $(this).attr("data-type");
  let data = getList(route, type, id);
  if (data != null) {
    edit_row("", JSON.stringify(data));
  }
});



</script>

@endpush










