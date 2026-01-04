<?php

namespace App\Filament\Resources\Registrations\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RegistrationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('customer.name')
                    ->label(__('Customer')),
                Repeater::make('sessions')
                    ->label('Registered Sessions')
                    ->schema([
                        TextEntry::make('start_time'),
                        TextEntry::make('status'),
                    ])
                    ->columns(3),
                TextEntry::make('status')
                    ->label(__('Status'))
                    ->badge(),
                TextEntry::make('paid_at')
                    ->dateTime(),
                IconEntry::make('accepted_terms')
                    ->boolean(),
                TextEntry::make('price')
                    ->money()
                    ->prefix(config('app.currency')),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
