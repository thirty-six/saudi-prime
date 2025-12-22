<?php

namespace App\Enums;

enum ProgramCategoryEnum: string
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
    public function label(): string
    {
        return match ($this) {
            self::Morning => __('Morning Program'),
            self::Evening => __('Evening Program'),
        };
    }
}
