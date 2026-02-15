<?php

namespace App\Filament\Resources\RamadanRegistrations;

use App\Filament\Resources\RamadanRegistrations\Pages\CreateRamadanRegistration;
use App\Filament\Resources\RamadanRegistrations\Pages\EditRamadanRegistration;
use App\Filament\Resources\RamadanRegistrations\Pages\ListRamadanRegistrations;
use App\Filament\Resources\RamadanRegistrations\Pages\ViewRamadanRegistration;
use App\Filament\Resources\RamadanRegistrations\Schemas\RamadanRegistrationForm;
use App\Filament\Resources\RamadanRegistrations\Schemas\RamadanRegistrationInfolist;
use App\Filament\Resources\RamadanRegistrations\Tables\RamadanRegistrationsTable;
use App\Models\RamadanRegistration;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class RamadanRegistrationResource extends Resource
{
    protected static ?string $model = RamadanRegistration::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'guardian_phone';

    public static function form(Schema $schema): Schema
    {
        return RamadanRegistrationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RamadanRegistrationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RamadanRegistrationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRamadanRegistrations::route('/'),
            'create' => CreateRamadanRegistration::route('/create'),
            'view' => ViewRamadanRegistration::route('/{record}'),
            'edit' => EditRamadanRegistration::route('/{record}/edit'),
        ];
    }

     public static function getPluralLabel(): string
    {
        return __('Rmadan_registers');
    }

    public static function getLabel(): string
    {
        return __('Rmadan_register');
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create');
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()?->can('edit');
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete');
    }
}
