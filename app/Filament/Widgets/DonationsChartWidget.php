<?php

namespace App\Filament\Widgets;

use App\Models\Donation;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class DonationsChartWidget extends ChartWidget
{
    protected ?string $heading = 'Analisis Donasi (7 Hari Terakhir)';

    // Atur urutan agar widget ini tampil di bawah chart proyek
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        // Ambil data donasi yang sudah lunas dalam 7 hari terakhir, dikelompokkan per hari
        $donationsData = Donation::query()
            ->where('status', 'paid')
            ->where('created_at', '>=', now()->subDays(6)) // Mulai dari 6 hari yang lalu hingga hari ini (total 7 hari)
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count', 'date');

        $labels = [];
        $data = [];

        // Buat rentang tanggal untuk 7 hari terakhir
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $dateString = $date->format('Y-m-d');

            // Buat label yang mudah dibaca (Contoh: Sel, 14 Okt)
            $labels[] = $date->translatedFormat('D, d M');

            // Isi data donasi, jika hari itu tidak ada donasi, isikan 0
            $data[] = $donationsData->get($dateString, 0);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Donasi',
                    'data' => $data,
                    'borderColor' => '#16a34a', // Warna hijau
                    'tension' => 0.2, // Membuat garis sedikit melengkung
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
