<?php

namespace App\Actions\MachineLearning;

use Lorisleiva\Actions\Concerns\AsAction;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Datasets\Unlabeled;
use Rubix\ML\Extractors\ColumnFilter;
use Rubix\ML\Extractors\CSV;

class ExtractDataset
{
    use AsAction;
    
    public function handle(string $datasetPath, array $exludeColumns = [], bool $isLabeled = true): Labeled|Unlabeled
    {
        $dataset = new CSV($datasetPath, true);
        $filteredDataset = new ColumnFilter($dataset, $exludeColumns);
        
        if ($isLabeled) {
            $labeledDataset = Labeled::fromIterator($filteredDataset);
            $samples = array_map(fn ($row) => array_map('floatval', $row), $labeledDataset->samples());
            $labels = array_map('floatval', $labeledDataset->labels());
            $labeledDataset = new Labeled($samples, $labels);
        } else {
            $unlabeledDataset = Unlabeled::fromIterator($filteredDataset);
            $samples = array_map(fn ($row) => array_map('floatval', $row), $unlabeledDataset->samples());
            $labeledDataset = new Unlabeled($samples);
        }

        return $labeledDataset;
    }
}
