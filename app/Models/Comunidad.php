<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunidad extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'estado'];
    public function proyectos()
    {
        return $this->hasMany(Proyecto::class, 'id');
    }
}
