<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),
                TextInput::make('email')
                    ->label(__('Email address'))
                    ->email()
                    ->required(),
                // DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->label(__('Password'))
                    ->dehydrated(fn ($state) => filled($state)) // Only send the field to the database if user typed something.
                    ->required(fn ($record) => $record === null) // Required if no record exists
                    ->nullable(fn ($record) => $record !== null) // Nullable if editin
                    ->password(),
                Select::make('roles')
                    ->label('الأدوار')
                    ->multiple()
                    ->relationship('roles', 'name')
                    ->preload()
                    ->required(),
            ]);

    }
}
