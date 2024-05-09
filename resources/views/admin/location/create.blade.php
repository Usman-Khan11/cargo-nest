@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus">
            <i class="fa fa-square-plus"></i>
        </div>
        <div class="save">
            <i class="fa fa-save"></i>
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
        <form method="post" action="{{ route('admin.commodity.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                    <!--<hr />-->
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
            
            <div class="card mb-4">
                <div class="p-3">
                    <table class="datatables-basic table">
                        <thead>
                          <tr>
                            <th>...</th>
                            <th>Alias</th>
                          </tr>
                        </thead>
                        <tbody>
                            <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                            <td><input type="text" style="width: 100%;"/></td>
                        </tbody>
                    </table>
                </div>
            </div> 
        </form>
    </div>
@endsection













