<?php

namespace App\Filament\Resources\Stadiums;

use App\Filament\Resources\Stadiums\Pages\CreateStadium;
use App\Filament\Resources\Stadiums\Pages\EditStadium;
use App\Filament\Resources\Stadiums\Pages\ListStadiums;
use App\Filament\Resources\Stadiums\Schemas\StadiumForm;
use App\Filament\Resources\Stadiums\Tables\StadiumsTable;
use App\Models\Stadium;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StadiumResource extends Resource
{
    protected static ?string $model = Stadium::class;

    protected static string|BackedEnum|null $navigationIcon = 'bxs-basketball';

    public static function form(Schema $schema): Schema
    {
        return StadiumForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StadiumsTable::configure($table);
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
            'index' => ListStadiums::route('/'),
            'create' => CreateStadium::route('/create'),
            'edit' => EditStadium::route('/{record}/edit'),
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
        return __('Stadiums');
    }

    public static function getLabel(): string
    {
        return __('Stadium');
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
