@extends('admin.layouts.app')

@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="containerFormReset('/admin/container-movement/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/container-movement/delete')">
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
        <div class="row g-3">
            <div class="col-md-6">
                <form id="myForm" method="post" action="{{ route('admin.container_movement.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card h-100">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0" />
                            <input name="created_by" type="hidden" value="{{ auth()->guard('admin')->user()->id }}" />

                            <div class="row justify-content-center mb-4">
                                <div class="col-6">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Container No</label>
                                        </div>
                                        <div class="col-9">
                                            {{-- <input name="container_id" type="text" class="form-control container_id" /> --}}
                                            <select name="container_id" class="form-select select2 container_id">
                                                <option value="" selected>Select</option>
                                                @foreach ($containers as $value)
                                                    <option data-sizetype="{{ $value->sizetype->code ?? '' }}"
                                                        data-principal="{{ $value->principals->party_name ?? '' }}"
                                                        value="{{ $value->id }}">{{ $value->container_no }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-5">
                                            <label class="form-label">Size / Type</label>
                                        </div>
                                        <div class="col-7">
                                            <input name="container_size" type="text" class="form-control container_size"
                                                readonly />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Status</label>
                                        </div>
                                        <div class="col-9">
                                            {{-- <input name="status" type="text" class="form-control status" /> --}}
                                            <select name="status" class="form-select status">
                                                <option value=""></option>
                                                <option value="sound">Sound</option>
                                                <option value="damaged">Damaged</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-5">
                                            <label class="form-label">Departure Date</label>
                                        </div>
                                        <div class="col-7">
                                            <input name="departure_date" type="date"
                                                class="form-control departure_date" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-5">
                                            <label class="form-label">Arrival Date</label>
                                        </div>
                                        <div class="col-7">
                                            <input name="arrival_date" type="date"
                                                class="form-control arrival_date" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-5">
                                            <label class="form-label">Empty Return</label>
                                        </div>
                                        <div class="col-7">
                                            <input name="empty_return" type="date"
                                                class="form-control empty_return" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Location From</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="location_from" class="location_from search_select2"
                                                data-type="get_location"
                                                data-url="{{ route('admin.location.get_all_data') }}"></select>
                                            {{-- <input name="location_from" type="text"
                                                class="form-control location_from" /> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Location To</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="location_to" class="location_to search_select2"
                                                data-type="get_location"
                                                data-url="{{ route('admin.location.get_all_data') }}"></select>
                                            {{-- <input name="location_to" type="text" class="form-control location_to" /> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Owner</label>
                                        </div>
                                        <div class="col-9">
                                            {{-- <input name="container_principal" type="text"
                                                class="form-control container_principal" readonly /> --}}
                                            <select name="container_principal" class="form-select container_principal">
                                                <option>Modern Shipping Agencies Pvt ltd.</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Dest. Agent</label>
                                        </div>
                                        <div class="col-9">
                                            {{-- <input name="destination_principal" type="text"
                                                class="form-control destination_principal" /> --}}
                                            <select name="destination_principal"
                                                class="destination_principal search_select2"
                                                data-type="get_delivery_agent"
                                                data-url="{{ route('admin.party.get_all_data') }}"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Vessel</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="vessel_id" class="vessel search_select2" data-type="get_vessel"
                                                data-url="{{ route('admin.vessel.get_all_data') }}"></select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Voyage</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="voyage_id" class="voyage select2"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">BL No</label>
                                        </div>
                                        <div class="col-9">
                                            <input name="bl_no" type="text" class="form-control bl_no" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-5">
                                            <label class="form-label">Empty Out</label>
                                        </div>
                                        <div class="col-7">
                                            <input name="empty_out" type="date" class="form-control empty_out" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-12">
                                            <label class="form-label mt-2">
                                                Aging: &nbsp;
                                                <a class="aging_result"></a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="responsive text-nowrap">
                            <table class="table table-bordered table-sm quotation_record text-center"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $("#submitButton").click(function() {
            $("#myForm").submit();
        });

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
                serverSide: true,
                lengthChange: false,
                pageLength: 10,
                scrollX: true,
                ajax: {
                    url: "{{ route('admin.container_movement.create') }}",
                    type: "get",
                    data: function(d) {
                        var frm_data = $("#result_report_form").serializeArray();
                        $.each(frm_data, function(key, val) {
                            d[val.name] = val.value;
                        });
                    },
                },
                columns: [{
                        data: "container.container_no",
                        title: "Container No",
                        render: function(data, type, full, meta) {
                            if (full.container) {
                                return full.container.container_no;
                            }

                            return '-';
                        }
                    },
                    {
                        data: "container_size",
                        title: "Size / Type",
                    },
                    {
                        data: "container_principal",
                        title: "Owner",
                    },
                    {
                        data: "destination_agent.party_name",
                        title: "Dest. Agent",
                        render: function(data, type, full, meta) {
                            if (full.destination_agent) {
                                return full.destination_agent.party_name;
                            }

                            return '-';
                        }
                    },
                    {
                        data: "loc_from.location",
                        title: "Location From",
                        render: function(data, type, full, meta) {
                            if (full.loc_from) {
                                return full.loc_from.location;
                            }

                            return '-';
                        }
                    },
                    {
                        data: "loc_to.location",
                        title: "Location To",
                        render: function(data, type, full, meta) {
                            if (full.loc_to) {
                                return full.loc_to.location;
                            }

                            return '-';
                        }
                    },
                    {
                        data: "departure_date",
                        title: "Departure Date",
                    },
                    {
                        data: "arrival_date",
                        title: "Arrival Date",
                    },
                    {
                        data: "empty_return",
                        title: "Empty Return",
                    },
                    {
                        data: "empty_out",
                        title: "Empty Out",
                    },
                    {
                        data: "vessel.vessel_name",
                        title: "Vessel",
                        render: function(data, type, full, meta) {
                            if (full.vessel) {
                                return full.vessel.vessel_name;
                            }

                            return '-';
                        }
                    },
                    {
                        data: "voyage.voy",
                        title: "Voyage",
                        render: function(data, type, full, meta) {
                            if (full.voyage) {
                                return full.voyage.voy;
                            }

                            return '-';
                        }
                    },
                    {
                        data: "status",
                        title: "Status",
                    },
                    {
                        data: "created_by_user.name",
                        title: "Created By",
                        render: function(data, type, full, meta) {
                            if (full.created_by_user) {
                                return full.created_by_user.name;
                            }

                            return '-';
                        }
                    },
                    {
                        data: "created_at",
                        title: "Created At",
                    },
                ],
                rowCallback: function(row, data) {
                    $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`);
                },
            });
        });

        function edit_row(e, data) {
            data = JSON.parse(data);
            if (data) {
                $(".container_id").val(data.container_id).trigger('change');
                $(".container_size").val(data.container_size);
                $(".container_principal").val(data.container_principal);
                $(".destination_principal").val(data.destination_principal);
                $(".location_from").val(data.location_from);
                $(".location_to").val(data.location_to);
                $(".arrival_date").val(data.arrival_date);
                $(".departure_date").val(data.departure_date);
                $(".empty_return").val(data.empty_return);
                $(".empty_out").val(data.empty_out);
                $(".status").val(data.status);
                $(".bl_no").val(data.bl_no);

                if (data.loc_from) {
                    var option = new Option(data.loc_from.location, data.loc_from.id, true, true);
                    $(".location_from").append(option).trigger('change');
                } else {
                    $(".location_from").val(null).trigger('change');
                }

                if (data.loc_to) {
                    var option = new Option(data.loc_to.location, data.loc_to.id, true, true);
                    $(".location_to").append(option).trigger('change');
                } else {
                    $(".location_to").val(null).trigger('change');
                }

                if (data.destination_agent) {
                    var option = new Option(data.destination_agent.party_name, data.destination_agent.id, true, true);
                    $(".destination_principal").append(option).trigger('change');
                } else {
                    $(".destination_principal").val(null).trigger('change');
                }

                if (data.vessel) {
                    var option = new Option(data.vessel.vessel_name, data.vessel.id, true, true);
                    $(".vessel").append(option).trigger('change');
                } else {
                    $(".vessel").val(null).trigger('change');
                }

                setTimeout(() => {
                    $(".voyage").val(data.voyage_id).trigger('change');
                }, 500);
                $("#myForm").attr("action", "{{ route('admin.container_movement.update') }}");
                $("input[name=id]").val(data.id);
                calculateAging();
            }
        }

        function containerFormReset(route) {
            document.getElementById("myForm").reset();
            $("#myForm").attr("action", route);
            $("#myForm").find(".search_select2").val(null).trigger("change");
            $("#myForm").find("select").trigger("change");
        }

        $(".navigation").click(function() {
            let id = $("input[name=id]").val();
            let route = "/admin/container-movement/get";
            let type = $(this).attr("data-type");
            let data = getList(route, type, id);
            if (data != null) {
                edit_row("", JSON.stringify(data));
            }
        });

        $(".container_id").change(function() {
            let sizetype = $(this).find("option:selected").data("sizetype");
            let principal = $(this).find("option:selected").data("principal");

            if (sizetype) {
                $(".container_size").val(sizetype);
            } else {
                $(".container_size").val('');
            }

            // if (principal) {
            //     $(".container_principal").val(principal);
            // } else {
            //     $(".container_principal").val('');
            // }
        })

        $("select.vessel").change(function() {
            var id = $(this).val();
            $(".voyage").html(null);

            if (!id) {
                return;
            }

            $.get(
                "{{ route('admin.voyage.get_all_data') }}?type=get_voyages_by_vessels", {
                    fetch_vessel_voyages: id,
                },
                function(res) {
                    $(".voyage").select2({
                        data: res,
                    });
                }
            );
        });

        function calculateAging() {
            let empty_return = $(".empty_return").val();
            let empty_out = $(".empty_out").val();

            if (empty_return && empty_out) {
                let returnDate = new Date(empty_return);
                let outDate = new Date(empty_out);
                let diffInMs = outDate - returnDate;
                let diffInDays = Math.ceil(diffInMs / (1000 * 60 * 60 * 24));

                $(".aging_result").text(diffInDays + " day(s)");
            }
        }
    </script>
@endpush
