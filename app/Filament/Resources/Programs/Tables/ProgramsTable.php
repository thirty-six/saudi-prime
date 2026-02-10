<?php

namespace App\Filament\Resources\Programs\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;

class ProgramsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category')
                    ->label(__('Category'))
                    ->badge(),
                TextColumn::make('base_price')
                    ->label(__('Base price'))
                    ->money(config('app.currency_code'), true),
                TextColumn::make('description')
                    ->label(__('Description'))
                    ->limit(50),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
