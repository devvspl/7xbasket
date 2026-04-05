<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockedIp extends Model
{
    protected $fillable = ['ip_address', 'reason', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public static function isBlocked(string $ip): bool
    {
        return static::where('ip_address', $ip)->where('is_active', true)->exists();
    }
}
