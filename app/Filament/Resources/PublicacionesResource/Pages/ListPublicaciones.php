<?php

namespace App\Filament\Resources\PublicacionesResource\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\PublicacionesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPublicaciones extends ListRecords
{
    protected static string $resource = PublicacionesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
