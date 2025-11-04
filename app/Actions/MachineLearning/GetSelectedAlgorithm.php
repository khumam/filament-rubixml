<?php

namespace App\Actions\MachineLearning;

use App\Enums\Algorithm;
use App\Models\Algorithm as ModelsAlgorithm;
use Lorisleiva\Actions\Concerns\AsAction;
use Rubix\ML\Classifiers\ClassificationTree;
use Rubix\ML\Classifiers\KNearestNeighbors;
use Rubix\ML\Classifiers\RandomForest;
use Rubix\ML\Regressors\GradientBoost;

class GetSelectedAlgorithm
{
    use AsAction;
    
    public function handle(int $algorithmId): mixed
    {
        $algorithm = ModelsAlgorithm::find($algorithmId);
        $selectedAlgorithm = match ($algorithm->name) {
            Algorithm::KNN => new KNearestNeighbors(),
            Algorithm::ClasificationTree => new ClassificationTree(),
            Algorithm::RandomForest => new RandomForest(),
            Algorithm::GradientBoost->value => new GradientBoost(),
        };

        return $selectedAlgorithm;
    }
}
