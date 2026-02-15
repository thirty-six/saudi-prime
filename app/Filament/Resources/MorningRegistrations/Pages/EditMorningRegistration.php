<?php

namespace App\Filament\Resources\MorningRegistrations\Pages;

use App\Filament\Resources\MorningRegistrations\MorningRegistrationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMorningRegistration extends EditRecord
{
    protected static string $resource = MorningRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
