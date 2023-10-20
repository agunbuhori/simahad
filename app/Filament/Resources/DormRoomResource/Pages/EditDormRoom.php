<?php

namespace App\Filament\Resources\DormRoomResource\Pages;

use App\Filament\Resources\DormRoomResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDormRoom extends EditRecord
{
    protected static string $resource = DormRoomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
