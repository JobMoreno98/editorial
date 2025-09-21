<?php

namespace App\Filament\Editor\Resources\ActividadesResource\Pages;

use App\Filament\Editor\Resources\ActividadesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditActividades extends EditRecord
{
    protected static string $resource = ActividadesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
