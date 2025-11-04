<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Algorithm extends Model
{
    protected $fillable = [
        'name',
        'description',
        'type',
        'parameters',
    ];
    
    protected $casts = [
        'parameters' => 'array',
    ];
}
