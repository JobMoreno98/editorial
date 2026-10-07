<?php

namespace App\Filament\Resources\DirectorioResource\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\DirectorioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditDirectorio extends EditRecord
{
    protected static string $resource = DirectorioResource::class;

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
