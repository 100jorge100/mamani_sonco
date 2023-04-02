<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    use HasFactory;
    protected $fillable = ['id','nombre', 'descripcion', 'gestion', 'monto', 'estado'];
    public function proyectos()
    {
        return $this->hasMany(Proyecto::class, 'id');
    }
}
