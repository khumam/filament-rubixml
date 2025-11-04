<?php

namespace App\Filament\Resources\Algorithms;

use App\Filament\Resources\Algorithms\Pages\CreateAlgorithm;
use App\Filament\Resources\Algorithms\Pages\EditAlgorithm;
use App\Filament\Resources\Algorithms\Pages\ListAlgorithms;
use App\Filament\Resources\Algorithms\Pages\ViewAlgorithm;
use App\Filament\Resources\Algorithms\Schemas\AlgorithmForm;
use App\Filament\Resources\Algorithms\Schemas\AlgorithmInfolist;
use App\Filament\Resources\Algorithms\Tables\AlgorithmsTable;
use App\Models\Algorithm;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AlgorithmResource extends Resource
{
    protected static ?string $model = Algorithm::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return AlgorithmForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AlgorithmInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AlgorithmsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAlgorithms::route('/'),
            'create' => CreateAlgorithm::route('/create'),
            'view' => ViewAlgorithm::route('/{record}'),
            'edit' => EditAlgorithm::route('/{record}/edit'),
        ];
    }
}
