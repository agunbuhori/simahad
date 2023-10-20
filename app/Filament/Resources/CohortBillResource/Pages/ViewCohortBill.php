<?php

namespace App\Filament\Resources\CohortBillResource\Pages;

use App\Filament\Resources\CohortBillResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCohortBill extends ViewRecord
{
    protected static string $resource = CohortBillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
