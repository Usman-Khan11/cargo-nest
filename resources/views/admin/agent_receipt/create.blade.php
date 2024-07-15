@extends('admin.layouts.app')


@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/agent_receipt/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/agent_receipt/delete')">
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
        <form id="myForm" method="post" action="{{ route('admin.agent_receipt.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bold">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden"/>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Tran #</label>
                                        <input name="tran_no" type="text" class="form-control tran_no">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Tran Date</label>
                                        <input name="tran_date" type="date" class="form-control tran_date">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-select status">
                                            <option value="active">Active</option>
                                            <option value="disabled">Disabled</option>
                                        </select>
                                    </div>
                                </div>
                                
                                 <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="adjust_advance" value="Adjust Advance" class="form-check-input adjust_advance">
                                            &nbsp;Adjust Advance
                                        </label>
                                    </div>
                                </div> 
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Job Type</label>
                                        <select name="job_type" class="form-select job_type">
                                            <option value="part-time">Part Time</option>
                                            <option value="full-time">Full Time</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Req</label>
                                        <input name="req" type="text" class="form-control req">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Cost Center</label>
                                        <select name="cost_center" class="form-select cost_center">
                                            <option value="head_office">Head Office</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Rec/Pay</label>
                                        <select name="rec_pay" class="form-select rec_pay">
                                            <option value="">Select Rec/Pay</option>
                                            <option value="Rec">Rec</option>
                                            <option value="Pay">Pay</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Total Amount</label>
                                        <input name="total_amount_1" type="number" class="form-control total_amount_1">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <button class="btn btn-primary btn-sm">Auto Knock Off</button>
                                        <button class="btn btn-primary btn-sm mx-2">Refresh Invoice</button>
                                        <button class="btn btn-primary btn-sm mt-2">Advance Search</button>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Currency</label>
                                        <select name="currency" class="form-select currency">
                                            <option value="pkr">PKR</option>
                                            <option value="usd">USD</option>
                                            <option value="aed">AED</option>
                                            <option value="gpb">GPB</option>
                                            <option value="bdt">BDT</option>
                                            <option value="omr">OMR</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-2">
                                        <label class="form-label">Overseas Agent</label>
                                        <input name="overseas_agent" type="text" class="form-control overseas_agent">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Tran Mode</label>
                                    <div class="mb-2 d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input tran_mode" type="radio" name="tran_mode" id="job_wise" value="job_wise">
                                            <label class="form-check-label" for="job_wise">Cash</label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input tran_mode" type="radio" name="tran_mode" id="milestone_wise" value="milestone_wise">
                                            <label class="form-check-label" for="milestone_wise">Bank</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input tran_mode" type="radio" name="tran_mode" id="job_wise" value="job_wise">
                                            <label class="form-check-label" for="job_wise">Adjustment</label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input tran_mode" type="radio" name="tran_mode" id="milestone_wise" value="milestone_wise">
                                            <label class="form-check-label" for="milestone_wise">SV</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2 mt-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="settle_multiple_cc_invoice" value="Settle Multiple CC Invoice" class="form-check-input settle_multiple_cc_invoice	">
                                            &nbsp;Settle Multiple CC Invoice
                                        </label>
                                    </div>
                                </div> 
    
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Exchange Rate</label>
                                        <input name="exchange_rate" type="text" class="form-control exchange_rate">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="multi_currency" value="Multi Currency" class="form-check-input multi_currency">
                                            &nbsp;Multi-Currency
                                        </label>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">Account</label>
                                        <input name="account_1" type="text" class="form-control account_1">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="reversal" value="Reversal" class="form-check-input reversal">
                                            &nbsp;Reversal
                                        </label>
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Rev Tran #</label>
                                        <input name="rev_tran_no" type="text" class="form-control rev_tran_no">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <button class="btn btn-primary btn-sm">Detail Upload</button>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Sub Type</label>
                                        <select name="sub_type" class="form-select sub_type">
                                            <option></option>
                                            <option></option>
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Cheque</label>
                                        <input name="cheque" type="text" class="form-control cheque">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Date</label>
                                        <input name="date" type="date" class="form-control date">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Tax %</label>
                                        <input name="tax" type="number" step="0.01" class="form-control tax">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Tax Amount</label>
                                        <input name="tax_amount" type="number" step="0.01" class="form-control tax_amount">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Drawn At</label>
                                        <input name="drawn_at" type="text" class="form-control drawn_at">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Swift #</label>
                                        <input name="swift_no" type="text" class="form-control swift_no">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">M Form</label>
                                        <input name="m_form" type="text" class="form-control m_form">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">Account</label>
                                        <input name="account_2" type="text" class="form-control account_2">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">Pay To</label>
                                        <input name="pay_to" type="text" class="form-control pay_to">
                                    </div>
                                </div>
    
    
                                
                            </div>
                        </div>
                    </div>
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
                                        <th>File #</th>
                                        <th>Inv Curr</th>
                                        <th>InvExRate</th>
                                        <th>Inv Bal(FC)</th>
                                        <th>Amount (FC)</th>
                                        <th>Ex Rate</th>
                                        <th>Balance(FC)</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                        <td><input type="text" class="form-control" name="s_no" style="width: 100%;"/></td>
                                        <td><input type="text" class="form-control" name="operation[]" style="width: 100%;"/></td>
                                        <td><input type="text" class="form-control" name="job_no[]" style="width: 100%;"/></td>
                                        <td><input type="text" class="form-control" name="invoice_no[]" style="width: 100%;"/></td>
                                        <td><input type="text" class="form-control" name="invoice_date[]" style="width: 100%;"/></td>
                                        <td><input type="text" class="form-control" name="dn_cn[]" style="width: 100%;"/></td>
                                        <td><input type="text" class="form-control" name="ref_no[]" style="width: 100%;"/></td>
                                        <td><input type="text" class="form-control" name="hbl_hawb_no[]" style="width: 100%;"/></td>
                                        <td><input type="text" class="form-control" name="mbl_mawb_no[]" style="width: 100%;"/></td>
                                        <td><input type="text" class="form-control" name="container_no[]" style="width: 100%;"/></td>
                                        <td><input type="text" class="form-control" name="file_no[]" style="width: 100%;"/></td>
                                        <td><input type="text" class="form-control" name="inv_curr[]" style="width: 100%;"/></td>
                                        <td><input type="text" class="form-control" name="inv_ex_rate[]" style="width: 100%;"/></td>
                                        <td><input type="text" class="form-control" name="inv_bal_fc[]" style="width: 100%;"/></td>
                                        <td><input type="text" class="form-control" name="amount_fc[]" style="width: 100%;"/></td>
                                        <td><input type="text" class="form-control" name="ex_rate[]" style="width: 100%;"/></td>
                                        <td><input type="text" class="form-control" name="balance_fc[]" style="width: 100%;"/></td>
                                        
                                       
                                       
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
                                        <input name="total_amount_2" type="number" class="form-control total_amount_2">
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
                                        <input name="voucher_no" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Print</label>
                                        <input name="print" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">RF</label>
                                        <input name="rf" type="text" class="form-control">
                                    </div>
                                </div>
                             
                              
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
    // Trigger form submission
    $('#myForm').submit();
  });
  
   function addNewRow(e){
        $(e).parent().parent().clone().prependTo(".detail_repeater");
    }
    
    function delRow(e){
        if($(".detail_repeater tr").length <= 1) return;
        $(e).parent().parent().remove();
    }


function edit_row(e, data) {
  data = JSON.parse(data);
  if (data) {
    $(".tran_no").val(data.tran_no);
    $(".tran_date").val(data.tran_date);
    $(".status").val(data.status);
    $(".job_type").val(data.job_type);
    $(".req").val(data.req);
    $(".cost_center").val(data.cost_center);
    $(".rec_pay").val(data.rec_pay);
    $(".total_amount_1").val(data.total_amount_1);
    $(".currency").val(data.currency);
    $(".overseas_agent").val(data.overseas_agent);
    $(".tran_mode").val(data.tran_mode);
    $(".exchange_rate").val(data.exchange_rate);
    $(".account_1").val(data.account_1);
    $(".rev_tran_no").val(data.rev_tran_no);
    $(".sub_type").val(data.sub_type);
    $(".cheque").val(data.cheque);
    $(".date").val(data.date);
    $(".tax").val(data.tax);
    $(".tax_amount").val(data.tax_amount);
    $(".drawn_at").val(data.drawn_at);
    $(".swift_no").val(data.swift_no);
    $(".m_form").val(data.m_form);
    $(".account_2").val(data.account_2);
    $(".pay_to").val(data.pay_to);
    
    $(".adjust_advance").prop("checked", data.adjust_advance);
    $(".reversal").prop("checked", data.reversal);
    $(".settle_multiple_cc_invoice").prop("checked", data.settle_multiple_cc_invoice);
    $(".multi_currency").prop("checked", data.multi_currency);
    $(".tran_mode").prop("checked", data.tran_mode);
    
    $(".remarks").val(data.remarks);
    $(".total_amount_2").val(data.total_amount_2);
    $(".net_amount").val(data.net_amount);
    $(".advance").val(data.advance);
    $(".voucher_no").val(data.voucher_no);
    $(".print").val(data.print);
    $(".rf").val(data.rf);
    
    
    
    $("#myForm").attr("action", "{{ route('admin.payment.update') }}");
    $("input[name=id]").val(data.id);
  }
}


$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/payment/get";
  let type = $(this).attr("data-type");
  let data = getList(route, type, id);
  if (data != null) {
    edit_row("", JSON.stringify(data));
  }
});


</script>

@endpush
