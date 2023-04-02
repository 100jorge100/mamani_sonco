<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
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
        //$datos = Cronograma::all();
        //return response()->json($datos);
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
        // return var_dump($request->id_proyecto);

        request()->validate([
            'nombre' => 'required',
            'descripcion' => '',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'id_proyecto' => 'required',
            'estado' => 'required'
        ]);
        Cronograma::create($request->all());

        return redirect()->route('proyectos.show', $request->id_proyecto);

        // $validatedData = $request->validate([
        //     'nombre' => 'required',
        //     'descripcion' => 'required',
        //     'fecha_inicio' => 'required',
        //     'fecha_final' => 'required',
        //     'id_proyecto' => 'required',
        //     'estado' => 'required',
        // ]);

        // $data = Cronograma::create($validatedData);

        // return response()->json($data);

        //Cronograma::create($request->all());

        //return redirect()->route('cronogramas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $empresa = Cronograma::find($id);
        return response()->json($empresa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cronograma = Cronograma::find($id);
        return response()->json($cronograma);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cronograma $cronograma)
    {
        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'estado' => 'required',
        ]);

        $cronograma->update($request->all());

        return redirect()->route('cronogramas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registro = Cronograma::findOrFail($id);
        $registro->delete();

        return response()->json(['success' => 'Registro eliminado exitosamente']);
    }
}
