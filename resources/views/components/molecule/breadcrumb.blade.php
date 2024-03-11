<nav {{ $attributes->merge(['aria-label' => 'breadcrumb']) }}>
    <ol class="breadcrumb">
        @foreach ($items as $item)
            <x-atom.breadcrumb-item :current="$loop->last" :href="$item['href'] ?? ''">
                {{ $item['label'] }}</x-atom.breadcrumb-item>
        @endforeach
    </ol>
</nav>
