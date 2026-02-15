<?php

namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
enum DaysRamadanEnum:string implements HasLabel
{
    case SAT_MON_WED = 'sat_mon_wed';
    case SUN_TUE_THU = 'sun_tue_thu';

   public function getLabel(): ?string
    {
        return match ($this) {
            self::SAT_MON_WED => 'سبت - اثنين - أربعاء',
            self::SUN_TUE_THU => 'أحد - ثلاثاء - خميس',
        };
    }
}
