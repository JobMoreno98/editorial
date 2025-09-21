<?php

namespace App\Filament\Resources\ConfiguracionSitioResource\Pages;

use App\Filament\Resources\ConfiguracionSitioResource;
use App\Models\ConfiguracionSitio;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditConfiguracionSitio extends EditRecord
{
    protected static string $resource = ConfiguracionSitioResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
    public function getTitle(): string|Htmlable
    {
        return "Editar Configuración del Sitio";
    }
}
