@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/account_integrate/store')">
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
                <form id="myForm" method="post" action="{{ route('admin.account_integrate.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" />
                            <div class="row">
                                <h5>Parrent Account</h5>
                                <label>Vender</label>
                                <div class="col-md-4">
                                   
                                    <div class="mb-2">
                                        <label for="cost" class="form-label">City:</label>
                                        <input id="cost" name="City:" type="text" step="0.01" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label for="cost" class="form-label">A/C:</label>
                                        <input id="cost" name="A/C" type="text" step="0.01" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label for="cost" class="form-label">All City A/C:</label>
                                        <input id="cost" name="All City A/C" type="text" step="0.01" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label>Consignee(Import Part Parent)</label>
                                <div class="col-md-4">
                                   
                                    <div class="mb-2">
                                        <label for="cost" class="form-label">City:</label>
                                        <input id="cost" name="City" type="text" step="0.01" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label for="cost" class="form-label">A/C:</label>
                                        <input id="cost" name="A/C" type="text" step="0.01" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label for="cost" class="form-label">All City A/C:</label>
                                        <input id="cost" name="All City A/C" type="text" step="0.01" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label>Shipper (Export Part Parent)</label>
                                <div class="col-md-4">
                                   
                                    <div class="mb-2">
                                        <label for="cost" class="form-label">City:</label>
                                        <input id="cost" name="City:" type="text" step="0.01" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label for="cost" class="form-label">A/C:</label>
                                        <input id="cost" name="A/C:" type="text" step="0.01" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label for="cost" class="form-label">All City A/C:</label>
                                        <input id="cost" name="All City A/C:" type="text" step="0.01" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h5>General Parent Account</h5>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="cost" class="form-label">Principle A/C:</label>
                                        <input id="cost" name="Principle A/C:" type="text" step="0.01" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="cost" class="form-label">Comission Agent A/C:</label>
                                        <input id="cost" name="Comission Agent A/C:" type="text" step="0.01" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="cost" class="form-label">Terminel A/C:</label>
                                        <input id="cost" name="Terminel A/C:" type="text" step="0.01" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="cost" class="form-label">OverSeas Agent A/C:</label>
                                        <input id="cost" name="OverSeas Agent A/C:" type="text" step="0.01" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h5>Export Common Account</h5>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label>Revenue</label>
                                        <div class="col-md-12">
                                            
                                            <div class="mb-2">
                                                <label for="cost" class="form-label">Ocean Freight:</label>
                                                <input id="cost" name="Ocean Freight" type="text" step="0.01" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            
                                            <div class="mb-2">
                                                <label for="cost" class="form-label">Documentation:</label>
                                                <input id="cost" name="Documentation" type="text" step="0.01" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            
                                            <div class="mb-2">
                                                <label for="cost" class="form-label">LCL:</label>
                                                <input id="cost" name="LCL" type="text" step="0.01" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            
                                            <div class="mb-2">
                                                <label for="cost" class="form-label">FCL:</label>
                                                <input id="cost" name="FCL" type="text" step="0.01" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            
                                            <div class="mb-2">
                                                <label for="cost" class="form-label">AIR:</label>
                                                <input id="cost" name="AIR" type="text" step="0.01" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            
                                            <div class="mb-2">
                                                <label for="cost" class="form-label">Break Bulk:</label>
                                                <input id="cost" name="Break Bulk:" type="text" step="0.01" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="row">
                                            <label>Expense</label>
                                            <div class="col-md-12">
                                                
                                                <div class="mb-2">
                                                    <label for="cost" class="form-label">Ocean Freight:</label>
                                                    <input id="cost" name="Ocean Freight" type="text" step="0.01" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                
                                                <div class="mb-2">
                                                    <label for="cost" class="form-label">Documentation:</label>
                                                    <input id="cost" name="Documentation:" type="text" step="0.01" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                
                                                <div class="mb-2">
                                                    <label for="cost" class="form-label">LCL:</label>
                                                    <input id="cost" name="LCL" type="text" step="0.01" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                
                                                <div class="mb-2">
                                                    <label for="cost" class="form-label">FCL:</label>
                                                    <input id="cost" name="FCL:" type="text" step="0.01" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                
                                                <div class="mb-2">
                                                    <label for="cost" class="form-label">AIR:</label>
                                                    <input id="cost" name="AIR" type="text" step="0.01" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                
                                                <div class="mb-2">
                                                    <label for="cost" class="form-label">Break Bulk:</label>
                                                    <input id="cost" name="Break Bulk" type="text" step="0.01" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <h5>Import Common Account</h5>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label>Revenue</label>
                                        <div class="col-md-12">
                                            
                                            <div class="mb-2">
                                                <label for="cost" class="form-label">Ocean Freight:</label>
                                                <input id="cost" name="Ocean Freight" type="text" step="0.01" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            
                                            <div class="mb-2">
                                                <label for="cost" class="form-label">Documentation:</label>
                                                <input id="cost" name="Documentation" type="text" step="0.01" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            
                                            <div class="mb-2">
                                                <label for="cost" class="form-label">LCL:</label>
                                                <input id="cost" name="LCL" type="text" step="0.01" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            
                                            <div class="mb-2">
                                                <label for="cost" class="form-label">FCL:</label>
                                                <input id="cost" name="FCL" type="text" step="0.01" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            
                                            <div class="mb-2">
                                                <label for="cost" class="form-label">AIR:</label>
                                                <input id="cost" name="AIR" type="text" step="0.01" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            
                                            <div class="mb-2">
                                                <label for="cost" class="form-label">Break Bulk:</label>
                                                <input id="cost" name="Break Bulk" type="text" step="0.01" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            
                                            <div class="mb-2">
                                                <label for="cost" class="form-label">Sec Receivable:</label>
                                                <input id="cost" name="Sec Receivable" type="text" step="0.01" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="row">
                                            <label>Expense</label>
                                            <div class="col-md-12">
                                                
                                                <div class="mb-2">
                                                    <label for="cost" class="form-label">Ocean Freight:</label>
                                                    <input id="cost" name="Ocean Freight" type="text" step="0.01" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                
                                                <div class="mb-2">
                                                    <label for="cost" class="form-label">Documentation:</label>
                                                    <input id="cost" name="Documentation" type="text" step="0.01" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                
                                                <div class="mb-2">
                                                    <label for="cost" class="form-label">LCL:</label>
                                                    <input id="cost" name="LCL" type="text" step="0.01" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                
                                                <div class="mb-2">
                                                    <label for="cost" class="form-label">FCL:</label>
                                                    <input id="cost" name="FCL" type="text" step="0.01" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                
                                                <div class="mb-2">
                                                    <label for="cost" class="form-label">AIR:</label>
                                                    <input id="cost" name="AIR" type="text" step="0.01" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                
                                                <div class="mb-2">
                                                    <label for="cost" class="form-label">Break Bulk:</label>
                                                    <input id="cost" name="Break Bulk" type="text" step="0.01" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            
                                                <div class="mb-2">
                                                    <label for="cost" class="form-label">Sec Payable:</label>
                                                    <input id="cost" name="Sec Payable" type="text" step="0.01" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <h5>Logistic Common Account</h5>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label>Revenue</label>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="cost" class="form-label">Account:</label>
                                                <input id="cost" name="Account" type="text" step="0.01" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label>Expense</label>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="cost" class="form-label">Account:</label>
                                                <input id="cost" name="Account" type="text" step="0.01" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h5>Other Account</h5>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <div class="mb-2">
                                                <label for="cost" class="form-label">Security In Hand:</label>
                                                <input id="cost" name="Security In Hand" type="text" step="0.01" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            
                                            <div class="mb-2">
                                                <label for="cost" class="form-label">WIP:</label>
                                                <input id="cost" name="WIP" type="text" step="0.01" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            
                                            <div class="mb-2">
                                                <label for="cost" class="form-label">Principle:</label>
                                                <input id="cost" name="Principle" type="text" step="0.01" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            
                                            <div class="mb-2">
                                                <label for="cost" class="form-label">Bank Charges:</label>
                                                <input id="cost" name="Port Of Finel Dest" type="text" step="0.01" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="mb-2">
                                                    <label for="cost" class="form-label">Exchange Rate G/L:</label>
                                                    <input id="cost" name="Exchange Rate G/L" type="text" step="0.01" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                
                                                <div class="mb-2">
                                                    <label for="cost" class="form-label">Advance Against Running Detention:</label>
                                                    <input id="cost" name="Advance Against Running Detention" type="text" step="0.01" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                
                                                <div class="mb-2">
                                                    <label for="cost" class="form-label">Mergin Account:</label>
                                                    <input id="cost" name="Mergin Account" type="text" step="0.01" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                
                                                <div class="mb-2">
                                                    <label for="cost" class="form-label">Round Fectoe Account:</label>
                                                    <input id="cost" name="FRound Fectoe Account" type="text" step="0.01" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <div class="card mb-4">
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
            "url": "{{ route('admin.account_integrate.create') }}",
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
  let route = "/admin/account_integrate/get";
  let type = $(this).attr("data-type");
  let data = getList(route, type, id);
  if (data != null) {
    edit_row("", JSON.stringify(data));
  }
});



</script>

@endpush










