<tr>
    <input type="hidden" name="detail_id[]" class="detail_id" value="{{ old('detail_id.' . $index, 0) }}">
    <td>
        <i onclick="delDetailRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i>
    </td>
    <td>
        <i onclick="addDetailRow(this)" class="fa fa-print fa-lg text-info"></i>
    </td>
    <td>
        <select name="detail_acc_code[]" class="form-select select2 detail_acc_code">
            <option value=""></option>
            @foreach ($chart_accounts as $chart_account)
                <option value="{{ $chart_account->id }}" @if (old('detail_acc_code.' . $index) == $chart_account->id) selected @endif>
                    {{ $chart_account->acc_code }} -
                    {{ $chart_account->title }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select name="detail_cost_center[]" class="form-select detail_cost_center">
            <option value="Head Office">Head Office</option>
        </select>
    </td>
    <td>
        <select name="detail_dr_cr[]" class="form-select detail_dr_cr">
            <option @if (old('detail_dr_cr.' . $index) == 'D') selected @endif value="D">D</option>
            <option @if (old('detail_dr_cr.' . $index) == 'C') selected @endif value="C">C</option>
        </select>
    </td>
    <td>
        <input name="detail_amount_vc[]" class="form-control detail_amount_vc" type="number"
            onkeyup="detailCalculation(this)" value="{{ old('detail_amount_vc.' . $index) }}" />
    </td>
    <td>
        <input name="detail_amount_lc[]" class="form-control detail_amount_lc" type="number"
            onkeyup="detailCalculation(this)" value="{{ old('detail_amount_lc.' . $index) }}" />
    </td>
    <td>
        <input name="detail_narration[]" class="form-control detail_narration" type="text"
            value="{{ old('detail_narration.' . $index) }}" />
    </td>
    <td>
        <select name="detail_tax_type[]" class="form-select detail_tax_type">
            <option @if (old('detail_tax_type.' . $index) == 'na') selected @endif value="na">N/A</option>
            <option @if (old('detail_tax_type.' . $index) == 'stax') selected @endif value="stax">STAX</option>
            <option @if (old('detail_tax_type.' . $index) == 'vat') selected @endif value="vat">VAT</option>
            <option @if (old('detail_tax_type.' . $index) == 'astx') selected @endif value="astx">ASTX</option>
        </select>
    </td>
</tr>
