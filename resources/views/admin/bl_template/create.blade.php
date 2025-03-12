@extends('admin.layouts.app')

@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="formReset('/admin/bl_template/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/bl_template/delete')">
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
            <div class="file_line" onclick="print()">
                <i class="fa fa-file-lines"></i>
            </div>
        </div>
    </div>
@endsection

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <form id="myForm" method="post" action="{{ route('admin.bl_template.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input name="id" type="hidden" value="0" />
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bold m-0">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bl"
                                        type="button" role="tab" aria-controls="bl" aria-selected="true">Original
                                        Sheet</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#container" type="button" role="tab" aria-controls="container"
                                        aria-selected="false">Attach Sheets</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="bl" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <label class="form-label w-100 m-0">Format Name</label>
                                                        </div>
                                                        <div class="col-8">
                                                            <input name="format_name" type="text"
                                                                class="form-control format_name"
                                                                value="{{ old('format_name') }}" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <label class="form-label w-100 m-0">Sub Company</label>
                                                        </div>
                                                        <div class="col-8">
                                                            <select name="sub_company_id"
                                                                class="form-select sub_company_id"></select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-2">
                                                            <label class="form-label w-100 m-0">Mark's & Container #:
                                                            </label>
                                                        </div>
                                                        <div class="col-3 text-center">
                                                            <label class="form-label w-100 m-0"># Of Lines Per Page :
                                                            </label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="mark_container_lines" type="number"
                                                                class="form-control mark_container_lines"
                                                                value="{{ old('mark_container_lines') }}" />
                                                        </div>
                                                        <div class="col-3 text-center">
                                                            <label class="form-label w-100 m-0"># Of Character Per Page :
                                                            </label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="mark_container_character" type="number"
                                                                class="form-control mark_container_character"
                                                                value="{{ old('mark_container_character') }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-2">
                                                            <label class="form-label w-100 m-0">Description :
                                                            </label>
                                                        </div>
                                                        <div class="col-3 text-center">
                                                            <label class="form-label w-100 m-0"># Of Lines Per Page :
                                                            </label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="description_lines" type="number"
                                                                class="form-control description_lines"
                                                                value="{{ old('description_lines') }}" />
                                                        </div>
                                                        <div class="col-3 text-center">
                                                            <label class="form-label w-100 m-0"># Of Character Per Page :
                                                            </label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="description_character" type="number"
                                                                class="form-control description_character"
                                                                value="{{ old('description_character') }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-2">
                                                            <label class="form-label w-100 m-0">Packages :
                                                            </label>
                                                        </div>
                                                        <div class="col-3 text-center">
                                                            <label class="form-label w-100 m-0"># Of Lines Per Page :
                                                            </label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="packages_lines" type="number"
                                                                class="form-control packages_lines"
                                                                value="{{ old('packages_lines') }}" />
                                                        </div>
                                                        <div class="col-3 text-center">
                                                            <label class="form-label w-100 m-0"># Of Character Per Page :
                                                            </label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="packages_character" type="number"
                                                                class="form-control packages_character"
                                                                value="{{ old('packages_character') }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-2">
                                                            <label class="form-label w-100 m-0">Container Data :
                                                            </label>
                                                        </div>
                                                        <div class="col-3 text-center">
                                                            <label class="form-label w-100 m-0"># Of Lines Per Page :
                                                            </label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="container_data_lines" type="number"
                                                                class="form-control container_data_lines"
                                                                value="{{ old('container_data_lines') }}" />
                                                        </div>
                                                        <div class="col-3 text-center">
                                                            <label class="form-label w-100 m-0"># Of Character Per Page :
                                                            </label>
                                                        </div>
                                                        <div class="col-2">
                                                            <input name="container_data_character" type="number"
                                                                class="form-control container_data_character"
                                                                value="{{ old('container_data_character') }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-2">
                                                            <label class="form-label w-100 m-0">Principal :</label>
                                                        </div>
                                                        <div class="col-10">
                                                            <input name="principal" type="text"
                                                                class="form-control principal"
                                                                value="{{ old('principal') }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-2">
                                                            <label class="form-label w-100 m-0">Templates :
                                                            </label>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" name="all_companies"
                                                                    id="all_companies">
                                                                <label class="form-check-label" for="all_companies">
                                                                    Available All Companies
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-5"></div>
                                                        <div class="col-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" name="fix_format" id="fix_format">
                                                                <label class="form-check-label" for="fix_format">
                                                                    Fix Format
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-2">
                                                            <label class="form-label w-100 m-0">Blank Page Path :</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input name="blank_page_path" type="text"
                                                                value="{{ old('blank_page_path') }}"
                                                                class="form-control blank_page_path" />
                                                        </div>
                                                        <div class="col-1 text-center">
                                                            <button class="btn btn-primary btn-sm" type="button">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-2">
                                                            <label class="form-label w-100 m-0">Pre Printed Path :</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input name="pre_printed_path" type="text"
                                                                value="{{ old('pre_printed_path') }}"
                                                                class="form-control pre_printed_path" />
                                                        </div>
                                                        <div class="col-1 text-center">
                                                            <button class="btn btn-primary btn-sm" type="button">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" name="auto_generate_bl_number"
                                                                    id="auto_generate_bl_number">
                                                                <label class="form-check-label"
                                                                    for="auto_generate_bl_number">
                                                                    Auto Generate BL Number
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" name="edit_allowed" id="edit_allowed">
                                                                <label class="form-check-label" for="edit_allowed">
                                                                    Edit Allowed
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" name="default" id="default">
                                                                <label class="form-check-label" for="default">
                                                                    Default
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-3">
                                                            <label class="form-label w-100 m-0">Prefix :</label>
                                                        </div>
                                                        <div class="col-4">
                                                            <input name="prefix" type="text"
                                                                class="form-control prefix"
                                                                value="{{ old('prefix') }}" />
                                                        </div>
                                                    </div>

                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-3">
                                                            <label class="form-label w-100 m-0">Format :</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input name="format" type="text"
                                                                class="form-control format"
                                                                value="{{ old('format') }}" />
                                                        </div>
                                                    </div>

                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-3">
                                                            <label class="form-label w-100 m-0">Last Number :</label>
                                                        </div>
                                                        <div class="col-4">
                                                            <input name="last_number" type="number"
                                                                class="form-control last_number"
                                                                value="{{ old('last_number') }}" />
                                                        </div>
                                                    </div>

                                                    <div class="row g-0 align-items-center mb-1">
                                                        <div class="col-3">
                                                            <label class="form-label w-100 m-0">Padding :</label>
                                                        </div>
                                                        <div class="col-4">
                                                            <input name="padding" type="number"
                                                                class="form-control padding"
                                                                value="{{ old('padding') }}" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <ul>
                                                        <li></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="">
                                                <div id="imageContainer">
                                                    <img id="uploadedImage"
                                                        src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png"
                                                        width="75%" class="mb-2">
                                                </div>

                                                <div class="main-image">
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="document.getElementById('uploadInput').click()">Upload</button>
                                                    <input type="file" hidden class="form-control" name="signature"
                                                        id="uploadInput" accept="image/*" />
                                                    <button id="removeButton" type="button"
                                                        class="btn btn-danger btn-sm mx-3">Remove</button>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-primary mt-5">Download Tags</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="container" role="tabpanel" aria-labelledby="profile-tab">

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $(".sub_company_id").select2({
                data: @json($sub_companies)
            });

            $('#submitButton').click(function() {
                $('#myForm').submit();
            });

            $(".navigation").click(function() {
                let id = $("input[name=id]").val();
                let route = "/admin/bl_template/get";
                let type = $(this).attr("data-type");
                let data = getList(route, type, id);
                if (data != null) {
                    edit_row("", JSON.stringify(data));
                }
            });
        })

        function edit_row(e, data) {
            let res = JSON.parse(data);

            if (res.bl_template) {
                data = res.bl_template;
                $(".format_name").val(data.format_name);
                $(".sub_company_id").val(data.sub_company_id).trigger('change');
                $(".mark_container_lines").val(data.mark_container_lines);
                $(".mark_container_character").val(data.mark_container_character);
                $(".description_lines").val(data.description_lines);
                $(".description_character").val(data.description_character);
                $(".packages_lines").val(data.packages_lines);
                $(".packages_character").val(data.packages_character);
                $(".container_data_lines").val(data.container_data_lines);
                $(".container_data_character").val(data.container_data_character);
                $(".nature").val(data.nature);
                $(".principal").val(data.principal);
                $("#all_companies").prop("checked", data.all_companies === 1);
                $("#fix_format").prop("checked", data.fix_format === 1);
                $(".blank_page_path").val(data.blank_page_path);
                $(".pre_printed_path").val(data.pre_printed_path);
                $("#auto_generate_bl_number").prop("checked", data.auto_generate_bl_number === 1);
                $("#edit_allowed").prop("checked", data.edit_allowed === 1);
                $("#default").prop("checked", data.default === 1);
                $(".prefix").val(data.prefix);
                $(".format").val(data.format);
                $(".last_number").val(data.last_number);
                $(".padding").val(data.padding);

                $("#myForm").attr("action", "{{ route('admin.bl_template.update') }}")
                $("input[name=id]").val(data.id);
            }
        }

        document.getElementById('uploadInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();

            reader.onload = function(e) {
                const imageUrl = e.target.result;
                const imageElement = document.createElement('img');
                imageElement.src = imageUrl;
                $('#uploadedImage').attr('src', imageUrl)
            };

            reader.readAsDataURL(file);
        });

        document.getElementById('removeButton').addEventListener('click', function() {
            const imageContainer = document.getElementById('imageContainer');
            imageContainer.innerHTML =
                '<img id="uploadedImage" src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png" width="75%" class="mb-2" alt="Static Image">';
            document.getElementById('removeButton').style.display = 'none';
            document.getElementById('uploadInput').value = '';
        });
    </script>
@endpush
