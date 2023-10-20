<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuranMemorizationResource\Pages;
use App\Filament\Resources\QuranMemorizationResource\RelationManagers;
use App\Models\QuranMemorization;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuranMemorizationResource extends Resource
{
    protected static ?string $model = QuranMemorization::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';
    protected static ?string $navigationGroup = 'Pesantren';
    protected static ?string $label = 'Hafalan Al-Qur\'an';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)
                    ->columns(1)
                    ->schema([
                        Select::make('student_id')
                            ->relationship('student', 'nis_name')
                            ->required()
                            ->searchable()
                            ->optionsLimit(5)
                            ->preload()
                            ->label('Santri'),
                    ]),
                TextInput::make('from_surah')
                    ->required()
                    ->minValue(1)
                    ->maxValue(114)
                    ->label('Dari surat'),
                TextInput::make('from_ayah')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(286)
                    ->required()
                    ->label('Dari ayat'),
                TextInput::make('to_surah')
                    ->required()
                    ->minValue(1)
                    ->maxValue(114)
                    ->label('Ke surat'),
                TextInput::make('to_ayah')
                    ->required()
                    ->minValue(1)
                    ->maxValue(286)
                    ->label('Ke ayat'),
                Textarea::make('note')
                    ->label('Catatan')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.nis_name')
                    ->searchable()
                    ->label('Santri'),
                TextColumn::make('from_surah_ayah')
                    ->label('Dari surat/ayat'),
                TextColumn::make('to_surah_ayah')
                    ->label('Ke surat/ayat'),
                TextColumn::make('teacher.name')
                    ->label('Pencatat'),
                TextColumn::make('created_at')
                    ->label('Tanggal')

            ])
            ->filters([
                //
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
            'index' => Pages\ManageQuranMemorizations::route('/'),
        ];
    }
}
