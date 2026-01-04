<?php

namespace App\Enums;

use BackedEnum;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

enum ProgramCategoryEnum: string implements HasLabel, HasIcon
{
    case Morning = 'morning';
    case Evening = 'evening';
    public function times(): array
    {
        return match ($this) {
            self::Morning => ['08:00','09:00','10:00','11:00','12:00'],
            self::Evening => ['16:00','17:00','18:00','19:00','20:00','21:00'],
        };
    }
    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::Morning => __('Morning Program'),
            self::Evening => __('Evening Program'),
        };
    }
    public function getIcon(): string|BackedEnum|Htmlable|null
    {
        return match ($this) {
            self::Morning => Heroicon::Sun,
            self::Evening => Heroicon::Moon,
        };
    }
}
