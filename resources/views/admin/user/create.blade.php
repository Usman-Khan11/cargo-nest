@extends('admin.layouts.app')

@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="UserFormReset('/admin/user/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/user/delete')">
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
                <form id="myForm" method="post" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
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
                                        <label class="form-label"> User Name:</label>
                                        <input name="name" type="text" class="form-control name"
                                            value="{{ old('name') }}" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label"> Login Name:</label>
                                        <input name="username" type="text" class="form-control username"
                                            value="{{ old('username') }}" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">User Password:</label>
                                        <input name="password" type="password" class="form-control password"
                                            value="{{ old('password') }}" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Email:</label>
                                        <input name="email" type="email" class="form-control email"
                                            value="{{ old('email') }}" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Phone:</label>
                                        <input name="phone" type="number" class="form-control phone"
                                            value="{{ old('phone') }}" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Security Question:</label>
                                        <input name="security_que" type="text" class="form-control security_que"
                                            value="{{ old('security_que') }}" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-2 input_flex">
                                        <label class="form-label">Security Answer:</label>
                                        <input name="security_ans" type="text" class="form-control security_ans"
                                            value="{{ old('security_ans') }}" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-2 mt-1 input_flex">
                                        <label class="form-check-label mb-2">
                                            <input type="checkbox" name="status" value="1"
                                                class="form-check-input status" />
                                            Active
                                        </label>
                                        <label class="form-check-label mb-2 mx-3">
                                            <input type="checkbox" name="acount_block" value="1"
                                                class="form-check-input acount_block" />
                                            Account Block
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="mb-2 ">
                                        <label class="form-label">Company:</label>
                                        <select name="company_id" class="form-select company">
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->displayName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="mb-2 ">
                                        <label class="form-label">Security Role:</label>
                                        <select name="role_id" class="form-select role_id">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-8 mt-2">
                                    <button type="button" class="btn btn-primary btn-sm">Mobile</button>
                                    <button type="button" class="btn btn-primary btn-sm">Email Setting</button>
                                    <button type="button" class="btn btn-primary btn-sm">Bulk Active</button>
                                    <button type="button" class="btn btn-primary btn-sm"><i
                                            class="fa fa-cloud-download-alt"></i></button>
                                    <button type="button" class="btn btn-primary btn-sm"><i
                                            class="fa fa-sync-alt"></i></button>
                                </div>

                                <div class="col-md-4">
                                    <h5>Picture</h5>

                                    <div id="imageContainer">
                                        <img id="uploadedImage"
                                            src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png"
                                            width="75%" class="mb-2">
                                    </div>

                                    <div class="main-image">
                                        <button type="button" class="btn btn-primary btn-sm"
                                            onclick="document.getElementById('uploadInput').click()">Upload</button>
                                        <input type="file" hidden class="form-control" name="image"
                                            id="uploadInput" accept="image/*" />
                                        <button id="removeButton" type="button"
                                            class="btn btn-danger btn-sm mx-3">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4" style="background-color: #f4ffed">
                        <div class="p-3">
                            <table class="datatables-basic table">
                                <thead>
                                    <tr>
                                        <th>...</th>
                                        <th>...</th>
                                        <th>Instances</th>
                                        <th>Security Group</th>
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
                                            <input class="form-control" type="text" name="short_name[]"
                                                style="width: 100%" />
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="company[]"
                                                style="width: 100%" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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

        function UserFormReset() {
            document.getElementById("myForm").reset();
            $("#myForm").attr("action", route);
            $("#myForm").find("select").trigger("change");
        }

        function edit_row(e, data) {
            data = JSON.parse(data);
            if (data) {
                $(".name").val(data.name);
                $(".username").val(data.username);
                $(".password").val(data.password);
                $(".email").val(data.email);
                $(".security_que").val(data.security_que);
                $(".security_ans").val(data.security_ans);
                $(".company").val(data.company_id).trigger('change');
                $(".role_id").val(data.role_id).trigger('change');

                $("input[name='acount_block']").prop('checked', false);
                $("input[name='status']").prop('checked', false);
                $("input[name='acount_block'][value='" + data.acount_block + "']").prop('checked', true);
                $("input[name='status'][value='" + data.status + "']").prop('checked', true);

                if (data.image) {
                    $('#uploadedImage').attr('src', '/' + data.image)
                } else {
                    $('#uploadedImage').attr('src',
                        'https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png'
                    )
                }

                $("#myForm").attr("action", "{{ route('admin.user.update') }}");
                $("input[name=id]").val(data.id);
            }
        }

        $(".navigation").click(function() {
            let id = $("input[name=id]").val();
            let route = "/admin/user/get";
            let type = $(this).attr("data-type");
            let data = getList(route, type, id);
            if (data != null) {
                edit_row("", JSON.stringify(data));
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
                "url": "{{ route('admin.user.create') }}",
                "type": "get",
                "data": function(d) {},
            },
            columns: [{
                    data: 'name',
                    title: 'User Name'
                },
                {
                    data: 'username',
                    title: 'Login Name'
                },
                {
                    data: 'email',
                    title: 'Email'
                },
                {
                    data: 'phone',
                    title: 'Phone'
                },

            ],
            "rowCallback": function(row, data) {
                $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`)
            }
        });
    </script>
@endpush
