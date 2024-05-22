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
                <label>Overseas Agent :</label>
                <input type="text" name="" id="" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-2">
                <label>Shipping line :</label>
                <input type="text" name="" id="" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-2">
                <label>consignee :</label>
                <input type="text" name="" id="" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-2">
                <label>Port Of Loading:</label>
                <input type="text" name="" id="" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-2">
                <label>POL Sector</label>
                <select class="form-select">
                    <option></option>
                    <option></option>
                    <option></option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-2">
                <label>Cost Center</label>
                <select class="form-select">
                    <option></option>
                    <option></option>
                    <option></option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-2">
                <label>Port Of Final Dest:</label>
                <input type="text" name="" id="" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-2">
                <label>POFD Secter :</label>
                <input type="text" name="" id="" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-2">
                <label>Port Of Discharge :</label>
                <input type="text" name="" id="" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-2">
                <label>client :</label>
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
                <label>Voyage:</label>
                <input type="text" name="" id="" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-2">
                <label>Principal:</label>
                <input type="text" name="" id="" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-2">
                <label>Sales Rep</label>
                <input type="text" name="" id="" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-2">
                <label>Operation Type :</label>
                <select class="form-select">
                    <option></option>
                    <option></option>
                    <option></option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-2">
                <label>Deliver Agent :</label>
                    <div class="form-box d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                            LCl
                            </label>
                        </div>
                        <div class="form-check mx-3">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            FCL
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            Shippment wise
                            </label>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-2">
                <label>Nomination :</label>
                <select class="form-select">
                    <option></option>
                    <option></option>
                    <option></option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-2">
                <label>File :</label>
                <input type="text" name="" id="" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-2">
                <label>Company</label>
                <select class="form-select">
                    <option></option>
                    <option></option>
                    <option></option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-2">
                <label>POL country</label>
                <select class="form-select">
                    <option></option>
                    <option></option>
                    <option></option>
                </select>
            </div>
        </div>       
    </div>

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="mb-3 d-flex">
                <div>
                    <input name="manual" type="checkbox" class="form-check-input" class="form-check-input" /><span>&nbsp;Show Filter</span>
                </div>
                <div class="mx-3">
                    <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;Exclude Empty Move</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3 d-flex">
                <div>
                    <input name="manual" type="checkbox" class="form-check-input" /> <span>&nbsp;All</span>
                </div>
                <div class="mx-3">
                    <input name="manual" type="checkbox" class="form-check-input" /> <span>&nbsp;Direct</span>
                </div>
                <div>
                    <input name="manual" type="checkbox" class="form-check-input" /> <span>&nbsp;Coload</span> 
                </div>
                <div class="mx-3">
                    <input name="manual" type="checkbox" class="form-check-input" /> <span>&nbsp;Liner Agency</span> 
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3 d-flex">
                <div>
                    <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;All</span>
                </div>
                <div class="mx-3">
                    <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;Open </span>
                </div>
                <div>
                    <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;Closed</span> 
                </div>
                <div class="mx-3">
                    <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;Cancel</span> 
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









