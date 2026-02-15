<?php

namespace App\Filament\Resources\RamadanRegistrations\Pages;

use App\Filament\Resources\RamadanRegistrations\RamadanRegistrationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRamadanRegistration extends ViewRecord
{
    protected static string $resource = RamadanRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
