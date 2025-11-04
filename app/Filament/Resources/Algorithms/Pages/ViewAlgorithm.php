<?php

namespace App\Filament\Resources\Algorithms\Pages;

use App\Filament\Resources\Algorithms\AlgorithmResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAlgorithm extends ViewRecord
{
    protected static string $resource = AlgorithmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
