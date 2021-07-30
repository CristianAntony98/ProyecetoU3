<?php
use App\Http\Controllers\paisController;
use App\Http\Controllers\regionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/saludo', function(){
echo json_encode("probando xD");
});

Route::get('get/obtenerPaises', [paisController::class, 'obtenerPaises'])->name('obtener.genero');// Paises de la api a nuestra BD
Route::get('get/obtenerPaisesBD', [paisController::class, 'obtenerPaisesBD'])->name('obtener.genero');// Paises que estan en nuestra BD
Route::get('get/obtenerPaisId/{id}', [paisController::class, 'obtenerPaisId'])->name('obtener.nombre');// Obtener un pais mediante su id (ad, af al...)
Route::get('get/obtenerPaisNombre/{nombre}', [paisController::class, 'obtenerPaisNombre'])->name('obtener.nombre');// Obtener un pais mediante su nombre

Route::get('get/obtenerRegiones/{country}', [regionController::class, 'obtenerRegiones'])->name('obtener.regiones');// Regiones de la api a nuestra BD
Route::get('get/obtenerRegionesBD', [regionController::class, 'obtenerRegionesBD'])->name('obtener.regiones');// Regiones que estan en nuestra BD
Route::get('get/obtenerRegionPais/{pais}', [regionController::class, 'obtenerRegionPais'])->name('obtener.id');// Obtener una region mediante su id (ad, af al...)
Route::get('get/obtenerRegionNombre/{nombre}', [regionController::class, 'obtenerRegionNombre'])->name('obtener.nombre');// Obtener una region mediante su nombre
