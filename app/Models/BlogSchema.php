<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogSchema extends Model
{
    protected $fillable = ['blog_id', 'schema_type', 'schema_markup', 'sort_order'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
