<?php

namespace App\Enums;

enum RegistrationStatusEnum : string
{
    case Pending = 'pending';
    case Started = 'started';
    case Completed = 'completed';
    case Cancelled = 'cancelled';
    
    public function getLabel(): ?string
    {
        return __($this->name);
    }
}
