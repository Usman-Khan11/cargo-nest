@extends('admin.layouts.app')


@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/agent_invoice/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/agent_invoice/delete')">
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
        <form id="myForm" method="post" action="{{ route('admin.agent_invoice.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                            <div class="card-header">
                                <h4 class="fw-bold">{{ $page_title }}</h4>
                                <!--<hr />-->
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id" value="0">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Invoice #</label>
                                            <input name="invoice_no" type="text" class="form-control invoice_no">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Inv Date</label>
                                            <input name="inv_date" type="date" class="form-control inv_date">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Agent Invoice#</label>
                                            <input name="agent_invoice_no" type="text" class="form-control agent_invoice_no">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-select status">
                                                <option value="active">Active</option>
                                                <option value="disabled">Disabled</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Invoice Type</label>
                                            <select name="invoice_tpye" class="form-select invoice_tpye">
                                                <option value="select-invoice-type">Select invoice type</option>
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
                                            <input name="overseas_agent" type="text" class="form-control overseas_agent">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Currency</label>
                                            <select name="currency" class="form-select currency">
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
                                            <input name="due_days" type="number" class="form-control due_days">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Operation</label>
                                            <select name="operation" class="form-select operation">
                                                <option value="air-import">Air Import</option>
                                                <option value="air-export">Air Export</option>
                                                <option value="sea-import">Sea Import</option>
                                                <option value="sea-export">Sea Export</option>
                                                <option value="logistics">Logistics</option>
                                                <option value="warehouse">Warehouse</option>
                                                <option value="other">Other</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Job#</label>
                                            <input name="job_no" type="text" class="form-control job_no">
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
                                            <select name="auto_manual" class="form-select auto_manual">
                                                <option value="">Select auto/manual</option>
                                                <option value="Auto">Auto</option>
                                                <option value="Manual">Manual</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Cost Center</label>
                                            <select name="cost_center" class="form-select cost_center">
                                                <option value="head-office">Head Office</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Reference</label>
                                            <input name="reference" type="text" class="form-control reference">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <label class="form-label">Job Type</label>
                                        <div class="mb-2 d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input job_type" type="radio" name="job_type" id="job_wise" value="Single">
                                                <label class="form-check-label" for="Single">Single</label>
                                            </div>
                                            <div class="form-check mx-3">
                                                <input class="form-check-input job_type" type="radio" name="job_type" id="milestone_wise" value="Multiple">
                                                <label class="form-check-label" for="Multiple">Multiple</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">SOA Date</label>
                                            <input name="soa_date" type="date" class="form-control soa_date">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">SOA #</label>
                                            <input name="soa_no" type="text" class="form-control soa_no">
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
                                                <td><input type="text" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_job_no[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_charge_code[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_charge_name[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_charge_description[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_size_type[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_rate_group[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_dg_non_dg[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_containers[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_hbl_no[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_mbl_no[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_dr_cr[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_qty[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_rate[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_currency1[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_amount[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_discount[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_net_amount[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_margin[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_tax[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_tax_amount[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_net_amount_inc_tax[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_currency2[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_ex_rate[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_local_amount[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_tpgl_invoice[]" class="form-control" style="width: 100%;"/></td>
                                                <td><input type="text" name="t_tpgl_payment[]" class="form-control" style="width: 100%;"/></td>
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
                                                <textarea name="remarks" type="text" rows="4" class="form-control remarks"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <label class="form-label">Voucher #</label>
                                                <input name="vouchar_no" type="text" class="form-control vouchar_no">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2 mt-4">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="manual_remarks" value="Manual Remarks" class="form-check-input manual_remarks">
                                                    &nbsp;Manual Remarks
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label class="form-label">Bank Detail</label>
                                                <input name="bank_detail" type="text" class="form-control bank_detail">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <label class="form-label">Settled Amt</label>
                                                <input name="settled_amt" type="text" class="form-control settled_amt">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <label class="form-label">Inv Balance</label>
                                                <input name="inv_balance" type="text" class="form-control inv_balance">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">Amount/Dis</label>
                                            <div class="mb-2">
                                                <input name="amount_dis1" type="text" class="form-control amount_dis1">
                                            </div>
                                            <div class="mb-2">
                                                <input name="amount_dis2" type="text" class="form-control amount_dis2">
                                            </div>
                                            <div class="mb-2">
                                                <input name="amount_dis3" type="text" class="form-control amount_dis3">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Tax</label>
                                            <div class="mb-2">
                                                <input name="tax1" type="text" class="form-control tax1">
                                            </div>
                                            <div class="mb-2">
                                                <input name="tax2" type="text" class="form-control tax2">
                                            </div>
                                            <div class="mb-2">
                                                <input name="tax3" type="text" class="form-control tax3">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Net Incl Tax Amount</label>
                                            <div class="mb-2">
                                                <input name="net_incl_tax_amount1" type="text" class="form-control net_incl_tax_amount1">
                                            </div>
                                            <div class="mb-2">
                                                <input name="net_incl_tax_amount2" type="text" class="form-control net_incl_tax_amount2">
                                            </div>
                                            <div class="mb-2">
                                                <input name="net_incl_tax_amount3" type="text" class="form-control net_incl_tax_amount3">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Local</label>
                                            <div class="mb-2">
                                                <input name="local1" type="text" class="form-control local1">
                                            </div>
                                            <div class="mb-2">
                                                <input name="local2" type="text" class="form-control local2">
                                            </div>
                                            <div class="mb-2">
                                                <input name="local3" type="text" class="form-control local3">
                                            </div>
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
    $(".invoice_no").val(data.invoice_no);
    $(".inv_date").val(data.inv_date);
    $(".agent_invoice_no").val(data.agent_invoice_no);
    $(".status").val(data.status);
    $(".invoice_tpye").val(data.invoice_tpye);
    $(".overseas_agent").val(data.overseas_agent);
    $(".currency").val(data.currency);
    $(".due_days").val(data.due_days);
    $(".operation").val(data.operation);
    $(".job_no").val(data.job_no);
    $(".auto_manual").val(data.auto_manual);
    $(".cost_center").val(data.cost_center);
    $(".reference").val(data.reference);
    $(".job_type").prop("checked", data.job_type);
    $(".soa_date").val(data.soa_date);
    $(".soa_no").val(data.soa_no);
    
    
    $(".remarks").val(data.remarks);
    $(".vouchar_no").val(data.vouchar_no);
    $(".manual_remarks").val(data.manual_remarks);
    $(".bank_detail").val(data.bank_detail);
    $(".settled_amt").val(data.settled_amt);
    $(".inv_balance").val(data.inv_balance);
    
    
    $(".amount_dis1").val(data.amount_dis1);
    $(".amount_dis2").val(data.amount_dis2);
    $(".amount_dis3").val(data.amount_dis3);
    $(".tax1").val(data.tax1);
    $(".tax2").val(data.tax2);
    $(".tax3").val(data.tax3);
    $(".net_incl_tax_amount1").val(data.net_incl_tax_amount1);
    $(".net_incl_tax_amount2").val(data.net_incl_tax_amount2);
    $(".net_incl_tax_amount3").val(data.net_incl_tax_amount3);
    $(".local1").val(data.local1);
    $(".local2").val(data.local2);
    $(".local3").val(data.local3);
    
    $("#myForm").attr("action", "{{ route('admin.agent_invoice.update') }}");
    $("input[name=id]").val(data.id);
    
    
  }
}


$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/agent_invoice/get";
  let type = $(this).attr("data-type");
  let data = getList(route, type, id);
  if (data != null) {
    edit_row("", JSON.stringify(data));
  }
});


</script>

@endpush
