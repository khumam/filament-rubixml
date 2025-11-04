<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainedModel extends Model
{
    protected $fillable = [
        'dataset_id',
        'model_path',
        'latest_accuracy'
    ];
    
    public function dataset(): BelongsTo
    {
        return $this->belongsTo(Dataset::class);
    }
}
