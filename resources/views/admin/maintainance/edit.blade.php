@extends('admin.layouts.app')

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="post" action="{{ route('admin.bank.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="" />
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold">{{ $page_title }}</h4>
                    <hr />
                </div>
                <div class="card-body">
                    
                   <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="mb-4">
                                <label class="form-label">Project</label>
                                <select name="" class="form-control">
                                    <option selected disabled>Select Project</option>
                                    <option>Project Fatch</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <div class="mb-4">
                                <label class="form-label">Fixed Assets</label>
                                <select name="" class="form-control">
                                    <option selected disabled>Select Fixed Assets</option>
                                    <option>Select Fixed Assets</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <label class="form-check-label mb-3">Type</label>
                            <div class="d-flex">
                                <div class="mb-4">
                                    <input name="default-radio-1" type="radio" class="form-check-input" value id="defaultRadio1" />
                                    <label class="form-check-label" for="defaultRadio1">Warranty Claim</label>
                                </div>
                                <div class="mb-4 px-3">
                                    <input name="default-radio-1" type="radio" class="form-check-input" value id="defaultRadio2" />
                                    <label class="form-check-label" for="defaultRadio2">Payment</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-3">
                                <label class="form-label">Code</label>
                                <input type="number" name="" placeholder="Code" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="" placeholder="Name" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-3">
                                <label class="form-label">Amount</label>
                                <input type="number" name="" placeholder="Amount" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-3">
                                <label class="form-label">Purchase Date</label>
                                <input type="date" name="" placeholder="Date" class="form-control"/>
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-3">
                                <label class="form-label">Warranty</label>
                                <select name="" class="form-control">
                                    <option selected disabled>Select Warranty</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                </select>
                            </div>
                        </div>
                        
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-3">
                                <label class="form-label">Warranty End Date</label>
                                <input type="date" name="" placeholder="Date" class="form-control"/>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-12">
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea type="text" name="" rows="5" placeholder="Date" class="form-control"/></textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label class="form-label">Maintainance Date</label>
                                <input type="date" name="" placeholder="Date" class="form-control"/>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label class="form-label">Amount</label>
                                <input type="number" name="" placeholder="Amount" class="form-control"/>
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
