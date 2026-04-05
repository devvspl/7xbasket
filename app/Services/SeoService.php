<?php

namespace App\Services;

use App\Models\SeoMeta;

class SeoService
{
    public static function get(string $pageKey, array $defaults = []): array
    {
        $meta = SeoMeta::forPage($pageKey);

        return [
            'title'           => $meta?->title ?? $defaults['title'] ?? '7x Basket - Grocery Franchise',
            'description'     => $meta?->description ?? $defaults['description'] ?? 'Join 7x Basket grocery franchise and build a profitable business.',
            'keywords'        => $meta?->keywords ?? $defaults['keywords'] ?? 'grocery franchise, 7x basket, franchise business',
            'og_title'        => $meta?->og_title ?? $meta?->title ?? $defaults['title'] ?? '7x Basket',
            'og_description'  => $meta?->og_description ?? $meta?->description ?? $defaults['description'] ?? '',
            'og_image'        => $meta?->og_image ?? asset('images/og-default.jpg'),
            'schema_markup'   => $meta?->schema_markup ?? null,
        ];
    }
}
