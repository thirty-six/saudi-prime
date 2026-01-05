<?php

namespace App\Filament\Resources\Registrations\Pages;

use App\Filament\Resources\Registrations\RegistrationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRegistration extends EditRecord
{
    protected static string $resource = RegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $this->record->syncSessions(
            $this->data['session_ids'] ?? []
        );
    }
    
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $registration = $this->record;

        $session = $registration->sessions()->first();

        if ($session) {
            $data['sport_id']   = $session->programSport->sport_id;
            $data['program_id'] = $session->programSport->program_id;
            $data['session_ids'] = $registration->sessions->pluck('id')->toArray();
        }

        return $data;
    }

}
