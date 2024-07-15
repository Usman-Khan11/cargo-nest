@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/voucher/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark">
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
            <div class="col-md-12">
                <form id="myForm" method="post" action="{{ route('admin.gl_invoice.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="voucher_no" >Voucher No:</label>
                                                <input type ="number" id="voucher_no" class="form-control" name="voucher_no">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="invoice_no">Invoice No:</label>
                                                <input type ="number" id="invoice_no" class="form-control" name="invoice_no">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="gst_invoice_no">GST Invoice No:</label>
                                                <input type ="number" id="gst_invoice_no" class="form-control" name="gst_invoice_no">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="voucher_date">Voucher / Inv Date:</label>
                                                <input type ="date" id="voucher_date" class="form-control" name="voucher_date">
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="due_date">Due Date:</label>
                                                <input type ="date" id="due_date" class="form-control" name="due_date">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="company">Company:</label>
                                                <select id="company" class="form-select" name="company">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="balance">Balance:</label>
                                                <select id="balance" name="balance" class="form-select">
                                                    <option></option>
                                                    <option></option>
                                                    <option></option>
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3"
                                                <label for="customer">Customer / Supplier:</label>
                                                <input type="text" id="customer" name="customer" class="form-control">
                                                
                                                
                                                
                                                
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="currency">Currency:</label>
                                                <select id="currency" name="currency" class="form-select">
                                                    <option></option>
                                                </select>
                                                
                                                
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="cost_center">Cost Center:</label>
                                                <select id="cost_center" name="cost_center" class="form-select">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="exchange_rate">Exchange Rate:</label>
                                                <input type="number" id="exchange_rate" name="exchange_rate" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                
                                            </div>
                                        </div>
                                      
                                
                                
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="print_on">Print On:</label>
                                                <select id="" name="" class="form-select">
                                                    <option></option>
                                                    <option></option>
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                            <br>
                                            <button class="btn btn-primary btn-sm">Continue</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Invoice Detail</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Voucher Properties</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="invoice-tab" data-bs-toggle="tab" data-bs-target="#invoice" type="button" role="tab" aria-controls="invoice" aria-selected="false">Invoice Properties</button>
                                </li>
                            </ul>
                            
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card-datatable table-responsive pt-0">
                                        <table class="datatables-basic table" style="width: 135%;">
                                            <thead>
                                              <tr>
                                                <th>--</th>
                                                <th>--</th>
                                                <th>Account Code</th>
                                                <th>Particular</th>
                                                <th>Cost Center</th>
                                                <th>Dr / Cr</th>
                                                <th>Amount VC</th>
                                                <th>Amount LC</th>
                                                <th>Narration</th>
                                                <th>TaxType</th>
                                              </tr>
                                            </thead>
                                            <tbody class="detail_repeater">
                                                <td><i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                <td><i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                                <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_code" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_name" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_anticipated" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_done" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_date" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_remarks" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_action" class="form-control" type="text" style="width: 100%;"/></td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card-datatable table-responsive pt-0">
                                        <table class="datatables-basic table" style="width: 135%;">
                                            <thead>
                                              <tr>
                                                <th>--</th>
                                                <th>--</th>
                                                <th>Property</th>
                                                <th>Code</th>
                                                <th>Value</th>
                                              </tr>
                                            </thead>
                                            <tbody class="local_repeater">
                                                <td><i onclick="dellocalRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                <td><i onclick="addlocalRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                                <td>
                                                    <input name="" class="form-control" type="text" style="width: 100%;"/>
                                                    <input name="" class="form-control" type="text" style="width: 100%;"/>
                                                </td>
                                                <td>
                                                    <input name="" class="form-control" type="text" style="width: 100%;"/>
                                                    <input name="" class="form-control" type="text" style="width: 100%;"/>
                                                </td>
                                                <td>
                                                    <input name="" class="form-control" type="text" style="width: 100%;"/>
                                                    <input name="" class="form-control" type="text" style="width: 100%;"/>
                                                </td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                                    <div class="card-datatable table-responsive pt-0">
                                        <table class="datatables-basic table" style="width: 135%;">
                                            <thead>
                                              <tr>
                                                <th>--</th>
                                                <th>--</th>
                                                <th>Property</th>
                                                <th>Code</th>
                                                <th>Value</th>
                                              </tr>
                                            </thead>
                                            <tbody class="local_repeater">
                                                <td><i onclick="dellocalRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                <td><i onclick="addlocalRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                                <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>    
                            
                        </div>
                    </div>
                    
                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="narration">Narration:</label>
                                    <input type="text" id="narration" name="narration" class="form-control">
                                </div>
                            </div>
                            
                             <div class="col-md-4">
                                 <div class="mb-3">
                                    <label for="invoice_amount">Invoice Amount:</label>
                                    <input type="number" id="invoice_amount" name="invoice_amount" class="form-control">
 
                                    
                                    <label for="tex_amount">Tax Amount:</label>
                                    <input type="number" id="tex_amount" name="tex_amount" class="form-control">
                                    
                                    
                                    <label for="net_amount">Net Amount:</label>
                                    <input type="number" id="net_amount" name="net_amount" class="form-control">
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
    $('#submitButton').click(function(){
        // Trigger form submission
        $('#myForm').submit();
    });
    
  


// function edit_row(e,data){
//     data = JSON.parse(data);
//     if(data){
//         $(".code").val(data.code);
//         $(".locate").val(data.location);
//         $(".location_check").removeAttr('checked');
//         $(`.location_check[value=${data.location_check}]`).attr('checked',true);
        
//         $(".co_ordinates").val(data.co_ordinates);
//         $(".inactive").removeAttr('checked');
//         $(`.inactive[value=${data.inactive}]`).attr('checked',true);
       
//         $(".latitude").val(data.latitude);
//         $(".state").val(data.state);
//         $(".longitude").val(data.longitude);
//         $(".phone_prefix").val(data.phone_prefix);
//         $(".epass_code").val(data.epass_code);
//         $(".country_region").val(data.country_region);
        
//         $("#myForm").attr("action","{{ route('admin.location.update') }}")
//          $("input[name=id]").val(data.id);
//     }
    
// }

// $(".navigation").click(function () {
//   let id = $("input[name=id]").val();
//   let route = "/admin/voucher/get";
//   let type = $(this).attr("data-type");
//   let data = getList(route, type, id);
//   if (data != null) {
//     edit_row("", JSON.stringify(data));
//   }
// });



</script>

@endpush










