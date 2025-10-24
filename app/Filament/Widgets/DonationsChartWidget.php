<?php

namespace App\Filament\Widgets;

use App\Models\Donation;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class DonationsChartWidget extends ChartWidget
{
    protected ?string $heading = 'Analisis Donasi (7 Hari Terakhir)';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $donationsData = Donation::query()
            ->where('status', 'paid')
            ->where('created_at', '>=', now()->subDays(6))
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count', 'date');

        $labels = [];
        $data = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $dateString = $date->format('Y-m-d');


            $labels[] = $date->translatedFormat('D, d M');


            $data[] = $donationsData->get($dateString, 0);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Donasi',
                    'data' => $data,
                    'borderColor' => '#16a34a',
                    'tension' => 0.2,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
