<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'sigla', 'email', 'telefono', 'direccion','direccion_web', 'nit', 'estado'];
    public function proyectos()
    {
        return $this->hasMany(Proyecto::class, 'id');
    }
}
