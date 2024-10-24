<?php

namespace App\Filament\Resources\CategoriaResource\Widgets;

use App\Models\Publicaciones;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CategoriasOverview extends BaseWidget
{

    protected static ?string $pollingInterval = '5s';

    protected function getStats(): array
    {
        //$categorias = Categoria::count();
        return [
            Stat::make(
                label: 'Publicaciones',
                value: Publicaciones::where('active', 1)->count()
            )->color('success')->description('Total de publiaciones') //->description('32k increase')
            //->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before)
        ];
    }
    public static function canView(): bool
    {
        return auth()->user()->hasRole('Super Admin');
    }
}
