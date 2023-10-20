<?php

namespace App\Filament\Resources;

use App\Enum\DayName;
use App\Filament\Resources\ScheduleResource\Pages;
use App\Filament\Resources\ScheduleResource\RelationManagers;
use App\Models\Schedule;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $label = 'Jadwal Pelajaran';
    protected static ?string $navigationGroup = 'Kurikulum';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('subject_id')
                    ->relationship('subject', 'level_title')
                    ->required()
                    ->label('Mata Pelajaran'),
                Select::make('class_room_id')
                    ->relationship(
                        'class_room',
                        'level_name',
                        fn (Builder $query) => $query
                            ->orderBy('level', 'asc')
                            ->orderBy('name', 'asc')
                    )
                    ->label('Kelas'),
                Select::make('teacher_id')
                    ->relationship('teacher', 'name')
                    ->required()
                    ->searchable()
                    ->optionsLimit(5)
                    ->preload()
                    ->label('Pengajar'),
                Select::make('day')
                    ->options(DayName::combine())
                    ->required()
                    ->label('Hari'),
                TimePicker::make('time_start')
                    ->label('Jam Mulai')
                    ->format('H:i')
                    ->required(),
                TimePicker::make('time_end')
                    ->label('Jam Selesai')
                    ->format('H:i')
                    ->required(),
                Textarea::make('note')
                    ->placeholder('Misal: di Masjid')
                    ->label('Catatan')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('day')
                    ->label('Hari'),
                TextColumn::make('time_start')
                    ->label('Mulai'),
                TextColumn::make('time_end')
                    ->label('Selesai'),
                TextColumn::make('class_room.concat')
                    ->label('Kelas'),
                TextColumn::make('subject.title')
                    ->label('Mapel'),
                TextColumn::make('teacher.name')
                    ->label('Pengajar'),
            ])
            ->filters([
                SelectFilter::make('day')
                    ->options(DayName::combine())
                    ->label('Hari'),
                SelectFilter::make('class_room_id')
                    ->relationship(
                        'class_room',
                        'level_name',
                        fn (Builder $query) => $query
                            ->orderBy('level', 'asc')
                            ->orderBy('name', 'asc')
                    )
                    ->label('Kelas'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSchedules::route('/'),
        ];
    }
}
