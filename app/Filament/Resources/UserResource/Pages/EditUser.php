<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Silber\Bouncer\BouncerFacade;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $user = User::find($data['id']);
        $data['roles'] = $user->getRoles();
        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $user = User::find($record->id);

        BouncerFacade::sync($user)->roles($data['roles']);

        return $record;
    }
}
