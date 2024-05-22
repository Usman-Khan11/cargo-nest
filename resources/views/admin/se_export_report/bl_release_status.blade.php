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
                
                <div class="row align-items-center">
        <div class="col-lg-12">
            <div class="row form-border">
                <div class="col-md-2">
                    <div class="mb-2">
                        <label>All :</label>
                        <select class="form-select">
                            <option></option>
                            <option></option>
                            <option></option>
                        </select>
                    </div>  
                </div>
                <div class="col-md-3">
                    <div class="mb-2">
                        <label>Form :</label>
                        <input type="date" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-2">
                        <label>Data Till :</label>
                        <input type="date" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-2">
                        <label> BL Status :</label>
                        <select class="form-select">
                            <option></option>
                            <option></option>
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mt-4">
                        <div>
                            <input name="manual" type="checkbox" class="form-check-input" class="form-check-input" /> <span>&nbsp;&nbsp;All</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          
       <div class="row">
            <div class="col-md-6">
                <div class="mb-2">
                    <label>Client:</label>
                    <input type="text" name="" id="" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-2">
                    <label>Sales Rap :</label>
                    <select class="form-select">
                        <option></option>
                        <option></option>
                        <option></option>
                    </select>
                </div>
            </div>
       </div>

       <div class="row">
        <div class="col-md-4">
            <div class="mb-2">
                <label>Shipper:</label>
                <input type="text" name="" id="" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-2">
                <label>Operation :</label>
                <select class="form-select">
                    <option>Air Import</option>
                    <option>Air Export</option>
                    <option>Sea Import</option>
                    <option>Sea Export</option>
                    <option>Logistics</option>
                    <option>Warehouse</option>
                    <option>Other</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-2">
                <label>Job #:</label>
                <input type="text" name="" id="" class="form-control">
            </div>
        </div>
   </div>
   <div class="row">
    <div class="col-md-6">
        <div class="mb-2">
            <label>Port Of Loading:</label>
            <input type="text" name="" id="" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-2">
            <label>Vissel :</label>
            <input type="text" name="" id="" class="form-control">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="mb-2">
            <label>Port Of Discharge:</label>
            <input type="text" name="" id="" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-2">
            <label>Voyage :</label>
            <input type="text" name="" id="" class="form-control">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="mb-2">
            <label>Port Of Final Dest:</label>
            <input type="text" name="" id="" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-2">
            <label>Port Of Receipt :</label>
            <input type="text" name="" id="" class="form-control">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="mb-2">
            <label>BL Handover Type :</label>
            <select class="form-select">
                <option></option>
                <option></option>
                <option></option>
            </select>
        </div>
    </div>
    <div class="col-md-2">
        <div class="mt-4">
            <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;All</span>
        </div>
    </div>
     
    <div class="col-md-6">
        <div class="mb-2">
            <label>SLine/Carrier :</label>
            <input type="text" name="" id="" class="form-control">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="mb-2">
            <label>CHA/CHB :</label>
            <input type="text" name="" id="" class="form-control">
        </div>
    </div>
</div>
      
<div class="row">
    <div class="col-lg-6">
        <div class="mb-2 Button-main">
            <div class="subscribe-button">
                <button class="btn btn-primary btn-sm">Generate</button>
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









