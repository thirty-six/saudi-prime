<?php

namespace App\Filament\Resources\Programs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProgramForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('base_price')
                    ->label(__('Base price'))
                    ->numeric()
                    ->prefix(config('app.currency')),
                TextInput::make('description_ar')
                    ->label(__('Description'))
                    ->required(),
            ]);
    }
}
