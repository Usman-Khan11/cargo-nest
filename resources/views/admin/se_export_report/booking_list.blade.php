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
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label >Selling Date</label>
                               <select name="Selling Date" id="cars" step="0.01" class="form-control">
                                   <option value="Selling Date">Selling Date</option>
                                 </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2">
                               <label for="cost" class="form-label"> From:</label>
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
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label"> Request#:</label>
                               <input id="cost" name="Request" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label"> Client:</label>
                               <input id="cost" name=" Client" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Port Of Loading:</label>
                               <input id="cost" name="Port Of Loading" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Port Of Discherge:</label>
                               <input id="cost" name="Port Of Discherge" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Port Of Finel Dest:</label>
                               <input id="cost" name="Port Of Finel Dest" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label >Sector</label>
                               <select name="Sector" id="cars" step="0.01" class="form-control">
                                   <option value="Sector"></option>
                                 </select>
                            </div>
                        </div>
                       
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-2">
                            <label>Booking :</label>
                        </div>
                        <div class="col-md-8" style=" margin-bottom: 10px;">
                            <div class="mb-2">
                                <label class="form-check-label mb-2">
                                    <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                    Pending
                                </label>
                                <label class="form-check-label mb-2 mx-3">
                                    <input type="checkbox" name="Confirmed" value="Soc" class="form-check-input">
                                    Confirmed
                                </label>
                                <label class="form-check-label mb-2">
                                    <input type="checkbox" name="Cancelled" value="Soc" class="form-check-input">
                                    Cancelled
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Carrier :</label>
                        </div>
                        <div class="col-md-8" style=" margin-bottom: 10px;">
                            <div class="mb-2">
                                <label class="form-check-label mb-2">
                                    <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                    Pending
                                </label>
                                <label class="form-check-label mb-2 mx-3">
                                    <input type="checkbox" name="Confirmed" value="Soc" class="form-check-input">
                                    Confirmed
                                </label>
                                <label class="form-check-label mb-2">
                                    <input type="checkbox" name="Cancelled" value="Soc" class="form-check-input">
                                    Cancelled
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Jobs :</label>
                        </div>
                        <div class="col-md-8" style=" ">
                            <div class="mb-2">
                                <label class="form-check-label mb-2">
                                    <input type="checkbox" name="Created" value="Soc" class="form-check-input">
                                    Created
                                </label>
                                <label class="form-check-label mb-2 mx-3">
                                    <input type="checkbox" name=" Pending" value="Soc" class="form-check-input">
                                   Pending
                                </label>
                               
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            <div class="col-md-6">
                 <div class="row">
                        <div class="col-md-3">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Source Type:</label>
                               <select name="Source Type" id="cars" step="0.01" class="form-control">
                                <option value="Source Type"></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Bkg#:</label>
                               <input id="cost" name="Bkg" type="text" step="0.01" class="form-control" required>
                            </div>
                        </div>
                 
                        <div class="col-md-6">
                            <div class="mb-2">
                               <label for="cost" class="form-label">Sales Rep:</label>
                               <select name="Sales Rep" id="cars" step="0.01" class="form-control">
                                <option value="Sales Rep"></option>
                                </select>
                            </div>
                        </div>
                 </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                           <label for="cost" class="form-label">Operation:</label>
                           <select name="Operation" id="cars" step="0.01" class="form-control">
                            <option value="Operation"></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                           <label for="cost" class="form-label">Job#:</label>
                           <input id="cost" name="Bkg" type="text" step="0.01" class="form-control" required>
                        </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                           <label for="cost" class="form-label">Vessel:</label>
                           <input id="cost" name="Vessel" type="text" step="0.01" class="form-control" required>
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
                           <label for="cost" class="form-label">Port Of Receipt:</label>
                           <input id="cost" name="Port Of Receipt" type="text" step="0.01" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                           <label for="cost" class="form-label">SLine/Carrier:</label>
                           <input id="cost" name="SLine/Carrier" type="text" step="0.01" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                           <label for="cost" class="form-label">CHA/CHB:</label>
                           <input id="cost" name="CHA/CHB" type="text" step="0.01" class="form-control" required>
                        </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-md-2">
                        <label>Jobs :</label>
                    </div>
                    <div class="col-md-8" style=" margin-bottom: 10px;">
                        <div class="mb-2">
                            <label class="form-check-label mb-2">
                                <input type="checkbox" name="Hold" value="Soc" class="form-check-input">
                                Hold
                            </label>
                            <label class="form-check-label mb-2 mx-3">
                                <input type="checkbox" name=" Pending" value="Soc" class="form-check-input">
                               Pending
                            </label>
                            <label class="form-check-label mb-2">
                                <input type="checkbox" name=" Submitted" value="Soc" class="form-check-input">
                               Submitted
                            </label>
                           
                        </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-md-2">
                        <label></label>
                    </div>
                    <div class="col-md-8" style=" ">
                        <div class="mb-2">
                            <label class="form-check-label mb-2">
                                <input type="checkbox" name="None" value="Soc" class="form-check-input">
                                None
                            </label>
                            <label class="form-check-label mb-2 mx-3">
                                <input type="checkbox" name=" Pending Quotation" value="Soc" class="form-check-input">
                               Pending Quotation
                            </label>
                            <label class="form-check-label mb-2">
                                <input type="checkbox" name=" Quotation" value="Soc" class="form-check-input">
                                Quotation
                            </label>
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









