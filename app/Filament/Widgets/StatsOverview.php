<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{

    protected function getStats(): array
    {

        $totalExpense = Transaction::getTotalExpense();
        $totalIncome = Transaction::getTotalIncome();
        $selisih = $totalIncome - $totalExpense;
        return [
            Stat::make('Pemasukan', $totalIncome)
                ->description('Total Pemasukan')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Pengeluaran', $totalExpense)
                ->description('Total Pengeluaran')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make('Selisih', $selisih)
                ->description('Selisih Pemasukan dan Pengeluaran')
                ->descriptionIcon('heroicon-m-arrow-path')
                ->color('primary'),
        ];
    }
}
