<?php

namespace App\Filament\Resources\CohortBillResource\Pages;

use App\Filament\Resources\CohortBillResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCohortBills extends ListRecords
{
    protected static string $resource = CohortBillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Buat Tagihan Baru'),
        ];
    }
}
