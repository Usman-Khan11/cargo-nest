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
                                        <label class="form-label">Bill Date</label>
                                        <input name="bill_date" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Reference No</label>
                                        <input name="reference_number" type="text" class="form-control">
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
                                        <label class="form-label">Category</label>
                                        <input name="category" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Sequence</label>
                                        <input name="sequence" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2 mt-4 d-flex">
                                        <div>
                                            <input type="radio" id="cash" name="payment_type" value="Settled" class="form-check-input">
                                            <label for="cash" class="form-check-label">Settled</label>
                                        </div>
                                        <div class="mx-2">
                                            <input type="radio" id="bank" name="payment_type" value="Un-settled" class="form-check-input">
                                            <label for="bank" class="form-check-label">Un-settled</label>
                                        </div>
                                    </div>    
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <button class="btn btn-primary btn-sm">Job Payment</button>
                                        <button class="btn btn-primary btn-sm mx-2">Advance Search</button>
                                        <button class="btn btn-primary btn-sm mt-2">Payment Requisition</button>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">Vendor</label>
                                        <input name="vendor" type="text" class="form-control">
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
                                    <div class="mb-2">
                                        <label class="form-label">Invoice Type</label>
                                        <select name="invoice_type" class="form-select">
                                            <option>PI</option>
                                            <option>DR</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Ref, Bill#</label>
                                        <input name="ref_bill" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
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
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Aut/Man</label>
                                        <select name="auto_manual" class="form-select">
                                            <option>Auto</option>
                                            <option>Manual</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Job #</label>
                                        <input name="job_no" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2 mt-4 d-flex">
                                        <div>
                                            <input type="radio" id="cash" name="payment_type" value="Single" class="form-check-input">
                                            <label for="cash" class="form-check-label">Single</label>
                                        </div>
                                        <div class="mx-2">
                                            <input type="radio" id="bank" name="payment_type" value="Multiple" class="form-check-input">
                                            <label for="bank" class="form-check-label">Multiple</label>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <button class="btn btn-primary btn-sm">Pick Charges</button>
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
                                <div class="col-md-4">
                                    <div class="mb-2 mt-3">
                                        <label class="form-check-label mb-2">
                                            <input type="checkbox" name="auto_round_off" value="auto_round_off" class="form-check-input">
                                            Auto Round Off
                                        </label>
                                        <label class="form-check-label mx-3 mb-2">
                                            <input type="checkbox" name="continue_mode" value="continue_mode" class="form-check-input">
                                            Continue Mode
                                        </label>
                                        <label class="form-check-label">
                                            <input type="checkbox" name="show_terminal" value="show_terminal" class="form-check-input">
                                            Show Terminal
                                        </label>
                                        <label class="form-check-label mx-3">
                                            <input type="checkbox" name="rebate" value="rebate" class="form-check-input">
                                            Rebate
                                        </label>
                                        <label class="form-check-label">
                                            <input type="checkbox" name="show_bl_no" value="show_bl_no" class="form-check-input">
                                            Show BL No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="mb-2 mt-3">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="manual" value="Manual" class="form-check-input">
                                            Manual
                                        </label>
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Due Days</label>
                                        <input name="due_days" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Vndr Tax Inv No</label>
                                        <input name="vendor_tax_invoice_number" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Vndr Cmercial Inv No</label>
                                        <input name="vendor_commercial_invoice_number" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Vndr Inv Date</label>
                                        <input name="vendor_invoice_date" type="date" class="form-control">
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
                                            <th>Job #</th>
                                            <th>Charges Code</th>
                                            <th>Charges Name</th>
                                            <th>Charges Description</th>
                                            <th>Rate Group</th>
                                            <th>Size Type</th>
                                            <th>DG/Non-DG</th>
                                            <th>Manual Cont</th>
                                            <th>Containers</th>
                                            <th>Qty</th>
                                            <th>Rate</th>
                                            <th>Currency</th>
                                            <th>Amount</th>
                                            <th>Discount</th>
                                            <th>Net Amount</th>
                                            <th>Margin</th>
                                            <th>Tax</th>
                                            <th>Tax Amount</th>
                                            <th>Net Amount Inc Tax</th>
                                            <th>Ex Rate</th>
                                            <th>Local Amount</th>
                                            <th>Code</th>
                                            <th>Principal Name</th>
                                            <th>TPGL Payment</th>
                                            <th>TPGL Invoice</th>
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
                                            <td class="text-center"><input type="checkbox" style="width: 16px; height:16px;"/></td>
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
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">Remarks</label>
                                    <input name="remarks" type="text" class="form-control">
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
                                <div class="mb-2">
                                    <label class="form-label">Manual Remarks</label>
                                    <input name="manual_remarks" type="text" class="form-control">
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
