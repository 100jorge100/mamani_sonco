<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Comunidad;
use App\Models\Recurso;
use App\Models\Empresa;
use App\Models\Categoria;
use App\Models\Cronograma;

class ProyectoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-proyecto|crear-proyecto|editar-proyecto|borrar-proyecto')->only('index');
        $this->middleware('permission:crear-proyecto', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-proyecto', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-proyecto', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyectos = Proyecto::all();
        $recursos = Recurso::all();
        $empresas = Empresa::all();
        $comunidads = Comunidad::all();
        $categorias = Categoria::all();
        return view('proyectos.index', compact('proyectos', 'recursos', 'empresas', 'comunidads', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $comunidads = Comunidad::All();
        $recursos = Recurso::All();
        $empresas = Empresa::All();
        $categorias = Categoria::All();
        return view('proyectos.crear', compact('comunidads','recursos','empresas','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required',
            'descripcion' => '',
            'id_comunidad' => 'required',
            'id_recurso' => 'required',
            'id_empresa' => 'required',
            'id_categoria' => 'required',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'estado' => 'required'
        ]);
        Proyecto::create($request->all());
        return redirect()->route('proyectos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cronogramas = Cronograma::all();
        $proyectos = Proyecto::all();
        $proyecto =  Proyecto::find($id);

        return view('cronogramas.index', compact('cronogramas', 'proyectos', 'proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyecto $proyecto)
    {
        $comunidads = Comunidad::All();
        $recursos = Recurso::All();
        $empresas = Empresa::All();
        $categorias = Categoria::All();
        return view('proyectos.editar', compact('proyecto', 'comunidads', 'recursos', 'empresas', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'id_comunidad' => 'required',
            'id_recurso' => 'required',
            'id_empresa' => 'required',
            'id_categoria' => 'required',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'estado' => 'required'
        ]);
        $proyecto->update($request->all());
        return redirect()->route('proyectos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
