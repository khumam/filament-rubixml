<?php

namespace App\Filament\Resources\Algorithms\Pages;

use App\Filament\Resources\Algorithms\AlgorithmResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAlgorithms extends ListRecords
{
    protected static string $resource = AlgorithmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
