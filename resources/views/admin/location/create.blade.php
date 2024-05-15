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
            <i class="fa fa-file-lines"></i>
        </div>
    </div>

</div>
@endsection

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-6">
                <form id="myForm" method="post" action="{{ route('admin.location.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" />
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Location:</label>
                                        <input name="location" type="text" class="form-control locate" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <label class="form-label">.</label>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-2">
                                                <input style="width:14px; height:14px;" name="location_check[]" class="location_check" type="checkbox" value="country" /><span>&nbsp;&nbsp;Country</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-2">
                                                <input style="width:14px; height:14px;" name="location_check[]" class="location_check" type="checkbox" value="city" /><span>&nbsp;&nbsp;City</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-2">
                                                <input style="width:14px; height:14px;" name="location_check[]" class="location_check" type="checkbox" value="airport" /><span>&nbsp;&nbsp;Airport</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-2">
                                                <input style="width:14px; height:14px;" name="location_check[]" class="location_check" type="checkbox" value="seaport" /><span>&nbsp;&nbsp;Seaport</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-2">
                                                <input style="width:14px; height:14px;" name="location_check[]" class="location_check" type="checkbox" value="terminals" /><span>&nbsp;&nbsp;Terminals</span>
                                            </div>
                                        </div>
                                    </div>
        
                                    
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Co-ordinates:</label>
                                        <input name="co_ordinates" type="text" class="form-control co_ordinates" placeholder="" />
                                    </div>
                                </div> 
                                <div class="col-md-3 col-12">
                                    <div class="mb-2 mt-4">
                                        <input style="width:15px; height:15px;" name="inactive" class="inactive" type="checkbox" value="In-Active" /><span>&nbsp;&nbsp;In-Active</span>
                                    </div>
                                </div> 
                                <div class="col-md-5 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Latitude:</label>
                                        <input name="latitude" type="number" class="form-control latitude" placeholder="0.000000" />
                                    </div>
                                </div> 
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">State:</label>
                                        <input name="state" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div> 
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Longitude:</label>
                                        <input name="longitude" type="number" class="form-control longitude" placeholder="0.000000" />
                                    </div>
                                </div> 
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Phone Prefix:</label>
                                        <input name="phone_prefix" type="text" class="form-control phone_prefix" placeholder="" />
                                    </div>
                                </div> 
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">EPASS Code:</label>
                                        <input name="epass_code" type="text" class="form-control epass_code" placeholder="" />
                                    </div>
                                </div> 
                                <div class="col-md-8 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Country/Region:</label>
                                        <textarea name="country_region" type="text" rows="4" class="form-control country_region" placeholder=""></textarea>
                                    </div>
                                </div> 
                                <div class="col-md-12 col-12">
                                    <a><button class="btn btn-primary btn-sm">Change Utility</button></a>
                                    <a><button class="btn btn-primary btn-sm">Active & Inactive Log</button></a>
                                </div> 
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="responsive text-nowrap">
                            <table class="table table-bordered table-sm quotation_record">
                                <thead class="table-primary">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
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
        </div>
    </div>
@endsection


@push('script')

<script>
    $('#submitButton').click(function(){
        // Trigger form submission
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
        "pageLength": 15,
        "scrollX": true,
        "ajax": {
            "url": "{{ route('admin.location.create') }}",
            "type": "get",
            "data": function(d) {
                var frm_data = $('#result_report_form').serializeArray();
                $.each(frm_data, function(key, val) {
                    d[val.name] = val.value;
                });
            },
        },
        columns: [
            {
                data: 'DT_RowIndex',
                title: 'Sr No'
            },
            {
                data: 'location',
                title: 'Location'
            },
            {
                data: 'location_check',
                title: 'Check'
            },
            {
                data: 'latitude',
                title: 'Latitude'
            },
            {
                data: 'longitude',
                title: 'Longitude'
            }
            
        ],          
         "rowCallback": function(row, data) {
             $(row).attr("onclick",`edit_row(this,'${JSON.stringify(data)}')`)
         }
    });
});




function edit_row(e,data){
    data = JSON.parse(data);
    if(data){
        $(".locate").val(data.location);
        $(".co_ordinates").val(data.co_ordinates);
        $(".inactive").removeAttr('checked');
        $(`.inactive[value=${data.inactive}]`).attr('checked',true);
       
        $(".latitude").val(data.latitude);
        $(".state").val(data.state);
        $(".longitude").val(data.longitude);
        $(".phone_prefix").val(data.phone_prefix);
        $(".epass_code").val(data.epass_code);
        $(".country_region").val(data.country_region);
        
        //var locations = JSON.stringify(data.location_check);
        //locations = JSON.parse(locations);
        //console.log(locations);
        
        
        
        $("#myForm").attr("action","{{ route('admin.location.update') }}")
         $("input[name=id]").val(data.id);
    }
    
}



</script>

@endpush










