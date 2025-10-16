<?php

namespace App\Filament\Widgets;

use App\Models\Donation;
use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1; // Menempatkan widget ini di paling atas

    protected function getStats(): array
    {
        // Menghitung total pohon dari donasi yang sudah lunas
        $totalTrees = Donation::where('status', 'paid')->sum('tree_quantity');

        // Menghitung total dana terkumpul
        $totalFunds = Donation::where('status', 'paid')->sum('amount');

        // Menghitung jumlah proyek aktif
        $activeProjects = Project::where('status', 'active')->count();

        return [
            Stat::make('Total Pohon Tertanam', number_format($totalTrees))
                ->description('Dari semua donasi terverifikasi')
                ->descriptionIcon('heroicon-m-sparkles')
                ->color('success'),

            Stat::make('Dana Terkumpul', 'Rp ' . number_format($totalFunds))
                ->description('Total dana donasi yang masuk')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make('Proyek Sedang Berjalan', $activeProjects)
                ->description('Proyek yang aktif menerima donasi')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('info'),
        ];
    }
}
