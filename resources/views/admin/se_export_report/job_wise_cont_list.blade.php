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
	                <div class="col-md-4">
                 <div class="mb-2">
                    <label for="cost" class="form-label">Date Type:</label>
                    <select name="Job Date" id="cars" step="0.01" class="form-control">
                        <option value="Job Date">Job Date</option>
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
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-2">
                           <label for="cost" class="form-label">Vesel:</label>
                           <input id="cost" name="Vesel" type="text" step="0.01" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                           <label for="cost" class="form-label">Voyage:</label>
                           <input id="cost" name="Vesel" type="text" step="0.01" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                           <label for="cost" class="form-label">Overseas Agent:</label>
                           <input id="cost" name="Overseas Agent" type="text" step="0.01" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                           <label for="cost" class="form-label">Line Agent:</label>
                           <input id="cost" name="Line Agent" type="text" step="0.01" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                           <label for="cost" class="form-label">Client:</label>
                           <input id="cost" name="Client" type="text" step="0.01" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                           <label for="cost" class="form-label">Consignee:</label>
                           <input id="cost" name="Consignee" type="text" step="0.01" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                           <label for="cost" class="form-label">Port:</label>
                           <input id="cost" name="Port" type="text" step="0.01" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                           <label for="cost" class="form-label">Shiping Licence:</label>
                           <input id="cost" name="Shiping Licence" type="text" step="0.01" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                           <label for="cost" class="form-label">Principle:</label>
                           <input id="cost" name="Principle" type="text" step="0.01" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                           <label for="cost" class="form-label">Terminal:</label>
                           <input id="cost" name="Terminal" type="text" step="0.01" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                           <label for="cost" class="form-label">CFS/Depot Facility:</label>
                           <input id="cost" name="CFS/Depot Facility" type="text" step="0.01" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                           <label for="cost" class="form-label">Sales Rep:</label>
                           <input id="cost" name="Sales Rep" type="text" step="0.01" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                           <label for="cost" class="form-label">Shipper:</label>
                           <input id="cost" name="Shipper" type="text" step="0.01" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                           <label for="cost" class="form-label">Cost Center:</label>
                           <input id="cost" name="Cost Center" type="text" step="0.01" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-2">
                           <label for="cost" class="form-label">Job Type:</label>
                           <select name="Sea Export" id="cars" step="0.01" class="form-control">
                               <option value="Job Date">Sea Export</option>
                             </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                           <label for="cost" class="form-label">Job Sub Type:</label>
                           <select name="Job Sub Type" id="cars" step="0.01" class="form-control">
                               <option value="Job Date"></option>
                             </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                           <label for="cost" class="form-label"> Type:</label>
                           <select name=" Type" id="cars" step="0.01" class="form-control">
                               <option value="Job Date"></option>
                             </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                           <label for="cost" class="form-label">Sort:</label>
                           <select name="Job Sub Type" id="cars" step="0.01" class="form-control">
                               <option value="Job Date">Job No</option>
                             </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-2 mt-3">
                            <label class="form-check-label mb-2">
                                <input type="checkbox" name="Soc" value="Soc" class="form-check-input">
                                Soc
                            </label>
                            <label class="form-check-label mx-3 mb-2">
                                <input type="checkbox" name="Coc" value="Coc" class="form-check-input">
                                Coc
                            </label>
                            <label class="form-check-label">
                                <input type="checkbox" name="Transhipment Cargo" value="Transhipment Cargo" class="form-check-input">
                                Transhipment Cargo
                            </label>
                            
                        </div>
                    </div>
                    <div class="col-md-6" style="border: 1px solid black; padding: 10px 10px;">
                        <div class="mb-2">
                            <input type="radio" class="form-check-input" class="form-check-input" id="All" name="fav_language" value="HTML">
                            <label for="All">All</label>
                            <input type="radio" class="form-check-input" id="Manifasted" name="fav_language" value="CSS">
                            <label for="Manifasted">Manifasted</label>
                            <input type="radio" class="form-check-input" id="Non Manifested" name="fav_language" value="JavaScript">
                            <label for="Non Manifested">Non Manifested</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>Job Status:</label>
                    </div>
                    <div class="col-md-4" style="padding: 5px 10px; border: 1px solid black; margin: 10px 0;" >
                        <div class="mb-2 mt-3">
                            
                            <label class="form-check-label mb-2">
                                <input type="checkbox" name="Open" value="Job Status" class="form-check-input">
                                Open
                            </label>
                            <label class="form-check-label mx-3 mb-2">
                                <input type="checkbox" name="Close" value="Job Status" class="form-check-input">
                                Close
                            </label>
                            <label class="form-check-label">
                                <input type="checkbox" name="Cancelled" value="Job Status" class="form-check-input">
                                Cancelled
                            </label>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>Group On:</label>
                    </div>
                    <div class="col-md-8" style="border: 1px solid black; padding: 10px 20px; margin: 10px 0;">
                        <div class="mb-2">
                            <input type="radio" class="form-check-input" id="Vissel Wise" name="fav_language" value="HTML">
                            <label for="Vissel Wise">Vissel Wise</label>
                            <input type="radio" class="form-check-input" id="Oerseas Agent" name="fav_language" value="CSS">
                            <label for="Oerseas Agent">Oerseas Agent</label>
                            <input type="radio" class="form-check-input" id="Line Agent" name="fav_language" value="JavaScript">
                            <label for="Line Agent">Line Agent</label>
                            <input type="radio" class="form-check-input" id="Client" name="fav_language" value="JavaScript">
                            <label for="Client">Client</label>
                            <input type="radio" class="form-check-input" id="Port" name="fav_language" value="JavaScript">
                            <label for="Port">Port</label>
                            <input type="radio" class="form-check-input" id="Principle" name="fav_language" value="JavaScript">
                            <label for="Principle">Principle</label>
                            <input type="radio" class="form-check-input" id="Terminal" name="fav_language" value="JavaScript">
                            <label for="Terminal">Terminal</label>
                            <input type="radio" class="form-check-input" id="CFS/Depot Facility" name="fav_language" value="JavaScript">
                            <label for="CFS/Depot Facility">CFS/Depot Facility</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                           <label for="cost" class="form-label">Print Out</label>
                           <select name="Viewer" id="cars" step="0.01" class="form-control">
                               <option value="Viewer">Viewer</option>
                             </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" >
                        <div class="mb-2 mt-3">
                            
                            <label class="form-check-label mb-2">
                                <input type="checkbox" name="Show Manifest No" value="Job Status" class="form-check-input">
                                Show Manifest No
                            </label><br>
                            <label class="form-check-label  mb-2">
                                <input type="checkbox" name="Show Filter" value="Job Status" class="form-check-input">
                                Show Filter
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-sm">Subscription</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8" style="border: 1px solid black;">
                        <div class="mb-2">
                            <input type="radio" class="form-check-input" id="Vissel Wise Detail Report" name="fav_language" value="HTML">
                            <label for="Vissel Wise Detail Report">Vissel Wise Detail Report</label>
                            <input type="radio" class="form-check-input" id="Vissel + Terminel Wise Summery Report" name="fav_language" value="CSS">
                            <label for="Vissel + Terminel Wise Summery Report">Vissel + Terminel Wise Summery Report</label>
                            <input type="radio" class="form-check-input" id="Vissel Wise Container Detail Report" name="fav_language" value="JavaScript">
                            <label for="Vissel Wise Container Detail Report">Vissel Wise Container Detail Report</label>
                            <input type="radio" class="form-check-input" id="Vissel Principle CostCenter Wise Summery" name="fav_language" value="JavaScript">
                            <label for="Vissel Principle CostCenter Wise Summery">Vissel Principle CostCenter Wise Summery</label>
                            <input type="radio" class="form-check-input" id="Vissel Wise Summery Report" name="fav_language" value="JavaScript">
                            <label for="Vissel Wise Summery Report">Vissel Wise Summery Report</label>
                            
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









