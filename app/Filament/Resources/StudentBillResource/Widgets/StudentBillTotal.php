<?php

namespace App\Filament\Resources\StudentBillResource\Widgets;

use App\Models\StudentBill;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StudentBillTotal extends BaseWidget
{
    protected function getStats(): array
    {
        $sumBills = StudentBill::where('paid', false)->sum('bill');
        $totalBills = StudentBill::where('paid', false)->count();
        $dueDate = StudentBill::where('due_date', '>', today())->count();

        return [
            Stat::make('Tagihan belum lunas', 'Rp ' . number_format($sumBills))
                ->description("Rp $totalBills belum dilunasi"),

            Stat::make('Lewat jatuh tempo', $dueDate)
                ->description("$totalBills santri belum melunasi"),


        ];
    }
}
