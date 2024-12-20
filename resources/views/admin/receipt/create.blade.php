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
        <div class="row">
            <div class="col-md-12">
                <form id="myForm" method="post" action="{{ route('admin.receipt.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bold">{{ $page_title }}</h4>
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0" />

                            <div class="row">
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Tran #</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="tran_no" value="{{ old('tran_no') }}" type="text"
                                                        class="form-control tran_no" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Tran Date</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="tran_date" value="{{ old('tran_date') }}" type="date"
                                                        class="form-control tran_date" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Status</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="status" class="form-select status">
                                                        <option value="Active">Active</option>
                                                        <option value="Disabled">Disabled</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-7">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Cost Center</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="cost_center" class="form-select cost_center">
                                                        <option value="Head-Office">Head Office</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="row g-0 align-items-center mb-1 mt-1">
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input cc_invoice" type="checkbox"
                                                            value="settle_multiple_cc_invoices" id="cc_invoice"
                                                            name="cc_invoice">
                                                        <label class="form-check-label" for="cc_invoice">
                                                            Settle multiple CC Invoices
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-8">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">Client</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="client" class="form-select client">
                                                        <option value="" selected disabled></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Code</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="code" value="{{ old('code') }}" type="text"
                                                        class="form-control code">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Operation</label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="operation" class="form-select operation">
                                                        <option value="air_import">Air Import</option>
                                                        <option value="air_export">Air Export</option>
                                                        <option value="sea_import">Sea Import</option>
                                                        <option value="sea_export">Sea Export</option>
                                                        <option value="logistics">Logistics</option>
                                                        <option value="warehouse">Warehouse</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Job #</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="job_number" value="{{ old('job_number') }}"
                                                        type="text" class="form-control job_number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Terminal Inv #</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="terminal_inv_number"
                                                        value="{{ old('terminal_inv_number') }}" type="text"
                                                        class="form-control terminal_inv_number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">Tran Mode</label>
                                                </div>
                                                <div class="col-10">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input payment_type" type="radio"
                                                            id="cash" value="cash" name="payment_type" checked>
                                                        <label class="form-check-label" for="cash">Cash</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input payment_type" type="radio"
                                                            id="bank" value="bank" name="payment_type">
                                                        <label class="form-check-label" for="bank">Bank</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input payment_type" type="radio"
                                                            id="adjustment" value="adjustment" name="payment_type">
                                                        <label class="form-check-label"
                                                            for="adjustment">Adjustment</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input payment_type" type="radio"
                                                            id="security_in_hand" value="security_in_hand"
                                                            name="payment_type">
                                                        <label class="form-check-label" for="security_in_hand">Security in
                                                            Hand</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input payment_type" type="radio"
                                                            id="adjust_from_security" value="adjust_from_security"
                                                            name="payment_type">
                                                        <label class="form-check-label" for="adjust_from_security">Adjust
                                                            from Security</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-8">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">Account</label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="account" value="{{ old('account') }}" type="text"
                                                        class="form-control account">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Code</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="code2" value="{{ old('code2') }}" type="text"
                                                        class="form-control code2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">On Account</label>
                                                </div>
                                                <div class="col-3">
                                                    <select name="on_account" class="form-select on_account">
                                                        <option value="client">Client</option>
                                                        <option value="importer">Importer</option>
                                                        <option value="shipper">Shipper</option>
                                                        <option value="clearing_agent">Clearing Agent</option>
                                                        <option value="coloader_forwarder">Coloader/Forwarder</option>
                                                        <option value="clearing_consignee">Clearing + Consignee</option>
                                                        <option value="other">Other</option>
                                                        <option value="investor">Investor</option>
                                                        <option value="3rd_party">3rd Party</option>
                                                        <option value="personal_ac">Personal A/C</option>
                                                        <option value="associate_companies">Associate Companies</option>
                                                    </select>
                                                </div>
                                                <div class="col-7">
                                                    <input name="account_no" value="{{ old('account_no') }}"
                                                        type="text" class="form-control account_no">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row payment_type_div">
                                        <div class="col-5">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Sub Type</label>
                                                </div>
                                                <div class="col-9">
                                                    <select name="sub_type" class="form-select sub_type">
                                                        <option value="ach">ACH</option>
                                                        <option value="wire_transfer">Wire Transfer</option>
                                                        <option value="online_transfer">Online Transfer</option>
                                                        <option value="credit_card">Credit Card</option>
                                                        <option value="cheque">Cheque</option>
                                                        <option value="po">PO</option>
                                                        <option value="tt">TT</option>
                                                        <option value="cash">CASH</option>
                                                        <option value="party">Party</option>
                                                        <option value="online_personal_ac">Online Personal A/C</option>
                                                        <option value="personal_cheque">Personal Cheque</option>
                                                        <option value="digital_wallet">Digital Wallet</option>
                                                        <option value="atm_transfer">ATM Transfer</option>
                                                        <option value="open_po">Open PO</option>
                                                        <option value="paycargo">PayCargo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Cheque #</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="cheque_no" value="{{ old('cheque_no') }}"
                                                        type="text" class="form-control cheque_no">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Date</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="date" value="{{ old('date') }}" type="date"
                                                        class="form-control date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row payment_type_div">
                                        <div class="col-12">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-1">
                                                    <label class="form-label w-100 m-0">Draw At</label>
                                                </div>
                                                <div class="col-11">
                                                    <input name="draw_at" value="{{ old('draw_at') }}" type="text"
                                                        class="form-control draw_at">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Sequence</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="sequence" value="{{ old('sequence') }}" type="text"
                                                        class="form-control sequence">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1 mt-1">
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input refund" type="checkbox"
                                                            value="refund" id="refund" name="refund">
                                                        <label class="form-check-label" for="refund">
                                                            Refund
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">HBL#</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="hbl_no" value="{{ old('hbl_no') }}" type="text"
                                                        class="form-control hbl_number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-5">
                                                    <label class="form-label w-100 m-0">Advance Bal</label>
                                                </div>
                                                <div class="col-7">
                                                    <input name="advance_balance" value="{{ old('advance_balance') }}"
                                                        type="text" class="form-control advance_balance">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-7">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Total Amount</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="total_amount" value="{{ old('total_amount') }}"
                                                        type="text" class="form-control total_amount">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-1">
                                                <button type="button" class="btn btn-primary btn-sm">Auto Knock
                                                    Off</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Currency</label>
                                                </div>
                                                <div class="col-8">
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
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-1">
                                                <button type="button" class="btn btn-primary btn-sm">Refresh
                                                    Invoice</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1 mt-1">
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input continue" type="checkbox"
                                                            value="continue" id="continue" name="continue">
                                                        <label class="form-check-label" for="continue">
                                                            Continue
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                                <button type="button" class="btn btn-primary btn-sm">Detail
                                                    Upload</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                                <button type="button" class="btn btn-primary btn-sm">Advanced
                                                    Search</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-7">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-5">
                                                    <label class="form-label w-100 m-0">Exchange Rate</label>
                                                </div>
                                                <div class="col-7">
                                                    <input name="exchange_rate" value="{{ old('exchange_rate') }}"
                                                        type="text" class="form-control exchange_rate">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="row g-0 align-items-center mb-1 mt-1">
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input multi_currency" type="checkbox"
                                                            value="multi_currency" id="multi_currency"
                                                            name="multi_currency">
                                                        <label class="form-check-label" for="multi_currency">
                                                            Multi Currency
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1 mt-1">
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input reversal" type="checkbox"
                                                            value="reversal" id="reversal" name="reversal">
                                                        <label class="form-check-label" for="reversal">
                                                            Reversal
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Rev Tran#</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="rev_tran_number" value="{{ old('rev_tran_number') }}"
                                                        type="text" class="form-control rev_tran_number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-8">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Tax Authority</label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="tax_authority" class="form-select tax_authority">
                                                        <option value="fbr">FBR</option>
                                                        <option value="srb">SRB</option>
                                                        <option value="sindh_sales_tax">SINDH SALES TAX</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Tax %</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="tax" value="{{ old('tax') }}" type="text"
                                                        class="form-control tax">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input tax_amt" type="checkbox"
                                                            value="tax_amount" id="tax_amt" name="tax_amt">
                                                        <label class="form-check-label" for="tax_amt">
                                                            Tax amt
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <input name="tax_amt_box" value="{{ old('tax_amt_box') }}"
                                                        type="text" class="form-control tax_amt_box">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">Account#</label>
                                                </div>
                                                <div class="col-7">
                                                    <input name="account_no_1" value="{{ old('account_no_1') }}"
                                                        type="text" class="form-control account_no_1">
                                                </div>
                                                <div class="col-3">
                                                    <input name="code3" value="{{ old('code3') }}" type="text"
                                                        class="form-control code3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Invoice#</label>
                                                </div>
                                                <div class="col-9">
                                                    <input name="invoice_no" value="{{ old('invoice_no') }}"
                                                        type="text" class="form-control invoice_no">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <button type="button" class="btn btn-primary btn-sm">
                                                    Pick Zero Balance Invoice
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-2" style="border:2px solid #ccc;">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label w-100 m-0">Tax Authority 2</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select name="tax_authority_2"
                                                            class="form-select tax_authority_2">
                                                            <option value="fbr">FBR</option>
                                                            <option value="srb">SRB</option>
                                                            <option value="sindh_sales_tax">SINDH SALES TAX</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label w-100 m-0">Tax %</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="tax_2" value="{{ old('tax_2') }}" type="text"
                                                            class="form-control tax_2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input tax_amt_2" type="checkbox"
                                                                value="tax_amount" id="tax_amt_2" name="tax_amt_2">
                                                            <label class="form-check-label" for="tax_amt_2">
                                                                Tax amt
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="tax_amt_box_2" value="{{ old('tax_amt_box_2') }}"
                                                            type="text" class="form-control tax_amt_box_2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-2">
                                                        <label class="form-label w-100 m-0">Account#</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <input name="account_no_2" value="{{ old('account_no_2') }}"
                                                            type="text" class="form-control account_no_2">
                                                    </div>
                                                    <div class="col-3">
                                                        <input name="code4" value="{{ old('code4') }}" type="text"
                                                            class="form-control code4">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label w-100 m-0">Tax Authority 3</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select name="tax_authority_3"
                                                            class="form-select tax_authority_3">
                                                            <option value="fbr">FBR</option>
                                                            <option value="srb">SRB</option>
                                                            <option value="sindh_sales_tax">SINDH SALES TAX</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label w-100 m-0">Tax %</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="tax_3" value="{{ old('tax_3') }}" type="text"
                                                            class="form-control tax_3">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input tax_amt_3" type="checkbox"
                                                                value="tax_amount" id="tax_amt_3" name="tax_amt_3">
                                                            <label class="form-check-label" for="tax_amt_3">
                                                                Tax amt
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="tax_amt_box_3" value="{{ old('tax_amt_box_3') }}"
                                                            type="text" class="form-control tax_amt_box_3">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-2">
                                                        <label class="form-label w-100 m-0">Account#</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <input name="account_no_3" value="{{ old('account_no_3') }}"
                                                            type="text" class="form-control account_no_3">
                                                    </div>
                                                    <div class="col-3">
                                                        <input name="code5" value="{{ old('code5') }}" type="text"
                                                            class="form-control code5">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-8">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label w-100 m-0">Tax Authority 4</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select name="tax_authority_4"
                                                            class="form-select tax_authority_4">
                                                            <option value="fbr">FBR</option>
                                                            <option value="srb">SRB</option>
                                                            <option value="sindh_sales_tax">SINDH SALES TAX</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label w-100 m-0">Tax %</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="tax_4" value="{{ old('tax_4') }}" type="text"
                                                            class="form-control tax_4">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input tax_amt_4" type="checkbox"
                                                                value="tax_amount" id="tax_amt_4" name="tax_amt_4">
                                                            <label class="form-check-label" for="tax_amt_4">
                                                                Tax amt
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="tax_amt_box_4" value="{{ old('tax_amt_box_4') }}"
                                                            type="text" class="form-control tax_amt_box_4">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-2">
                                                        <label class="form-label w-100 m-0">Account#</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <input name="account_no_4" value="{{ old('account_no_4') }}"
                                                            type="text" class="form-control account_no_4">
                                                    </div>
                                                    <div class="col-3">
                                                        <input name="code6" value="{{ old('code6') }}" type="text"
                                                            class="form-control code6">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label w-100 m-0">Bank Charges</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="bank_charges" value="{{ old('bank_charges') }}"
                                                            type="text" class="form-control bank_charges">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-2">
                                                        <label class="form-label w-100 m-0">Account#</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <input name="account_1" value="{{ old('account_1') }}"
                                                            type="text" class="form-control account_1">
                                                    </div>
                                                    <div class="col-3">
                                                        <input name="code7" value="{{ old('code7') }}" type="text"
                                                            class="form-control code7">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-4">
                                                        <label class="form-label w-100 m-0">Gain/Loss (FC)</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="gain_loss_fc" value="{{ old('gain_loss_fc') }}"
                                                            type="text" class="form-control gain_loss_fc">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div class="mb-1">
                                                    <button type="button" class="btn btn-primary btn-sm">
                                                        Show Exchange Rate
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row g-0 align-items-center mb-1">
                                                    <div class="col-2">
                                                        <label class="form-label w-100 m-0">Account#</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <input name="account_2" value="{{ old('account_2') }}"
                                                            type="text" class="form-control account_2">
                                                    </div>
                                                    <div class="col-3">
                                                        <input name="code8" value="{{ old('code8') }}" type="text"
                                                            class="form-control code8">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                            <td><i onclick="delRow(this)"
                                                    class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                            <td><i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                            <td><input name="" class="form-control" type="text"
                                                    style="width: 100%;" /></td>
                                            <td><input name="job_no[]" class="form-control" type="text"
                                                    style="width: 100%;" /></td>
                                            <td><input name="invoice_number[]" class="form-control" type="text"
                                                    style="width: 100%;" /></td>
                                            <td><input name="invoice_date[]" class="form-control" type="text"
                                                    style="width: 100%;" /></td>
                                            <td><input name="ref_no[]" class="form-control" type="text"
                                                    style="width: 100%;" /></td>
                                            <td><input name="hbl_noo[]" class="form-control" type="text"
                                                    style="width: 100%;" /></td>
                                            <td><input name="mbl_no[]" class="form-control" type="text"
                                                    style="width: 100%;" /></td>
                                            <td><input name="inv_curr[]" class="form-control" type="text"
                                                    style="width: 100%;" /></td>
                                            <td><input name="inv_bal[]" class="form-control" type="text"
                                                    style="width: 100%;" /></td>
                                            <td><input name="rcvd_amount[]" class="form-control" type="text"
                                                    style="width: 100%;" /></td>
                                            <td><input name="balance[]" class="form-control" type="text"
                                                    style="width: 100%;" /></td>
                                            <td><input name="file_no[]" class="form-control" type="text"
                                                    style="width: 100%;" /></td>
                                            <td><input name="container[]" class="form-control" type="text"
                                                    style="width: 100%;" /></td>
                                            <td><input name="index_no[]" class="form-control" type="text"
                                                    style="width: 100%;" /></td>
                                            <td><input name="igm_no[]" class="form-control" type="text"
                                                    style="width: 100%;" /></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-2">
                                            <button type="button"
                                                class="btn btn-primary btn-sm types_btn">Show/Hide</button>
                                        </div>
                                        <div class="col-10 types_div">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input types" type="checkbox" id="hbl_chk"
                                                    value="hbl" name="types[]">
                                                <label class="form-check-label" for="hbl_chk">HBL</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input types" type="checkbox" id="mbl_chk"
                                                    value="mbl" name="types[]">
                                                <label class="form-check-label" for="mbl_chk">MBL</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input types" type="checkbox" id="job_chk"
                                                    value="jon_no" name="types[]">
                                                <label class="form-check-label" for="job_chk">Job Nos</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input types" type="checkbox" id="file_chk"
                                                    value="file_no" name="types[]">
                                                <label class="form-check-label" for="file_chk">File No</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input types" type="checkbox" id="reference_chk"
                                                    value="reference_no" name="types[]">
                                                <label class="form-check-label" for="reference_chk">Reference No</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input types" type="checkbox" id="vehicle_chk"
                                                    value="vehicle_no" name="types[]">
                                                <label class="form-check-label" for="vehicle_chk">Vehicle No</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input types" type="checkbox" id="vessel_chk"
                                                    value="vessel" name="types[]">
                                                <label class="form-check-label" for="vessel_chk">Vessel</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input types" type="checkbox" id="voyage_chk"
                                                    value="voyage" name="types[]">
                                                <label class="form-check-label" for="voyage_chk">Voyage</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label class="form-label w-100 m-0">Remarks</label>
                                                    <div class="row g-0 align-items-center mb-1 mt-1">
                                                        <div class="col-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input manual_remarks"
                                                                    type="checkbox" value="manual_remarks"
                                                                    id="manual_remarks" name="manual_remarks">
                                                                <label style="font-size: 13px" class="form-check-label"
                                                                    for="manual_remarks">
                                                                    Manual Remarks
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-9">
                                                    <textarea name="remarks" type="text" rows="3" class="form-control">{{ old('remarks') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Voucher #</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="voucher_number" type="text"
                                                        class="form-control voucher_number"
                                                        value="{{ old('voucher_number') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-5">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">RF</label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="rf" type="text" class="form-control rf"
                                                        value="{{ old('rf') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Normal</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="normal" type="text" class="form-control normal"
                                                        value="{{ old('normal') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Security</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="security" type="text" class="form-control security"
                                                        value="{{ old('security') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Total Amount</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="t_amount" type="text" class="form-control t_amount"
                                                        value="{{ old('t_amount') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Advance</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="advance" type="text" class="form-control advance"
                                                        value="{{ old('advance') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Net Received</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="net_received" type="text"
                                                        class="form-control net_received"
                                                        value="{{ old('net_received') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Detension</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="detension" type="text" class="form-control detension"
                                                        value="{{ old('detension') }}">
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
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#submitButton').click(function() {
            $('#myForm').submit();
        });

        function addNewRow(e) {
            $(e).parent().parent().clone().prependTo(".detail_repeater");
        }

        function delRow(e) {
            if ($(".detail_repeater tr").length <= 1) return;
            $(e).parent().parent().remove();
        }

        function edit_row(e, data) {
            let res = JSON.parse(data);
            if (res.receipt) {
                data = res.receipt;
                $(".tran_no").val(data.tran_no);
                $(".tran_date").val(data.tran_date);
                $(".status").val(data.status).trigger("change");
                $(".sequence").val(data.sequence);
                $(".hbl_number").val(data.hbl_no);
                $(".advance_balance").val(data.advance_balance);
                $(".cost_center").val(data.cost_center);
                $(".total_amount").val(data.total_amount);
                $(".client").val(data.client).trigger('change');
                $(".code").val(data.code);
                $(".currency").val(data.currency).trigger('change');
                $(".operation").val(data.operation);
                $(".job_number").val(data.job_number);
                $(".terminal_inv_number").val(data.terminal_inv_number);
                $(".exchange_rate").val(data.exchange_rate);
                $(".account").val(data.account);
                $(".code2").val(data.code2);
                $(".rev_tran_number").val(data.rev_tran_number);
                $(".tax_authority").val(data.tax_authority).trigger('change');
                $(".on_account").val(data.on_account);
                $(".tax").val(data.tax);
                $(".tax_amt_box").val(data.tax_amt_box);
                $(".account_no_1").val(data.account_no_1);
                $(".code3").val(data.code3);
                $(".sub_type").val(data.sub_type);
                $(".cheque_no").val(data.cheque_no);
                $(".date").val(data.date);
                $(".account_no").val(data.account_no);
                $(".draw_at").val(data.draw_at);
                $(".invoice_no").val(data.invoice_no);
                $(".tax_authority_2").val(data.tax_authority_2).trigger('change');
                $(".tax_2").val(data.tax_2);
                $(".tax_amt_box_2").val(data.tax_amt_box_2);
                $(".account_no_2").val(data.account_no_2);
                $(".code4").val(data.code4);
                $(".tax_authority_3").val(data.tax_authority_3).trigger('change');
                $(".tax_3").val(data.tax_3);
                $(".tax_amt_box_3").val(data.tax_amt_box_3);
                $(".account_no_3").val(data.account_no_3);
                $(".code5").val(data.code5);
                $(".tax_authority_4").val(data.tax_authority_4).trigger('change');
                $(".tax_4").val(data.tax_4);
                $(".tax_amt_box_4").val(data.tax_amt_box_4);
                $(".account_no_4").val(data.account_no_4);
                $(".code6").val(data.code6);
                // $(".pay_to").val(data.pay_to);
                $(".bank_charges").val(data.bank_charges);
                $(".gain_loss_fc").val(data.gain_loss_fc);
                $(".account_1").val(data.account_1);
                $(".code7").val(data.code7);
                $(".account_2").val(data.account_2);
                $(".code8").val(data.code8);
                $(".remarks").val(data.remarks);
                $(".t_amount").val(data.t_amount);
                $(".advance").val(data.advance);
                $(".voucher_number").val(data.voucher_number);
                $(".rf").val(data.rf);
                $(".net_received").val(data.net_received);
                $(".normal").val(data.normal);
                $(".security").val(data.security);
                $(".detension").val(data.detension);
                $(`.payment_type[value='${data.payment_type}']`).prop('checked', true);

                $(".refund").prop("checked", data.refund === "refund");
                $(".cc_invoice").prop("checked", data.cc_invoice === "settle_multiple_cc_invoices");
                $(".continue").prop("checked", data.continue === "continue");
                $(".multi_currency").prop("checked", data.multi_currency === "multi_currency");
                $(".reversal").prop("checked", data.reversal === "reversal");
                $(".tax_amt").prop("checked", data.tax_amt === "tax_amt");
                $(".tax_amt_2").prop("checked", data.tax_amt_2 === "tax_amt_2");
                $(".tax_amt_3").prop("checked", data.tax_amt_3 === "tax_amt_3");
                $(".tax_amt_4").prop("checked", data.tax_amt_4 === "tax_amt_4");
                $(".manual_remarks").prop("checked", data.manual_remarks === "manual_remarks");

                if (data.types) {
                    data.types.forEach(type => {
                        $(`.types[value='${type}']`).prop('checked', true);
                    });
                    $(".types_div").show();
                } else {
                    $(".types").prop("checked", false);
                    $(".types_div").hide();
                }

                $("input[name=id]").val(data.id);
                $("#myForm").attr("action", "{{ route('admin.receipt.update') }}");
            }
        }

        $(".navigation").click(function() {
            let id = $("input[name=id]").val();
            let route = "/admin/receipt/get";
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

        $(document).ready(function() {
            $(".client").select2({
                data: @json($client)
            });

            $(".payment_type_div").hide();
            $(".payment_type").click(function() {
                let val = $(this).val();
                if ($(this).prop('checked') == true) {
                    if (val == "bank" || val == "security_in_hand") {
                        $(".payment_type_div").show();
                    } else {
                        $(".payment_type_div").hide();
                    }
                } else {
                    $(".payment_type_div").hide();
                }
            })

            $(".types_div").hide();
            $(".types_btn").click(function() {
                $(".types_div").toggle();
            })
        })
    </script>
@endpush
