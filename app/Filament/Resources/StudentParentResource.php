<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentParentResource\Pages;
use App\Models\StudentParent;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StudentParentResource extends Resource
{
    protected static ?string $model = StudentParent::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $label = "Wali Santri";
    protected static ?string $navigationGroup = "Santri";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListStudentParents::route('/'),
            'create' => Pages\CreateStudentParent::route('/create'),
            'edit' => Pages\EditStudentParent::route('/{record}/edit'),
        ];
    }
}
