<table class="table table-bordered text-nowrap table-sm text-center">
    <thead>
        <tr>
            {{-- <th>...</th> --}}
            <th>S.No</th>
            <th>Job #</th>
            <th>Job Date</th>
            <th>Job Nature</th>
            <th>HBL #</th>
            <th>HBL Date</th>
            <th>Client Name</th>
            <th>Volume</th>
            <th>Packages</th>
            <th>Port of Discharge</th>
            <th>Port of Receipt</th>
            <th>Total Container</th>
            <th>20FT</th>
            <th>40FT</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($manifest as $key => $value)
            @foreach ($value->job->bl->whereNull('mbl')->get() as $k => $bl)
                <tr>
                    {{-- <td>
                    <button type="button" class="btn btn-danger btn-sm">
                        <i class="fa fa-circle-xmark"></i>
                    </button>
                </td> --}}
                    <td>
                        {{-- <input name="" class="form-control" type="text" /> --}}
                        {{ $k + 1 }}
                    </td>
                    <td>
                        {{-- <input name="h_job_no[]" class="form-control h_job_no" type="text" readonly /> --}}
                        {{ $value->job->job_number }}
                    </td>
                    <td>
                        {{-- <input name="h_job_date[]" class="form-control h_job_date" type="text" readonly /> --}}
                        {{ date('d-M-Y', strtotime($value->job->job_date)) }}
                    </td>
                    <td>
                        {{-- <input name="h_job_nature[]" class="form-control h_job_nature" type="text" readonly /> --}}
                        {{ $value->job->nature }}
                    </td>
                    <td>
                        {{-- <input name="h_hbl_no[]" class="form-control h_hbl_no" type="text" readonly /> --}}
                        {{ $bl->hbl }}
                    </td>
                    <td>
                        {{-- <input name="h_hbl_date[]" class="form-control h_hbl_date" type="text" readonly /> --}}
                        {{ date('d-M-Y', strtotime($bl->hbl_date)) }}
                    </td>
                    <td>
                        {{-- <input name="h_client_name[]" class="form-control h_client_name" type="text" readonly /> --}}
                        {{ $value->job->consignees->party_name }}
                    </td>
                    <td>
                        {{-- <input name="h_volume[]" class="form-control h_volume" type="text" readonly /> --}}
                        {{ $value->job->volume }}
                    </td>
                    <td>
                        {{-- <input name="h_packages[]" class="form-control h_packages" type="text" readonly /> --}}
                    </td>
                    <td>
                        {{-- <input name="h_port_of_discharge[]" class="form-control h_port_of_discharge" type="text"
                        readonly /> --}}
                        {{ $value->job->job_routing->port_of_discharge->location }}
                    </td>
                    <td>
                        {{-- <input name="h_port_of_receipt[]" class="form-control h_port_of_receipt" type="text" readonly /> --}}
                        {{ $value->job->job_routing->place_of_receipt->location }}
                    </td>
                    <td>
                        {{-- <input name="h_total_container[]" class="form-control h_total_container" type="text" readonly /> --}}
                        {{ $bl->total_container }}
                    </td>
                    <td>
                        {{-- <input name="h_20ft[]" class="form-control h_20ft" type="text" readonly /> --}}
                    </td>
                    <td>
                        {{-- <input name="h_40ft[]" class="form-control h_40ft" type="text" readonly /> --}}
                    </td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
