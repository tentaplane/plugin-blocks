@php
    $rawImages = $props['images'] ?? [];
    if (is_string($rawImages)) {
        $images = preg_split('/[\n,]+/', $rawImages) ?: [];
    } elseif (is_array($rawImages)) {
        $images = $rawImages;
    } else {
        $images = [];
    }

    $images = array_values(array_filter(array_map(static fn ($v) => trim((string) $v), $images)));

    $columnsRaw = $props['columns'] ?? '3';
    $columns = (int) $columnsRaw;
    if ($columns < 2 || $columns > 5) {
        $columns = 3;
    }

    $gridClass = match ($columns) {
        2 => 'grid-cols-2 md:grid-cols-2',
        3 => 'grid-cols-2 md:grid-cols-3',
        4 => 'grid-cols-2 md:grid-cols-4',
        5 => 'grid-cols-2 md:grid-cols-5',
        default => 'grid-cols-2 md:grid-cols-3',
    };
@endphp

@if ($images !== [])
    <section class="py-10">
        <div class="mx-auto max-w-6xl px-6">
            <div class="grid gap-4 {{ $gridClass }}">
                @foreach ($images as $url)
                    @php
                        $path = parse_url($url, PHP_URL_PATH);
                        $filename = is_string($path) ? pathinfo($path, PATHINFO_FILENAME) : '';
                        $alt = $filename !== '' ? str_replace(['-', '_'], ' ', $filename) : '';
                    @endphp
                    <figure class="overflow-hidden rounded-lg border border-black/10 bg-white">
                        <div class="aspect-4/3 overflow-hidden bg-slate-50">
                            <img src="{{ $url }}" alt="{{ $alt }}" class="h-full w-full object-cover" loading="lazy" />
                        </div>
                    </figure>
                @endforeach
            </div>
        </div>
    </section>
@endif
