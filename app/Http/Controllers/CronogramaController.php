<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//icluir aqui el modelo
use App\Models\Cronograma;
use App\Models\Proyecto;
use App\Models\Comunidad;

class CronogramaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cronogramas = Cronograma::all();
        $proyectos = Proyecto::all();
        return view('cronogramas.index', compact('cronogramas', 'proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyecto =  Proyecto::all();
        return view('cronogramas.crear', compact('proyecto')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'estado' => 'required'
        ]);
        $guardar = Cronograma::create($request->all()); 
        $guardar->proyectos()->attach($request->proyecto_id);
        return redirect()->route('cronogramas.index');
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
