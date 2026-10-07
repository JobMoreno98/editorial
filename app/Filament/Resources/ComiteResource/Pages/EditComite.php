<?php

namespace App\Filament\Resources\ComiteResource\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\ComiteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditComite extends EditRecord
{
    protected static string $resource = ComiteResource::class;

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
