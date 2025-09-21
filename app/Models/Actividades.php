<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Actividades extends Model
{
    use Searchable;
    use HasFactory;
    protected $guarded = [];
    
    public function toSearchableArray(): array
    {
        return [
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'fecha' => $this->fecha,
            'lugar' => $this->lugar,
        ];
    }
}
