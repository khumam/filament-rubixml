<?php

namespace App\Livewire\Dashboard;

use App\Actions\Dataset\TransformDatasetFromCsv;
use App\Actions\MachineLearning\PredictDataset;
use App\Actions\TrainedModel\GetTrainedModelById;
use App\Actions\TrainedModel\GetTrainedModels;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Storage;

class QuickPredictWidget extends Widget implements HasSchemas
{
    use InteractsWithSchemas;

    public ?array $data = [];
    public $predictedOutcome = null;
    protected int|string|array $columnSpan = "full";
    protected string $view = "livewire.dashboard.quick-predict-widget";

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Schema $schema): Schema
    {
        $trainedModels = GetTrainedModels::run();

        return $schema
            ->components([
                Select::make("trained_model")
                    ->required()
                    ->options($trainedModels->pluck("dataset.name", "id")),
                FileUpload::make("sample")->directory("samples")->required(),
            ])
            ->statePath("data");
    }

    public function create()
    {
        $data = $this->form->getState();
        $trainedModel = GetTrainedModelById::run($data["trained_model"]);
        $filePath = Storage::path($data["sample"]);
        $prediction = PredictDataset::run($trainedModel, $filePath);
        $this->predictedOutcome = $prediction[0];
    }
}
