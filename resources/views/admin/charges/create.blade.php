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
            <a href="{{route('admin.charges')}}"><i class="fa fa-file-lines"></i></a>
        </div>
    </div>

</div>
@endsection

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="myForm" method="post" action="{{ route('admin.charges.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                    <!--<hr />-->
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Code:</label>
                                <input name="code" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Currency:</label>
                                <select name="currency" class="form-select">
                                    <option selected disabled value="">Select Currency</option>
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
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Name:</label>
                                <input name="name" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Localize Name:</label>
                                <input name="localize_name" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Short Name:</label>
                                <input name="short_name" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Charges Type:</label>
                                <select name="charges_type" class="form-select">
                                    <option selected disabled>Select Charges Type</option>
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
                                <input name="order" type="text" class="form-control" placeholder="0.00" />
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2 mt-4">
                                <label class="form-label"></label>
                                <input name="inactive" type="checkbox" value="In-Active" style="width:16px; height:16px;" /><span>&nbsp;&nbsp;In-Active</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Type:</label>
                                <select name="type" class="form-select">
                                    <option selected disabled>Select Type</option>
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
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Reporting Group:</label>
                                <select name="reporting_group" class="form-select">
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
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Tag:</label>
                                <input name="tag" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Printing Name:</label>
                                <input name="printing_name" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
   
                        <div class="col-md-4 col-12">
                            <label class="form-check-label mb-2">Calculation Type:</label>
                            <div class="d-flex">
                                <div class="mb-2">
                                    <input name="calculation_type" type="radio" class="form-check-input" value="Per Unit" id="defaultRadio1" />
                                    <label class="form-check-label" for="defaultRadio1">Per Unit</label>
                                </div>
                                <div class="mb-2 px-3">
                                    <input name="calculation_type" type="radio" class="form-check-input" value="Per Shipment" id="defaultRadio2" />
                                    <label class="form-check-label" for="defaultRadio2">Per Shipment</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-12">
                            <!--<label class="form-check-label mb-2">Calculation Type:</label>-->
                            <div class="d-flex mt-4">
                                <div class="mb-2">
                                    <label class="form-label"></label>
                                    <input name="tax[]" type="checkbox" value="Tax-Receivable" style="width:16px; height:16px;"/><span>&nbsp;&nbsp;Tax-Receivable</span>
                                </div>
                                <div class="mb-2 px-3">
                                    <label class="form-label"></label>
                                    <input name="tax[]" type="checkbox" value="Tax-Payable" style="width:16px; height:16px;"/><span>&nbsp;&nbsp;Tax-Payable</span>
                                </div>
                                <div class="mb-2 px-3">
                                    <label class="form-label"></label>
                                    <input name="tax[]" type="checkbox" value="Tax On Principal Payment" style="width:16px; height:16px;"/><span>&nbsp;&nbsp;Tax On Principal Payment</span>
                                </div>
                                <div class="mb-2 px-3">
                                    <label class="form-label"></label>
                                    <input name="tax[]" type="checkbox" value="Apply Company Restriction" style="width:16px; height:16px;"/><span>&nbsp;&nbsp;Apply Company Restriction</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Default Payable Party Type:</label>
                                <select name="payable_party_type" class="form-select">
                                    <option value="l-Agent">l-Agent</option>
                                    <option value="O-Agent">O-Agent</option>
                                    <option value="Terminal">Terminal</option>
                                    <option value="CFS Facility">CFS Facility</option>
                                    <option value="Others">Others</option>
                                    <option value="Principal">Principal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Default Recevable Party Type:</label>
                                <select name="recevable_party_type" class="form-select">
                                    <option value="Client">Client</option>
                                    <option value="O-Agent">O-Agent</option>
                                    <option value="Terminal">Terminal</option>
                                    <option value="CFS Facility">CFS Facility</option>
                                    <option value="Others">Others</option>
                                    <option value="Principal">Principal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">cCategory:</label>
                                <input name="c_category" type="text" class="form-control" placeholder="" />
                            </div>
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
           
        </form>
    </div>
@endsection


@push('script')

<script>
    $('#submitButton').click(function(){
        // Trigger form submission
        $('#myForm').submit();
      });
</script>

@endpush










