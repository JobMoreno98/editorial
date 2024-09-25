<?php

namespace App\Filament\Resources\ConfiguracionSitioResource\Pages;

use App\Filament\Resources\ConfiguracionSitioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConfiguracionSitio extends EditRecord
{
    protected static string $resource = ConfiguracionSitioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
