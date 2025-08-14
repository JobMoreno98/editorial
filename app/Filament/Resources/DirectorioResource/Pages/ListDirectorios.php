<?php

namespace App\Filament\Resources\DirectorioResource\Pages;

use App\Filament\Resources\DirectorioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDirectorios extends ListRecords
{
    protected static string $resource = DirectorioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Agregar'),
        ];
    }
}
