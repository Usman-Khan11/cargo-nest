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
                            <div class="col-lg-12">
                                <div class="row form-border">
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label>Data Type :</label>
                                            <input type="date" name="" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label>Data Form :</label>
                                            <input type="date" name="" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <label>Data Till :</label>
                                            <input type="date" name="" id="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                              
                           
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Company:</label>
                                    <select class="form-select">
                                        
                                        
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Client :</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Shoping/ Air Line :</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Vendor:</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Cost Center</label>
                                    <select class="form-select">
                                        
                                        
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Sales Rap</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Final Destination :</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Consignee:</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Containers:</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Vessel :</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Principal :</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>clearing Agent :</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Terminal:</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Shipper</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>C.BKD/ED :</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Deliver Agent :</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Forword/Col:</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Job Type</label>
                                    <select class="form-select">
                                        
                                        
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Voyage:</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Flight # :</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Shippment Status:</label>
                                    <select class="form-select">
                                        
                                        
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>File # :</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Sub Type:</label>
                                    <select class="form-select">
                                        
                                        
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Packages :</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Manifest # :</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>HBL # :</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>Inco Terms # :</label>
                                    <select class="form-select">
                                        
                                        
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>MBL # :</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>POL Country</label>
                                    <select class="form-select">
                                        
                                        
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>LG j/Typ</label>
                                    <select class="form-select">
                                        
                                        
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label>PODF Country:</label>
                                    <select class="form-select">
                                        
                                        
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label>Nomination:</label>
                                    <select class="form-select">
                                        
                                        
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label>Add By</label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>       
                        </div>
                    
                        <div class="form-heading">
                            <div class="row">
                                <div class="col">
                                    <div class="job">
                                        <label>All Job Types</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="job">
                                        <label>Short By</label>
                                    </div>
                                </div>
                    
                                <div class="col">
                                    <div class="job">
                                        <label>Group By</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="job">
                                        <label>Job Status</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="job">
                                        <label>Lock/Unlock</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-main">
                            <div class="row">
                                <div class="col">
                                    <div class="form-item">
                                        <div class="mb-3">
                                            <div>
                                                <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Sea Exports</span>
                                            </div>
                                            <div>
                                                <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Air Exports</span>
                                            </div>
                                            <div>
                                                <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Sea Exports</span>
                                            </div>
                                            <div>
                                                <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Air Imports</span>
                                            </div>
                                            <div>
                                                <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Logistics</span>
                                            </div>
                                            <div>
                                                <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Ware House</span>
                                            </div>
                                        </div>
                                    </div>
                    
                                </div>
                                <div class="col">
                                    <div class="form-item">
                                        <div class="mb-3">
                                            <div>
                                                <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Job Number</span>
                                            </div>
                                            <div>
                                                <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Job Date</span>
                                            </div>
                                            <div>
                                                <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;HBL/HAWAB</span>
                                            </div>
                                            <div>
                                                <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;MBL/MAWB</span>
                                            </div>
                                            <div>
                                                <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Client</span>
                                            </div>
                                            <div>
                                                <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Final Destination</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="col">
                                    <div class="form-em">
                                        <div class="mb-3">
                                            
                                            <div>
                                                <input name="manual" type="radio" class="form-check-input" class="form-check-input" /><span>&nbsp;&nbsp;None</span>
                                            </div>
                                            <div>
                                                <input name="manual" type="radio" class="form-check-input" /><span>&nbsp;&nbsp;Client</span>
                                            </div>
                                            <div>
                                                <input name="manual" type="radio" class="form-check-input" /><span>&nbsp;&nbsp;Air/Shipping Line</span>
                                            </div>
                                            <div>
                                                <input name="manual" type="radio" class="form-check-input" /><span>&nbsp;&nbsp;Local Agent</span>
                                            </div>
                                            <div>
                                                <input name="manual" type="radio" class="form-check-input" /><span>&nbsp;&nbsp;Vessel</span>
                                            </div>
                                            <div>
                                                <input name="manual" type="radio" class="form-check-input" /><span>&nbsp;&nbsp;Sales Rep</span>
                                            </div>
                                            <div>
                                                <input name="manual" type="radio" class="form-check-input" /><span>&nbsp;&nbsp;commodity</span>
                                            </div>
                                            <div>
                                                <input name="manual" type="radio" class="form-check-input" /><span>&nbsp;&nbsp;Job Status</span>
                                            </div>
                                        </div>
                                    </div>
                    
                                </div>
                                <div class="col">
                                    <div class="form-item">
                                        <div class="mb-3">
                                            <div>
                                                <input name="manual" type="checkbox" class="form-check-input" class="form-check-input" /><span>&nbsp;&nbsp;Open</span>
                                            </div>
                                            <div>
                                                <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Close</span>
                                            </div>
                                            <div>
                                                <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Canceled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-item">
                                        <div class="mb-3">
                                            <div>
                                                <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Unlock</span>
                                            </div>
                                            <div>
                                                <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Lock</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3 d-flex">
                                    <div>
                                        <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;All</span>
                                    </div>
                                    <div>
                                        <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;DG</span>
                                    </div>
                                    <div>
                                        <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;NonDG</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 d-flex">
                                    <div>
                                        <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;All</span>
                                    </div>
                                    <div>
                                        <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Consolidated</span>
                                    </div>
                                    <div>
                                        <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Non Consolidated</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                                <div class="mb-3 d-flex">
                                <div class="col-lg-6">
                                <div>
                                        <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;All</span>
                                    </div>
                                    <div>
                                        <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Approved</span>
                                    </div>
                                    <div>
                                        <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Un approved</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 d-flex">
                                    <div>
                                        <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;All</span>
                                    </div>
                                    <div>
                                        <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;manifasted</span>
                                    </div>
                                    <div>
                                        <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Un manifasted</span>
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









