<?php

namespace App\Filament\Resources;

use App\Enum\Gender;
use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Filament\Resources\StudentResource\RelationManagers\QuranMemorizationsRelationManager;
use App\Filament\Resources\StudentResource\RelationManagers\StudentActivitiesRelationManager;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Santri';
    protected static ?string $label = 'Santri';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nisn'),
                TextInput::make('nis'),
                TextInput::make('name')
                    ->required()
                    ->label('Nama Lengkap'),
                Select::make('gender')
                    ->options(Gender::combine(['Ikhwan', 'Akhwat']))
                    ->label('Jenis Kelamin'),
                TextInput::make('birthplace'),
                DatePicker::make('birthdate')
                    ->label('Tanggal Lahir'),
                TextInput::make('previous_school')
                    ->label('Sekolah terakhir'),
                Section::make('Kelas & Asrama')
                    ->columns(3)
                    ->schema([
                        Select::make('class_room_id')
                            ->relationship(
                                'class_room',
                                'level_name',
                                fn (Builder $query) => $query
                                    ->orderBy('level', 'asc')
                                    ->orderBy('name', 'asc')
                            )
                            ->label('Kelas'),
                        Select::make('dorm_room_id')
                            ->searchable()
                            ->relationship(
                                'dorm_room',
                                'name'
                            )
                            ->preload()
                            ->label('Kamar Asrama'),

                        Select::make('cohort_id')
                            ->relationship('cohort', 'year_start')
                            ->label('Angkatan')
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nis')
                    ->searchable()
                    ->label('NIS'),
                TextColumn::make('name')
                    ->searchable()
                    ->label('Nama Lengkap'),
                TextColumn::make('gender_category')
                    ->label('Jenis Kelamin'),
                TextColumn::make('birthplace')
                    ->label('Tempat Lahir'),
                TextColumn::make('birthdate')
                    ->label('Tanggal Lahir'),
                TextColumn::make('class_room.concat')
                    ->label('Kelas'),
                TextColumn::make('dorm_room.name')
                    ->label('Asrama'),
                TextColumn::make('cohort.year_start')
                    ->label('Angkatan'),

            ])
            ->filters([
                SelectFilter::make('gender')
                    ->options(Gender::combine(['Ikhwan', 'Akhwat']))
                    ->label('Jenis Kelamin'),
                SelectFilter::make('class_room')
                    ->relationship('class_room', 'level_name')
                    ->label('Kelas')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            StudentActivitiesRelationManager::class,
            QuranMemorizationsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
