<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Support\Str;

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
            set: fn(string $value) => ucwords($value),
        );
    }
    /*
    protected function coordinadores(): Attribute
    {
        return Attribute::make(          
            set: fn (string $value) => ucfirst($value),
        );
    }
*/
    public function toSearchableArray(): array
    {
        return [
            'nombre' => $this->nombre,
            'autor' => $this->autor,
            'coordinadores' => $this->normalizeArray($this->coordinadores),
            'descripcion' => $this->descripcion,
            'anio_publicacion' => $this->anio_publicacion,
        ];
    }
    private function normalize($value)
    {
        if (is_string($value)) {
            return iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $value);
        }

        return $value;
    }
    private function normalizeArray($json)
    {
        $decoded = json_decode($json, true); // decodifica el array JSON
        if (!is_array($decoded)) {
            return $this->normalize($json); // si no es array, intenta normalizar como string
        }

        $normalized = array_map(function ($item) {
            return $this->normalize($item);
        }, $decoded);

        return implode(', ', $normalized); // unir en un string para busqueda
    }

    protected function portada(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->imagen && file_exists(public_path("storage/{$this->imagen}"))
                ? asset("storage/{$this->imagen}")
                : asset('img/not-image.jpg')
        );
    }

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $model->slug = static::generateUniqueSlug($model->nombre);
        });

        static::updating(function ($model) {
            // Solo regenera el slug si el nombre cambió
            if ($model->isDirty('nombre')) {
                $model->slug = static::generateUniqueSlug($model->nombre, $model->id);
            }
        });
    }

    protected static function generateUniqueSlug(string $nombre, $ignoreId = null): string
    {
        $slug = Str::slug($nombre);
        $originalSlug = $slug;
        $count = 1;

        $query = static::where('slug', $slug);

        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        while ($query->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;

            $query = static::where('slug', $slug);
            if ($ignoreId) {
                $query->where('id', '!=', $ignoreId);
            }
        }

        return $slug;
    }
}
