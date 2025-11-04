<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dataset extends Model
{
    protected $fillable = [
        'name',
        'file_path',
        'label_column',
        'exclude_column',
        'type',
        'algorithm_id',
        'transformer'
    ];
    
    protected $casts = [
        'exclude_column' => 'array',
        'transformer' => 'array'
    ];
    
    public function trainedModel(): HasOne
    {
        return $this->hasOne(TrainedModel::class);
    }
    
    public function algorithm(): BelongsTo
    {
        return $this->belongsTo(Algorithm::class);
    }
}
