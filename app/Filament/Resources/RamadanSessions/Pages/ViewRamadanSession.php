<?php

namespace App\Filament\Resources\RamadanSessions\Pages;

use App\Filament\Resources\RamadanSessions\RamadanSessionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRamadanSession extends ViewRecord
{
    protected static string $resource = RamadanSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
