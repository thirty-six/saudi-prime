<?php

namespace App\Filament\Resources\RamadanRegistrations\Pages;

use App\Filament\Resources\RamadanRegistrations\RamadanRegistrationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRamadanRegistration extends EditRecord
{
    protected static string $resource = RamadanRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
