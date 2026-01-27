<?php

declare(strict_types=1);

namespace TentaPress\Blocks\Registry;

final readonly class BlockDefinition
{
    /**
     * @param  array<int,array{key:string,label:string,type:'text'|'textarea'|'url'|'media'|'media-list'|string,help?:string|null}>  $fields
     * @param  array<string,mixed>  $defaults
     * @param  array<string,mixed>  $example
     */
    public function __construct(
        public string $type,
        public string $name,
        public string $description,
        public int $version,
        public array $fields,
        public array $defaults = [],
        public array $example = [],
        public ?string $view = null, // optional override for view key
    ) {
    }
}
