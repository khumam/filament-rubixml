<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Algorithm: string implements HasLabel
{
    case KNN = 'KNN';
    case ClasificationTree = 'Clasification Tree';
    case RandomForest = 'Random Forest';
    case GradientBoost = 'Gradient Boost';
    
    public function getLabel(): string
    {
        return match ($this) {
            self::KNN => 'K-Nearest Neighbors',
            self::ClasificationTree => 'Clasification Tree',
            self::RandomForest => 'Random Forest',
            self::GradientBoost => 'Gradient Boost',
        };
    }
}
