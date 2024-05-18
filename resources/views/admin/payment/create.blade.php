@extends('admin.layouts.app')


@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus">
            <i class="fa fa-square-plus"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton"></i>
        </div>
        <div class="xmark">
            <i class="fa fa-circle-xmark"></i>
        </div>
        <div class="refresh">
            <i class="fa fa-refresh"></i>
        </div>
        <div class="lock">
            <i class="fa fa-lock"></i>
        </div>
        <div class="ban">
            <i class="fa fa-ban"></i>
        </div>
        <div class="backward">
            <i class="fa fa-backward-step"></i>
        </div>
        <div class="backward">
            <i class="fa fa-backward"></i>
        </div>
        <div class="forward">
            <i class="fa fa-forward"></i>
        </div>
        <div class="forward">
            <i class="fa fa-forward-step"></i>
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
                <form method="post" action="{{ route('admin.manifest.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bold">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label for="tran_number" class="form-label">Tran #</label>
                                        <input id="tran_number" name="tran_number" type="text" class="form-control" >
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label for="tran_date" class="form-label">Tran Date</label>
                                        <input id="tran_date" name="tran_date" type="date" class="form-control" >
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label for="status" class="form-label">Status</label>
                                        <select id="status" name="status" class="form-select" >
                                            <option value="">Select status</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Completed">Completed</option>
                                            <option value="In Progress">In Progress</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label for="sequence" class="form-label">Sequence</label>
                                        <input id="sequence" name="sequence" type="number" class="form-control" >
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label for="job_type" class="form-label">Job Type</label>
                                        <select id="job_type" name="job_type" class="form-select" >
                                            <option value="">Select job type</option>
                                            <option value="Full-Time">Full-Time</option>
                                            <option value="Part-Time">Part-Time</option>
                                            <option value="Contract">Contract</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label for="req" class="form-label">Req</label>
                                        <input id="req" name="req" type="text" class="form-control" >
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label for="cost_center" class="form-label">Cost Center</label>
                                        <select id="cost_center" name="job_type" class="form-select" >
                                            <option value="">Head Office</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2 mt-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="manual" value="settle_multiple_cc_invoice" class="form-check-input">
                                            &nbsp;Settle Multiple CC Invoice
                                        </label>
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label for="total_amount" class="form-label">Total Amount</label>
                                        <input id="total_amount" name="total_amount" type="number" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label for="total_amount" class="form-label">Total Amount</label>
                                        <input id="total_amount" name="total_amount" type="number" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label for="vendor" class="form-label">Vendor</label>
                                        <input id="vendor" name="vendor" type="text" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label for="cost" class="form-label">Code</label>
                                        <input id="code" name="cost" type="number" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label for="currency" class="form-label">Currency</label>
                                        <select id="currency" name="currency" class="form-select" required>
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
                                        <button class="btn btn-primary btn-sm">Auto Knock off</button>
                                        <button class="btn btn-primary btn-sm">Refresh Bills</button>
                                        <button class="btn btn-primary btn-sm">Advanch Search</button>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label for="currency" class="form-label">Operation</label>
                                        <select id="operation" name="operation" class="form-select" required>
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
                                        <input name="job_number" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Terminal Inv</label>
                                        <input name="terminal_inv" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="manual" value="settle_multiple_cc_invoice" class="form-check-input">
                                            &nbsp;Continue
                                        </label>
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="manual" value="settle_multiple_cc_invoice" class="form-check-input">
                                            &nbsp;Adjust Advance
                                        </label>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <label class="form-label">Tran Mode</label>
                                    <div class="mb-2 d-flex">
                                        <div>
                                            <input type="radio" id="cash" name="payment_type" value="Cash" class="form-check-input">
                                            <label for="cash" class="form-check-label">Cash</label>
                                        </div>
                                        <div class="mx-3">
                                            <input type="radio" id="bank" name="payment_type" value="Bank" class="form-check-input">
                                            <label for="bank" class="form-check-label">Bank</label>
                                        </div>
                                        <div class="">
                                            <input type="radio" id="bank" name="payment_type" value="Adjustment" class="form-check-input">
                                            <label for="bank" class="form-check-label">Adjustment</label>
                                        </div>
                                        <div class="mx-3">
                                            <input type="radio" id="bank" name="payment_type" value="Adjustment" class="form-check-input">
                                            <label for="bank" class="form-check-label">Adjustment Against Security</label>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Exchange Rate</label>
                                        <input name="exchange_rate" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2 mt-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="multi_currency" value="Multi Currency" class="form-check-input">
                                            &nbsp;Multi Currency
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">Account</label>
                                        <input name="account" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Code</label>
                                        <input name="code" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="manual" value="Reversal" class="form-check-input">
                                            &nbsp;Reversal
                                        </label>
                                    </div>
                                </div> 
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Rev Tran #</label>
                                        <input name="rev_tran_number" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Sub Type</label>
                                        <select name="sub_type" class="form-select">
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
                                        <input name="cheque" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Date</label>
                                        <input name="date" type="date" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Tax Authority</label>
                                        <input name="tax_authority" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Tax %</label>
                                        <input name="tax_percentage" type="number" step="0.01" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Tax Amount</label>
                                        <input name="tax_amount" type="number" step="0.01" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-5">
                                    <div class="mb-2">
                                        <label class="form-label">Pay To</label>
                                        <input name="pay_to" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-2">
                                        <label class="form-label">Account</label>
                                        <input name="on_account" type="text" class="form-control">
                                    </div>
                                </div>    
                                <div class="col-md-5">
                                    <div class="mb-2">
                                        <label class="form-label">On Account</label>
                                        <input name="on_account" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <hr/>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Tax2 %</label>
                                        <input name="tax2_percentage" type="number" step="0.01" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Tax2 Amt</label>
                                        <input name="tax2_amount" type="number" step="0.01" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label class="form-label">Account2 #</label>
                                        <input name="account2_number" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Tax3 %</label>
                                        <input name="tax3_percentage" type="number" step="0.01" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Tax3 Amt</label>
                                        <input name="tax3_amount" type="number" step="0.01" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">Account3 #</label>
                                        <input name="account3_number" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Bank Charges</label>
                                        <input name="bank_charges" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Gain/Loss (FC)</label>
                                        <input name="gain_loss_fc" type="number" step="0.01" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">Account</label>
                                        <input name="account" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">Account</label>
                                        <input name="account" type="text" class="form-control">
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
                                    <table class="datatables-basic table" style="width: 300%;">
                                        <thead>
                                          <tr>
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
                                            <td><input type="text" style="width: 100%;"/></td>
                                            <td class="text-center"><input type="checkbox" style="width: 16px; height:16px;"/></td>
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
                </div>
            </div>
            <div class="col-md-12">
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
                                    <input name="total_amount" type="text" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">Net Amount</label>
                                    <input name="net_amount" type="text" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">Voucher No</label>
                                    <input name="voucher_no" type="text" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="mb-2 mt-4">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="manual_remarks" value="Manual Remarks" class="form-check-input">
                                        &nbsp;Manual Remarks
                                    </label>
                                </div>
                            </div> 
                            
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">Discount</label>
                                    <input name="discount" type="text" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">Tax Amount</label>
                                    <input name="tax_amount" type="text" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">Net Amount Inv Tax</label>
                                    <input name="net_amount_inv_tax" type="text" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">Local Amount</label>
                                    <input name="local_amount" type="text" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">Total Deduction</label>
                                    <input name="total_deduction" type="text" class="form-control">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
