<?php

namespace App\Actions\MachineLearning;

use App\Models\TrainedModel;
use Lorisleiva\Actions\Concerns\AsAction;
use Rubix\ML\Datasets\Unlabeled;

class PredictDataset
{
    use AsAction;
    
    public function handle(TrainedModel $trainedModel, string $filepath)
    {
        $trainedModel = LoadTrainedModel::run($trainedModel->model_path);
        $sample = ExtractDataset::run(datasetPath: $filepath, exludeColumns: [], isLabeled: false);
        $prediction = $trainedModel->predict($sample);
        
        return $prediction;
    }
}
