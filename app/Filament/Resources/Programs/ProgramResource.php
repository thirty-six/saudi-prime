<?php

namespace App\Filament\Resources\Programs;

use App\Filament\Resources\Programs\Pages\EditProgram;
use App\Filament\Resources\Programs\Pages\ListPrograms;
use App\Filament\Resources\Programs\RelationManagers\SessionsRelationManager;
use App\Filament\Resources\Programs\Schemas\ProgramForm;
use App\Filament\Resources\Programs\Tables\ProgramsTable;
use App\Models\Program;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'category';

    public static function form(Schema $schema): Schema
    {
        return ProgramForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProgramsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            SessionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPrograms::route('/'),
            'edit' => EditProgram::route('/{record}/edit'),
        ];
    }
    public static function getRecordTitle(?Model $record): ?string
    {
        if (!$record) return null;

        // If category is enum, call label()
        if (method_exists($record->category, 'getLabel')) {
            return $record->category->getLabel();
        }

        // If category is plain string, translate using lang
        return __("program.{$record->category}");
    }


    public static function getPluralLabel(): string
    {
        return __('Programs');
    }

    public static function getLabel(): string
    {
        return __('Program');
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()?->can('edit');
    }
}
