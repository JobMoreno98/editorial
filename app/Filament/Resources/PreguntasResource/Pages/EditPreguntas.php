<?php

namespace App\Filament\Resources\PreguntasResource\Pages;

use App\Filament\Resources\PreguntasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditPreguntas extends EditRecord
{
    protected static string $resource = PreguntasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    public function getTitle(): string|Htmlable
    {
        $nombre = $this->record->pregunta ?? 'Registro';
        return "Editar {$nombre}";
    }
}
