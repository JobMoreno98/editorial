<?php

namespace App\Filament\Pages;

use App\Filament\Resources\CategoriaResource\Widgets\CategoriasOverview;
use App\Filament\Resources\PublicacionesResource\Widgets\PublicacionesChart;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;


class Dashboard extends \Filament\Pages\Dashboard
{
    use HasFiltersForm;

    protected static string $routePath = '/';
    protected static bool $isLazy = false;
    protected int | string | array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];

    public function getWidgets(): array
    {
        return [
            PublicacionesChart::class,
            CategoriasOverview::class,
        ];
    }
    public function getColumns(): int | string | array
    {
        return 3;
    }
}
