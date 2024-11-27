@foreach ($voyage_local as $value)
    <tr>
        <td>
            <input type="radio" name="chk" id="">
        </td>
        <td></td>
        <td>
            {{ $vessel->vessel_name }}
        </td>
        <td>
            {{ $voyage->voy }}
        </td>
        <td></td>
        <td>
            {{ @$value->local_ports->location }}
        </td>
    </tr>
@endforeach
