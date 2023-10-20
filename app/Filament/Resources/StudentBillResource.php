<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentBillResource\Pages;
use App\Models\StudentBill;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class StudentBillResource extends Resource
{
    protected static ?string $model = StudentBill::class;

    protected static ?string $navigationIcon = 'heroicon-o-receipt-refund';
    protected static ?string $navigationGroup = 'Keuangan';
    protected static ?string $label = 'Tagihan Per Santri';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('student_id')
                    ->relationship('student', 'nis_name')
                    ->searchable()
                    ->required()
                    ->preload()
                    ->label('Santri'),
                TextInput::make('title')
                    ->required()
                    ->label('Judul tagihan'),
                TextInput::make('bill')
                    ->numeric()
                    ->required()
                    ->label('Jumlah tagihan'),
                DatePicker::make('due_date')
                    ->minDate(today())
                    ->default(today())
                    ->required()
                    ->label('Jatuh tempo'),
                Toggle::make('paid')
                    ->disabled(fn (string $operation) => $operation !== 'edit')
                    ->label('Sudah lunas')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.nis_name')
                    ->searchable()
                    ->label('Santri'),
                TextColumn::make('title')
                    ->label('Judul tagihan'),
                TextColumn::make('bill')
                    ->money('idr')
                    ->label('Tagihan'),
                TextColumn::make('due_date')
                    ->label('Jatuh tempo'),
                IconColumn::make('paid')
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark')
                    ->label('Lunas')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('student_bills.created_at', 'desc');
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
            'index' => Pages\ListStudentBills::route('/'),
            'create' => Pages\CreateStudentBill::route('/create'),
            'view' => Pages\ViewStudentBill::route('/{record}'),
            'edit' => Pages\EditStudentBill::route('/{record}/edit'),
        ];
    }
}
