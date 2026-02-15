<?php

namespace App\Filament\Resources\RamadanSessions\Pages;

use App\Filament\Resources\RamadanSessions\RamadanSessionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRamadanSession extends EditRecord
{
    protected static string $resource = RamadanSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
