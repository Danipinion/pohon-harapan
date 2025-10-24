<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ProjectsChart extends ChartWidget
{
    protected ?string $heading = 'Distribusi Status Proyek';
    protected static ?int $sort = 2;
    protected string $color = 'success';

    protected function getData(): array
    {
        $projectStatusCounts = Project::query()
            ->select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->all();

        $statuses = ['active', 'completed', 'pending'];
        $data = [];
        foreach ($statuses as $status) {
            $data[] = $projectStatusCounts[$status] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Proyek',
                    'data' => $data,
                    'backgroundColor' => [
                        '#22c55e',
                        '#1f2937',
                        '#f59e0b',
                    ],
                ],
            ],
            'labels' => ['Aktif', 'Selesai', 'Mendatang'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
