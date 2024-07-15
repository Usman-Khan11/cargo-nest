@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/crt_edi/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/crt_edi/delete')">
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
        <form id="myForm" method="post" action="{{ route('admin.crt_edi.store') }}" enctype="multipart/form-data">
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
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-2" style="margin-top: 35px;">
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                                    Apply Date
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label for="" class="form-label"></label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                <option value="Sort">Job Date</option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">From:</label>
                                               <input id="cost" name="From" type="date" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Till:</label>
                                               <input id="cost" name="Till" type="date" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="" class="form-label">Vessel/Voyage:</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                
                                                <option value="Sort"></option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Job#:</label>
                                               <input id="cost" name="Job#" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Principle:</label>
                                               <input id="cost" name="Principle" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label for="" class="form-label">Category:</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                
                                                <option value="Sort">Sea Import</option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2" style="margin-top: 35px;">
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="Sales Rep" value="Soc" class="form-check-input">
                                                    Received
                                                </label>
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="Sales Rep" value="Soc" class="form-check-input">
                                                    Paid
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label for="" class="form-label">Currency:</label>
                                               <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                
                                                <option value="Sort"></option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="btn">
                                                <button class="btn btn-primary btn-sm">Pick Charges</button>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-6">
                                        <div class="btn">
                                            <button class="btn btn-primary btn-sm">Import</button>
                                        </div>
                                        <div class="btn">
                                            <button class="btn btn-primary btn-sm">Export</button>
                                        </div>
                                        <div class="btn">
                                            <button class="btn btn-primary btn-sm">Detention</button>
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
                                        <th>...</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Operation type</th>
                                        <th scope="col">Ref NO</th>
                                        <th scope="col">Job #</th>
                                        <th scope="col">Charges Code</th>
                                        <th scope="col">Charge Name</th>
                                        <th scope="col">size/Type</th>
                                        <th scope="col">Rate Group</th>
                                        <th scope="col">DG/Non DG</th>
                                        <th scope="col">containers</th>
                                        <th scope="col">DR/CR</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Rate</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Discount</th>
                                        <th scope="col">Net Amount</th>
                                        <th scope="col">Margin</th>
                                        <th scope="col">Tax</th>
                                        <th scope="col">Tax Amount</th>
                                        <th scope="col">Net Include Tax Amount</th>
                                        <th scope="col">Currency</th>
                                        <th scope="col">Ex Rate</th>
                                        <th scope="col">Local Amount</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                      </tr>
                                    </thead>
                                    <tbody class="detail_repeater">
                                        <tr>
                                            <td><i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                            <td><i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                            <td><input type="checkbox"></td>
                                            <td><select name="" id=""></select></td>
                                            <td><select name="" id=""></select></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><select name="" id=""></select></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><select name="" id=""></select></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><select name="" id=""></select></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><select name="" id=""></select></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                            <td><input name="" class="form-control" type="text" style="width: 100%;"/></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Agent:</label>
                                               <input id="cost" name="agent" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Manifest Ref #:</label>
                                               <input id="cost" name="Manifest Ref #" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn">
                                        <button class="btn btn-primary btn-sm">PEDI</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label">Amount/Dis</label>
                                                <div class="mb-2">
                                                    <input name="" type="text" class="form-control">
                                                </div>
                                                <div class="mb-2">
                                                    <input name="" type="text" class="form-control">
                                                </div>
                                                <div class="mb-2">
                                                    <input name="" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Tax</label>
                                                <div class="mb-2">
                                                    <input name="" type="text" class="form-control">
                                                </div>
                                                <div class="mb-2">
                                                    <input name="" type="text" class="form-control">
                                                </div>
                                                <div class="mb-2">
                                                    <input name="" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Net </label>
                                                <div class="mb-2">
                                                    <input name="" type="text" class="form-control">
                                                </div>
                                                <div class="mb-2">
                                                    <input name="" type="text" class="form-control">
                                                </div>
                                                <div class="mb-2">
                                                    <input name="" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Local</label>
                                                <div class="mb-2">
                                                    <input name="" type="text" class="form-control">
                                                </div>
                                                <div class="mb-2">
                                                    <input name="" type="text" class="form-control">
                                                </div>
                                                <div class="mb-2">
                                                    <input name="" type="text" class="form-control">
                                                </div>
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
            "url": "{{ route('admin.crt_edi.create') }}",
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
        $("#myForm").attr("action","{{ route('admin.crt_edi.update') }}")
        $("input[name=id]").val(data.id);
    }
}

$(".navigation").click(function(){
    let id = $("input[name=id]").val();
    let route = '/admin/crt_edi/get';
    let type = $(this).attr('data-type');
    let data = getList(route, type, id);
    if(data != null){
        edit_row('', JSON.stringify(data));
    }
})

</script>
@endpush









