@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/charges/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/charges/delete')">
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
        <div class="row">
            <div class="col-md-6">
                <form id="myForm" method="post" action="{{ route('admin.charges.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0" />
                            <div class="row">
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Code:</label>
                                        <input name="code" type="text" class="form-control code" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Currency:</label>
                                        <select name="currency" class="currency">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Name:</label>
                                        <input name="name" type="text" class="form-control name" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Localize Name:</label>
                                        <input name="localize_name" type="text" class="form-control localize_name" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Short Name:</label>
                                        <input name="short_name" type="text" class="form-control short_name" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Charges Type:</label>
                                        <select name="charges_type" class="form-select charges_type">
                                            <option selected disabled></option>
                                            <option value="Principle">Principle</option>
                                            <option value="Agency">Agency</option>
                                            <option value="None">None</option>
                                            <option value="Reimbursement">Reimbursement</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Order:</label>
                                        <input name="order" type="text" class="form-control order" placeholder="0.00" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2 mt-4">
                                        <label class="form-label"></label>
                                        <input name="inactive" type="checkbox" class="inactive" value="In-Active" style="width:16px; height:16px;" /><span>&nbsp;&nbsp;In-Active</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Type:</label>
                                        <select name="type" class="form-select type">
                                            <option selected disabled></option>
                                            <option value="Import">Import</option>
                                            <option value="Clearing">Clearing</option>
                                            <option value="Dentention">Detention</option>
                                            <option value="Plug In Charges">Plug In Charges</option>
                                            <option value="Late Charges">Late Charges</option>
                                            <option value="Storage">Storage</option>
                                            <option value="Cleaning">Cleaning</option>
                                            <option value="Placement Charges">Placement Charges</option>
                                            <option value="Depot Per Move Charges">Depot Per Move Charges</option>
                                            <option value="Depot Storage Charges">Depot Storage Charges</option>
                                            <option value="Tax">Tax</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Reporting Group:</label>
                                        <select name="reporting_group" class="form-select reporting_group">
                                            <option selected disabled></option>
                                            <option value="Freight">Freight</option>
                                            <option value="Insurance">Insurance</option>
                                            <option value="D/O">D/O</option>
                                            <option value="THC">THC</option>
                                            <option value="CSC">CSC</option>
                                            <option value="Movement">Movement</option>
                                            <option value="Detention">Detention</option>
                                            <option value="Washing">Washing</option>
                                            <option value="Repairing">Repairing</option>
                                            <option value="Terminal">Terminal</option>
                                            <option value="Yard">Yard</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Tag:</label>
                                        <input name="tag" type="text" class="form-control tag" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-5 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Printing Name:</label>
                                        <input name="printing_name" type="text" class="form-control printing_name" placeholder="" />
                                    </div>
                                </div>
           
                                <div class="col-md-12 col-12">
                                    <label class="form-check-label mb-2">Calculation Type:</label>
                                    <div class="d-flex">
                                        <div class="mb-2">
                                            <input name="calculation_type" type="radio" class="form-check-input calculation_type" value="Per-Unit" id="defaultRadio1" />
                                            <label class="form-check-label" for="defaultRadio1">Per Unit</label>
                                        </div>
                                        <div class="mb-2 px-3">
                                            <input name="calculation_type" type="radio" class="form-check-input calculation_type" value="Per-Shipment" id="defaultRadio2" />
                                            <label class="form-check-label" for="defaultRadio2">Per Shipment</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <!--<label class="form-check-label mb-2">Calculation Type:</label>-->
                                    <div class="d-flex mt-4">
                                        <div class="mb-3">
                                            <label class="form-label"></label>
                                            <input name="tax[]" type="checkbox" value="Tax-Receivable" class="form-check-input tax"/><span>&nbsp;&nbsp;Tax-Receivable</span>
                                        </div>
                                        <div class="mb-3 px-3">
                                            <label class="form-label"></label>
                                            <input name="tax[]" type="checkbox" value="Tax-Payable" class="form-check-input tax"/><span>&nbsp;&nbsp;Tax-Payable</span>
                                        </div>
                                        <div class="mb-3 px-3">
                                            <label class="form-label"></label>
                                            <input name="tax[]" type="checkbox" value="Tax-On-Principal-Payment" class="form-check-input tax" /><span>&nbsp;&nbsp;Tax On Principal Payment</span>
                                        </div>
                                        <div class="mb-3 px-3">
                                            <label class="form-label"></label>
                                            <input name="tax[]" type="checkbox" value="Apply-Company-Restriction" class="form-check-input tax"/><span>&nbsp;&nbsp;Apply Company Restriction</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Default Payable Party Type:</label>
                                        <select name="payable_party_type" class="form-select payable_party_type">
                                            <option value="" selected></option>
                                            <option value="l-Agent">l-Agent</option>
                                            <option value="O-Agent">O-Agent</option>
                                            <option value="Terminal">Terminal</option>
                                            <option value="CFS Facility">CFS Facility</option>
                                            <option value="Others">Others</option>
                                            <option value="Principal">Principal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Default Recevable Party Type:</label>
                                        <select name="recevable_party_type" class="form-select recevable_party_type">
                                            <option value="" selected></option>
                                            <option value="Client">Client</option>
                                            <option value="O-Agent">O-Agent</option>
                                            <option value="Terminal">Terminal</option>
                                            <option value="CFS Facility">CFS Facility</option>
                                            <option value="Others">Others</option>
                                            <option value="Principal">Principal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">cCategory:</label>
                                        <input name="c_category" type="text" class="form-control c_category" placeholder="" />
                                    </div>
                                </div>
                                
                                
                            
                            </div>
                        </div>
                    </div>
                    
                   
                </form>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="responsive text-nowrap">
                            <table class="table table-bordered table-sm quotation_record">
                                <thead class="table-primary">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class"card mb-4">
                        <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">Tax Authority Details</button>
                          </li>
                          <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-subcompany" aria-controls="navs-top-subcompany" aria-selected="false">Sub Company</button>
                          </li>
                          <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-default" aria-controls="navs-top-default" aria-selected="false">Default Setup</button>
                          </li>
                        </ul>
                        <div class="tab-content">
                              <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                                <div class="card-datatable table-responsive pt-0">
                                    
                                    <table class="datatables-basic table">
                                    <thead>
                                      <tr>
                                        <th>...</th>
                                        <th>S.No</th>
                                        <th>Authority</th>
                                        <th>Tax Revenue st</th>
                                        <th>Company</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                        <td><input type="text" style="width: 100%;"/></td>
                                        <td><input type="text" style="width: 100%;"/></td>
                                        <td><input type="text" style="width: 100%;"/></td>
                                        <td><input type="text" style="width: 100%;"/></td>
                                    </tbody>
                                </table>
                                  
                                </div>
                              </div>
                              <div class="tab-pane fade" id="navs-top-subcompany" role="tabpanel">
                                <table class="datatables-basic table">
                                    <thead>
                                      <tr>
                                        <th>S.No</th>
                                        <th>...</th>
                                        <th>Sub Company</th>
                                        <th>Currency</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <td></td>
                                        <td><input type="checkbox" style="width: 16px; height:16px;"/></td>
                                        <td><input type="text" style="width: 100%;"/></td>
                                        <td><select style="width: 100%; border:none; outline:none;">
                                            <option></option>
                                            <option></option>
                                        </select></td>
                                    </tbody>
                                </table>    
                              </div>
                              <div class="tab-pane fade" id="navs-top-default" role="tabpanel">
                                <h6>Operation Type</h6>  
                                
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <input type="checkbox" style="width:16px; height:16px;"/><span>&nbsp;&nbsp;Select All</span><br><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/><span>&nbsp;&nbsp;Sea Import</span><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/><span>&nbsp;&nbsp;Sea Export</span><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/><span>&nbsp;&nbsp;Air Import</span><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/><span>&nbsp;&nbsp;Air Export</span><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/><span>&nbsp;&nbsp;Logistics</span><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/><span>&nbsp;&nbsp;Warehouse</span><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/><span>&nbsp;&nbsp;Other</span><br>
                                            </div>
                                            <div class="text-center">
                                                <span>Occassional</span><br><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/> 
                                            </div>
                                            <div class="text-center">
                                                <span>Everytime</span><br><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/><br>
                                                <input type="checkbox" style="width:16px; height:16px;"/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-1"></div>
                                    
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Default For(for air only):</label>
                                            <div class="d-flex">
                                                <div class="mb-2">
                                                    <input type="checkbox" style="width:16px; height:16px;"/><span>&nbsp;&nbsp;Carrier</span>
                                                </div>
                                                <div class="mb-2 px-3">
                                                    <input type="checkbox" style="width:16px; height:16px;"/><span>&nbsp;&nbsp;Agent</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Carrier:</label>
                                            <input name="carrier" type="text" class="form-control" placeholder="" />
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Customer/Vendor:</label>
                                            <input name="cus_vendor" type="text" class="form-control" placeholder="" />
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
      
var datatable = null; 
      
$(document).ready(function(){
        
    $(".currency").select2({
      data: @json($currencies)
    });
        
        
        
        
        
    var datatable = $('.quotation_record').DataTable({
        select: {
            style: 'api'
        },
        "processing": true,
        "serverSide": true,
        "lengthChange": false,
        "pageLength": 15,
        "scrollX": true,
        "ajax": {
            "url": "{{ route('admin.charges.create') }}",
            "type": "get",
            "data": function(d) {
                var frm_data = $('#result_report_form').serializeArray();
                $.each(frm_data, function(key, val) {
                    d[val.name] = val.value;
                });
            },
        },
        columns: [
            {
                data: 'DT_RowIndex',
                title: 'Sr No'
            },
            {
                data: 'code',
                title: 'Code'
            },
            {
                title: 'Currency',
                "render": function(data, type, full, meta) {
                    if(full.currency){
                        return full.currency.code;
                    } else {
                        return '-';
                    }
                }
                
            },
            {
                data: 'name',
                title: 'Name'
            },
            {
                data: 'short_name',
                title: 'Short Name'
            },
            {
                data: 'charges_type',
                title: 'Charges_type'
            },
            {
                data: 'type',
                title: 'Type'
            },
        ],          
         "rowCallback": function(row, data) {
             $(row).attr("onclick",`edit_row(this,'${JSON.stringify(data)}')`)
         }
    });
});


function edit_row(e,data){
    data = JSON.parse(data);
    if(data){
        $(".code").val(data.code);
        $(".currency").val(data.currency.id).trigger("change");
        $(".name").val(data.name);
        $(".localize_name").val(data.localize_name);
        $(".short_name").val(data.short_name);
        $(".charges_type").val(data.charges_type);
        $(".order").val(data.order);
        $(".type").val(data.type);
        $(".reporting_group").val(data.reporting_group);
        $(".tag").val(data.tag);
        $(".printing_name").val(data.printing_name);
        
        $(".calculation_type").removeAttr('checked');
        $(`.calculation_type[value=${data.calculation_type}]`).attr('checked',true);
        
        $(".tax").removeAttr('checked');
        $(data.tax).each(function(i, v){
            $(`.tax[value=${v}]`).attr("checked", true);
        })
        
        $(".payable_party_type").val(data.payable_party_type);
        $(".recevable_party_type").val(data.recevable_party_type);
        $(".c_category").val(data.c_category);
        
        $("#myForm").attr("action","{{ route('admin.charges.update') }}")
         $("input[name=id]").val(data.id);
    }
    
}



$(".navigation").click(function(){
    let id = $("input[name=id]").val();
    let route = '/admin/charges/get';
    let type = $(this).attr('data-type');
    let data = getList(route, type, id);
    if(data != null){
        edit_row('', JSON.stringify(data));
    }
})

</script>

@endpush










