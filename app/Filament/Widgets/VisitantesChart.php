<?php

namespace App\Filament\Widgets;

use App\Models\Visitor;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class VisitantesChart extends ChartWidget
{
    protected static ?string $heading = 'Visitantes';

    protected function getData(): array
    {
        $data = Trend::model(Visitor::class)
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
                    'label' => 'Visitantes',
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
        return 'Número de visitantes en la última semana.';
    }
}
