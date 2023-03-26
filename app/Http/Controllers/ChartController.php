<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comunidad;
use App\Models\Proyecto;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        $comunidades = Comunidad::where('canton', 'like', '%1%')->get();
        $proyectosPorComunidad = Proyecto::select('id_comunidad', DB::raw('COUNT(*) as total'))
            ->groupBy('id_comunidad')
            ->get();

        $data1 = [
            'label1' => [],
            'data1' => [],
        ];

        foreach ($comunidades as $comunidad) {
            $data1['label1'][] = $comunidad->nombre;
            $cantidadProyectos = $proyectosPorComunidad->where('id_comunidad', $comunidad->id)->first()->total ?? 0;
            $data1['data1'][] = $cantidadProyectos;
        }

        $data1['data1'] = json_encode($data1);

        //return view('dashboards.index', $data1);
        /////////////////////////////////////////
        $comunidades = Comunidad::where('canton', 'like', '%2%')->get();
        $proyectosPorComunidad = Proyecto::select('id_comunidad', DB::raw('COUNT(*) as total'))
            ->groupBy('id_comunidad')
            ->get();

        $data2 = [
            'label2' => [],
            'data2' => [],
        ];

        foreach ($comunidades as $comunidad) {
            $data2['label2'][] = $comunidad->nombre;
            $cantidadProyectos = $proyectosPorComunidad->where('id_comunidad', $comunidad->id)->first()->total ?? 0;
            $data2['data2'][] = $cantidadProyectos;
        }

        $data2['data2'] = json_encode($data2);
        /////////////////////////////////////
        $comunidades = Comunidad::where('canton', 'like', '%3%')->get();
        $proyectosPorComunidad = Proyecto::select('id_comunidad', DB::raw('COUNT(*) as total'))
            ->groupBy('id_comunidad')
            ->get();

        $data3 = [
            'label3' => [],
            'data3' => [],
        ];

        foreach ($comunidades as $comunidad) {
            $data3['label3'][] = $comunidad->nombre;
            $cantidadProyectos = $proyectosPorComunidad->where('id_comunidad', $comunidad->id)->first()->total ?? 0;
            $data3['data3'][] = $cantidadProyectos;
        }

        $data3['data3'] = json_encode($data3);


        return view('dashboards.index', $data1, $data2);
    }
}
