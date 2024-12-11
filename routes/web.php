<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\TelefoneController;
use App\Http\Controllers\EspecialidadeController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Buscador..
Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::resource('medicos', MedicoController::class);
Route::resource('pacientes', PacienteController::class);
Route::resource('especialidades', EspecialidadeController::class);
Route::resource('consultas', ConsultaController::class);
Route::resource('telefones', TelefoneController::class);
Route::resource('pacientes.telefones', TelefoneController::class);

Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
