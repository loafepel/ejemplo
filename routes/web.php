<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TareasController;


//Route::get('/categorias', [CategoriesController::class,'index']);

Route::get('/app', function () {
   return view('app');
});

/*Route ::get('/Tareas', function() {
    return view('Tareas.index');
});*/

Route::get('/Tareas', [TareasController::class, 'index'])->name('prueba');

Route::post('/Tareas', [TareasController::class, 'store'])->name('prueba');

Route::get('/Tareas/{id}', [TareasController::class, 'show'])->name('prueba-edit');
Route::patch('/Tareas/{id}', [TareasController::class, 'update'])->name('prueba-update');

Route::delete('/Tareas/{id}', [TareasController::class, 'destroy'])->name('prueba-destroy');

Route::resource('categories', CategoriesController::class);

