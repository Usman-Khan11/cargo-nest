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
        <div class="card">
            <div class="card-body">
                
                <div class="row">
            <div class="col-md-6">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label  for="cost" class="form-label">Report Type </label>
                        <select name="Report Type" id="" class="form-control">
                            <option value="Job Pnt">Job Pnt</option>
                        </select>
                    </div>
                </div>
                
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label for="cost" class="form-label">Date Type:</label>
                                    <select name="Loading List" id="cars" step="0.01" class="form-control">
                                        <option value="Loading List">Job Date</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label for="cost" class="form-label">Date From:</label>
                                    <input id="cost" name="Date From" type="date" step="0.01" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label for="cost" class="form-label">Date Till:</label>
                                    <input id="cost" name="Date Till" type="date" step="0.01" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    
               
        
                        <div class="row" >
                            <div class="col-md-3">
                                <input type="checkbox" class="form-check-input" id="job-type">
                                <label for="job-type" style="font-weight: 600;">All Job Types</label>
                                <div class="row" style="border: 1px solid #111;">
                                  
                                    <div class="col-md-12 col-12">
                                    
                                        <div class=" mt-4">
                                            <div class="mb-3">
                                                <label class="form-label"></label>
                                                <input name="tax[]" type="checkbox" class="form-check-input" value="Sea Exports"
                                                    style="width:16px; height:16px;" /><span>&nbsp;&nbsp;Sea Exports</span>
                                            </div>
                                            <div class="mb-3 ">
                                                <label class="form-label"></label>
                                                <input name="tax[]" type="checkbox" class="form-check-input" value="Air Exports"
                                                    style="width:16px; height:16px;" /><span>&nbsp;&nbsp;Air Exports</span>
                                            </div>
                                            <div class="mb-3 ">
                                                <label class="form-label"></label>
                                                <input name="tax[]" type="checkbox" class="form-check-input" value="Sea Imports"
                                                    style="width:16px; height:16px;" /><span>&nbsp;&nbsp;Sea Imports</span>
                                            </div>
                                            <div class="mb-3 ">
                                                <label class="form-label"></label>
                                                <input name="tax[]" type="checkbox" class="form-check-input" value="Air Imports"
                                                    style="width:16px; height:16px;" /><span>&nbsp;&nbsp;Air Imports</span>
                                            </div>
                                            <div class="mb-3 ">
                                                <label class="form-label"></label>
                                                <input name="tax[]" type="checkbox" class="form-check-input" value="Logistics"
                                                    style="width:16px; height:16px;" /><span>&nbsp;&nbsp;Logistics</span>
                                            </div>
                                            <div class="mb-3 ">
                                                <label class="form-label"></label>
                                                <input name="tax[]" type="checkbox" class="form-check-input" value="Ware House"
                                                    style="width:16px; height:16px;" /><span>&nbsp;&nbsp;Ware House</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p style="font-weight: 600;">Sort By</p>
                                <div class="row" style="border: 1px solid #111;">
                                    <div class="col-md-12 col-12">
                                        <div class="">
                                            <div class="mb-2">
                                                <input name="calculation_type" type="radio" class="form-check-input"
                                                    class="form-check-input calculation_type" value="Job Number"
                                                    id="defaultRadio1" />
                                                <label class="form-check-label" for="defaultRadio1">Job Number</label>
                                            </div>
                                            <div class="mb-2 ">
                                                <input name="calculation_type" type="radio" class="form-check-input"
                                                    class="form-check-input calculation_type" value="Date" id="defaultRadio2" />
                                                <label class="form-check-label" for="defaultRadio2">Date</label>
                                            </div>
                                            <div class="mb-2 ">
                                                <input name="calculation_type" type="radio" class="form-check-input"
                                                    class="form-check-input calculation_type" value="HBL / HAWB"
                                                    id="defaultRadio3" />
                                                <label class="form-check-label" for="defaultRadio3">HBL / HAWB</label>
                                            </div>
                                            <div class="mb-2 ">
                                                <input name="calculation_type" type="radio" class="form-check-input"
                                                    class="form-check-input calculation_type" value="MBL / MAWB"
                                                    id="defaultRadio4" />
                                                <label class="form-check-label" for="defaultRadio4">MBL / MAWB</label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class="mt-4">
                                    <div>
                                        <input name="manual" type="checkbox" class="form-check-input" /><b> <span>&nbsp;&nbsp;Exclude Tax Charges</span></b>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p style="font-weight: 600;">Group by</p>
                                <div style="border: 1px solid #111; margin: 2px auto;">
                                    <select name="" id="" class="form-control">
                                        <option value="">None</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p style="font-weight: 600;">Job Status</p>
                            
                                <div class="col-md-12 col-12" style="border: 1px solid #111;">
                                    <div class="mt-4">
                                        <div class="mb-3">
                                            <label class="form-label"></label>
                                            <input name="tax[]" type="checkbox" class="form-check-input" value="Open"
                                                style="width:16px; height:16px;" /><span>&nbsp;&nbsp;Open</span>
                                        </div>
                                        <div class="mb-3 ">
                                            <label class="form-label"></label>
                                            <input name="tax[]" type="checkbox" class="form-check-input" value="Close"
                                                style="width:16px; height:16px;" /><span>&nbsp;&nbsp;Close</span>
                                        </div>
                                        <div class="mb-3 ">
                                            <label class="form-label"></label>
                                            <input name="tax[]" type="checkbox" class="form-check-input" value="Cancelled"
                                                style="width:16px; height:16px;" /><span>&nbsp;&nbsp;Cancelled</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  <div class="row">
                    <div class="col-md-6" >
                        <div class="mb-2" style="border: 1px solid black; padding: 10px 20px; margin: 10px 0;">
                            <input type="radio" class="form-check-input" class="form-check-input" id="All" name="fav_language" value="HTML">
                            <label for="All">All</label>
                            <input type="radio" class="form-check-input" id="Open" name="fav_language" value="CSS">
                            <label for="Open">Manifested</label>
                            <input type="radio" class="form-check-input" id="Cancel" name="fav_language" value="JavaScript">
                            <label for="Cancel">Non Manifested</label>
                        </div>
                        <div class="mb-2" style="border: 1px solid black; padding: 10px 20px; margin: 10px 0;">
                            <input type="radio" class="form-check-input" id="All" name="fav_language" value="HTML">
                            <label for="All">All</label>
                            <input type="radio" class="form-check-input" id="Open" name="fav_language" value="CSS">
                            <label for="Open">Consilidated</label><br>
                            <input type="radio" class="form-check-input" id="Cancel" name="fav_language" value="JavaScript">
                            <label for="Cancel">NonConsilidated</label>
                        </div>
                        
            </div>
                    <div class="col-md-6">
                        <div class="mt-4">
                            <div>
                                <input name="manual" type="checkbox" class="form-check-input" class="form-check-input" /><b> <span>&nbsp;&nbsp;Exclude Mty</span></b>
                            </div>
                            <div>
                                <input name="manual" type="checkbox" class="form-check-input" /><b> <span>&nbsp;&nbsp;Exclude Zero</span></b>
                            </div>
                            <div>
                                <input name="manual" type="checkbox" class="form-check-input" /><b> <span>&nbsp;&nbsp;Exclude Detention</span></b>
                            </div>
                            <div>
                                <input name="manual" type="checkbox" class="form-check-input" /><b> <span>&nbsp;&nbsp;Exclude ExRt G/L</span></b>
                            </div>
                            <div>
                                <input name="manual" type="checkbox" class="form-check-input" /><b> <span>&nbsp;&nbsp;Transshipment Cargo</span></b>
                            </div>
                        </div>
                    </div>
                  </div>
           <div class="row">
            <div class="col-md-6">
                <div class="case-main" style="border: 1px solid black; padding: 10px 20px; margin: 10px 0;">
                    <span>In CAse Of Cansole</span>
                    <div class="mb-2" >
                       
                        <label for="All">Show:</label>
                        <input type="radio" class="form-check-input" id="Open" name="fav_language" value="CSS">
                        <label for="Open">Parent</label>
                        <input type="radio" class="form-check-input" id="Cancel" name="fav_language" value="JavaScript">
                        <label for="Cancel">Child</label>
                    </div>
                
                <div class="mb-2">
                    <label for="cost" class="form-label"> Parent Shering Fcl:</label>
                    <select name="Type" id="cars" step="0.01" class="form-control">
                        <option value="CargoNotRecived"></option>
                    </select>

                </div>
                <div class="mb-2">
                    <label for="cost" class="form-label"> Parent Shering Fcl:</label>
                    <select name="Type" id="cars" step="0.01" class="form-control">
                        <option value="CargoNotRecived"></option>
                    </select>

                </div>
            </div>
            </div>
            <div class="col-md-6">
                <label>FH Nominated</label>
                <div class="fh-main" style="border: 1px solid black; padding:10px;">
                <div class="mb-2">
                <select name="Type" id="cars" step="0.01" class="form-control">
                    <option value="CargoNotRecived"></option>
                </select>
            </div>
                <select name="Type" id="cars" step="0.01" class="form-control">
                    <option value="CargoNotRecived"></option>
                </select>
            </div>
            <div class="mt-4">
                <div>
                    <input name="manual" type="checkbox" class="form-check-input" /><b> <span>&nbsp;&nbsp;Show Filter</span></b>
                </div>
                <div>
                    <input name="manual" type="checkbox" class="form-check-input" /><b> <span>&nbsp;&nbsp;Group Of Campany</span></b>
                </div>
                <div>
                    <input name="manual" type="checkbox" class="form-check-input" /><b> <span>&nbsp;&nbsp; Extended</span></b>
                </div>
               
            </div>
            </div>
           </div>
           <div class="row">
            <div class="col-md-6">
                <div class="mb-2">
                    <label for="cost" class="form-label"> Process Status:</label>
                    <select name="Process Status" id="cars" step="0.01" class="form-control">
                        <option value="Process Status"></option>
                    </select>

                </div>
            </div>
           </div>
           <div class="row" >
            <div class="col-md-6"style="border: 1px solid black; padding: 10px 20px; margin: 10px 0;">
                    <div class="mb-2 mt-3">
                        <label class="form-check-label mb-2">
                            <input type="checkbox" class="form-check-input" name="auto_round_off" value="auto_round_off" class="form-check-input">
                            Direct
                        </label>
                        <label class="form-check-label mx-3 mb-2">
                            <input type="checkbox" class="form-check-input" name="continue_mode" value="continue_mode" class="form-check-input">
                            Coloaded
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="show_terminal" value="show_terminal" class="form-check-input">
                           Cross Trade
                        </label>
                        <label class="form-check-label mx-3">
                            <input type="checkbox" class="form-check-input" name="rebate" value="rebate" class="form-check-input">
                            Liner Agency
                        </label>
                        
                    </div>
                
            </div>
            <div class="col-md-6">
                <div class="mb-2">
                    <label for="cost" class="form-label">Print On:</label>
                    <select name="Viewer" id="cars" step="0.01" class="form-control">
                        <option value="Viewer">Viewer</option>
                    </select>
                </div>
            </div>
           </div>
           <div class="row">
            <div class="col-md-6" style="border: 1px solid black; padding: 10px 20px; margin: 10px 0;">
                <div class="mb-2">
                    <input type="radio" class="form-check-input" id="All" name="fav_language" value="HTML">
                    <label for="All">All</label>
                    <input type="radio" class="form-check-input" id="Open" name="fav_language" value="CSS">
                    <label for="Open">Profit</label>
                    <input type="radio" class="form-check-input" id="Cancel" name="fav_language" value="JavaScript">
                    <label for="Cancel">Lose</label>
                    <input type="radio" class="form-check-input" id="Cancel" name="fav_language" value="JavaScript">
                    <label for="Cancel">No PL</label>
                </div>
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary btn-sm">Subscription</button>
                <button class="btn btn-primary btn-sm">Snapshot</button>
            </div>
           </div>
            
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-2">
                        <label>Company:</label>
                        <select class="form-select">
                            <option></option>
                            <option></option>
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-2">
                        <label>Job/ Console # :</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-2">
                        <label>ManiFest:</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Vessel:</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Client</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Shipping / Air line</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Cost Center :</label>
                        <select class="form-select">
                            <option></option>
                            <option></option>
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Voyage:</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Containers:</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Sales Rep:</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Final Dest/Load Port :</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Overseas Agent :</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Principle:</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Buyer</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Buying House:</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Containers :</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Clearing Agent:</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Commodity</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>CarrierBooking #:</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Referred By # :</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Lg J/Typ:</label>
                        <select class="form-select">
                            <option></option>
                            <option></option>
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Sub Types :</label>
                        <select class="form-select">
                            <option></option>
                            <option></option>
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>File #:</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Shippment Status :</label>
                        <select class="form-select">
                            <option></option>
                            <option></option>
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Freight Type:</label>
                        <select class="form-select">
                            <option></option>
                            <option></option>
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <div>
                            <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;All Network :</span>
                        </div>
                        <select class="form-select">
                            <option></option>
                            <option></option>
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>POL Country :</label>
                        <select class="form-select">
                            <option></option>
                            <option></option>
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label>Project Name :</label>
                        <input type="text" name="" id="" class="form-control">
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
  
     
</script>

@endpush









