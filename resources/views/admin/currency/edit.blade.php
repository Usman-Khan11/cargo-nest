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
                                <label class="form-label">Code:</label>
                                <input name="code" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Name:</label>
                                <input name="name" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Main Symbol:</label>
                                <input name="main_symbol" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Sub Unit Symbol:</label>
                                <input name="unit_symbol" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Decimal Portion Digits:</label>
                                <input name="decimal_portion_digits" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>

                        

                    </div>
                     
                </div>
            </div>
        </form>
    </div>
@endsection
