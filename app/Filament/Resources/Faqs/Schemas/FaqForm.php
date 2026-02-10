<?php

namespace App\Filament\Resources\Faqs\Schemas;


use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('question')
                ->extraAttributes([
                'style' => 'max-width: 60%;'
            ])
                    ->label(__('question'))
                    ->required(),
                RichEditor::make('answer')
                ->extraAttributes([
                'style' => 'max-width: 60%;'
            ])
                    ->label(__('answer'))
                    ->required(),
                    Toggle::make('is_active')
                    ->label(__('is_active'))
                    ->default(true),
            ]);
    }
}
