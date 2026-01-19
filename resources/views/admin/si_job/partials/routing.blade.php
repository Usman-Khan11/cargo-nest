<div class="row g-2">
    <div class="col-6">
        <div class="row g-0 align-items-center mb-1">
            <div class="col-3">
                <label class="form-label w-100 m-0">Service Type</label>
            </div>
            <div class="col-7">
                <x-select name="routing.service_type_id" realName="routing[service_type_id]" :options="[]"
                    data-type="get_service_types" data-url="/admin/service-type/get_all_data" class="search_select2" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-3">
                <label class="form-label w-100 m-0">Place of Receipt</label>
            </div>
            <div class="col-7">
                <x-select name="routing.place_of_receipt_id" realName="routing[place_of_receipt_id]" :options="[]"
                    data-type="get_location" data-url="/admin/location/get_all_data" class="search_select2" />
            </div>
            <div class="col-2">
                <x-select name="routing." realName="routing[]" :options="[]" class="ms-1" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-3">
                <label class="form-label w-100 m-0">Port of Loading</label>
            </div>
            <div class="col-7">
                <x-select name="routing.port_of_loading_id" realName="routing[port_of_loading_id]" :options="[]"
                    data-type="get_location" data-url="/admin/location/get_all_data" class="search_select2" />
            </div>
            <div class="col-2">
                <x-input type="date" name="routing.port_of_loading_date" realName="routing[port_of_loading_date]"
                    value="" class="ms-1" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-3">
                <label class="form-label w-100 m-0">Port Of Trashipment</label>
            </div>
            <div class="col-7">
                <x-select name="routing.port_of_trashipment_id" realName="routing[port_of_trashipment_id]"
                    :options="[]" data-type="get_location" data-url="/admin/location/get_all_data"
                    class="search_select2" />
            </div>
            <div class="col-2">
                <x-input type="date" name="routing.port_of_trashipment_date"
                    realName="routing[port_of_trashipment_date]" value="" class="ms-1" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-3">
                <label class="form-label w-100 m-0">Port of Discharge</label>
            </div>
            <div class="col-7">
                <x-select name="routing.port_of_discharge_id" realName="routing[port_of_discharge_id]" :options="[]"
                    data-type="get_location" data-url="/admin/location/get_all_data" class="search_select2" />
            </div>
            <div class="col-2">
                <x-select name="routing." realName="routing[]" :options="[]" class="ms-1" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-3">
                <label class="form-label w-100 m-0">Final Destination</label>
            </div>
            <div class="col-7">
                <x-select name="routing.final_destination_id" realName="routing[final_destination_id]" :options="[]"
                    data-type="get_location" data-url="/admin/location/get_all_data" class="search_select2" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-3">
                <label class="form-label w-100 m-0">Freight Payable At</label>
            </div>
            <div class="col-7">
                <x-select name="routing.freight_payable_at_id" realName="routing[freight_payable_at_id]"
                    :options="[]" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-3">
                <label class="form-label w-100 m-0">CFS/Depot Facility</label>
            </div>
            <div class="col-7">
                <x-select name="routing.cfs_depot_facility_id" realName="routing[cfs_depot_facility_id]"
                    :options="[]" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-3">
                <label class="form-label w-100 m-0">Terminal</label>
            </div>
            <div class="col-7">
                <x-select name="routing.terminal_id" realName="routing[terminal_id]" :options="[]"
                    data-type="get_terminal_location" data-url="/admin/party/get_all_data" class="search_select2" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-3">
                <label class="form-label w-100 m-0">Via Port</label>
            </div>
            <div class="col-7">
                <x-input name="routing.via_port" realName="routing[via_port]" value="" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-3">
                <label class="form-label w-100 m-0">Delivery</label>
            </div>
            <div class="col-2">
                <x-select name="routing.delivery" realName="routing[delivery]" :options="[
                    'CY CY' => 'CY CY',
                ]" />
            </div>

            <div class="col-2 text-end">
                <input class="form-check-input me-1" type="checkbox" value="1" id="is_transhipment"
                    name="routing[is_transhipment]">
                <label class="form-check-label me-2" for="is_transhipment">
                    Transhipment
                </label>
            </div>
            <div class="col-3">
                <x-select name="routing.transhipment" realName="routing[transhipment]" :options="[]" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-3">
                <label class="form-label w-100 m-0">Feeder Vessel</label>
            </div>
            <div class="col-7">
                <x-select name="routing.vessel_id" realName="routing[vessel_id]" :options="[]"
                    data-type="get_vessel" data-url="/admin/vessel/get_all_data" class="search_select2" />
            </div>
        </div>

        <div class="row g-0 align-items-center">
            <div class="col-3">
                <label class="form-label w-100 m-0">Voyage</label>
            </div>
            <div class="col-4">
                <x-select name="routing.voyage_id" realName="routing[voyage_id]" :options="[]" />
            </div>
            <div class="col-3 text-end">
                <button type="button" class="btn btn-primary btn-sm">Show Transhipment</button>
            </div>
        </div>
    </div>
</div>
