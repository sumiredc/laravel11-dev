<form {{ $attributes->merge(['method' => $original]) }}>
    @method($method)
    @if ($isCsrf())
        @csrf
    @endif
    {{ $slot }}
</form>
