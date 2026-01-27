@php
    $title = (string) ($props['title'] ?? '');
    $body = (string) ($props['body'] ?? '');
    $btn = is_array($props['button'] ?? null) ? $props['button'] : [];
    $btnLabel = (string) ($btn['label'] ?? '');
    $btnUrl = (string) ($btn['url'] ?? '');
@endphp

<section class="py-10">
    <div class="mx-auto max-w-5xl px-6">
        <div class="rounded-xl border border-black/10 bg-white p-8">
            @if ($title !== '')
                <h2 class="text-2xl font-semibold">{{ $title }}</h2>
            @endif

            @if ($body !== '')
                <p class="mt-3 whitespace-pre-wrap text-black/70">{{ $body }}</p>
            @endif

            @if ($btnLabel !== '' && $btnUrl !== '')
                <div class="mt-6">
                    <a
                        href="{{ $btnUrl }}"
                        class="inline-flex items-center rounded border border-black/10 px-4 py-2 font-semibold">
                        {{ $btnLabel }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>
