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
                        <label>All :</label>
                        <select class="form-select">
                            <option>1</option>
                            <option>1</option>
                            <option>1</option>
                        </select>
                    </div>  
                </div>
                <div class="col-md-4">
                    <div class="mb-2">
                        <label>Data Form :</label>
                        <input type="date" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-2">
                        <label>Data Till :</label>
                        <input type="date" class="form-control">
                    </div>
                </div>
            </div>
        </div>
          
       
        <div class="col-md-6">
            <div class="mb-2">
                <label>Client :</label>
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
       
        <div class="col-md-4">
            <div class="mb-2">
                <div class="form-box d-flex">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Both
                        </label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                        Debit Note
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                        Credit Note
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-2">
                <div class="form-check border-1">
                    <div>
                        <input name="manual" type="checkbox" class="form-check-input" class="form-check-input" /><b> <span>&nbsp;&nbsp;Show Only Where Sailing Date Fall in Previous Dates</span></b>
                    </div>
                </div>
            </div>
        </div>
       
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <div>
                    <input name="manual" type="checkbox" class="form-check-input" /><b> <span>&nbsp;&nbsp;Show Filter</span></b>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="mb-3">
                <div class="form-bg">
                    <div>
                        <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Sea Expert</span>
                    </div>
                    <div>
                        <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Air Experts</span>
                    </div>
                    <div>
                        <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Sea imports</span>
                    </div>
                    <div>
                        <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Air imports</span>
                    </div>
                    <div>
                        <input name="manual" type="checkbox" class="form-check-input" /><span>&nbsp;&nbsp;Logistics</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="mb-2">
                <label>Print On :</label>
                <select class="form-select">
                    <option></option>
                   
                </select>
            </div>
        </div>
           

        <div class="col-lg-4">
            <div class="mb-2">
               <b> <label>Grouping</label></b>
                <div class="form-box d-flex">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                           No Group
                        </label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Client
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="mb-2 Button-main">
                <div class="subscribe-button">
                    <button class="btn btn-primary btn-sm">Get Fiels List</button>
                </div>
                <div class="subscribe-button">
                    <button class="btn btn-primary btn-sm">Subscription</button>
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









