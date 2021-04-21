<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models;

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
})->name('inicio');

Route::get('preguntas', function () {
    $preguntas = Models\Pregunta::all();
    
    return view('preguntas', compact('preguntas'));
})->name('pregunta');

Route::get('opcionesrespuesta', function () {
    $preguntas = Models\Pregunta::all();
    $opciones = Models\OpcionesPregunta::all();
    
    return view('opcionesrespuesta', compact('preguntas', 'opciones'));
})->name('opcionespreguntas');

Route::post('preguntas', function (Request $request) {

    $request->validate([
        'pregunta' => 'required'
    ]);

    $NuevaPregunta = new Models\Pregunta;
    $NuevaPregunta->pregunta = $request->pregunta;
    $NuevaPregunta->save();
    
    return back();

})->name('preguntas.agregar');

Route::post('opcionrespuesta', function (Request $request) {

    $request->validate([
        'opcion' => 'required',
        'idpregunta' => 'required'
    ]);

    $NuevaOpcion = new Models\OpcionesPregunta;
    $NuevaOpcion->idpregunta = $request->idpregunta;
    $NuevaOpcion->opcion = $request->opcion;
    $NuevaOpcion->save();
    
    return back();

})->name('opcionrespuesta.agregar');


Route::get('listarpreguntas', function () {
    $preguntas = Models\Pregunta::all();
    $opciones = Models\OpcionesPregunta::all();
    
    return view('listarpreguntas', compact('preguntas', 'opciones'));
})->name('listarpreguntas');

Route::post('listarpreguntas', function (Request $request) {

    $NuevaOpcion = new Models\VotacionesPregunta();
    $NuevaOpcion->idpreguntavotada = $request->idpregunta;
    $NuevaOpcion->idopcionvotada = $request->id;
    $NuevaOpcion->save();
    
    return back();

})->name('listarpreguntas');