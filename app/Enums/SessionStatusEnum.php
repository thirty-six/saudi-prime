<?php
namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum SessionStatusEnum: string implements HasColor, HasLabel
{
    case Pending = 'pending';
    case Open = 'open';
    case Full = 'full';
    case Started = 'started';
    case Completed = 'completed';
    case Cancelled = 'cancelled';

    public function getLabel(): ?string
    {
        return __($this->name);
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Pending   => 'gray',
            self::Open      => 'primary',
            self::Full      => 'info',
            self::Started   => 'secondary',
            self::Completed => 'success',
            self::Cancelled => 'danger',
        };
    }

    public function canTransitionTo(self $to): bool
    {
        return match ($this) {
            self::Pending   => in_array($to, [self::Open]),
            self::Open      => in_array($to, [self::Full, self::Started]),
            self::Full      => in_array($to, [self::Started]),
            self::Started   => in_array($to, [self::Completed]),
            default         => false,
        };
    }

    public function requiresStartAt(): bool
    {
        return $this === self::Started;
    }

    public function requiresConfirmation(): bool
    {
        return in_array($this, [
            self::Cancelled,
            self::Completed,
        ]);
    }
}
