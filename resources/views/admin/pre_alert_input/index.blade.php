@extends('admin.layouts.app')

@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="navigation('reset')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save" onclick="submitForm()">
                <i class="fa fa-save" title="Save"></i>
            </div>
            <div class="xmark" onclick="navigation('delete')">
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
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="card" style="background-color:#f4ffed;">
            <div class="card-header">
                <h4 class="fw-bold">{{ $page_title }}</h4>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-8">
                        <div id="formResponse">
                            @include('admin.pre_alert_input.partials.form', [
                                'data' => [],
                            ])
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="border-start">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('change', '#vessel_id', function() {
                let id = $(this).val();
                $('#voyage_id').html('').trigger('change');

                $.get("/admin/voyage/get_all_data", {
                    type: 'get_voyages_by_vessels',
                    fetch_vessel_voyages: id
                }, function(res) {
                    if (res) {
                        res.forEach(element => {
                            $('#voyage_id').append(
                                `<option value="${element.id}">${element.text}</option>`
                            );
                        });
                    }
                })
            })
        })

        function addRow() {
            $('#pre_alert_table').find('select').each(function() {
                $(this).removeAttr('id');

                if ($(this).hasClass("select2-hidden-accessible")) {
                    $(this).select2('destroy');
                }
            });

            let $lastRow = $("#pre_alert_table tbody tr:last");
            let $newRow = $lastRow.clone();

            $newRow.find("input.form-control").val('');
            $newRow.find("input.form-check-input").prop('checked', false);
            $newRow.find("select").val('').trigger('change');

            $("#pre_alert_table tbody").append($newRow);

            reindexRows();
            initSearchSelect2();
        }

        function deleteRow(e) {
            if ($("#pre_alert_table tbody tr").length > 1) {
                $(e).closest('tr').remove();
            } else {
                $(e).closest('tr').find("input.form-control").val('');
                $(e).closest('tr').find("input.form-check-input").prop('checked', false);
                $(e).closest('tr').find("select").val('').trigger('change');
            }

            reindexRows();
        }

        function reindexRows() {
            $("#pre_alert_table tbody tr").each(function(index) {
                $(this).find("input,select").each(function() {
                    let name = $(this).attr("name");
                    if (name) {
                        name = name.replace(/\[\d+\]/, "[" + index + "]");
                        $(this).attr("name", name);
                    }
                });
            });
        }
    </script>
@endpush
