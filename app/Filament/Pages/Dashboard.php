<?php

namespace App\Filament\Pages;

use App\Filament\Resources\CategoriaResource\Widgets\CategoriasOverview;
use App\Filament\Resources\PublicacionesResource\Widgets\DescargasOverview;
use App\Filament\Resources\PublicacionesResource\Widgets\DescargasWidget;
use App\Filament\Resources\PublicacionesResource\Widgets\PublicacionesChart;
use App\Filament\Resources\PublicacionesResource\Widgets\PublicacionesWidget;
use App\Models\Descargas;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;


class Dashboard extends \Filament\Pages\Dashboard
{
    use HasFiltersForm;

    protected static string $routePath = '/';

    protected static bool $isLazy = false;


    public function getWidgets(): array
    {
        return [
            PublicacionesWidget::class,
            PublicacionesChart::class,
        ];
    }
    public function getColumns(): int | string | array
    {
        return 2;
    }
}
