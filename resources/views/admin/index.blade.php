@extends('tentapress-admin::layouts.shell')

@section('title', 'Blocks')

@section('content')
    <div class="tp-page-header">
        <div>
            <h1 class="tp-page-title">Blocks</h1>
            <p class="tp-description">Available blocks and example JSON payloads.</p>
        </div>
    </div>

    <div class="tp-metabox">
        <div class="tp-metabox__title">
            Registered blocks
            <span class="tp-muted font-normal">({{ count($definitions) }})</span>
        </div>

        @if (count($definitions) === 0)
            <div class="tp-metabox__body tp-muted text-sm">No blocks registered.</div>
        @else
            <div class="tp-metabox__body space-y-5">
                @foreach ($definitions as $def)
                    <div class="tp-panel">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <div class="font-semibold">{{ $def->name }}</div>
                                <div class="tp-muted mt-1 text-sm">{{ $def->description }}</div>
                                <div class="tp-code mt-2">{{ $def->type }}</div>
                            </div>
                        </div>

                        <div class="tp-divider"></div>

                        <div class="tp-muted text-xs font-semibold uppercase">Example</div>
                        <pre class="tp-pre mt-2">
{{ json_encode($def->example, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre
                        >
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
