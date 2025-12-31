<?php

namespace App\Filament\Resources\KidSessions\Pages;

use App\Filament\Resources\KidSessions\KidSessionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKidSessions extends ListRecords
{
    protected static string $resource = KidSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
