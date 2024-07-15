@extends('admin.layouts.app')


@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/payment_requisition/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/payment_requisition/delete')">
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
<div class="col-md-5">
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
<div class="col-md-3">
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
            <div class="col-md-12">
                <form id="myForm" method="post" action="{{ route('admin.payment_requisition.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bold">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0"/>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Train #:</label>
                                        <input type="text" name="train_number" class="form-control train_number">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Train Date :</label>
                                        <input type="date" name="train_date" class="form-control train_date">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Payment # :</label>
                                        <input type="text" name="payment_number" class="form-control payment_number">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label>Status :</label>
                                        <select name="status" class="form-select status">
                                            <option value="active">Active</option>
                                            <option value="disabled">Disabled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2 mt-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="adjust_advance" value="Adjust-Advance" class="form-check-input adjust_advance">
                                            &nbsp;Adjust Advance
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label>Cost Center:</label>
                                        <select name="cost_center" class="form-select cost_center">
                                            <option value="head-office">Head Office</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2 mt-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="settle_multiple_cc_invoice" value="Settle-Multiple-CC-Invoice" class="form-check-input settle_multiple_cc_invoice">
                                            &nbsp;Settle Multiple CC Invoice
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Total Amount :</label>
                                        <input type="text" name="total_amount" class="form-control total_amount">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2 mt-4">
                                        <button type="button" class="btn btn-primary btn-sm auto_knock_off">Auto Knock Off</button>
                                        <button type="button" class="btn btn-primary btn-sm mx-2 refresh_bills">Refresh Bills</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label>Vendor :</label>
                                        <input type="text" name="vendor" class="form-control vendor">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Code :</label>
                                        <input type="text" name="code" class="form-control code">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Currency</label>
                                        <select name="currency" class="form-select currency">
                                            <option value="PKR">PKR</option>
                                            <option value="USD">USD</option>
                                            <option value="AED">AED</option>
                                            <option value="GBP">GBP</option>
                                            <option value="BDT">BDT</option>
                                            <option value="OMR">OMR</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Operation</label>
                                        <select name="operation" class="form-select operation">
                                            <option value="air_import">Air Import</option>
                                            <option value="air_export">Air Export</option>
                                            <option value="sea_import">Sea Import</option>
                                            <option value="sea_export">Sea Export</option>
                                            <option value="logistics">Logistics</option>
                                            <option value="warehouse">Warehouse</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Job # :</label>
                                        <input type="text" name="job_number" class="form-control job_number">
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>HBL # :</label>
                                        <input type="text" name="hbl_number" class="form-control hbl_number">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>MBL # :</label>
                                        <input type="text" name="mbl_number" class="form-control mbl_number">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="multi_currency" value="Multi Currency" class="form-check-input multi_currency">
                                            &nbsp;Multi Currency
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2 mt-4">
                                        <button type="button" class="btn btn-primary btn-sm job_payment">Job Payment</button>
                                        <button type="button" class="btn btn-primary btn-sm mx-2 detail_upload">Detail Upload</button>
                                        <button type="button" class="btn btn-primary btn-sm approve">Approve</button>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Tax Authority :</label>
                                        <input type="text" name="tax_authority" class="form-control tax_authority">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Tax (%):</label>
                                        <input type="text" name="tax_percentage" class="form-control tax_percentage">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Tax Amount :</label>
                                        <input type="text" name="tax_amount" class="form-control tax_amount">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Exchange Rate :</label>
                                        <input type="text" name="exchange_rate" class="form-control exchange_rate">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label>On Account :</label>
                                        <input type="text" name="on_account" class="form-control on_account">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Mode :</label>
                                        <select name="mode" class="form-select mode">
                                            <option value="cash">Cash</option>
                                            <option value="online">Online</option>
                                            <option value="payment">Payment</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Status :</label>
                                        <select name="status_1" class="form-control status_1">
                                            <option value="draft">Draft</option>
                                            <option value="pending">Pending</option>
                                            <option value="trash">Trash</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-3">
                                        <label>By: N/A</label>
                                    </div>
                                </div>    
                                <div class="col-md-2">
                                    <div class="mb-2 mt-3">
                                        <label>On: N/A</label>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="card-datatable table-responsive pt-0">
                            <table class="datatables-basic table" style="width: 250%;">
                                <thead>
                                  <tr>
                                    <th>...</th>
                                    <th>...</th>
                                    <th>S.No</th>
                                    <th>Operation</th>
                                    <th>Job #</th>
                                    <th>Bill #</th>
                                    <th>Bill Date</th>
                                    <th>Ref #</th>
                                    <th>HBL #</th>
                                    <th>MBL #</th>
                                    <th>Inv Curr</th>
                                    <th>InvExRate</th>
                                    <th>Bill Bal(FC)</th>
                                    <th>Payment Amount (FC)</th>
                                    <th>Balance(FC)</th>
                                    <th>-</th>
                                    <th>File Number</th>
                                    <th>Container #</th>
                                    <th>Index #</th>
                                    <th>Vessel</th>
                                    <th>Voyage</th>
                                  </tr>
                                </thead>
                                <tbody class="detail_repeater">
                                    <tr>
                                        <td><i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                        <td><i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                        <td><input type="text" name="" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="operations[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="job_number[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="bill_number[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="bill_date[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="ref_number[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="hbl_number[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="mbl_number[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="inv_curr[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="inv_ex_rate[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="bill_bal_fc[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="payment_amount_fc[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="balance_fc[]" class="form-control" style="width: 100%;"/></td>
                                        <td class="text-center"><input type="checkbox" name="balance_checkbox[]" class="form-check-input"/></td>
                                        <td><input type="text" name="file_number[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="container_number[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="index_number[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="vessel[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="voyage[]" class="form-control" style="width: 100%;"/></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label class="form-label">Remarks</label>
                                    <textarea name="remarks" rows="4" type="text" class="form-control remarks"></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label class="form-label">Total Amount</label>
                                    <input name="total_amount" type="number" class="form-control total_amount">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Net Amount</label>
                                    <input name="net_amount" type="number" class="form-control net_amount">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label class="form-label">Advance</label>
                                    <input name="advance" type="number" class="form-control advance">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">Voucher No</label>
                                    <input name="voucher_no" type="text" class="form-control voucher_no">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">Print</label>
                                    <input name="print" type="text" class="form-control print">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">RF</label>
                                    <input name="rf" type="text" class="form-control rf">
                                </div>
                            </div>
                         
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script') 
<script>

function edit_row(e,data){
    data = JSON.parse(data);
    if(data){
        $(".train_number").val(data.train_number);
        $(".train_date").val(data.train_date);
        $(".payment_number").val(data.payment_number);
        $(".status").val(data.status);
        $(".adjust_advance").prop('checked', data.adjust_advance);
        $(".cost_center").val(data.cost_center);
        $(".settle_multiple_cc_invoice").prop('checked', data.settle_multiple_cc_invoice);
        $(".total_amount").val(data.total_amount);
        $(".vendor").val(data.vendor);
        $(".code").val(data.code);
        $(".currency").val(data.currency);
        $(".operation").val(data.operation);
        $(".job_number").val(data.job_number);
        $(".hbl_number").val(data.hbl_number);
        $(".mbl_number").val(data.mbl_number);
        $(".multi_currency").prop('checked', data.multi_currency);
        $(".tax_authority").val(data.tax_authority);
        $(".tax_percentage").val(data.tax_percentage);
        $(".tax_amount").val(data.tax_amount);
        $(".exchange_rate").val(data.exchange_rate);
        $(".on_account").val(data.on_account);
        $(".mode").val(data.mode);
        $(".remarks").val(data.remarks);
        $(".total_amount").val(data.total_amount);
        $(".net_amount").val(data.net_amount);
        $(".advance").val(data.advance);
        $(".voucher_no").val(data.voucher_no);
        $(".print").val(data.print);
        $(".rf").val(data.rf);
        
        $("#myForm").attr("action","{{ route('admin.payment_requisition.update') }}")
        $("input[name=id]").val(data.id);
    }
    
}

$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/payment_requisition/get";
  let type = $(this).attr("data-type");
  let data = getList(route, type, id);
  if (data != null) {
    edit_row("", JSON.stringify(data));
  }
});


$('#submitButton').click(function(){
        // Trigger form submission
        $('#myForm').submit();
      });
      
      
 function addNewRow(e){
    $(e).parent().parent().clone().prependTo(".detail_repeater");
    $(".detail_repeater tr:last").find("input").val(null);
    $(".detail_repeater tr:last select").find("option").attr("selected",false);
}
    
function delRow(e){
    if($(".detail_repeater tr").length <= 1) return;
    $(e).parent().parent().remove();
}

</script>

@endpush