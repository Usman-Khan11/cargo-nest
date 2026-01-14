@props(['name', 'realName' => null, 'value' => [], 'placeholder' => '', 'options' => [], 'id' => null])

@php
    $isMultiple = $attributes->has('multiple');

    // Normalize value as array for multiple
    $selectedValues = $isMultiple ? (array) old($name, $value) : old($name, $value);
@endphp


<select name="{{ $realName ?? ($isMultiple ? $name . '[]' : $name) }}" id="{{ $id ?? $name }}"
    {{ $attributes->merge(['class' => 'form-select ' . ($errors->has($name) ? 'is-invalid' : '')]) }}>

    @if ($placeholder && !$isMultiple)
        <option value="" {{ empty($selectedValues) ? 'selected' : '' }}>
            {{ $placeholder }}
        </option>
    @endif

    @foreach ($options as $key => $option)
        <option value="{{ $key }}"
            {{ $isMultiple
                ? (in_array($key, $selectedValues)
                    ? 'selected'
                    : '')
                : ($selectedValues == $key
                    ? 'selected'
                    : '') }}>
            {{ $option }}
        </option>
    @endforeach
</select>

{{-- @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
@enderror --}}
