@extends('admin.layouts.app')


@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/payment/store')">
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
        <form id="myForm" method="post" action="{{ route('admin.payment.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-md-12">
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
                                            <input name="tran_no" type="text" class="form-control tran_no" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Tran Date</label>
                                            <input name="tran_date" type="date" class="form-control tran_date" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-select status">
                                                <option value="">Select status</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Completed">Completed</option>
                                                <option value="In Progress">In Progress</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Sequence</label>
                                            <input name="sequence" type="text" class="form-control sequence" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Job Type</label>
                                            <select name="job_type" class="form-select job_type" >
                                                <option value="">Select job type</option>
                                                <option value="Full-Time">Full-Time</option>
                                                <option value="Part-Time">Part-Time</option>
                                                <option value="Contract">Contract</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Req</label>
                                            <input name="req" type="text" class="form-control req"/>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label class="form-label">Cost Center</label>
                                            <select name="cost_center" class="form-select cost_center" >
                                                <option value="Head-Office">Head Office</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-2 mt-4">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="settle_multiple_cc_invoice" value="settle_multiple_cc_invoice" class="form-check-input settle_multiple_cc_invoice">
                                                &nbsp;Settle Multiple CC Invoice
                                            </label>
                                        </div>
                                    </div> 
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Total Amount</label>
                                            <input name="total_amount_1" type="number" class="form-control total_amount_1" >
                                        </div>
                                    </div>
                                    <!--<div class="col-md-4">-->
                                    <!--    <div class="mb-2">-->
                                    <!--        <label for="total_amount" class="form-label">Total Amount</label>-->
                                    <!--        <input id="total_amount" name="total_amount" type="number" class="form-control" >-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label class="form-label">Vendor</label>
                                            <input name="vendor" type="text" class="form-control vendor">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Code</label>
                                            <input name="code_1" type="number" class="form-control code_1" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Currency</label>
                                            <select name="currency" class="form-select currency" >
                                                <option value=""></option>
                                                <option value="USD">PKR</option>
                                                <option value="USD">USD</option>
                                                <option value="USD">AED</option>
                                                <option value="EUR">EUR</option>
                                                <option value="GBP">GBP</option>
                                                <option value="BDT">BDT</option>
                                                <option value="OMR">OMR</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2 mt-4">
                                            <button type="button" class="btn btn-primary btn-sm">Auto Knock off</button>
                                            <button type="button" class="btn btn-primary btn-sm">Refresh Bills</button>
                                            <button type="button" class="btn btn-primary btn-sm">Advanch Search</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Operation</label>
                                            <select name="operation" class="form-select operation" >
                                                <option value=""></option>
                                                <option value="Air Import">Air Import</option>
                                                <option value="Air Export">Air Export</option>
                                                <option value="Sea Import">Sea Import</option>
                                                <option value="Sea Export">Sea Export</option>
                                                <option value="Logistics">Logistics</option>
                                                <option value="Warehouse">Warehouse</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Job #</label>
                                            <input name="job_no" type="text" class="form-control job_no">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Terminal Inv</label>
                                            <input name="terminal_inv" type="text" class="form-control terminal_inv">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2 mt-4">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="continue" value="continue" class="form-check-input continue">
                                                &nbsp;Continue
                                            </label>
                                        </div>
                                    </div> 
                                    <div class="col-md-2">
                                        <div class="mb-2 mt-4">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="adjust_advance" value="Adjust_Advance" class="form-check-input adjust_advance">
                                                &nbsp;Adjust Advance
                                            </label>
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <label class="form-label">Tran Mode</label>
                                        <div class="mb-2 d-flex">
                                            <div>
                                                <input type="radio" id="cash" name="tran_mode" value="Cash" class="form-check-input tran_mode">
                                                <label for="cash" class="form-check-label">Cash</label>
                                            </div>
                                            <div class="mx-3">
                                                <input type="radio" id="bank" name="tran_mode" value="Bank" class="form-check-input tran_mode">
                                                <label for="bank" class="form-check-label">Bank</label>
                                            </div>
                                            <div class="">
                                                <input type="radio" id="bank" name="tran_mode" value="Adjustment" class="form-check-input tran_mode">
                                                <label for="bank" class="form-check-label">Adjustment</label>
                                            </div>
                                            <div class="mx-3">
                                                <input type="radio" id="bank" name="tran_mode" value="Adjustment-Against Security" class="form-check-input tran_mode">
                                                <label for="bank" class="form-check-label">Adjustment Against Security</label>
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label class="form-label">Exchange Rate</label>
                                            <input name="exchange_rate" type="text" class="form-control exchange_rate">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-2 mt-4">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="multi_currency" value="Multi Currency" class="form-check-input multi_currency">
                                                &nbsp;Multi Currency
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label class="form-label">Account</label>
                                            <input name="account_a" type="text" class="form-control account_a">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Code</label>
                                            <input name="code_2" type="text" class="form-control code_2">
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
                                        <div class="mb-2">
                                            <label class="form-label">Sub Type</label>
                                            <select name="sub_type" class="form-select sub_type">
                                                <option value="">Select sub type</option>
                                                <option value="Option 1">Option 1</option>
                                                <option value="Option 2">Option 2</option>
                                                <option value="Option 3">Option 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
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
                                    
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label class="form-label">Tax Authority</label>
                                            <input name="tax_authority" type="text" class="form-control tax_authority">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Tax %</label>
                                            <input name="tax" type="number" class="form-control tax">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Tax Amount</label>
                                            <input name="tax_amount_1" type="number" class="form-control tax_amount_1">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-5">
                                        <div class="mb-2">
                                            <label class="form-label">Pay To</label>
                                            <input name="pay_to" type="text" class="form-control pay_to">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-2">
                                            <label class="form-label">Account</label>
                                            <input name="amount_b" type="text" class="form-control amount_b">
                                        </div>
                                    </div>    
                                    <div class="col-md-5">
                                        <div class="mb-2">
                                            <label class="form-label">On Account</label>
                                            <input name="on_account" type="text" class="form-control on_account">
                                        </div>
                                    </div>
                                    
                                    <hr/>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Tax2 %</label>
                                            <input name="tax2" type="number" class="form-control tax2">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Tax2 Amt</label>
                                            <input name="tax2_amt" type="number" class="form-control tax2_amt">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label class="form-label">Account2 #</label>
                                            <input name="account2_no" type="text" class="form-control account2_no">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Tax3 %</label>
                                            <input name="tax3" type="number" class="form-control tax3">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Tax3 Amt</label>
                                            <input name="tax3_amt" type="number" class="form-control tax3_amt">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label class="form-label">Account3 #</label>
                                            <input name="account3_no" type="text" class="form-control account3_no">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label class="form-label">Bank Charges</label>
                                            <input name="bank_charges" type="text" class="form-control bank_charges" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label class="form-label">Gain/Loss (FC)</label>
                                            <input name="gain_loss_fc" type="number" class="form-control gain_loss_fc">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label class="form-label">Account</label>
                                            <input name="account_c" type="text" class="form-control account_c">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label class="form-label">Account</label>
                                            <input name="account_d" type="text" class="form-control account_d">
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
                                        <table class="datatables-basic table" style="width: 300%;">
                                            <thead>
                                              <tr>
                                                <th>...</th>
                                                <th>...</th>
                                                <th>S.No</th>
                                                <th>Operation</th>
                                                <th>Job #</th>
                                                <th>Bill #</th>
                                                <th>Bill Date</th>
                                                <th>Ref No</th>
                                                <th>HBL #</th>
                                                <th>MBL #</th>
                                                <th>Inv Curr</th>
                                                <th>Ex.Rate</th>
                                                <th>Bill Bal(FC)</th>
                                                <th>Payment Amount(FC)</th>
                                                <th>Balance(FC)</th>
                                                <th>-</th>
                                                <th>File #</th>
                                                <th>Container #</th>
                                                <th>Index #</th>
                                                <th>Vessel</th>
                                                <th>Voyage</th>
                                                <th>VndrTax Inv No</th>
                                                <th>Vndr Comercial Inv</th>
                                                <th>VndrTax Inv Date</th>
                                                
                                              </tr>
                                            </thead>
                                            <tbody class="detail_repeater">
                                                <tr>
                                                    <td><i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                    <td><i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                                    <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                                    <td><input name="t_operation[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                    <td><input name="t_job_no[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                    <td><input name="t_bii_no[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                    <td><input name="t_bill_date[]" class="form-control" type="date" style="width: 100%;"/></td>
                                                    <td><input name="t_ref_no[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                    <td><input name="t_hbl_no[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                    <td><input name="t_mbl_no[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                    <td><input name="t_inv_curr[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                    <td><input name="t_ex_rate[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                    <td><input name="t_bill_bal[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                    <td><input name="t_payment_amt[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                    <td><input name="t_balance[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                    <td class="text-center"><input class="" name="mark[]" type="checkbox" value="Check" style="width: 16px; height:16px;"/></td>
                                                    <td><input name="t_file_no[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                    <td><input name="t_container_no[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                    <td><input name="t_index_no[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                    <td><input name="t_vessel[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                    <td><input name="t_voyage[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                    <td><input name="t_vndr_tax[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                    <td><input name="t_vndr_comm[]" class="form-control" type="text" style="width: 100%;"/></td>
                                                    <td><input name="t_vndr_inv_date[]" class="form-control" type="text" style="width: 100%;"/></td>
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
                                        <textarea name="remarks" type="text" rows="4" class="form-control remarks" ></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Total Amount</label>
                                        <input name="total_amount" type="text" class="form-control total_amount">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Net Amount</label>
                                        <input name="net_amount" type="text" class="form-control net_amount">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Voucher No</label>
                                        <input name="voucher_no" type="text" class="form-control voucher_no">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="manual_remarks" value="Manual Remarks" class="form-check-input manual_remarks">
                                            &nbsp;Manual Remarks
                                        </label>
                                    </div>
                                </div> 
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Discount</label>
                                        <input name="discount" type="text" class="form-control discount">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Tax Amount</label>
                                        <input name="tax_amount_2" type="text" class="form-control tax_amount_2">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Net Amount Inv Tax</label>
                                        <input name="net_amount_inv_tax" type="text" class="form-control net_amount_inv_tax">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Local Amount</label>
                                        <input name="local_amount" type="text" class="form-control local_amount">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Total Deduction</label>
                                        <input name="total_deduction" type="text" class="form-control total_deduction">
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
    $(".sequence").val(data.sequence);
    $(".job_type").val(data.job_type);
    $(".req").val(data.req);
    $(".cost_center").val(data.cost_center);
    $(".settle_multiple_cc_invoice").prop("checked", data.settle_multiple_cc_invoice);
    $(".total_amount_1").val(data.total_amount_1);
    $(".vendor").val(data.vendor);
    $(".code_1").val(data.code_1);
    $(".currency").val(data.currency);
    $(".operation").val(data.operation);
    $(".job_no").val(data.job_no);
    $(".terminal_inv").val(data.terminal_inv);
    $(".continue").prop("checked", data.continue);
    $(".adjust_advance").prop("checked", data.adjust_advance);
    $("input[name='tran_mode'][value='" + data.tran_mode + "']").prop("checked", true);
    $(".exchange_rate").val(data.exchange_rate);
    $(".multi_currency").prop("checked", data.multi_currency);
    $(".account_a").val(data.account_a);
    $(".code_2").val(data.code_2);
    $(".reversal").prop("checked", data.reversal);
    $(".rev_tran_no").val(data.rev_tran_no);
    $(".sub_type").val(data.sub_type);
    $(".cheque").val(data.cheque);
    $(".date").val(data.date);
    $(".tax_authority").val(data.tax_authority);
    $(".tax").val(data.tax);
    $(".tax_amount_1").val(data.tax_amount_1);
    $(".pay_to").val(data.pay_to);
    $(".amount_b").val(data.amount_b);
    $(".on_account").val(data.on_account);
    $(".tax2").val(data.tax2);
    $(".tax2_amt").val(data.tax2_amt);
    $(".account2_no").val(data.account2_no);
    $(".tax3").val(data.tax3);
    $(".tax3_amt").val(data.tax3_amt);
    $(".account3_no").val(data.account3_no);
    $(".bank_charges").val(data.bank_charges);
    $(".gain_loss_fc").val(data.gain_loss_fc);
    $(".account_c").val(data.account_c);
    $(".account_d").val(data.account_d);
    
    $(".remarks").val(data.remarks);
    $(".total_amount").val(data.total_amount);
    $(".net_amount").val(data.net_amount);
    $(".voucher_no").val(data.voucher_no);
    $(".manual_remarks").prop("checked", data.manual_remarks);
    $(".discount").val(data.discount);
    $(".tax_amount_2").val(data.tax_amount_2);
    $(".net_amount_inv_tax").val(data.net_amount_inv_tax);
    $(".local_amount").val(data.local_amount);
    $(".total_deduction").val(data.total_deduction);
  
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