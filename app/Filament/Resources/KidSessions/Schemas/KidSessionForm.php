<?php

namespace App\Filament\Resources\KidSessions\Schemas;

use App\Enums\ProgramCategoryEnum;
use App\Enums\SessionDaysEnum;
use App\Enums\SessionStatusEnum;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rule;


class KidSessionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('sport_id')
                    ->label(__('Sport'))
                    ->relationship('sport', 'name_ar')
                    ->searchable()
                    ->required()
                    ->preload(),
                Select::make('days')
                    ->label(__('Days'))
                    ->options(SessionDaysEnum::class)
                    ->required()
                    ->preload()
                    ->rules([
                    fn ($get, $record) => Rule::unique('kid_sessions', 'days')
                        ->where('start_time', $get('start_time'))
                        ->ignore($record),
                    ])->validationMessages([
                        'unique' => 'يوجد جلسة بنفس اليوم ونفس الوقت بالفعل',
                    ]),
                    Select::make('status')
                    ->label(__('Status'))
                    ->options(SessionStatusEnum::class)
                    ->required()
                    ->default(SessionStatusEnum::Pending),
                TimePicker::make('start_time')
                    ->label(__('Start Time'))
                    ->datalist(ProgramCategoryEnum::Evening->times())
                    ->required(),
                DateTimePicker::make('start_at')
                    ->label(__('Start at')),
                TextInput::make('capacity')
                    ->label(__('Capacity'))
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->default(16),
                TextInput::make('base_price')
                    ->label(__('Base price'))
                    ->required()
                    ->numeric()
                    ->default(600)
                    ->prefix(config('app.currency')),
            ]);
    }
}
