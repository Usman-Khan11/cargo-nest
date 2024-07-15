@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/guarantee_letter_template/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/guarantee_letter_template/delete')">
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
        <form id="myForm" method="post" action="{{ route('admin.guarantee_letter_template.store') }}" enctype="multipart/form-data">
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
                                <div class="col-md-4">
                                    <label for="">Letter Code :</label>
                                    <input type="text" class="form-control" name="">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Name :</label>
                                    <input type="text" name="" class="form-control" id="">
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="row" >
                                <div class="col-md-5">
                                    <label for=""> Type :</label>
                                    <div class="row" style="border: 2px solid black;">
                                        <div class="col-md-1">
                                            <input type="radio" name="" id="">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="">Template</label>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="radio" name="" id="">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="Maual">Manual</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label for="">Operation Type :</label>
                                    <select name="" class="form-control" id="">
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-7">
                                    <label for="">Path :</label>
                                    <input type="text" class="form-control" name="">
                                </div>
                                <div class="col-md-0 mt-5">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <div class="col-md-0 mt-5">
                                    <i class="fa-solid fa-globe"></i>
                                </div>
                                <div class="col-md-2 mt-5">
                                    <button>Show Tags</button>
                                </div>
                                <div class="col-md-2">
                                    <div class="row">
                                        <div class="col-md-9 mt-5">
                                            <label for="">Download Tags</label>
                                        </div>
                                        <div class="col-md-3 mt-5">
                                            <i class="fa-regular fa-calendar-days"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-7">
                                    <!-- <div class="row"> -->
                                    <!-- <div class="col-md-2"> -->
                                    <label for="">Reference #:</label>
                                    <!-- </div> -->
                                    <div class="col-md-12" style="border: 2px solid black;">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label for="">Prefix</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="col-md-3">
                    
                                                <label for="">P-Seperator</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">Number</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">S-Seperator</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label for=""> Suffix</label>
                                                <input type="text" class="form-control">
                    
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </div>
                                <div class="col-md-5 mt-2">
                    
                                    <label for="">Type :</label>
                                    <select name="" class="form-control" id="">
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="">Based On :</label>
                                    <select name="" class="form-control" id="">
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <div class="row mt-4">
                                        <div class="col-md-1">
                                            <input type="checkbox" class="form-control" name="" id="">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Available For Job</label>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="checkbox" name="" class="form-control" id="">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Available For ManifestHeader</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="">Attention Type :</label>
                                    <select name="" class="form-control" id="">
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="">Print Number :</label>
                                    <input type="number" name="" class="form-control" id="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Attention To:</label>
                                    <input type="text" class="form-control" name="">
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
            "url": "{{ route('admin.guarantee_letter_template.create') }}",
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
        $("#myForm").attr("action","{{ route('admin.guarantee_letter_template.update') }}")
        $("input[name=id]").val(data.id);
    }
}

$(".navigation").click(function(){
    let id = $("input[name=id]").val();
    let route = '/admin/guarantee_letter_template/get';
    let type = $(this).attr('data-type');
    let data = getList(route, type, id);
    if(data != null){
        edit_row('', JSON.stringify(data));
    }
})

</script>
@endpush