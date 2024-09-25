<?php

namespace App\Filament\Resources\ConfiguracionSitioResource\Pages;

use App\Filament\Resources\ConfiguracionSitioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConfiguracionSitios extends ListRecords
{
    protected static string $resource = ConfiguracionSitioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
