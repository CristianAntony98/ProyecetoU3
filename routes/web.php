<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\paisController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('get/obtenerPaises', [paisController::class, 'obtenerPaises'])->name('obtener.genero');
Route::get('get/obtenerRegiones/{country}', [regionController::class, 'obtenerRegiones'])->name('obtener.genero');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
