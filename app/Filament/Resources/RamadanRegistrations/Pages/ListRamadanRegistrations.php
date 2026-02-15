<?php

namespace App\Filament\Resources\RamadanRegistrations\Pages;

use App\Filament\Resources\RamadanRegistrations\RamadanRegistrationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRamadanRegistrations extends ListRecords
{
    protected static string $resource = RamadanRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
