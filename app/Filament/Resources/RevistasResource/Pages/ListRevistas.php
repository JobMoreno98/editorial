<?php

namespace App\Filament\Resources\RevistasResource\Pages;

use App\Filament\Resources\RevistasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRevistas extends ListRecords
{
    protected static string $resource = RevistasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
