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
                <form id="myForm" method="post" action="{{ route('admin.invoice.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bold">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Tran #</label>
                                        <input name="tran_number" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Inv Date</label>
                                        <input name="inv_date" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Reference</label>
                                        <input name="reference" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-select">
                                            <option value="active">Active</option>
                                            <option value="incomplete">Incomplete</option>
                                            <option value="void">Void</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Category</label>
                                        <select name="category" class="form-select">
                                            <option value="regular">Regular</option>
                                            <option value="securityDeposit">Security Deposit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2 mt-4 d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="option" id="job_wise" value="job_wise">
                                            <label class="form-check-label" for="job_wise">Settled</label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="radio" name="option" id="milestone_wise" value="milestone_wise">
                                            <label class="form-check-label" for="milestone_wise">Un-Settled</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label class="form-label">Client</label>
                                        <input name="client" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Sequence</label>
                                        <input name="sequence" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Invoice Type</label>
                                        <input name="invoice_type" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Ref. Tran #</label>
                                        <input name="ref_tran_number" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Operation</label>
                                        <select name="operation" class="form-select">
                                            <option value="air import">Air Import</option>
                                            <option value="air export">Air Export</option>
                                            <option value="sea export">Sea Import</option>
                                            <option value="sea export">Sea Export</option>
                                            <option value="logistics">Logistics</option>
                                            <option value="warehouse">Warehouse</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Job#</label>
                                        <input name="job_number" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Currency</label>
                                        <select name="currency" class="form-select">
                                            <option value="PKR">PKR</option>
                                            <option value="USD">USD</option>
                                            <option value="AED">AED</option>
                                            <option value="GBP">GBP</option>
                                            <option value="EUR">EUR</option>
                                            <option value="BDT">BDT</option>
                                            <option value="OMR">OMR</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Cost Center</label>
                                        <select name="cost_center" class="form-select">
                                            <option value="Head Office">Head Office</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Invoice To</label>
                                        <select name="invoice_to" class="form-select">
                                            <option value="invoiceTo">Invoice To</option>
                                            <option value="clearingAgent">Clearing Agent</option>
                                            <option value="importer">Importer</option>
                                            <option value="coloader">Coloader</option>
                                            <option value="client">Client</option>
                                            <option value="clientImporter">Client/Importer</option>
                                            <option value="shipper">Shipper</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <input name="manual" type="checkbox" value="Manual"><span>&nbsp;&nbsp;Manual</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Due Days</label>
                                        <input name="due_days" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-2">
                                        <label class="form-label">Invoice A/C</label>
                                        <input name="invoice_ac" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <input name="auto_round_off" type="checkbox" value="Auto Round Off"><span>&nbsp;&nbsp;Auto Round Off</span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Storage End Date</label>
                                        <input name="storage_end_date" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <input name="tax_charges" type="checkbox" value="Tax Charges"><span>&nbsp;&nbsp;Tax Charges</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Invoice Title</label>
                                        <select name="invoice_title" class="form-select">
                                            <option value=""></option>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2 mt-3">
                                        <button class="btn btn-primary btn-sm">Job Receipt</button>
                                        <button class="btn btn-primary btn-sm mx-2">Advance Search</button>
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
                                    <table class="datatables-basic table" style="width: 280%;">
                                        <thead>
                                          <tr>
                                            <th>...</th>
                                            <th>S.No</th>
                                            <th>Charge Code</th>
                                            <th>Charge Name</th>
                                            <th>Charge Description</th>
                                            <th>Size Type</th>
                                            <th>Rate Group</th>
                                            <th>DG/Non-DG</th>
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
                            <div class="mb-3">
                                <label class="form-label">Remarks</label>
                                <input name="remarks" type="text" class="form-control">
                            </div>
                        </div>
                            <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Total Amount</label>
                                <input name="total_amount" type="number" class="form-control">
                            </div>
                        </div>
                            <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Net Amount</label>
                                <input name="net_amount" type="number" class="form-control">
                            </div>
                        </div>
                            <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Voucher No</label>
                                <input name="voucher_no" type="text" class="form-control">
                            </div>
                        </div>
                            <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Discount</label>
                                <input name="discount" type="number" class="form-control">
                            </div>
                        </div>
                            <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Tax Amount</label>
                                <input name="tax_amount" type="number" class="form-control">
                            </div>
                        </div>
                            <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Bank Detail</label>
                                <input name="bank_detail" type="text" class="form-control">
                            </div>
                        </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Net Amount Inc Tax</label>
                                    <input name="net_amount_inc_tax" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Local Amount</label>
                                    <input name="local_amount" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Settled Amount</label>
                                    <input name="settled_amount" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Invoice Balance</label>
                                    <input name="invoice_balance" type="number" class="form-control">
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
    $('#submitButton').click(function(){
        // Trigger form submission
        $('#myForm').submit();
      });
</script>

@endpush