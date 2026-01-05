<?php

namespace App\Filament\Resources\Registrations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class RegistrationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer.name')
                    ->label(__('Customer'))
                    ->searchable(),
                TextColumn::make('customer.phone')
                    ->label(__('Phone'))
                    ->searchable(),
                TextColumn::make('status')
                    ->label(__('Status'))
                    ->badge()
                    ->searchable(),
                ToggleColumn::make('is_paid')
                    ->label(__('Paid'))
                    ->updateStateUsing(function ($record, $state) {
                        $record->update([
                            'paid_at' => $state ? now() : null,
                        ]);
                    }),
                IconColumn::make('accepted_terms')
                    ->label(__('Accepted Terms'))
                    ->boolean(),
                TextColumn::make('price')
                    ->money(config('app.currency_code'))
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
