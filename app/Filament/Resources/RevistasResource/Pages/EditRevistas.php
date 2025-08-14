<?php

namespace App\Filament\Resources\RevistasResource\Pages;

use App\Filament\Resources\RevistasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditRevistas extends EditRecord
{
    protected static string $resource = RevistasResource::class;

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
