<?php

namespace App\Filament\Resources\QuranMemorizationResource\Pages;

use App\Filament\Resources\QuranMemorizationResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageQuranMemorizations extends ManageRecords
{
    protected static string $resource = QuranMemorizationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
