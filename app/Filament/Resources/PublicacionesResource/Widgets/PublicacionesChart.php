<?php

namespace App\Filament\Resources\PublicacionesResource\Widgets;

use App\Models\Descargas;
use App\Models\Publicaciones;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class PublicacionesChart extends ChartWidget
{
    protected static ?string $heading = 'Publicaciones';


    protected function getData(): array
    {
        $data = Trend::model(Descargas::class)
            ->dateColumn('created_at')
            ->between(
                start: now()->startOfWeek(),
                end: now()->endOfWeek(),
            )
            ->perDay()
            ->count();


        return [
            'datasets' => [
                [
                    'label' => 'Descargas',
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn(TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    public function getDescription(): ?string
    {
        return 'Número de descargas.';
    }
}
