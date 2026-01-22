<form id="newForm" method="post" action="{{ route('admin.manifest.store') }}" enctype="multipart/form-data"
    data-navigation_url="{{ route('admin.manifest.get') }}">
    @csrf
    <input type="hidden" name="id" value="{{ $data['id'] ?? 0 }}">

    <div class="row g-2">
        <div class="col-5">
            <div class="row g-0 align-items-center mb-1">
                <div class="col-3">
                    <label class="form-label w-100 m-0">Tran #</label>
                </div>
                <div class="col-3">
                    <x-input name="tran_no" value="{{ $data['tran_no'] ?? '' }}" />
                </div>

                <div class="col-1">
                    <label class="form-label w-100 m-0">Doc #</label>
                </div>
                <div class="col-2">
                    <x-input name="doc_no" value="{{ $data['doc_no'] ?? '' }}" />
                </div>

                <div class="col-1">
                    <label class="form-label w-100 m-0">Year</label>
                </div>
                <div class="col-2">
                    <x-input name="year" value="{{ $data['year'] ?? '' }}" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-3">
                    <label class="form-label w-100 m-0">Shipping Line/Agent</label>
                </div>
                <div class="col-9">
                    @php
                        $option = [];
                        if (isset($data['shipping_agent'])) {
                            $option[$data['shipping_agent_id']] = $data['shipping_agent']['party_name'];
                        }
                    @endphp
                    <x-select name="shipping_agent_id" :options="$option" data-type="get_shipper"
                        data-url="/admin/party/get_all_data" class="search_select2"
                        value="{{ $data['shipping_agent_id'] ?? '' }}" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-3">
                    <label class="form-label w-100 m-0">Local Custom</label>
                </div>
                <div class="col-9">
                    @php
                        $option = [];
                        if (isset($data['local_custom'])) {
                            $option[$data['local_custom_id']] = $data['local_custom']['party_name'];
                        }
                    @endphp
                    <x-select name="local_custom_id" :options="$option" data-type="get_shipper"
                        data-url="/admin/party/get_all_data" class="search_select2"
                        value="{{ $data['local_custom_id'] ?? '' }}" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-3">
                    <label class="form-label w-100 m-0">Vessel</label>
                </div>
                <div class="col-9">
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

            <div class="row g-0 align-items-center mb-1">
                <div class="col-3">
                    <label class="form-label w-100 m-0">Country</label>
                </div>
                <div class="col-9">
                    @php
                        $option = [];
                        if (isset($data['country'])) {
                            $option[$data['country_id']] = $data['country']['location'];
                        }
                    @endphp
                    <x-select name="country_id" :options="$option" data-type="get_shipper"
                        data-url="/admin/party/get_all_data" class="search_select2"
                        value="{{ $data['country_id'] ?? '' }}" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-3">
                    <label class="form-label w-100 m-0">Last Port of Call</label>
                </div>
                <div class="col-9">
                    @php
                        $option = [];
                        if (isset($data['last_port_of_call'])) {
                            $option[$data['last_port_of_call_id']] = $data['last_port_of_call']['vessel_name'];
                        }
                    @endphp
                    <x-select name="last_port_of_call_id" :options="$option" data-type="get_vessel"
                        data-url="/admin/vessel/get_all_data" class="search_select2"
                        value="{{ $data['last_port_of_call_id'] ?? '' }}" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-3">
                    <label class="form-label w-100 m-0">Terminal</label>
                </div>
                <div class="col-9">
                    @php
                        $option = [];
                        if (isset($data['terminal'])) {
                            $option[$data['terminal_id']] = $data['terminal']['party_name'];
                        }
                    @endphp
                    <x-select name="terminal_id" :options="$option" data-type="get_terminals"
                        data-url="/admin/party/get_all_data" class="search_select2"
                        value="{{ $data['terminal_id'] ?? '' }}" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-3">
                    <label class="form-label w-100 m-0">CFS / Depot Facility</label>
                </div>
                <div class="col-9">
                    @php
                        $option = [];
                        if (isset($data['cfs_depot_facility'])) {
                            $option[$data['cfs_depot_facility_id']] = $data['cfs_depot_facility']['party_name'];
                        }
                    @endphp
                    <x-select name="cfs_depot_facility_id" :options="$option" data-type="get_terminals"
                        data-url="/admin/party/get_all_data" class="search_select2"
                        value="{{ $data['cfs_depot_facility_id'] ?? '' }}" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-3">
                    <label class="form-label w-100 m-0">Shipping License</label>
                </div>
                <div class="col-9">
                    @php
                        $option = [];
                        if (isset($data['shipping_license'])) {
                            $option[$data['shipping_license_id']] = $data['shipping_license']['party_name'];
                        }
                    @endphp
                    <x-select name="shipping_license_id" :options="$option" data-type="get_terminals"
                        data-url="/admin/party/get_all_data" class="search_select2"
                        value="{{ $data['shipping_license_id'] ?? '' }}" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-3">
                    <label class="form-label w-100 m-0">Local Port</label>
                </div>
                <div class="col-9">
                    @php
                        $option = [];
                        if (isset($data['local_port'])) {
                            $option[$data['local_port_id']] = $data['local_port']['party_name'];
                        }
                    @endphp
                    <x-select name="local_port_id" :options="$option" data-type="get_terminals"
                        data-url="/admin/party/get_all_data" class="search_select2"
                        value="{{ $data['local_port_id'] ?? '' }}" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
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

            <div class="row g-0 align-items-center mb-1">
                <div class="col-3">
                    <label class="form-label w-100 m-0">Principal</label>
                </div>
                <div class="col-9">
                    @php
                        $option = [];
                        if (isset($data['principal'])) {
                            $option[$data['principal_id']] = $data['principal']['party_name'];
                        }
                    @endphp
                    <x-select name="principal_id" :options="$option" data-type="get_principal"
                        data-url="/admin/party/get_all_data" class="search_select2"
                        value="{{ $data['principal_id'] ?? '' }}" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-3">
                    <label class="form-label w-100 m-0">Docs Rcvd From S/Line</label>
                </div>
                <div class="col-3">
                    <x-input name="doc_received_date" value="{{ $data['doc_received_date'] ?? '' }}"
                        type="date" />
                </div>

                <div class="col-2">
                    <label class="form-label w-100 m-0">Cost Center</label>
                </div>
                <div class="col-4">
                    <x-select name="cost_center" :options="['' => 'Head Office']" value="{{ $data['cost_center'] ?? '' }}" />
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="row g-0 align-items-center mb-1">
                <div class="col-4">
                    <label class="form-label w-100 m-0">Operation</label>
                </div>
                <div class="col-8">
                    @php
                        $option = operations();
                    @endphp
                    <x-select name="operation" :options="$option" value="{{ $data['operation'] ?? 'sea_import' }}" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-4">
                    <label class="form-label w-100 m-0">Book No</label>
                </div>
                <div class="col-8">
                    <x-input name="book_no" value="{{ $data['book_no'] ?? '' }}" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-4">
                    <label class="form-label w-100 m-0">Guarantee No</label>
                </div>
                <div class="col-8">
                    <x-input name="guarantee_no" value="{{ $data['guarantee_no'] ?? '' }}" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-4">
                    <label class="form-label w-100 m-0">Voyage</label>
                </div>
                <div class="col-8">
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

            <div class="row g-0 align-items-center mb-1">
                <div class="col-4">
                    <label class="form-label w-100 m-0">Arrival Date</label>
                </div>
                <div class="col-8">
                    <x-input name="arrival_date" value="{{ $data['arrival_date'] ?? '' }}" type="date" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-4">
                    <label class="form-label w-100 m-0">IGM Date</label>
                </div>
                <div class="col-8">
                    <x-input name="igm_date" value="{{ $data['igm_date'] ?? '' }}" type="date" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-4">
                    <label class="form-label w-100 m-0">Ground Date</label>
                </div>
                <div class="col-8">
                    <x-input name="ground_date" value="{{ $data['ground_date'] ?? '' }}" type="date" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-4">
                    <label class="form-label w-100 m-0">Time</label>
                </div>
                <div class="col-8">
                    <x-input name="time" value="{{ $data['time'] ?? '' }}" type="time" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-4">
                    <label class="form-label w-100 m-0">IGM No</label>
                </div>
                <div class="col-8">
                    <x-input name="igm_no" value="{{ $data['igm_no'] ?? '' }}" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-4">
                    <label class="form-label w-100 m-0">VIR No</label>
                </div>
                <div class="col-8">
                    <x-input name="vir_no" value="{{ $data['vir_no'] ?? '' }}" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-4">
                    <label class="form-label w-100 m-0">Starting Index #</label>
                </div>
                <div class="col-8">
                    <x-input name="starting_index_no" value="{{ $data['starting_index_no'] ?? '' }}" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-4">
                    <label class="form-label w-100 m-0">Pre Alert Date</label>
                </div>
                <div class="col-8">
                    <x-input name="pre_alert_date" value="{{ $data['pre_alert_date'] ?? '' }}" type="date" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-4">
                    <label class="form-label w-100 m-0">Date of Amendment</label>
                </div>
                <div class="col-8">
                    <x-input name="date_of_amendment" value="{{ $data['date_of_amendment'] ?? '' }}"
                        type="date" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-4">
                    <label class="form-label w-100 m-0">Operator Code</label>
                </div>
                <div class="col-8">
                    <x-input name="operator_code" value="{{ $data['operator_code'] ?? '' }}" />
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="row g-0 align-items-center mb-1">
                <div class="col-3">
                    <label class="form-label w-100 m-0">Ship Company</label>
                </div>
                <div class="col-9">
                    <x-input name="ship_company" value="{{ $data['ship_company'] ?? '' }}" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-3">
                    <label class="form-label w-100 m-0">Captain Name</label>
                </div>
                <div class="col-9">
                    <x-input name="captain_name" value="{{ $data['captain_name'] ?? '' }}" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-3">
                    <label class="form-label w-100 m-0">Berth/Warf/Term</label>
                </div>
                <div class="col-9">
                    <x-input name="berth_warf_term" value="{{ $data['berth_warf_term'] ?? '' }}" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-3">
                    <label class="form-label w-100 m-0">Remarks</label>
                </div>
                <div class="col-9">
                    <x-input name="remarks" value="{{ $data['remarks'] ?? '' }}" is_textarea="true"
                        rows="2" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-3">
                    <label class="form-label w-100 m-0">Same Bottom Cargo</label>
                </div>
                <div class="col-9">
                    <x-input name="same_bottom_cargo" value="{{ $data['same_bottom_cargo'] ?? '' }}" />
                </div>
            </div>

            <div class="row g-0 align-items-center mb-1">
                <div class="col-3">
                    <label class="form-label w-100 m-0">Manifest Ref #</label>
                </div>
                <div class="col-9">
                    <x-input name="manifest_ref_no" value="{{ $data['manifest_ref_no'] ?? '' }}" />
                </div>
            </div>

            <div class="mt-3 ps-4">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="1" id="manifest_update"
                        name="manifest_update">
                    <label class="form-check-label" for="manifest_update">
                        Manifest Update
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="manifest_submitted"
                        name="manifest_submitted">
                    <label class="form-check-label" for="manifest_submitted">
                        Manifest Submitted to Custom
                    </label>
                </div>
            </div>

            <div class="mt-3 ps-4">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" value="1" id="is_manifested"
                        name="is_manifested" checked>
                    <label class="form-check-label" for="is_manifested">
                        Manifested
                    </label>
                </div>

                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" value="1" id="is_non_manifested"
                        name="is_manifested">
                    <label class="form-check-label" for="is_non_manifested">
                        Non Manifested
                    </label>
                </div>
            </div>

            <div class="text-center mt-5">
                <h5 class="d-inline-block">
                    <b>GF #:</b> N/A
                </h5>

                <h5 class="d-inline-block ms-4">
                    <b>DRAFT</b>
                </h5>

                <button type="button" class="btn btn-primary ms-4">
                    Crucial Changes
                </button>
            </div>

            <div class="text-center mt-4">
                <button type="button" class="btn btn-primary btn-sm">
                    Show Manifest List
                </button>

                <button type="button" class="btn btn-primary btn-sm">
                    Show Jobs
                </button>

                <button type="button" class="btn btn-primary btn-sm">
                    Show Summary
                </button>

                <button type="button" class="btn btn-primary btn-sm">
                    EDI
                </button>
            </div>
        </div>
    </div>
</form>
