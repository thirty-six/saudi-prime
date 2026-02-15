<?php

namespace App\Filament\Resources\RamadanSessions\Pages;

use App\Filament\Resources\RamadanSessions\RamadanSessionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRamadanSessions extends ListRecords
{
    protected static string $resource = RamadanSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
