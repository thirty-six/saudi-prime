<?php

namespace App\Filament\Resources\RamadanSessions\Schemas;

use App\Enums\DaysRamadanEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class RamadanSessionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                ->label('اسم الجلسة')
                    ->required(),
                Select::make('days')
                ->label('أيام الجلسة')
                    ->options(DaysRamadanEnum::class)
                    ->required(),
                TimePicker::make('start_time')
                ->label('وقت بداية الجلسة')
                    ->required(),
                TimePicker::make('end_time')
                ->label('وقت انتهاء الجلسة')
                    ->required(),
                TextInput::make('capacity')
                ->label('سعة المشتركين')
                    ->required()
                    ->numeric()
                    ->default(80),
                    TextInput::make('price')
                    ->label('السعر (ريال)')
                    ->numeric()
                    ->required()
                    ->prefix('﷼')
                    ->minValue(0)
                    ->step(0.01),
                Toggle::make('is_active')
                ->label('فعالة')
                    ->required(),
            ]);
    }
}
