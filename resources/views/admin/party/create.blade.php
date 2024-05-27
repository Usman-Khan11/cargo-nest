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
                    <div class="d-flex justify-content-center mb-3">
                        <div class="mb-2 px-3">
                            <input name="calculation_type" type="radio" class="form-check-input" value="customer" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1">Customer</label>
                        </div>
                        <div class="mb-2 px-3">
                            <input name="calculation_type" type="radio" class="form-check-input" value="vendor" id="defaultRadio2" />
                            <label class="form-check-label" for="defaultRadio2">Vendor</label>
                        </div>
                        <div class="mb-2 px-3">
                            <input name="calculation_type" type="radio" class="form-check-input" value="customer/vendor" id="defaultRadio2" />
                            <label class="form-check-label" for="defaultRadio2">Customer/Vendor</label>
                        </div>
                        <div class="mb-2 px-3">
                            <input name="calculation_type" type="radio" class="form-check-input" value="non gl parties" id="defaultRadio2" />
                            <label class="form-check-label" for="defaultRadio2">Non GL Parties</label>
                        </div>
                    </div>

                   <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-basic_info" aria-controls="navs-top-basic_info" aria-selected="true">Basic Info</button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-other_info" aria-controls="navs-top-other_info" aria-selected="false"> Other Info</button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-account" aria-controls="navs-top-account" aria-selected="false"> Account Detail</button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-bank_details" aria-controls="navs-top-bank_details" aria-selected="false"> ACH / Bank Details</button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-notification" aria-controls="navs-top-notification" aria-selected="false"> Notifications</button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-insurance" aria-controls="navs-top-insurance" aria-selected="false"> Insurance Detail</button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-company" aria-controls="navs-top-company" aria-selected="false"> Company/CostCenter</button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-localize" aria-controls="navs-top-localize" aria-selected="false"> Localize/KYC</button>
                      </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-top-basic_info" role="tabpanel">
                            <div class="row">
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Short Name:</label>
                                        <input name="short_name" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Registration Date:</label>
                                        <input name="reg_date" type="date" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Licence No/Custom Code:</label>
                                        <input name="license_no" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Contact Person:</label>
                                        <input name="contact_person" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">NTN:</label>
                                        <input name="ntn" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">STRN:</label>
                                        <input name="strn" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Address 1:</label>
                                        <input name="address1" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Address 2:</label>
                                        <input name="address2" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Address 3:</label>
                                        <input name="address3" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">City:</label>
                                        <input name="city" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Zipcode:</label>
                                        <input name="zipcode" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Tel #1:</label>
                                        <input name="tel#1" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Tel #2:</label>
                                        <input name="tel#2" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Facsimile:</label>
                                        <input name="facsimile" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Mobile:</label>
                                        <input name="mobile" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Website:</label>
                                        <input name="website" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">E-mail:</label>
                                        <input name="email" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Account Dept E-mail:</label>
                                        <input name="acc_dept_email" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <label class="form-check-label mb-2"><input name="operation" value="Operation" type="checkbox" width="25px" height="25px"/><span>&nbsp;Operation:</span></label>
                                    <div class="d-flex">
                                        <div class="mb-2">
                                            <label class="form-label"></label>
                                            <input name="operation_check[]" type="checkbox" width="25px" height="25px"/><span>&nbsp;&nbsp;Sea Export</span>
                                        </div>
                                        <div class="mb-2 px-3">
                                            <label class="form-label"></label>
                                            <input name="operation_check[]" type="checkbox" width="25px" height="25px"/><span>&nbsp;&nbsp;Sea Import</span>
                                        </div>
                                        <div class="mb-2 px-3">
                                            <label class="form-label"></label>
                                            <input name="operation_check[]" type="checkbox" width="25px" height="25px"/><span>&nbsp;&nbsp;Air Export</span>
                                        </div>
                                        <div class="mb-2 px-3">
                                            <label class="form-label"></label>
                                            <input name="operation_check[]" type="checkbox" width="25px" height="25px"/><span>&nbsp;&nbsp;Air Import</span>
                                        </div>
                                        <div class="mb-2 px-3">
                                            <label class="form-label"></label>
                                            <input name="operation_check[]" type="checkbox" width="25px" height="25px"/><span>&nbsp;&nbsp;Logistics</span>
                                        </div>
                                        <div class="mb-2 px-3">
                                            <label class="form-label"></label>
                                            <input name="operation_check[]" type="checkbox" width="25px" height="25px"/><span>&nbsp;&nbsp;Warehouse</span>
                                        </div>
                                        <div class="mb-2 px-3">
                                            <label class="form-label"></label>
                                            <input name="operation_check[]" type="checkbox" width="25px" height="25px"/><span>&nbsp;&nbsp;Depot</span>
                                        </div>
                                        <div class="mb-2 px-3">
                                            <label class="form-label"></label>
                                            <input name="operation_check[]" type="checkbox" width="25px" height="25px"/><span>&nbsp;&nbsp;Other</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <label class="form-check-label mb-2">Type:</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="shipper" value="Shipper" class="form-check-input">
                                                    Shipper
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="consignee" value="Consignee" class="form-check-input">
                                                    Consignee
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="notify" value="Notify" class="form-check-input">
                                                    Notify
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="potential_customer" value="Potential Customer" class="form-check-input">
                                                    Potential Customer
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="forwarder_calender" value="Forwarder/Calender" class="form-check-input">
                                                    Forwarder/Calender
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="local_vendor" value="Local Vendor" class="form-check-input">
                                                    Local Vendor
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="overseas_agent" value="Overseas Agent" class="form-check-input">
                                                    Overseas Agent
                                                </label><br>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="shipper" value="Shipper" class="form-check-input">
                                                    Commision Agent
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="consignee" value="Consignee" class="form-check-input">
                                                    Indentor
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="potential_customer" value="Potential Customer" class="form-check-input">
                                                    Transporter
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="forwarder_calender" value="Forwarder/Calender" class="form-check-input">
                                                    CHA/CHB
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="local_vendor" value="Local Vendor" class="form-check-input">
                                                    Shipping Line
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="overseas_agent" value="Overseas Agent" class="form-check-input">
                                                    Delivery Agent
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="overseas_agent" value="warehouse" class="form-check-input">
                                                    Warehouse
                                                </label><br>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="buying_house" value="Buying House" class="form-check-input">
                                                    Buying House
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="airline" value="Airline" class="form-check-input">
                                                    Airline
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="trucking" value="Trucking" class="form-check-input">
                                                    Trucking
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="drayman" value="Drayman" class="form-check-input">
                                                    Drayman
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="cartage" value="Cartage" class="form-check-input">
                                                    Cartage
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="stevedore" value="Stevedore" class="form-check-input">
                                                    Stevedore
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="principal" value="Principal" class="form-check-input">
                                                    Principal
                                                </label><br>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="Depot" value="Depot" class="form-check-input">
                                                    Depot
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="terminal" value="Terminal" class="form-check-input">
                                                    Terminal
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="buyer" value="Buyer" class="form-check-input">
                                                    Buyer
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="invoice_Party" value="Invoice Party" class="form-check-input">
                                                    Invoice Party
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="slot_operator" value="Slot Operator" class="form-check-input">
                                                    Slot Operator
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="Investor" value="Investor" class="form-check-input">
                                                    Investor
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="non_operational_party" value="Non Operational Party" class="form-check-input">
                                                    Non Operational Party
                                                </label><br>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-4 col-12 mt-5">
                                    <div class="d-flex">
                                        <div class="mb-2">
                                            <label class="form-label"></label>
                                            <input name="nomination[]" type="checkbox" width="25px" height="25px"/><span>&nbsp;&nbsp;Import Nomination</span>
                                        </div>
                                        <div class="mb-2 px-3">
                                            <label class="form-label"></label>
                                            <input name="nomination[]" type="checkbox" width="25px" height="25px"/><span>&nbsp;&nbsp;Export Nomination</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <div class="mb-2">
                                        <label class="form-label">SCAC/IATA Code:</label>
                                        <input name="scac_iata_code" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-5 mt-4">
                                    <div class="mb-2">
                                        <label class="form-label"></label>
                                        <input name="inactive" type="checkbox" width="25px" height="25px"/><span>&nbsp;&nbsp;Apply Company Restriction</span>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label"></label>
                                        <input name="inactive" type="checkbox" width="25px" height="25px"/><span>&nbsp;&nbsp;Apply Cost Center Restriction</span>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-primary">Local Detail</button>
                                        <button class="btn btn-primary">Contact Detail</button>
                                        <button class="btn btn-primary">Alert</button>
                                        <button class="btn btn-primary">Party Exception</button>
                                        <button class="btn btn-primary">Commodity</button>
                                        <button class="btn btn-primary">Active & Inactive Log</button>
                                        <button class="btn btn-primary">Commitments</button>
                                    </div>
                                </div>
                                
                                
                            </div>
                          </div>
                        <div class="tab-pane fade" id="navs-top-other_info" role="tabpanel">
                              
                              <div class="row">
                                  <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">Type of Ownership:</label>
                                        <div class="d-flex justify-content-between">
                                            <div><input type="radio" name="ownership[]"/><span>&nbsp;Corporation</span></div>
                                            <div><input type="radio" name="ownership[]"/><span>&nbsp;Partnership</span></div>
                                            <div><input type="radio" name="ownership[]"/><span>&nbsp;Sole Proprietorship</span></div>
                                            <div><input type="radio" name="ownership[]"/><span>&nbsp;Others</span></div>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="mb-2">
                                          <label class="form-label">Affiliated Companies:</label>
                                          <input type="text" name="affiliated_companies" class="form-control" placeholder=""/>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="mb-2">
                                          <label class="form-label">Fed ID No:</label>
                                          <input type="text" name="fed_id" class="form-control" placeholder=""/>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="mb-2">
                                          <label class="form-label">Type of Business:</label>
                                          <input type="text" name="business_type" class="form-control" placeholder=""/>
                                      </div>
                                  </div>
                                  <div class="col-md-2">
                                      <div class="mb-2">
                                          <label class="form-label">Year Company Established:</label>
                                          <input type="text" name="year_company_establised" class="form-control" placeholder=""/>
                                      </div>
                                  </div>
                                  <div class="col-md-2">
                                      <div class="mb-2">
                                          <label class="form-label"># of Employees:</label>
                                          <input type="text" name="no_of_employee" class="form-control" placeholder=""/>
                                      </div>
                                  </div>
                                  <div class="col-md-2">
                                      <div class="mb-2">
                                          <label class="form-label">Est Annual Sales:</label>
                                          <input type="text" name="est_annual_sales" class="form-control" placeholder=""/>
                                      </div>
                                  </div>
                                  <div class="col-md-2">
                                      <div class="mb-2">
                                          <label class="form-label">D & B#:</label>
                                          <input type="text" name="d&b" class="form-control" placeholder=""/>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="mb-2">
                                          <label class="form-label">NTN Name:</label>
                                          <input type="text" name="ntn_name" class="form-control" placeholder=""/>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="mb-2">
                                          <label class="form-label">Buyer Type:</label>
                                          <select name="buyer_type" class="form-select">
                                              <option selected disabled></option>
                                              <option>End Consumer</option>
                                              <option>Intermediary</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md-12 mt-4">
                                      <div class="d-flex align-items-center">
                                          <div>
                                              <input type="checkbox" name="specific_credit_card" style="width:15px; height:15px;"/><span>&nbsp;Specific Credit Card Charges %</span>
                                          </div>
                                          <div class="px-3">
                                              <input type="number" name="specific_credit_card" class="form-control"/>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-3 mt-3">
                                      <div class="mb-2">
                                          <label class="form-label">Due Days:</label>
                                          <input type="text" name="due_days" class="form-control" placeholder=""/>
                                      </div>
                                  </div>
                                  <div class="col-md-3 mt-3">
                                      <div class="mb-2">
                                          <label class="form-label">Credit Unit:</label>
                                          <input type="text" name="credit_unit" class="form-control" placeholder=""/>
                                      </div>
                                  </div>
                                  <div class="col-md-3 mt-3">
                                      <div class="mb-2">
                                          <label class="form-label">Expiry Date:</label>
                                          <input type="text" name="expiry_date" class="form-control" placeholder=""/>
                                      </div>
                                  </div>
                                  <div class="col-md-3 mt-3">
                                      <div class="mb-2 mt-4">
                                          <button class="btn btn-primary">Update due days on invoices</button>
                                      </div>
                                  </div>
                              </div>
                              
                          </div>
                        <div class="tab-pane fade" id="navs-top-account" role="tabpanel">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="checkbox" name="manual_account" style="width:16px; height:16px;"/><span>&nbsp;Manual Account</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">Parent Account:</label>
                                        <input name="parent_account" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">Account:</label>
                                        <input name="account" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">Sale Rep:</label>
                                        <input name="sale_rep" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">Doc Rep:</label>
                                        <input name="doc_rep" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">Account Rep:</label>
                                        <input name="account_rep" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label">Referred By:</label>
                                        <input name="referred_by" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label class="form-label">Currency:</label>
                                        <select class="form-select" name="currency">
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
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <label class="form-label">Customer GRP:</label>
                                        <input name="customer_grp" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2 mt-4">
                                        <input name="" class="sub_type" type="checkbox" style="width:16px; height:16px;" /><span>&nbsp; &nbsp;Show Sub Type</span>
                                    </div>
                                </div>
                            </div>
                            <div class="sub_type_check">
                                <div class="d-flex justify-content-between mt-4">
                                    <div>
                                        <input name="" type="checkbox" style="width:16px; height:16px;" /><span>&nbsp;ACH</span>
                                    </div>
                                    <div>
                                        <input name="" type="checkbox" style="width:16px; height:16px;" /><span>&nbsp;Wire Transfer</span>
                                    </div>
                                    <div>
                                        <input name="" type="checkbox" style="width:16px; height:16px;" /><span>&nbsp;Online Transfer</span>
                                    </div>
                                    <div>
                                        <input name="" type="checkbox" style="width:16px; height:16px;" /><span>&nbsp;Credit Card</span>
                                    </div>
                                    <div>
                                        <input name="" type="checkbox" style="width:16px; height:16px;" /><span>&nbsp;Cheque</span>
                                    </div>
                                    <div>
                                        <input name="" type="checkbox" style="width:16px; height:16px;" /><span>&nbsp;PO</span>
                                    </div>
                                    <div>
                                        <input name="" type="checkbox" style="width:16px; height:16px;" /><span>&nbsp;TT</span>
                                    </div>
                                    <div>
                                        <input name="" type="checkbox" style="width:16px; height:16px;" /><span>&nbsp;Cash</span>
                                    </div>
                                    <div>
                                        <input name="" type="checkbox" style="width:16px; height:16px;" /><span>&nbsp;Party</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <div>
                                        <input name="" type="checkbox" style="width:16px; height:16px;" /><span>&nbsp;Online Personal A/C</span>
                                    </div>
                                    <div>
                                        <input name="" type="checkbox" style="width:16px; height:16px;" /><span>&nbsp;Personal Cheque</span>
                                    </div>
                                    <div>
                                        <input name="" type="checkbox" style="width:16px; height:16px;" /><span>&nbsp;Digital Wallet</span>
                                    </div>
                                    <div>
                                        <input name="" type="checkbox" style="width:16px; height:16px;" /><span>&nbsp;Atm Transfer</span>
                                    </div>
                                    <div>
                                        <input name="" type="checkbox" style="width:16px; height:16px;" /><span>&nbsp;Open PO</span>
                                    </div>
                                    <div>
                                        <input name="" type="checkbox" style="width:16px; height:16px;" /><span>&nbsp;Pay Cargo</span>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <div class="tab-pane fade" id="navs-top-bank_details" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="checkbox" value="ach_authority" style="width:15px; height:15px;"/>&nbsp; ACH Authority
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-2">
                                         <label class="form-label">Account Title:</label>
                                         <input name="account_title" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                         <label class="form-label">Bank:</label>
                                         <input name="bank" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                         <label class="form-label">Bank Name:</label>
                                         <input name="bank_name" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                         <label class="form-label">Account No:</label>
                                         <input name="account_no" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                         <label class="form-label">Iban:</label>
                                         <input name="iban" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                         <label class="form-label">Branch Code:</label>
                                         <input name="branch_code" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                         <label class="form-label">Swift Code:</label>
                                         <input name="swift_code" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                         <label class="form-label">Routing No:</label>
                                         <input name="iban" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                         <label class="form-label">IFSC Code:</label>
                                         <input name="ifsc" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                         <label class="form-label">MICR Code:</label>
                                         <input name="micr" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-2">
                                         <label class="form-label">Remarks:</label>
                                         <textarea class="form-control" name="remarks" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                         <label class="form-label">Autherization Date:</label>
                                         <input name="auth_date" type="date" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                         <label class="form-label">Autherization By:</label>
                                         <input name="auth_by" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-top-notification" role="tabpanel">
                            <div class="p-3">
                                <table class="datatables-basic table">
                                    <thead>
                                      <tr>
                                        <th>...</th>
                                        <th>S.No</th>
                                        <th>Notifications</th>
                                        <th>Disabled</th>
                                        <th>Email Address</th>
                                        <th>Operation Type</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                        <td><input type="text" style="width: 100%;"/></td>
                                        <td><input type="text" style="width: 100%;"/></td>
                                        <td><input type="checkbox" disabled style="width: 16px; height:16px;"/></td>
                                        <td><input type="text" style="width: 100%;"/></td>
                                        <td><select style="width: 100%; border:none; outline:none;">
                                            <option>Air Export</option>
                                            <option>Air Import</option>
                                            <option>Sea Export</option>
                                            <option>Sea Import</option>
                                            <option>Logistics</option>
                                            <option>Warehouse</option>
                                            <option>Other</option>
                                            <option>All</option>
                                        </select></td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-top-insurance" role="tabpanel">
                            <div class="p-3">
                                <table class="datatables-basic table">
                                    <thead>
                                      <tr>
                                        <th>...</th>
                                        <th>S.No</th>
                                        <th>Insurance Company</th>
                                        <th>Insurance Type</th>
                                        <th>Policy Value</th>
                                        <th>Policy#</th>
                                        <th>Expiry Date</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                        <td><input type="text" style="width: 100%;"/></td>
                                        <td><select style="width: 100%; border:none; outline:none;"> </select></td>
                                        <td><select style="width: 100%; border:none; outline:none;"> </select></td>
                                        <td><input type="text" style="width: 100%;"/></td>
                                        <td><input type="text" style="width: 100%;"/></td>
                                        <td><input type="text" style="width: 100%;"/></td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-top-company" role="tabpanel">
                            <div class="p-3">
                                <h5 class="text-center">Company</h5>
                                <input name="inactive" type="checkbox" style="width:15px; height:15px;"/><span>&nbsp;Apply Company Restriction:</span>
                                <table class="datatables-basic table">
                                    <thead>
                                      <tr>
                                        <th><input type="checkbox" style="width: 16px; height:16px;"/></th>
                                        <th>Company</th>
                                        <th>Default</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <td><input type="checkbox" style="width: 16px; height:16px;"/></td>
                                        <td><input type="text" style="width: 100%;"/></td>
                                        <td><input type="text" style="width: 100%;"/></td>
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-3 mt-3">
                                <h5 class="text-center">Cost Center</h5>
                                <input name="inactive" type="checkbox" style="width:15px; height:15px;"/><span>&nbsp;Apply Cost Center Restriction:</span>
                                <table class="datatables-basic table">
                                    <thead>
                                      <tr>
                                        <th><input type="checkbox" style="width: 16px; height:16px;"/></th>
                                        <th>Cost Center</th>
                                        <th>Distribution Name</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <td><input type="checkbox" style="width: 16px; height:16px;"/></td>
                                        <td><input type="text" style="width: 100%;"/></td>
                                        <td><input type="text" style="width: 100%;"/></td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-top-localize" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Name:</label>
                                        <input name="name" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Address 1:</label>
                                        <input name="address1" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Address 2:</label>
                                        <input name="address2" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Address 3:</label>
                                        <input name="address3" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="mb-2 mt-4">
                                        <label class="form-label"></label>
                                        <input name="kyc" type="checkbox" style="width:15px; height:15px;"/><span>&nbsp;&nbsp;KYC Verification Done</span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2 mt-4">
                                        <label class="form-label">KYC Date</label>
                                        <input type="date" name="kyc_date" class="form-control" placeholder=""/>
                                    </div>
                                </div>
                                <div class="col-md-9 col-12">
                                    <div class="mb-2 mt-4">
                                        <label class="form-label">Remarks</label>
                                        <textarea class="form-control" name="kyc_remarks" rows="4"></textarea>
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
        $(".sub_type_check").hide(); 
        $(".sub_check").click(function(){
            if($(this).prop('checked') == true){
                $(".sub_type_check").show(); 
            }
            else{
               $(".sub_type_check").hide();  
            }
            
        })
    </script>
@endpush











