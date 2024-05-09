@extends('admin.layouts.app')

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="post" action="{{ route('admin.packages.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $packages->id }}" />
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold">{{ $page_title }}</h4>
                    <hr />
                </div>
                <div class="card-body">
                     
                    <div class="row">
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Pack Code:</label>
                                <input name="pack_code" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2 mt-4">
                                <label class="form-label"></label>
                                <input name="default" type="checkbox" /><span>&nbsp;&nbsp;Default</span>
                            </div>
                        </div>
                        <div class="col-md-5 col-12">
                            <div class="mb-2">
                                <label class="form-label">Pack Name:</label>
                                <input name="pack_name" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">STD Code 2Digit:</label>
                                <input name="pack_name" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">STD Code 3Digit:</label>
                                <input name="pack_name" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">EPAS Code:</label>
                                <input name="pack_name" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>

                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Size</label>
                                <select name="size" class="form-select">
                                    <option Selected Disabled></option>
                                    <option>10</option>
                                    <option>20</option>
                                    <option>40</option>
                                    <option>43</option>
                                    <option>45</option>
                                    <option>60</option>
                                </select>
                            </div>    
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Type</label>
                                <select name="size" class="form-select">
                                    <option Selected Disabled></option>
                                    <option>Dry Container</option>
                                    <option>Flat Rack</option>
                                    <option>High Cude</option>
                                    <option>Hdc</option>
                                    <option>Open Top</option>
                                    <option>Refrigerated Container</option>
                                    <option>SRFR</option>
                                    <option>Tank</option>
                                    <option>Truck & Trailer</option>
                                    <option>Ventilated</option>
                                    <option>Bulk</option>
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
                                <input name="teu" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">ISO Code:</label>
                                <input name="teu" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Weight:</label>
                                <input name="teu" type="text" class="form-control" placeholder="0.00" />
                            </div>
                        </div>

                    </div>
                     
                </div>
            </div>
        </form>
    </div>
@endsection
