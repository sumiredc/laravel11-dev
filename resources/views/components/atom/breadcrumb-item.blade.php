<li {{ $attributes->class(['breadcrumb-item', 'active' => $current])->merge($current ? ['aria-current' => 'page'] : []) }}
    aria-current="page">
    @if ($href)
        <a href="{{ $href }}" class="text-white">{{ $slot }}</a>
    @else
        {{ $slot }}
    @endif
</li>
