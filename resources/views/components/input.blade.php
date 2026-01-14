@props(['name', 'realName' => null, 'type' => 'text', 'value' => '', 'id' => null, 'is_textarea' => false])

@if ($is_textarea)
    <textarea name="{{ $realName ?? $name }}" id="{{ $id ?? $name }}"
        {{ $attributes->merge(['class' => 'form-control ' . ($errors->has($name) ? 'is-invalid' : '')]) }}>{{ old($name, $value) }}</textarea>
@else
    <input type="{{ $type }}" name="{{ $realName ?? $name }}" value="{{ old($name, $value) }}"
        id="{{ $id ?? $name }}"
        {{ $attributes->merge(['class' => 'form-control ' . ($errors->has($name) ? 'is-invalid' : '')]) }} />
@endif



{{-- @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
@enderror --}}
