@if ($isLink())
    <a href="{{ $href }}" {{ $attributes->class(['btn']) }}>{!! $iconEl !!}<span
            @class(['ms-2' => !!$iconEl])>{{ $slot }}</span></a>
@else
    <button type="{{ $type }}" {{ $attributes->class(['btn']) }}>{!! $iconEl !!}<span
            @class(['ms-2' => !!$iconEl])>{{ $slot }}</span></button>
@endif
