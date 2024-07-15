@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/advance_detension/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/advance_detension/delete')">
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
        <form id="myForm" method="post" action="{{ route('admin.advance_detension.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card mb-4">
                            <div class="card-header">
                                <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                                <!--<hr />-->
                            </div>
                            <div class="card-body">
                                <input name="id" type="hidden" />
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-2">
                                                    <label class="form-check-label mb-2">
                                                        <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                                        COC
                                                    </label>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-2">
                                                   <label for="cost" class="form-label">Invoice#:</label>
                                                   <input id="cost" name="Invoice" type="text" step="0.01" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-2">
                                                   <label for="cost" class="form-label">Invoice Date:</label>
                                                   <input id="cost" name="Invoice Date" type="date" step="0.01" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-2">
                                                   <label for="cost" class="form-label">Refrence:</label>
                                                   <input id="cost" name="Refrence" type="text" step="0.01" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-2">
                                                    <label class="form-check-label mb-2">
                                                        <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                                        Direct Jobs #:
                                                    </label>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-2">
                                                   <label for="cost" class="form-label">Job#:</label>
                                                   <input id="cost" name="Job" type="text" step="0.01" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3"> </div>
                                            <div class="col-md-3">
                                                <div class="mb-2">
                                                    <label for="cost" class="form-label">Currency:</label>
                                                    <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                     <option value="Sort">PKR</option>
                                                   </select>
                                                 </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                   <label for="cost" class="form-label">Client:</label>
                                                   <input id="cost" name="Client" type="text" step="0.01" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                   <label for="cost" class="form-label">Principle:</label>
                                                   <input id="cost" name="Principle" type="text" step="0.01" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                   <label for="cost" class="form-label">Terminal:</label>
                                                   <input id="cost" name="Terminal" type="text" step="0.01" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-2">
                                                    <label for="cost" class="form-label">Bill To:</label>
                                                    <select name="Out Put" id="cars" step="0.01" class="form-control">
                                                        <option value="Preview">Invoice To</option>
                                                      </select>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-2">
                                                   <label for="cost" class="form-label">Auto/manual:</label>
                                                   <select name="Out Put" id="cars" step="0.01" class="form-control">
                                                       <option value="Preview">manual</option>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-2">
                                                   <label for="cost" class="form-label">Invoice Type:</label>
                                                   <select name="Out Put" id="cars" step="0.01" class="form-control">
                                                       <option value="Preview">si</option>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="margin-top: 30px;">
                                                <div class="mb-2">
                                                    <button class="btn btn-primary btn-sm">Job Receipt</button>
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-2">
                                                   <label for="cost" class="form-label">status:</label>
                                                   <select name="Out Put" id="cars" step="0.01" class="form-control">
                                                       <option value="Preview">Active</option>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                   <label for="cost" class="form-label">Due Days:</label>
                                                   <input id="cost" name="Due Days" type="number" step="0.01" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4" style="margin-top: 30px;">
                                                <div class="mb-2">
                                                    <button class="btn btn-primary btn-sm">Refresh Container</button>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-2">
                                                   <label for="cost" class="form-label">Cost Center:</label>
                                                   <select name="Loading List" id="cars" step="0.01" class="form-control">
                                                       <option value="Loading List">Head Office</option>
                                                     </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Bill Account:</label>
                                           <input id="cost" name="Bill Account" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Other Charges Amount:</label>
                                           <input id="cost" name="Other Charges Amount" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Other Charges Remarks:</label>
                                           <input id="cost" name="Other Charges Remarks" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                   <label for="cost" class="form-label">start Date:</label>
                                                   <input id="cost" name="start Date" type="date" step="0.01" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                   <label for="cost" class="form-label">End Date:</label>
                                                   <input id="cost" name="End Date" type="date" step="0.01" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9" >
                                        <div class="row" style="border: 1px solid black;">
                                            <div class="col-md-2">
                                                <div class="mb-2" style="margin-top: 35px;">
                                                    <label class="form-check-label mb-2">
                                                        Edit Exrate
                                                        <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                                       
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-2">
                                                   <label for="cost" class="form-label">Curr:</label>
                                                   <select name="Arrivel Notice" id="cars" step="0.01" class="form-control">
                                                       <option value="MSA-AN"></option>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-2">
                                                   <label for="cost" class="form-label">Other Charges Amount:</label>
                                                   <input id="cost" name="Other Charges Amount" type="number" step="0.01" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4" >
                                                <div class="mb-2" style="margin-top: 35px;">
                                                    <label class="form-check-label mb-2">
                                                        <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                                       Manual Detention Rate
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-2">
                                           <label for="cost" class="form-label">Rate Group:</label>
                                           <input id="cost" name="Rate Group" type="text" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                
                                <div class="col-md-6" style="border: 1px solid black;"></div>
                                <div class="col-md-3">
                                    <div class="mb-2">
                                       <label for="cost" class="form-label">Apply Date:</label>
                                       <input id="cost" name="Apply Date" type="number" step="0.01" class="form-control" required>
                                    </div>
                                </div>
                                </div>
                                <div class="card-datatable table-responsive pt-0">
                                    <table class="datatables-basic table" style="width:100%;">
                                        <thead>
                                          <tr>
                                            <th scope="col">-</th>
                                            <th scope="col">-</th>
                                            <th scope="col">s.No</th>
                                            <th scope="col">Container No</th>
                                            <th scope="col">size Type</th>
                                            <th scope="col">Rate Gropup</th>
                                            <th scope="col">Free days</th>
                                            <th scope="col">Log days</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Master Entry Amount</th>
                                            <th scope="col">Tarrif</th>
                                            <th scope="col">Currency</th>
                                            <th scope="col">Ex Rate</th>
                                            <th scope="col">Local Amount</th>
                                            <th scope="col">Discount</th>
                                            <th scope="col">Net Amount</th>
                                            <th scope="col">Tarrif Code</th>
                                            <th scope="col">Margin</th>
                                          </tr>
                                        </thead>
                                        <tbody class="detail_repeater">
                                          <tr>
                                            <td><i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                            <td><i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info"></i></td>
                                            <td><input name="" type="text" style="width: 100%;"/></td>
                                            <td><input name="" type="text" style="width: 100%;"/></td>
                                            <td><input name="" type="text" style="width: 100%;"/></td>
                                            <td><input name="" type="text" style="width: 100%;"/></td>
                                            <td><input name="" type="text" style="width: 100%;"/></td>
                                            <td><input name="" type="text" style="width: 100%;"/></td>
                                            <td><input name="" type="text" style="width: 100%;"/></td>
                                            <td><input name="" type="text" style="width: 100%;"/></td>
                                            <td><input name="" type="text" style="width: 100%;"/></td>
                                            <td><input name="" type="text" style="width: 100%;"/></td>
                                            <td><input name="" type="text" style="width: 100%;"/></td>
                                            <td><input name="" type="text" style="width: 100%;"/></td>
                                            <td><input name="" type="text" style="width: 100%;"/></td>
                                            <td><input name="" type="text" style="width: 100%;"/></td>
                                            <td><input name="" type="text" style="width: 100%;"/></td>
                                            <td><input name="" type="text" style="width: 100%;"/></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                       <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Remarks:</label>
                                               <input id="cost" name="Remarks" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                     
                                       </div>
                                       <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <button class="btn btn-primary btn-sm">Voucher #</button>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                               <input id="cost" name="Importer" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label class="form-check-label mb-2">
                                                    <input type="checkbox" name="Pending" value="Soc" class="form-check-input">
                                                    Manual Remarks
                                                </label>
                                            </div>
                                        </div>
                                       </div>
                                       <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Bank Detail:</label>
                                               <input id="cost" name="Bank Detail" type="text" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Internel Comments:</label>
                                              <textarea class="form-control"></textarea>
                                            </div>
                                        </div>
                                       </div>
                                    </div>
                                   <div class="col-md-6">
                                    <div class="row">
                                           <div class="col-md-6">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Total Amount:</label>
                                               <input id="cost" name="Total Amount" type="number" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Net Amount:</label>
                                               <input id="cost" name="Net Amount" type="number" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Master Entry Amount:</label>
                                               <input id="cost" name="Master Entry Amount" type="number" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Text Amount:</label>
                                               <input id="cost" name="Text Amount" type="number" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Ex Round DLF (LC):</label>
                                               <input id="cost" name="Ex Round DLF (LC)" type="number" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Local Amount:</label>
                                               <input id="cost" name="Local Amount" type="number" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Discount:</label>
                                               <input id="cost" name="Discount" type="number" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Net Amount Inc Tex:</label>
                                               <input id="cost" name="Net Amount Inc Tex" type="number" step="0.01" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                               <label for="cost" class="form-label">Are Values are in PkR:</label>
                                               
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
            "url": "{{ route('admin.advance_detension.create') }}",
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
    
    $("select[name=vessel_search]").change(function(){
        datatable.ajax.reload();
    })
    $("input[name=voyage_name]").keyup(function(){
        datatable.ajax.reload();
    })
});

    function addNewRow(e){
        $(e).parent().parent().clone().prependTo(".detail_repeater");
        $(".detail_repeater tr:last").find("input").val(null);
        $(".detail_repeater tr:last select").find("option").attr("selected",false);
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
        $("#myForm").attr("action","{{ route('admin.advance_detension.update') }}")
        $("input[name=id]").val(data.id);
    }
}

$(".navigation").click(function(){
    let id = $("input[name=id]").val();
    let route = '/admin/advance_detension/get';
    let type = $(this).attr('data-type');
    let data = getList(route, type, id);
    if(data != null){
        edit_row('', JSON.stringify(data));
    }
})

</script>
@endpush









