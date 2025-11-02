<?php

namespace App\Actions\TrainedModel;

use App\Models\TrainedModel;
use Lorisleiva\Actions\Concerns\AsAction;

class GetTrainedModels
{
    use AsAction;
    
    public function handle()
    {
        return TrainedModel::latest()->get();
    }
}
