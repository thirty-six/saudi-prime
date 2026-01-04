<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
enum SessionDaysEnum: string implements HasLabel
{
    // Each option represents a combination of days
    // thoes are for kid sessions
    case SAT_MON_WED = 'sat_mon_wed';
    case SUN_TUE_THU = 'sun_tue_thu';

    public function days(): array
    {
        return match ($this) {
            self::SAT_MON_WED => [
                DaysEnum::Saturday,
                DaysEnum::Monday,
                DaysEnum::Wednesday,
            ],
            self::SUN_TUE_THU => [
                DaysEnum::Sunday,
                DaysEnum::Tuesday,
                DaysEnum::Thursday,
            ],
        };
    }

    public function getLabel(): string
    {
        return collect(array_map(
            fn (DaysEnum $day) => $day->getLabel(),
            $this->days()
        ))->implode('-');
    }
}

