@extends('admin.layouts.app')


@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/receipt/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/receipt/delete')">
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
                <form id="myForm" method="post" action="{{ route('admin.receipt.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bold">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0"/>
                            <div class="row mb-2">
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
                                            <option value="Active">Active</option>
                                            <option value="Disabled">Disabled</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Sequence</label>
                                        <input name="sequence" type="text" class="form-control sequence">
                                    </div>
                                </div>
                                
                                <div class="col-md-1">
                                    <div class="mb-2 mt-4">
                                        <input name="refund" type="checkbox" value="Refund" class="form-check-input refund"><span>&nbsp;&nbsp;Refund</span>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">HBL#</label>
                                        <input name="hbl_number" type="text" class="form-control hbl_number">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Advance Bal</label>
                                        <input name="advance_balance" type="text" class="form-control advance_balance">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Cost Center</label>
                                        <select name="cost_center" class="form-select cost_center">
                                            <option value="Head-Office">Head Office</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2 mt-4">
                                        <input name="cc_invoice" type="checkbox" Value="Settle-Multiple-CC-Invoice" class="form-check-input cc_invoice"><span>&nbsp;&nbsp;Settle multiple CC Invoices</span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Total Amount</label>
                                        <input name="total_amount" type="text" class="form-control total_amount">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <button type="button" class="btn btn-primary btn-sm">Auto Knock Off</button>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Client</label>
                                        <input name="client" type="text" class="form-control client">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Code</label>
                                        <input name="code" type="text" class="form-control code">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Currency</label>
                                        <select name="currency" class="form-select currency">
                                            <option value="PKR">PKR</option>
                                            <option value="USD">USD</option>
                                            <option value="AED">AED</option>
                                            <option value="GPB">GPB</option>
                                            <option value="EUR">EUR</option>
                                            <option value="BDT">BDT</option>
                                            <option value="OMR">OMR</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <button type="button" class="btn btn-primary btn-sm">Refresh Invoice</button>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Operation</label>
                                        <select name="operation" class="form-select operation">
                                            <option class="Air-Import">Air Import</option>
                                            <option class="Air-Export">Air Export</option>
                                            <option class="Sea-Import">Sea Import</option>
                                            <option class="Sea-Export">Sea Export</option>
                                            <option class="Logistics">Logistics</option>
                                            <option class="Warehouse">Warehouse</option>
                                            <option class="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Job #</label>
                                        <input name="job_number" type="text" class="form-control job_number">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Terminal Inv #</label>
                                        <input name="terminal_inv_number" type="text" class="form-control terminal_inv_number">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <input name="continue" type="checkbox" value="Continue" class="form-check-input continue"><span>&nbsp;&nbsp;Continue</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2 mt-4">
                                        <button type="button" class="btn btn-primary btn-sm">Upload Detail</button>
                                        <button type="button" class="btn btn-primary btn-sm">Advanced Search</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2 d-flex justify-content-between">
                                        <div>
                                            <label class="form-label">Exchange Rate</label>
                                           <input name="exchange_rate" type="text" class="form-control exchange_rate"> 
                                        </div>
                                        <div class="mt-4">
                                            <input name="multi_currency" type="checkbox" value="Multi-Currency" class="form-check-input multi_currency"><span>&nbsp;&nbsp;Multi Currency</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">Payment Type</label>
                                    <div class="mb-2 d-flex">
                                        <div class="mx-3">
                                            <input type="radio" id="cash" name="payment_type" value="cash" class="form-check-input payment_type">
                                            <label for="cash" class="form-check-label">Cash</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="bank" name="payment_type" value="bank" class="form-check-input payment_type">
                                            <label for="bank" class="form-check-label">Bank</label>
                                        </div>
                                        <div class="mx-3">
                                            <input type="radio" id="adjustment" name="payment_type" value="adjustment" class="form-check-input payment_type">
                                            <label for="adjustment" class="form-check-label">Adjustment</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="security_in_hand" name="payment_type" value="security_in_hand" class="form-check-input payment_type">
                                            <label for="security_in_hand" class="form-check-label">Security in Hand</label>
                                        </div>
                                        <div class="mx-3">
                                            <input type="radio" id="adjust_from_security" name="payment_type" value="adjust_from_security" class="form-check-input payment_type">
                                            <label for="adjust_from_security" class="form-check-label">Adjust from Security</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4"> 
                                    <div class="mb-2">
                                        <label class="form-label">Account</label>
                                        <input name="account" type="text" class="form-control account">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Code</label>
                                        <input name="code2" type="text" class="form-control code2">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <input name="reversal" type="checkbox" value="Reversal" class="form-check-input reversal"><span>&nbsp;&nbsp;Reversal</span>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Rev Tran#</label>
                                        <input name="rev_tran_number" type="text" class="form-control rev_tran_number">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label class="form-label">On Account</label>
                                        <input name="on_account" type="text" class="form-control on_account">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Tax %</label>
                                        <input name="tax" type="text" class="form-control tax">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2 d-flex justify-content-evenly">
                                        <div class="mt-4">
                                            <input name="tax_amt" type="checkbox" value="Tax-Amount" class="form-class-input tax_amt"><span>&nbsp;&nbsp;Tax amt</span>
                                        </div>
                                        <div class="mt-4">
                                           <input name="tax_amt_box" type="text" class="form-control"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Sub Type</label>
                                        <select name="sub_type" class="form-select sub_type">
                                            <option value="Cheque">Cheque</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Cheque #</label>
                                        <input name="cheque_no" type="text" class="form-control cheque_no">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Date</label>
                                        <input name="date" type="date" class="form-control date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label class="form-label">Account#</label>
                                        <input name="account_no" type="text" class="form-control account_no">
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label class="form-label">Draw At</label>
                                        <input name="draw_at" type="text" class="form-control draw_at">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Invoice#</label>
                                        <input name="invoice_no" type="text" class="form-control invoice_no">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2 mt-4">
                                        <button type="button" class="btn btn-primary btn-sm">Pick Zero Balance Invoice</button>
                                    </div>
                                </div>
                                



                                
                            </div>
                            <div class="row px-2 py-3" style="border:1px solid #ccc;">
                                <div class="col-md-5">
                                    <div class="mb-2">
                                        <label class="form-label">Pay To</label>
                                        <input name="pay_to" type="text" class="form-control pay_to">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Bank Charges</label>
                                        <input name="bank_charges" type="text" class="form-control bank_charges">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Gain/Loss (FC)</label>
                                        <input name="gain_loss_fc" type="text" class="form-control gain_loss_fc">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2 mt-4">
                                        <button type="button" class="btn btn-primary btn-sm">Show Exchange Rate</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">Account</label>
                                        <input name="account1" type="text" class="form-control account1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">Account</label>
                                        <input name="account2" type="text" class="form-control account2">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                    <div class="card-body">
                        <div class="card-datatable table-responsive pt-0">
                                    <table class="datatables-basic table" style="width: 220%;">
                                        <thead>
                                          <tr>
                                            <th>...</th>
                                            <th>S.No</th>
                                            <th>Job #</th>
                                            <th>Invoice #</th>
                                            <th>Invoice Date</th>
                                            <th>Ref No</th>
                                            <th>HBL #</th>
                                            <th>MBL #</th>
                                            <th>Inv Curr</th>
                                            <th>Inv Bal(FC)</th>
                                            <th>Rcvd Amount (FC)</th>
                                            <th>Balance(FC)</th>
                                            <th>File No</th>
                                            <th>Container #</th>
                                            <th>Index #</th>
                                            <th>IGM No</th>
                                          </tr>
                                        </thead>
                                        <tbody class="detail_repeater">
                                            <tr>
                                                <td><i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                <td><i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                                <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="job_no[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="invoice_number[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="invoice_date[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="ref_no[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="hbl_no[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="mbl_no[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="inv_curr[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="inv_bal[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="rcvd_amount[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="balance[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="file_no[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="container[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="index_no[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="igm_no[]" class="form-control" type="text" style="width: 100%;"/></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                </div>
                    <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label class="form-label">Remarks</label>
                                    <textarea name="remarks" type="text" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">Total Amount</label>
                                    <input name="t_amount" type="text" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">Advance</label>
                                    <input name="advance" type="text" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">Voucher #</label>
                                    <input name="voucher_number" type="text" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">RF</label>
                                    <input name="rf" type="text" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">Net Received</label>
                                    <input name="net_received" type="text" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">Normal</label>
                                    <input name="normal" type="text" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">Security</label>
                                    <input name="security" type="text" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">Detension</label>
                                    <input name="detension" type="text" class="form-control">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                </form>
                
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
          $("input[name=id]").val(data.id);
          $(".tran_no").val(data.tran_no);
          $(".tran_date").val(data.bill_date);
          $(".status").val(data.status);
          $(".sequence").val(data.sequence);
          $(".refund").val(data.refund);
          $(".hbl_number").val(data.hbl_no);
          $(".advance_balance").val(data.advance_balance);
          $(".cost_center").val(data.cost_center);
          
          $(".cc_invoice").removeAttr('checked');
          $(`.cc_invoice[value=${data.cc_invoice}]`).attr('checked',true);
          
          $(".total_amount").val(data.total_amount);
          $(".client").val(data.client);
          $(".code").val(data.code);
          $(".currency").val(data.currency);
          $(".operation").val(data.operation);
          $(".job_number").val(data.job_number);
          $(".terminal_inv_number").val(data.terminal_inv_number);
          
          $(".continue").removeAttr('checked');
          $(`.continue[value=${data.continue}]`).attr('checked',true);
          
          $(".exchange_rate").val(data.exchange_rate);
          
          $(".multi_currency").removeAttr('checked');
          $(`.multi_currency[value=${data.multi_currency}]`).attr('checked',true);
          
          $(".payment_type").removeAttr('checked');
          $(`.payment_type[value=${data.payment_type}]`).attr('checked',true);
          
          $(".account").val(data.account);
          $(".code2").val(data.code2);
          
          $(".reversal").removeAttr('checked');
          $(`.reversal[value=${data.reversal}]`).attr('checked',true);
          
          $(".rev_tran_number").val(data.rev_tran_number);
          $(".on_account").val(data.on_account);
          $(".tax").val(data.tax);
          
          $(".tax_amt").removeAttr('checked');
          $(`.tax_amt[value=${data.tax_amt}]`).attr('checked',true);
          
          $(".sub_type").val(data.sub_type);
          $(".cheque_no").val(data.cheque_no);
          $(".date").val(data.date);
          $(".account_no").val(data.account_no);
          $(".draw_at").val(data.draw_at);
          $(".invoice_no").val(data.invoice_no);
          $(".pay_to").val(data.pay_to);
          $(".bank_charges").val(data.bank_charges);
          $(".gain_loss_fc").val(data.gain_loss_fc);
          $(".account_1").val(data.account_1);
          $(".account_2").val(data.account_2);
          $(".remarks").val(data.remarks);
          $(".t_amount").val(data.t_amount);
          $(".advance").val(data.advance);
          $(".voucher_number").val(data.voucher_number);
          $(".rf").val(data.rf);
          $(".net_received").val(data.net_received);
          $(".normal").val(data.normal);
          $(".security").val(data.security);
          $(".detension").val(data.detension);
        }  
        
      }
      
      $(".navigation").click(function () {
          let id = $("input[name=id]").val();
          let route = "/admin/receipt/get";
          let type = $(this).attr("data-type");
          let data = getList(route, type, id);
          if (data != null) {
            edit_row("", JSON.stringify(data));
          }
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
