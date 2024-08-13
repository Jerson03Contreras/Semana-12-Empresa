<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\ContactoController;

// Ruta para la vista principal
Route::view('/', 'home')->name('home');

// Rutas para las vistas estáticas
Route::view('contacto', 'contacto')->name('contacto');
Route::post('contacto', 'App\Http\Controllers\ContactoController@store');

// Grupo de rutas para el controlador de personas
// Route::controller(PersonasController::class)->group(function () {
//     Route::get('personas', 'index')->name('personas');
//     Route::get('personas/crear', 'create')->name('personas.create');
//     Route::get('personas/{nPerCodigo}/editar', 'edit')->name('personas.edit');
//     Route::patch('personas/{nPerCodigo}', 'update')->name('personas.update');
//     Route::post('personas', 'store')->name('personas.store');
//     Route::get('personas/{nPerCodigo}', 'show')->name('personas.show');
//     Route::delete('personas/{nPerCodigo}', 'destroy')->name('personas.destroy');
// });
Route::resource('personas', PersonasController::class)
    ->parameters(['personas' => 'nPerCodigo'])
    ->names([
        'index' => 'personas',
        'create' => 'personas.create',
        'store' => 'personas.store',
        'show' => 'personas.show',
        'edit' => 'personas.edit',
        'update' => 'personas.update',
        'destroy' => 'personas.destroy',
    ]);

Route::get('categorias/{category}', 'App\Http\Controllers\CategoryController@show')->name('categories.show');

Auth::routes(['register'=> true]);


