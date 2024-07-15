@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/principal_soa/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/principal_soa/delete')">
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
            <i class="fa fa-forward-step" title="Back"></i>
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
        <form id="myForm" method="post" action="{{ route('admin.principal_soa.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0" />
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Invoice:</label>
                                               <input id="cost" name="Invoice" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Inv Date:</label>
                                               <input id="cost" name="Inv Date" type="date" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Refrence:</label>
                                               <input id="cost" name="Refrence" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Principle:</label>
                                               <input id="cost" name="Principle" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="" class="form-label">soA Category:</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                
                                                <option value="Sort">Sea Import</option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="btn">
                                                <button class="btn btn-primary btn-sm">Pick Charges</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="" class="form-label">status:</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                
                                                <option value="Sort">Active</option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="" class="form-label">Invoice Type:</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                
                                                <option value="Sort"></option>
                                              </select>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="" class="form-label">Currency:</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                
                                                <option value="Sort"></option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Due Days:</label>
                                               <input id="cost" name="Due Days" type="number" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="" class="form-label">Approval status:</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                
                                                <option value="Sort">Finel</option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="" class="form-label">Cost Centre:</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                
                                                <option value="Sort">HEAD OFFICE</option>
                                              </select>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="btn">
                                        <button class="btn btn-primary btn-sm">Import</button>
                                    </div>
                                    <div class="btn">
                                        <button class="btn btn-primary btn-sm">Export</button>
                                    </div>
                                    <div class="btn">
                                        <button class="btn btn-primary btn-sm">Detention</button>
                                    </div>
                                    <div class="btn">
                                        <button class="btn btn-primary btn-sm">Other</button>
                                    </div>
                                    <div class="btn">
                                        <button class="btn btn-primary btn-sm">Adnavce search</button>
                                    </div>
                                    <div class="btn">
                                        <button class="btn btn-primary btn-sm">Download Tags</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="p-3">
                            <div class="card-datatable table-responsive pt-0">
                                <table class="datatables-basic table" style="width:100%;">
                                    <thead>
                                      <tr>
                                        <th>...</th>
                                        <th>...</th>
                                        <th>..</th>
                                        <th scope="col">s.No</th>
                                        <th>soa Category</th>
                                        <th scope="col">Operation Type</th>
                                        <th scope="col">Inv/Bill #</th>
                                        <th scope="col">Inv/Bill Date</th>
                                        <th scope="col">Ref No</th>
                                        <th scope="col">Job#</th>
                                        <th scope="col">HBL#</th>
                                        <th scope="col">MBL#</th>
                                        <th scope="col">Charge code</th>
                                        <th scope="col">Charge Name</th>
                                        <th>Charge Discription</th>
                                        <th>size/Type</th>
                                        <th>Rate Group</th>
                                        <th>DG/Non DG</th>
                                        <th>Containers</th>
                                        <th>DR/CR</th>
                                        <th>Qty</th>
                                        <th>Rate</th>
                                        <th>Amount</th>
                                        <th>Discount</th>
                                        <th>Net Amount</th>
                                        <th>Margin</th>
                                        <th>Tax</th>
                                        <th>Tax Amount</th>
                                        <th>Net Inc Tax Amount</th>
                                        <th>Currency</th>
                                        <th>Ex Rate</th>
                                        <th>Local Amount</th>
                                        <th></th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody class="detail_repeater">
                                        <tr>
                                            <td><i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                            <td><i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><select name="" id=""></select></td>
                                            <td><select name="" id=""></select></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><select name="" id=""></select></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><select name="" id=""></select></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><select name="" id=""></select></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><select name="" id=""></select></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Remarks:</label>
                                               <input id="cost" name="Remarks" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <button class="btn btn-primary btn-sm">Voucher#</button>
                                               <input id="cost" name="" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-check-label mb-2">
                                            <input type="checkbox" name="Sales Rep" value="Soc" class="form-check-input">
                                            Manual Remarks
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Bank Deposit:</label>
                                       <input id="cost" name="Bank Deposit" type="text" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">Amount/Dis</label>
                                            <div class="mb-2">
                                                <input name="" type="text" class="form-control">
                                            </div>
                                            <div class="mb-2">
                                                <input name="" type="text" class="form-control">
                                            </div>
                                            <div class="mb-2">
                                                <input name="" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Tax</label>
                                            <div class="mb-2">
                                                <input name="" type="text" class="form-control">
                                            </div>
                                            <div class="mb-2">
                                                <input name="" type="text" class="form-control">
                                            </div>
                                            <div class="mb-2">
                                                <input name="" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Net</label>
                                            <div class="mb-2">
                                                <input name="" type="text" class="form-control">
                                            </div>
                                            <div class="mb-2">
                                                <input name="" type="text" class="form-control">
                                            </div>
                                            <div class="mb-2">
                                                <input name="" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Local</label>
                                            <div class="mb-2">
                                                <input name="" type="text" class="form-control">
                                            </div>
                                            <div class="mb-2">
                                                <input name="" type="text" class="form-control">
                                            </div>
                                            <div class="mb-2">
                                                <input name="" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="responsive text-nowrap">
                                <table class="table table-bordered table-sm quotation_record"></table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>    
    </div>
@endsection

@push('script')
<script>
$('#submitButton').click(function(){
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
            "url": "{{ route('admin.voyage.create') }}",
            "type": "get",
            "data": function(d) {},
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
         "rowCallback": function(row, data) {
             $(row).attr("onclick",`edit_row(this,'${JSON.stringify(data)}')`)
         }
    });
});

function addNewRow(e){
    $(e).parent().parent().clone().prependTo(".detail_repeater");
    $(".detail_repeater tr:last").find("input").val(null);
    $(".detail_repeater tr:last").find("option").removeAttr("selected");
}

function delRow(e){
    if($(".detail_repeater tr").length <= 1) return;
    $(e).parent().parent().remove();
}

function addlocalRow(e){
    $(e).parent().parent().clone().prependTo(".local_repeater");
    $(".local_repeater tr:last").find("input").val(null);
    $(".local_repeater tr:last select").find("option").attr("selected",false);
}

function dellocalRow(e){
    if($(".local_repeater tr").length <= 1) return;
    $(e).parent().parent().remove();
}

function edit_row(e,data){
    data = JSON.parse(data);
    if(data){
        $(".vessel").find(`option[value=${data.vessel.id}]`).attr('selected','selected');
        $(".voy").val(data.voy);
        $(".port_of_discharge").val(data.port_of_discharge);
        $(".port_of_loading").val(data.port_of_loading);
        $(".type").removeAttr('checked');
        $(`.type[value=${data.type}]`).attr('checked',true);
        $("#myForm").attr("action","{{ route('admin.principal_soa.update') }}")
        $("input[name=id]").val(data.id);
    }
}

$(".navigation").click(function(){
    let id = $("input[name=id]").val();
    let route = '/admin/principal_soa/get';
    let type = $(this).attr('data-type');
    let data = getList(route, type, id);
    if(data != null){
        edit_row('', JSON.stringify(data));
    }
})

</script>
@endpush









