<?php

namespace App\Filament\Resources\KidSessions;

use App\Filament\Resources\KidSessions\Pages\CreateKidSession;
use App\Filament\Resources\KidSessions\Pages\EditKidSession;
use App\Filament\Resources\KidSessions\Pages\ListKidSessions;
use App\Filament\Resources\KidSessions\Schemas\KidSessionForm;
use App\Filament\Resources\KidSessions\Tables\KidSessionsTable;
use App\Models\KidSession;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KidSessionResource extends Resource
{
    protected static ?string $model = KidSession::class;

    protected static string|BackedEnum|null $navigationIcon = 'hugeicons-kid';

    public static function form(Schema $schema): Schema
    {
        return KidSessionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KidSessionsTable::configure($table);
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
            'index' => ListKidSessions::route('/'),
            'create' => CreateKidSession::route('/create'),
            'edit' => EditKidSession::route('/{record}/edit'),
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
        return __('Kids Sessions');
    }

    public static function getLabel(): string
    {
        return __('Session for Kids');
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create');
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()?->can('edit');
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()?->can('delete');
    }
}
