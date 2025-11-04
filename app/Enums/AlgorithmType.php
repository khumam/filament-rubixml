<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum AlgorithmType: string implements HasLabel
{
    case classification = "Classification";
    case regression = "Regression";
    
    public function getLabel(): string
    {
        return match ($this) {
            self::classification => 'Classification',
            self::regression => 'Regression',
        };
    }
    
    public static function toArray(): array
    {
        return [
            self::classification,
            self::regression,
        ];
    }
}
