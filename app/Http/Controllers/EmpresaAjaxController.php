<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;


class EmpresaAjaxController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-empresa|crear-empresa|editar-empresa|borrar-empresa')->only('index');
         $this->middleware('permission:crear-empresa', ['only' => ['create','store']]);
         $this->middleware('permission:editar-empresa', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-empresa', ['only' => ['destroy']]);
    }
    public function index()
    {
        return view('empresas.index2');
    }

    public function fetchstudent()
    {
        $empresas = Empresa::all();
        return response()->json([
            'empresas'=>$empresas,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre'=> 'required|max:191',
            'descripcion'=>'required|max:191',
            'sigla'=>'required|max:191',
            'email'=>'required|max:191',
            'telefono'=>'required',
            'direccion'=>'required',
            'direccion_web'=>'required',
            'nit'=>'required',
            'estado'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $empresa = new Empresa;
            $empresa->nombre = $request->input('nombre');
            $empresa->descripcion = $request->input('descripcion');
            $empresa->sigla = $request->input('sigla');
            $empresa->email = $request->input('email');
            $empresa->telefono = $request->input('telefono');
            $empresa->direccion = $request->input('direccion');
            $empresa->direccion_web = $request->input('direccion_web');
            $empresa->nit = $request->input('nit');
            $empresa->estado = $request->input('estado');
            $empresa->save();
            return response()->json([
                'status'=>200,
                'message'=>'empresa Agregado Exitosamente.'
            ]);
        }

    }

    public function edit($id)
    {
        $empresa = Empresa::find($id);
        if($empresa)
        {
            return response()->json([
                'status'=>200,
                'empresa'=> $empresa,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Student Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre'=> 'required|max:191',
            'descripcion'=>'required|max:191',
            'sigla'=>'required|max:191',
            'email'=>'required|max:191',
            'telefono'=>'required',
            'direccion'=>'required',
            'direccion_web'=>'required',
            'nit'=>'required',
            'estado'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $empresa = Empresa::find($id);
            if($empresa)
            {
                $empresa->nombre = $request->input('nombre');
                $empresa->descripcion = $request->input('descripcion');
                $empresa->sigla = $request->input('sigla');
                $empresa->email = $request->input('email');
                $empresa->telefono = $request->input('telefono');
                $empresa->direccion = $request->input('direccion');
                $empresa->direccion_web = $request->input('direccion_web');
                $empresa->nit = $request->input('nit');
                $empresa->estado = $request->input('estado');
                $empresa->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Recurso Actualizado Exitosamente.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Student Found.'
                ]);
            }

        }
    }

    public function destroy($id)
    {
        $empresa = Empresa::find($id);
        if($empresa)
        {
            $empresa->delete();
            return response()->json([
                'status'=>200,
                'message'=>'empresa Deleted Successfully.'
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
