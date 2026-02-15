<?php

namespace App\Filament\Resources\RamadanSessions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\ToggleColumn;

class RamadanSessionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->label('اسم الجلسة')
                    ->searchable(),
                TextColumn::make('days')
                ->label('أيام الجلسة')
                    ->badge(),
                TextColumn::make('start_time')
                ->label('وقت بداية الجلسة')
                    ->time()
                    ->sortable()
                    ->formatStateUsing(fn ($state) =>
        \Carbon\Carbon::parse($state)->format('h:i A')
    ),
                TextColumn::make('end_time')
                ->label('وقت انتهاء الجلسة')
                    ->time()
                    ->sortable()
                    ->formatStateUsing(fn ($state) =>
        \Carbon\Carbon::parse($state)->format('h:i A')
    ),
                TextColumn::make('capacity')
                ->label('السعة')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('price')
                    ->label('السعر')
                    ->money('SAR')
                    ->sortable()
                    ->badge()
                    ->color('success'),
                ToggleColumn::make('is_active')
                ->label('فعالة')
                ->afterStateUpdated(function ($record, $state) {
                    $record->update([
                        'is_active' => $state,
                    ]);
                }),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
