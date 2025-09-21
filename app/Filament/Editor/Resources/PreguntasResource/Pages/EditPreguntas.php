<?php

namespace App\Filament\Editor\Resources\PreguntasResource\Pages;

use App\Filament\Editor\Resources\PreguntasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPreguntas extends EditRecord
{
    protected static string $resource = PreguntasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
