<?php

namespace App\Filament\Resources\RamadanSessions;

use App\Filament\Resources\RamadanSessions\Pages\CreateRamadanSession;
use App\Filament\Resources\RamadanSessions\Pages\EditRamadanSession;
use App\Filament\Resources\RamadanSessions\Pages\ListRamadanSessions;
use App\Filament\Resources\RamadanSessions\Pages\ViewRamadanSession;
use App\Filament\Resources\RamadanSessions\Schemas\RamadanSessionForm;
use App\Filament\Resources\RamadanSessions\Schemas\RamadanSessionInfolist;
use App\Filament\Resources\RamadanSessions\Tables\RamadanSessionsTable;
use App\Models\RamadanSession;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;

class RamadanSessionResource extends Resource
{
    protected static ?string $model = RamadanSession::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return RamadanSessionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RamadanSessionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RamadanSessionsTable::configure($table);
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
            'index' => ListRamadanSessions::route('/'),
            'create' => CreateRamadanSession::route('/create'),
            'view' => ViewRamadanSession::route('/{record}'),
            'edit' => EditRamadanSession::route('/{record}/edit'),
        ];
    }

    public static function getPluralLabel(): string
    {
        return __('Rmadan_sessions');
    }

    public static function getLabel(): string
    {
        return __('Rmadan_session');
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
