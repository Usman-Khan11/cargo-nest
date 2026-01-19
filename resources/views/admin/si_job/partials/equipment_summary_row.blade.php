<tr>
    <td>
        <button type="button" class="btn btn-danger btn-sm">
            <i class="fa fa-times"></i>
        </button>
    </td>
    <td>
        <x-select name="equipment_summary.{{ $index }}.size_type_id"
            realName="equipment_summary[{{ $index }}][size_type_id]" :options="[]" />
    </td>
    <td>
        <x-input name="equipment_summary.{{ $index }}.rate_group"
            realName="equipment_summary[{{ $index }}][rate_group]" value="{{ $data['rate_group'] ?? '' }}" />
    </td>
    <td>
        <x-input type="number" name="equipment_summary.{{ $index }}.qty"
            realName="equipment_summary[{{ $index }}][qty]" value="{{ $data['qty'] ?? '' }}" />
    </td>
    <td>
        <x-input name="equipment_summary.{{ $index }}.code"
            realName="equipment_summary[{{ $index }}][code]" value="{{ $data['code'] ?? '' }}" />
    </td>
    <td>
        <x-input name="equipment_summary.{{ $index }}.name"
            realName="equipment_summary[{{ $index }}][name]" value="{{ $data['name'] ?? '' }}" />
    </td>
    <td>
        <x-select name="equipment_summary.{{ $index }}.dg_type"
            realName="equipment_summary[{{ $index }}][dg_type]" :options="[
                'DG' => 'DG',
                'Non-DG' => 'Non-DG',
                'All' => 'All',
            ]" />
    </td>
    <td>
        <x-input name="equipment_summary.{{ $index }}.gross_wt_cnt"
            realName="equipment_summary[{{ $index }}][gross_wt_cnt]"
            value="{{ $data['gross_wt_cnt'] ?? '' }}" />
    </td>
    <td>
        <x-input name="equipment_summary.{{ $index }}.teu"
            realName="equipment_summary[{{ $index }}][teu]" value="{{ $data['teu'] ?? '' }}" />
    </td>
</tr>
