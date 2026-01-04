<?php

namespace App\Filament\Resources\Stadiums\Pages;

use App\Filament\Resources\Stadiums\StadiumResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditStadium extends EditRecord
{
    protected static string $resource = StadiumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
