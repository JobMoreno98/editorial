<?php

namespace App\Filament\Resources\ActividadesResource\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\ActividadesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditActividades extends EditRecord
{
    protected static string $resource = ActividadesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
    public function getTitle(): string|Htmlable
    {
        $nombre = $this->record->nombre ?? 'Registro';
        return "Editar {$nombre}";
    }
}
