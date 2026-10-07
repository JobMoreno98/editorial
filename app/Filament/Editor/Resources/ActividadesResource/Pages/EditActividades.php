<?php

namespace App\Filament\Editor\Resources\ActividadesResource\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Editor\Resources\ActividadesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditActividades extends EditRecord
{
    protected static string $resource = ActividadesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
