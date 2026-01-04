<?php

namespace App\Filament\Resources\Stadiums\Pages;

use App\Filament\Resources\Stadiums\StadiumResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStadiums extends ListRecords
{
    protected static string $resource = StadiumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
