<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentActivityResource\Pages;
use App\Filament\Resources\StudentActivityResource\RelationManagers;
use App\Models\StudentActivity;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StudentActivityResource extends Resource
{
    protected static ?string $model = StudentActivity::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $label = 'Aktivitas Santri';
    protected static ?string $navigationGroup = 'Pesantren';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('student_id')
                    ->relationship('student', 'nis_name')
                    ->searchable()
                    ->optionsLimit(5)
                    ->preload()
                    ->required()
                    ->label('Siswa'),

                Select::make('activity_id')
                    ->relationship('activity', 'type_name')
                    ->searchable()
                    ->optionsLimit(5)
                    ->preload()
                    ->required()
                    ->label('Aktivitas'),

                DateTimePicker::make('time')
                    ->default(now())
                    ->label('Waktu kejadian'),

                Textarea::make('description')
                    ->placeholder('Misal: merokok di dalam area asrama')
                    ->label('Keterangan'),

                Repeater::make('documentation')
                    ->schema([
                        FileUpload::make('photo')
                            ->image(),
                    ])
                    ->label('Dokumentasi'),

                Toggle::make('notify_parent')
                    ->default(true)
                    ->label('Beritahu orang tua / wali')


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.name')
                    ->searchable()
                    ->label('Siswa'),
                TextColumn::make('student.class_room.concat')
                    ->searchable()
                    ->label('Kelas'),
                TextColumn::make('activity.title')
                    ->label('Aktivitas'),
                TextColumn::make('activity.type')
                    ->label('Jenis'),

            ])
            ->filters([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudentActivities::route('/'),
            'create' => Pages\CreateStudentActivity::route('/create'),
            'edit' => Pages\EditStudentActivity::route('/{record}/edit'),
        ];
    }
}
