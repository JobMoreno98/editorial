<?php

namespace App\Filament\Pages;

use App\Models\Directorio;
use Filament\Pages\Page;

class Organigrama extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.organigrama';
    public $directivos;

    public static function getNavigationGroup(): ?string
    {
        return __('Directory');
    }   
    public function mount(): void
    {
        $this->directivos = Directorio::all()->map(function ($directivos) {
            return [
                'id' => $directivos->id,
                'pid' => $directivos->id_padre,
                'puesto' => $directivos->puesto,
                "nombre" => $directivos->nombre,
                "img" => $directivos->foto
            ];
        });
    }
}
