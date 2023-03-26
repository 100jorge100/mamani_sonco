<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comunidad;
use App\Models\Proyecto;
use Illuminate\Support\Facades\DB;

class Chart2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comunidades = Comunidad::where('canton', 'like', '%2%')->get();
        $proyectosPorComunidad = Proyecto::select('id_comunidad', DB::raw('COUNT(*) as total'))
            ->groupBy('id_comunidad')
            ->get();

        $data = [
            'label2' => [],
            'data2' => [],
        ];

        foreach ($comunidades as $comunidad) {
            $data['label2'][] = $comunidad->nombre;
            $cantidadProyectos = $proyectosPorComunidad->where('id_comunidad', $comunidad->id)->first()->total ?? 0;
            $data['data2'][] = $cantidadProyectos;
        }

        $data['data2'] = json_encode($data);

        return view('dashboards.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
