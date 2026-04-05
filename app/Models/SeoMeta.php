<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model
{
    protected $fillable = [
        'page_key', 'title', 'description', 'keywords',
        'og_title', 'og_description', 'og_image', 'schema_markup',
    ];

    public static function forPage(string $key): ?self
    {
        return static::where('page_key', $key)->first();
    }
}
