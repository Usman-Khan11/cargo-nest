@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus">
            <i class="fa fa-square-plus"></i>
        </div>
        <div class="save">
            <i class="fa fa-save"></i>
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
        <form method="post" action="{{ route('admin.commodity.store') }}" enctype="multipart/form-data">
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
                                    <option selected disabled></option>
                                    <option>PKR</option>
                                    <option>USD</option>
                                    <option>AED</option>
                                    <option>GPB</option>
                                    <option>EUR</option>
                                    <option>BDT</option>
                                    <option>OMR</option>
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
                                <label class="form-label">Localize:</label>
                                <input name="localize" type="text" class="form-control" placeholder="" />
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
                                    <option selected disabled></option>
                                    <option>Principle</option>
                                    <option>Agency</option>
                                    <option>None</option>
                                    <option>Reimbursment</option>
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
                                <input name="inactive" type="checkbox" width="20" height="20px"/><span>&nbsp;&nbsp;In-Active</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Type:</label>
                                <select name="type" class="form-select">
                                    <option selected disabled></option>
                                    <option>Import</option>
                                    <option>Clearing</option>
                                    <option>Dentention</option>
                                    <option>Plug In Charges</option>
                                    <option>Late Charges</option>
                                    <option>Storage</option>
                                    <option>Cleaning</option>
                                    <option>Placement Charges</option>
                                    <option>Depot Per Move Charges</option>
                                    <option>Depot Storage Charges</option>
                                    <option>Tax</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Reporting Group:</label>
                                <select name="reporting_group" class="form-select">
                                    <option selected disabled></option>
                                    <option>Freight</option>
                                    <option>Insurance</option>
                                    <option>D/O</option>
                                    <option>THC</option>
                                    <option>CSC</option>
                                    <option>Movement</option>
                                    <option>Detention</option>
                                    <option>Washing</option>
                                    <option>Repairing</option>
                                    <option>Terminal</option>
                                    <option>Yard</option>
                                    <option>Other</option>
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
                                    <input name="mode" type="radio" class="form-check-input" value id="defaultRadio1" />
                                    <label class="form-check-label" for="defaultRadio1">Per Unit</label>
                                </div>
                                <div class="mb-2 px-3">
                                    <input name="mode" type="radio" class="form-check-input" value id="defaultRadio2" />
                                    <label class="form-check-label" for="defaultRadio2">Per Shipment</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-12">
                            <!--<label class="form-check-label mb-2">Calculation Type:</label>-->
                            <div class="d-flex mt-4">
                                <div class="mb-2">
                                    <label class="form-label"></label>
                                    <input name="inactive" type="checkbox" width="25px" height="25px"/><span>&nbsp;&nbsp;Tax-Recevable</span>
                                </div>
                                <div class="mb-2 px-3">
                                    <label class="form-label"></label>
                                    <input name="inactive" type="checkbox" width="25px" height="25px"/><span>&nbsp;&nbsp;Tax-Payable</span>
                                </div>
                                <div class="mb-2 px-3">
                                    <label class="form-label"></label>
                                    <input name="inactive" type="checkbox" width="25px" height="25px"/><span>&nbsp;&nbsp;Tax On Principal Payment</span>
                                </div>
                                <div class="mb-2 px-3">
                                    <label class="form-label"></label>
                                    <input name="inactive" type="checkbox" width="25px" height="25px"/><span>&nbsp;&nbsp;Apply Company Restriction</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Default Payable Party Type:</label>
                                <select name="payable_party_type" class="form-select">
                                    <option selected disabled></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Default Recevable Party Type:</label>
                                <select name="recevable_party_type" class="form-select">
                                    <option selected disabled></option>
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
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true"> Details</button>
                  </li>
                  <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-messages" aria-controls="navs-top-messages" aria-selected="false"> Internal</button>
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
                      <div class="tab-pane fade" id="navs-top-messages" role="tabpanel">
                        <textarea type="text" rows="4" class="form-control"></textarea>
                      </div>
                </div>
            </div>
           
        </form>
    </div>
@endsection













