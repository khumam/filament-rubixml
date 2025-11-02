<?php

namespace App\Actions\MachineLearning;

use Illuminate\Support\Facades\Storage;
use Lorisleiva\Actions\Concerns\AsAction;
use Rubix\ML\Persisters\Filesystem;
use Rubix\ML\Serializers\RBX;

class LoadTrainedModel
{
    use AsAction;
    
    public function handle(string $modelPath)
    {
        $persister = new Filesystem(Storage::path($modelPath));
        $persister = $persister->load();
        $serializer = new RBX(6);
        $model = $serializer->deserialize($persister);
        
        return $model;
    }
}
