<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FranchiseApplication extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'city',
        'investment_budget', 'message', 'ip_address', 'status',
    ];
}
