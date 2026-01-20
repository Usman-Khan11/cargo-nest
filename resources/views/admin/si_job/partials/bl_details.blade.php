<div class="row g-2">
    <div class="col-5">
        <div class="row g-0 align-items-center mb-1">
            <div class="col-2">
                <label class="form-label w-100 m-0">Index Type</label>
            </div>
            <div class="col-4">
                <x-select name="bl_detail.index_type" realName="bl_detail[index_type]" :options="[
                    'general' => 'General',
                ]" />
            </div>
            <div class="col-2">
                <label class="form-label w-100 m-0">Index No</label>
            </div>
            <div class="col-2">
                <x-input name="bl_detail.index_no" realName="bl_detail[index_no]" value="" />
            </div>
            <div class="col-2">
                <x-input name="bl_detail.index_no_2" realName="bl_detail[index_no_2]" value="" class="ms-2" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-12">
                <label class="form-label">Shipper</label>
            </div>
            <div class="col-12">
                <x-input name="bl_detail.shipper" realName="bl_detail[shipper]" value="" is_textarea="true"
                    rows="5" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-2">
                <label class="form-label w-100 m-0">Shipper City</label>
            </div>
            <div class="col-10">
                <x-select name="bl_detail.shipper_city_id" realName="bl_detail[shipper_city_id]" :options="[]"
                    data-type="get_terminal_location" data-url="/admin/party/get_all_data" class="search_select2" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-12">
                <label class="form-label">Notify Party (1)</label>
            </div>
            <div class="col-12">
                <x-input name="bl_detail.notify_party_1" realName="bl_detail[notify_party_1]" value=""
                    is_textarea="true" rows="5" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-2">
                <label class="form-label w-100 m-0">Port of Loading</label>
            </div>
            <div class="col-10">
                <x-select name="bl_detail.port_of_loading_id" realName="bl_detail[port_of_loading_id]" :options="[]"
                    data-type="get_location" data-url="/admin/location/get_all_data" class="search_select2" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-2">
                <label class="form-label w-100 m-0">Port of Discharge</label>
            </div>
            <div class="col-10">
                <x-select name="bl_detail.port_of_discharge_id" realName="bl_detail[port_of_discharge_id]"
                    :options="[]" data-type="get_location" data-url="/admin/location/get_all_data"
                    class="search_select2" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-2">
                <label class="form-label w-100 m-0">Place of Delivery</label>
            </div>
            <div class="col-10">
                <x-select name="bl_detail.place_of_delivery_id" realName="bl_detail[place_of_delivery_id]"
                    :options="[]" data-type="get_location" data-url="/admin/location/get_all_data"
                    class="search_select2" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-2">
                <label class="form-label w-100 m-0">CBM</label>
            </div>
            <div class="col-3">
                <x-input type="number" name="bl_detail.cbm" realName="bl_detail[cbm]" value="" />
            </div>

            <div class="col-2">
                <label class="form-label w-100 m-0">Freight $</label>
            </div>
            <div class="col-3 pe-2">
                <x-input type="number" name="bl_detail.freight" realName="bl_detail[freight]" value="" />
            </div>
            <div class="col-2">
                <x-select name="bl_detail.f" realName="bl_detail[f]" :options="[]" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-2">
                <label class="form-label w-100 m-0">Packages</label>
            </div>
            <div class="col-3">
                <x-input type="number" name="bl_detail.packages" realName="bl_detail[packages]" value="" />
            </div>

            <div class="col-2">
                <label class="form-label w-100 m-0">Unit</label>
            </div>
            <div class="col-5">
                <x-input name="bl_detail.unit" realName="bl_detail[unit]" value="" />
            </div>
        </div>
    </div>

    <div class="col-5">
        <div class="row g-0 align-items-center mb-1">
            <div class="col-2">
                <label class="form-label w-100 m-0">Cargo Type</label>
            </div>
            <div class="col-4">
                <x-select name="bl_detail.cargo_type" realName="bl_detail[cargo_type]" :options="[
                    'fcl' => 'FCL',
                ]" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-12">
                <label class="form-label">Consignee</label>
            </div>
            <div class="col-12">
                <x-input name="bl_detail.consignee" realName="bl_detail[consignee]" value=""
                    is_textarea="true" rows="5" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-2">
                <label class="form-label w-100 m-0">Consignee City</label>
            </div>
            <div class="col-10">
                <x-select name="bl_detail.consignee_city_id" realName="bl_detail[consignee_city_id]" :options="[]"
                    data-type="get_terminal_location" data-url="/admin/party/get_all_data" class="search_select2" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-12">
                <label class="form-label">Notify Party (2)</label>
            </div>
            <div class="col-12">
                <x-input name="bl_detail.notify_party_2" realName="bl_detail[notify_party_2]" value=""
                    is_textarea="true" rows="5" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-12">
                <label class="form-label">Delivery Agent</label>
            </div>
            <div class="col-12">
                <x-input name="bl_detail.delivery_agent" realName="bl_detail[delivery_agent]" value=""
                    is_textarea="true" rows="5" />
            </div>
        </div>

        <div class="row g-0 align-items-center mb-1">
            <div class="col-3">
                <label class="form-label w-100 m-0">No of Original B/L's</label>
            </div>
            <div class="col-3">
                <x-input type="number" name="bl_detail.no_of_original_bl" realName="bl_detail[no_of_original_bl]"
                    value="" />
            </div>

            <div class="col-2">
                <label class="form-label w-100 m-0">Agent Stamp</label>
            </div>
            <div class="col-4">
                <x-input name="bl_detail.agent_stamp" realName="bl_detail[agent_stamp]" value="" />
            </div>
        </div>
    </div>

    <div class="col-2">
        <button type="button" class="btn btn-primary btn-sm">
            Refresh B/L Detail
        </button>
    </div>
</div>

<div class="row g-2 align-items-center">
    <div class="col-1">
        <div class="form-check m-0">
            <input class="form-check-input" type="checkbox" value="1" id="bl_detail_manual"
                name="bl_detail[manual]">
            <label class="form-check-label" for="bl_detail_manual">
                Manual
            </label>
        </div>
    </div>

    <div class="col-2">
        <div class="row g-0 align-items-center">
            <div class="col-3">
                <label class="form-label w-100 m-0">Net WT</label>
            </div>
            <div class="col-9">
                <x-input type="number" name="bl_detail.net_wt" realName="bl_detail[net_wt]" value="" />
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="row g-0 align-items-center">
            <div class="col-3">
                <label class="form-label w-100 m-0">WT Unit</label>
            </div>
            <div class="col-9">
                <x-select name="bl_detail.wt_unit" realName="bl_detail[wt_unit]" :options="[]" />
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="row g-0 align-items-center">
            <div class="col-3">
                <label class="form-label w-100 m-0">Gross WT</label>
            </div>
            <div class="col-9">
                <x-input type="number" name="bl_detail.gross_wt" realName="bl_detail[gross_wt]" value="" />
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="row g-0 align-items-center">
            <div class="col-3">
                <label class="form-label w-100 m-0">Tare WT</label>
            </div>
            <div class="col-9">
                <x-input type="number" name="bl_detail.tare_wt" realName="bl_detail[tare_wt]" value="" />
            </div>
        </div>
    </div>
</div>

<div class="row g-2 align-items-center mt-1">
    <div class="col-2">
        <div class="row g-0 align-items-center">
            <div class="col-3">
                <label class="form-label w-100 m-0">HS Code</label>
            </div>
            <div class="col-9">
                <x-input name="bl_detail.hs_code" realName="bl_detail[hs_code]" value="" />
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="row g-0 align-items-center">
            <div class="col-4">
                <label class="form-label w-100 m-0">Hazmat Code</label>
            </div>
            <div class="col-8">
                <x-input name="bl_detail.hazmat_code" realName="bl_detail[hazmat_code]" value="" />
            </div>
        </div>
    </div>
</div>

<hr>

<div class="row g-2 align-items-center">
    <div class="col-12">
        <h5 class="m-0">Product/Serial Info</h5>
    </div>

    <div class="col-2">
        <div class="row g-0 align-items-center">
            <div class="col-4">
                <label class="form-label w-100 m-0">Product Qty</label>
            </div>
            <div class="col-8">
                <x-input type="number" step="any" name="bl_detail.product_qty"
                    realName="bl_detail[product_qty]" value="" />
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="row g-0 align-items-center">
            <div class="col-4">
                <label class="form-label w-100 m-0">Product Unit</label>
            </div>
            <div class="col-8">
                <x-input name="bl_detail.product_unit" realName="bl_detail[product_unit]" value="" />
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="row g-0 align-items-center">
            <div class="col-5">
                <label class="form-label w-100 m-0">Unit Per Value</label>
            </div>
            <div class="col-7">
                <x-input type="number" step="any" name="bl_detail.product_unit_per_value"
                    realName="bl_detail[product_unit_per_value]" value="" />
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="row g-0 align-items-center">
            <div class="col-4">
                <label class="form-label w-100 m-0">Serial Type</label>
            </div>
            <div class="col-8">
                <x-select name="bl_detail.serial_type" realName="bl_detail[serial_type]" :options="[]" />
            </div>
        </div>
    </div>

    <div class="col-3">
        <div class="row g-0 align-items-center">
            <div class="col-4">
                <label class="form-label w-100 m-0">Serial Category</label>
            </div>
            <div class="col-8">
                <x-select name="bl_detail.serial_category" realName="bl_detail[serial_category]" :options="[]" />
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="row g-0 align-items-center">
            <div class="col-3">
                <label class="form-label w-100 m-0">Country of Origin</label>
            </div>
            <div class="col-9">
                <x-select name="bl_detail.country_of_origin_id" realName="bl_detail[country_of_origin_id]"
                    :options="[]" />
            </div>
        </div>
    </div>

    <div class="col-4"></div>

    <div class="col-3">
        <div class="row g-0 align-items-center">
            <div class="col-4">
                <label class="form-label w-100 m-0">Serial Exception</label>
            </div>
            <div class="col-8">
                <x-select name="bl_detail.serial_exception" realName="bl_detail[serial_exception]"
                    :options="[]" />
            </div>
        </div>
    </div>
</div>

<hr>

<div class="border border-primary my-2 p-2">
    <div class="row g-1">
        <div class="col-md-2 col-12">
            <label class="form-label">Marks No</label>
            <x-input name="bl_detail.marks_no" realName="bl_detail[marks_no]" value="" is_textarea="true"
                rows="4" />
        </div>

        <div class="col-md-2 col-12">
            <label class="form-label">No of Pkgs or Shipping Units</label>
            <x-input name="bl_detail.no_of_pkgs" realName="bl_detail[no_of_pkgs]" value="" is_textarea="true"
                rows="4" />
        </div>

        <div class="col-md-4 col-12">
            <label class="form-label">Description of Goods & Pkgs</label>
            <x-input name="bl_detail.description" realName="bl_detail[description]" value=""
                is_textarea="true" rows="4" />
        </div>

        <div class="col-md-2 col-12">
            <label class="form-label">Gross Weight</label>
            <x-input name="bl_detail.gross_weight" realName="bl_detail[gross_weight]" value=""
                is_textarea="true" rows="4" />
        </div>

        <div class="col-md-2 col-12">
            <label class="form-label">Measurement</label>
            <x-input name="bl_detail.measurement" realName="bl_detail[measurement]" value=""
                is_textarea="true" rows="4" />
        </div>
    </div>
</div>

<div class="row g-2 align-items-center mt-1">
    <div class="col-3">
        <div class="row g-0 align-items-center">
            <div class="col-4">
                <label class="form-label w-100 m-0">On Board Date</label>
            </div>
            <div class="col-8">
                <x-input type="date" name="bl_detail.on_board_date" realName="bl_detail[on_board_date]"
                    value="" />
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="row g-0 align-items-center">
            <div class="col-3">
                <label class="form-label w-100 m-0">Place and Date of Issue</label>
            </div>
            <div class="col-6">
                <x-input name="bl_detail.place_issue" realName="bl_detail[place_issue]" value="" />
            </div>
            <div class="col-3 ps-2">
                <x-input type="date" name="bl_detail.place_date" realName="bl_detail[place_date]"
                    value="" />
            </div>
        </div>
    </div>
</div>
