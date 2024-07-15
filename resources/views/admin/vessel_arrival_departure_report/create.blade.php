@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/vessel_arrival_departure_report/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/vessel_arrival_departure_report/delete')">
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

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="myForm" method="post" action="{{ route('admin.vessel_arrival_departure_report.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0" />
                            <div class="row">
                                <div class="col-md-8" style="border: 1px solid rgb(54, 54, 254);">
                                    <div class="mb-2">
                                        <input type="radio" id="Vissel Wise" name="fav_language" value="HTML">
                                        <label for="Vissel Wise">Arrival</label>
                                        <input type="radio" id="Shiping Line Wise" name="fav_language" value="CSS">
                                        <label for="Shiping Line Wise">Departure</label>
                                        <input type="radio" id="No Grouping" name="fav_language" value="JavaScript">
                                        <label for="No Grouping">Arrival/Departure</label>
                                        <input type="radio" id="No Grouping" name="fav_language" value="JavaScript">
                                        <label for="No Grouping">Pending</label>
                                        <input type="radio" id="No Grouping" name="fav_language" value="JavaScript">
                                        <label for="No Grouping">In/Out</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="mb-2" style="margin-top: 40px;">
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="Sales Rep" value="Soc" class="form-check-input">
                                                    All
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">From:</label>
                                               <input id="cost" name="From" type="date" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Till:</label>
                                               <input id="cost" name="Till" type="date" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Vessel:</label>
                                               <input id="cost" name="Vessel" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">ship License:</label>
                                               <input id="cost" name="ship License" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Terminal:</label>
                                               <input id="cost" name="Terminal" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="" class="form-label">status:</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                
                                                <option value="Sort"></option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="" class="form-label">Report Type:</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                
                                                <option value="Sort">Detail Report</option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label for="" class="form-label">Output to:</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                
                                                <option value="Sort">Viewer</option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Voyage:</label>
                                               <input id="cost" name="Voyage" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2" style="margin-top: 35px;">
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                                   show Only Zero Balance Vessel
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                                   Exclude Zero Balance 
                                                </label><br>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                                   Include Offhire
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="responsive text-nowrap">
                                <table class="table table-bordered table-sm quotation_record"></table>
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
    $('#myForm').submit();
});

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
            "url": "{{ route('admin.vessel_arrival_departure_report.create') }}",
            "type": "get",
            "data": function(d) {},
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
});

function addNewRow(e){
    $(e).parent().parent().clone().prependTo(".detail_repeater");
    $(".detail_repeater tr:last").find("input").val(null);
    $(".detail_repeater tr:last").find("option").removeAttr("selected");
}

function delRow(e){
    if($(".detail_repeater tr").length <= 1) return;
    $(e).parent().parent().remove();
}

function addlocalRow(e){
    $(e).parent().parent().clone().prependTo(".local_repeater");
    $(".local_repeater tr:last").find("input").val(null);
    $(".local_repeater tr:last select").find("option").attr("selected",false);
}

function dellocalRow(e){
    if($(".local_repeater tr").length <= 1) return;
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
        $("#myForm").attr("action","{{ route('admin.vessel_arrival_departure_report.update') }}")
        $("input[name=id]").val(data.id);
    }
}

$(".navigation").click(function(){
    let id = $("input[name=id]").val();
    let route = '/admin/vessel_arrival_departure_report/get';
    let type = $(this).attr('data-type');
    let data = getList(route, type, id);
    if(data != null){
        edit_row('', JSON.stringify(data));
    }
})

</script>
@endpush