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
                            <div class="row">
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Invoice #</label>
                                        <input name="invoice_number" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Inv Date</label>
                                        <input name="invoice_date" type="date" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Agent Invoice#</label>
                                        <input name="agent_invoice_number" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-select">
                                            <option value="">Active</option>
                                            <option value="">Disabled</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Invoice Type</label>
                                        <select name="invoice_type" class="form-select">
                                            <option value="">Select invoice type</option>
                                            <option></option>
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <button class="btn btn-primary btn-sm mb-2">Advance Search</button>
                                        <button class="btn btn-primary btn-sm">Receipt/Payment</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label class="form-label">Overseas Agent</label>
                                        <input name="overseas_agent" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Currency</label>
                                        <select name="currency" class="form-select">
                                            <option value="">Select currency</option>
                                            <option value="USD">USD</option>
                                            <option value="EUR">EUR</option>
                                            <option value="GBP">GBP</option>
                                            <option value="BDT">BDT</option>
                                            <option value="OMR">OMR</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Due Days</label>
                                        <input name="due_days" type="number" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Operation</label>
                                        <select name="operation" class="form-select">
                                            <option value="">Air Import</option>
                                            <option value="">Air Export</option>
                                            <option value="">Sea Import</option>
                                            <option value="">Sea Export</option>
                                            <option value="">Logistics</option>
                                            <option value="">Warehouse</option>
                                            <option value="">Other</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Job#</label>
                                        <input name="job_number" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <button class="btn btn-primary btn-sm mb-2">Pick Charges</button>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Auto/Manual</label>
                                        <select name="auto_manual" class="form-select">
                                            <option value="">Select auto/manual</option>
                                            <option value="Auto">Auto</option>
                                            <option value="Manual">Manual</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Cost Center</label>
                                        <select name="cost_center" class="form-select">
                                            <option value="">Head Office</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Reference</label>
                                        <input name="reference" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <label class="form-label">Job Type</label>
                                    <div class="mb-2 d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="option" id="job_wise" value="Single">
                                            <label class="form-check-label" for="Single">Single</label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="radio" name="option" id="milestone_wise" value="Multiple">
                                            <label class="form-check-label" for="Multiple">Multiple</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">SOA Date</label>
                                        <input name="soa_date" type="date" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">SOA #</label>
                                        <input name="soa_number" type="text" class="form-control">
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
                                    <table class="datatables-basic table" style="width: 350%;">
                                        <thead>
                                          <tr>
                                            <th>...</th>
                                            <th>S.No</th>
                                            <th>Job #</th>
                                            <th>Charge Code</th>
                                            <th>Charge Name</th>
                                            <th>Charge Description</th>
                                            <th>Size Type</th>
                                            <th>Rate Group</th>
                                            <th>DG/Non-DG</th>
                                            <th>Containers</th>
                                            <th>HBL #</th>
                                            <th>MBL #</th>
                                            <th>DR/CR</th>
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
                                            <th>Currency</th>
                                            <th>Ex Rate</th>
                                            <th>Local Amount</th>
                                            <th>TPGL Invoice</th>
                                            <th>TPGL Payment</th>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                            <label class="form-label">Remarks</label>
                                            <textarea name="remarks" type="text" rows="4" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label class="form-label">Voucher #</label>
                                            <input name="voucher_no" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2 mt-4">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="manual_remarks" value="Manual Remarks" class="form-check-input">
                                                &nbsp;Manual Remarks
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                            <label class="form-label">Bank Detail</label>
                                            <input name="bank_detail" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label class="form-label">Settled Amt</label>
                                            <input name="settled_amt" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label class="form-label">Inv Balance</label>
                                            <input name="inv_balance" type="text" class="form-control">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label">Amount/Dis</label>
                                        <div class="mb-2">
                                            <input name="" type="text" class="form-control">
                                        </div>
                                        <div class="mb-2">
                                            <input name="" type="text" class="form-control">
                                        </div>
                                        <div class="mb-2">
                                            <input name="" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Tax</label>
                                        <div class="mb-2">
                                            <input name="" type="text" class="form-control">
                                        </div>
                                        <div class="mb-2">
                                            <input name="" type="text" class="form-control">
                                        </div>
                                        <div class="mb-2">
                                            <input name="" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Net Incl Tax Amount</label>
                                        <div class="mb-2">
                                            <input name="" type="text" class="form-control">
                                        </div>
                                        <div class="mb-2">
                                            <input name="" type="text" class="form-control">
                                        </div>
                                        <div class="mb-2">
                                            <input name="" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Local</label>
                                        <div class="mb-2">
                                            <input name="" type="text" class="form-control">
                                        </div>
                                        <div class="mb-2">
                                            <input name="" type="text" class="form-control">
                                        </div>
                                        <div class="mb-2">
                                            <input name="" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
