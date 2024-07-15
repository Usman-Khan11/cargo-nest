@extends('admin.layouts.app')

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="post" action="{{ route('admin.commodity.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $commodity->id }}" />
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold">{{ $page_title }}</h4>
                    <hr />
                </div>
                <div class="card-body">
                     
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="mb-2">
                                <label class="form-label">Location:</label>
                                <input name="code" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <label class="form-label">.</label>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-2">
                                        <input style="width:15px; height:15px;" name="country" type="checkbox" /><span>&nbsp;&nbsp;Country</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <input style="width:15px; height:15px;" name="city" type="checkbox" /><span>&nbsp;&nbsp;City</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <input style="width:15px; height:15px;" name="airport" type="checkbox" /><span>&nbsp;&nbsp;Air port</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <input style="width:15px; height:15px;" name="seaport" type="checkbox" /><span>&nbsp;&nbsp;Sea Port</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <input style="width:15px; height:15px;" name="terminals" type="checkbox" /><span>&nbsp;&nbsp;Terminals</span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Co-ordinates:</label>
                                <input name="co_ordinates" type="text" class="form-control" placeholder="" />
                            </div>
                        </div> 
                        <div class="col-md-2 col-12">
                            <div class="mb-2 mt-4">
                                <input style="width:15px; height:15px;" name="inactive" type="checkbox" /><span>&nbsp;&nbsp;In-Active</span>
                            </div>
                        </div> 
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Latitude:</label>
                                <input name="latitude" type="number" class="form-control" placeholder="0.000000" />
                            </div>
                        </div> 
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">State:</label>
                                <input name="state" type="text" class="form-control" placeholder="" />
                            </div>
                        </div> 
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Longitude:</label>
                                <input name="longitude" type="number" class="form-control" placeholder="0.000000" />
                            </div>
                        </div> 
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Phone Prefix:</label>
                                <input name="ph_prefix" type="text" class="form-control" placeholder="" />
                            </div>
                        </div> 
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">EPASS Code:</label>
                                <input name="epass_code" type="text" class="form-control" placeholder="" />
                            </div>
                        </div> 
                        <div class="col-md-6 col-12">
                            <div class="mb-2">
                                <label class="form-label">Country/Region:</label>
                                <textarea name="country_region" type="text" rows="4" class="form-control" placeholder=""></textarea>
                            </div>
                        </div> 
                        <div class="col-md-6 col-12">
                            <div class="mb-3 mt-4">
                                <button class="btn btn-primary">Change Utility</button>
                            </div>
                            <div class="">
                                <button class="btn btn-primary">Active & Inactive Log</button>
                            </div>
                        </div> 
                        
                    </div>
                     
                </div>
            </div>
        </form>
    </div>
@endsection
