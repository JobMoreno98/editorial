<?php

namespace App\Filament\Resources\DirectorioResource\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\DirectorioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDirectorios extends ListRecords
{
    protected static string $resource = DirectorioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Agregar'),
        ];
    }
}
