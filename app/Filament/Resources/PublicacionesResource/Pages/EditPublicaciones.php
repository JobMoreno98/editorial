<?php

namespace App\Filament\Resources\PublicacionesResource\Pages;

use App\Filament\Resources\PublicacionesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditPublicaciones extends EditRecord
{
    protected static string $resource = PublicacionesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
        public function getTitle(): string|Htmlable
    {
        $nombre = $this->record->nombre ?? 'Registro';
        return "Editar {$nombre}";
    }
}
