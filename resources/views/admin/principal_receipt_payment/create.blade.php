@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/principal_receipt_payment/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/principal_receipt_payment/delete')">
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
        <form id="myForm" method="post" action="{{ route('admin.principal_receipt_payment.store') }}" enctype="multipart/form-data">
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
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Tran#:</label>
                                               <input id="cost" name="Tran#" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Tran Date:</label>
                                               <input id="cost" name="Tran date" type="date" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="" class="form-label">status :</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                
                                                <option value="Sort">Active</option>
                                              </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="mb-2">
                                                <label for="" class="form-label">Cost Centre:</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                
                                                <option value="Sort">HEAD OFFICE</option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="" class="form-label">Rec/Pay:</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                
                                                <option value="Sort">Receipt</option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Principle:</label>
                                               <input id="cost" name="Principle" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <label>Tran Mode:</label>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <input type="radio" id="Vissel Wise" name="fav_language" value="HTML">
                                                <label for="Vissel Wise">Cash</label>
                                                <input type="radio" id="Shiping Line Wise" name="fav_language" value="CSS">
                                                <label for="Shiping Line Wise">Bank</label>
                                                <input type="radio" id="No Grouping" name="fav_language" value="JavaScript">
                                                <label for="No Grouping">Adjustment</label>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="Sales Rep" value="Soc" class="form-check-input">
                                                    settle Multiple  CC Invoices
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Account#:</label>
                                               <input id="cost" name="Account#" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="" class="form-label">sub Type:</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                
                                                <option value="Sort">Cheque</option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Cheque#:</label>
                                               <input id="cost" name="Account#" type="text" step="0.01" class="form-control" required>
                                               <button class="btn btn-primary btn-sm">...</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Date:</label>
                                               <input id="cost" name="Date" type="date" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Drawn At:</label>
                                               <input id="cost" name="Drawn At" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                            <label class="form-check-label mb-2">
                                                <input type="checkbox" name="Sales Rep" value="Soc" class="form-check-input">
                                                Adjust Advance
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Total Amount:</label>
                                           <input id="cost" name="Total Amount" type="number" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="btn">
                                            <button class="btn btn-primary btn-sm">Auto Knock Off</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="btn">
                                            <button class="btn btn-primary btn-sm">Advance search</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label for="" class="form-label">Currency:</label>
                                           <select name="Loading List" id="cars" step="0.01" class="form-control">
                                            
                                            <option value="Sort">PKR</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="btn">
                                            <button class="btn btn-primary btn-sm">Refresh Invoices</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="btn">
                                            <button class="btn btn-primary btn-sm">search</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Exchange Rate:</label>
                                           <input id="cost" name="Exchange Rate" type="number" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label class="form-check-label mb-2">
                                                <input type="checkbox" name="Sales Rep" value="Soc" class="form-check-input">
                                                Multi Currency
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label class="form-check-label mb-2">
                                                <input type="checkbox" name="Sales Rep" value="Soc" class="form-check-input">
                                                Reversal
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Rev Tran#:</label>
                                           <input id="cost" name="Rev Tran#" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Tax(%):</label>
                                           <input id="cost" name="Tax(%)" type="number" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label class="form-check-label mb-2">
                                                <input type="checkbox" name="Sales Rep" value="Soc" class="form-check-input">
                                              
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Tax Amount:</label>
                                           <input id="cost" name="Tax Amount" type="number" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Account:</label>
                                           <input id="cost" name="Account" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                               </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Bank Charges:</label>
                                       <input id="cost" name="Bank Charges" type="number" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Gain/Loss(FC):</label>
                                       <input id="cost" name="Gain/Loss(FC)" type="number" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Account#:</label>
                                       <input id="cost" name="Account" type="text" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Account#:</label>
                                       <input id="cost" name="Account" type="text" step="0.01" class="form-control" required>
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
                                        <th scope="col">s.No</th>
                                        <th scope="col">Operation</th>
                                        <th scope="col">Job #</th>
                                        <th scope="col">Invoice #</th>
                                        <th scope="col">Invoice Date</th>
                                        <th>Inv Currency</th>
                                        <th>DN/CN</th>
                                        <th scope="col">Ex Rate</th>
                                        <th>Inv Bal (FC)</th>
                                        <th scope="col">Amount (FC)</th>
                                        
                                        <th scope="col">Balence (FC)</th>
                                        <th scope="col">Col_Chec</th>
                                        <th scope="col">Net Amount</th>
                                      </tr>
                                    </thead>
                                    <tbody class="detail_repeater">
                                        <tr>
                                            <td><i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                            <td><i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><select name="" id=""></select></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><select name="" id=""></select></td>
                                            <td><select name="" id=""></select></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input type="checkbox" name="" id=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                   <div class="row">
                                    <div class="col-md-12">
                                        <label for="" class="form-label">Remarks:</label>
                                        <label class="form-check-label mb-2">
                                            <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                            Manual Remarks
                                        </label>
                                        <textarea name="" id="" class="form-control"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <button class="btn btn-primary btn-sm">Voucher #</button>
                                           <input id="cost" name="To" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label for="" class="form-label">Print:</label>
                                           <select name="Loading List" id="cars" step="0.01" class="form-control">
                                            
                                            <option value="Sort">With Detail</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">RF:</label>
                                           <input id="cost" name="RF" type="number" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                   </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Total Amount:</label>
                                               <input id="cost" name="Total Amount" type="number" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label"> Amount:</label>
                                               <input id="cost" name=" Amount" type="number" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Net Amount:</label>
                                               <input id="cost" name="Net Amount" type="number" step="0.01" class="form-control" required>
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
        $("#myForm").attr("action","{{ route('admin.principal_receipt_payment.update') }}")
        $("input[name=id]").val(data.id);
    }
}

$(".navigation").click(function(){
    let id = $("input[name=id]").val();
    let route = '/admin/principal_receipt_payment/get';
    let type = $(this).attr('data-type');
    let data = getList(route, type, id);
    if(data != null){
        edit_row('', JSON.stringify(data));
    }
})

</script>
@endpush









