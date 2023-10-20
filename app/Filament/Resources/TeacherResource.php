<?php

namespace App\Filament\Resources;

use App\Enum\Gender;
use App\Filament\Resources\TeacherResource\Pages;
use App\Models\Teacher;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $label = "Staff & Guru";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Nama Lengkap'),
                Select::make('gender')
                    ->options(Gender::combine(['Ikhwan', 'Akhwat']))
                    ->required()
                    ->label('Jenis Kelamin'),
                DatePicker::make('birthdate')
                    ->required()
                    ->label('Tanggal Lahir'),
                TextInput::make('phone_number')
                    ->label('No. Telepon'),
                Select::make('user_id')
                    ->relationship(
                        name: 'user',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn (Builder $query) => $query
                            ->where('boarding_school_id', Auth::user()->boarding_school_id)
                            ->doesntHave('teacher')
                    )
                    ->searchable()
                    ->hiddenOn('edit')
                    ->label('Pengguna')
                    ->createOptionForm([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->label('Username'),
                                TextInput::make('email')
                                    ->required()
                                    ->email(),
                                TextInput::make('password')
                                    ->default(simple_password(6))
                                    ->required(),
                            ])
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label('Nama Lengkap'),
                TextColumn::make('gender')
                    ->label('Jenis Kelamin'),
                TextColumn::make('phone_number')
                    ->label('No. Telepon'),
                TextColumn::make('user.name')
                    ->label('Username'),
                TextColumn::make('user.email')
                    ->label('Email'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeacher::route('/create'),
            'edit' => Pages\EditTeacher::route('/{record}/edit'),
        ];
    }
}
