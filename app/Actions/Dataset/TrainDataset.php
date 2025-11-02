<?php

namespace App\Actions\Dataset;

use App\Actions\MachineLearning\ExtractDataset;
use App\Actions\MachineLearning\TrainDataset as MachineLearningTrainDataset;
use App\Models\Dataset;
use Illuminate\Support\Facades\Storage;
use Lorisleiva\Actions\Concerns\AsAction;

class TrainDataset
{
    use AsAction;
    
    public function handle(Dataset $dataset)
    {
        $datasetPath = Storage::disk("local")->path($dataset->file_path);
        $excludeColumns = $dataset->exclude_column;
        $extractedDataset = ExtractDataset::run($datasetPath, $excludeColumns);

        MachineLearningTrainDataset::run($dataset, $extractedDataset);
    }
}
