@extends('admin.layouts.app')

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="post" action="{{ route('admin.quotation.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $quotation->id }}" />
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold">{{ $page_title }}</h4>
                    <hr />
                </div>
                <div class="card-body">
                     <div class="row">
                        <div class="row">
                          <div class="col-md-2 col-12">
                              <div class="mb-3">
                                  <label class="form-label">Q No:</label>
                                  <input name="quotation_no" type="text" class="form-control" placeholder="Quotation No" value="{{ isset($quotation->quotation_no) ? $quotation->quotation_no : '' }}" />
                              </div>
                          </div>
                        
                          <div class="col-md-2 col-12">
                              <div class="mb-3">
                                  <label class="form-label">Date:</label>
                                  <input name="date" type="date" class="form-control" placeholder="Date" value="{{ isset($quotation->date) ? $quotation->date : '' }}" />
                              </div>
                          </div>
                          
                          <div class="col-md-2 col-12">
                              <div class="mb-3">
                                  <label class="form-label">Expire Date:</label>
                                  <input name="expire_date" type="date" class="form-control" placeholder="Expire Date" value="{{ isset($quotation->expire_date) ? $quotation->expire_date : '' }}" />
                              </div>
                          </div>
                          
                          <div class="col-md-2 col-12">
                              <div class="mb-3">
                                  <label class="form-label">Route Type:</label>
                                  <select name="route_type" class="form-select">
                                      <option value="">Select Route</option>
                                      <option value="Single" {{ isset($quotation->route_type) && $quotation->route_type == 'Single' ? 'selected' : '' }}>Single</option>
                                      <option value="Single" {{ isset($quotation->route_type) && $quotation->route_type == 'Single' ? 'selected' : '' }}>Double</option>
                                  </select>
                              </div>
                          </div>
                          
                          <div class="col-md-4 col-12">
                              <label class="form-check-label mb-3">Mode:</label>
                              <div class="d-flex">
                                  <div class="mb-3">
                                      <input name="mode" type="radio" class="form-check-input" value="Single" id="defaultRadio1" {{ isset($quotation->mode) && $quotation->mode == 'Single' ? 'checked' : '' }} />
                                      <label class="form-check-label" for="defaultRadio1">Single job</label>
                                  </div>
                                  <div class="mb-3 px-3">
                                      <input name="mode" type="radio" class="form-check-input" value="Multiple" id="defaultRadio2" {{ isset($quotation->mode) && $quotation->mode == 'Multiple' ? 'checked' : '' }} />
                                      <label class="form-check-label" for="defaultRadio2">Multiple job</label>
                                  </div>
                              </div>
                          </div>
                        
                            <div class="col-md-2 col-12">
                              <div class="mb-3">
                                  <label class="form-label">Operation Type:</label>
                                  <select name="operation_type" class="form-select">
                                      <option value="">Select</option>
                                      <option value="Sea Export" {{ isset($quotation->operation_type) && $quotation->operation_type == 'Sea Export' ? 'selected' : '' }}>Sea Export</option>
                                  </select>
                              </div>
                            </div>
                          
                          <div class="col-md-2 col-12">
                              <div class="mb-3">
                                  <label class="form-label">Cost Center:</label>
                                  <select name="cost_center" class="form-select">
                                      <option value="">Select</option>
                                      <option value="head office" {{ isset($quotation->cost_center) && $quotation->cost_center == 'head office' ? 'selected' : '' }}>Head Office</option>
                                  </select>
                              </div>
                          </div>
                          
                          <div class="col-md-2 col-12">
                              <div class="mb-3">
                                  <label class="form-label">Sale Rep:</label>
                                  <input name="sale_rep" type="text" class="form-control" placeholder="Sale Representative" value="{{ $quotation->sale_rep ?? '' }}" />
                              </div>
                          </div>
                          
                          <div class="col-md-2 col-12">
                              <div class="mb-3">
                                  <label class="form-label">Book Rep:</label>
                                  <input name="book_rep" type="text" class="form-control" placeholder="Book Rep" value="{{ $quotation->book_rep ?? '' }}" />
                              </div>
                          </div>
                         
                         <div class="col-md-2 col-12">
                              <div class="mb-3">
                                  <label class="form-label">Customer Type:</label>
                                  <select name="customer_type" class="form-select">
                                      <option value="">Select</option>
                                      <option value="regular" {{ isset($quotation->customer_type) && $quotation->customer_type == 'regular' ? 'selected' : '' }}>Regular</option>
                                  </select>
                              </div>
                          </div>
                        
                         <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Client:</label>
                                <div class="row">
                                    <select name="customer_type" class="form-select">
                                        <option selected disabled>Select</option>
                                        @foreach($customers as $customer)
                                            <option @if($customer->id == $quotation->client) selected @endif value="{{ $customer->id }}">{{ $customer->name }}</option> 
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                          
                          <div class="col-md-2 col-12">
                              <div class="mb-3">
                                  <label class="form-label">Stage:</label>
                                  <select name="stage" class="form-select">
                                      <option value="">Select</option>
                                      <option value="01" {{ isset($quotation->stage) && $quotation->stage == '01' ? 'selected' : '' }}>01</option>
                                      <option value="02" {{ isset($quotation->stage) && $quotation->stage == '02' ? 'selected' : '' }}>02</option>
                                  </select>
                              </div>
                          </div>
                          
                          <div class="col-md-2 col-12">
                              <div class="mb-3">
                                  <label class="form-label">Pkgs:</label>
                                  <input name="pkgs" type="text" class="form-control" placeholder="Pkgs" value="{{ $quotation->pkgs ?? '' }}" />
                              </div>
                          </div>
                          
                          <div class="col-md-2 col-12">
                              <div class="mb-3">
                                  <label class="form-label">Unit:</label>
                                  <select name="unit" class="form-select">
                                      <option value="">Select</option>
                                      <option value="12" {{ isset($quotation->unit) && $quotation->unit == '12' ? 'selected' : '' }}>12</option>
                                  </select>
                              </div>
                          </div>
                        
                        <div class="col-md-2 col-12">
                          <div class="mb-3">
                              <label class="form-label">Attn. Person:</label>
                              <input name="attn_person" type="text" class="form-control" placeholder="Attn.Person" value="{{ $quotation->attn_person ?? '' }}" />
                          </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                          <div class="mb-3">
                              <label class="form-label">From Person:</label>
                              <input name="from_person" type="text" class="form-control" placeholder="From Person" value="{{ $quotation->from_person ?? '' }}" />
                          </div>
                        </div>
                       
                        <div class="col-md-2 col-12">
                          <div class="mb-3">
                              <label class="form-label">Vol / CBM:</label>
                              <input name="vol_cbm" type="text" class="form-control" placeholder="Vol / CBM" value="{{ $quotation->vol_cbm ?? '' }}" />
                          </div>
                        </div>

                        
                        <div class="col-md-2 col-12">
                            <div class="mb-3">
                                <label class="form-label">Commodity:</label>
                                <select name="commodity" class="form-select">
                                    <option value="">Select</option>
                                    <option value="textile-foods" {{ isset($quotation->commodity) && $quotation->commodity == 'textile-foods' ? 'selected' : '' }}>Textile Food</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="col-md-2 col-12">
                            <div class="mb-3">
                                <label class="form-label">Inco Term:</label>
                                <select name="inco_term" class="form-select">
                                    <option value="">Select</option>
                                    <option value="abc" {{ isset($quotation->inco_term) && $quotation->inco_term == 'abc' ? 'selected' : '' }}>abc</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="col-md-4 col-12">
                            <div class="mb-3">
                                <label class="form-label">Subject:</label>
                                <input name="subject" type="text" class="form-control" placeholder="Subject" value="{{ $quotation->subject ?? '' }}" />
                            </div>
                        </div>

                        
                        <div class="col-md-2 col-12">
                          <div class="mb-3">
                              <label class="form-label">Job Type:</label>
                              <select name="job_type" class="form-select">
                                  <option value="">Select</option>
                                  <option value="liner agency" {{ isset($quotation->job_type) && $quotation->job_type == 'liner agency' ? 'selected' : '' }}>Liner Agency</option>
                              </select>
                          </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                          <div class="mb-3">
                              <label class="form-label">Sub Type:</label>
                              <select name="sub_type" class="form-select">
                                  <option value="">Select</option>
                                  <option value="fcl" {{ isset($quotation->sub_type) && $quotation->sub_type == 'fcl' ? 'selected' : '' }}>FCL</option>
                              </select>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-3 col-12">
                          <div class="mb-3">
                              <label class="form-label">Vessel:</label>
                              <input name="vessel" type="text" class="form-control" placeholder="Vessel" value="{{ $quotation->vessel ?? '' }}" />
                          </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-3">
                                <label class="form-label">Voyage/Flight No:</label>
                                <input name="voyage" type="text" class="form-control" placeholder="Voyage/Flight No" value="{{ $quotation->voyage ?? '' }}" />
                            </div>
                        </div>
       
                        
                        <div class="col-md-3 col-12 mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
