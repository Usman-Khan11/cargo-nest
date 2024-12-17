@foreach ($charges as $value)
    @php
        $chk = \App\Models\InvoiceDetail::where('invoice_id', $invoice_id)
            ->where('job_id', $job->id)
            ->where('charges_id', $value->id)
            ->count();
    @endphp
    <tr>
        <td>
            <input type="checkbox" name="job_charges_id[]" class="job_charges_ids" value="{{ $value->id }}"
                @if ($chk) checked @endif />
        </td>
        <td>
            {{ $job->job_number }}
        </td>
        <td>
            {{ @$value->charges->code }}
        </td>
        <td>
            {{ @$value->charges->name }}
        </td>
        <td>
            {{ @$value->charges->short_name }}
        </td>
        <td>
            {{ $value->crp_pp_cc }}
        </td>
        <td>
            {{ $value->cr_description }}
        </td>
        <td>
            {{ @$value->size_type->code }}
        </td>
        <td>
            {{ $value->crp_rate_group }}
        </td>
        <td>
            {{ $value->crp_code }}
        </td>
        <td>
            {{ $value->crp_name_1 }}
        </td>
        <td>
            {{ $value->crp_city }}
        </td>
        <td>
            {{ $value->crp_rate }}
        </td>
        <td>
            {{ $value->crp_amount }}
        </td>
        <td>
            {{ $value->crp_discount }}
        </td>
        <td>
            {{ $value->crp_net_amount }}
        </td>
        <td>
            {{ $value->crp_margin }}
        </td>
        <td>
            {{ @$value->currency->code }}
        </td>
        <td>
            {{ $value->crp_ex_rate }}
        </td>
        <td>
            {{ $value->crp_local_amount }}
        </td>
        <td>
            {{ $value->crp_dg_non_dg }}
        </td>
    </tr>
@endforeach
