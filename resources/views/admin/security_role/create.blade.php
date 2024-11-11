@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/security-role/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/security-role/delete')">
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
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              @php
              $arr = [
                "general_ledger" => "General Ledger",
                "sea_export" => "Sea Export",
                "sea_import" => "Sea Import",
                "container_inventary" => "Container Inventary",
                "princip_alaccount" => "Principal Account",
                "crm" => "CRM",
                "depo" => "Depo",
                "edi" => "Edi",
                "utilities" => "Utilities",
                "payroll" => "Payroll",
                "setups" => "Setups",
                "common" => "Common"
              ];
              @endphp
              <div id="jstree-basic">
                <ul>
                  @foreach($arr as $k => $v)
                  <li data-jstree='{"icon" : "ti ti-folder"}'> {{ $v }} 
                    <ul>
                      <li data-jstree='{"icon" : "ti ti-folder"}'>Form
                        @if($n = getNav($k, 'form'))
                        <ul>
                            @foreach($n as $nn)
                            <li data-jstree='{"icon" : "ti ti-file-text"}' onclick="getKeys('{{ $nn->id }}')">{{ $nn->name }}</li>
                            @endforeach
                        </ul>
                        @endif
                      </li>
                      <li data-jstree='{"icon" : "ti ti-folder"}'>Report
                        @if($n = getNav($k, 'report'))
                        <ul>
                            @foreach($n as $nn)
                            <li data-jstree='{"icon" : "ti ti-file-text"}' onclick="getKeys('{{ $nn->id }}')">{{ $nn->name }}</li>
                            @endforeach
                        </ul>
                        @endif
                      </li>
                    </ul>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4" style="background-color: #f4ffed">
                <div class="card-header">
                    <h4 class="fw-bold" style="margin-bottom: 0rem">
                        Permissions
                    </h4>
                </div>
                <table class="datatables-basic table">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Function</th>
                        </tr>
                    </thead>
                    <tbody class="detail_repeater">
                        <tr>
                            <td>
                                <input class="form-check keys" type="checkbox" name="[]" />
                            </td>
                            <td>
                                <input class="form-control keys" type="text" name="keys[]" readonly style="width: 100%" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <form id="myForm" method="post" action="{{ route('admin.security_role.store') }}" enctype="multipart/form-data">
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
                        </div>
                        <div class="responsive text-nowrap">
                            <table class="table table-bordered table-sm quotation_record"></table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection 

@push('script')
<script src="/assets/js/extended-ui-treeview.js"></script>
<script>
    $("#submitButton").click(function() {
        $("#myForm").submit();
    });

    function edit_row(e, data) {
        data = JSON.parse(data);
        if (data) {
            $(".name").val(data.name);
            $("#myForm").attr("action", "{{ route('admin.security_role.update') }}");
            $("input[name=id]").val(data.id);
        }
    }

    $(".navigation").click(function() {
        let id = $("input[name=id]").val();
        let route = "/admin/security_role/get";
        let type = $(this).attr("data-type");
        let data = getList(route, type, id);
        if (data != null) {
            edit_row("", JSON.stringify(data));
        }
    });
    
    function getKeys(nav_id)
    {
        let role_id = $("input[name=id]").val();
        
        if(role_id <= 0) {
            iziToast.error({ message: 'Select Security Role', position: "topRight" });
            return;
        }
        
        $.get("/admin/security-role/create", {_token: '{{ csrf_token() }}', nav_id, role_id}, function(res){
            if(res){
                $(".detail_repeater").html('');
                Object.keys(res).forEach(function(key) {
                  $(".detail_repeater").append(`
                    <tr>
                        <td>
                            <input class="form-check perm" type="checkbox" ${res[key][2]} name="perm[]" />
                            <input class="key_id" type="hidden" value="${res[key][0]}"" name="key_id[]" />
                            <input class="nav_id" type="hidden" value="${nav_id}"" name="nav_id[]" />
                        </td>
                        <td>
                            <input class="form-control key" type="text" readonly name="key[]" value="${res[key][1]}" />
                        </td>
                    </tr>
                  `);
                });
            } else {
                $(".detail_repeater").html('');
            }
        })
    }
    
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
            "url": "{{ route('admin.security_role.create') }}",
            "type": "get",
            "data": function(d) {},
        },
        columns: [
            {
                data: 'name',
                title: 'Security Role'
            }
        ],          
         "rowCallback": function(row, data) {
             $(row).attr("onclick",`edit_row(this,'${JSON.stringify(data)}')`)
         }
    });
</script>
@endpush