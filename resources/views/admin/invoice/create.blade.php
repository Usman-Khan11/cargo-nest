@extends('admin.layouts.app')

@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="formReset('/admin/invoice/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/invoice/delete')">
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
                <input type="text" class="form-control" />
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
        <form id="myForm" method="post" action="{{ route('admin.invoice.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bold">{{ $page_title }}</h4>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id" value="0" />

                            <div class="row">
                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Tran #</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="tran_number" value="{{ old('tran_number') }}" type="text"
                                                class="form-control tran_number" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label w-100 m-0">Inv Date</label>
                                        </div>
                                        <div class="col-8">
                                            <input name="inv_date" value="{{ old('inv_date') }}" type="date"
                                                class="form-control inv_date" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Reference</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="reference" value="{{ old('reference') }}" type="text"
                                                class="form-control reference" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Status</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="status" class="form-select status">
                                                <option value="active">Active</option>
                                                <option value="incomplete">Incomplete</option>
                                                <option value="void">Void</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Category</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="category" class="form-select category">
                                                <option value="regular">Regular</option>
                                                <option value="securityDeposit">Security Deposit</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="mt-2 d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input option" type="radio" name="option"
                                                id="Settled" value="Settled" checked>
                                            <label class="form-check-label" for="Settled">Settled</label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input option" type="radio" name="option"
                                                id="Un-settled" value="Un-settled">
                                            <label class="form-check-label" for="Un-settled">Un-Settled</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-5">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-2">
                                            <label class="form-label w-100 m-0">Client</label>
                                        </div>
                                        <div class="col-10">
                                            <select name="client" class="client form-select">
                                                <option selected disabled value="">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Sequence</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="sequence" type="text" value="{{ old('sequence') }}"
                                                class="form-control sequence">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label w-100 m-0">Invoice Type</label>
                                        </div>
                                        <div class="col-8">
                                            <select name="invoice_type" class="invoice_type form-select">
                                                <option value="SI">SI</option>
                                                <option value="CN">CN</option>
                                                <option value="Zero">Zero</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label w-100 m-0">Ref. Tran #</label>
                                        </div>
                                        <div class="col-8">
                                            <input name="ref_tran_number" type="text"
                                                value="{{ old('ref_tran_number') }}" class="form-control ref_tran_number">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label w-100 m-0">Operation</label>
                                        </div>
                                        <div class="col-8">
                                            <select name="operation" class="operation form-select">
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
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Job#</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="job_number" type="text" value="{{ old('job_number') }}"
                                                class="form-control job_number">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label w-100 m-0">Currency</label>
                                        </div>
                                        <div class="col-8">
                                            <select name="currency" class="form-select currency">
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
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label w-100 m-0">Cost Center</label>
                                        </div>
                                        <div class="col-8">
                                            <select name="cost_center" class="form-select cost_center">
                                                <option value="Head Office">Head Office</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <button type="button" class="btn btn-primary btn-sm">Pick Charges</button>
                                    <button type="button" class="btn btn-primary btn-sm">Job Receipt</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label w-100 m-0">Invoice To</label>
                                        </div>
                                        <div class="col-8">
                                            <select name="invoice_to" class="form-select invoice_to">
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
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-5">
                                            <div class="form-check">
                                                <input class="form-check-input manual" type="checkbox" value="Manual"
                                                    id="manual" name="manual">
                                                <label class="form-check-label" for="manual">
                                                    Manual
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Due Days </label>
                                        </div>
                                        <div class="col-4">
                                            <input name="due_days" type="text" value="{{ old('due_days') }}"
                                                class="form-control due_days">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Invoice A/C</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="invoice_ac" type="text" value="{{ old('invoice_ac') }}"
                                                class="form-control invoice_ac">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input auto_round_off" type="checkbox"
                                            value="Auto Round Off" id="auto_round_off" name="auto_round_off">
                                        <label class="form-check-label" for="auto_round_off">
                                            Auto Round Off
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label w-100 m-0">Storage End Date</label>
                                        </div>
                                        <div class="col-8">
                                            <input name="storage_end_date" type="date"
                                                value="{{ old('storage_end_date') }}"
                                                class="form-control storage_end_date">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input tax_charges" type="checkbox" value="Tax Charges"
                                            id="tax_charges" name="tax_charges">
                                        <label class="form-check-label" for="tax_charges">
                                            Tax Charges
                                        </label>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label w-100 m-0">Invoice Title</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="invoice_title" class="form-select invoice_title">
                                                <option value=""></option>
                                                <option value="invoice">Invoice</option>
                                                <option value="debit_note">Debit Note</option>
                                                <option value="supplementary_bill">Supplementary Bill</option>
                                                <option value="revised_invoice">Revised Invoice</option>
                                                <option value="duplicate_invoice">Duplicate Invoice</option>
                                                <option value="detention_invoice">Detention Invoice</option>
                                                <option value="transportation_invoice">Transportation Invoice</option>
                                                <option value="financial_demand">Financial Demand</option>
                                                <option value="final_invoice">Final Invoice</option>
                                                <option value="commercial_invoice">Commercial Invoice</option>
                                                <option value="sindh_sales_tax_invoice">Sindh Sales Tax Invoice</option>
                                                <option value="punjab_sales_tax_invoice">Punjab Sales Tax Invoice</option>
                                                <option value="balochistan_sales_tax_invoice">Balochistan Sales Tax Invoice
                                                </option>
                                                <option value="kpk_sales_tax_invoice">Khyber Pakhtunkhwa Sales Tax Invoice
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <button type="button" class="btn btn-primary btn-sm mx-2">Advance Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <tbody class="detail_repeater">
                                        <td><i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i>
                                        </td>
                                        <td><i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                        <td><input name="" class="form-control" type="text"
                                                style="width: 100%;" /></td>
                                        <td><input name="charges_code" class="form-control" type="text"
                                                style="width: 100%;" /></td>
                                        <td><input name="charges_name" class="form-control" type="text"
                                                style="width: 100%;" /></td>
                                        <td><input name="charges_description" class="form-control" type="text"
                                                style="width: 100%;" /></td>
                                        <td><input name="size_type" class="form-control" type="text"
                                                style="width: 100%;" /></td>
                                        <td><input name="rate_group" class="form-control" type="text"
                                                style="width: 100%;" /></td>
                                        <td><input name="dg_nondg" class="form-control" type="text"
                                                style="width: 100%;" /></td>
                                        <td><input name="container" class="form-control" type="text"
                                                style="width: 100%;" /></td>
                                        <td><input name="qty" class="form-control" type="text"
                                                style="width: 100%;" /></td>
                                        <td><input name="rate" class="form-control" type="text"
                                                style="width: 100%;" /></td>
                                        <td><input name="currencyy" class="form-control" type="text"
                                                style="width: 100%;" /></td>
                                        <td><input name="amount" class="form-control" type="text"
                                                style="width: 100%;" /></td>
                                        <td><input name="discount" class="form-control" type="text"
                                                style="width: 100%;" /></td>
                                        <td><input name="net_amount" class="form-control" type="text"
                                                style="width: 100%;" /></td>
                                        <td><input name="margin" class="form-control" type="text"
                                                style="width: 100%;" /></td>
                                        <td><input name="tax" class="form-control" type="text"
                                                style="width: 100%;" /></td>
                                        <td><input name="tax_amount" class="form-control" type="text"
                                                style="width: 100%;" /></td>
                                        <td><input name="inc_tax" class="form-control" type="text"
                                                style="width: 100%;" /></td>
                                        <td><input name="ex_rate" class="form-control" type="text"
                                                style="width: 100%;" /></td>
                                        <td><input name="local_amount" class="form-control" type="text"
                                                style="width: 100%;" /></td>
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
                                <div class="col-6">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-2">
                                            <label class="form-label w-100 m-0">Remarks</label>
                                        </div>
                                        <div class="col-10">
                                            <input name="remarks" type="text" value="{{ old('remarks') }}"
                                                class="form-control remarks">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label w-100 m-0">Total Amount</label>
                                        </div>
                                        <div class="col-8">
                                            <input name="total_amount" type="number" value="{{ old('total_amount') }}"
                                                class="form-control total_amount">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label w-100 m-0">Net Amount</label>
                                        </div>
                                        <div class="col-8">
                                            <input name="net_amount" type="number" value="{{ old('net_amount') }}"
                                                class="form-control net_amount">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label w-100 m-0">Voucher No</label>
                                        </div>
                                        <div class="col-8">
                                            <input name="voucher_no" type="text" value="{{ old('voucher_no') }}"
                                                class="form-control voucher_no">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3"></div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label w-100 m-0">Discount</label>
                                        </div>
                                        <div class="col-8">
                                            <input name="discount" type="number" value="{{ old('discount') }}"
                                                class="form-control discount">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label w-100 m-0">Tax Amount</label>
                                        </div>
                                        <div class="col-8">
                                            <input name="tax_amount" type="number" value="{{ old('tax_amount') }}"
                                                class="form-control tax_amount">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-2">
                                            <label class="form-label w-100 m-0">Bank Detail</label>
                                        </div>
                                        <div class="col-10">
                                            <input name="bank_detail" type="text" value="{{ old('bank_detail') }}"
                                                class="form-control bank_detail">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label w-100 m-0">Net Amount Inc Tax</label>
                                        </div>
                                        <div class="col-8">
                                            <input name="net_amount_inc_tax" type="number"
                                                value="{{ old('net_amount_inc_tax') }}"
                                                class="form-control net_amount_inc_tax">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label w-100 m-0">Local Amount</label>
                                        </div>
                                        <div class="col-8">
                                            <input name="local_amount" type="number" value="{{ old('local_amount') }}"
                                                class="form-control local_amount">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-8"></div>
                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-6">
                                            <label class="form-label w-100 m-0">LC Amount after Add Tax</label>
                                        </div>
                                        <div class="col-6">
                                            <input name="lc_amount" type="number" value="{{ old('lc_amount') }}"
                                                class="form-control lc_amount">
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-5">
                                            <label class="form-label w-100 m-0">Settled Amount</label>
                                        </div>
                                        <div class="col-7">
                                            <input name="settled_amount" type="number"
                                                value="{{ old('settled_amount') }}" class="form-control settled_amount">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-5">
                                            <label class="form-label w-100 m-0">Invoice Balance</label>
                                        </div>
                                        <div class="col-7">
                                            <input name="invoice_balance" type="number"
                                                value="{{ old('invoice_balance') }}"
                                                class="form-control invoice_balance">
                                        </div>
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
        $(document).ready(function() {
            $(".client").select2({
                data: @json($client)
            });
        })

        $('#submitButton').click(function() {
            $('#myForm').submit();
        });

        function edit_row(e, data) {
            data = JSON.parse(data);
            if (data) {
                $(".tran_number").val(data.tran_number);
                $(".inv_date").val(data.inv_date);
                $(".reference").val(data.reference);
                $(".status").val(data.status);
                $(".category").val(data.category);
                $(".option").val(data.option);
                $(".client").val(data.client).trigger('change');
                $(".sequence").val(data.sequence);
                $(".invoice_type").val(data.invoice_type);
                $(".ref_tran_number").val(data.ref_tran_number);
                $(".operation").val(data.operation);
                $(".job_number").val(data.job_number);
                $(".currency").val(data.currency);
                $(".cost_center").val(data.cost_center);
                $(".invoice_to").val(data.invoice_to);
                $(".manual").val(data.manual);
                $(".due_days").val(data.due_days);
                $(".invoice_ac").val(data.invoice_ac);
                $(".auto_round_off").val(data.auto_round_off);
                $(".storage_end_date").val(data.storage_end_date);
                $(".tax_charges").val(data.tax_charges);
                $(".invoice_title").val(data.invoice_title);
                $(".remarks").val(data.remarks);
                $(".total_amount").val(data.total_amount);
                $(".net_amount").val(data.net_amount);
                $(".voucher_no").val(data.voucher_no);
                $(".discount").val(data.discount);
                $(".tax_amount").val(data.tax_amount);
                $(".bank_detail").val(data.bank_detail);
                $(".net_amount_inc_tax").val(data.net_amount_inc_tax);
                $(".local_amount").val(data.local_amount);
                $(".settled_amount").val(data.settled_amount);
                $(".invoice_balance").val(data.invoice_balance);
                $(".lc_amount").val(data.lc_amount);

                $("#myForm").attr("action", "{{ route('admin.invoice.update') }}");
                $("input[name=id]").val(data.id);
            }

        }

        $(".navigation").click(function() {
            let id = $("input[name=id]").val();
            let route = "/admin/invoice/get";
            let type = $(this).attr("data-type");
            let data = getList(route, type, id);
            if (data != null) {
                edit_row("", JSON.stringify(data));
            }
        });



        function addNewRow(e) {
            $(e).parent().parent().clone().prependTo(".detail_repeater");
            $(".detail_repeater tr:last").find("input").val(null);
            $(".detail_repeater tr:last select").find("option").attr("selected", false);
        }

        function delRow(e) {
            if ($(".detail_repeater tr").length <= 1) return;
            $(e).parent().parent().remove();
        }
    </script>
@endpush
