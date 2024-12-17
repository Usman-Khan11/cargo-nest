@foreach ($charges as $key => $value)
    <tr>
        <td>
            <i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i>
        </td>
        <td>
            {{ $key + 1 }}
            <input type="hidden" name="charges_ids[]" value="{{ $value->id }}">
        </td>
        <td class="charges_code">
            {{ @$value->charges->code }}
        </td>
        <td class="charges_name">
            {{ @$value->charges->name }}
        </td>
        <td class="charges_description">
            {{ $value->cr_description }}
        </td>
        <td class="size_type">
            {{ @$value->size_type->code }}
        </td>
        <td class="rate_group">
            {{ $value->crp_rate_group }}
        </td>
        <td class="dg_nondg">
            {{ $value->crp_dg_non_dg }}
        </td>
        <td class="container">

        </td>
        <td class="qty">
            {{ $value->crp_city }}
        </td>
        <td class="rate">
            {{ $value->crp_rate }}
        </td>
        <td class="currency">
            {{ @$value->currency->code }}
        </td>
        <td class="amount">
            {{ $value->crp_amount }}
        </td>
        <td class="discount">
            {{ $value->crp_discount }}
        </td>
        <td class="net_amount">
            {{ $value->crp_net_amount }}
        </td>
        <td class="margin">
            {{ $value->crp_margin }}
        </td>
        <td class="tax">
            {{ $value->crp_tax_apple }}
        </td>
        <td class="tax_amount">
            {{ $value->crp_tax_amount_lc }}
        </td>
        <td class="inc_tax"></td>
        <td class="ex_rate">
            {{ $value->crp_ex_rate }}
        </td>
        <td class="local_amount">
            {{ $value->crp_local_amount }}
        </td>
    </tr>
@endforeach
