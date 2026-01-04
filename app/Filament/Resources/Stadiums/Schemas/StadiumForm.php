<?php

namespace App\Filament\Resources\Stadiums\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StadiumForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),
                TextInput::make('description')
                    ->label(__('Description'))
                    ->required(),
            ]);
    }
}
