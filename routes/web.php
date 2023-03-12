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

/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/

//nuestra configuracion con la lineas de comando que nos brinda laravel permision Spatie
Route::group(['middleware' => ['auth']], function(){
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('roles', RolController::class);
    Route::resource('dash', Plantilla_baseController::class);
    Route::resource('empresas', EmpresaController::class);
    Route::resource('recursos', RecursoController::class);
    Route::resource('cronogramas', CronogramaController::class);
    Route::resource('proyectos', ProyectoController::class);
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
