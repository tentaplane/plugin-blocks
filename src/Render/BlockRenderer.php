<?php

declare(strict_types=1);

namespace TentaPress\Blocks\Render;

use Illuminate\Contracts\View\Factory as ViewFactory;
use TentaPress\Blocks\Registry\BlockRegistry;
use TentaPress\System\Theme\ThemeManager;

final readonly class BlockRenderer
{
    public function __construct(
        private ViewFactory $views,
        private BlockRegistry $registry,
        private ThemeManager $themes,
    ) {
    }

    /**
     * @param  array{type?:mixed,version?:mixed,props?:mixed}  $block
     */
    public function render(array $block): string
    {
        $type = isset($block['type']) ? (string) $block['type'] : '';
        $props = isset($block['props']) && is_array($block['props']) ? $block['props'] : [];

        if ($type === '') {
            return '';
        }

        $def = $this->registry->get($type);

        // Determine view key (dot notation)
        $viewKey = $def?->view;
        if (! $viewKey) {
            // Default: blocks/<name> => blocks.name
            $viewKey = 'blocks.'.$this->typeSlug($type);
        }

        // Theme override first
        if ($this->themes->hasActiveTheme() && $this->views->exists('tp-theme::'.$viewKey)) {
            return $this->views->make('tp-theme::'.$viewKey, [
                'block' => $block,
                'props' => $props,
                'type' => $type,
            ])->render();
        }

        // Plugin fallback
        if ($this->views->exists('tentapress-blocks::'.$viewKey)) {
            return $this->views->make('tentapress-blocks::'.$viewKey, [
                'block' => $block,
                'props' => $props,
                'type' => $type,
            ])->render();
        }

        // No view found
        return '';
    }

    private function typeSlug(string $type): string
    {
        // blocks/hero => hero, vendor/block => block
        $parts = explode('/', str_replace('\\', '/', $type));

        return (string) end($parts);
    }
}
