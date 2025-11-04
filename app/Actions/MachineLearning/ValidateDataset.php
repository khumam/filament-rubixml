<?php

namespace App\Actions\MachineLearning;

use Lorisleiva\Actions\Concerns\AsAction;
use Rubix\ML\CrossValidation\HoldOut;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Datasets\Unlabeled;

class ValidateDataset
{
    use AsAction;
    
    public function handle(mixed $estimator, Labeled|Unlabeled $dataset, mixed $metrics)
    {
        $validator = new HoldOut(0.2);
        $score = $validator->test($estimator, $dataset, $metrics);

        return $score;
    }
}
