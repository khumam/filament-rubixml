<?php

namespace App\Actions\TrainedModel;

use App\Models\TrainedModel;
use Lorisleiva\Actions\Concerns\AsAction;

class GetTrainedModelById
{
    use AsAction;
    
    public function handle(int $id): ?TrainedModel
    {
        return TrainedModel::find($id);
    }
}
