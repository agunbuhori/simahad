<?php

namespace App\Filament\Resources;

use App\Enum\ActivityType;
use App\Filament\Resources\ActivityResource\Pages;
use App\Filament\Resources\ActivityResource\RelationManagers;
use App\Models\Activity;
use Filament\Forms;
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

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';
    protected static ?string $label = 'Aktivitas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->label('Judul Aktivitas'),
                Select::make('type')
                    ->options(ActivityType::combine())
                    ->required()
                    ->native(false)
                    ->label('Jenis'),
                TextInput::make('point')
                    ->numeric()
                    ->required()
                    ->label('Bobot')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->label('Judul Aktivitas'),
                TextColumn::make('type')
                    ->sortable()
                    ->label('Jenis'),
                TextColumn::make('point')
                    ->label('Bobot'),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options(ActivityType::combine())
                    ->label('Jenis')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('type', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageActivities::route('/'),
        ];
    }
}
