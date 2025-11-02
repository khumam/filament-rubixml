<?php

namespace App\Actions\MachineLearning;

use App\Enums\Transformer;
use Lorisleiva\Actions\Concerns\AsAction;
use Rubix\ML\Transformers\L1Normalizer;
use Rubix\ML\Transformers\L2Normalizer;
use Rubix\ML\Transformers\MaxAbsoluteScaler;
use Rubix\ML\Transformers\MinMaxNormalizer;
use Rubix\ML\Transformers\RobustStandardizer;
use Rubix\ML\Transformers\ZScaleStandardizer;

class GetSelectedTransformers
{
    use AsAction;
    
    public function handle(array $transformers): array
    {
        $selectedTransformers = [];
        foreach ($transformers as $transformer) {
            $selectedTransformers[] = match ($transformer['transformer_name']) {
                Transformer::L1Normalizer->value => new L1Normalizer(),
                Transformer::L2Normalizer->value => new L2Normalizer(),
                Transformer::MaxAbsoluteScaler->value => new MaxAbsoluteScaler(),
                Transformer::MinMaxNormalizer->value => new MinMaxNormalizer(),
                Transformer::RobustStandardizer->value => new RobustStandardizer(),
                Transformer::ZScaleStandardizer->value => new ZScaleStandardizer(),
            };
        }

        return $selectedTransformers;
    }
}
