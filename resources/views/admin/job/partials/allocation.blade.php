@foreach ($manifests as $value)
    @php
        $chk = \App\Models\ManifestAllocation::where('manifest_id', $value->id)
            ->where('job_id', $job_id)
            ->count();
    @endphp
    <tr>
        <td>
            <input type="radio" name="manifest_id[]" class="manifest_ids" value="{{ $value->id }}"
                @if ($chk) checked @endif>
        </td>
        <td>
            {{ $value->tran }}
        </td>
        <td>
            {{ @$value->vessels->vessel_name }}
        </td>
        <td>
            {{ @$value->voyages->voy }}
        </td>
        <td>
            {{ @$value->terminals->location_name }}
        </td>
        <td>
            {{ @$value->local_port->location }}
        </td>
    </tr>
@endforeach
