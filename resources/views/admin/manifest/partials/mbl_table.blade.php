<table class="table table-bordered text-nowrap table-sm text-center">
    <thead>
        <tr>
            {{-- <th>...</th> --}}
            <th>S.No</th>
            <th>Job #</th>
            <th>Job Date</th>
            <th>Job Nature</th>
            <th>Job Type</th>
            <th>MBL #</th>
            <th>MBL Date</th>
            <th>Destuffing Date</th>
            <th>Total HBL</th>
            <th>Volume</th>
            <th>Total Container</th>
            <th>20FT</th>
            <th>40FT</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($manifest as $key => $value)
            @foreach ($value->job->bl->whereNotNull('mbl')->get() as $k => $bl)
                <tr>
                    {{-- <td>
                <button type="button" class="btn btn-danger btn-sm" onclick="delContainer(this)">
                    <i class="fa fa-circle-xmark"></i>
                </button>
            </td> --}}
                    <td>
                        {{-- <input name="" class="form-control" type="text" /> --}}
                        {{ $k + 1 }}
                    </td>
                    <td>
                        {{-- <input name="m_job_no[]" class="form-control m_job_no" type="text" readonly /> --}}
                        {{ $value->job->job_number }}
                    </td>
                    <td>
                        {{-- <input name="m_job_date[]" class="form-control m_job_date" type="text" readonly /> --}}
                        {{ date('d-M-Y', strtotime($value->job->job_date)) }}
                    </td>
                    <td>
                        {{-- <input name="m_job_nature[]" class="form-control m_job_nature" type="text" readonly /> --}}
                        {{ $value->job->nature }}
                    </td>
                    <td>
                        {{-- <input name="m_job_type[]" class="form-control m_job_type" type="text" readonly /> --}}
                        {{ $value->job->job_type }}
                    </td>
                    <td>
                        {{-- <input name="m_mbl_no[]" class="form-control m_mbl_no" type="text" readonly /> --}}
                        {{ $bl->mbl }}
                    </td>
                    <td>
                        {{-- <input name="m_mbl_date[]" class="form-control m_mbl_date" type="text" readonly /> --}}
                        {{ date('d-M-Y', strtotime($bl->mbl_date)) }}
                    </td>
                    <td>
                        {{-- <input name="m_destuffing_date[]" class="form-control m_destuffing_date" type="text" readonly /> --}}
                    </td>
                    <td>
                        {{-- <input name="m_total[]" class="form-control m_total" type="text" readonly /> --}}
                        {{ $value->job->bl->whereNull('mbl')->count() }}
                    </td>
                    <td>
                        {{-- <input name="m_volume[]" class="form-control m_volume" type="text" readonly /> --}}
                        {{ $value->job->volume }}
                    </td>
                    <td>
                        {{-- <input name="m_total_cont[]" class="form-control m_total_cont" type="text" readonly /> --}}
                        {{ $bl->total_container }}
                    </td>
                    <td>
                        {{-- <input name="m_20ft[]" class="form-control m_20ft" type="text" readonly /> --}}
                    </td>
                    <td>
                        {{-- <input name="m_40ft[]" class="form-control m_40ft" type="text" readonly /> --}}
                    </td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
