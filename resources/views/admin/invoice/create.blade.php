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
        <form id="myForm" method="post" action="{{ route('admin.invoice.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                            <div class="card-header">
                                <h4 class="fw-bold">{{ $page_title }}</h4>
                                <!--<hr />-->
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id" value="0"/>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Tran #</label>
                                            <input name="tran_number" type="text" class="form-control tran_number">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Inv Date</label>
                                            <input name="inv_date" type="date" class="form-control inv_date">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label class="form-label">Reference</label>
                                            <input name="reference" type="text" class="form-control reference">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-select status">
                                                <option value="active">Active</option>
                                                <option value="incomplete">Incomplete</option>
                                                <option value="void">Void</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Category</label>
                                            <select name="category" class="form-select category">
                                                <option value="regular">Regular</option>
                                                <option value="securityDeposit">Security Deposit</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-2 mt-4 d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input option" type="radio" name="option" id="Settled" value="Settled">
                                                <label class="form-check-label" for="Settled">Settled</label>
                                            </div>
                                            <div class="form-check mx-3">
                                                <input class="form-check-input option" type="radio" name="option" id="Un-settled" value="Un-settled">
                                                <label class="form-check-label" for="Un-settled">Un-Settled</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label class="form-label">Client</label>
                                            <input name="client" type="text" class="form-control client">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Sequence</label>
                                            <input name="sequence" type="text" class="form-control sequence">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label class="form-label">Invoice Type</label>
                                            <input name="invoice_type" type="text" class="form-control invoice_type">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Ref. Tran #</label>
                                            <input name="ref_tran_number" type="text" class="form-control ref_tran_number">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Operation</label>
                                            <select name="operation" class="form-select operation">
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
                                            <input name="job_number" type="text" class="form-control job_number">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Currency</label>
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
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label class="form-label">Cost Center</label>
                                            <select name="cost_center" class="form-select cost_center">
                                                <option value="Head Office">Head Office</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Invoice To</label>
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
                                    <div class="col-md-2">
                                        <div class="mb-2 mt-4">
                                            <input name="manual" class="form-check-label manual" type="checkbox" value="Manual"><span>&nbsp;&nbsp;Manual</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label class="form-label">Due Days</label>
                                            <input name="due_days" type="text" class="form-control due_days">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-2">
                                            <label class="form-label">Invoice A/C</label>
                                            <input name="invoice_ac" type="text" class="form-control invoice_ac">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2 mt-4">
                                            <input name="auto_round_off" class="form-check-label auto_round_off" type="checkbox" value="Auto Round Off"><span>&nbsp;&nbsp;Auto Round Off</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Storage End Date</label>
                                            <input name="storage_end_date" type="date" class="form-control storage_end_date">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2 mt-4">
                                            <input name="tax_charges" class="form-check-label tax_charges" type="checkbox" value="Tax Charges"><span>&nbsp;&nbsp;Tax Charges</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label class="form-label">Invoice Title</label>
                                            <select name="invoice_title" class="form-select invoice_title">
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-2 mt-3">
                                            <button type="button" class="btn btn-primary btn-sm">Job Receipt</button>
                                            <button type="button" class="btn btn-primary btn-sm mx-2">Advance Search</button>
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
                                                <td><i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                <td><i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                                <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="charges_code" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="charges_name" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="charges_description" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="size_type" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="rate_group" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="dg_nondg" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="container" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="qty" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="rate" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="currency" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="amount" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="discount" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="net_amount" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="margin" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="tax" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="tax_amount" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="inc_tax" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="ex_rate" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="local_amount" class="form-control" type="text" style="width: 100%;"/></td>
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
                                    <input name="remarks" type="text" class="form-control remarks" >
                                </div>
                            </div>
                                <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Total Amount</label>
                                    <input name="total_amount" type="number" class="form-control total_amount">
                                </div>
                            </div>
                                <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Net Amount</label>
                                    <input name="net_amount" type="number" class="form-control net_amount">
                                </div>
                            </div>
                                <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Voucher No</label>
                                    <input name="voucher_no" type="text" class="form-control voucher_no">
                                </div>
                            </div>
                                <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Discount</label>
                                    <input name="discount" type="number" class="form-control discount">
                                </div>
                            </div>
                                <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Tax Amount</label>
                                    <input name="tax_amount" type="number" class="form-control tax_amount">
                                </div>
                            </div>
                                <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Bank Detail</label>
                                    <input name="bank_detail" type="text" class="form-control bank_detail">
                                </div>
                            </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Net Amount Inc Tax</label>
                                        <input name="net_amount_inc_tax" type="number" class="form-control net_amount_inc_tax">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Local Amount</label>
                                        <input name="local_amount" type="number" class="form-control local_amount">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Settled Amount</label>
                                        <input name="settled_amount" type="number" class="form-control settled_amount">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Invoice Balance</label>
                                        <input name="invoice_balance" type="number" class="form-control invoice_balance">
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
      
      function edit_row(e, data) {
        data = JSON.parse(data);
        if (data) {
          $(".tran_number").val(data.tran_number);
          $(".inv_date").val(data.inv_date);
          $(".reference").val(data.reference);
          $(".status").val(data.status);
          $(".category").val(data.category);
          $(".option").val(data.option);
          $(".client").val(data.client);
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
        }  
        
      }
      
      $(".navigation").click(function () {
          let id = $("input[name=id]").val();
          let route = "/admin/invoice/get";
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