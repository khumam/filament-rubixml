<?php

namespace App\Filament\Resources\Datasets\Schemas;

use App\Enums\AlgorithmType;
use App\Enums\Transformer;
use App\Models\Algorithm;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Collection;

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
                    Select::make("type")
                        ->placeholder("Dataset Type")
                        ->required()
                        ->options(AlgorithmType::class)
                        ->live()
                        ->afterStateUpdated(
                            fn(Set $set) => $set("algorithm", null),
                        ),
                    Select::make("algorithm_id")
                        ->placeholder("Algorithm")
                        ->required()
                        ->options(
                            fn(Get $get): Collection => Algorithm::query()
                                ->where("type", $get("type"))
                                ->pluck("name", "id"),
                        ),
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
