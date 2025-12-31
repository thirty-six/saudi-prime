<?php

namespace App\Filament\Resources\Registrations\Schemas;

use App\Enums\RegistrationStatusEnum;
use App\Models\Customer;
use App\Models\Program;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class RegistrationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
            Select::make('customer_id')
                ->label(__('Customer').' ('.__('Phone').')')
                ->relationship('customer', 'phone')
                ->searchable()
                ->preload(false) // if customers table is large
                ->required()

                // creat customer if not found
                ->createOptionForm([
                    TextInput::make('name')
                        ->label(__('Name'))
                        ->required(),

                    TextInput::make('phone')
                        ->label(__('Phone'))
                        ->required()
                        ->unique(Customer::class, 'phone'),
                        
                    TextInput::make('university_id')
                        ->label(__('University ID'))
                        ->nullable()
                        ->unique(Customer::class, 'university_id'),
                ])
                // text shows after creation
                ->createOptionUsing(function (array $data) {
                    return Customer::create($data)->getKey();
                }),

                Select::make('program_id')
                    ->label(__('Program'))
                    ->options(
                        Program::all()->select(['id','category'])
                        ->mapWithKeys(fn ($program) => [
                            $program['id'] => $program['category']?->getLabel(),
                        ]))
                    ->reactive()
                    ->required()
                    ->afterStateUpdated(function (callable $set) {
                        $set('sport_id', null);
                        $set('sessions', []);
                    })
                    ->dehydrated(false),
                Select::make('sport_id')
                    ->label(__('Sport'))
                    ->options(function (callable $get) {
                        $query = \App\Models\Sport::query();
                        $program_id = $get('program_id');
                        if ($program_id) {
                            $query->where('program_id', $program_id);
                        }
                        return $query->get()->pluck('name_ar', 'id')->toArray();
                    })
                    ->searchable()
                    ->required(),
                Select::make('status')
                    ->label(__('Status'))
                    ->options(RegistrationStatusEnum::class)
                    ->default('pending')
                    ->required(),
                TextInput::make('price')
                    ->label(__('Price'))
                    ->numeric()
                    ->prefix(config('app.currency_symbol')),
                Toggle::make('accepted_terms')
                    ->label(__('Accepted Terms'))
                    ->default(true)
                    ->required(),
            ]);
    }
}
