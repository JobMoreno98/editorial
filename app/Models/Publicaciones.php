<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Casts\AsCollection;

class Publicaciones extends Model
{
    use HasFactory;
    use Searchable;
    protected $guarded = [];


    protected $casts = [
        'autor' =>  AsCollection::class,
        'coordinadores' => AsCollection::class,
    ];


    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    protected function nombre(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucwords($value),
            set: fn (string $value) => ucwords($value),
        );
    }
/*
    protected function coordinadores(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => ucfirst($value),
        );
    }
*/
    public function toSearchableArray(): array
    {
        return [
            'nombre' => $this->nombre,
            'autor' => $this->autor,
            'coordinadores' => $this->coordinadores,
            'descripcion' => $this->descripcion,
            'anio_publicacion' => $this->anio_publicacion,
        ];
    }
}
