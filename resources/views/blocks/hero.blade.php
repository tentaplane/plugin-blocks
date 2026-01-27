@php
    $headline = (string) ($props['headline'] ?? '');
    $sub = (string) ($props['subheadline'] ?? '');
    $bg = (string) ($props['background_image'] ?? '');
    $cta = is_array($props['primary_cta'] ?? null) ? $props['primary_cta'] : [];
    $ctaLabel = (string) ($cta['label'] ?? '');
    $ctaUrl = (string) ($cta['url'] ?? '');
@endphp

<section class="py-16">
    <div class="mx-auto max-w-5xl px-6">
        <div class="rounded-xl border border-black/10 bg-white p-8">
            @if ($bg !== '')
                <div class="mb-6 overflow-hidden rounded-lg border border-black/10">
                    <img src="{{ $bg }}" alt="" class="h-auto w-full" />
                </div>
            @endif

            @if ($headline !== '')
                <h1 class="text-3xl font-semibold">{{ $headline }}</h1>
            @endif

            @if ($sub !== '')
                <p class="mt-3 text-black/70">{{ $sub }}</p>
            @endif

            @if ($ctaLabel !== '' && $ctaUrl !== '')
                <div class="mt-6">
                    <a
                        href="{{ $ctaUrl }}"
                        class="inline-flex items-center rounded border border-black/10 px-4 py-2 font-semibold">
                        {{ $ctaLabel }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>
