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
        'meta_index', 'meta_follow', 'preview_token', 'preview_expires_at', 'allow_backdate',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'preview_expires_at' => 'datetime',
        'allow_backdate' => 'boolean',
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

    public function faqs()
    {
        return $this->hasMany(BlogFaq::class)->orderBy('sort_order');
    }

    /**
     * Generate a preview token for the blog
     */
    public function generatePreviewToken()
    {
        $this->preview_token = bin2hex(random_bytes(32));
        $this->preview_expires_at = null; // No expiration
        $this->save();
        
        return $this->preview_token;
    }

    /**
     * Check if preview token is valid
     */
    public function isPreviewTokenValid($token)
    {
        return $this->preview_token === $token;
    }

    /**
     * Get preview URL
     */
    public function getPreviewUrlAttribute()
    {
        if (!$this->preview_token) {
            return null;
        }
        
        return route('blogs.preview', [
            'slug' => $this->slug,
            'token' => $this->preview_token
        ]);
    }

    /**
     * Clear preview token
     */
    public function clearPreviewToken()
    {
        $this->preview_token = null;
        $this->preview_expires_at = null;
        $this->save();
    }
}
