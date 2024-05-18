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
                                        <label class="form-label">Tran #</label>
                                        <input name="tran_number" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Tran Date</label>
                                        <input name="tran_date" type="date" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-select">
                                            <option>Active</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Sequence</label>
                                        <input name="sequence" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-1">
                                    <div class="mb-2 mt-4">
                                        <input name="refund" type="checkbox" style="width:16px; height:16px;"><span>&nbsp;&nbsp;Refund</span>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">HBL#</label>
                                        <input name="hbl_number" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Advance Bal</label>
                                        <input name="advance_balance" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Cost Center</label>
                                        <select name="cost_center" class="form-select">
                                            <option>Head Office</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2 mt-4">
                                        <input name="refund" type="checkbox" style="width:16px; height:16px;"><span>&nbsp;&nbsp;Settle multiple CC Invoices</span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Total Amount</label>
                                        <input name="total_amount" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <button class="btn btn-primary btn-sm">Auto Knock Off</button>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Client</label>
                                        <input name="client" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Code</label>
                                        <input name="code" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Currency</label>
                                        <select name="currency" class="form-select">
                                            <option>PKR</option>
                                            <option>USD</option>
                                            <option>AED</option>
                                            <option>GPB</option>
                                            <option>EUR</option>
                                            <option>BDT</option>
                                            <option>OMR</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <button class="btn btn-primary btn-sm">Refresh Invoice</button>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Operation</label>
                                        <select name="operation" class="form-select">
                                            <option>Air Import</option>
                                            <option>Air Export</option>
                                            <option>Sea Import</option>
                                            <option>Sea Export</option>
                                            <option>Logistics</option>
                                            <option>Warehouse</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Job #</label>
                                        <input name="job_number" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Terminal Inv #</label>
                                        <input name="terminal_inv_number" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <input name="continue" type="checkbox" style="width:16px; height:16px;"><span>&nbsp;&nbsp;Continue</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2 mt-4">
                                        <button class="btn btn-primary btn-sm">Upload Detail</button>
                                        <button class="btn btn-primary btn-sm">Advanced Search</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2 d-flex justify-content-between">
                                        <div>
                                            <label class="form-label">Exchange Rate</label>
                                           <input name="exchange_rate" type="text" class="form-control"> 
                                        </div>
                                        <div class="mt-4">
                                            <input name="continue" type="checkbox" style="width:16px; height:16px;"><span>&nbsp;&nbsp;Multi Currency</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">Payment Type</label>
                                    <div class="mb-2 d-flex">
                                        <div class="mx-3">
                                            <input type="radio" id="cash" name="payment_type" value="cash" class="form-check-input">
                                            <label for="cash" class="form-check-label">Cash</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="bank" name="payment_type" value="bank" class="form-check-input">
                                            <label for="bank" class="form-check-label">Bank</label>
                                        </div>
                                        <div class="mx-3">
                                            <input type="radio" id="adjustment" name="payment_type" value="adjustment" class="form-check-input">
                                            <label for="adjustment" class="form-check-label">Adjustment</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="security_in_hand" name="payment_type" value="security_in_hand" class="form-check-input">
                                            <label for="security_in_hand" class="form-check-label">Security in Hand</label>
                                        </div>
                                        <div class="mx-3">
                                            <input type="radio" id="adjust_from_security" name="payment_type" value="adjust_from_security" class="form-check-input">
                                            <label for="adjust_from_security" class="form-check-label">Adjust from Security</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4"> 
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
                                        <input name="reversal" type="checkbox" style="width:16px; height:16px;"><span>&nbsp;&nbsp;Reversal</span>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Rev Tran#</label>
                                        <input name="rev_tran_number" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label class="form-label">On Account</label>
                                        <input name="on_account" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Tax %</label>
                                        <input name="tax" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2 d-flex justify-content-evenly">
                                        <div class="mt-4">
                                            <input name="tax_amt" type="checkbox" style="width:16px; height:16px;"><span>&nbsp;&nbsp;Tax amt</span>
                                        </div>
                                        <div class="mt-4">
                                           <input name="tax_amt" type="text" class="form-control"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Sub Type</label>
                                        <select name="sub_type" class="form-select">
                                            <option>Cheque</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Cheque #</label>
                                        <input name="cheque_no" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Date</label>
                                        <input name="date" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label class="form-label">Account#</label>
                                        <input name="Account" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label class="form-label">Draw At</label>
                                        <input name="draw_at" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Invoice#</label>
                                        <input name="invoice" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2 mt-4">
                                        <button class="btn btn-primary btn-sm">Pick Zero Balance Invoice</button>
                                    </div>
                                </div>
                                



                                
                            </div>
                            <div class="row px-2 py-3" style="border:1px solid #ccc;">
                                <div class="col-md-5">
                                    <div class="mb-2">
                                        <label class="form-label">Pay To</label>
                                        <input name="pay_to" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Bank Charges</label>
                                        <input name="bank_charges" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Gain/Loss (FC)</label>
                                        <input name="gain_loss_fc" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2 mt-4">
                                        <button class="btn btn-primary btn-sm">Show Exchange Rate</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">Account</label>
                                        <input name="account1" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">Account</label>
                                        <input name="account2" type="text" class="form-control">
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
                                            <th>-</th>
                                            <th>File No</th>
                                            <th>Container #</th>
                                            <th>Index #</th>
                                            <th>IGM No</th>
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
                                            <td class="text-center"><input type="checkbox" style="width: 16px; height:16px;"/></td>
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
            </div>
        </div>
    </div>
@endsection
