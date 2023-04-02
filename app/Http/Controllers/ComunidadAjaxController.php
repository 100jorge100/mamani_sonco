<?php

namespace App\Http\Controllers;
use App\Models\Comunidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComunidadAjaxController extends Controller
{
    public function index()
{
    $comunidads = Comunidad::all();
    return response()->json([
        'status'=>200,
        'comunidads'=> $comunidads,
    ]);
}
}
