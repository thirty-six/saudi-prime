<?php

namespace App\Filament\Resources\Programs\RelationManagers;

use App\Enums\DaysEnum;
use App\Enums\SessionStatusEnum;
use App\Models\Program;
use App\Models\ProgramSport;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class SessionsRelationManager extends RelationManager
{
    protected static string $relationship = 'adultSessions';
    protected Program $program;

    protected function program(): ?Program
    {
        return $this->getOwnerRecord();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('sport_id')
                    ->label(__('Sport'))
                    ->relationship(
                        name: 'programSport.sport',
                        titleAttribute: 'name_ar'
                    )
                    ->searchable()
                    ->required()
                    // hydrate old value on edit
                    ->afterStateHydrated(function ($record, Set $set) {
                        $set('sport_id', $record?->programSport?->sport_id);
                    }),
                Select::make('day')
                    ->label(__('Day'))
                    ->options(DaysEnum::class)
                    ->required(),
                Select::make('status')
                    ->label(__('Status'))
                    ->options(SessionStatusEnum::class)
                    ->required()
                    ->default(SessionStatusEnum::Pending),
                TimePicker::make('start_time')
                    ->label(fn () => $this->program()?->category->getLabel())
                    ->required()
                    ->datalist($this->program()?->category->times())
                    ->rule($this->validateTimeForCategory(...)),
                DateTimePicker::make('start_at')
                    ->label(__('Start at')),
                TextInput::make('capacity')
                    ->label(__('Capacity'))
                    ->required()
                    ->numeric()
                    ->default(16),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]))
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('sport.name_ar')
                    ->label(__('Sport'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('registrations_count')
                    ->counts('registrations')
                    ->label(__('Registrations'))
                    ->sortable(),
                TextColumn::make('day')
                    ->label(__('Day'))
                    ->formatStateUsing(fn ($state) => $state->getLabel())
                    ->searchable(),
                TextColumn::make('status')
                    ->label(__('Status'))
                    ->badge()
                    ->searchable(),
                TextColumn::make('start_time')
                    ->label(__('Start time'))
                    ->time()
                    ->sortable(),
                TextColumn::make('start_at')
                    ->label(__('Start at'))
                    ->date()
                    ->sortable(),
            ])
            ->headerActions([
                CreateAction::make()
                    ->mutateDataUsing(function (array $data) {
                        return $this->attachProgramSport($data);
                    }),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ActionGroup::make(
                    collect(SessionStatusEnum::cases())
                    ->map(fn (SessionStatusEnum $target) =>
                        Action::make($target->value)
                            ->label($target->getLabel())
                            ->color($target->getColor())
                            ->visible(fn ($record) =>
                                $record && $record->status->canTransitionTo($target)
                            )
                            ->requiresConfirmation(
                                $target->requiresConfirmation()
                            )
                            ->action(function ($record) use ($target) {
                                $payload = ['status' => $target];

                                if ($target->requiresStartAt()) {
                                    $payload['start_at'] =
                                        today()->next($record->day->carbonKey());
                                }

                                $record->update($payload);
                            })
                    )
                    ->all())
                ->label(__('Change') . ' ' . __('Status'))
                ->button(),
                DeleteAction::make(),
                EditAction::make()
                    ->mutateDataUsing(function (array $data) {
                        return $this->attachProgramSport($data);
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public function getTableHeading(): string
    {
        return __('Sessions');
    }
    
    public static function getRecordLabel(): string
    {
        return __('Session');
    }

    protected function validateTimeForCategory(): \Closure
    {
        $program = $this->program();

        return function (string $attribute, $value, \Closure $fail) use ($program) {
            $category = $program?->category;

            if (! $category) {
                return;
            }

            if (! in_array(
                (new Carbon($value))->format('H:i'),
                $category->times(),
                true
            )) {
                $fail(__('This time is not allowed for this program category.'));
            }
        };
    }

    protected function attachProgramSport(array $data)//: Model
    {
        $program = $this->program();

        $programSport = ProgramSport::firstOrCreate([
            'program_id' => $program->id,
            'sport_id'   => $data['sport_id'],
        ]);

        // Replace intent with persistence
        $data['program_sport_id'] = $programSport->id;

        // Remove virtual field
        unset($data['sport_id']);

        return $data;
    }


}
