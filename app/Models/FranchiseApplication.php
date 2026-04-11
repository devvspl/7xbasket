<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FranchiseApplication extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'city',
        'investment_budget', 'message', 'ip_address', 'status',
        'pincode', 'store_area', 'property_type', 'opening_timeline',
        'source', 'is_spam', 'submission_count',
    ];

    protected $casts = [
        'is_spam' => 'boolean',
    ];
}
