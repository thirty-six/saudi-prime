<?php

namespace App\Filament\Resources\Sports\RelationManagers;

use App\Enums\SportDetailEnum;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DetailsRelationManager extends RelationManager
{
    protected static string $relationship = 'details';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('value_ar')
                    ->label(__('Value'))
                    ->required()
                    ->maxLength(255),
                Select::make('type')
                    ->label(__('Type'))
                    ->options(SportDetailEnum::getOptions())
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('value')
            ->columns([
                TextColumn::make('value')
                    ->label(__('Value'))
                    ->searchable(),
                TextColumn::make('type')
                    ->label(__('Type'))
                    ->badge(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public function getTableHeading(): string
    {
        return __('Details');
    }
    
    public static function getRecordLabel(): string
    {
        return __('Detail');
    }
}
