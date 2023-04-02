<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Cronograma;

class CronogramaAjaxController extends Controller
{
    public function index($proyecto_id)
    {
        $proyecto = Proyecto::findOrFail($proyecto_id);
        $cronogramas = $proyecto->cronogramas;

        return view('cronogramas.index2', compact('proyecto', 'cronogramas'));
    }
}
