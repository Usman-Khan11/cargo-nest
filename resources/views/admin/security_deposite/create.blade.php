@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/security_deposite/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/security_deposite/delete')">
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
        <form id="myForm" method="post" action="{{ route('admin.security_deposite.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0" />
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="operation">Operation Type:</label>
                                            <br>
                                        <select name="" id="operation" class="form-select">
                                            <option value="">Sea Import</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="job">Job #:</label>
                                        <input type="text" id="job" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="receivable">Receivable:</label>
                                            <br>
                                        <input type="number" id="receivable" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="invoice_balance">Invoice Balance:</label>
                                            <br>
                                        <input type="number" name="" id="invoice_balance" class="form-control" >
                                    </div>
                                </div>
                    
                                <!-- ROW 2 STARTS -->
                    
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="in_hand">In Hand:</label>
                                        <input type="number" id="in_hand" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="in_bank">In Bank:</label>
                                        <input type="number" id="in_bank" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="received">Received:</label>
                                        <input type="number" id="received" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="container_balance">Container Balance:</label>
                                        <input type="number" id="container_balance" class="form-control">
                                    </div>
                                </div>
                    
                                <!-- ROW 3 STARTS -->
                    
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="return">Return:</label>
                                        <input type="number" id="return" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="adjust">Adjust:</label>
                                        <input type="number" id="adjust" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="ref_balance">Ref Balance:</label>
                                        <input type="number" id="ref_balance" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <br>
                                        <input type="checkbox" id="security_closed" class="form-check-input">
                                        <label for="security_closed">Security Closed</label>
                                    </div>
                                </div>
                    
                                <!-- ROW 4 STARTS -->
                    
                                <div class="col-md-2">
                                    <div class="mb-3">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <button style="background-color: #f2f0f0; border: 1px solid #e2dcdc; width: 26%;" class="btn">Adjustment</button>
                                        <button style="background-color: #f2f0f0; border: 1px solid #e2dcdc; width: 20%;" class="btn">Return</button>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="hbl">HBL:</label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="mb-3"></div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <button style="background-color: #f2f0f0; border: 1px solid #e2dcdc;" class="btn">Refund Requisition</button>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="card-datatable table-responsive pt-0">
                                <table class="datatables-basic table">
                                    <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Info</th>
                                        <th>Tran Type</th>
                                        <th>Receipt</th>
                                        <th>Tran Status</th>
                                        <th>Amount</th>
                                        <th>Deposit Status</th>
                                        <th>Action Type</th>
                                        <th>Action</th>
                                        <th>Amount Code</th>
                                        <th>Contra A/C</th>
                                        <th>On Account</th>
                                        <th>col_Version</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                    </tbody>
                                </table>
                            </div>
                    
                            <div class="card-datatable table-responsive pt-0">
                                <table class="datatables-basic table">
                                    <thead>
                                    <tr>
                                        <th>S No</th>
                                        <th>Tran Date</th>
                                        <th>Security Tran Status</th>
                                        <th>Deposit Status</th>
                                        <th>Settlement A/C</th>
                                        <th>Bank A/C</th>
                                        <th>Voucher #</th>
                                        <th>Edit</th>
                                        <th>Amount</th>
                                        <th>Receipt #</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                        <td><input class="form-control" type="text" style="width: 100%;"/></td>
                                    </tbody>
                                </table>
                            </div>
                    
                    
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="in_hand_1">In Hand:</label>
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="in_bank_1">In Bank:</label>
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="adjust_1">Adjust:</label>
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="ref_balance_1">Ref Balance:</label>
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="return_1">Return:</label>
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="on_account">On Account: </label>
                                        <input type="text" class="form-control">
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
            "url": "{{ route('admin.security_deposite.create') }}",
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
        $("#myForm").attr("action","{{ route('admin.security_deposite.update') }}")
        $("input[name=id]").val(data.id);
    }
}

$(".navigation").click(function(){
    let id = $("input[name=id]").val();
    let route = '/admin/security_deposite/get';
    let type = $(this).attr('data-type');
    let data = getList(route, type, id);
    if(data != null){
        edit_row('', JSON.stringify(data));
    }
})

</script>
@endpush