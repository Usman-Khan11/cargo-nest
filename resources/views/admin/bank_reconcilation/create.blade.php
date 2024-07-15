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
                                                 <label for="company">Company:</label>
                                                <select id="company" class="form-select" name="company">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="bank">Bank:</label>
                                                <input type ="number" id="bank" class="form-control" name="bank">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <input type="checkbox" id="exclude_cr_voucher">
                                                <label for="exclude_cr_voucher" name="exclude_cr_voucher">Exclude CR Voucher</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="statement_date">Statement Date:</label>
                                                <input type ="date" id="statement_date" class="form-control" name="statement_date">
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                               <label for="statement_balance" name="statement_balance">Statement Balance:</label>
                                                <input type ="date" id="statement_balance" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                 <button class="btn btn-primary">Pick</button>
                                                 <button class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <input type="radio" id="all" class="form-check-input">
                                                <label for="all" name="credit">All</label>
                                                
                                                <input type="radio" id="debit" class="form-check-input">
                                                <label for="debit" name="credit">Debit</label>
                                                
                                                <input type="radio" id="credit" class="form-check-input">
                                                <label for="credit" name="credit">Credit</label>
                                                
                                                <button class="btn btn-primary">Apply Filter</button>
                                                
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
                                              <label for="book_balance">Book Balance:</label>
                                              <input type="text" id="book_balance" name="book_balance" class="form-control" readonly placeholder="0.00">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                               <label for="unreconciled_amount">UnReconciled Amount:</label>
                                               <input type="text" id="unreconciled_amount" name="unreconciled_amount" class="form-control" readonly placeholder="0.00">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                  <label for="diff">Diff:</label>
                                                  <input type="text" id="diff" name="diff" class="form-control" readonly placeholder="0.00">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <button class="btn btn-primary btn-sm">Upload</button>
                                            </div>
                                        </div>
                                      
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <input type="radio" id="select_all" class="form-check-input">
                                                <label for="select_all" name="unselect_all">Select All</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <input type="radio" id="unselect_all" class="form-check-input">
                                                <label for="unselect_all" name="unselect_all">Select All / UnSelect All</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <p>Post Date Format (dd-MM-yyyy)</p>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <p>Posting Date</p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <input type="radio" id="statement_date_1" class="form-check-input">
                                                <label for="statement_date_1" name="statement_date_1">Statement Date</label>
                                                
                                                
                                                <input type="radio" id="vocuher_date" class="form-check-input">
                                                <label for="vocuher_date" name="statement_date_1">Voucher Date</label>
                                                
                                                <input type="radio" id="cheque_date" class="form-check-input">
                                                <label for="cheque_date" name="statement_date_1">Cheque Date</label>
                                                
                                                <input type="radio" id="other_date" class="form-check-input">
                                                <label for="other_date" name="statement_date_1">Other Date</label>
                                                
                                                
                                                <input type="date">
                                            </div>
                                        </div>
                                
                            </div>
                                
                                
                        </div>
                    </div>
                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Record</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Post Record</button>
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
                                                <th>Post</th>
                                                <th>Post Date</th>
                                                <th>Chq No</th>
                                                <th>Chq Date</th>
                                                <th>Vch Date</th>
                                                <th>Voucher No</th>
                                                <th>Debit</th>
                                                <th>Credit</th>
                                                <th>Amount</th>
                                                <th>Pay To / Party Name</th>
                                                <th>CostCenter</th>
                                                <th>Remarks</th>
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
                                                <td><input name="d_remarks" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_remarks" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_remarks" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_remarks" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_remarks" class="form-control" type="text" style="width: 100%;"/></td>
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
                                                <th>Post</th>
                                                <th>Post Date</th>
                                                <th>Chq No</th>
                                                <th>Chq Date</th>
                                                <th>Vch Date</th>
                                                <th>Voucher No</th>
                                                <th>Debit</th>
                                                <th>Credit</th>
                                                <th>Amount</th>
                                                <th>Pay To / Party Name</th>
                                                <th>CostCenter</th>
                                                <th>Remarks</th>
                                                <th>Last posting Log By</th>
                                                <th>Last Posting Log On</th>
                                              </tr>
                                            </thead>
                                            <tbody class="local_repeater">
                                                <td><i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                <td><i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                                <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_code" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_name" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_anticipated" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_done" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_date" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_remarks" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_remarks" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_remarks" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_remarks" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_remarks" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_remarks" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_remarks" class="form-control" type="text" style="width: 100%;"/></td>
                                                <td><input name="d_remarks" class="form-control" type="text" style="width: 100%;"/></td>
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










