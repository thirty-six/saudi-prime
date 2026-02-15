<?php

namespace App\Filament\Resources\MorningRegistrations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\Toggle;

class MorningRegistrationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')
                ->label('الاسم كامل')
                    ->searchable(),
                TextColumn::make('university_number')
                ->label('الرقم الجامعي')
                    ->searchable(),
                TextColumn::make('phone')
                ->label('رقم الجوال')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('الايميل')
                    ->searchable(),
                TextColumn::make('programSport1.sport.name_ar')
                    ->label('الرياضة')
                    ->sortable()
                    ->disabled(),
                TextColumn::make('day_one')
                    ->label('اليوم الأول')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
        'saturday'   => 'السبت',
        'sunday'     => 'الأحد',
        'monday'     => 'الاثنين',
        'tuesday'    => 'الثلاثاء',
        'wednesday'  => 'الأربعاء',
        'thursday'   => 'الخميس',
        default      => $state,
    }),
                TextColumn::make('day_two')
                ->label('اليوم الأول')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
        'saturday'   => 'السبت',
        'sunday'     => 'الأحد',
        'monday'     => 'الاثنين',
        'tuesday'    => 'الثلاثاء',
        'wednesday'  => 'الأربعاء',
        'thursday'   => 'الخميس',
        default      => $state,
    }),
                TextColumn::make('start_time_1')
                ->label('وقت اليوم الأول')
                    ->time()
                    ->sortable(),
                TextColumn::make('start_time_2')
                ->label('وقت اليوم الثاني ')
                    ->time()
                    ->sortable(),
                TextColumn::make('start_at')
                ->label(' تاريخ البداية ')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('payment_method')
                ->label('طريقة الدفع')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
        'cash'          => 'كاش',
        'bank_transfer' => 'تحويل بنكي',
        // 'online'        => 'دفع إلكتروني',
        default         => $state,
    }),
                TextColumn::make('payment_proof')
                    ->searchable(),
                TextColumn::make('price')
                    ->formatStateUsing(fn ($state) => number_format($state) . ' ريال')
                    ->sortable(),
                ToggleColumn::make('is_paid')
                ->label(__('Paid'))
                ->afterStateUpdated(function ($record, $state) {
                    $record->update([
                        'is_paid' => $state,
                        'paid_at' => $state ? now() : null,
                    ]);
                }),
                TextColumn::make('created_at')
                ->label('وقت التسجيل')
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
