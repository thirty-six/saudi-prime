<?php

namespace App\Filament\Resources\RamadanRegistrations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Actions\ExportAction;
use App\Filament\Exports\RamadanRegistrationExporter;
use Filament\Actions\Action;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\RamadanRegistration;


class RamadanRegistrationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('invoice_token')
                ->label('رقم الفاتورة')
                    ->searchable(),
                TextColumn::make('guardian_name')
                ->label('اسم ولي الأمر')
                    ->searchable(),
                TextColumn::make('guardian_phone')
                ->label('رقم جوال ولي الأمر')
                    ->searchable(),
                TextColumn::make('guardian_email')
                ->label('بريد  ولي الأمر')
                    ->searchable(),
                TextColumn::make('child_name')
                ->label('اسم الطفل')
                    ->searchable(),
                TextColumn::make('child_dob')
                ->label('تاريخ ميلاد الطفل')
                ->date()
                ->sortable(),
                TextColumn::make('child_dob')
                ->label('العمر')
                ->formatStateUsing(function ($state) {
                    $dob = \Carbon\Carbon::parse($state);
                    return $dob->age . ' سنة (' . $dob->format('d-m-Y') . ')';
                })->color('primary'),
                TextColumn::make('ramadan_session_id')
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
                TextColumn::make('price')
                ->label('السعر')
                    ->money('SAR')
                    ->sortable(),
                ToggleColumn::make('paid')
                ->label('مدفوع')
                ->afterStateUpdated(function ($record, $state) {
                    $record->update([
                        'paid' => $state,
                    ]);
                }),    
                TextColumn::make('payment_method')
                ->label('طريقة الدفع')
                ->badge()
                ->formatStateUsing(fn ($state) =>
                    match ($state) {
                        'cash' => 'كاش',
                        default => $state,
                    }
                ),
                TextColumn::make('media_consent')
                ->label('التصوير والنشر')
                ->badge()
                ->formatStateUsing(fn ($state) =>
                    $state === 'agree' ? 'موافق' : 'غير موافق'
                )
                ->color(fn ($state) =>
                    $state === 'agree' ? 'success' : 'danger'
                ),
                IconColumn::make('accepted_terms')
                ->label('الشروط والأحكام')
                    ->boolean(),
                TextColumn::make('created_at')
                ->label('تاريخ التسجيل')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
             ->headerActions([
            Action::make('download')
    ->label('تحميل Excel')
    ->icon('heroicon-o-arrow-down-tray')
    ->action(function () {

        $fileName = 'ramadan_registrations_' . now()->format('Y_m_d_H_i') . '.csv';

        return response()->streamDownload(function () {

            $handle = fopen('php://output', 'w');

            // دعم العربي
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));

            fputcsv($handle, [
                'رقم الفاتورة',
                'ولي الأمر',
                'رقم الجوال',
                'اسم الطفل',
                'العمر',
                'الفئة',
                'الأيام',
                'الوقت',
                'السعر',
                'الدفع',
                'تاريخ التسجيل',
            ]);

            $records = \App\Models\RamadanRegistration::with('session')->get();

            foreach ($records as $r) {

                $days = $r->session?->days?->getLabel() ?? '-';

                $time = $r->session
                    ? \Carbon\Carbon::parse($r->session->start_time)->format('h:i A')
                      . ' - ' .
                      \Carbon\Carbon::parse($r->session->end_time)->format('h:i A')
                    : '-';

                fputcsv($handle, [
                    $r->invoice_token,
                    $r->guardian_name,
                    "'" . $r->guardian_phone,
                    $r->child_name,
                    \Carbon\Carbon::parse($r->child_dob)->age . ' سنة',
                    $r->age_group === 'boys' ? 'الأولاد' : 'البنات',
                    $days,
                    $time,
                    $r->price,
                    $r->paid ? 'مدفوع' : 'غير مدفوع',
                    $r->created_at->format('Y-m-d H:i'),
                ]);
            }

            fclose($handle);

        }, $fileName);
    })
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
