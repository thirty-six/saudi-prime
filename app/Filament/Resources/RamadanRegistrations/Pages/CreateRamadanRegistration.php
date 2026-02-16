<?php

namespace App\Filament\Resources\RamadanRegistrations\Pages;

use App\Filament\Resources\RamadanRegistrations\RamadanRegistrationResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
use App\Models\RamadanRegistration;

class CreateRamadanRegistration extends CreateRecord
{
    protected static string $resource = RamadanRegistrationResource::class;


protected function mutateFormDataBeforeCreate(array $data): array
{
    // توليد invoice token
    $data['invoice_token'] = Str::uuid()->toString();

    // نحفظ مؤقتاً بدون receipt
    return $data;
}

protected function afterCreate(): void
{
    $record = $this->record;

    $datePart = now()->format('Ymd');
    $sequence = str_pad($record->id, 5, '0', STR_PAD_LEFT);

    $receiptNumber = "RC-{$datePart}-{$sequence}";

    $record->update([
        'receipt_number' => $receiptNumber
    ]);
}
}