<?php

namespace App\Filament\Resources\CategoriaResource\Widgets;

use App\Models\Categoria;
use App\Models\Roles;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class CategoriasOverview extends StatsOverviewWidget
{
    use InteractsWithPageFilters;

    protected static ?int $navigationSort = -5;


    protected function getStats(): array
    {
        $roles = $this->filters['roles'] ?? null;
        //$categorias = Categoria::count();
        return [
            StatsOverviewWidget\Stat::make(
                label: 'Users',
                value: Roles::query()
                    ->when($roles, fn(Builder $query) =>
                    $query->rightJoin('model_has_roles', 'model_has_roles.role_id', '=', 'roles.id')
                        ->where('roles.id', '=', $roles))->count()
            ) //->description('32k increase')
            //->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before)
        ];
    }
    public static function canView(): bool
    {
        return auth()->user()->hasRole('Super Admin');
    }
}
