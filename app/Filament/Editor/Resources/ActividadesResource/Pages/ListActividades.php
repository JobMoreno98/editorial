<?php

namespace App\Filament\Editor\Resources\ActividadesResource\Pages;

use App\Filament\Editor\Resources\ActividadesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListActividades extends ListRecords
{
    protected static string $resource = ActividadesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Agregar'),
        ];
    }
}
