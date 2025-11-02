<?php

namespace App\Filament\Resources\Datasets\Schemas;

use App\Enums\Algorithm;
use App\Enums\Transformer;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DatasetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make("Dataset Details")
                ->description("Enter the details of the dataset.")
                ->schema([
                    TextInput::make("name")
                        ->placeholder("Dataset Name")
                        ->required(),
                    FileUpload::make("file_path")
                        ->placeholder("Dataset File")
                        ->directory("datasets")
                        ->visibility("private")
                        ->required(),
                    TextInput::make("label_column")
                        ->placeholder("Label Column (Supervised Learning)")
                        ->required(),
                    TagsInput::make("exclude_column")
                        ->placeholder("Exclude Column")
                        ->required(),
                    Select::make("algorithm")
                        ->placeholder("Algorithm")
                        ->required()
                        ->options(Algorithm::class),
                    Repeater::make("transformer")->schema([
                        Select::make("transformer_name")
                            ->placeholder("Transformer")
                            ->required()
                            ->options(Transformer::class),
                    ]),
                ]),
        ]);
    }
}
