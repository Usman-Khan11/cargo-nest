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
<div class="col-md-5">
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
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('admin.manifest.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bold">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">Shipping Info</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">Container</button>
                                </li>
                            </ul>
                            
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <label>Template name :</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>Secuidy Doc # :</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>C.Booking # :</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>Source :</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>Tran # :</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Job No :</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <label>Cost Center :</label>
                                                <select class="form-select">
                                                    <option>Head Office</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label>Shipper</label>
                                                <textarea class="form-control" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label>Consignee</label>
                                                <textarea class="form-control" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label>Notify Party (1) :</label>
                                                <textarea class="form-control" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label>Notify Party (2) :</label>
                                                <textarea class="form-control" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Port Of Loading :</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Delivery Agent :</label>
                                                <textarea class="form-control">
                                                    
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Port Of Recepit :</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Port Of Discharge:</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Place Of Delivery :</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Feight Type</label>
                                                <select class="form-select">
                                                    <option>Prepaid</option>
                                                    <option>Collect</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>Unit :</label>
                                                <select class="form-select">
                                                    <option>LBS</option>
                                                    <option>KG</option>
                                                    <option>MTON</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>No Of Original B/L s :</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>No Of NNBL :</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>DDC:</label>
                                                <select class="form-select">
                                                    <option>Prepaid</option>
                                                    <option>Collect</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>Hs Code:</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>Agent Stamp:</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>Gross WT:</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>Net WT :</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>NBM :</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>Packages :</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-2">
                                                <label>Packages Code :</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Marks No Container No s:</label>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>No Of Pckqs Or Shipping Units:</label>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Description Of Goods and PKgs:</label>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Gross Weight:</label>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Measurement:</label>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>On Board Date :</label>
                                                <input type="date" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Form E:</label>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label>Date:</label>
                                                <input type="date" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                                    <div class="card-datatable table-responsive pt-0">
                                                <table class="datatables-basic table" style="width: 180%;">
                                                    <thead>
                                                      <tr>
                                                        <th>...</th>
                                                        <th>S.No</th>
                                                        <th>Container</th>
                                                        <th>Seal #</th>
                                                        <th>Size Type</th>
                                                        <th>Rate Group</th>
                                                        <th>Gross Wt</th>
                                                        <th>Net wt</th>
                                                        <th>CBM</th>
                                                        <th>Packages</th>
                                                        <th>Unit</th>
                                                        <th>Temperature</th>
                                                        <th>Remarks</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                        <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                        <td><input type="text" style="width: 100%;"/></td>
                                                        <td><input type="text" style="width: 100%;"/></td>
                                                        <td><input type="text" style="width: 100%;"/></td>
                                                        <td><input type="text" style="width: 100%;"/></td>
                                                        <td><input type="text" style="width: 100%;"/></td>
                                                        <td><input type="text" style="width: 100%;"/></td>
                                                        <td><input type="text" style="width: 100%;"/></td>
                                                        <td><input type="text" style="width: 100%;"/></td>
                                                        <td><input type="text" style="width: 100%;"/></td>
                                                        <td><input type="text" style="width: 100%;"/></td>
                                                        <td><input type="text" style="width: 100%;"/></td>
                                                        <td><input type="text" style="width: 100%;"/></td>

                                                        
                                                       
                                                       
                                                    </tbody>
                                                </table>
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
