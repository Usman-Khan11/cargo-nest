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
                                            <option value="">Active</option>
                                            <option value="">Disabled</option>
                                        </select>
                                    </div>
                                </div>
                                
                                 <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="manual" value="Adjust Advance" class="form-check-input">
                                            &nbsp;Adjust Advance
                                        </label>
                                    </div>
                                </div> 
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Job Type</label>
                                        <select name="job_type" class="form-select">
                                            <option value="">Part Time</option>
                                            <option value="">Full Time</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Req</label>
                                        <input name="req" type="text" class="form-control">
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
                                        <label class="form-label">Rec/Pay</label>
                                        <select name="rec_pay" class="form-select">
                                            <option value="">Select Rec/Pay</option>
                                            <option value="Rec">Rec</option>
                                            <option value="Pay">Pay</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Total Amount</label>
                                        <input name="total_amount" type="number" class="form-control">
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
                                        <select name="rec_pay" class="form-select">
                                            <option value="">PKR</option>
                                            <option value="">USD</option>
                                            <option value="">AED</option>
                                            <option value="">GPB</option>
                                            <option value="">BDT</option>
                                            <option value="">OMR</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-2">
                                        <label class="form-label">Overseas Agent</label>
                                        <input name="overseas_agent" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Tran Mode</label>
                                    <div class="mb-2 d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="option" id="job_wise" value="job_wise">
                                            <label class="form-check-label" for="job_wise">Cash</label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="radio" name="option" id="milestone_wise" value="milestone_wise">
                                            <label class="form-check-label" for="milestone_wise">Bank</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="option" id="job_wise" value="job_wise">
                                            <label class="form-check-label" for="job_wise">Adjustment</label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="radio" name="option" id="milestone_wise" value="milestone_wise">
                                            <label class="form-check-label" for="milestone_wise">SV</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2 mt-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="settle_multiple_cc_invoice" value="Settle Multiple CC Invoice" class="form-check-input">
                                            &nbsp;Settle Multiple CC Invoice
                                        </label>
                                    </div>
                                </div> 

                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Exchange Rate</label>
                                        <input name="exchange_rate" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2 mt-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="multi_currency" value="Multi Currency" class="form-check-input">
                                            &nbsp;Multi-Currency
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
                                    <div class="mb-2 mt-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="reversal" value="Reversal" class="form-check-input">
                                            &nbsp;Reversal
                                        </label>
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Rev Tran #</label>
                                        <input name="rev_tran" type="text" class="form-control">
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
                                        <select name="sub_type" class="form-select">
                                            <option></option>
                                            <option></option>
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
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
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Tax %</label>
                                        <input name="tax_percentage" type="number" step="0.01" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Tax Amount</label>
                                        <input name="tax_amount" type="number" step="0.01" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Drawn At</label>
                                        <input name="drawn_at" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">Swift #</label>
                                        <input name="swift_number" type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="form-label">M Form</label>
                                        <input name="m_form" type="text" class="form-control">
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
                                        <label class="form-label">Pay To</label>
                                        <input name="pay_to" type="text" class="form-control">
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
                                <div class="mb-2">
                                    <label class="form-label">Remarks</label>
                                    <textarea name="remarks" rows="4" type="text" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label class="form-label">Total Amount</label>
                                    <input name="total_amount" type="number" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Net Amount</label>
                                    <input name="net_amount" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label class="form-label">Advance</label>
                                    <input name="advance" type="number" class="form-control">
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
    </div>
@endsection
