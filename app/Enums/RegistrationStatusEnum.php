<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum RegistrationStatusEnum : string implements HasLabel
{
    case Pending = 'pending';
    case Started = 'started';
    case Completed = 'completed';
    case Cancelled = 'cancelled';
    
    public function getLabel(): ?string
    {
        return __(ucfirst($this->name));
    }
}
