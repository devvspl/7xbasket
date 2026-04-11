<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockedIp extends Model
{
    protected $fillable = ['ip_address', 'reason', 'is_active', 'expires_at'];

    protected $casts = [
        'is_active'  => 'boolean',
        'expires_at' => 'datetime',
    ];


    public static function isBlocked(string $ip): bool
    {
        return static::where('ip_address', $ip)
            ->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('expires_at')
                  ->orWhere('expires_at', '>', now());
            })
            ->exists();
    }
}
