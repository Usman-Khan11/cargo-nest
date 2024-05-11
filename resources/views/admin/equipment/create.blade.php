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
            <a href="{{route('admin.equipment')}}"><i class="fa fa-file-lines"></i></a>
        </div>
    </div>

</div>
@endsection

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="myForm" method="post" action="{{ route('admin.equipment.store') }}" enctype="multipart/form-data">
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
                                <label class="form-label">Code:</label>
                                <input name="code" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>

                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Size</label>
                                <select name="size" class="form-select">
                                    <option Selected Disabled></option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="40">40</option>
                                    <option value="43">43</option>
                                    <option value="45">45</option>
                                    <option value="60">60</option>
                                </select>
                            </div>    
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Type</label>
                                <select name="type" class="form-select">
                                    <option Selected Disabled></option>
                                    <option value="Dry Container">Dry Container</option>
                                    <option value="Flat Rack">Flat Rack</option>
                                    <option value="High Cube">High Cube</option>
                                    <option value="Hdc">Hdc</option>
                                    <option value="Open Top">Open Top</option>
                                    <option value="Refrigerated Container">Refrigerated Container</option>
                                    <option value="SRFR">SRFR</option>
                                    <option value="Tank">Tank</option>
                                    <option value="Truck & Trailer">Truck & Trailer</option>
                                    <option value="Ventilated">Ventilated</option>
                                    <option value="Bulk">Bulk</option>
                                </select>
                            </div>    
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">TEU:</label>
                                <input name="teu" type="text" class="form-control" placeholder="0.00" />
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Old ISO Code:</label>
                                <input name="old_iso" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">ISO Code:</label>
                                <input name="iso" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Weight:</label>
                                <input name="weight" type="text" class="form-control" placeholder="0.00" />
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










