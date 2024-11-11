@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/commodity/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/commodity/delete')">
            <i class="fa fa-circle-xmark" title="Delete"></i>
        </div>
        <div class="refresh">
            <i class="fa fa-refresh" title="Reload"></i>
        </div>
        <div class="lock">
            <i class="fa fa-lock" title="Lock"></i>
        </div>
        <div class="ban">
            <i class="fa fa-ban" title="Void"></i>
        </div>
        <div class="backward navigation" data-type="first">
            <i class="fa fa-backward-step" title="First"></i>
        </div>
        <div class="backward navigation" data-type="backward">
            <i class="fa fa-backward" title="Backward"></i>
        </div>
        <div class="forward navigation" data-type="forward">
            <i class="fa fa-forward" title="Forward"></i>
        </div>
        <div class="forward navigation" data-type="last">
            <i class="fa fa-forward-step" title="Last"></i>
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
        <div class="row row-match-height">
            <div class="col-md-6">
                <form method="post" action="{{ route('admin.commodity.store') }}" id="myForm" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                </div>
                <div class="card-body">
                    <input name="id" type="hidden" value="0" />
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Code:</label>
                                <input name="code" type="text" class="form-control code" value="{{ $commodity_num }}" readonly/>
                            </div>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="mb-2">
                                <label class="form-label">Name:</label>
                                <input name="name" type="text" class="form-control name" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Shortcode:</label>
                                <input name="short_code" type="text" class="form-control short_code" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Hs Code:</label>
                                <input name="hs_code" type="text" class="form-control hs_code" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Cargo Type:</label>
                                <select class="form-select cargo_type" name="cargo_type">
                                    <option selected></option>
                                    <option value="GI">GI</option>
                                    <option value="CAR">CAR</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-7 col-12">
                            <div class="mb-2">
                                <label class="form-label">Commodity Group:</label>
                                <select class="form-select commodity_group" name="commodity_group">
                                    <option selected></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5 col-12">
                            <div class="mb-2 mt-4">
                                <label class="form-label"></label>
                                <input style="width:15px; height:15px;" name="inactive" class="inactive" value="inactive" type="checkbox" /><span>&nbsp;&nbsp;In-Active</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        
                        <h5>Hazmat Details:</h5>
                        
                       <div class="col-md-4 col-12">
                            <label class="form-label">Hazmat Product?</label>
                            <div class="d-flex">
                                <div class="mb-2">
                                    <input name="hazmat_product" type="radio" class="form-check-input hazmat_product" value="No" id="defaultRadio1" checked />
                                    <label class="form-check-label" for="defaultRadio1">No</label>
                                </div>
                                <div class="mb-2 px-3">
                                    <input name="hazmat_product" type="radio" class="form-check-input hazmat_product" value="Yes" id="defaultRadio2" />
                                    <label class="form-check-label" for="defaultRadio2">Yes</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Packing Group:</label>
                                <select class="form-select packing_group" name="packing_group">
                                    <option selected disabled></option>
                                    <option value="none">None</option>
                                    <option value="i(high-danger)">I (High Danger)</option>
                                    <option value="ii(med-danger)">II (Med Danger)</option>
                                    <option value="iii(low-danger)">III (Low Danger)</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Hazmat Code</label>
                                <input name="hazmat_code" type="text" class="form-control hazmat_code"/>
                            </div>
                        </div>
                        
                        <div class="col-md-5 col-12">
                            <div class="mb-2">
                                <label class="form-label">Hazmat Class:</label>
                                <select class="form-select hazmat_class" name="hazmat_class">
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
                        
                        <div class="col-md-4 col-12">
                            <div class="mb-2">
                                <label class="form-label">Chemical Name</label>
                                <input name="chemical_name" type="text" class="form-control chemical_name"/>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-12">
                            <div class="mb-2">
                                <label class="form-label">UNO Code</label>
                                <input name="uno_code" type="text" class="form-control uno_code"/>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-4 col-12">
                            <h5>Duty Detail:</h5>
                        </div>
                        <div class="col-md-4 col-12">
                            <!--<label class="form-label">Hazmat Product?</label>-->
                            <div class="d-flex">
                                <div class="mb-2">
                                    <input name="duty_detail" type="radio" class="form-check-input" value="No" id="duty_detail_1" checked />
                                    <label class="form-check-label" for="duty_detail_1">No</label>
                                </div>
                                <div class="mb-2 px-3">
                                    <input name="duty_detail" type="radio" class="form-check-input" value="Yes" id="duty_detail_2" />
                                    <label class="form-check-label" for="duty_detail_2">Yes</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 duty_detail" style="display:none;">
                            <div class="row">
                                <div class="col-md-5 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">SRO</label>
                                        <input name="sro" type="text" class="form-control sro"/>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Insurance</label>
                                        <input name="insurance" type="text" class="form-control insurance" placeholder="0.00"/>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">I. Tax %</label>
                                        <input name="i_tax" type="text" class="form-control i_tax" placeholder="0.00"/>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">RD %</label>
                                        <input name="rd" type="text" class="form-control rd" placeholder="0.00"/>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Landing/Ins. %</label>
                                        <input name="landing_insurance" type="text" class="form-control landing_insurance" placeholder="0.00"/>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">S.ITax %</label>
                                        <input name="s_itax" type="text" class="form-control s_itax" placeholder="0.00"/>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">CD %</label>
                                        <input name="cd%" type="text" class="form-control cd" placeholder="0.00"/>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">FED %</label>
                                        <input name="fed%" type="text" class="form-control fed" placeholder="0.00"/>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Add.STax %</label>
                                        <input name="add_stax" type="text" class="form-control add_stax" placeholder="0.00"/>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Fine</label>
                                        <input name="fine" type="text" class="form-control fine" placeholder="0.00"/>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Add.CD %</label>
                                        <input name="add_cd" type="text" class="form-control add_cd" placeholder="0.00"/>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">E.T.O</label>
                                        <input name="eto" type="text" class="form-control eto" placeholder="0.00"/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="d-flex mt-4">
                                        <div class="mb-2">
                                            <input name="item" type="radio" class="form-check-input atom" value="Shipping Item" id="shipping_term" />
                                            <label class="form-check-label" for="shipping_term" style="font-size:13px;">Shipping Item</label>
                                        </div>
                                        <div class="mb-2 px-3">
                                            <input name="item" type="radio" class="form-check-input atom" value="Warehouse Item" id="warehouse_item" />
                                            <label class="form-check-label" for="warehouse_item" style="font-size:13px;">Warehouse Item</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                    
                </div>
            </div>
        </form>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="responsive text-nowrap">
                            <table class="table table-bordered table-sm quotation_record"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

<script>
$('#submitButton').click(function(){
    $('#myForm').submit();
});
      
$(document).ready(function(){
    var datatable = $('.quotation_record').DataTable({
        select: {
            style: 'api'
        },
        "processing": true,
        "serverSide": true,
        "lengthChange": false,
        "pageLength": 10,
        "scrollX": true,
        "ajax": {
            "url": "{{ route('admin.commodity.create') }}",
            "type": "get",
            "data": function(d) {
                
            },
        },
        columns: [
            {
                data: 'code',
                title: 'Code'
            },
            {
                data: 'name',
                title: 'Name'
            },
            {
                data: 'cargo_type',
                title: 'Cargo Type'
            },
            {
                data: 'short_code',
                title: 'Short Code'
            },
            {
                data: 'hs_code',
                title: 'HS Code'
            },
            {
                data: 'cargo_type',
                title: 'Cargo Type'
            },
            {
                data: 'inactive',
                title: 'Activity'
            },
            {
                data: 'commodity_group',
                title: 'Commodity Group'
            },
        ],          
         "rowCallback": function(row, data) {
             $(row).attr("onclick",`edit_row(this,'${JSON.stringify(data)}')`)
         }
    });
});

function edit_row(e,data){
    data = JSON.parse(data);
    console.log(data)
    if(data){
        $(".code").val(data.code);
        $(".name").val(data.name);
        $(".short_code").val(data.short_code);
        $(".hs_code").val(data.hs_code);
        $(".cargo_type").val(data.cargo_type);
        $(".commodity_group").val(data.commodity_group);
        
        $(".inactive").removeAttr('checked');
        if(data.inactive){
            $(`.inactive[value=${data.inactive}]`).attr('checked',true);
        }
        
        $(".hazmat_product").removeAttr('checked');
        $(`.hazmat_product[value=${data.hazmat_product}]`).attr('checked',true);
        $(".packing_group").val(data.packing_group);
        $(".hazmat_code").val(data.hazmat_code);
        $(".hazmat_class").val(data.hazmat_class);
        $(".chemical_name").val(data.chemical_name);
        $(".uno_code").val(data.uno_code);
        
        $(".sro").val(data.sro);
        $(".insurance").val(data.insurance);
        $(".i_tax").val(data.i_tax);
        $(".rd").val(data.rd);
        $(".landing_insurance").val(data.landing_insurance);
        $(".s_itax").val(data.s_itax);
        $(".cd").val(data.cd);
        $(".fed").val(data.fed);
        $(".add_stax").val(data.add_stax);
        $(".fine").val(data.fine);
        $(".add_cd").val(data.add_cd);
        $(".eto").val(data.eto);
        
        $(".atom").removeAttr('checked');
        $(`.atom[value=${data.item}]`).attr('checked',true);
        
        $("#myForm").attr("action","{{ route('admin.commodity.update') }}")
        $("input[name=id]").val(data.id);
    }
    
}

$(".navigation").click(function () {
  let id = $("input[name=id]").val();
  let route = "/admin/commodity/get";
  let type = $(this).attr("data-type");
  let data = getList(route, type, id);
  if (data != null) {
    edit_row("", JSON.stringify(data));
  }
});


$("input[name=duty_detail]").click(function () {
    let val = $(this).val();
    if(val === "Yes"){
        $(".duty_detail").show();
    } else {
        $(".duty_detail").hide();
    }
})
</script>

@endpush