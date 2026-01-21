<form id="newForm" method="post" action="{{ route('admin.pre_alert_input.store') }}" enctype="multipart/form-data"
    data-navigation_url="{{ route('admin.pre_alert_input.get') }}">
    @csrf
    <input type="hidden" name="id" value="{{ $data['id'] ?? 0 }}">

    <div class="row g-2 align-items-center">
        <div class="col-md-3">
            <div class="row g-0 align-items-center">
                <div class="col-3">
                    <label class="form-label w-100 m-0">Tran #</label>
                </div>
                <div class="col-9">
                    <x-input name="tran_no" value="{{ $data['tran_no'] ?? '' }}" />
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="row g-0 align-items-center">
                <div class="col-3">
                    <label class="form-label w-100 m-0">Overseas Agent</label>
                </div>
                <div class="col-9">
                    @php
                        $option = [];
                        if (isset($data['overseas_agent'])) {
                            $option[$data['overseas_agent_id']] = $data['overseas_agent']['party_name'];
                        }
                    @endphp
                    <x-select name="overseas_agent_id" :options="$option" data-type="get_overseas"
                        data-url="/admin/party/get_all_data" class="search_select2"
                        value="{{ $data['overseas_agent_id'] ?? '' }}" />
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <button type="button" class="btn btn-primary btn-sm">
                Edit Vessel
            </button>

            <button type="button" class="btn btn-secondary btn-sm">
                Detail Upload
            </button>
        </div>

        <div class="col-md-5">
            <div class="row g-0 align-items-center">
                <div class="col-2">
                    <label class="form-label w-100 m-0">Vessel</label>
                </div>
                <div class="col-10">
                    @php
                        $option = [];
                        if (isset($data['vessel'])) {
                            $option[$data['vessel_id']] = $data['vessel']['vessel_name'];
                        }
                    @endphp
                    <x-select name="vessel_id" :options="$option" data-type="get_vessel"
                        data-url="/admin/vessel/get_all_data" class="search_select2"
                        value="{{ $data['vessel_id'] ?? '' }}" />
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row g-0 align-items-center">
                <div class="col-2">
                    <label class="form-label w-100 m-0">Voyage</label>
                </div>
                <div class="col-10">
                    @php
                        $option = [];
                        if (isset($data['vessel']['voyages'])) {
                            foreach ($data['vessel']['voyages'] as $key => $voyage) {
                                $option[$voyage['id']] = $voyage['voy'];
                            }
                        }
                    @endphp
                    <x-select name="voyage_id" class="select2" :options="$option"
                        value="{{ $data['voyage_id'] ?? '' }}" />
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="is_filter" name="is_filter"
                    @if (isset($data['is_filter']) && $data['is_filter'] == 1) checked @endif>
                <label class="form-check-label" for="is_filter">
                    Filter on Vessel, Voyage, O/Agent
                </label>
            </div>
        </div>
    </div>

    <div class="table-responsiv mt-5">
        <table class="table table-bordered align-middle bg-white" id="pre_alert_table">
            <thead class="table-light align-middle text-center">
                <tr>
                    <th width="6%">
                        <button type="button" class="btn btn-primary btn-sm" onclick="addRow()">
                            <i class="fa fa-plus"></i>
                        </button>
                    </th>
                    <th width="7%">SOC</th>
                    <th width="7%">Part FCL</th>
                    <th width="25%">Container #</th>
                    <th width="15%">Size/Type</th>
                    <th width="15%">Rate Group</th>
                    <th width="25%">Principal</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $rows = old('row', $data['rows'] ?? ['']);
                @endphp
                @foreach ($rows as $k => $v)
                    <tr>
                        <td>
                            <div class="text-center">
                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteRow(this)">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>

                            <input type="hidden" value="{{ $v['id'] ?? 0 }}" name="row[{{ $k }}][id]">
                        </td>
                        <td>
                            <div class="text-center">
                                <input class="form-check-input" type="checkbox" value="1"
                                    name="row[{{ $k }}][soc]"
                                    @if (isset($v['soc']) && $v['soc'] == 1) checked @endif />
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <input class="form-check-input" type="checkbox" value="1"
                                    name="row[{{ $k }}][part_fcl]"
                                    @if (isset($v['part_fcl']) && $v['part_fcl'] == 1) checked @endif />
                            </div>
                        </td>
                        <td>
                            @php
                                $option = [];
                                if (isset($v['container'])) {
                                    $option[$v['container_id']] = $v['container']['container_no'];
                                }
                            @endphp
                            <x-select name="row.{{ $k }}.container_id" class="search_select2 container_id"
                                realName="row[{{ $k }}][container_id]" :options="$option"
                                data-type="get_container" data-url="/admin/ctrk/get_all_data"
                                value="{{ $v['container_id'] ?? '' }}" />
                        </td>
                        <td>
                            @php
                                $option = [];
                                if (isset($v['size_type'])) {
                                    $option[$v['size_type_id']] = $v['size_type']['code'];
                                }
                            @endphp
                            <x-select name="row.{{ $k }}.size_type_id" class="search_select2 size_type_id"
                                realName="row[{{ $k }}][size_type_id]" :options="$option"
                                data-type="get_equipment" data-url="/admin/equipment/get_all_data"
                                value="{{ $v['size_type_id'] ?? '' }}" />
                        </td>
                        <td>
                            <x-input name="row.{{ $k }}.rate_group"
                                realName="row[{{ $k }}][rate_group]"
                                value="{{ $v['rate_group'] ?? '' }}" />
                        </td>
                        <td>
                            @php
                                $option = [];
                                if (isset($v['principal'])) {
                                    $option[$v['principal_id']] = $v['principal']['party_name'];
                                }
                            @endphp
                            <x-select name="row.{{ $k }}.principal_id" class="search_select2 principal_id"
                                realName="row[{{ $k }}][principal_id]" :options="$option"
                                data-type="get_principal" data-url="/admin/party/get_all_data"
                                value="{{ $v['principal_id'] ?? '' }}" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</form>
