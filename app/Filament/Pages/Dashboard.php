<?php

namespace App\Filament\Pages;

use App\Filament\Resources\CategoriaResource\Widgets\CategoriasOverview;
use App\Filament\Resources\PublicacionesResource\Widgets\PublicacionesChart;
use App\Models\Roles;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Illuminate\Support\Collection;
use Filament\Widgets;
use Filament\Widgets\Widget;

class Dashboard extends \Filament\Pages\Dashboard
{
    use HasFiltersForm;

    protected static string $routePath = '/';
    protected static bool $isLazy = false;


    public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Select::make('roles')->options(fn(Get $get): Collection => Roles::query()->pluck('name', 'id'))->searchable()->preload(),
                    ])->hidden(! auth()->user()->hasRole('Super Admin')),

            ]);
    }

    public function getColumns(): int | string | array
    {
        return 2;
    }
}
