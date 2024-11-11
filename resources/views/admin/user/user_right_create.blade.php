@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="chartAccFormReset('/admin/user-right/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/user-right/delete')">
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
        <div class="col-md-7">
            <form id="myForm" method="post" action="{{ route('admin.user_right.store') }}" enctype="multipart/form-data">
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
                                    <label class="form-label"> User:</label>
                                    <select name="admin_id" class="form-select admin_id"></select>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="mb-2 input_flex">
                                    <label class="form-label"> Remarks:</label>
                                    <input name="remark" type="text" class="form-control remark" value="{{ old('remark') }}" />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="mb-2 input_flex">
                                    <label class="form-label"> Cost Center:</label>
                                    <select name="cost_center" class="form-select cost_center">
                                        <option value="99">Head Office</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="mb-2 input_flex">
                                    <label class="form-label"> Default Comapny:</label>
                                    <select name="default_company" class="form-select default_company">
                                        <option value="99">Modern Shipping Agencied (PVT) Limited</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="mb-2 input_flex">
                                    <label class="form-label"> Default Departure:</label>
                                    <select name="default_departure" class="form-select default_departure">
                                        <option value="99"></option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="mb-2 input_flex">
                                    <label class="form-label"> Default Sales Rep:</label>
                                    <select name="default_sale_rep" class="form-select default_sale_rep">
                                        <option value="99"></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-2 mt-1 input_flex">
                                    <label class="form-check-label mb-2">
                                        <input type="checkbox" name="restrict_company" value="1" class="form-check-input restrict_company" />
                                        Restric Comapny
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h5>Signature</h5>
                                <div id="imageContainer">
                                    <img id="uploadedImage" src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png" width="75%" class="mb-2">
                                </div>
                                <div class="main-image">
                                    <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('uploadInput').click()">Upload</button>
                                    <input type="file" hidden class="form-control" name="sign" id="uploadInput" accept="image/*" />
                                    <button id="removeButton" type="button" class="btn btn-danger btn-sm mx-3">Remove</button>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <h5>Signature With Image</h5>
                                <div id="imageContainer-2">
                                    <img id="uploadedImage-2" src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png" width="75%" class="mb-2">
                                </div>
                                <div class="main-image">
                                    <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('uploadInput-2').click()">Upload</button>
                                    <input type="file" hidden class="form-control" name="sign_with_img" id="uploadInput-2" accept="image/*" />
                                    <button id="removeButton-2" type="button" class="btn btn-danger btn-sm mx-3">Remove</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="col-md-5">
            <div class="card mb-4" style="background-color: #f4ffed">
                <div class="p-1">
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
    
    $(document).ready(function(){
        $(".admin_id").select2({
            data: @json($users)
        });
    })

    function edit_row(e, data) {
        data = JSON.parse(data);
        if (data) {
            $(".admin_id").val(data.admin_id).trigger('change');
            $(".remark").val(data.remark);
            $(".cost_center").val(data.cost_center).trigger('change');
            $(".default_company").val(data.default_company).trigger('change');
            $(".default_departure").val(data.default_departure).trigger('change');
            $(".default_sale_rep").val(data.default_sale_rep).trigger('change');
            

            $("input[name='restrict_company']").prop('checked', false);
            $("input[name='restrict_company'][value='" + data.restrict_company + "']").prop('checked', true);
            
            if(data.sign){
                $('#uploadedImage').attr('src', '/' + data.sign)
            } else {
                $('#uploadedImage').attr('src', 'https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png')
            }
            
            if(data.sign_with_img){
                $('#uploadedImage-2').attr('src', '/' + data.sign_with_img)
            } else {
                $('#uploadedImage-2').attr('src', 'https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png')
            }

            $("#myForm").attr("action", "{{ route('admin.user_right.update') }}");
            $("input[name=id]").val(data.id);
        }
    }

    $(".navigation").click(function() {
        let id = $("input[name=id]").val();
        let route = "/admin/user-right/get";
        let type = $(this).attr("data-type");
        let data = getList(route, type, id);
        if (data != null) {
            edit_row("", JSON.stringify(data));
        }
    });

    document.getElementById('uploadInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(e) {
            const imageUrl = e.target.result;
            $('#uploadedImage').attr('src', imageUrl)
        };

        reader.readAsDataURL(file);
    });

    document.getElementById('removeButton').addEventListener('click', function() {
        const imageContainer = document.getElementById('imageContainer');
        imageContainer.innerHTML = '<img id="uploadedImage" src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png" width="75%" class="mb-2" alt="Static Image">';
        document.getElementById('removeButton').style.display = 'none';
        document.getElementById('uploadInput').value = '';
    });
    
    document.getElementById('uploadInput-2').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(e) {
            const imageUrl = e.target.result;
            $('#uploadedImage-2').attr('src', imageUrl)
        };

        reader.readAsDataURL(file);
    });

    document.getElementById('removeButton-2').addEventListener('click', function() {
        const imageContainer = document.getElementById('imageContainer-2');
        imageContainer.innerHTML = '<img id="uploadedImage" src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png" width="75%" class="mb-2" alt="Static Image">';
        document.getElementById('removeButton-2').style.display = 'none';
        document.getElementById('uploadInput-2').value = '';
    });
    
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
            "url": "{{ route('admin.user_right.create') }}",
            "type": "get",
            "data": function(d) {},
        },
        columns: [
            {
                title: 'User',
                "render": function(data, type, full, meta) {
                    if(full.admin){
                        return full.admin.name;
                    } else {
                        return '-';
                    }
                }
            },
            {
                data: 'remark',
                title: 'Remarks'
            }
        ],          
         "rowCallback": function(row, data) {
             $(row).attr("onclick",`edit_row(this,'${JSON.stringify(data)}')`)
         }
    });
</script>
@endpush