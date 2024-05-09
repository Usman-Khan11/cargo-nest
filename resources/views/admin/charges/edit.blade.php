@extends('admin.layouts.app')

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="post" action="{{ route('admin.commodity.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $commodity->id }}" />
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold">{{ $page_title }}</h4>
                    <hr />
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
        </form>
    </div>
@endsection
