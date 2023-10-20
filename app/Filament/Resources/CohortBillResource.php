<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CohortBillResource\Pages;
use App\Filament\Resources\CohortBillResource\RelationManagers;
use App\Filament\Resources\CohortBillResource\RelationManagers\StudentBillsRelationManager;
use App\Models\CohortBill;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CohortBillResource extends Resource
{
    protected static ?string $model = CohortBill::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationGroup = 'Keuangan';
    protected static ?string $label = 'Tagihan Per Angkatan';

    public static function form(Form $form): Form
    {
        $month = date('m');
        $year = date('Y');
        return $form
            ->schema([
                Section::make('Informasi')
                    ->schema([
                        Placeholder::make('Perhatian')
                            ->content('Tagihan akan diteruskan kepada santri sesuai dengan angkatan yang diinput pada jam 12 malam. Hapus tagihan ini sebelum jam 12 malam jika ingin membatalkannya, karena tidak dapat mengubah atau menghapus tagihan setelah diteruskan kepada santri.')
                    ])
                    ->hiddenOn('create'),
                Select::make('cohort_id')
                    ->relationship('cohort', 'year_start')
                    ->required()
                    ->label('Angkatan'),
                TextInput::make('title')
                    ->required()
                    ->placeholder("Contoh: SPP Bulan $month $year")
                    ->label('Judul tagihan'),
                TextInput::make('bill')
                    ->numeric()
                    ->required()
                    ->label('Jumlah tagihan'),
                DatePicker::make('due_date')
                    ->required()
                    ->label('Jatuh tempo')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('cohort.year_start')
                    ->label('Angkatan'),
                TextColumn::make('title')
                    ->searchable()
                    ->label('Judul tagihan'),
                TextColumn::make('bill')
                    ->money('idr')
                    ->label('Tagihan'),
                TextColumn::make('due_date')
                    ->label('Jatuh tempo'),
                IconColumn::make('billed')
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark')
                    ->label('Diteruskan')
            ])
            ->filters([
                // StudentBillsRelationManager::class
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            StudentBillsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCohortBills::route('/'),
            'create' => Pages\CreateCohortBill::route('/create'),
            'view' => Pages\ViewCohortBill::route('/{record}'),
            'edit' => Pages\EditCohortBill::route('/{record}/edit'),
        ];
    }
}
