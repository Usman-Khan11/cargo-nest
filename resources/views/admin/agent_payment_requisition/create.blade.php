@extends('admin.layouts.app')


@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/agent_payment_requisition/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/agent_payment_requisition/delete')">
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
            <div class="col-md-12">
                <form id="myForm" method="post" action="{{ route('admin.agent_payment_requisition.store') }}" enctype="multipart/form-data">
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
                                        <input type="text" name="train_number" class="train_number form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Train Date :</label>
                                        <input type="date" name="train_date" class="train_date form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Pay # :</label>
                                        <input type="text" name="pay_number" class="pay_number form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label>Status:</label>
                                        <select name="status" class="status form-select">
                                            <option value="Active">Active</option>
                                            <option value="Disabled">Disabled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2 mt-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="adjust_advance" value="Adjust-Advance" class="adjust_advance form-check-input">
                                            &nbsp;Adjust Advance
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label>Cost Center:</label>
                                        <select name="cost_center" class="cost_center form-select">
                                            <option value="head-office">Head Office</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Mode :</label>
                                        <input type="text" name="mode" class="mode form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Total Amount :</label>
                                        <input type="text" name="total_amount" class="total_amount form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2 mt-4">
                                        <button type="button" class="btn btn-primary btn-sm">Auto Knock Off</button>
                                        <button type="button" class="btn btn-primary btn-sm mx-3">Refresh Invoice</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label>Overseas</label>
                                        <input type="text" name="overseas" class="overseas form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Currency</label>
                                        <select class="currency form-select" name="currency">
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
                                        <label>Tax (%)</label>
                                        <input type="text" name="tax_percentage" class="tax_percentage form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Tax Amount :</label>
                                        <input type="text" name="tax_amount" class="tax_amount form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Exchange Rate :</label>
                                        <input type="text" name="exchange_rate" class="exchange_rate form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="multi_currency" value="Multi-Currency" class="multi_currency form-check-input">
                                            &nbsp;Multi Currency
                                        </label>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label>Drawn At :</label>
                                        <input type="text" name="drawn_at" class="drawn_at form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label>Swift :</label>
                                        <input type="text" name="swift" class="swift form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label>Mform:</label>
                                        <input type="text" name="mform" class="mform form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <button type="button" class="btn btn-primary btn-sm">Approve</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label>Status :</label>
                                        <input type="text" name="status_1" class="status_1 form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label>By : N/A</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label>On : N/A</label>
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
                                    <th>S.No</th>
                                    <th>Operation</th>
                                    <th>Job #</th>
                                    <th>Invoice #</th>
                                    <th>Invoice Date</th>
                                    <th>DN/CN</th>
                                    <th>Ref #</th>
                                    <th>HBL/HAWB No</th>
                                    <th>MBL/MAWB No</th>
                                    <th>Container No</th>
                                    <th>Inv Curr</th>
                                    <th>InvExRate</th>
                                    <th>Inv Bal(FC)</th>
                                    <th>Amount (FC)</th>
                                    <th>Ex Rate</th>
                                    <th>Balance(FC)</th>
                                  </tr>
                                </thead>
                                <tbody class="detail_repeater">
                                    <tr>
                                        <td><i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                        <td><i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                        <td><input type="text" name="" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="operations[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="job_number[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="invoice_number[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="invoice_date[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="dn_cn[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="ref_number[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="hbl_hawb_number[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="mbl_mawb_number[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="container_number[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="inv_curr[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="inv_exrate[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="inv_bal_fc[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="amount_fc[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="ex_rate[]" class="form-control" style="width: 100%;"/></td>
                                        <td><input type="text" name="balance_fc[]" class="form-control" style="width: 100%;"/></td>
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
                                    <input name="total_amount" type="number" class="total_amount form-control">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Net Amount</label>
                                    <input name="net_amount" type="number" class="net_amount form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label class="form-label">Advance</label>
                                    <input name="advance" type="number" class="advance form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">Voucher No</label>
                                    <input name="voucher_no" type="text" class="voucher_no form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">Print</label>
                                    <input name="print" type="text" class="print form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">RF</label>
                                    <input name="rf" type="text" class="rf form-control">
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
        $(".pay_number").val(data.pay_number);
        $(".status").val(data.status);
        $(".adjust_advance").prop('checked', data.adjust_advance);
        $(".cost_center").val(data.cost_center);
        $(".mode").val(data.mode);
        $(".total_amount").val(data.total_amount);
        $(".overseas").val(data.overseas);
        $(".currency").val(data.currency);
        $(".tax_percentage").val(data.tax_percentage);
        $(".tax_amount").val(data.tax_amount);
        $(".exchange_rate").val(data.exchange_rate);
        $(".multi_currency").prop('checked', data.multi_currency);
        $(".drawn_at").val(data.drawn_at);
        $(".swift").val(data.swift);
        $(".mform").val(data.mform);
        $(".status_1").val(data.status_1);
        $(".remarks").val(data.remarks);
        $(".total_amount").val(data.total_amount);
        $(".net_amount").val(data.net_amount);
        $(".advance").val(data.advance);
        $(".voucher_no").val(data.voucher_no);
        $(".print").val(data.print);
        $(".rf").val(data.rf);
        
        $("#myForm").attr("action","{{ route('admin.agent_payment_requisition.update') }}")
        $("input[name=id]").val(data.id);
    }
    
}


$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/agent_payment_requisition/get";
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