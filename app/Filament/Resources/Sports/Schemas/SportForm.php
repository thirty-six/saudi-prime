<?php

namespace App\Filament\Resources\Sports\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rule;

class SportForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_ar')
                    ->label(__('Name'))
                    ->required(),
                TextInput::make('description_ar')
                    ->label(__('Description'))
                    ->required(),
                Select::make('icon')
                    ->label(__('Icon'))
                    ->options(fn() => collect(config('sporticon.available'))
                        ->flatMap(fn($icon, $key) => [$key => @svg($icon, 'size-6')->toHtml() . ' ' .$key] )
                    )
                    ->required()
                    ->rules(['required', Rule::in(collect(config('sporticon.available'))->keys())])
                    ->searchable()
                    ->allowHtml(),
            ]);
    }
}
