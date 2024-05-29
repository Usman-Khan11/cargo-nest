@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark">
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
            <i class="fa fa-forward-step" title="Back"></i>
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

@php
$vessel_id = @$_GET["vessel_id"];
@endphp

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="myForm" method="post" action="{{ route('admin.voyage.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row match-height">
                <div class="col-md-6">
                    <div class="card mb-4">
                            <div class="card-header">
                                <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                                <!--<hr />-->
                            </div>
                            <div class="card-body">
                                <input name="id" type="hidden" />
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Vessel:</label>
                                            <select name="vessel" class="form-select vessel">
                                                <option selected></option>
                                                @foreach($vessels as $value)
                                                <option @if($vessel_id == $value->id) selected @endif value="{{ $value->id }}">{{ $value->vessel_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Voyage</label>
                                            <input name="voy" type="text" class="form-control voy" placeholder="" />
                                        </div>    
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Code</label>
                                            <input name="discharge_code" type="text" class="form-control discharge_code" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Port of Dischage</label>
                                            <input name="port_of_discharge" type="text" class="form-control port_of_discharge" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Code</label>
                                            <input name="loading_code" type="text" class="form-control loading_code" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Port of Loading</label>
                                            <input name="port_of_loading" type="text" class="form-control port_of_loading" placeholder="" />
                                        </div>
                                    </div>
                                    
                                     <div class="col-md-8 col-12">
                                        <label class="form-check-label mb-2">Type:</label>
                                        <div class="d-flex">
                                            <div class="mb-2">
                                                <input name="type" type="radio" class="form-check-input type" value="Import" id="defaultRadio1" />
                                                <label class="form-check-label" for="defaultRadio1">Import</label>
                                            </div>
                                            <div class="mb-2 px-3">
                                                <input name="type" type="radio" class="form-check-input type" value="Export" id="defaultRadio2" />
                                                <label class="form-check-label" for="defaultRadio2">Export</label>
                                            </div>
                                            <div class="mb-2 px-3">
                                                <input name="type" type="radio" class="form-check-input type" value="Both" id="defaultRadio3" />
                                                <label class="form-check-label" for="defaultRadio3">Both</label>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    <div class="card mb-4">
                        <div class="p-3">
                            <div class="card-datatable table-responsive pt-0">
                                <table class="datatables-basic table" style="width:100%;">
                                    <thead>
                                      <tr>
                                        <th>...</th>
                                        <th>...</th>
                                        <th>S.No</th>
                                        <th>Currency</th>
                                        <th>Selling</th>
                                        <th>Buying</th>
                                      </tr>
                                    </thead>
                                    <tbody class="detail_repeater">
                                        <td><i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                        <td><i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                        <td><input name="" type="text" style="width: 100%;"/></td>
                                        <td>
                                            <select name="currency[]" style="width: 100%;">
                                                <option selected disabled></option>
                                                @foreach($currencies as $currency)
                                                    <option value="{{ $currency->id }}">{{ $currency->name }}</option> 
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input name="selling[]" type="text" style="width: 100%;"/></td>
                                        <td><input name="buying[]" type="text" style="width: 100%;"/></td>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Vessel:</label>
                                        <select name="vessel_search" class="form-select ">
                                            <option selected value=''></option>
                                            @foreach($vessels as $value)
                                            <option @if($vessel_id == $value->id) selected @endif value="{{ $value->id }}">{{ $value->vessel_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Voyage</label>
                                        <input name="voyage_name" type="text" class="form-control" placeholder="" />
                                    </div>    
                                </div>
                            </div>      
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
                        <h4 class="text-center bg-primary text-white">Local Port</h4>
                        <div class="card-datatable table-responsive pt-0">
                            <table class="datatables-basic table" style="width:200%;">
                                <thead>
                                  <tr>
                                    <th>...</th>
                                    <th>...</th>
                                    <th>S.No</th>
                                    <th>Code</th>
                                    <th>Local Port</th>
                                    <th>Arrival Date (Local Inward)</th>
                                    <th>Sailing Date (Local Outward)</th>
                                    <th>VIR No/ Rotation #</th>
                                    <th>EGM No</th>
                                    <th>EGM Date</th>
                                    <th>Code</th>
                                    <th>Slot Operator Name</th>
                                    <th>SCN #</th>
                                    <th>SA Code</th>
                                    <th>Yard Opening Date</th>
                                    <th>Yard Opening Time</th>
                                    <th>Yard Closing Date</th>
                                    <th>Yard Closing Time</th>
                                  </tr>
                                </thead>
                                <tbody class="detail_repeater">
                                    <td><i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                    <td><i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                    <td><input name="" type="text" style="width: 100%;"/></td>
                                    <td><input name="code[]" type="text" style="width: 100%;"/></td>
                                    <td><input name="local_port[]" type="text" style="width: 100%;"/></td>
                                    <td><input name="arrival_date[]" type="text" style="width: 100%;"/></td>
                                    <td><input name="sailing_date[]" type="text" style="width: 100%;"/></td>
                                    <td><input name="vir_no[]" type="text" style="width: 100%;"/></td>
                                    <td><input name="egm_no[]" type="text" style="width: 100%;"/></td>
                                    <td><input name="egm_date[]" type="text" style="width: 100%;"/></td>
                                    <td><input name="code2[]" type="text" style="width: 100%;"/></td>
                                    <td><input name="slot_operator[]" type="text" style="width: 100%;"/></td>
                                    <td><input name="scn[]" type="text" style="width: 100%;"/></td>
                                    <td><input name="sa_code[]" type="text" style="width: 100%;"/></td>
                                    <td><input name="opening_date[]" type="text" style="width: 100%;"/></td>
                                    <td><input name="opening_time[]" type="text" style="width: 100%;"/></td>
                                    <td><input name="closing_date[]" type="text" style="width: 100%;"/></td>
                                    <td><input name="closing_time[]" type="text" style="width: 100%;"/></td>
                                </tbody>
                            </table>
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
      
    let vessel_id = $("select[name=vessel_search]").val();

    $(document).ready(function(){
    var datatable = $('.quotation_record').DataTable({
        select: {
            style: 'api'
        },
        "processing": true,
        "searching": false,
        "serverSide": true,
        "lengthChange": false,
        "pageLength": 10,
        "scrollX": true,
        "ajax": {
            "url": "{{ route('admin.voyage.create') }}",
            "type": "get",
            "data": function(d) {
                d.vessel_id = $("select[name=vessel_search]").val();
                d.voyage_name = $("input[name=voyage_name]").val();
            },
        },
        columns: [
            {
                title: 'Vessel',
                "render": function(data, type, full, meta) {
                    if(full.vessel){
                        return full.vessel.vessel_name;
                    } else {
                        return '-';
                    }
                }
            },
            {
                data: 'voy',
                title: 'Voyage'
            },
            {
                data: 'port_of_discharge',
                title: 'Port of Dischage'
            },
            {
                data: 'port_of_loading',
                title: 'Port of Loading'
            },
            {
                data: 'type',
                title: 'Type'
            },
            
        ],          
         "rowCallback": function(row, data) {
             $(row).attr("onclick",`edit_row(this,'${JSON.stringify(data)}')`)
         }
    });
    
    $("select[name=vessel_search]").change(function(){
        datatable.ajax.reload();
    })
    $("input[name=voyage_name]").keyup(function(){
        datatable.ajax.reload();
    })
});

    function addNewRow(e){
        $(e).parent().parent().clone().prependTo(".detail_repeater");
    }
    
    function delRow(e){
        if($(".detail_repeater tr").length <= 1) return;
        $(e).parent().parent().remove();
    }


function edit_row(e,data){
    data = JSON.parse(data);
    if(data){
        $(".vessel").find(`option[value=${data.vessel.id}]`).attr('selected','selected');
        $(".voy").val(data.voy);
        $(".port_of_discharge").val(data.port_of_discharge);
        $(".port_of_loading").val(data.port_of_loading);
        $(".type").removeAttr('checked');
        $(`.type[value=${data.type}]`).attr('checked',true);
        $("#myForm").attr("action","{{ route('admin.voyage.update') }}")
        $("input[name=id]").val(data.id);
    }
}

$(".navigation").click(function(){
    let id = $("input[name=id]").val();
    let route = '/admin/voyage/get';
    let type = $(this).attr('data-type');
    let data = getList(route, type, id);
    if(data != null){
        edit_row('', JSON.stringify(data));
    }
})

</script>
@endpush









