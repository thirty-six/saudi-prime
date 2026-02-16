<?php

namespace App\Filament\Resources\RamadanRegistrations\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RamadanRegistrationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('invoice_token')
                ->label('رقم الفاتورة'),
                TextEntry::make('receipt_number')
                ->label('رقم الايصال'),
                TextEntry::make('guardian_name')
                ->label('اسم ولي الأمر'),
                TextEntry::make('guardian_phone')
                ->label('رقم ولي الأمر'),
                TextEntry::make('guardian_email')
                    ->label('بريد ولي الأمر')
                    ->placeholder('-'),
                TextEntry::make('child_name')
                ->label('اسم الطفل'),
                TextEntry::make('child_dob')
                ->label('تاريخ ميلاد الطفل')
                ->date(),
                TextEntry::make('age_group')
                ->label('الفئة العمرية')
                ->badge()
                ->formatStateUsing(fn ($state) =>
                    match ($state) {
                        'boys' => 'الأولاد 5-8 سنوات',
                        'girls' => 'البنات 5-15 سنة',
                        default => $state,
                    }
                ),
                TextEntry::make('ramadan_session_id')
    ->label('الأيام والوقت')
    ->formatStateUsing(function ($state, $record) {

        if (!$record->session) {
            return '-';
        }

        $days = $record->session->days?->getLabel() ?? '-';

        $start = \Carbon\Carbon::parse($record->session->start_time)
                    ->format('h:i A');

        $end = \Carbon\Carbon::parse($record->session->end_time)
                    ->format('h:i A');

        return $days . ' | ' . $start . ' - ' . $end;
    })
    ->wrap(),
                TextEntry::make('price')
                ->label('السعر')
                    ->money('SAR'),
               TextEntry::make('payment_method')
                ->label('طريقة الدفع')
                ->badge()
                ->formatStateUsing(fn ($state) =>
                    match ($state) {
                        'cash' => 'كاش',
                        default => $state,
                    }
                ),
                TextEntry::make('media_consent')
                ->label('التصوير والنشر')
                ->badge()
                ->formatStateUsing(fn ($state) =>
                    $state === 'agree' ? 'موافق' : 'غير موافق'
                )
                ->color(fn ($state) =>
                    $state === 'agree' ? 'success' : 'danger'
                ),
                IconEntry::make('accepted_terms')
                ->label('الأحكام والشروط')
                    ->boolean(),
                TextEntry::make('created_at')
                ->label('تاريخ التسجيل')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
