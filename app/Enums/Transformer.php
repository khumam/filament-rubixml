<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Transformer: string implements HasLabel
{
    case L1Normalizer = 'L1 Normalizer';
    case L2Normalizer = 'L2 Normalizer';
    case MaxAbsoluteScaler = 'Max Absolute Scaler';
    case MinMaxNormalizer = 'Min Max Normalizer';
    case RobustStandardizer = 'Robust Standardizer';
    case ZScaleStandardizer = 'Z Scale Standardizer';
    
    public function getLabel(): string
    {
        return match ($this) {
            self::L1Normalizer => 'L1 Normalizer',
            self::L2Normalizer => 'L2 Normalizer',
            self::MaxAbsoluteScaler => 'Max Absolute Scaler',
            self::MinMaxNormalizer => 'Min Max Normalizer',
            self::RobustStandardizer => 'Robust Standardizer',
            self::ZScaleStandardizer => 'Z Scale Standardizer',
        };
    }
}
