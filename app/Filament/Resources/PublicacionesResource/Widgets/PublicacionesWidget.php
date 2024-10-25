<?php

namespace App\Filament\Resources\PublicacionesResource\Widgets;

use App\Models\Descargas;
use App\Models\Publicaciones;
use App\Models\Visitor;
use EightyNine\FilamentAdvancedWidget\AdvancedStatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PublicacionesWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(
                label: 'Publicaciones',
                value: Publicaciones::where('active', 1)->count()
            )->color('primary')->description('Total de publiaciones'),

            Stat::make(
                label: 'Total de Descargas',
                value: Descargas::count()
            )->color('primary')->description('Total de descargas en el sitio'),
            Stat::make(
                label: 'Total de Visitantes',
                value: Visitor::count()
            )->color('primary')->description('Total de visitantes en el sitio'),
            
        ];
    }
}
