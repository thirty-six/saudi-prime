<?php

namespace App\Filament\Resources\Faqs;

use App\Filament\Resources\Faqs\Pages\CreateFaq;
use App\Filament\Resources\Faqs\Pages\EditFaq;
use App\Filament\Resources\Faqs\Pages\ListFaqs;
use App\Filament\Resources\Faqs\Schemas\FaqForm;
use App\Filament\Resources\Faqs\Tables\FaqsTable;
use App\Models\Faq;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

   
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $recordTitleAttribute = 'question';

    public static function form(Schema $schema): Schema
    {
        return FaqForm::configure($schema)
        ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return FaqsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListFaqs::route('/'),
            'create' => CreateFaq::route('/create'),
            'edit'   => EditFaq::route('/{record}/edit'),
        ];
    }

    public static function getPluralLabel(): string
    {
        return __('FAQs');
    }

    public static function getLabel(): string
    {
        return __('FAQ');
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create');
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('edit');
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can('delete');
    }
}
