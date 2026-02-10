<?php

namespace App\Filament\Resources\Programs\RelationManagers;

use App\Enums\DaysEnum;
use App\Enums\SessionStatusEnum;
use App\Models\Program;
use App\Models\ProgramSport;
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
use Filament\Tables\Table;

class SessionsRelationManager extends RelationManager
{
    protected static string $relationship = 'adultSessions';

    protected function program(): ?Program
    {
        return $this->getOwnerRecord();
    }

    /* =========================
     |  FORM
     ========================= */
    public function form(Schema $schema): Schema
    {
        return $schema->components([

            Select::make('sport_id')
                ->label(__('Sport'))
                ->relationship('programSport.sport', 'name_ar')
                ->required()
                ->searchable()
                ->preload()
                ->afterStateHydrated(fn ($record, Set $set) =>
                    $set('sport_id', $record?->programSport?->sport_id)
                ),

            Select::make('day')
                ->label(__('Day'))
                ->options(DaysEnum::class)
                ->required(),

            Select::make('status')
                ->label(__('Status'))
                ->options(SessionStatusEnum::class)
                ->default(SessionStatusEnum::Pending)
                ->required(),

            TimePicker::make('start_time')
                ->label(fn () => $this->program()?->category->getLabel())
                ->required()
                ->datalist($this->program()?->category->times())
                ->rule(function ($get) {
                    return function ($attribute, $value, $fail) use ($get) {

                        $program = $this->program();
                        if (! $program) {
                            return;
                        }

                        $query = ProgramSport::where('program_id', $program->id)
                            ->where('sport_id', $get('sport_id'))
                            ->where('day', $get('day'))
                            ->where('start_time', $value);  
                            
                            $editingRecord = $this->getMountedTableActionRecord();

            if ($editingRecord?->programSport) {
                $query->where(
                    'id',
                    '!=',
                    $editingRecord->programSport->id
                );
            }

                        if ($query->exists()) {
                            $fail(__('لا يمكن إضافة حصة مكررة بنفس اليوم والوقت.'));
                        }
                    };
                }),

            DateTimePicker::make('start_at')
                ->label(__('Start at')),

            TextInput::make('capacity')
                ->label(__('Capacity'))
                ->numeric()
                ->required()
                ->default(16),
        ]);
    }

    /* =========================
     |  TABLE
     ========================= */
    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sport.name_ar')->label(__('Sport'))->sortable(),
                TextColumn::make('day')->label(__('Day'))
                    ->formatStateUsing(fn ($state) => $state->getLabel()),
                TextColumn::make('start_time')->label(__('Start time'))->time(),
                TextColumn::make('status')->badge(),
                TextColumn::make('registrations_count')
                    ->counts('registrations')
                    ->label(__('Registrations')),
            ])
            ->headerActions([
                CreateAction::make()
                    ->mutateDataUsing(fn (array $data) => $this->createSession($data)),
            ])
            ->recordActions([
                EditAction::make()
                    ->mutateDataUsing(
                        fn (array $data, $record) => $this->updateSession($data, $record)
                    ),
                DeleteAction::make()
    ->requiresConfirmation()
    ->action(function ($record) {
        // Soft delete program_sport
        if ($record->programSport) {
            $record->programSport->delete();
        }

        // Delete session itself
        $record->delete();
    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
    ->requiresConfirmation()
    ->action(function ($records) {
        foreach ($records as $record) {
            if ($record->programSport) {
                $record->programSport->delete();
            }
            $record->delete();
        }
    }),
                ]),
            ]);
    }

    /* =========================
     |  CREATE
     ========================= */
    protected function createSession(array $data): array
    {
        $program = $this->program();

        $programSport = ProgramSport::create([
            'program_id' => $program->id,
            'sport_id'   => $data['sport_id'],
            'day'        => $data['day'],
            'start_time' => $data['start_time'],
            'status'     => $data['status'],
            'is_visible' => true,
        ]);

        $data['program_sport_id'] = $programSport->id;
        unset($data['sport_id']);

        return $data;
    }

    /* =========================
     |  UPDATE
     ========================= */
    protected function updateSession(array $data, $record): array
    {
        $record->programSport->update([
            'sport_id'   => $data['sport_id'],
            'day'        => $data['day'],
            'start_time' => $data['start_time'],
            'status'     => $data['status'],
        ]);

        unset($data['sport_id']);

        return $data;
    }

    public function getTableHeading(): string
    {
        return __('Sessions');
    }

    public static function getRecordLabel(): string
    {
        return __('Session');
    }
}
