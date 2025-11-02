<?php

namespace App\Actions\MachineLearning;

use Lorisleiva\Actions\Concerns\AsAction;
use Rubix\ML\Persisters\Filesystem;
use Rubix\ML\Serializers\RBX;

class SaveTrainedModel
{
    use AsAction;
    
    public function handle(mixed $estimator, string $path)
    {
        $persister = new Filesystem($path, true);
        $serializer = new RBX(6);
        $encoding = $serializer->serialize($estimator);
        $persister->save($encoding);
    }
}
