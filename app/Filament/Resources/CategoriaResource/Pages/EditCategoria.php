<?php

namespace App\Filament\Resources\CategoriaResource\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\CategoriaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditCategoria extends EditRecord
{
    protected static string $resource = CategoriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
    public function getTitle(): string|Htmlable
    {
        $nombre = $this->record->name ?? 'Registro';
        return "Editar {$nombre}";
    }
}
