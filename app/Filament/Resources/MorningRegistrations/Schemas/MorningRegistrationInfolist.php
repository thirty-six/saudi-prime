<?php

namespace App\Filament\Resources\MorningRegistrations\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MorningRegistrationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('full_name')
                ->label('الاسم كامل'),
                TextEntry::make('university_number')
                ->label('الرقم الجامعي'),
                TextEntry::make('phone')
                ->label('رقم الجوال'),
                TextEntry::make('email')
                    ->label('الايميل')
                    ->placeholder('-'),
               TextEntry::make('programSport1.sport.name_ar')
                    ->label('الرياضة')
                    ->badge(),
                TextEntry::make('day_one')
                    ->label('اليوم الاول')
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
                TextEntry::make('day_two')
                    ->label('اليوم الثاني')
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
                TextEntry::make('start_time_1')
                ->label('وقت اليوم الأول')
                    ->time(),
                TextEntry::make('start_time_2')
                ->label('وقت اليوم الثاني')
                    ->time(),
                TextEntry::make('start_at')
                ->label('تاريخ البداية')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('payment_method')
                ->label('طريقة الدفع')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
        'cash'          => 'كاش',
        'bank_transfer' => 'تحويل بنكي',
        'online'        => 'دفع إلكتروني',
        default         => $state,
    }),
                TextEntry::make('payment_proof')
                ->label('اثبات الدفع')
                    ->placeholder('-'),
                TextEntry::make('price')
                ->label('السعر')
                     ->formatStateUsing(fn ($state) => number_format($state) . ' ريال'),
                IconEntry::make('is_paid')
                ->label(__('Paid'))
                    ->boolean(),
                TextEntry::make('created_at')
                    ->label('وقت التسجيل')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
