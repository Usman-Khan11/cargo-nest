@extends('admin.layouts.app')


@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/bill/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/bill/delete')">
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
        <form id="myForm" method="post" action="{{ route('admin.bill.store') }}" enctype="multipart/form-data">
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
                                <div class="row mb-2">
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Tran #</label>
                                            <input name="tran_number" type="text" class="form-control tran_number">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Bill Date</label>
                                            <input name="bill_date" type="date" class="form-control bill_date">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Reference No</label>
                                            <input name="reference_number" type="text" class="form-control reference_number">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-select status">
                                                <option>Active</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Category</label>
                                            <input name="category" type="text" class="form-control category">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Sequence</label>
                                            <input name="sequence" type="text" class="form-control sequence">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="mb-2 mt-4 d-flex">
                                            <div>
                                                <input type="radio" id="settle" name="settle" value="Settled" class="form-check-input settle">
                                                <label for="cash" class="form-check-label">Settled</label>
                                            </div>
                                            <div class="mx-2">
                                                <input type="radio" id="un-settle" name="settle" value="Un-settled" class="form-check-input settle">
                                                <label for="bank" class="form-check-label">Un-settled</label>
                                            </div>
                                        </div>    
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <button type="button" class="btn btn-primary btn-sm">Job Payment</button>
                                            <button type="button" class="btn btn-primary btn-sm mx-2">Advance Search</button>
                                            <button type="button" class="btn btn-primary btn-sm mt-2">Payment Requisition</button>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label class="form-label">Vendor</label>
                                            <input name="vendor" type="text" class="form-control vendor">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Currency</label>
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
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Invoice Type</label>
                                            <select name="invoice_type" class="form-select invoice_type">
                                                <option value="PT">PI</option>
                                                <option value="DR">DR</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Ref, Bill#</label>
                                            <input name="ref_bill" type="text" class="form-control ref_bill">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Operation</label>
                                            <select name="operation" class="form-select operation">
                                                <option value="Air-Import">Air Import</option>
                                                <option value="Air-Export">Air Export</option>
                                                <option value="Sea-Import">Sea Import</option>
                                                <option value="Sea-Expoer">Sea Export</option>
                                                <option value="Logistics">Logistics</option>
                                                <option value="Warehouse">Warehouse</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Aut/Man</label>
                                            <select name="auto_manual" class="form-select auto_manual">
                                                <option value="Auto">Auto</option>
                                                <option value="Manual">Manual</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Job #</label>
                                            <input name="job_no" type="text" class="form-control job_no">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-2 mt-4 d-flex">
                                            <div>
                                                <input type="radio" id="cash" name="martial_status" value="Single" class="form-check-input martial_status">
                                                <label for="cash" class="form-check-label">Single</label>
                                            </div>
                                            <div class="mx-2">
                                                <input type="radio" id="bank" name="martial_status" value="Multiple" class="form-check-input martial_status">
                                                <label for="bank" class="form-check-label">Multiple</label>
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2 mt-4">
                                            <button type="button" class="btn btn-primary btn-sm">Pick Charges</button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label class="form-label">Cost Center</label>
                                            <select name="cost_center" class="form-select cost_center">
                                                <option value="Head-Office">Head Office</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2 mt-3">
                                            <label class="form-check-label mb-2">
                                                <input type="checkbox" name="auto_round_off" value="auto_round_off" class="form-check-input auto_round_off">
                                                Auto Round Off
                                            </label>
                                            <label class="form-check-label mx-3 mb-2">
                                                <input type="checkbox" name="continue_mode" value="continue_mode" class="form-check-input continue_mode">
                                                Continue Mode
                                            </label>
                                            <label class="form-check-label"> 
                                                <input type="checkbox" name="show_terminal" value="show_terminal" class="form-check-input show_terminal">
                                                Show Terminal
                                            </label>
                                            <label class="form-check-label mx-3">
                                                <input type="checkbox" name="rebate" value="rebate" class="form-check-input rebate">
                                                Rebate
                                            </label>
                                            <label class="form-check-label"> 
                                                <input type="checkbox" name="show_bl_no" value="show_bl_no" class="form-check-input show_bl_no">
                                                Show BL No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-2 mt-3">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="manual" value="Manual" class="form-check-input manual">
                                                Manual
                                            </label>
                                        </div>
                                    </div> 
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Due Days</label>
                                            <input name="due_days" type="text" class="form-control due_days">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Vndr Tax Inv No</label>
                                            <input name="vendor_tax_invoice_number" type="text" class="form-control vendor_tax_invoice_number">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Vndr Cmercial Inv No</label>
                                            <input name="vendor_commercial_invoice_number" type="text" class="form-control vendor_commercial_invoice_number">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label class="form-label">Vndr Inv Date</label>
                                            <input name="vendor_invoice_date" type="date" class="form-control vendor_invoice_date">
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
                                        <table class="datatables-basic table" style="width: 300%;">
                                            <thead>
                                              <tr>
                                                <th>...</th>
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
                                            <tbody class="detail_repeater">
                                                <td><i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                <td><i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                                <td><input class="form-control" name="" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="b_job_no[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="b_charges_code[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="b_charges_name[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="b_charges_desc[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="b_rate_group[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="size_type[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="b_dg[]" type="text" style="width: 100%;"/></td>
                                                <td class="text-center"><input type="checkbox[]" name="mark[]" style="width: 16px; height:16px;"/></td>
                                                <td><input class="form-control" name="b_container[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="b_qty[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="b_rate[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="b_currency[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="b_amount[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="b_discount[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="b_net_amount[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="b_margin[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="b_tax[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="b_tax_amt[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="b_net_amt[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="b_ex_rate[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="b_local_amount[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="b_code[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="b_principal_name[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="tpgl_payment[]" type="text" style="width: 100%;"/></td>
                                                <td><input class="form-control" name="tpgl_invoice[]" type="text" style="width: 100%;"/></td>
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
                                        <input name="remarks" type="text" class="form-control remarks">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Total Amount</label>
                                        <input name="total_amount" type="text" class="form-control total_amount">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Net Amount</label>
                                        <input name="net_amount" type="text" class="form-control net_amount">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Voucher No</label>
                                        <input name="voucher_no" type="text" class="form-control voucher_no">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Manual Remarks</label>
                                        <input name="manual_remarks" type="text" class="form-control manual_remarks">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Discount</label>
                                        <input name="discount" type="text" class="form-control discount">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Tax Amount</label>
                                        <input name="tax_amount" type="text" class="form-control tax_amount">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Net Amount Inv Tax</label>
                                        <input name="net_amount_inv_tax" type="text" class="form-control net_amount_inv_tax">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Local Amount</label>
                                        <input name="local_amount" type="text" class="form-control local_amount">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label class="form-label">Total Deduction</label>
                                        <input name="total_deduction" type="text" class="form-control total_deduction">
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
          $(".tran_number").val(data.tran_number);
          $(".bill_date").val(data.bill_date);
          $(".reference_number").val(data.reference_number);
          $(".status").val(data.status);
          $(".category").val(data.category);
          $(".sequence").val(data.sequence);
          
          $(".settle").removeAttr('checked');
          $(`.settle[value=${data.settle}]`).attr('checked',true);
          
          $(".vendor").val(data.vendor);
          $(".currency").val(data.currency);
          $(".invoice_type").val(data.invoice_type);
          $(".ref_bill").val(data.ref_bill);
          $(".operation").val(data.operation);
          $(".auto_manual").val(data.auto_manual);
          $(".job_no").val(data.job_no);
          
          $(".martial_status").removeAttr('checked');
          $(`.martial_status[value=${data.martial_status}]`).attr('checked',true);
          
          $(".cost_center").val(data.cost_center);
          
          $(".auto_round_off").removeAttr('checked');
          $(`.auto_round_off[value=${data.auto_round_off}]`).attr('checked',true);
          
          $(".continue_mode").removeAttr('checked');
          $(`.continue_mode[value=${data.continue_mode}]`).attr('checked',true);
          
          $(".show_terminal").removeAttr('checked');
          $(`.show_terminal[value=${data.show_terminal}]`).attr('checked',true);
          
          $(".rebate").removeAttr('checked');
          $(`.rebate[value=${data.rebate}]`).attr('checked',true);
          
          $(".show_bl_no").removeAttr('checked');
          $(`.show_bl_no[value=${data.show_bl_no}]`).attr('checked',true);
          
          $(".manual").removeAttr('checked');
          $(`.manual[value=${data.manual}]`).attr('checked',true);
          
          $(".due_days").val(data.due_days);
          $(".vendor_tax_invoice_number").val(data.vendor_tax_invoice_number);
          $(".vendor_commercial_invoice_number").val(data.vendor_commercial_invoice_number);
          $(".vendor_invoice_date").val(data.vendor_invoice_date);
          $(".remarks").val(data.remarks);
          $(".total_amount").val(data.total_amount);
          $(".net_amount").val(data.net_amount);
          $(".voucher_no").val(data.voucher_no);
          $(".manual_remarks").val(data.manual_remarks);
          $(".discount").val(data.discount);
          $(".tax_amount").val(data.tax_amount);
          $(".net_amount_inv_tax").val(data.net_amount_inc_tax);
          $(".local_amount").val(data.local_amount);
          $(".total_deduction").val(data.settled_amount);
        }  
        
      }
      
      $(".navigation").click(function () {
          let id = $("input[name=id]").val();
          let route = "/admin/bill/get";
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