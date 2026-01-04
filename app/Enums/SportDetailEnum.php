<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum SportDetailEnum :string implements HasLabel
{
    case Benefit = 'benefits';
    case Skill = 'gained skills';
    case Equipment = 'equipments';
    case Level = 'skill level';
    
    public function getLabel(): ?string
    {
        return __(ucwords($this->name));
    }

}
