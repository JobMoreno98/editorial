<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Publicaciones extends Model
{
    use HasFactory;
    use Searchable;
    protected $guarded = [];
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
    public function toSearchableArray(): array
    {
        return [
            'nombre' => $this->nombre,
            'autor' => $this->autor,
            'coordinadores' => $this->coordinadores,
            'descripcion'=> $this->descripcion,
            'anio_publicacion'=> $this->anio_publicacion,
        ];
    }
}
