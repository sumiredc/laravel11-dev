<div {{ $attributes->class('form-floating border rounded') }}>
    <p
        @isset($input) {{ $input->attributes->class('form-control-plaintext') }} @else @class('form-control-plaintext') @endisset>
        {{ $slot }}</p>
    @isset($label)
        <label>{{ $label }}</label>
    @endisset
</div>
