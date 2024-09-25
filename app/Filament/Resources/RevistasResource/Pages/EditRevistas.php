<?php

namespace App\Filament\Resources\RevistasResource\Pages;

use App\Filament\Resources\RevistasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRevistas extends EditRecord
{
    protected static string $resource = RevistasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
