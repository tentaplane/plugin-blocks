@php
    $content = (string) ($props['content'] ?? '');
@endphp

<section class="py-10">
    <div class="mx-auto max-w-5xl px-6">
        <div class="rounded-xl border border-black/10 bg-white p-8">
            @if ($content !== '')
                <div class="prose max-w-none whitespace-pre-wrap">{!! nl2br(e($content)) !!}</div>
            @else
                <div class="text-black/50">No content.</div>
            @endif
        </div>
    </div>
</section>
