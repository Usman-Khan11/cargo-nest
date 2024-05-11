@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus">
            <i class="fa fa-square-plus"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton"></i>
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
            <a href="{{route('admin.commodity')}}"><i class="fa fa-file-lines"></i></a>
        </div>
    </div>

</div>
@endsection

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="post" action="{{ route('admin.commodity.store') }}" id="myForm" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                    <!--<hr />-->
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
                                <input name="short_code" type="text" class="form-control" placeholder="" />
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
                                    <option value="GI">GI</option>
                                    <option value="CAR">CAR</option>
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
                                <input style="width:15px; height:15px;" name="inactive" value="inactive" type="checkbox" /><span>&nbsp;&nbsp;In-Active</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        
                        <h5>Hazmat Details:</h5>
                        
                       <div class="col-md-12 col-12">
                            <label class="form-label">Hazmat Product?</label>
                            <div class="d-flex">
                                <div class="mb-2">
                                    <input name="hazmat_product" type="radio" class="form-check-input" value="No" id="defaultRadio1" />
                                    <label class="form-check-label" for="defaultRadio1">No</label>
                                </div>
                                <div class="mb-2 px-3">
                                    <input name="hazmat_product" type="radio" class="form-check-input" value="Yes" id="defaultRadio2" />
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
                                <select class="form-select" name="hazmat_class">
                                    <option value="" selected disabled></option>
                                    <option value="ClassNotSpecified">Class not specified</option>
                                    <option value="Class1ExplosiveDivisionNotSpecified">Class 1 Explosive: division not specified</option>
                                    <option value="Class1_1ExplosiveMass">Class 1.1 Explosive: mass</option>
                                    <option value="Class1_2ExplosiveProjection">Class 1.2 Explosive: projection</option>
                                    <option value="Class1_3ExplosiveFireAndMinorBlastProjection">Class 1.3 Explosive: fire and minor blast/projection</option>
                                    <option value="Class1_4ExplosiveMinor">Class 1.4 Explosive: minor</option>
                                    <option value="Class1_5ExplosiveInsensitiveMass">Class 1.5 Explosive: insensitive mass</option>
                                    <option value="Class1_6ExplosiveInsensitiveMinor">Class 1.6 Explosive: insensitive minor</option>
                                    <option value="Class2GasDivisionNotSpecified">Class 2 Gas: division not specified</option>
                                    <option value="Class2_1GasFlammable">Class 2.1 Gas: flammable</option>
                                    <option value="Class2_2GasNonflammableNonpoisonousOxygen">Class 2.2 Gas: nonflammable/nonpoisonous/oxygen</option>
                                    <option value="Class2_3GasPoison">Class 2.3 Gas: poison</option>
                                    <option value="Class3FlammableLiquidAndCombustibleLiquid">Class 3 Flammable Liquid and Combustible Liquid</option>
                                    <option value="Class4SolidDivisionNotSpecified">Class 4 Solid: division not specified</option>
                                    <option value="Class4_1FlammableSolid">Class 4.1 Flammable Solid</option>
                                    <option value="Class4_2SpontaneouslyCombustibleSolid">Class 4.2 Spontaneously Combustible Solid</option>
                                    <option value="Class4_3DangerousWhenWet">Class 4.3 Dangerous When Wet</option>
                                    <option value="Class5OxidizerDivisionNotSpecified">Class 5 Oxidizer: division not specified</option>
                                    <option value="Class5_1Oxidizer">Class 5.1 Oxidizer</option>
                                    <option value="Class5_2OrganicPeroxide">Class 5.2 Organic Peroxide</option>
                                    <option value="Class6PoisonToxicOrInhalationHazard">Class 6 Poison, Toxic or Inhalation Hazard</option>
                                    <option value="Class7RadioactiveMaterials">Class 7 Radioactive Materials</option>
                                    <option value="Class8Corrosive">Class 8 Corrosive</option>
                                    <option value="Class9Miscellaneous">Class 9 Miscellaneous</option>
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
                                <input name="landing_insurance" type="text" class="form-control" placeholder="0.00"/>
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
                                <input name="cd%" type="text" class="form-control" placeholder="0.00"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-2">
                                <label class="form-label">FED %</label>
                                <input name="fed%" type="text" class="form-control" placeholder="0.00"/>
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
                        <div class="col-md-12 col-12">
                            <div class="d-flex mt-4">
                                <div class="mb-2">
                                    <input name="item" type="radio" class="form-check-input" value="Shipping Item" id="defaultRadio1" />
                                    <label class="form-check-label" for="defaultRadio1">Shipping Item</label>
                                </div>
                                <div class="mb-2 px-3">
                                    <input name="item" type="radio" class="form-check-input" value="Warehouse Item" id="defaultRadio2" />
                                    <label class="form-check-label" for="defaultRadio2">Warehouse Item</label>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                </div>
            </div>
        </form>
    </div>
@endsection

@push('script')

<script>
    $('#submitButton').click(function(){
        // Trigger form submission
        $('#myForm').submit();
      });
</script>

@endpush











