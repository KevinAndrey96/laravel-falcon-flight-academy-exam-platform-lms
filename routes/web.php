<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Falcon Escuela de Aviación
|--------------------------------------------------------------------------
| Examination Assessment Engine & Flight Academy LMS
| Under standards of UAEAC (Aeronáutica Civil de Colombia) & RAC
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/select', 'HomeController@index')->name('select');

// Question Bank Administration (Instructor & Admin CRUD)
Route::resource('/questions', 'QuestionsController');

// Aeronautical Examination Workflows (Student Pilot Testing & Scoring)
Route::get('/cuestionarios', 'CuestionariosController@index')->name('cuestionarios.index');
Route::get('/cuestionarios/{title}', 'CuestionariosController@show')->name('cuestionarios.show');
Route::post('/cuestionarios/{title}/evaluar', 'CuestionariosController@evaluar')->name('cuestionarios.evaluar');
