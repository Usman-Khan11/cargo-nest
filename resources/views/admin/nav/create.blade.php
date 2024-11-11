@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/nav/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/nav/delete')">
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
                <label style="padding: 0px 10px">Search</label>
                <select class="form-select">
                    <option></option>
                    <option>Search</option>
                </select>
            </div>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" />
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
            <form id="myForm" method="post" action="{{ route('admin.nav.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card mb-4" style="background-color: #f4ffed">
                    <div class="card-header">
                        <h4 class="fw-bold" style="margin-bottom: 0rem">
                            {{ $page_title }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <input name="id" type="hidden" value="0" />
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-2 input_flex">
                                    <label class="form-label">Name:</label>
                                    <input name="name" type="text" class="form-control name" value="{{ old('name') }}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-2 input_flex">
                                    <label class="form-label">Slug:</label>
                                    <input name="slug" type="text" class="form-control slug" value="{{ old('slug') }}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-2 input_flex">
                                    <label class="form-label">Parent:</label>
                                    <select name="parent" class="form-select parent">
                                        <option @if(old('parent') == "general_ledger") selected @endif value="general_ledger">General Ledger</option>
                                        <option @if(old('parent') == "sea_export") selected @endif value="sea_export">Sea Export</option>
                                        <option @if(old('parent') == "sea_import") selected @endif value="sea_import">Sea Import</option>
                                        <option @if(old('parent') == "container_inventary") selected @endif value="container_inventary">Container Inventary</option>
                                        <option @if(old('parent') == "principal_account") selected @endif value="principal_account">Principal Account</option>
                                        <option @if(old('parent') == "crm") selected @endif value="crm">CRM</option>
                                        <option @if(old('parent') == "depo") selected @endif value="depo">Depo</option>
                                        <option @if(old('parent') == "edi") selected @endif value="edi">Edi</option>
                                        <option @if(old('parent') == "utilities") selected @endif value="utilities">Utilities</option>
                                        <option @if(old('parent') == "payroll") selected @endif value="payroll">Payroll</option>
                                        <option @if(old('parent') == "setups") selected @endif value="setups">Setups</option>
                                        <option @if(old('parent') == "common") selected @endif value="common">Common</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-2 input_flex">
                                    <label class="form-label">Type:</label>
                                    <select name="type" class="form-select type">
                                        <option @if(old('type') == "form") selected @endif value="form">Form</option>
                                        <option @if(old('type') == "report") selected @endif value="report">Report</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <h4 class="mb-0">Nav Keys</h4>
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th>...</th>
                                            <th>...</th>
                                            <th>Keys</th>
                                        </tr>
                                    </thead>
                                    <tbody class="detail_repeater">
                                        <tr>
                                            <td>
                                                <i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i>
                                            </td>
                                            <td>
                                                <i onclick="addNewRow(this)" class="fa fa-clone fa-lg text-info"></i>
                                            </td>
                                            <td>
                                                <input class="form-control keys" type="text" name="keys[]" style="width: 100%" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="card mb-4" style="background-color: #f4ffed">
                <div class="card-body">
                    <div class="responsive text-nowrap">
                        <table class="table table-bordered table-sm quotation_record"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection @push('script')
<script>
    $("#submitButton").click(function() {
        $("#myForm").submit();
    });

    function edit_row(e, data) {
        data = JSON.parse(data);
        if (data) {
            console.log(data)
            $(".name").val(data.name);
            $(".slug").val(data.slug);
            $(".parent").val(data.parent).trigger('change');
            $(".type").val(data.type).trigger('change');
            
            if(data.nav_key) {
                $(".detail_repeater tr").each(function(i,v){
                    if (i > 0) { $(v).remove(); }
                })
                $(data.nav_key).each(function(key, value){
                    if (key > 0) {
                        $(".detail_repeater tr:first").find("i.fa-clone").click();
                    }
                })
                $(data.nav_key).each(function(key, value){
                    var keys = $(`.keys`).get(key);
                    $(keys).val(value.key);
                })
            }
            
            $("#myForm").attr("action", "{{ route('admin.nav.update') }}");
            $("input[name=id]").val(data.id);
        }
    }

    $(".navigation").click(function() {
        let id = $("input[name=id]").val();
        let route = "/admin/nav/get";
        let type = $(this).attr("data-type");
        let data = getList(route, type, id);
        if (data != null) {
            edit_row("", JSON.stringify(data));
        }
    });
    
    var datatable = $('.quotation_record').DataTable({
        select: {
            style: 'api'
        },
        "processing": true,
        "searching": false,
        "ordering": false,
        "serverSide": true,
        "lengthChange": false,
        "pageLength": 10,
        "scrollX": true,
        "ajax": {
            "url": "{{ route('admin.nav.create') }}",
            "type": "get",
            "data": function(d) {},
        },
        columns: [
            {
                data: 'name',
                title: 'Name'
            },
            {
                data: 'parent',
                title: 'Parent'
            },
            {
                data: 'type',
                title: 'type'
            }
        ],          
         "rowCallback": function(row, data) {
             $(row).attr("onclick",`edit_row(this,'${JSON.stringify(data)}')`)
         }
    });
    
    function addNewRow(e) {
        $(e).parent().parent().clone().appendTo(".detail_repeater");
        $(".detail_repeater tr:last").find("input").val(null);
    }

    function delRow(e) {
        if ($(".detail_repeater tr").length <= 1) return;
        $(e).parent().parent().remove();
    }
</script>
@endpush