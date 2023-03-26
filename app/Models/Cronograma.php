<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'fecha_inicio', 'fecha_final', 'id_proyecto', 'estado'];
    public function proyectos() {
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }
}
