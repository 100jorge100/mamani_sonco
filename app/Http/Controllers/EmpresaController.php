<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empresa;


class EmpresaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-empresa|crear-empresa|editar-empresa|borrar-empresa')->only('index');
         $this->middleware('permission:crear-empresa', ['only' => ['create','store']]);
         $this->middleware('permission:editar-empresa', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-empresa', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //para no olvidarme o tambien podemos utilizar datatables por verse
        //Con paginación
        $empresas = Empresa::All();
        return view('empresas.index',compact('empresas'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empresas.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'sigla' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'direccion_web' => 'required',
            'nit' => 'required',
            'estado' => 'required',
        ]);

        Empresa::create($request->all());

        return redirect()->route('empresas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $empresa = Empresa::find($id);
         return response()->json($empresa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        return view('empresas.editar',compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empresa $empresa)
    {
        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'sigla' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'direccion_web' => 'required',
            'nit' => 'required',
            'estado' => 'required',
        ]);

        $empresa->update($request->all());

        return redirect()->route('empresas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();

        return redirect()->route('empresas.index')->with('eliminar', 'ok');
    }

    public function actualizar(Request $request)
    {
        dd($request->all());
    }
}
