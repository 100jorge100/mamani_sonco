<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'id_comunidad', 'id_recurso', 'id_empresa', 'id_categoria', 'fecha_inicio', 'fecha_final', 'estado'];
    public function empresas()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }
    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
    // public function cronogramas()
    // {
    //     return $this->belongsTo(Cronograma::class, 'id_cronograma');
    // }
    public function comunidads()
    {
        return $this->belongsTo(Comunidad::class, 'id_comunidad');
    }
    public function recursos()
    {
        return $this->belongsTo(Recurso::class, 'id_recurso');
    }
    public function cronogramas() {
        return $this->hasMany(Cronograma::class, 'id');
    }
}
