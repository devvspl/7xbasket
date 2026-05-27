<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value'];

    /**
     * Get a setting value by key
     */
    public static function get(string $key, $default = null)
    {
        $settings = Cache::remember('site_settings', 60, function () {
            return static::pluck('value', 'key')->toArray();
        });

        return $settings[$key] ?? $default;
    }

    /**
     * Set a setting value
     */
    public static function set(string $key, $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
        Cache::forget('site_settings');
    }

    /**
     * Get multiple settings
     */
    public static function getMany(array $keys): array
    {
        $settings = Cache::remember('site_settings', 60, function () {
            return static::pluck('value', 'key')->toArray();
        });

        return array_intersect_key($settings, array_flip($keys));
    }
}
