<li {{ $attributes->class(['breadcrumb-item', 'active'])->merge($current ? ['aria-current' => 'page'] : []) }}
    aria-current="page">
    @if ($href)
        <a href="{{ $href }}">{{ $slot }}</a>
    @else
        {{ $slot }}
    @endif
</li>
