<tr>
    <input type="hidden" name="detail_id[]" class="detail_id" value="{{ old('detail_id.' . $index, 0) }}">
    <td>
        <i onclick="delRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i>
    </td>
    <td>
        <i onclick="addNewRow(this)" class="fa fa-print fa-lg text-info"></i>
    </td>
    <td>
        <select name="detail_acc_code[]" class="form-select select2 detail_acc_code">
            <option value=""></option>
            @foreach ($chart_accounts as $chart_account)
                <option value="{{ $chart_account->id }}" @if (old('detail_cost_center.' . $index) == $chart_account->id) selected @endif>
                    {{ $chart_account->acc_code }} -
                    {{ $chart_account->title }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <input name="detail_cost_center[]" class="form-control detail_cost_center" type="text"
            value="{{ old('detail_cost_center.' . $index) }}" />
    </td>
    <td>
        <input name="detail_debit_vc[]" class="form-control detail_debit_vc" type="text"
            onkeyup="detail_calculation(this)" value="{{ old('detail_debit_vc.' . $index) }}" />
    </td>
    <td>
        <input name="detail_credit_vc[]" class="form-control detail_credit_vc" type="text"
            onkeyup="detail_calculation(this)" value="{{ old('detail_credit_vc.' . $index) }}" />
    </td>
    <td>
        <input name="detail_debit_lc[]" class="form-control detail_debit_lc" type="text"
            value="{{ old('detail_debit_lc.' . $index) }}" />
    </td>
    <td>
        <input name="detail_credit_lc[]" class="form-control detail_credit_lc" type="text"
            value="{{ old('detail_credit_lc.' . $index) }}" />
    </td>
    <td>
        <input name="detail_narration[]" class="form-control detail_narration" type="text"
            value="{{ old('detail_narration.' . $index) }}" />
    </td>
</tr>
