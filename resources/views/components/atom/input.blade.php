@php
    $classes = ['form-control form-control-sm', 'is-invalid' => $errors->has($dotName)];
@endphp

<div {{ $attributes->class('form-floating position-relative') }}>
    <input id="{{ $id }}" type="{{ $type }}"
        @isset($input) {{ $input->attributes->class($classes) }} @else @class($classes) @endisset
        @isset($label) placeholder="{{ $label }}" @endisset
        @if ($name) name="{{ $name }}" @endif
        @if ($value) value="{{ $value }}" @endif>
    @isset($label)
        <label for="{{ $id }}" class="text-secondary">{{ $label }}</label>
    @endisset
    @error($dotName)
        <div class="invalid-tooltip" data-target-id="{{ $id }}">
            {{ $message }}
        </div>
    @enderror
</div>
