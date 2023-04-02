<?php

use Illuminate\Support\Facades\Route;
//agregamos los controladores
use App\Http\Controllers\Plantilla_baseController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\RecursoController;
use App\Http\Controllers\CronogramaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Chart2Controller;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\EmpresaAjaxController;
use App\Http\Controllers\ProyectoAjaxController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//nuestra configuracion con la lineas de comando que nos brinda laravel permision Spatie
Route::group(['middleware' => ['auth']], function(){
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('roles', RolController::class);
    Route::resource('dash', Plantilla_baseController::class);
    ////// ruras del controlador empresas inicio /////////////////////////////////////////////
    //Route::resource('empresas', EmpresaController::class);
    Route::get('empresas', [EmpresaAjaxController::class, 'index']);
    Route::post('empresas', [EmpresaAjaxController::class, 'store']);
    Route::get('fetch-empresas', [EmpresaAjaxController::class, 'fetchstudent']);
    Route::get('edit-empresa/{id}', [EmpresaAjaxController::class, 'edit']);
    Route::put('update-empresa/{id}', [EmpresaAjaxController::class, 'update']);
    Route::delete('delete-empresa/{id}', [EmpresaAjaxController::class, 'destroy']);
////////// rutas del controlador empresas fin ///////////////////////////////////////////////////

////// rutas del controlador recurosos inicio ///////////////////////////////////////
    //Route::resource('recursos', RecursoController::class);
    Route::get('recursos', [AjaxController::class, 'index']);
    Route::post('recursos', [AjaxController::class, 'store']);
    Route::get('fetch-recursos', [AjaxController::class, 'fetchstudent']);
    Route::get('edit-recurso/{id}', [AjaxController::class, 'edit']);
    Route::put('update-recurso/{id}', [AjaxController::class, 'update']);
    Route::delete('delete-recurso/{id}', [AjaxController::class, 'destroy']);
////////// rutas del controlador recursos fin ////////////////////////////////////////

    Route::resource('cronogramas', CronogramaController::class);

////// rutas del controlador proyectos inicio ///////////////////////////////////////
    Route::resource('proyectos', ProyectoController::class);
    // Route::get('proyectos', [ProyectoAjaxController::class, 'index']);
    // Route::post('proyectos', [ProyectoAjaxController::class, 'store']);
    Route::get('fetch-proyectos', [ProyectoController::class, 'fetchProyecto']);
    Route::get('edit-proyecto/{id}', [ProyectoController::class, 'edit']);
    Route::put('update-proyecto/{id}', [ProyectoController::class, 'update']);
    Route::delete('delete-proyecto/{id}', [ProyectoController::class, 'destroy']);
////////// rutas del controlador proyectos fin /////////////////////////////////////////////////

///////////////////para probar inicio
    Route::get('/comunidads', 'ComunidadController@index');
////////////////////////para probar fin

    Route::get('dashboards', '\App\Http\Controllers\ChartController@index')->name('dashborads');

    //Route::get('dashboards','DashboardController@index_1');
    //Route::resource('dashboards', Chart2Controller::class);
    /*Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('proyectos', ProyectoController::class);
    Route::get('proyectos_cronograma', '\App\Http\Controllers\ProyectoController@cronograma_index')->name('cronograma_index');
    Route::resource('empresas', EmpresaController::class);
    Route::resource('recursos', RecursoController::class);
    Route::resource('cronogramas', CronogramaController::class);
    Route::resource('dashboards', DashboardController::class);*/
});
