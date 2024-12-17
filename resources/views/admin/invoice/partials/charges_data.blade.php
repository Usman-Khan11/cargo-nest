@foreach ($charges as $key => $value)
    <tr>
        <td>
            <i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i>
        </td>
        <td>
            {{ $key + 1 }}
            <input type="hidden" name="charges_ids[]" value="{{ $value->id }}">
        </td>
        <td>
            {{ @$value->charges->code }}
        </td>
        <td>
            {{ @$value->charges->name }}
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
            {{ $value->crp_dg_non_dg }}
        </td>
        <td></td>
        <td>
            {{ $value->crp_city }}
        </td>
        <td>
            {{ $value->crp_rate }}
        </td>
        <td>
            {{ @$value->currency->code }}
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
            {{ $value->crp_tax_apple }}
        </td>
        <td>
            {{ $value->crp_tax_amount_lc }}
        </td>
        <td></td>
        <td>
            {{ $value->crp_ex_rate }}
        </td>
        <td>
            {{ $value->crp_local_amount }}
        </td>
    </tr>
@endforeach
