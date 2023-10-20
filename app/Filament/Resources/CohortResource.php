<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CohortResource\Pages;
use App\Models\Cohort;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CohortResource extends Resource
{
    protected static ?string $model = Cohort::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $label = "Tahun Akademik";
    protected static ?string $navigationGroup = "Kurikulum";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('year_start')
                    ->required()
                    ->label('Tahun Mulai'),
                TextInput::make('year_end')
                    ->required()
                    ->label('Tahun Selesai'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('year_start')
                    ->label('Tahun Mulai'),
                TextColumn::make('year_end')
                    ->label('Tahun Selesai'),
                TextColumn::make('students_count')
                    ->counts('students')
                    ->label('Jumlah Siswa')
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
            'index' => Pages\ManageCohorts::route('/'),
        ];
    }
}
