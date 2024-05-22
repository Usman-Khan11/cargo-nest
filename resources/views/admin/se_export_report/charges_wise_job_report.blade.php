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
                    <div class="col-md-3">
                        <div class="mb-2 mt-4">
                            <label class="form-check-label">
                                <input type="checkbox" name="settle_multiple_cc_invoice" value="All Data type:"
                                    class="form-check-input">
                                &nbsp;All Data type:
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2 mt-4">
                            <select name="Jobs" id="" class="form-select">
                                <option value="">Job Date</option>
                                <option value="">Job Date</option>
                                <option value="">Job Date</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2 mt-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-check-label ">
                                        Date From:
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="date" class="form-date form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2 mt-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-check-label ">
                                        Date Till:
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="date" class="form-date form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="sec2" style="background-color: #C1DEFF; border: 3px solid black;">
                <br>

                <div class="row">
                    <div class="col-md-2">Report: </div>
                    <div class="col-md-10">
                        <select name="" class="form-select" id="">
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-2">Company: </div>
                    <div class="col-md-10">
                        <select name="" class="form-select" id="">
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Job #:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="Job">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Minifest #:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="minifast">
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Vessel :</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="vessel">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Voyage :</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="voyage">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Flight #:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="flight">
                            </div>
                        </div>
                    </div>

                </div><br>
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Charges :</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="charger">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Client :</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="client">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2">
                        <label for="">shoping/Air Line :</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="shoping/Airline">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Vender :</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="Vender">
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-2">
                        <label for="">cost center :</label>
                    </div>
                    <div class="col-md-10">
                        <select name="" class="form-select" id="">
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Sales Rep :</label>
                    </div>
                    <div class="col-md-10">
                        <select name="" class="form-select" id="">
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Final Destination :</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="Finaldestination">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Overseas Agent :</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="Overseas-Agent">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Consignee :</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="consignee">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Principal :</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="Principal">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Job Type :</label>
                            </div>
                            <div class="col-md-6">
                                <select name="" class="form-select" id="">
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Sub Type :</label>
                            </div>
                            <div class="col-md-6">
                                <select name="" class="form-select" id="">
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">
                                    Shipment Status
                                </label>
                            </div>
                            <div class="col-md-6">
                                <select name="" class="form-select" id="">
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->

                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">logistic Job Type :</label>
                            </div>
                            <div class="col-md-6">
                                <select name="" class="form-select" id="">
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">
                                    File #:
                                </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="file">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sec3">
                <div class="row">
                    <div class="col-md-2">
                        <input type="checkbox" name="" value="" style="padding: 15px;"><span> &nbsp; All Job Types
                        </span><br>
                        <div class="sec01" style="border: 3px solid black ; background-color: #C1DEFF;padding: 15px;">
                            <input type="checkbox" name="Sea-Experts" value="Sea-Experts"><span> &nbsp; Sea Experts
                            </span><br>
                            <input type="checkbox" name="Air-Exports" value="Air-Exports"><span> &nbsp; Air Exports
                            </span><br>
                            <input type="checkbox" name="Sea-Imports" value="Sea-Imports"><span> &nbsp; Sea Imports
                            </span><br>
                            <input type="checkbox" name="Air-Imports" value="Air-Imports"><span> &nbsp; Air Imports
                            </span><br>
                            <input type="checkbox" name="Logistics" value="Logistics"><span> &nbsp; Logistics
                            </span><br>
                            <input type="checkbox" name="Ware-House" value="Ware-House"><span> &nbsp; Ware
                                House</span><br>
                            <input type="checkbox" name="Other" value="Other"><span> &nbsp; Other </span><br>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <span style="padding: 15px;"> &nbsp; Sort By </span><br>
                        <div class="sec01" style="border: 3px solid black ; background-color: #C1DEFF;padding: 15px;">
                            <input type="checkbox" name="job-number" value="Job-number"><span> &nbsp; Job Number
                            </span><br>
                            <input type="checkbox" name="invoice-data" value="invoice-data"><span> &nbsp; Invoice Data
                            </span><br>
                            <input type="checkbox" name="HBL/HAWB" value="HBL/HAWB"><span> &nbsp;HBL / HAWB </span><br>
                            <input type="checkbox" name="MBL/MAWB" value="MBL/MAWB"><span> &nbsp; MBL / MAWB </span><br>
                            <input type="checkbox" name="Client" value="Client"><span> &nbsp; Client </span><br>
                            <input type="checkbox" name="final-destination" value="final-destination"><span> &nbsp;
                                Final Destination</span><br>
                            <input type="checkbox" name="" value=""><span> &nbsp; </span><br>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <span style="padding: 15px;"> &nbsp; Job Status
                        </span><br>
                        <div class="sec01" style="border: 3px solid black ; background-color: #C1DEFF;padding: 15px;">
                            <input type="checkbox" name="Open" value="Open"><span> &nbsp; Open </span><br>
                            <input type="checkbox" name="Close" value="Close"><span> &nbsp; Close </span><br>
                            <input type="checkbox" name="Cancelled" value="Cancelled"><span> &nbsp; Cancelled
                            </span><br>
                        </div>
                        <input type="checkbox" name="show-filter" value="show-filter"><span> &nbsp; Show Filter
                        </span><br>
                        <input type="checkbox" name="Transhipment-Cargo" value="Transhipment-Cargo"><span> &nbsp;
                            Transhipment Cargo </span><br>

                    </div>
                    <div class="col-md-2">
                        <span style="padding: 15px;"> &nbsp; Group By</span><br>
                        <div class="sec01" style="border: 3px solid black ; background-color: #C1DEFF;padding: 15px;">
                            <input type="checkbox" name="none" value="none"><span> &nbsp; None </span><br>
                            <input type="checkbox" name="Final-Destination" value="Final-Destination"><span> &nbsp;
                                Final Destination </span><br>
                            <input type="checkbox" name="sales-rep" value="sales-rep"><span> &nbsp; Sales Rep
                            </span><br>
                            <input type="checkbox" name="Job-No" value="Job-No"><span> &nbsp; Job No </span><br>
                            <input type="checkbox" name="Client" value="Client"><span> &nbsp;Client</span><br>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row mb-2 mt-4">
                            <div class="col-md-4 ">
                                <label for="">Report Type :</label>
                            </div>
                            <div class="col-md-8">
                                <select name="" class="form-control" id="">
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Report Type :</label>
                            </div>
                            <div class="col-md-8">
                                <select name="" class="form-control" id="">
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="sec4" style="border: 3px solid black;margin: 5px;">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="radio" name="realized" id="">
                                <label for="">Realized</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="Unrealized" id="">
                                <label for="">UnRealized</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="Both" id="">
                                <label for="">Both</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <input type="checkbox" name="exclusive" id="">
                        <label for="">Exclusive Zero</label>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
            <div class="row">

                <div class="col-md-4">
                    <div class="sec4" style="border: 3px solid black ; margin: 5px;">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="radio" name="All" id="">
                                <label for="">All</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="Approved" id="">
                                <label for="">Approved</label>
                            </div>

                            <div class="col-md-4">
                                <input type="checkbox" name="unapproved" id="">
                                <label for="">Un Approved</label>
                            </div>
                        </div>
                        <!-- </div> -->
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









