<div class="row g-3 mb-3">
    <div class="col-md-5">
        <h5 class="m-0">
            <b>B/L Information:</b> N/A
        </h5>
    </div>

    <div class="col-md-5">
        <h5 class="m-0">
            <b>Total Containers #:</b> N/A
        </h5>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-2">
        <h5 class="m-0">
            <b>Tariff Applied:</b> N/A
        </h5>
    </div>

    <div class="col-md-2">
        <div class="row g-0 align-items-center mb-1">
            <div class="col-4">
                <label class="form-label w-100 m-0">Containers #</label>
            </div>
            <div class="col-8">
                <x-input name="equipment.containers" realName="equipment[containers]" value="" />
            </div>
        </div>
    </div>

    <div class="col-md-1"></div>

    <div class="col-md-5">
        <h5 class="m-0">
            <b>Parent Job:</b> N/A
        </h5>
    </div>
</div>

<hr>

<div class="row g-3">
    <div class="col-4">
        <button type="button" class="btn btn-primary btn-sm">Pick Containers</button>
        <button type="button" class="btn btn-primary btn-sm">Equipment Summary</button>
        <button type="button" class="btn btn-primary btn-sm">Details Upload</button>
    </div>

    <div class="col-2">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="overwrite_containers"
                name="equipment[overwrite_containers]">
            <label class="form-check-label" for="overwrite_containers">
                Overwrite Containers
            </label>
        </div>
    </div>

    <div class="col-2">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="inactive_containers"
                name="equipment[inactive_containers]">
            <label class="form-check-label" for="inactive_containers">
                Inactive Containers
            </label>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-bordered text-center mt-3" style="width: 1920px;">
        <thead class="table-light">
            <tr>
                <th colspan="21">
                    <h4 class="m-0">Container Details</h4>
                </th>
            </tr>
            <tr>
                <th colspan="15"></th>
                <th colspan="3">
                    <h5 class="m-0">Principal Information</h5>
                </th>
                <th colspan="3">
                    <h5 class="m-0">Free Days</h5>
                </th>
            </tr>
            <tr>
                <th width="3%">...</th>
                <th width="2%">S#</th>
                <th width="8%">Container #</th>
                <th width="5%">Seal #</th>
                <th width="5%">Size/Type</th>
                <th width="5%">Gross Wt</th>
                <th width="5%">Net Wt</th>
                <th width="6%">Rate Group</th>
                <th width="5%">Tare Wt</th>
                <th width="5%">WT Unit</th>
                <th width="5%">CBM</th>
                <th width="8%">Packages</th>
                <th width="5%">Unit</th>
                <th width="5%">Temp</th>
                <th width="7%">Voltage</th>
                <th width="5%">Load Type</th>
                <th width="8%">Destuffing Date</th>
                <th width="8%">Remarks</th>
                <th width="3%">Code</th>
                <th width="5%">Name</th>
                <th width="5%">Equip Inv.</th>
            </tr>
        </thead>
    </table>
</div>

<hr>

<div class="row g-3 align-items-center">
    <div class="col-1">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="free_day_manual"
                name="equipment[manual]">
            <label class="form-check-label" for="free_day_manual">
                Manual
            </label>
        </div>
    </div>

    <div class="col-2">
        <div class="row g-0 align-items-center">
            <div class="col-7">
                <label class="form-label w-100 m-0">Free Days Dentention</label>
            </div>
            <div class="col-5">
                <x-input type="number" name="equipment.free_days_dentention" realName="equipment[free_days_dentention]"
                    value="" />
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="row g-0 align-items-center">
            <div class="col-7">
                <label class="form-label w-100 m-0">Free Days Demurrage</label>
            </div>
            <div class="col-5">
                <x-input type="number" name="equipment.free_days_demurrage"
                    realName="equipment[free_days_demurrage]" value="" />
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="row g-0 align-items-center">
            <div class="col-7">
                <label class="form-label w-100 m-0">Free Days Plug In</label>
            </div>
            <div class="col-5">
                <x-input type="number" name="equipment.free_days_plugin" realName="equipment[free_days_plugin]"
                    value="" />
            </div>
        </div>
    </div>

    <div class="col-2">
        <button type="button" class="btn btn-primary btn-sm">Update Free days</button>
    </div>
</div>

<hr>

<div class="table-responsive">
    <table class="table table-bordered text-center align-middle">
        <thead class="table-light align-middle">
            <tr>
                <th colspan="9">
                    <h4 class="m-0">Equipment Summary</h4>
                </th>
            </tr>
            <tr>
                <th width="6%">
                    <button type="button" class="btn btn-primary btn-sm">Add</button>
                </th>
                <th width="15%">Size/Type</th>
                <th width="15%">Rate Group</th>
                <th width="8%">Qty</th>
                <th width="8%">Code</th>
                <th width="10%">Name</th>
                <th width="10%">DG NONDG</th>
                <th width="15%">Gross WT/CNT</th>
                <th width="10%">TEU</th>
            </tr>
        </thead>
        <tbody>
            @php
                $equipment_summary_rows = old('equipment_summary', ['']);
            @endphp
            @foreach ($equipment_summary_rows as $k => $v)
                @include('admin.si_job.partials.equipment_summary_row', [
                    'index' => $k,
                    'data' => $v,
                ])
            @endforeach
        </tbody>
    </table>
</div>
