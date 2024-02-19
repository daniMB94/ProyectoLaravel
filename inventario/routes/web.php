<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LocalizacionController;
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
    return view('welcome');
});



Route::prefix('admin')->middleware(['auth', 'verified', 'middlewareRole:admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [ProductoController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/store', [ProductoController::class, 'store'])->name('dashboard.store');
    Route::get('/dashboard/delete/{id}/{page}', [ProductoController::class, 'destroy'])->name('dashboard.delete');
    Route::post('/dashboard/formUpdateProduct/{producto}', [ProductoController::class, 'edit'])->name('dashboard.formUpdateProduct');
    Route::post('/dashboard/updateProduct/{id}/{id_localizacion?}', [ProductoController::class, 'update'])->name('dashboard.updateProduct');
    Route::get('/dashboard/filtrar', [ProductoController::class, 'filtrar'])->name('dashboard.filtrar');
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias');
    Route::post('/categorias/store', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('/categorias/delete/{id}', [CategoriaController::class, 'destroy'])->name('categorias.delete');
    Route::get('/localizaciones', [LocalizacionController::class, 'index'])->name('localizaciones');
    Route::post('/localizaciones/store', [LocalizacionController::class, 'store'])->name('localizaciones.store');
    Route::get('/localizaciones/delete/{id}', [LocalizacionController::class, 'destroy'])->name('localizaciones.delete');
});


require __DIR__.'/auth.php';