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
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Shortcode:</label>
                                <input name="s_code" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Hs Code:</label>
                                <input name="hs_code" type="text" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Cargo Type:</label>
                                <select class="form-select" name="cargo_type">
                                    <option selected></option>
                                    <option>GI</option>
                                    <option>CAR</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Commodity Group:</label>
                                <select class="form-select" name="commodity_group">
                                    <option selected></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2 mt-4">
                                <label class="form-label"></label>
                                <input style="width:15px; height:15px;" name="inactive" type="checkbox" /><span>&nbsp;&nbsp;In-Active</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        
                        <h5>Hazmat Details:</h5>
                        
                       <div class="col-md-12 col-12">
                            <label class="form-label">Hazmat Product?</label>
                            <div class="d-flex">
                                <div class="mb-2">
                                    <input name="mode" type="radio" class="form-check-input" value id="defaultRadio1" />
                                    <label class="form-check-label" for="defaultRadio1">No</label>
                                </div>
                                <div class="mb-2 px-3">
                                    <input name="mode" type="radio" class="form-check-input" value id="defaultRadio2" />
                                    <label class="form-check-label" for="defaultRadio2">Yes</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Packing Group:</label>
                                <select class="form-select" name="packing_group">
                                    <option selected disabled></option>
                                    <option value="none">None</option>
                                    <option value="i(high-danger)">I (High Danger)</option>
                                    <option value="ii(med-danger)">II (Med Danger)</option>
                                    <option value="iii(low-danger)">III (Low Danger)</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Hazmat Code</label>
                                <input name="hazmat_code" type="text" class="form-control"/>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">Hazmat Class:</label>
                                <select class="form-select" name="packing_group">
                                    <option selected disabled></option>
                                    <option value="">Class not specified</option>
                                    <option>Class 1 Explosive: division not specified</option>
                                    <option>Class 1.1 Explosive: mass</option>
                                    <option>Class 1.2 Explosive: projection</option>
                                    <option>Class 1.3 Explosive: fire and minor blast/projection</option>
                                    <option>Class 1.4 Explosive: minor</option>
                                    <option>Class 1.5 Explosive: insensitive mass</option>
                                    <option>Class 1.6 Explosive: insensitive minor</option>
                                    <option>Class 2 Gas: division not specified</option>
                                    <option>Class 2.1 Gas: flammable</option>
                                    <option>Class 2.2 Gas: nonflammable/nonpoisonous/oxygen</option>
                                    <option>Class 2.3 Gas: poison</option>
                                    <option>Class 3 Flammable Liquid and Combustible Liquid</option>
                                    <option>Class 4 Solid: division not specified</option>
                                    <option>Class 4.1 Flammable Solid</option>
                                    <option>Class 4.2 Spontaneously Combustible Solid</option>
                                    <option>Class 4.3 Dangerous When Wet</option>
                                    <option>Class 5 Oxidizer: division not specified</option>
                                    <option>Class 5.1 Oxidizer</option>
                                    <option>Class 5.2 Organic Peroxide</option>
                                    <option>Class 6 Poison, Toxic or Inhalation Hazard</option>
                                    <option>Class 7 Radioactive Materials</option>
                                    <option>Class 8 Corrosive</option>
                                    <option>Class 9 Miscellaneous</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Chemical Name</label>
                                <input name="chemical_name" type="text" class="form-control"/>
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">UNO Code</label>
                                <input name="uno_code" type="text" class="form-control"/>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="row mt-3">
                        <h5>Duty Detail:</h5>
                        <div class="col-md-12 col-12">
                            <div class="mb-2">
                                <label class="form-label">SRO</label>
                                <input name="sro" type="text" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Insurance</label>
                                <input name="insurance" type="text" class="form-control" placeholder="0.00"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">I. Tax %</label>
                                <input name="i_tax" type="text" class="form-control" placeholder="0.00"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">RD %</label>
                                <input name="rd" type="text" class="form-control" placeholder="0.00"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Landing/Ins. %</label>
                                <input name="land_ins" type="text" class="form-control" placeholder="0.00"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">S.ITax %</label>
                                <input name="s_itax" type="text" class="form-control" placeholder="0.00"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">CD %</label>
                                <input name="cd" type="text" class="form-control" placeholder="0.00"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">FED %</label>
                                <input name="fed" type="text" class="form-control" placeholder="0.00"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Add.STax %</label>
                                <input name="add_stax" type="text" class="form-control" placeholder="0.00"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Fine</label>
                                <input name="fine" type="text" class="form-control" placeholder="0.00"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">Add.CD %</label>
                                <input name="add_cd" type="text" class="form-control" placeholder="0.00"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">E.T.O</label>
                                <input name="eto" type="text" class="form-control" placeholder="0.00"/>
                            </div>
                        </div>
                        
                        
                    </div>
                     
                </div>
            </div>
        </form>
    </div>
@endsection
