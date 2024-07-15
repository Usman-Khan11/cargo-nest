@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/container_activity/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/container_activity/delete')">
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
            <i class="fa fa-forward-step" title="Back"></i>
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
        <form id="myForm" method="post" action="{{ route('admin.container_activity.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0" />
                            <div class="row">
                                <div class="col-md-9">
                                 <div class="row">
                                    <div class="col-md-5">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Container:</label>
                                           <input id="cost" name="Container" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label for="" class="form-label">size/Type :</label>
                                           <select name="Loading List" id="cars" step="0.01" class="form-control">
                                            
                                            <option value="Sort"></option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Port:</label>
                                           <input id="cost" name="Port" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    
                                    <div class="col-md-5">
                                        <div class="mb-2">
                                            <label for="" class="form-label">Activity :</label>
                                           <select name="Loading List" id="cars" step="0.01" class="form-control">
                                            
                                            <option value="Sort"></option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Activity Date:</label>
                                           <input id="cost" name="Activity Date" type="date" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Careesponding Port:</label>
                                           <input id="cost" name="Careesponding Port" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                            <label for="" class="form-label">Container status :</label>
                                           <select name="Loading List" id="cars" step="0.01" class="form-control">
                                            
                                            <option value="Sort"></option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label for="" class="form-label">Cargo status:</label>
                                           <select name="Loading List" id="cars" step="0.01" class="form-control">
                                            
                                            <option value="Sort"></option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2" style="margin-top: 35px;">
                                            <label class="form-check-label mb-2">
                                                <input type="checkbox" name="Sales Rep" value="Soc" class="form-check-input">
                                                Is Opening
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">location:</label>
                                           <input id="cost" name="location" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-7">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Remarks:</label>
                                           <input id="cost" name="Remarks" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-5" style="margin-top: 30px;">
                                        <div class="btn">
                                            <button class="btn btn-primary btn-sm">Download Template</button>
                                        </div>
                                        <div class="btn">
                                            <button class="btn btn-primary btn-sm">Load List</button>
                                        </div>
                                    </div>
                                 </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2" style="border: 1px solid black;">
                                        <label >Upload Activity</label><br>
                                        <label >Direct Excel</label><br>
                                        <label >Copy Excel Data</label><br>
                                        <label >Discharge List</label><br>
                                    </div>
                                    <div class="btn">
                                        <button class="btn btn-primary btn-sm">Advance search</button>
                                    </div>
                                    <div class="btn">
                                        <button class="btn btn-primary btn-sm">Codeco</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h5>Activity Cycle</h5>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Principle:</label>
                                       <input id="cost" name="Principle" type="text" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Add By:</label>
                                       <input id="cost" name="Add By" type="text" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Add On:</label>
                                       <input id="cost" name="Add On" type="text" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Add Log:</label>
                                       <input id="cost" name="Add Log" type="text" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <label for="" class="form-label">Current staGE:</label>
                                       <select name="Loading List" id="cars" step="0.01" class="form-control">
                                        
                                        <option value="Sort"></option>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-2" style="margin-top: 35px;">
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Sales Rep" value="Soc" class="form-check-input">
                                        iS SoC
                                    </label>
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="Sales Rep" value="Soc" class="form-check-input">
                                        iN Active
                                    </label>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Edit By:</label>
                                       <input id="cost" name="Edit By" type="text" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Edit On:</label>
                                       <input id="cost" name="Edit By" type="text" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Edit Log:</label>
                                       <input id="cost" name="Edit Log" type="text" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-2">
                                        <label for="" class="form-label">Current Activity:</label>
                                       <select name="Loading List" id="cars" step="0.01" class="form-control">
                                        <option value="Sort"></option>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Date:</label>
                                       <input id="cost" name="Date" type="date" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h5>Import Detail</h5>
                                <div class="col-md-6">
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Job No:</label>
                                           <input id="cost" name="Job No" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">HBL No:</label>
                                           <input id="cost" name="HBL No" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                            <label for="" class="form-label">Vessel:</label>
                                           <select name="Loading List" id="cars" step="0.01" class="form-control">
                                            
                                            <option value="Sort"></option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Voyage:</label>
                                           <input id="cost" name="Voyage" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">CB.KG/ED:</label>
                                           <input id="cost" name="Job No" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Port Of Loading:</label>
                                           <input id="cost" name="Port Of Loading" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Port Of Transhipment</label>
                                           <input id="cost" name="Port Of Transhipment" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Port Of Discharge:</label>
                                           <input id="cost" name="Port Of Discharge" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Port Of Finel Dest:</label>
                                           <input id="cost" name="Port Of Finel Dest" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Free Days Detention:</label>
                                           <input id="cost" name="Free Days Detention" type="number" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Free Days Demurrage:</label>
                                           <input id="cost" name="Free Days Demurrage" type="number" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Free Days Plugin:</label>
                                           <input id="cost" name="Free Days Plugin" type="number" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">MBL No:</label>
                                               <input id="cost" name="MBL No" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Import start Date:</label>
                                               <input id="cost" name="Import start Date" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Arrivel Date:</label>
                                               <input id="cost" name="Arrivel Date" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Import End Date:</label>
                                               <input id="cost" name="Import End Date" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <label for="" class="form-label">Delivery Type:</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                
                                                <option value="Sort"></option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <label for="" class="form-label">Cargo Type:</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                
                                                <option value="Sort"></option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">shipper:</label>
                                               <input id="cost" name="shipper" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Consignee:</label>
                                               <input id="cost" name="Consignee" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Carrier:</label>
                                               <input id="cost" name="Carrier" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Clearing Agent:</label>
                                               <input id="cost" name="Clearing Agent" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Transporter:</label>
                                               <input id="cost" name="Transporter" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">DO Issue Date:</label>
                                               <input id="cost" name="DO Issue Date" type="date" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h5>store/Maintenance And Repair</h5>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Activity start Date:</label>
                                       <input id="cost" name="Activity start Date" type="date" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Activity End Date:</label>
                                       <input id="cost" name="Activity End Date" type="date" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h5>Export Detail</h5>
                                <div class="col-md-6">
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Job No:</label>
                                           <input id="cost" name="Job No" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">HBL No:</label>
                                           <input id="cost" name="HBL No" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                            <label for="" class="form-label">Vessel:</label>
                                           <select name="Loading List" id="cars" step="0.01" class="form-control">
                                            
                                            <option value="Sort"></option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Voyage:</label>
                                           <input id="cost" name="Voyage" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">CB.KG/ED:</label>
                                           <input id="cost" name="Job No" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Port Of Loading:</label>
                                           <input id="cost" name="Port Of Loading" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Port Of Transhipment</label>
                                           <input id="cost" name="Port Of Transhipment" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Port Of Discharge:</label>
                                           <input id="cost" name="Port Of Discharge" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Port Of Finel Dest:</label>
                                           <input id="cost" name="Port Of Finel Dest" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Free Days Detention:</label>
                                           <input id="cost" name="Free Days Detention" type="number" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Free Days Demurrage:</label>
                                           <input id="cost" name="Free Days Demurrage" type="number" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Free Days Plugin:</label>
                                           <input id="cost" name="Free Days Plugin" type="number" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">MBL No:</label>
                                               <input id="cost" name="MBL No" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Export start Date:</label>
                                               <input id="cost" name="Export start Date" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">sailing Date:</label>
                                               <input id="cost" name="sailing Date" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Export End Date:</label>
                                               <input id="cost" name="Export End Date" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <label for="" class="form-label">Delivery Type:</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                
                                                <option value="Sort"></option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <label for="" class="form-label">Cargo Type:</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                
                                                <option value="Sort"></option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">shipper:</label>
                                               <input id="cost" name="shipper" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Consignee:</label>
                                               <input id="cost" name="Consignee" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Carrier:</label>
                                               <input id="cost" name="Carrier" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Clearing Agent:</label>
                                               <input id="cost" name="Clearing Agent" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Transporter:</label>
                                               <input id="cost" name="Transporter" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="responsive text-nowrap">
                                <table class="table table-bordered table-sm quotation_record"></table>
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
  
$(document).ready(function(){
        
    var datatable = $('.quotation_record').DataTable({
        select: {
            style: 'api'
        },
        "processing": true,
        "searching": false,
        "serverSide": true,
        "lengthChange": false,
        "pageLength": 10,
        "scrollX": true,
        "ajax": {
            "url": "{{ route('admin.container_activity.create') }}",
            "type": "get",
            "data": function(d) {},
        },
        columns: [
            {
                title: 'Vessel',
                "render": function(data, type, full, meta) {
                    if(full.vessel){
                        return full.vessel.vessel_name;
                    } else {
                        return '-';
                    }
                }
            },
            {
                data: 'voy',
                title: 'Voyage'
            },
            {
                data: 'port_of_discharge',
                title: 'Port of Dischage'
            },
            {
                data: 'port_of_loading',
                title: 'Port of Loading'
            },
            {
                data: 'type',
                title: 'Type'
            },
            
        ],          
         "rowCallback": function(row, data) {
             $(row).attr("onclick",`edit_row(this,'${JSON.stringify(data)}')`)
         }
    });
});

function addNewRow(e){
    $(e).parent().parent().clone().prependTo(".detail_repeater");
    $(".detail_repeater tr:last").find("input").val(null);
    $(".detail_repeater tr:last").find("option").removeAttr("selected");
}

function delRow(e){
    if($(".detail_repeater tr").length <= 1) return;
    $(e).parent().parent().remove();
}

function addlocalRow(e){
    $(e).parent().parent().clone().prependTo(".local_repeater");
    $(".local_repeater tr:last").find("input").val(null);
    $(".local_repeater tr:last select").find("option").attr("selected",false);
}

function dellocalRow(e){
    if($(".local_repeater tr").length <= 1) return;
    $(e).parent().parent().remove();
}

function edit_row(e,data){
    data = JSON.parse(data);
    if(data){
        $(".vessel").find(`option[value=${data.vessel.id}]`).attr('selected','selected');
        $(".voy").val(data.voy);
        $(".port_of_discharge").val(data.port_of_discharge);
        $(".port_of_loading").val(data.port_of_loading);
        $(".type").removeAttr('checked');
        $(`.type[value=${data.type}]`).attr('checked',true);
        $("#myForm").attr("action","{{ route('admin.container_activity.update') }}")
        $("input[name=id]").val(data.id);
    }
}

$(".navigation").click(function(){
    let id = $("input[name=id]").val();
    let route = '/admin/container_activity/get';
    let type = $(this).attr('data-type');
    let data = getList(route, type, id);
    if(data != null){
        edit_row('', JSON.stringify(data));
    }
})

</script>
@endpush









