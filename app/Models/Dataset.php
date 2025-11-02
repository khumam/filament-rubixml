<?php

namespace App\Models;

use App\Enums\Algorithm;
use App\Enums\Transformer;
use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    protected $fillable = [
        'name',
        'file_path',
        'label_column',
        'exclude_column',
        'algorithm',
        'transformer'
    ];
    
    protected $casts = [
        'algorithm' => Algorithm::class,
        'exclude_column' => 'array',
        'transformer' => 'array'
    ];
}
