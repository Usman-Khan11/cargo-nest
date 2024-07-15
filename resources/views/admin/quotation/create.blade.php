@extends('admin.layouts.app')


@section('top_nav_panel')
<div class="col-md-5">
    <div class="d-flex">
        <div class="plus" onclick="quotationFormReset('/admin/quotation/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/quotation/delete')">
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
<div class="col-md-3">
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
    <div class="container-fluid flex-grow-1 container-p-y">
        <form method="post" action="{{ route('admin.quotation.store') }}" enctype="multipart/form-data" id="myForm">
            @csrf
            <div class="card mb-4" style="background-color:#f4ffed;">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#quotationModal">Show List</button>
                    <!--<hr />-->
                </div>
                <div class="card-body">
                    <input name="id" type="hidden" value="0"/>
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Q No:</label>
                                <input name="quotation_no" type="text" value="MSA-QTN-{{ $quotation_no }}/{{date('Y')}}" class="form-control quotation_no" readonly/>
                            </div>
                        </div>

                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Date:</label>
                                <input name="date" type="date" value="{{ date('Y-m-d') }}" class="form-control date"/>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Expire Date:</label>
                                <input name="expire_date" type="date" class="form-control expire_date" />
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Route Type:</label>
                                 <select name="route_type" class="form-select route_type">
                                    <option value="single" selected>Single</option>
                                    <option value="multiple">Multiple</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 mt-1 input_flex">
                                <label class="form-check-label mb-2">Mode:</label>
                                <div class="d-flex">
                                    <div class="mb-2 px-3">
                                        <input name="mode" type="radio" class="form-check-input mode" value="Single-job" id="defaultRadio1" checked />
                                        <label class="form-check-label" for="defaultRadio1">&nbsp;Single job</label>
                                    </div>
                                    <div class="mb-2">
                                        <input name="mode" type="radio" class="form-check-input mode" value="Multiple-job" id="defaultRadio2" />
                                        <label class="form-check-label" for="defaultRadio2">&nbsp;Multiple job</label>
                                    </div>
                                </div>
                            </div>    
                        </div>
                       
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Operation Type: <span class="text-danger">*</span></label>
                                 <select name="operation_type" class="form-select operation_type">
                                    <option value="sea-export">Sea Export</option>
                                    <option value="air-export">Air Export</option>
                                    <option value="sea-import">Sea Import</option>
                                    <option value="air-import">Air Import</option>
                                    <option value="logistics">Logistics</option>
                                    <option value="warehouse">Warehouse</option>
                                    <option value="other">Other</option>
                                    
                                </select>
                            </div>
                        </div>
                       
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Cost Center: <span class="text-danger">*</span></label>
                                 <select name="cost_center" class="form-select cost_center">
                                    <option value="head-office">Head Office</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label"><a href="">Sale Rep:</a></label>
                                <select name="sale_rep" class="sale_rep">
                                    <option selected disabled></option>
                                    {{--@foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->emp_name }}</option> 
                                    @endforeach--}}
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Book Rep:</label>
                                <input name="book_rep" type="text" class="form-control book_rep"/>
                            </div>
                        </div>
                       
                       <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Customer Type:</label>
                                 <select name="customer_type" class="form-select customer_type">
                                    <option value="">Select</option>
                                    <option value="potential">Potential</option>
                                    <option value="regular">Regular</option>
                                    <option value="agent">Agent</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Client:</label>
                                 <select name="client" class="client">
                                    <option selected disabled></option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Stage:</label>
                                 <select name="stage" class="form-select stage">
                                    <option value="Request-For-Quote" selected>Request For Quote</option>
                                    <option value="In-Process">In Process</option>
                                    <option value="Quote">Quote</option>
                                    <option value="Responded">Responded</option>
                                    <option value="Booked">Booked</option>
                                    <option value="Rejected">Rejected</option>
                                    <option value="Cancelled">Cancelled</option>
                                    <option value="Lost">Lost</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Pkgs:</label>
                                <input name="pkgs" type="text" class="form-control pkgs"/>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Unit:</label>
                                 <select name="unit" class="unit">
                                    <option selected disabled></option>
                                    {{--@foreach($packages as $pkgs)
                                        <option value="{{ $pkgs->id }}">{{ $pkgs->pack_code }}</option> 
                                    @endforeach--}}
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Attn. Person:</label>
                                <input name="attn_person" type="text" class="form-control attn_person" />
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">From Person:</label>
                                <input name="from_person" type="text" class="form-control from_person" />
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Vol / CBM:</label>
                                <input name="vol_cbm" type="text" class="form-control vol_cbm" />
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label"><a href="">Commodity:</a></label>
                                <select name="commodity" class="commodity">
                                    <option selected disabled></option>
                                    {{--@foreach($commodities as $commodity)
                                        <option value="{{ $commodity->id }}">{{ $commodity->name }}</option> 
                                    @endforeach--}}
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Inco Term:</label>
                                 <select name="inco_term" class="inco_term">
                                   <option selected disabled></option>
                                    {{--@foreach($incoterms as $incoterm)
                                        <option value="{{ $incoterm->id }}">{{ $incoterm->name }}</option> 
                                    @endforeach--}}
                                </select>
                            </div>
                        </div>
                       
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Subject:</label>
                                <input name="subject" type="text" class="form-control subject" />
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Job Type:</label>
                                 <select name="job_type" class="form-select job_type">
                                    <option value="">Select</option>
                                    <option value="direct">Direct</option>
                                    <option value="coloaded">Coloaded</option>
                                    <option value="coloaded">Cross Trade</option>
                                    <option value="liner agency">Liner Agency</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Sub Type:</label>
                                 <select name="sub_type" class="form-select sub_type">
                                    <option value="fcl" selected>FCL</option>
                                    <option value="lcl">LCL</option>
                                    <option value="air">Air</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label"><a href="">Vessel:</a></label>
                                <select name="vessel" class="vessel">
                                    <option selected disabled></option>
                                    {{--@foreach($vessels as $vessel)
                                        <option value="{{ $vessel->id }}">{{ $vessel->vessel_name }}</option> 
                                    @endforeach--}}
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Voyage/Flight No:</label>
                                <select name="voyage" class="voyage">
                                    <option selected disabled></option>
                                    {{--@foreach($voyages as $voyage)
                                        <option value="{{ $voyage->id }}">{{ $voyage->voy }}</option> 
                                    @endforeach--}}
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Currency:</label>
                                <select name="currency" class="currency">
                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Exchange Rate:</label>
                                <input name="ex_rate" type="text" class="form-control ex_rate"/>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex mt-1">
                                <button class="btn btn-primary btn-sm">Quotation Clone</button>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <img id="statusImage" src="{{asset('frontend/images/approved.png')}}" width="50%" style="display:none;"/>
                            </div>
                        </div>
                        
                       
                    </div>
                </div>
            </div>
            
            <div class"card mb-4" style="background-color:#f4ffed;">
                <ul class="nav nav-tabs" role="tablist" style="background-color:#f4ffed;">
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
                <div class="tab-content" style="background-color:#f4ffed;">
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
                                    <td><i onclick="addNewRow(this)" class="fa fa-clone fa-lg text-info"></i></td>
                                    <td><input type="text" class="form-control charges_code" style="width: 100%;" onkeyup="getChargesCode(this)" name="charges_code[]" /></td>
                                    <td>
                                        <select class="form-select charges" onchange="getChargesCurrency(this)" style="width: 100%;" name="charges[]">
                                            <option selected disabled value="">Select Charges</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control charges_desc" style="width: 100%;" name="charges_desc[]" /></td>
                                    <td><input type="text" class="form-control charges_category" style="width: 100%;" name="charges_category[]" /></td>
                                    <td>
                                        <select name="units[]" class="form-select units" style="width: 100%;">
                                            <option></option>
                                            <option value="Unit">Unit</option>
                                            <option value="Ship">Ship</option>
                                        </select>
                                    </td>
                                    <td width="4%">
                                        <select name="size_type[]" class="form-select size_type" style="width: 100%;">
                                            <option selected disabled>Select</option>
                                        </select>
                                    </td>
                                    
                                     <td>
                                        <select name="good_unit[]" class="form-select good_unit" style="width: 100%;">
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
                                    <td width="3%"><input type="text" style="width: 100%;" class="form-control rate_group" name="rate_group[]" /></td>
                                    <td>
                                        <select name="modee[]" onchange="modeChange(this)" class="form-select modee" style="width: 100%;">
                                            <option selected></option>
                                            <option value="Received From Client">Received From Client</option>
                                            <option value="Pay To Vendor">Pay To Vendor</option>
                                            <option value="Rec Pay From Client/Vendor">Rec Pay From Client/Vendor</option>
                                            <option value="Rec From O/Agent">Rec From O/Agent</option>
                                            <option value="Pay To O/Agent">Pay To O/Agent</option>
                                        </select>
                                    </td>
                                    <td><input type="checkbox" class="form-check-input manual" value="manual" name="manual[]"/></td>
                                     <td>
                                        <select name="dg_type[]" class="form-select dg_type" style="width: 100%;">
                                            <option value="Non-DG" selected>Non-DG</option>
                                            <option value="DG">DG</option>
                                            <option value="All">All</option>
                                        </select>
                                    </td>
                                    <td width="2%"><input type="text" class="form-control qty" style="width: 100%;" onkeyup="detailCalculation(this)" name="qty[]" /></td>
                                    <td><input type="text" class="form-control rate" style="width: 100%;" onkeyup="detailCalculation(this)" name="rate[]" /></td>
                                    <td>
                                        <select name="detail_currency[]" class="form-select detail_currency" style="width: 100%;">
                                            <option>Select</option>
                                        </select>
                                    </td>
                                    <td><input class="form-control detail_ex_rate" type="text" style="width: 100%;" onkeyup="detailCalculation(this)" name="detail_ex_rate[]" /></td>
                                    <td><input class="form-control amount" type="text" style="width: 100%;" onkeyup="detailCalculation(this)" name="amount[]" /></td>
                                    <td><input class="form-control local_amount" type="text" style="width: 100%;" onkeyup="detailCalculation(this)" name="local_amount[]" /></td>
                                    <td><input class="form-control tax" type="text" style="width: 100%;" onkeyup="detailCalculation(this)" name="tax[]" /></td>
                                    <td><input class="form-control inc_tax_amount" type="text" style="width: 100%;" onkeyup="detailCalculation(this)" name="inc_tax_amount[]" /></td>
                                    <td><input class="form-control buying_rate" type="text" style="width: 100%;" onkeyup="detailCalculation(this)" name="buying_rate[]" /></td>
                                    <td><input class="form-control remarks" type="text" style="width: 100%;" name="remarks[]" /></td>
                                    <td><input class="form-control payable_to" type="text" style="width: 100%;" name="payable_to[]" /></td>
                                    <td><input class="form-control buying_remarks" type="text" style="width: 100%;" name="buying_remarks[]" /></td>
                                    <td><input class="form-control ord" type="text" style="width: 100%;" name="ord[]" /></td>
                                    <td><input class="form-control tariff_code" type="text" style="width: 100%;" name="tariff_code[]" /></td>
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
                        <div style="height:250px; overflow-y:scroll; overflow-x:hidden;">
                            <div class="row">
                                <div class="col-md-2 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Po #:</label>
                                        <input name="po_num" type="text" class="form-control po_num"/>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Ready Date:</label>
                                        <input type="date" name="ready_date" class="form-control ready_date"/>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Ship By Date:</label>
                                        <input type="date" name="ship_date" class="form-control ship_date"/>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Arrive No Later Than:</label>
                                        <input type="date" name="arrive_date" class="form-control arrive_date"/>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">S/C #:</label>
                                        <input name="s_c" type="text" class="form-control s_c" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Service Type:</label>
                                        <select name="service_type" class="form-select service_type">
                                            <option selected disabled>Select</option>
                                            <option value="A">A</option>
                                            <option value="B">b</option>
                                            <option value="C">c</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Transit Time:</label>
                                        <input name="transit_time" type="text" class="form-control transit_time" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Detention Free Days:</label>
                                        <input name="free_days" type="text" class="form-control free_days" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Vendor:</label>
                                        <select name="vendor" class="vendor">
                                            <option selected disabled>Select</option>
                                            {{--@foreach($vendors as $party)
                                                <option value="{{ $party->id }}">{{ $party->party_name }}</option> 
                                            @endforeach--}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Overseas Agent:</label>
                                        <select name="overseas" class="overseas">
                                            <option selected disabled>Select</option>
                                            {{--@foreach($overseas as $party)
                                                <option value="{{ $party->id }}">{{ $party->party_name }}</option> 
                                            @endforeach--}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Sline Carrier:</label>
                                        <select name="sline_carrier" class="sline_carrier">
                                            <option selected disabled>Select</option>
                                            {{--@foreach($shipping_lines as $party)
                                                <option value="{{ $party->id }}">{{ $party->party_name }}</option> 
                                            @endforeach--}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Principal:</label>
                                        <select name="principal" class="principal">
                                            <option selected disabled>Select</option>
                                            {{--@foreach($principals as $party)
                                                <option value="{{ $party->id }}">{{ $party->party_name }}</option> 
                                            @endforeach--}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label" style="width:20%;">Other Instruction:</label>
                                        <textarea name="other_instruct" type="text" rows="3" class="form-control other_instruct"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label" style="width:30%;">Terminals:</label>
                                        <select name="terminals" class="terminals">
                                            <option selected disabled>Select</option>
                                            {{--@foreach($terminals as $p_location)
                                                <option value="{{ $p_location->id }}">{{ $p_location->location_name }}</option> 
                                            @endforeach--}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <hr/>
                            
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="row"> 
                                        <div class="col-md-12 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Shipper:</label>
                                                <select name="shipper" class="shipper">
                                                    <option selected disabled>Select</option>
                                                    {{--@foreach($shippers as $party)
                                                        <option value="{{ $party->id }}">{{ $party->party_name }}</option> 
                                                    @endforeach--}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Consignee:</label>
                                                <select name="consignee" class="consignee">
                                                    <option selected disabled>Select</option>
                                                    {{--@foreach($consignees as $party)
                                                        <option value="{{ $party->id }}">{{ $party->party_name }}</option> 
                                                    @endforeach--}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Pickup Location:</label>
                                                <input name="pickup_location" type="text" class="form-control pickup_location" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Custom Clearance:</label>
                                                <input name="custom_clearance" type="text" class="form-control custom_clearance" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Auto Address:</label>
                                                <textarea name="auto_address" type="text" rows="3" class="form-control auto_address"></textarea>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-7" style="border-left:1px solid #ccc">
                                    <div class="row"> 
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Place of Receipt:</label>
                                                <select name="place_of_receipt" class="place_of_receipt">
                                                    <option selected disabled>Select</option>
                                                    {{--@foreach($locations as $location)
                                                        <option value="{{ $location->id }}">{{ $location->location }}</option> 
                                                    @endforeach--}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Port of Loading: <span class="text-danger">*</span></label>
                                                <select name="port_of_loading" class="port_of_loading">
                                                    <option selected disabled>Select</option>
                                                    {{--@foreach($locations as $location)
                                                        <option value="{{ $location->id }}">{{ $location->location }}</option> 
                                                    @endforeach--}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Port of Discharge: <span class="text-danger">*</span></label>
                                                <select name="port_of_discharge" class="port_of_discharge">
                                                    <option selected disabled>Select</option>
                                                    {{--@foreach($locations as $location)
                                                        <option value="{{ $location->id }}">{{ $location->location }}</option> 
                                                    @endforeach--}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Final Destination:</label>
                                                <select name="final_destination" class="final_destination">
                                                    <option selected disabled>Select</option>
                                                    {{--@foreach($locations as $location)
                                                        <option value="{{ $location->id }}">{{ $location->location }}</option> 
                                                    @endforeach--}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Drop off Location:</label>
                                                <input name="drop_off_location" type="text" class="form-control drop_off_location" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Transportation:</label>
                                                <input name="transportation" type="text" class="form-control transportation" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-2 input_flex">
                                                <label class="form-label">Auto Address:</label>
                                                <textarea name="auto_address2" type="text" rows="3" class="form-control auto_address2"></textarea>
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
                                <th>...</th>
                                <th>Size/Type</th>
                                <th>RateGroup</th>
                                <th>Qty</th>
                                <th>DG/Non-DG</th>
                                <th>Gross WT/CNT</th>
                                <th>TUE</th>
                              </tr>
                            </thead>
                            <tbody class="eqp_detail_repeater">
                                <tr>
                                    <td><i onclick="eqpdelRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                    <td><i onclick="eqpaddNewRow(this)" class="fa fa-clone fa-lg text-info"></i></td>
                                    <td>
                                        <select name="equip_size_type[]" class="form-select equip_size_type" style="width: 100%;">
                                            <option selected disabled> Select Size <option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control equip_rate_group" style="width: 100%;" name="equip_rate_group[]" /></td>
                                    <td><input type="text" class="form-control equip_qty" style="width: 100%;" name="equip_qty[]" /></td>
                                    <td>
                                        <select name="equip_dg_type[]" class="form-select equip_dg_type" style="width: 100%;">
                                            <option value="Non-DG" selected>Non-DG</option>
                                            <option value="DG">DG</option>
                                            <option value="All">All</option>
                                        </select>
                                    </td>
                                    <td><input class="form-control equip_gross" type="text" style="width: 100%;" name="equip_gross[]" /></td>
                                    <td><input class="form-control equip_tue" type="text" style="width: 100%;" name="equip_tue[]" /></td>
                                </tr>
                            </tbody>
                        </table>
                      </div>
                    </div>
            </div>
            
            <div class="card mt-4" style="background-color:#f4ffed;">
                <div class="card-body">
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary btn-sm" onclick="approvalStatusChange('Approved')">Approved</button>
                        <button type="button" class="btn btn-primary btn-sm" onclick="approvalStatusChange('Un-approved')">Un Approved</button>
                        <button type="button" class="btn btn-primary btn-sm mx-2" disabled id="create_job">Create Job</button>
                    </div>
                    <div class="row">
                       <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Approval Status:</label>
                                 <select name="approval_status" id="status_check" onchange="" class="form-select approval_status" disabled>
                                    <option value="Draft">Draft</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Un-approved">Un-approved</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Job Number:</label>
                                <input name="job_no" type="text" class="form-control job_no" readonly/>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Total Receivable:</label>
                                <input name="total_receivable" type="text" class="form-control total_receivable" readonly/>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2 input_flex">
                                <label class="form-label">Total Payable:</label>
                                <input name="total_payable" type="text" class="form-control total_payable" readonly/>
                            </div>
                            <div class="mb-2 input_flex">
                                <label class="form-label">Total Profit:</label>
                                <input name="total_profit" type="text" class="form-control total_profit" readonly/>
                            </div>
                        </div>
                        
                        <!--<div class="col-md-2 col-12">-->
                            
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="quotationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Quotation List</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="table-responsive w-100">
                <table class="table table-bordered table-sm quotation_record">
                    <thead class="table-primary">
                        <tr>
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
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection


@push('script')
<script>

var datatable = null;
  $(document).ready(function () {
      
    $(".sale_rep").select2({
      data: @json($employees)
    });
    
    $(".unit").select2({
      data: @json($packages)
    });
    
    $(".commodity").select2({
      data: @json($commodities)
    });
    
    $(".inco_term").select2({
      data: @json($incoterms)
    });
    
    $(".vessel").select2({
      data: @json($vessels)
    });
    
    $(".voyage").select2({
      data: @json($voyages)
    });
    
    $(".currency").select2({
      data: @json($currencies)
    });
    
    $(".detail_currency").select2({
      data: @json($currencies)
    });
    
    $(".size_type").select2({
      data: @json($sizes)
    });
    $(".equip_size_type").select2({
      data: @json($sizes)
    });
    
    $(".client").select2({
      data: @json($parties)
    });
    
    $(".vendor").select2({
      data: @json($vendors)
    });
    $(".overseas").select2({
      data: @json($overseas)
    });
    $(".principal").select2({
      data: @json($principals)
    });
    $(".sline_carrier").select2({
      data: @json($shipping_lines)
    });
    $(".shipper").select2({
      data: @json($shippers)
    });
    $(".consignee").select2({
      data: @json($consignees)
    });
    
    $(".terminals").select2({
      data: @json($terminals)
    });
    
    
    $(".place_of_receipt").select2({
      data: @json($locations)
    });
    $(".port_of_loading").select2({
      data: @json($locations)
    });
    $(".port_of_discharge").select2({
      data: @json($locations)
    });
    $(".final_destination").select2({
      data: @json($locations)
    });
    
    $(".charges").select2({
      data: @json($charges)
    });
    
    datatable = $(".quotation_record").DataTable({
      select: {
        style: "api",
      },
      processing: true,
      searching: false,
      serverSide: true,
      lengthChange: false,
      pageLength: 10,
    //   scrollX: true,
      ajax: {
        url: "{{ route('admin.quotation.create') }}",
        type: "get",
        data: function (d) {},
      },
      columns: [
        {
          data: "quotation_no",
          title: "Quotation No",
        },
        {
          data: "date",
          title: "Date",
        },
        {
          data: "mode",
          title: "Mode",
        },
        {
          data: "operation_type",
          title: "Operation Type",
        },
        {
          data: "ex_rate",
          title: "Exchange Rate",
        },
      ],
      rowCallback: function (row, data) {
          data = { quotation: data };
          $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`);
          $(row).attr("data-bs-dismiss", "modal");
      },
    });
  });

    $('#submitButton').click(function(){
        $('#myForm').submit();
    });

    function addNewRow(e){
        $('select.charges, select.size_type, select.detail_currency').select2('destroy');
        $(e).parent().parent().clone().appendTo(".detail_repeater");
        initializeSelect2([
            'select.charges',
            'select.size_type',
            'select.detail_currency'
        ]);
        $(".detail_repeater tr:last").find("input").val(null);
        $(".detail_repeater tr:last").find("select").val(null).trigger('change');
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
        $(e).parent().parent().find("input.inc_tax_amount").val((total * detail_ex_rate) + tax);
        $("input[name=total_receivable]").val((total * detail_ex_rate) + tax);
    }
    
    
    function edit_row(e, data) {
    data = JSON.parse(data);
    if (data.quotation) {
        $(".quotation_no").val(data.quotation.quotation_no);
        $(".date").val(data.quotation.date);
        $(".expire_date").val(data.quotation.expire_date);
        $(".route_type").val(data.quotation.route_type);
        
        $("input[name='mode'][value='" + data.quotation.mode + "']").prop('checked', true);
        
        $(".operation_type").val(data.quotation.operation_type);
        $(".cost_center").val(data.quotation.cost_center);
        $(".sale_rep").val(data.quotation.sale_rep).trigger('change');
        $(".book_rep").val(data.quotation.book_rep);
        $(".customer_type").val(data.quotation.customer_type);
        $(".client").val(data.quotation.client).trigger('change');
        $(".stage").val(data.quotation.stage);
        $(".pkgs").val(data.quotation.pkgs);
        $(".unit").val(data.quotation.unit).trigger('change');
        $(".attn_person").val(data.quotation.attn_person);
        $(".from_person").val(data.quotation.from_person);
        $(".vol_cbm").val(data.quotation.vol_cbm);
        $(".commodity").val(data.quotation.commodity).trigger('change');
        $(".inco_term").val(data.quotation.inco_term).trigger('change');
        $(".subject").val(data.quotation.subject);
        $(".job_type").val(data.quotation.job_type);
        $(".sub_type").val(data.quotation.sub_type);
        $(".vessel").val(data.quotation.vessel).trigger('change');
        $(".voyage").val(data.quotation.voyage).trigger('change');
        $(".currency").val(data.quotation.currency).trigger('change');
        $(".ex_rate").val(data.quotation.ex_rate);
        $(".approval_status").val(data.quotation.approval_status);
        $(".total_receivable").val(data.quotation.total_receivable);
        $(".total_payable").val(data.quotation.total_payable);
        $(".total_profit").val(data.quotation.total_profit);
        
        $("#myForm").attr("action", "{{ route('admin.quotation.update') }}");
        $("#create_job").attr("onclick", `window.location.assign('/admin/job/create?quot_id=${data.quotation.id}')`);
        $("input[name=id]").val(data.quotation.id);
    }
    
    if(data.quotation_detail){
        let length = data.quotation_detail.length;
        $(".detail_repeater tr").each(function(i,v){
            if (i > 0) { $(v).remove(); }
        })
        $(data.quotation_detail).each(function(key, value){
            if (key > 0) {
                $(".detail_repeater tr:first").find("i.fa-clone").click();
            }
        })
        $(data.quotation_detail).each(function(key, value){
            var charges_code = $(`.charges_code`).get(key);
            $(charges_code).val(value.charges_code);
            
            var charges = $(`.charges`).get(key);
            $(charges).val(value.charges).trigger('change');
            
            var charges_desc = $(`.charges_desc`).get(key);
            $(charges_desc).val(value.charges_desc);
            
            var charges_category = $(`.charges_category`).get(key);
            $(charges_category).val(value.charges_category);
            
            var units = $(`.units`).get(key);
            $(units).val(value.units);
            
            var size_type = $(`.size_type`).get(key);
            $(size_type).val(value.size_type).trigger('change');
            
            var good_unit = $(`.good_unit`).get(key);
            $(good_unit).val(value.good_unit);
            
            var rate_group = $(`.rate_group`).get(key);
            $(rate_group).val(value.rate_group);
            
            var mode = $(`.mode`).get(key);
            $(mode).val(value.modee);
            
            var manual = $(`.manual`).get(key);
            $(manual).val(value.manual);
            
            var dg_type = $(`.dg_type`).get(key);
            $(dg_type).val(value.dg_type);
            
            var qty = $(`.qty`).get(key);
            $(qty).val(value.qty);
            
            var rate = $(`.rate`).get(key);
            $(rate).val(value.rate);
            
            var currency = $(`.currency`).get(key);
            $(currency).val(value.currency).trigger('change');
            
            var ex_rate = $(`.ex_rate`).get(key);
            $(ex_rate).val(value.ex_rate);
            
            var amount = $(`.amount`).get(key);
            $(amount).val(value.amount);
            
            var local_amount = $(`.local_amount`).get(key);
            $(local_amount).val(value.local_amount);
            
            var tax = $(`.tax`).get(key);
            $(tax).val(value.tax);
            
            var inc_tax_amount = $(`.inc_tax_amount`).get(key);
            $(inc_tax_amount).val(value.inc_tax_amount);
            
            var buying_rate = $(`.buying_rate`).get(key);
            $(buying_rate).val(value.buying_rate);
            
            var remarks = $(`.remarks`).get(key);
            $(remarks).val(value.remarks);
            
            var payable_to = $(`.payable_to`).get(key);
            $(payable_to).val(value.payable_to);
            
            var buying_remarks = $(`.buying_remarks`).get(key);
            $(buying_remarks).val(value.buying_remarks);
            
            var ord = $(`.ord`).get(key);
            $(ord).val(value.ord);
            
            var tariff_code = $(`.tariff_code`).get(key);
            $(tariff_code).val(value.tariff_code);
            
            // $(".charges_code").val(data.quotation_detail.charges_code);
            // $(".charges").val(data.quotation_detail.charges).trigger('change');
            // $(".charges_desc").val(data.quotation_detail.charges_desc);
            // $(".charges_category").val(data.quotation_detail.charges_category);
            // $(".units").val(data.quotation_detail.units);
            // $(".size_type").val(data.quotation_detail.size_type).trigger('change');
            // $(".good_unit").val(data.quotation_detail.good_unit);
            // $(".rate_group").val(data.quotation_detail.rate_group);
            // $(".mode").val(data.quotation_detail.modee);
            // $(".manual").val(data.quotation_detail.manual);
            // $(".dg_type").val(data.quotation_detail.dg_type);
            // $(".qty").val(data.quotation_detail.qty);
            // $(".rate").val(data.quotation_detail.rate);
            // $(".currency").val(data.quotation_detail.currency).trigger('change');
            // $(".ex_rate").val(data.quotation_detail.ex_rate);
            // $(".amount").val(data.quotation_detail.amount);
            // $(".local_amount").val(data.quotation_detail.local_amount);
            // $(".tax").val(data.quotation_detail.tax);
            // $(".inc_tax_amount").val(data.quotation_detail.inc_tax_amount);
            // $(".buying_rate").val(data.quotation_detail.buying_rate);
            // $(".remarks").val(data.quotation_detail.remarks);
            // $(".payable_to").val(data.quotation_detail.payable_to);
            // $(".buying_remarks").val(data.quotation_detail.buying_remarks);
            // $(".ord").val(data.quotation_detail.ord);
            // $(".tariff_code").val(data.quotation_detail.tariff_code);
        })
    }
    
    if(data.quotation_routing){
        $(".po_num").val(data.quotation_routing.po_num);
        $(".ready_date").val(data.quotation_routing.ready_date);
        $(".ship_date").val(data.quotation_routing.ship_date);
        $(".arrive_date").val(data.quotation_routing.arrive_date);
        $(".s_c").val(data.quotation_routing.s_c);
        $(".service_type").val(data.quotation_routing.service_type);
        $(".transit_time").val(data.quotation_routing.transit_time);
        $(".free_days").val(data.quotation_routing.free_days);
        $(".vendor").val(data.quotation_routing.vendor).trigger('change');
        $(".overseas").val(data.quotation_routing.overseas).trigger('change');
        $(".sline_carrier").val(data.quotation_routing.sline_carrier).trigger('change');
        $(".principal").val(data.quotation_routing.principal).trigger('change');
        $(".other_instruct").val(data.quotation_routing.other_instruct);
        $(".terminals").val(data.quotation_routing.terminals).trigger('change');
        $(".shipper").val(data.quotation_routing.shipper).trigger('change');
        $(".consignee").val(data.quotation_routing.consignee).trigger('change');
        $(".pickup_location").val(data.quotation_routing.pickup_location);
        $(".auto_address").val(data.quotation_routing.auto_address);
        $(".custom_clearance").val(data.quotation_routing.custom_clearance);
        $(".place_of_receipt").val(data.quotation_routing.place_of_receipt).trigger('change');
        $(".port_of_loading").val(data.quotation_routing.port_of_loading).trigger('change');
        $(".port_of_discharge").val(data.quotation_routing.port_of_discharge).trigger('change');
        $(".final_destination").val(data.quotation_routing.final_destination);
        $(".drop_off_location").val(data.quotation_routing.drop_off_location);
        $(".auto_address2").val(data.quotation_routing.auto_address2);
        $(".transportation").val(data.quotation_routing.transportation);
    }
    
    if(data.quotation_equipment){
        
        let length = data.quotation_equipment.length;
        $(".detail_repeater tr").each(function(i,v){
            if (i > 0) { $(v).remove(); }
        })
        $(data.quotation_equipment).each(function(key, value){
            if (key > 0) {
                $(".detail_repeater tr:first").find("i.fa-clone").click();
            }
        })
        
        $(data.quotation_equipment).each(function(key, value){
            var equip_size_type = $(`.equip_size_type`).get(key);
            $(equip_size_type).val(value.size_type).trigger('change');
            
            var equip_rate_group = $(`.equip_rate_group`).get(key);
            $(equip_rate_group).val(value.rate_group);
            
            var equip_qty = $(`.equip_qty`).get(key);
            $(equip_qty).val(value.qty);
            
            var equip_dg_type = $(`.equip_dg_type`).get(key);
            $(equip_dg_type).val(value.dg_type);
            
            var equip_gross = $(`.equip_gross`).get(key);
            $(equip_gross).val(value.gross);
            
            var equip_tue = $(`.equip_tue`).get(key);
            $(equip_tue).val(value.tue);
        
        // $(".equip_size_type").val(data.quotation_detail.size_type).trigger('change');
        // $(".equip_rate_group").val(data.quotation_detail.rate_group);
        // $(".equip_qty").val(data.quotation_detail.qty);
        // $(".equip_dg_type").val(data.quotation_detail.dg_type);
        // $(".equip_gross").val(data.quotation_detail.gross);
        // $(".equip_tue").val(data.quotation_detail.tue);
        
        })
    }
    
    enableJobButton(data.quotation.approval_status ? data.quotation.approval_status : null);
}

    $(".navigation").click(function () {
      let id = $("input[name=id]").val();
      let route = "/admin/quotation/get";
      let type = $(this).attr("data-type");
      let data = getList(route, type, id);
      if (data != null) {
        edit_row("", JSON.stringify(data));
      }
    });
    
    
    $("select[name=vessel]").change(function () {
        var id = $(this).val();
        $(".voyage").html(null);
        
        $.get("/admin/quotation/create", { fetch_vessel_voyages: id }, function (res) {
          $(".voyage").select2({
              data: res
            });
        })
    })
    
    
    function enableJobButton(status) {
        let date = $(".date").val();
        let port_discharge = $(".port_of_discharge").val();
        let final_destination = $(".final_destination").val();
        
        if(status == "Approved" && port_discharge && final_destination && date){
            $("#create_job").removeAttr("disabled");
            $("#statusImage").show();
        }
        else{
            $("#create_job").attr("disabled", true);
            $("#statusImage").hide();
        }
    }
    
    function quotationFormReset(route) {
        document.getElementById('myForm').reset();
        $("#myForm").attr('action', route);
        $("#myForm").find("select").val(null).trigger("change");
        enableJobButton('')
    }
    
    
    function getChargesCode(e)
    {
        let val = $(e).val();
        if(val){
            $.get("/admin/quotation/create", { fetch_charges_code: val }, function (res) {
              if(res){
                  $(e).parent().parent().find("select.charges").val(res.id).trigger('change');
              } else {
                  $(e).parent().parent().find("select.charges").val(null).trigger('change');
              }
            })
        }
    }
    
    
    function getChargesCurrency(e)
    {
        let val = $(e).val();
        if(val){
            $.get("/admin/quotation/create", { fetch_charges_currency: val }, function (res) {
              if(res){
                  $(e).parent().parent().find("select.detail_currency").val(res.currency).trigger('change');
                  $(e).parent().parent().find(".units option").attr("selected", false);
                  if(res.calculation_type == "Per-Unit"){
                      $(e).parent().parent().find(".units option[value=Unit]").attr("selected", true);
                  }
                  else if(res.calculation_type == "Per-Shipment"){
                      $(e).parent().parent().find(".units option[value=Ship]").attr("selected", true);
                  }
              } else {
                  $(e).parent().parent().find("select.detail_currency").val(null).trigger('change');
              }
            })
        }
    }
    
    function modeChange(e)
    {
        let val = $(e).val();
        if(val == "Received From Client"){
            $(e).parent().parent().find(".buying_rate").hide();
            $(e).parent().parent().find(".remarks").hide();
            $(e).parent().parent().find(".payable_to").hide();
            $(e).parent().parent().find(".buying_remarks").hide();
            $(e).parent().parent().find(".ord").hide();
            $(e).parent().parent().find(".tariff_code").hide();
        }
        else {
            $(e).parent().parent().find(".buying_rate").show();
            $(e).parent().parent().find(".remarks").show();
            $(e).parent().parent().find(".payable_to").show();
            $(e).parent().parent().find(".buying_remarks").show();
            $(e).parent().parent().find(".ord").show();
            $(e).parent().parent().find(".tariff_code").show();
        }
    }
    
    function approvalStatusChange(status)
    {
        let id = $("input[name=id]").val();
        if(id > 0)
        {
            $("select[name=approval_status]").find(`option`).attr("selected", false);
            $("select[name=approval_status]").attr("disabled", false);
            $("select[name=approval_status]").find(`option[value=${status}]`).attr("selected", true);
            $('#myForm').submit();
        }
    }
    
</script>
@endpush
