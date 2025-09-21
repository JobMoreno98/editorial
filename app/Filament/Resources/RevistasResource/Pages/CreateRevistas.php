<?php

namespace App\Filament\Resources\RevistasResource\Pages;

use App\Filament\Resources\RevistasResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateRevistas extends CreateRecord
{
    protected static string $resource = RevistasResource::class;
    public function getTitle(): string|Htmlable
    {
        return 'Agregar Difusión';
    }
}
