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
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Vessel Code:</label>
                                <input name="code" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Vessel Name:</label>
                                <input name="name" type="text" class="form-control" placeholder="" />
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
                                <input name="nrt" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Country Of Registered:</label>
                                <input name="country" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                    </div>
                     
                </div>
            </div>
        </form>
    </div>
@endsection
