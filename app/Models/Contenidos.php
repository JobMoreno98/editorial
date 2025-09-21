<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Contenidos extends Model
{
    use Searchable;
    use HasFactory;
    protected $table = 'contenidos';
    public $timestamps = false;

    protected function enlace(): Attribute
    {
        return Attribute::make(
            get: fn() => match ($this->tipo_contenido) {
                'publicacion' => route('ver-publicacion', $this->slug),
                'actividad' => route('ver-actividad', ['tipo' => $this->tipo, 'slug' => $this->slug]),
                default => null,
            }

        );
    }
}
