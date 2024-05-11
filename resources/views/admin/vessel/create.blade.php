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
            <a href="{{route('admin.vessel')}}"><i class="fa fa-file-lines"></i></a>
        </div>
    </div>

</div>
@endsection

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="myForm" method="post" action="{{ route('admin.vessel.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                    <!--<hr />-->
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Vessel Code:</label>
                                <input name="vessel_code" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Vessel Name:</label>
                                <input name="vessel_name" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Owner:</label>
                                <input name="owner" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Principle Code:</label>
                                <input name="principle_code" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Call Sign:</label>
                                <input name="call_sign" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">GRT:</label>
                                <input name="grt" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">NRT:</label>
                                <input name="nrt" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">IMO No:</label>
                                <input name="imo_no" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Country Of Registered:</label>
                                <input name="country_registered" type="text" class="form-control" placeholder="" />
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
        // Trigger form submission
        $('#myForm').submit();
      });
</script>

@endpush











