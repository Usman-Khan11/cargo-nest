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
            <i class="fa fa-file-lines"></i>
        </div>
    </div>

</div>
@endsection

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="post" action="{{ route('admin.quotation.store') }}" enctype="multipart/form-data" id="myForm">
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
                                <label class="form-label">Q No:</label>
                                <input name="quotation_no" type="text" class="form-control" placeholder="Q No" />
                            </div>
                        </div>

                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Date:</label>
                                <input name="date" type="date" class="form-control" placeholder="Date" />
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Expire Date:</label>
                                <input name="expire_date" type="date" class="form-control" placeholder="Expire Date" />
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Route Type:</label>
                                 <select name="route_type" class="form-select">
                                    <option value="">Select Route</option>
                                    <option value="single">Single</option>
                                    <option value="multiple">Multiple</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <label class="form-check-label mb-2">Mode:</label>
                            <div class="d-flex">
                                <div class="mb-2">
                                    <input name="mode" type="radio" class="form-check-input" value id="defaultRadio1" />
                                    <label class="form-check-label" for="defaultRadio1">Single job</label>
                                </div>
                                <div class="mb-2 px-3">
                                    <input name="mode" type="radio" class="form-check-input" value id="defaultRadio2" />
                                    <label class="form-check-label" for="defaultRadio2">Multiple job</label>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Operation Type:</label>
                                 <select name="operation_type" class="form-select">
                                    <option value="">Select</option>
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
                       
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Cost Center:</label>
                                 <select name="cost_center" class="form-select">
                                    <option value="">Select</option>
                                    <option value="head office">Head Office</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label"><a href="">Sale Rep:</a></label>
                                <select name="sale_rep" class="form-select">
                                    <option selected disabled>Select</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Book Rep:</label>
                                <input name="book_rep" type="text" class="form-control" placeholder="Book Rep" />
                            </div>
                        </div>
                       
                       <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Customer Type:</label>
                                 <select name="customer_type" class="form-select">
                                    <option value="">Select</option>
                                    <option value="potential">Potential</option>
                                    <option value="regular">Regular</option>
                                    <option value="agent">Agent</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label"><a href="">Client:</a></label>
                                <div class="row">
                                    <select name="customer_type" class="form-select">
                                        <option selected disabled>Select</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option> 
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Stage:</label>
                                 <select name="stage" class="form-select">
                                    <option value="">Select</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Pkgs:</label>
                                <input name="pkgs" type="text" class="form-control" placeholder="Pkgs" />
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Unit:</label>
                                 <select name="unit" class="form-select">
                                    <option value="">Select</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Attn. Person:</label>
                                <input name="attn_person" type="text" class="form-control" placeholder="Attn.Person" />
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">From Person:</label>
                                <input name="from_person" type="text" class="form-control" placeholder="From Person" />
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Vol / CBM:</label>
                                <input name="vol_cbm" type="text" class="form-control" placeholder="Vol / CBM" />
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label"><a href="">Commodity:</a></label>
                                <select name="commodity" class="form-select">
                                    <option selected disabled></option>
                                    @foreach($commodities as $commodity)
                                        <option value="{{ $commodity->id }}">{{ $commodity->name }}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Inco Term:</label>
                                 <select name="inco_term" class="form-select">
                                   <option selected disabled></option>
                                    @foreach($incoterms as $incoterm)
                                        <option value="{{ $incoterm->id }}">{{ $incoterm->name }}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Subject:</label>
                                <input name="subject" type="text" class="form-control" placeholder="Subject" />
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Job Type:</label>
                                 <select name="job_type" class="form-select">
                                    <option value="">Select</option>
                                    <option value="direct">Direct</option>
                                    <option value="coloaded">Coloaded</option>
                                    <option value="coloaded">Cross Trade</option>
                                    <option value="liner agency">Liner Agency</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Sub Type:</label>
                                 <select name="sub_type" class="form-select">
                                    <option value="">Select</option>
                                    <option value="fcl">FCL</option>
                                    <option value="lcl">LCL</option>
                                    <option value="air">Air</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label"><a href="">Vessel:</a></label>
                                <select name="vessel" class="form-select">
                                    <option selected disabled></option>
                                    @foreach($vessels as $vessel)
                                        <option value="{{ $vessel->id }}">{{ $vessel->vessel_name }}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Voyage/Flight No:</label>
                                <select name="voyage" class="form-select">
                                    <option selected disabled></option>
                                    @foreach($voyages as $voyage)
                                        <option value="{{ $voyage->id }}">{{ $voyage->voy }}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Currency:</label>
                                <select name="currency" class="form-select">
                                    <option selected disabled></option>
                                    @foreach($currencies as $currency)
                                        <option value="{{ $currency->id }}">{{ $currency->name }}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Exchange Rate:</label>
                                <input name="ex_rate" type="text" class="form-control" placeholder="" />
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
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false"> Header & Footer</button>
                  </li>
                  <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-messages" aria-controls="navs-top-messages" aria-selected="false"> Internal</button>
                  </li>
                  <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-routing" aria-controls="navs-top-routing" aria-selected="false"> Routing</button>
                  </li>
                  <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-equipment" aria-controls="navs-top-equipment" aria-selected="false"> Equipment</button>
                  </li>
                </ul>
                <div class="tab-content">
                      <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                        <div class="card-datatable table-responsive pt-0">
                          <table class="datatables-basic table" style="width:450%;">
                            <thead>
                              <tr>
                                <th>...</th>
                                <th>...</th>
                                <th>Charges Code</th>
                                <th>Charges</th>
                                <th>Charges Description</th>
                                <th>Charges Category</th>
                                <th>--- Unit ---</th>
                                <th>Size Type</th>
                                <th>Goods Unit</th>
                                <th>Rate Group</th>
                                <th>Mode</th>
                                <th>Manual</th>
                                <th>DG/Non-DG</th>
                                <th>Qty</th>
                                <th>Rate</th>
                                <th>Currency</th>
                                <th>Exch Rate</th>
                                <th>Amount</th>
                                <th>Local Amount</th>
                                <th>Tax%</th>
                                <th>Include Tax Amount</th>
                                <th>Buying Rate</th>
                                <th>Remarks</th>
                                <th>Payable To</th>
                                <th>Buying Remarks</th>
                                <th>Ord</th>
                                <th>Tariff Code</th>
                              </tr>
                            </thead>
                            <tbody class="detail_repeater">
                                <tr>
                                    <td><i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                    <td><i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                    <td><input type="text" style="width: 100%;" name="charges_code[]" /></td>
                                    <td><input type="text" style="width: 100%;" name="charges[]" /></td>
                                    <td><input type="text" style="width: 100%;" name="charges_desc[]" /></td>
                                    <td><input type="text" style="width: 100%;" name="charges_category[]" /></td>
                                    <td>
                                        <select name="units[]" style="width: 100%;">
                                            <option selected></option>
                                            <option value="Unit">Unit</option>
                                            <option value="Ship">Ship</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="size_type[]" style="width: 100%;">
                                            <option selected></option>
                                            @foreach($sizes as $size)
                                                <option value="{{ $size->id }}">{{ $size->size }}</option> 
                                            @endforeach
                                        </select>
                                    </td>
                                    
                                     <td>
                                        <select name="good_unit[]" style="width: 100%;">
                                            <option selected></option>
                                            <option value="Kg/S">Kg/S</option>
                                            <option value="PC/S">PC/S</option>
                                            <option value="Pallet/S">Pallet/S</option>
                                            <option value="TON/S">TON/S</option>
                                            <option value="CBM">CBM</option>
                                            <option value="Truck">Truck</option>
                                            <option value="Trailer">Trailer</option>
                                        </select>
                                    </td>
                                    <td><input type="text" style="width: 100%;" name="rate_group[]" /></td>
                                    <td>
                                        <select name="modee[]" style="width: 100%;">
                                            <option selected></option>
                                            <option value="Received From Client">Received From Client</option>
                                            <option value="Pay To Vendor">Pay To Vendor</option>
                                            <option value="Rec Pay From Client/Vendor">Rec Pay From Client/Vendor</option>
                                            <option value="Rec From O/Agent">Rec From O/Agent</option>
                                            <option value="Pay To O/Agent">Pay To O/Agent</option>
                                        </select>
                                    </td>
                                    <td><input type="checkbox" style="width: 100%;" name="manual[]"/></td>
                                     <td>
                                        <select name="dg_type[]" style="width: 100%;">
                                            <option selected></option>
                                            <option value="DG">DG</option>
                                            <option value="Non-DG">Non-DG</option>
                                            <option value="All">All</option>
                                        </select>
                                    </td>
                                    <td><input type="text" style="width: 100%;" onkeyup="detailCalculation(this)" class="qty" name="qty[]" /></td>
                                    <td><input type="text" style="width: 100%;" onkeyup="detailCalculation(this)" class="rate" name="rate[]" /></td>
                                    <td>
                                        <select name="detail_currency[]" style="width: 100%;">
                                            <option selected></option>
                                            @foreach($currencies as $currency)
                                                <option value="{{ $currency->id }}">{{ $currency->name }}</option> 
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="text" style="width: 100%;" onkeyup="detailCalculation(this)" class="detail_ex_rate" name="detail_ex_rate[]" /></td>
                                    <td><input type="text" style="width: 100%;" onkeyup="detailCalculation(this)" class="amount" name="amount[]" /></td>
                                    <td><input type="text" style="width: 100%;" onkeyup="detailCalculation(this)" class="local_amount" name="local_amount[]" /></td>
                                    <td><input type="text" style="width: 100%;" onkeyup="detailCalculation(this)" class="tax" name="tax[]" /></td>
                                    <td><input type="text" style="width: 100%;" onkeyup="detailCalculation(this)" class="inc_tax_amount" name="inc_tax_amount[]" /></td>
                                    <td><input type="text" style="width: 100%;" onkeyup="detailCalculation(this)" class="buying_rate" name="buying_rate[]" /></td>
                                    <td><input type="text" style="width: 100%;" name="remarks[]" /></td>
                                    <td><input type="text" style="width: 100%;" name="payable_to[]" /></td>
                                    <td><input type="text" style="width: 100%;" name="buying_remarks[]" /></td>
                                    <td><input type="text" style="width: 100%;" name="ord[]" /></td>
                                    <td><input type="text" style="width: 100%;" name="tariff_code[]" /></td>
                                </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                        <textarea rows="6" class="form-control" name="header_footer"></textarea>
                      </div>
                      <div class="tab-pane fade" id="navs-top-messages" role="tabpanel">
                        <textarea rows="6" class="form-control" name="internal"></textarea>
                      </div>
                      
                      <div class="tab-pane fade" id="navs-top-routing" role="tabpanel">
                        <div style="height:170px; overflow-y:scroll; overflow-x:hidden;">
                            <div class="row">
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Po #:</label>
                                        <input name="" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Ready Date:</label>
                                        <select class="form-select">
                                            <option>04-05-2024</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Ship By Date:</label>
                                        <select class="form-select">
                                            <option>04-05-2024</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Arrive No Later Than:</label>
                                        <select class="form-select">
                                            <option>04-05-2024</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">S/C #:</label>
                                        <input name="" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Service Type:</label>
                                        <select class="form-select">
                                            <option selected disabled>Select</option>
                                            <option>A</option>
                                            <option>b</option>
                                            <option>c</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Transit Time:</label>
                                        <input name="" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Detention Free Days:</label>
                                        <input name="" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Vendor:</label>
                                        <input name="" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Overseas Agent:</label>
                                        <input name="" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Sline Carrier:</label>
                                        <input name="" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Principle:</label>
                                        <input name="" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Other Instruction:</label>
                                        <textarea type="text" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Terminals:</label>
                                        <input name="" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                            </div>
                            
                            <hr/>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row"> 
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Shipper:</label>
                                                <input name="" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Pickup Location:</label>
                                                <input name="" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Auto Address:</label>
                                                <textarea type="text" rows="3" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Custom Clearance:</label>
                                                <input name="" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="border-left:1px solid #ccc">
                                    <div class="row"> 
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Port of Loading:</label>
                                                <input name="" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Port of Discharge:</label>
                                                <input name="" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Final Destination:</label>
                                                <input name="" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Drop off Location:</label>
                                                <input name="" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Auto Address:</label>
                                                <textarea type="text" rows="3" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label">Transportation:</label>
                                                <input name="" type="text" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                      </div>
                      
                      <div class="tab-pane fade" id="navs-top-equipment" role="tabpanel">
                        <table class="datatables-basic table">
                            <thead>
                              <tr>
                                <th>...</th>
                                <th>Size/Type</th>
                                <th>RateGroup</th>
                                <th>Qty</th>
                                <th>DG/Non-DG</th>
                                <th>Gross WT/CNT</th>
                                <th>TUE</th>
                              </tr>
                            </thead>
                            <tbody>
                                <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                <td>
                                    <select name="equip_size_type[]" style="width: 100%;">
                                        <option selected></option>
                                        @foreach($sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->size }}</option> 
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" style="width: 100%;" name="equip_rate_group[]" /></td>
                                <td><input type="text" style="width: 100%;" name="equip_qty[]" /></td>
                                <td>
                                    <select name="equip_dg_type[]" style="width: 100%;">
                                        <option selected></option>
                                        <option value="DG">DG</option>
                                        <option value="Non-DG">Non-DG</option>
                                        <option value="All">All</option>
                                    </select>
                                </td>
                                <td><input type="text" style="width: 100%;" name="equip_gross[]" /></td>
                                <td><input type="text" style="width: 100%;" name="equip_tue[]" /></td>
                            </tbody>
                        </table>
                      </div>
                    </div>
            </div>
            
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                       <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Approval Status:</label>
                                 <select name="approval_status" class="form-select">
                                    <option value="">Select</option>
                                    <option value="">Approved</option>
                                    <option value="">Pending</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Total Receivable:</label>
                                <input name="total_receivable" type="text" class="form-control" placeholder="Total Receivable" />
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Total Payable:</label>
                                <input name="total_payable" type="text" class="form-control" placeholder="Total Payable" />
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Total Profit:</label>
                                <input name="total_profit" type="text" class="form-control" placeholder="Total Profit" />
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
        $('#myForm').submit();
    });

    function addNewRow(e){
        $(e).parent().parent().clone().prependTo(".detail_repeater");
    }
    
    function delRow(e){
        if($(".detail_repeater tr").length <= 1) return;
        $(e).parent().parent().remove();
    }
    
    function detailCalculation(e){
        let total = 0;
        let qty = parseFloat($(e).parent().parent().find("input.qty").val()) || 0;
        let rate = parseFloat($(e).parent().parent().find("input.rate").val()) || 0;
        let detail_ex_rate = parseFloat($(e).parent().parent().find("input.detail_ex_rate").val()) || 0;
        let amount = parseFloat($(e).parent().parent().find("input.amount").val()) || 0;
        let local_amount = parseFloat($(e).parent().parent().find("input.local_amount").val()) || 0;
        let tax = parseFloat($(e).parent().parent().find("input.tax").val()) || 0;
        let inc_tax_amount = parseFloat($(e).parent().parent().find("input.inc_tax_amount").val()) || 0;
        let buying_rate = parseFloat($(e).parent().parent().find("input.buying_rate").val()) || 0;
        let total_receivable = parseFloat($("input[name=total_receivable]").val()) || 0;
        
        total = rate * qty;
        tax = tax / 100;
        tax = total * tax;
        $(e).parent().parent().find("input.amount").val(total);
        $(e).parent().parent().find("input.local_amount").val(total * detail_ex_rate);
        $(e).parent().parent().find("input.inc_tax_amount").val(total + tax);
        $("input[name=total_receivable]").val(total + tax)
    }
</script>
@endpush
