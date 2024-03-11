<form method="{{ $original }}" {{ $attributes }}>
    @method($method)
    @if ($isCsrf())
        @csrf
    @endif
    {{ $slot }}
</form>
