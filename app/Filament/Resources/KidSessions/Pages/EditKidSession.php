<?php

namespace App\Filament\Resources\KidSessions\Pages;

use App\Filament\Resources\KidSessions\KidSessionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditKidSession extends EditRecord
{
    protected static string $resource = KidSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
