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
                    <select name="Loading List" id="cars" class="form-control">
                        <option value="Loading List">Job Date</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-2">
                    <label for="cost" class="form-label">Date From:</label>
                    <input id="cost" name="Date From" type="date" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-2">
                    <label for="cost" class="form-label">Date Till:</label>
                    <input id="cost" name="Date Till" type="date" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-2">
                    <label for="cost" class="form-label">Comapany:</label>
                    <select name="Comapany" id="cars" class="form-select">
                        <option value="Loading List">Comapany</option>
                    </select>

                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-2">
                    <label for="cost" class="form-label">Client:</label>
                    <input id="cost" name="Client" type="text" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-2">
                    <label for="cost" class="form-label">Shipper:</label>
                    <input id="cost" name="Shipper" type="text" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-2">
                    <label for="cost" class="form-label">Clearing:</label>
                    <input id="cost" name="Clearing" type="text" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-2">
                    <label for="cost" class="form-label">Sales Rep:</label>
                    <input id="cost" name="Sales Rep" type="text" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-2">
                    <label for="cost" class="form-label">Port Of Discharge:</label>
                    <input id="cost" name="Port Of Discharge" type="text" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-2">
                    <label for="cost" class="form-label">Local Vendor:</label>
                    <input id="cost" name="Local Vendor" type="text" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-2">
                    <label for="cost" class="form-label">Shipping Line:</label>
                    <input id="cost" name="Shipping Line" type="text" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-2">
                    <label for="cost" class="form-label">Ves/Voy:</label>
                    <input id="cost" name="Ves/Voy" type="text" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-2">
                    <label for="cost" class="form-label">Cost Center:</label>
                    <select name="Cost Center" id="cars" class="form-select">
                        <option value="Cost Center">Cost Center</option>
                    </select>

                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-2">
                    <label for="cost" class="form-label">Voyage:</label>
                    <input id="cost" name="Voyage" type="text" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-2">
                    <label for="cost" class="form-label">Sub Type:</label>
                    <select name="Sub Type" id="cars" class="form-select">
                        <option value="Sub Type"></option>
                    </select>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="border: 1px solid #ccc; padding: 10px 20px; margin: 10px 0;">
                <div class="mb-2">
                    <input type="radio" class="form-check-input" class="form-check-input" id="All" name="fav_language" value="HTML">
                    <label for="All">All</label>
                    <input type="radio" class="form-check-input" id="Open" name="fav_language" value="CSS">
                    <label for="Open">Open</label>
                    <input type="radio" class="form-check-input" id="Cancel" name="fav_language" value="JavaScript">
                    <label for="Cancel">Cancel</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-2">
                    <label for="cost" class="form-label"> Type:</label>
                    <select name="Type" id="cars" class="form-select">
                        <option value="CargoNotRecived">CargoNotRecived</option>
                    </select>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-2">
                    <label for="cost" class="form-label"></label>
                    <select name="Viewer" id="cars" class="form-select">
                        <option value="Viewer">Viewer</option>
                    </select>
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









