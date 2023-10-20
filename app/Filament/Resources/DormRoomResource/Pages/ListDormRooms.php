<?php

namespace App\Filament\Resources\DormRoomResource\Pages;

use App\Filament\Resources\DormRoomResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDormRooms extends ListRecords
{
    protected static string $resource = DormRoomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
