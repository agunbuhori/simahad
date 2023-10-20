<?php

namespace App\Filament\Resources;

use App\Enum\Gender;
use App\Filament\Resources\DormRoomResource\Pages;
use App\Filament\Resources\DormRoomResource\RelationManagers;
use App\Filament\Resources\DormRoomResource\RelationManagers\StudentsRelationManager;
use App\Models\DormRoom;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DormRoomResource extends Resource
{
    protected static ?string $model = DormRoom::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationGroup = 'Pesantren';
    protected static ?string $label = 'Kamar Asrama';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Nama Kamar'),
                Select::make('gender')
                    ->options(Gender::combine(['Ikhwan', 'Akhwat']))
                    ->required()
                    ->label('Jenis Kelamin'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('gender'),
                TextColumn::make('students_count')
                    ->counts('students'),
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
            StudentsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDormRooms::route('/'),
            'create' => Pages\CreateDormRoom::route('/create'),
            'edit' => Pages\EditDormRoom::route('/{record}/edit'),
        ];
    }
}
