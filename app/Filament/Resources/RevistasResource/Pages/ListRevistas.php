<?php

namespace App\Filament\Resources\RevistasResource\Pages;

use App\Filament\Resources\RevistasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListRevistas extends ListRecords
{
    protected static string $resource = RevistasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Agregar'),
        ];
    }
        public function getTitle(): string|Htmlable
    {
        return 'Difusión';
    }
}
