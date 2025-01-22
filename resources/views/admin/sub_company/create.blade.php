@extends('admin.layouts.app')

@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="formReset('/admin/sub_company/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/sub_company/delete')">
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
            <div class="file_line">
                <i class="fa fa-file-lines"></i>
            </div>
        </div>
    </div>
@endsection

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <form id="myForm" method="post" action="{{ route('admin.sub_company.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0" />

                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">Name</label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="name" type="text" class="form-control name"
                                                        value="{{ old('name') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">Display Name</label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="displayName" type="text"
                                                        class="form-control displayName" value="{{ old('displayName') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Short Name</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="shortName" type="text"
                                                        class="form-control shortName ms-1"
                                                        value="{{ old('shortName') }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">S.T / VAT / CIN</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="taxNumber" type="text" class="form-control taxNumber"
                                                        value="{{ old('taxNumber') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">Address</label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="address" type="text" class="form-control address"
                                                        value="{{ old('address') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">Phone</label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="phone" type="text" class="form-control phone"
                                                        value="{{ old('phone') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">Email</label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="email" type="text" class="form-control email"
                                                        value="{{ old('email') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">Fax</label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="fax" type="text" class="form-control fax"
                                                        value="{{ old('fax') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">Website</label>
                                                </div>
                                                <div class="col-10">
                                                    <input name="website" type="text" class="form-control website"
                                                        value="{{ old('website') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">NTN / PAN / Reg No</label>
                                                </div>
                                                <div class="col-8">
                                                    <input name="regNumber" type="text"
                                                        class="form-control regNumber ms-1"
                                                        value="{{ old('regNumber') }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Localization</label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="localization" class="form-select localization">
                                                        <option value="China">China</option>
                                                        <option value="Pakistan">Pakistan</option>
                                                        <option value="USA">USA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Region</label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="region" class="form-select region ms-1">
                                                        <option value="hjhjh">jhbj</option>
                                                        <option value="vhhv">vvjhb</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-4">
                                                    <label class="form-label w-100 m-0">Default Currency</label>
                                                </div>
                                                <div class="col-8">
                                                    <select name="currency" class="currency search_select2"
                                                        data-url="{{ route('admin.currency.get_all_data') }}"
                                                        data-type="get_currency"></select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label w-100 m-0">Country</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="country" class="country search_select2"
                                                        data-url="{{ route('admin.location.get_all_data') }}"
                                                        data-type="get_country"></select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row g-0  mb-1">
                                                <div class="col-2">
                                                    <label for="manual_header" class="form-label w-100 m-0">Manual
                                                        Header</label>
                                                    <input type="checkbox" name="manual_header" value="Manual-Header"
                                                        class="form-check-input manual_header" id="manual_header">
                                                </div>
                                                <div class="col-10">
                                                    <input name="manualHeader1" type="text"
                                                        class="form-control manualHeader1"
                                                        value="{{ old('manualHeader1') }}" />

                                                    <input name="manualHeader2" type="text"
                                                        class="form-control manualHeader2 mt-1"
                                                        value="{{ old('manualHeader2') }}" />

                                                    <input name="manualHeader3" type="text"
                                                        class="form-control manualHeader3 mt-1"
                                                        value="{{ old('manualHeader3') }}" />

                                                    <input name="manualHeader4" type="text"
                                                        class="form-control manualHeader4 mt-1"
                                                        value="{{ old('manualHeader4') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <h5>Company Logo</h5>
                                            <div id="imageContainer"
                                                style="width:100%; height:200px; border:1px solid #dbdade; border-radius:7px; margin-bottom:10px;">
                                                <img id="uploadedImage1" src="" width="75%" class="mb-2">
                                            </div>
                                            <div class="main-image">
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    onclick="document.getElementById('uploadInput1').click()">Upload</button>
                                                <input type="file" hidden class="form-control" name="company_logo"
                                                    id="uploadInput1" accept="image/*" />
                                                <button id="removeButton1" type="button"
                                                    class="btn btn-danger btn-sm">Remove</button>
                                            </div>
                                        </div>

                                        <div class="col-md-6 text-center">
                                            <h5>Report Header</h5>
                                            <div id="imageContainer"
                                                style="width:100%; height:200px; border:1px solid #dbdade; border-radius:7px; margin-bottom:10px;">
                                                <img id="uploadedImage2" src="" width="75%" class="mb-2">
                                            </div>
                                            <div class="main-image">
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    onclick="document.getElementById('uploadInput2').click()">Upload</button>
                                                <input type="file" hidden class="form-control" name="report_header"
                                                    id="uploadInput2" accept="image/*" />
                                                <button id="removeButton2" type="button"
                                                    class="btn btn-danger btn-sm">Remove</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            Cost Center Logo / Report Header Defination
                                        </button>
                                        <button type="button" class="btn btn-primary btn-sm">
                                            Copy From Other Companies
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive w-100">
                            <table class="table table-bordered table-sm quotation_record"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        var datatable = null;

        $(document).ready(function() {

            const search_select2 = $(".search_select2");

            if (search_select2.length) {
                $(search_select2).each(function(i, v) {
                    let url = $(v).data("url");
                    let type = $(v).data("type");
                    let placeholder = $(v).data("placeholder") || 'Search for...';

                    $(v).select2({
                        ajax: {
                            url: url,
                            dataType: "json",
                            data: (params) => ({
                                search: params.term,
                                type: type,
                            }),
                            processResults: (data) => ({
                                results: data
                            }),
                        },
                        cache: true,
                        allowClear: true,
                        placeholder: placeholder,
                        minimumInputLength: 1,
                        minimumResultsForSearch: 25,
                    });
                })
            }

            datatable = $(".quotation_record").DataTable({
                select: {
                    style: "api",
                },
                processing: true,
                searching: false,
                serverSide: true,
                lengthChange: false,
                pageLength: 10,
                ajax: {
                    url: "{{ route('admin.sub_company.create') }}",
                    type: "get",
                    data: function(d) {},
                },
                columns: [{
                        data: "name",
                        title: "Name",
                    },
                    {
                        data: "shortName",
                        title: "Short Name",
                    },
                    {
                        data: "address",
                        title: "Address",
                    },
                    {
                        data: "phone",
                        title: "Phone",
                    },
                    {
                        data: "email",
                        title: "Email",
                    },
                    {
                        data: "company_logo",
                        title: "Image",
                        "render": function(data, type, full, meta) {
                            return `<img src="{{ asset('') }}${full.company_logo}" width="100px" loading="lazy" />`;
                        }
                    },
                ],
                rowCallback: function(row, data) {
                    $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`);
                },
            });
        });


        $('#submitButton').click(function() {
            $('#myForm').submit();
        });

        function edit_row(e, data) {
            data = JSON.parse(data);
            if (data) {
                $(".name").val(data.name);
                $(".displayName").val(data.displayName);
                $(".shortName").val(data.shortName);
                $(".address").val(data.address);
                $(".phone").val(data.phone);
                $(".email").val(data.email);
                $(".fax").val(data.fax);
                $(".website").val(data.website);
                $(".taxNumber").val(data.taxNumber);
                $(".regNumber").val(data.regNumber);
                $(".localization").val(data.localization);
                $(".region").val(data.region);

                $(".c_code").val(data.c_code);
                $(".manual_header").val(data.manual_header);
                $(".manualHeader1").val(data.manualHeader1);
                $(".manualHeader2").val(data.manualHeader2);
                $(".manualHeader3").val(data.manualHeader3);
                $(".manualHeader4").val(data.manualHeader4);

                if (data.country) {
                    var option = new Option(data.country.location, data.country.id, true, true);
                    $(".country").append(option).trigger('change');
                } else {
                    $(".country").val(null).trigger('change');
                }

                if (data.currency) {
                    var option = new Option(data.currency.code, data.currency.id, true, true);
                    $(".currency").append(option).trigger('change');
                } else {
                    $(".currency").val(null).trigger('change');
                }

                if (data.company_logo) {
                    $('#uploadedImage1').attr('src', "{{ asset('') }}" + data.company_logo)
                } else {
                    $('#uploadedImage1').attr('src',
                        "https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png"
                    )
                }

                if (data.report_header) {
                    $('#uploadedImage2').attr('src', "{{ asset('') }}" + data.report_header)
                } else {
                    $('#uploadedImage2').attr('src',
                        "https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png"
                    )
                }

                $("#myForm").attr("action", "{{ route('admin.sub_company.update') }}");
                $("input[name=id]").val(data.id);
            }
        }

        $(".navigation").click(function() {
            let id = $("input[name=id]").val();
            let route = '/admin/sub_company/get';
            let type = $(this).attr('data-type');
            let data = getList(route, type, id);
            if (data != null) {
                edit_row('', JSON.stringify(data));
            }
        })

        document.getElementById('uploadInput1').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();

            reader.onload = function(e) {
                const imageUrl = e.target.result;
                const imageElement = document.createElement('img');
                imageElement.src = imageUrl;
                $('#uploadedImage1').attr('src', imageUrl)
            };

            reader.readAsDataURL(file);
        });

        document.getElementById('uploadInput2').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();

            reader.onload = function(e) {
                const imageUrl = e.target.result;
                const imageElement = document.createElement('img');
                imageElement.src = imageUrl;
                $('#uploadedImage2').attr('src', imageUrl)
            };

            reader.readAsDataURL(file);
        });

        document.getElementById('removeButton1').addEventListener('click', function() {
            const imageContainer = document.getElementById('imageContainer');
            imageContainer.innerHTML =
                '<img id="uploadedImage" src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png" width="75%" class="mb-2" alt="Static Image">';
            document.getElementById('removeButton1').style.display = 'none';
            document.getElementById('uploadInput1').value = '';
        });

        document.getElementById('removeButton2').addEventListener('click', function() {
            const imageContainer = document.getElementById('imageContainer');
            imageContainer.innerHTML =
                '<img id="uploadedImage" src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png" width="75%" class="mb-2" alt="Static Image">';
            document.getElementById('removeButton2').style.display = 'none';
            document.getElementById('uploadInput2').value = '';
        });
    </script>
@endpush
