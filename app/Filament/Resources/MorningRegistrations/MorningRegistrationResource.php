<?php

namespace App\Filament\Resources\MorningRegistrations;

use App\Filament\Resources\MorningRegistrations\Pages\CreateMorningRegistration;
use App\Filament\Resources\MorningRegistrations\Pages\EditMorningRegistration;
use App\Filament\Resources\MorningRegistrations\Pages\ListMorningRegistrations;
use App\Filament\Resources\MorningRegistrations\Pages\ViewMorningRegistration;
use App\Filament\Resources\MorningRegistrations\Schemas\MorningRegistrationForm;
use App\Filament\Resources\MorningRegistrations\Schemas\MorningRegistrationInfolist;
use App\Filament\Resources\MorningRegistrations\Tables\MorningRegistrationsTable;
use App\Models\MorningRegistration;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;



class MorningRegistrationResource extends Resource
{
    protected static ?string $model = MorningRegistration::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'full_name';

    public static function form(Schema $schema): Schema
    {
        return MorningRegistrationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MorningRegistrationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MorningRegistrationsTable::configure($table);
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
            'index' => ListMorningRegistrations::route('/'),
            'create' => CreateMorningRegistration::route('/create'),
            'view' => ViewMorningRegistration::route('/{record}'),
            'edit' => EditMorningRegistration::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getPluralLabel(): string
    {
        return __('mornin_registers');
    }

    public static function getLabel(): string
    {
        return __('mornin_register');
    }

    public static function canCreate(): bool
    {
        // return auth()->user()?->can('create');
         return false;
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
