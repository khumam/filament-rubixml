<?php

namespace App\Filament\Resources\Algorithms\Schemas;

use App\Enums\AlgorithmType;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AlgorithmForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make("Algorithm Details")
                ->description("Provide details about the algorithm.")
                ->schema([
                    TextInput::make("name")
                        ->placeholder("Enter algorithm name")
                        ->required(),
                    RichEditor::make("description")
                        ->default(null)
                        ->placeholder("Enter algorithm description")
                        ->columnSpanFull(),
                    Select::make("type")
                        ->placeholder("Select algorithm type")
                        ->options(AlgorithmType::class)
                        ->required(),
                    KeyValue::make("parameters")
                        ->default(null)
                        ->columnSpanFull(),
                ]),
        ]);
    }
}
