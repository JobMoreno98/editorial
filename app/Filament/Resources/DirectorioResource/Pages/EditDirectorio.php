<?php

namespace App\Filament\Resources\DirectorioResource\Pages;

use App\Filament\Resources\DirectorioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDirectorio extends EditRecord
{
    protected static string $resource = DirectorioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
