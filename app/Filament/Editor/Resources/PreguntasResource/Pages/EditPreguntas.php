<?php

namespace App\Filament\Editor\Resources\PreguntasResource\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Editor\Resources\PreguntasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPreguntas extends EditRecord
{
    protected static string $resource = PreguntasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
