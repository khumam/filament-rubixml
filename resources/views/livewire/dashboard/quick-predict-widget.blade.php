<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            Quick Predict
        </x-slot>
        <x-slot name="description">
            Predict the outcome of a new dataset
        </x-slot>
        <form wire:submit="create">
            {{ $this->form }}

            <x-filament::button type="submit" class="mt-4">
                Quick Predict
            </x-filament::button>
        </form>
        <div class="mt-8">
            <div class="flex justify-between items-center">
                <div class="text-sm text-gray-600 dark:text-gray-400">
                    Predicted Outcome:
                </div>
                <div class="text-sm text-gray-600 dark:text-gray-400">
                    {{ $predictedOutcome }}
                </div>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
