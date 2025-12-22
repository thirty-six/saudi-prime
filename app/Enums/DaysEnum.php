<?php

namespace App\Enums;

use Carbon\Carbon;

enum DaysEnum :string
{
    case Saturday = 'saturday';
    case Sunday = 'sunday';
    case Monday = 'monday';
    case Tuesday = 'tuesday';
    case Wednesday = 'wednesday';
    case Thursday = 'thursday';
    // case Friday = 'friday';
    public function order(): int
    {
        return match ($this) {
            self::Saturday => 0,
            self::Sunday => 1,
            self::Monday => 2,
            self::Tuesday => 3,
            self::Wednesday => 4,
            self::Thursday => 5,
            // self::Friday => 6,
        };
    }
    public function getLabel(): string
    {
        return __(ucfirst($this->name));
    }
    public static function getOptions(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [
                $case->value => $case->getLabel()
            ])
            ->toArray();
    }
    public function carbonKey(): int
    {
        return match ($this) {
            self::Sunday => Carbon::SUNDAY,
            self::Monday => Carbon::MONDAY,
            self::Tuesday => Carbon::TUESDAY,
            self::Wednesday => Carbon::WEDNESDAY,
            self::Thursday => Carbon::THURSDAY,
            // self::Friday => Carbon::FRIDAY,
            self::Saturday => Carbon::SATURDAY,
        };
    }

}
