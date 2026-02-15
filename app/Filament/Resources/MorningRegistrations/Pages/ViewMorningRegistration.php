<?php

namespace App\Filament\Resources\MorningRegistrations\Pages;

use App\Filament\Resources\MorningRegistrations\MorningRegistrationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMorningRegistration extends ViewRecord
{
    protected static string $resource = MorningRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
