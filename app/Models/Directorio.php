<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directorio extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected function foto(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->image && file_exists(public_path("storage/{$this->image}"))
                ? asset("storage/{$this->image}")
                : asset('img/not-image.jpg')
        );
    }
    public function padre()
    {
        return $this->belongsTo(Directorio::class, 'id_padre');
    }
    public function hijos()
    {
        return $this->hasMany(Directorio::class, 'id_padre');
    }
}
