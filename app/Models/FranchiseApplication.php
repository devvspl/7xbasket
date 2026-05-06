<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FranchiseApplication extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'city',
        'investment_budget', 'message', 'ip_address', 'status',
        'pincode', 'store_area', 'property_type', 'opening_timeline',
        'source', 'action_type', 'is_spam', 'submission_count',
        'device_type', 'user_agent', 'page_url', 'referer_url',
    ];

    protected $casts = [
        'is_spam' => 'boolean',
    ];
}
