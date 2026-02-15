<?php

namespace App\Filament\Resources\RamadanRegistrations\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use App\Models\RamadanSession;

class RamadanRegistrationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('guardian_name')
                    ->label('اسم ولي الأمر')
                    ->required(),

                TextInput::make('guardian_phone')
                    ->label('رقم الجوال')
                    ->tel()
                    ->required(),

                TextInput::make('guardian_email')
                    ->label('البريد الإلكتروني')
                    ->email(),

                TextInput::make('child_name')
                    ->label('اسم الطفل')
                    ->required(),

                DatePicker::make('child_dob')
                    ->label('تاريخ الميلاد')
                    ->required(),

                Select::make('age_group')
                    ->label('الفئة العمرية')
                    ->options([
                        'boys' => 'الأولاد 5-8 سنوات',
                        'girls' => 'البنات 5-15 سنة',
                    ])
                    ->required(),

                Select::make('ramadan_session_id')
                    ->label('الجلسة')
                    ->options(function () {
                        return RamadanSession::all()->mapWithKeys(function ($session) {

                            $days = $session->days?->getLabel() ?? '';

                            $start = \Carbon\Carbon::parse($session->start_time)
                                ->format('h:i A');

                            $end = \Carbon\Carbon::parse($session->end_time)
                                ->format('h:i A');

                            return [
                                $session->id => "{$days} | {$start} - {$end}"
                            ];
                        });
                    })
                    ->searchable()
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $session = RamadanSession::find($state);
                        if ($session) {
                            $set('price', $session->price);
                        }
                    }),

                TextInput::make('price')
                    ->label('السعر')
                    ->numeric()
                    ->prefix('ريال')
                    ->required(),

                Toggle::make('paid')
                    ->label('تم الدفع')
                    ->default(false),

                Select::make('payment_method')
                    ->label('طريقة الدفع')
                    ->options([
                        'cash' => 'كاش',
                    ])
                    ->default('cash')
                    ->required(),

                Select::make('media_consent')
                    ->label('الموافقة على التصوير')
                    ->options([
                        'agree' => 'موافق',
                        'refuse' => 'غير موافق',
                    ])
                    ->required(),

                Toggle::make('accepted_terms')
                    ->label('وافق على الشروط')
                    ->required(),

            ]);
    }
}
