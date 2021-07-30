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

Route::get('get/obtenerPaises', [paisController::class, 'obtenerPaises'])->name('obtener.genero');
Route::get('get/obtenerPaisId/{id}', [paisController::class, 'obtenerPaisId'])->name('obtener.nombre');
Route::get('get/obtenerPaisNombre/{nombre}', [paisController::class, 'obtenerPaisNombre'])->name('obtener.nombre');

Route::get('get/obtenerRegiones/{country}', [regionController::class, 'obtenerRegiones'])->name('obtener.regiones');
Route::get('get/obtenerRegionPais/{pais}', [regionController::class, 'obtenerRegionPais'])->name('obtener.id');
Route::get('get/obtenerRegionNombre/{nombre}', [regionController::class, 'obtenerRegionNombre'])->name('obtener.nombre');
