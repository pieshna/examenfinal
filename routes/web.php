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


Auth::routes();

Route::get('/home', 'personaController@index')->name('home')->middleware('auth');
Route::get('/', 'personaController@index')->middleware('auth');

Route::resource('persona', 'personaController')->middleware('auth');
Route::resource('alumno', 'alumnoController')->middleware('auth');
Route::resource('tipotelefono', 'tipotelefonoController')->middleware('auth');
Route::resource('telefonoalumno', 'telefonoalumnoController')->middleware('auth');