<?php

namespace App\Filament\Resources\CohortBillResource\Pages;

use App\Filament\Resources\CohortBillResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCohortBill extends EditRecord
{
    protected static string $resource = CohortBillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
