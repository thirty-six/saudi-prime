<?php

namespace App\Filament\Resources\Registrations\Schemas;

use App\Enums\RegistrationStatusEnum;
use App\Models\Customer;
use App\Models\Program;
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
                        Program::all()
                            ->mapWithKeys(fn ($program) => [
                                $program->id => $program->category?->getLabel(),
                            ])
                    )
                    ->reactive()
                    ->required()
                    ->afterStateUpdated(fn (callable $set) => $set('sport_id', null))
                    ->dehydrated(false),

                Select::make('sport_id')
                    ->label(__('Sport'))
                    ->options(function (callable $get) {
                        $programId = $get('program_id');

                        if (! $programId) {
                            return [];
                        }

                        return Program::find($programId)
                            ?->sports() // belongsToMany
                            ->pluck('sports.name_ar', 'sports.id')
                            ->toArray() ?? [];
                    })
                    ->searchable()
                    ->required(),
                Select::make('session_ids')
                    ->label(__('Sessions'))
                    ->multiple()
                    ->minItems(2)
                    ->maxItems(2)
                    ->options(function (callable $get) {
                        $programId = $get('program_id');
                        $sportId   = $get('sport_id');

                        if (! $programId || ! $sportId) {
                            return [];
                        }

                        $programSport = \App\Models\ProgramSport::query()
                            ->where('program_id', $programId)
                            ->where('sport_id', $sportId)
                            ->first();

                        if (! $programSport) {
                            return [];
                        }

                        return $programSport
                            ->sessions()
                            ->get()
                            ->mapWithKeys(function ($session) {
                                $label = 
                                    $session->day->getLabel() . ' - ' . $session->start_time;

                                return [$session->id => $label];
                            })
                            ->toArray();
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
