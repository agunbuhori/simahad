<?php

namespace App\Filament\Resources;

use App\Enum\ClassLevel;
use App\Filament\Resources\ClassRoomResource\Pages;
use App\Filament\Resources\ClassRoomResource\RelationManagers\StudentsRelationManager;
use App\Models\ClassRoom;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ClassRoomResource extends Resource
{
    protected static ?string $model = ClassRoom::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationGroup = "Kurikulum";
    protected static ?string $label = "Kelas";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('level')
                    ->options(ClassLevel::combine())
                    ->required()
                    ->label('Tingkat'),
                TextInput::make('name')
                    ->required()
                    ->placeholder('Misal A, B, C, ..')
                    ->label('Nama Kelas'),
                Select::make('teacher_id')
                    ->relationship('teacher', 'name')
                    ->searchable()
                    ->preload()
                    ->optionsLimit(5)
                    ->label('Wali Kelas')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('concat')
                    ->label('Nama'),
                TextColumn::make('students_count')
                    ->counts('students')
                    ->label('Jumlah siswa'),
                TextColumn::make('teacher.name')
                    ->label('Wali Kelas'),
            ])
            ->filters([
                SelectFilter::make('level')
                    ->options(ClassLevel::combine())
                    ->label('Tingkat')
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
            StudentsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClassRooms::route('/'),
            'create' => Pages\CreateClassRoom::route('/create'),
            'edit' => Pages\EditClassRoom::route('/{record}/edit'),
        ];
    }
}
