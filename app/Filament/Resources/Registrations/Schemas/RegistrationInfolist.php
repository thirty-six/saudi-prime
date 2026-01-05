<?php

namespace App\Filament\Resources\Registrations\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\RepeatableEntry;
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
                TextEntry::make('customer.phone')
                    ->label(__('Phone'))
                    ->url(fn ($state) => $state ? 'tel:' . $state : null),
                TextEntry::make('status')
                    ->label(__('Status'))
                    ->badge(),
                TextEntry::make('paid_at')
                    ->label(__('Payment Date'))
                    ->dateTime(),
                IconEntry::make('accepted_terms')
                    ->label(__('Accepted Terms'))
                    ->boolean(),
                TextEntry::make('price')
                    ->label(__('Price'))
                    ->money(config('app.currency_code')),
                RepeatableEntry::make('sessions')
                    ->label(__('Registered Sessions'))
                    ->schema([
                        TextEntry::make('start_time')
                                    ->label(__('Start time')),
                        TextEntry::make('day')
                                    ->label(__('Day')),
                        TextEntry::make('status')
                                    ->label(__('Status')),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }
}
