@php
    $image = trim((string) ($props['image'] ?? ''));
    $alt = trim((string) ($props['alt'] ?? ''));
    $caption = trim((string) ($props['caption'] ?? ''));
    $linkUrl = trim((string) ($props['link_url'] ?? ''));
@endphp

@if ($image !== '')
    <section class="py-10">
        <div class="mx-auto max-w-5xl px-6">
            <figure class="overflow-hidden rounded-xl border border-black/10 bg-white">
                @if ($linkUrl !== '')
                    <a href="{{ $linkUrl }}" class="block">
                        <img src="{{ $image }}" alt="{{ $alt }}" class="h-auto w-full" loading="lazy" />
                    </a>
                @else
                    <img src="{{ $image }}" alt="{{ $alt }}" class="h-auto w-full" loading="lazy" />
                @endif

                @if ($caption !== '')
                    <figcaption class="border-t border-black/10 px-4 py-3 text-sm text-black/70">
                        {{ $caption }}
                    </figcaption>
                @endif
            </figure>
        </div>
    </section>
@endif
