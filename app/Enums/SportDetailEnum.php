<?php

namespace App\Enums;

enum SportDetailEnum :string
{
    case Benefit = 'benefits';
    case Skill = 'gained skills';
    case Equipment = 'equipments';
    case Level = 'skill level';
    
    public function getLabel(): ?string
    {
        return __(ucwords($this->value));
    }

    public static function getOptions(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [
                $case->name => $case->getLabel()
            ])
            ->toArray();
    }

}
