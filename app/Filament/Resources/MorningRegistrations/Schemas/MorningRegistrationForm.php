<?php

namespace App\Filament\Resources\MorningRegistrations\Schemas;

use App\Models\ProgramSport;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Carbon\Carbon;

class MorningRegistrationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            /* ===============================
             | Student Info
             =============================== */

            TextInput::make('full_name')
                ->label('الاسم الكامل')
                ->required(),

            TextInput::make('university_number')
                ->label('الرقم الجامعي')
                ->required(),

            TextInput::make('phone')
                ->label('رقم الجوال')
                ->required(),

            TextInput::make('email')
                ->label('البريد الإلكتروني')
                ->email(),

            /* ===============================
             | Sport (بدون تكرار)
             =============================== */

            Select::make('sport_id')
                ->label('الرياضة')
                ->options(
                    ProgramSport::with('sport')
                        ->get()
                        ->unique('sport_id')
                        ->mapWithKeys(fn ($ps) => [
                            $ps->sport_id => $ps->sport->name_ar
                        ])
                )
                ->reactive()
                ->required()
                ->afterStateUpdated(function ($set) {
                    $set('day_one', null);
                    $set('day_two', null);
                    $set('start_time_1', null);
                    $set('start_time_2', null);
                }),

            /* ===============================
             | Day One
             =============================== */

            Select::make('day_one')
                ->label('اليوم الأول')
                ->reactive()
                ->options(function ($get) {

                    $sportId = $get('sport_id');
                    if (!$sportId) return [];

                    return ProgramSport::where('sport_id', $sportId)
                        ->pluck('day')
                        ->unique()
                        ->mapWithKeys(fn ($day) => [
                            $day->value => $day->getLabel()
                        ]);
                })
                ->afterStateUpdated(fn ($set) => [
                    $set('day_two', null),
                    $set('start_time_1', null),
                    $set('start_time_2', null),
                ])
                ->required(),

            /* ===============================
             | Time One
             =============================== */

            Select::make('start_time_1')
                ->label('وقت اليوم الأول')
                ->reactive()
                ->options(function ($get) {

                    $sportId = $get('sport_id');
                    $day = $get('day_one');

                    if (!$sportId || !$day) return [];

                    return ProgramSport::where('sport_id', $sportId)
                        ->where('day', $day)
                        ->get()
                        ->mapWithKeys(function ($ps) {

                            $raw = $ps->start_time instanceof Carbon
                                ? $ps->start_time->format('H:i:s')
                                : $ps->start_time;

                            return [
                                $raw => Carbon::parse($raw)->format('h:i A'),
                            ];
                        });
                })
                ->required(),

            /* ===============================
             | Day Two (مختلف عن الأول)
             =============================== */

            Select::make('day_two')
                ->label('اليوم الثاني')
                ->reactive()
                ->options(function ($get) {

                    $sportId = $get('sport_id');
                    $dayOne = $get('day_one');

                    if (!$sportId) return [];

                    return ProgramSport::where('sport_id', $sportId)
                        ->where('day', '!=', $dayOne) // منع تكرار اليوم
                        ->pluck('day')
                        ->unique()
                        ->mapWithKeys(fn ($day) => [
                            $day->value => $day->getLabel()
                        ]);
                })
                ->afterStateUpdated(fn ($set) => $set('start_time_2', null))
                ->required(),

            /* ===============================
             | Time Two
             =============================== */

            Select::make('start_time_2')
                ->label('وقت اليوم الثاني')
                ->reactive()
                ->options(function ($get) {

                    $sportId = $get('sport_id');
                    $day = $get('day_two');

                    if (!$sportId || !$day) return [];

                    return ProgramSport::where('sport_id', $sportId)
                        ->where('day', $day)
                        ->get()
                        ->mapWithKeys(function ($ps) {

                            $raw = $ps->start_time instanceof Carbon
                                ? $ps->start_time->format('H:i:s')
                                : $ps->start_time;

                            return [
                                $raw => Carbon::parse($raw)->format('h:i A'),
                            ];
                        });
                })
                ->required(),

            /* ===============================
             | Payment
             =============================== */

            Select::make('payment_method')
                ->label('طريقة الدفع')
                ->options([
                    'online' => 'دفع إلكتروني',
                    'cash' => 'كاش',
                    'bank_transfer' => 'تحويل بنكي',
                ])
                ->required(),

            TextInput::make('price')
                ->label('السعر')
                ->numeric()
                ->prefix('ريال')
                ->required(),

            Toggle::make('is_paid')
                ->label('مدفوع'),
        ]);
    }
}
