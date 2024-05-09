@extends('admin.layouts.app')

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="post" action="{{ route('admin.customer.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold">{{ $page_title }}</h4>
                    <hr />
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="mb-3">
                                <label class="form-label">Customer Name*</label>
                                <input name="name" type="text" class="form-control" placeholder="Customer Name*" />
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input name="address" type="text" class="form-control" placeholder="Address" />
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input name="phone" type="text" class="form-control" placeholder="Phone" />
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" placeholder="Email" />
                            </div>
                        </div>
                       
                        <div class="col-md-4 col-12">
                            <div class="mb-3">
                                <label class="form-label">Country</label>
                                 <select name="country" class="form-select">
                                    <option value="">Select Country</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="India">India</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="col-md-4 col-12">
                            <div class="mb-3">
                                <label class="form-label">City</label>
                                 <select name="city" class="form-select">
                                    <option value="">Select City</option>
                                    <option value="Pakistan">Karachi</option>
                                    <option value="India">Lahore</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="col-md-4 col-12">
                            <div class="mb-3">
                                <label class="form-label">State</label>
                                <input name="state" type="text" class="form-control" placeholder="State" />
                            </div>
                        </div>
                       
                       
                        <div class="col-md-4 col-12">
                            <div class="mb-3">
                                <label class="form-label">Postal Code</label>
                                <input name="postal_code" type="text" class="form-control" placeholder="Postal Code" />
                            </div>
                        </div>
                       
                       
                        <div class="col-md-4 col-12">
                            <div class="mb-3">
                                <label class="form-label">GST No</label>
                                <input name="gst_no" type="text" class="form-control" placeholder="GST No" />
                            </div>
                        </div>
                       
                        
                        <div class="col-md-12 col-12 mt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
