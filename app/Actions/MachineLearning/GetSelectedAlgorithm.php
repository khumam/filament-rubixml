<?php

namespace App\Actions\MachineLearning;

use App\Enums\Algorithm;
use Lorisleiva\Actions\Concerns\AsAction;
use Rubix\ML\Classifiers\ClassificationTree;
use Rubix\ML\Classifiers\KNearestNeighbors;
use Rubix\ML\Classifiers\RandomForest;
use Rubix\ML\Regressors\GradientBoost;

class GetSelectedAlgorithm
{
    use AsAction;
    
    public function handle(Algorithm $algorithm): mixed
    {
        $selectedAlgorithm = match ($algorithm) {
            Algorithm::KNN => new KNearestNeighbors(),
            Algorithm::ClasificationTree => new ClassificationTree(),
            Algorithm::RandomForest => new RandomForest(),
            Algorithm::GradientBoost => new GradientBoost(),
        };

        return $selectedAlgorithm;
    }
}
