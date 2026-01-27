@php
    $quote = (string) ($props['quote'] ?? '');
    $name = (string) ($props['name'] ?? '');
    $role = (string) ($props['role'] ?? '');
    $avatar = (string) ($props['avatar'] ?? '');
@endphp

<section class="py-10">
    <div class="mx-auto max-w-5xl px-6">
        <div class="rounded-xl border border-black/10 bg-white p-8">
            @if ($quote !== '')
                <blockquote class="text-lg whitespace-pre-wrap text-black/80">“{{ $quote }}”</blockquote>
            @endif

            <div class="mt-6 flex items-center gap-4">
                @if ($avatar !== '')
                    <img src="{{ $avatar }}" alt="" class="h-12 w-12 rounded-full border border-black/10" />
                @endif

                <div>
                    @if ($name !== '')
                        <div class="font-semibold">{{ $name }}</div>
                    @endif

                    @if ($role !== '')
                        <div class="text-sm text-black/60">{{ $role }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
