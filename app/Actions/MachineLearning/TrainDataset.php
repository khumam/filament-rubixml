<?php

namespace App\Actions\MachineLearning;

use App\Models\Dataset;
use App\Models\TrainedModel;
use Filament\Notifications\Notification;
use Lorisleiva\Actions\Concerns\AsAction;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Pipeline;

class TrainDataset
{
    use AsAction;
    
    public function handle(Dataset $dataset, Labeled $labeledDataset)
    {
        $selectedAlgorithm = GetSelectedAlgorithm::run($dataset->algorithm);
        $selectedTransformers = GetSelectedTransformers::run($dataset->transformer);

        $estimator = new Pipeline($selectedTransformers, $selectedAlgorithm);
        $estimator->train($labeledDataset);
        
        if (!$estimator->trained()) {
            Notification::make()
                ->title('Model training failed')
                ->danger()
                ->send();
            return;
        }
        
        $filename = "models/" . md5($dataset->name) . ".rbx";
        $savedPath = storage_path("app/private/{$filename}");
        SaveTrainedModel::run($estimator, $savedPath, $filename);
        
        TrainedModel::updateOrCreate([
            'dataset_id' => $dataset->id,
        ], [
            'dataset_id' => $dataset->id,
            'model_path' => $filename,
        ]);
        
        Notification::make()
            ->title('Model trained successfully')
            ->success()
            ->send();
    }
}
