<?php

namespace App\Filament\Resources\MorningRegistrations\Pages;

use App\Filament\Resources\MorningRegistrations\MorningRegistrationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMorningRegistrations extends ListRecords
{
    protected static string $resource = MorningRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),
        ];
    }
}
