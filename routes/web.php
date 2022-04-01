<?php

use Illuminate\Support\Facades\Route;

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
    return view('inicio');
});

Route::get('/barra', function () {
    return view('barranavegacion');
});

Route::post('/borrar','App\Http\Controllers\BibliotecaController@borrar')->name('borrar');
Route::get('/biblioteca', 'App\Http\Controllers\BibliotecaController@index');
Route::post('/biblioteca','App\Http\Controllers\BibliotecaController@store')->name('biblioteca');
Route::post('/actualizar','App\Http\Controllers\BibliotecaController@actualizar')->name('actualizar');