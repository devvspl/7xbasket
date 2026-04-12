<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'featured_image', 'featured_image_alt',
        'category', 'tags', 'author', 'is_published', 'published_at',
        'meta_title', 'meta_description', 'meta_keywords', 'og_image',
        'meta_index', 'meta_follow',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function getTagsArrayAttribute(): array
    {
        return $this->tags ? array_map('trim', explode(',', $this->tags)) : [];
    }

    public function schemas()
    {
        return $this->hasMany(BlogSchema::class)->orderBy('sort_order');
    }
}
