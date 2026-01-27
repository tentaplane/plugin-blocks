<?php

declare(strict_types=1);

namespace TentaPress\Blocks\FirstParty;

use TentaPress\Blocks\Registry\BlockDefinition;
use TentaPress\Blocks\Registry\BlockRegistry;

final class BasicKit
{
    public function register(BlockRegistry $registry): void
    {
        $registry->register(
            new BlockDefinition(
                type: 'blocks/hero',
                name: 'Hero',
                description: 'A hero section with headline and primary CTA.',
                version: 1,
                fields: [
                    ['key' => 'headline', 'label' => 'Headline', 'type' => 'text'],
                    ['key' => 'subheadline', 'label' => 'Subheadline', 'type' => 'text'],
                    ['key' => 'background_image', 'label' => 'Background Image', 'type' => 'media'],
                    ['key' => 'primary_cta.label', 'label' => 'Primary CTA Label', 'type' => 'text'],
                    ['key' => 'primary_cta.url', 'label' => 'Primary CTA URL', 'type' => 'text'],
                ],
                defaults: [
                    'headline' => 'Your headline',
                    'subheadline' => '',
                    'background_image' => '',
                    'primary_cta' => ['label' => 'Get started', 'url' => '#'],
                ],
                example: [
                    'props' => [
                        'headline' => 'Build pages faster',
                        'subheadline' => 'A simple block editor powered by Laravel.',
                        'background_image' => '',
                        'primary_cta' => ['label' => 'Get started', 'url' => '#'],
                    ],
                ],
                view: 'blocks.hero'
            )
        );

        $registry->register(
            new BlockDefinition(
                type: 'blocks/cta',
                name: 'Call to Action',
                description: 'A callout section with title, body and button.',
                version: 1,
                fields: [
                    ['key' => 'title', 'label' => 'Title', 'type' => 'text'],
                    ['key' => 'body', 'label' => 'Body', 'type' => 'textarea'],
                    ['key' => 'button.label', 'label' => 'Button Label', 'type' => 'text'],
                    ['key' => 'button.url', 'label' => 'Button URL', 'type' => 'text'],
                ],
                defaults: [
                    'title' => 'Ready to go?',
                    'body' => '',
                    'button' => ['label' => 'Contact us', 'url' => '#'],
                ],
                example: [
                    'props' => [
                        'title' => 'Ready to go?',
                        'body' => 'Add a CTA to drive action.',
                        'button' => ['label' => 'Contact us', 'url' => '#'],
                    ],
                ],
                view: 'blocks.cta'
            )
        );

        $registry->register(
            new BlockDefinition(
                type: 'blocks/testimonial',
                name: 'Testimonial',
                description: 'A quote with name and optional avatar.',
                version: 1,
                fields: [
                    ['key' => 'quote', 'label' => 'Quote', 'type' => 'textarea'],
                    ['key' => 'name', 'label' => 'Name', 'type' => 'text'],
                    ['key' => 'role', 'label' => 'Role', 'type' => 'text'],
                    ['key' => 'avatar', 'label' => 'Avatar', 'type' => 'media'],
                ],
                defaults: [
                    'quote' => '',
                    'name' => '',
                    'role' => '',
                    'avatar' => '',
                ],
                example: [
                    'props' => [
                        'quote' => 'This is the fastest way we’ve shipped landing pages.',
                        'name' => 'Alex Smith',
                        'role' => 'Founder',
                        'avatar' => '',
                    ],
                ],
                view: 'blocks.testimonial'
            )
        );

        $registry->register(
            new BlockDefinition(
                type: 'blocks/content',
                name: 'Content',
                description: 'A basic content area.',
                version: 1,
                fields: [
                    ['key' => 'content', 'label' => 'Content', 'type' => 'textarea'],
                ],
                defaults: [
                    'content' => '',
                ],
                example: [
                    'props' => [
                        'content' => "Write your content here.\n\nYou can later upgrade this to a rich editor.",
                    ],
                ],
                view: 'blocks.content'
            )
        );

        $registry->register(
            new BlockDefinition(
                type: 'blocks/image',
                name: 'Image',
                description: 'A single image with optional caption and link.',
                version: 1,
                fields: [
                    ['key' => 'image', 'label' => 'Image', 'type' => 'media'],
                    ['key' => 'alt', 'label' => 'Alt text', 'type' => 'text'],
                    ['key' => 'caption', 'label' => 'Caption', 'type' => 'textarea'],
                    ['key' => 'link_url', 'label' => 'Link URL', 'type' => 'url'],
                ],
                defaults: [
                    'image' => '',
                    'alt' => '',
                    'caption' => '',
                    'link_url' => '',
                ],
                example: [
                    'props' => [
                        'image' => '',
                        'alt' => '',
                        'caption' => '',
                        'link_url' => '',
                    ],
                ],
                view: 'blocks.image'
            )
        );

        $registry->register(
            new BlockDefinition(
                type: 'blocks/gallery',
                name: 'Gallery',
                description: 'A responsive gallery of images.',
                version: 1,
                fields: [
                    ['key' => 'images', 'label' => 'Images', 'type' => 'media-list'],
                    ['key' => 'columns', 'label' => 'Columns (2-5)', 'type' => 'text'],
                ],
                defaults: [
                    'images' => [],
                    'columns' => '3',
                ],
                example: [
                    'props' => [
                        'images' => [],
                        'columns' => '3',
                    ],
                ],
                view: 'blocks.gallery'
            )
        );
    }
}
