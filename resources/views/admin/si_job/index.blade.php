@extends('admin.layouts.app')

@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="jobFormReset('/admin/job/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save" onclick="submitForm()">
                <i class="fa fa-save" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/job/delete')">
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
            <div class="backward" onclick="navigation('first')">
                <i class="fa fa-backward-step" title="First"></i>
            </div>
            <div class="backward" onclick="navigation('backward')">
                <i class="fa fa-backward" title="Backward"></i>
            </div>
            <div class="forward" onclick="navigation('forward')">
                <i class="fa fa-forward" title="Forward"></i>
            </div>
            <div class="forward" onclick="navigation('last')">
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
    <style>
        .form-label.w-100 {
            text-align: right;
            padding-right: 8px;
        }
    </style>
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="card" style="background-color:#f4ffed;">
            <div class="card-header">
                <h4 class="fw-bold">{{ $page_title }}</h4>
            </div>
            <div class="card-body">
                <div id="formResponse">
                    @include('admin.si_job.partials.form')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            // Basic info vessel
            $(document).on('change', '#basic_info_vessel_id', function() {
                let id = $(this).val();
                $('#basic_info_voyage_id').html('').trigger('change');

                $.get("/admin/voyage/get_all_data", {
                    type: 'get_voyages_by_vessels',
                    fetch_vessel_voyages: id
                }, function(res) {
                    if (res) {
                        res.forEach(element => {
                            $('#basic_info_voyage_id').append(
                                `<option value="${element.id}">${element.text}</option>`
                            );
                        });
                    }
                })
            })

            // Routing vessel
            $(document).on('change', '#routing_vessel_id', function() {
                let id = $(this).val();
                $('#routing_voyage_id').html('').trigger('change');

                $.get("/admin/voyage/get_all_data", {
                    type: 'get_voyages_by_vessels',
                    fetch_vessel_voyages: id
                }, function(res) {
                    if (res) {
                        res.forEach(element => {
                            $('#routing_voyage_id').append(
                                `<option value="${element.id}">${element.text}</option>`
                            );
                        });
                    }
                })
            })
        })
    </script>
@endpush
