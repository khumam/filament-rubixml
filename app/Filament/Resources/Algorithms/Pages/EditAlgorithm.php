<?php

namespace App\Filament\Resources\Algorithms\Pages;

use App\Filament\Resources\Algorithms\AlgorithmResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditAlgorithm extends EditRecord
{
    protected static string $resource = AlgorithmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
