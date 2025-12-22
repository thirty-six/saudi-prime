<?php
namespace App\Enums;

enum SessionStatusEnum: string
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

    public static function getOptions(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [
                $case->value => $case->getLabel()
            ])
            ->toArray();
    }

}
