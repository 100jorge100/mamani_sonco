<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Comunidad;
use App\Models\Recurso;
use App\Models\Empresa;
use App\Models\Categoria;
use App\Models\Cronograma;
use Illuminate\Support\Facades\Validator;

class ProyectoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-proyecto|crear-proyecto|editar-proyecto|borrar-proyecto')->only('index');
        $this->middleware('permission:crear-proyecto', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-proyecto', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-proyecto', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comunidads = Comunidad::all();
        $recursos = Recurso::all();
        $empresas = Empresa::all();
        $categorias = Categoria::all();
        return view('proyectos.index2', compact('comunidads', 'recursos', 'empresas', 'categorias'));
    }

    public function fetchProyecto()
    {
        //  $proyectos = Proyecto::all();
        //  return response()->json([
        //      'proyectos'=>$proyectos,
        //  ]);
        $proyectos = Proyecto::with('comunidads', 'recursos', 'empresas', 'categorias')->get();
        return response()->json([
            'proyectos' => $proyectos,
        ]);
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
        return view('proyectos.crear', compact('comunidads', 'recursos', 'empresas', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:191',
            'descripcion' => 'required|max:191',
            'id_comunidad' => 'required',
            'id_recurso' => 'required',
            'id_empresa' => 'required',
            'id_categoria' => 'required',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'estado' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $proyecto = new Proyecto;
            $proyecto->nombre = $request->input('nombre');
            $proyecto->descripcion = $request->input('descripcion');

            // Asociar la comunidad
            $comunidad = Comunidad::find($request->input('id_comunidad'));
            $proyecto->comunidads()->associate($comunidad);

            // Asociar los recursos
            $recurso = Recurso::find($request->input('id_recurso'));
            $proyecto->recursos()->associate($recurso);

            // Asociar la empresa
            $empresa = Empresa::find($request->input('id_empresa'));
            $proyecto->empresas()->associate($empresa);

            // Asociar la categoría
            $categoria = Categoria::find($request->input('id_categoria'));
            $proyecto->categorias()->associate($categoria);

            $proyecto->fecha_inicio = $request->input('fecha_inicio');
            $proyecto->fecha_final = $request->input('fecha_final');
            $proyecto->estado = $request->input('estado');

            $proyecto->save();

            return response()->json([
                'status' => 200,
                'message' => 'Proyecto agregado exitosamente.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cronogramas = Cronograma::where('id_proyecto', $id)->get();
        $proyectos = Proyecto::all();
        $proyecto =  Proyecto::find($id);

        return view('proyectos.cronogramas-index', compact('cronogramas', 'proyectos', 'proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $proyecto = Proyecto::with('empresas', 'categorias', 'recursos', 'comunidads')->find($id);

        //$proyecto = Proyecto::find($id);
        if ($proyecto) {
            return response()->json([
                'status' => 200,
                'proyecto' => $proyecto,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Student Found.'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:191',
            'descripcion' => 'required|max:191',
            'id_comunidad' => 'required',
            'id_recurso' => 'required',
            'id_empresa' => 'required',
            'id_categoria' => 'required',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'estado' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $proyecto = Proyecto::find($id);
            if ($proyecto) {
                $proyecto->nombre = $request->input('nombre');
                $proyecto->descripcion = $request->input('descripcion');
                $proyecto->id_comunidad = $request->input('id_comunidad');
                $proyecto->id_recurso = $request->input('id_recurso');
                $proyecto->id_empresa = $request->input('id_empresa');
                $proyecto->id_categoria = $request->input('id_categoria');
                $proyecto->fecha_inicio = $request->input('fecha_inicio');
                $proyecto->fecha_final = $request->input('fecha_final');
                $proyecto->estado = $request->input('estado');

                // Guardar el proyecto actualizado
                //$proyecto->save();

                // Actualizar las tablas relacionadas
                $proyecto->comunidads()->associate($request->input('id_comunidad'));
                $proyecto->recursos()->associate($request->input('id_recurso'));
                $proyecto->empresas()->associate($request->input('id_empresa'));
                $proyecto->categorias()->associate($request->input('id_categoria'));

                $proyecto->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Recurso Actualizado Exitosamente.'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No Student Found.'
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proyecto = Proyecto::find($id);
        if($proyecto)
        {
            $proyecto->delete();
            return response()->json([
                'status'=>200,
                'message'=>'proyecto Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No recurso Found.'
            ]);
        }
    }
}
