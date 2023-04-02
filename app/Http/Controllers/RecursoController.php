<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Recurso;
use App\Models\Comunidad;
use Yajra\DataTables\DataTables;
use DataTables\DataTable;



class RecursoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-recurso|crear-recurso|editar-recurso|borrar-recurso')->only('index');
        $this->middleware('permission:crear-recurso', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-recurso', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-recurso', ['only'=>['destroy']]);
    }
    /**
     *
     * Display a listing of the resource.
     */
    public function index()
    {
         $comunidads = Comunidad::all();
         $recursos = Recurso::All();
         return view('recursos.index', compact('recursos', 'comunidads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $comunidads = Comunidad::All();
        return view('recursos.index', compact('comunidads'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'nombre' => 'required',
    //         'descripcion' => 'required',
    //         'gestion' => 'required',
    //         'monto' => 'required',
    //         'estado' => 'required'
    //     ]);

    //     if ($validator->fails())
    //     {
    //         return response()->json(['errors'=>$validator->errors()->all()]);
    //     }

    //     $input = $request->all();

    //     Recurso::create($input);
    //     return response()->json(['success'=>'Data is successfully added']);
    // }
    public function store(Request $request)
    {
    request()->validate([
    'nombre' => 'required',
    'descripcion' => 'required',
    'gestion' => 'required',
    'monto' => 'required',
    'estado' => 'required'
    ]);
    Recurso::create($request->all());
    return redirect()->route('recursos.index');
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
    public function edit(Recurso $recurso)
    {
        return view('recursos.editar', compact('recurso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recurso $recurso)
    {
        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'gestion' => 'required',
            'monto' => 'required',
            'estado' => 'required'
        ]);
        $recurso->update($request->all());
        return redirect()->route('recursos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recurso $recurso)
    {
        $recurso->delete();
        return redirect()->route('recursos.index');
    }
}
