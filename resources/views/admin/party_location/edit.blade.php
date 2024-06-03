@extends('admin.layouts.app')

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="post" action="{{ route('admin.equipment.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $equipment->id }}" />
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold">{{ $page_title }}</h4>
                    <hr />
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
