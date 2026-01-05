<?php

namespace App\Filament\Resources\Registrations\Pages;

use App\Filament\Resources\Registrations\RegistrationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRegistration extends CreateRecord
{
    protected static string $resource = RegistrationResource::class;
    protected function afterCreate(): void
    {
        $this->record->syncSessions(
            $this->data['session_ids'] ?? []
        );
    }

}
