@php
    $classes = ['form-control form-control-sm', 'is-invalid' => $errors->has($dotName)];
@endphp

<div {{ $attributes->class(['form-floating']) }}>
    <select id="{{ $id }}"
        @isset($select) {{ $select->attributes->class($classes) }} @else @class($classes) @endisset
        @if ($name) name="{{ $name }}" @endif>
        @empty($items)
            {{ $slot }}
        @else
            @if ($unselected)
                <option value=""></option>
            @endif
            @foreach ($items as $item)
                <option value="{{ $item['value'] }}" @selected($value === strval($item['value'])) @disabled($item['disabled'] ?? false)>
                    {{ __($item['label']) }}</option>
            @endforeach
        @endempty
    </select>
    @isset($label)
        <label for="{{ $id }}" class="text-secondary">{{ $label }}</label>
    @endisset
    @error($dotName)
        <div class="invalid-tooltip" data-target-id="{{ $id }}">
            {{ $message }}
        </div>
    @enderror
</div>
