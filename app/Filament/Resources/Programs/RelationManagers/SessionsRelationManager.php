<?php

namespace App\Filament\Resources\Programs\RelationManagers;

use App\Enums\DaysEnum;
use App\Enums\SessionStatusEnum;
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
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SessionsRelationManager extends RelationManager
{
    protected static string $relationship = 'sessions';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('sport_id')
                    ->label(__('Sport'))
                    ->relationship('sport', 'name_ar')
                    ->searchable()
                    ->required(),
                Select::make('day')
                    ->label(__('Day'))
                    ->options(DaysEnum::getOptions())
                    ->required(),
                Select::make('status')
                    ->label(__('Status'))
                    ->options(SessionStatusEnum::getOptions())
                    ->required()
                    ->default(SessionStatusEnum::Pending),
                TimePicker::make('start_time')
                    ->label(fn () => __(ucfirst($this->getOwnerRecord()?->category->name) . ' Time'))
                    ->required()
                    ->datalist(fn () => $this->getOwnerRecord()?->category->times())
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
                CreateAction::make(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ActionGroup::make([
                    // Open session
                    Action::make('open')
                        ->label(SessionStatusEnum::Open->getLabel())
                        ->visible(fn ($record) => $record->status === SessionStatusEnum::Pending)
                        ->action(fn ($record) => $record->update(['status' => SessionStatusEnum::Open])),
    
                    // Mark full
                    Action::make('full')
                        ->label(SessionStatusEnum::Full->getLabel())
                        ->visible(fn ($record) => $record->status === SessionStatusEnum::Open)
                        ->action(fn ($record) => $record->update(['status' => SessionStatusEnum::Full])),
    
                    // Start Session
                    Action::make('start')
                        ->label(SessionStatusEnum::Started->getLabel())
                        ->visible(fn ($record) => in_array($record->status, [
                            SessionStatusEnum::Open,
                            SessionStatusEnum::Full,
                        ]))
                        ->action(function ($record) {
                            $record->update([
                                'status' => SessionStatusEnum::Started,
                                'start_at' => today()->next($record->day->carbonKey()),
                            ]);
                        }),
    
                    // Complete
                    Action::make('complete')
                        ->label(SessionStatusEnum::Completed->getLabel())
                        ->visible(fn ($record) => $record->status === SessionStatusEnum::Started)
                        ->action(fn ($record) => $record->update(['status' => SessionStatusEnum::Completed])),
    
                    // Cancel
                    Action::make('cancel')
                        ->label(SessionStatusEnum::Cancelled->getLabel())
                        ->color('danger')
                        ->requiresConfirmation()
                        ->visible(fn ($record) => ($record->status !== SessionStatusEnum::Completed && $record->status !== SessionStatusEnum::Cancelled))
                        ->action(fn ($record) => $record->update(['status' => SessionStatusEnum::Cancelled])),
                    
                ])->label(__('Change') . ' ' . __('Status')),

                DeleteAction::make(),
                EditAction::make(),
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
    protected function validateTimeForCategory()
    {
        return function ($attribute, $value, $fail) {
            $category = $this->getOwnerRecord()?->category;

            if ($category && !in_array(Carbon::parse($value)->format('H:i'), $category->times())) {
                $fail(__('This time is not allowed for this program category.'));
            }
        };
    }

}
