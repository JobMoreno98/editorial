<?php

namespace App\Filament\Resources\ConfiguracionSitioResource\Pages;

use App\Filament\Resources\ConfiguracionSitioResource;
use App\Models\ConfiguracionSitio;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConfiguracionSitios extends ListRecords
{
    protected static string $resource = ConfiguracionSitioResource::class;

    protected function getHeaderActions(): array
    {
        $site = ConfiguracionSitio::count();
        if($site==0){
            return [
                Actions\CreateAction::make()->label('Agregar'),
            ];
        }
        return [];

    }
}
