<?php

use App\Http\Controllers\AmedicaController;
use App\Http\Controllers\AnexoController;
use App\Http\Controllers\CmedicaController;
use App\Http\Controllers\RecaudacionesController;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnfermeriaController;
use App\Http\Controllers\UsuarioController;
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
    return view('welcome');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('usuario/busca', [UsuarioController::class, 'busca']);
Route::middleware('soporte')->resource('usuario', UsuarioController::class);

Route::get('recaudaciones/responsable', [RecaudacionesController::class, 'responsable']);
Route::get('recaudaciones/archivados', [RecaudacionesController::class, 'archivados'])->name('recaudaciones.archivados');
Route::get('recaudaciones/activa/{paciente}', [RecaudacionesController::class, 'activa'])->name('recaudaciones.activa');
Route::middleware('recaudaciones')->resource('recaudaciones', RecaudacionesController::class)->parameters(['recaudaciones' => 'paciente']);

Route::post('anexo/crea', [AnexoController::class, 'crea'])->name('anexo.crea');

Route::get('amedica/crea/{nroanexo}', [AmedicaController::class, 'crea'])->name('amedica.crea');

Route::get('cmedica/crea/{nroam}', [CmedicaController::class, 'crea'])->name('cmedica.crea');
Route::middleware('cmedica')->resource('cmedica', CmedicaController::class)->parameters(['cmedica' => 'anexo']);

Route::get('contactanos', [ContactanosController::class, 'index'])->name('contactanos.index');

Route::post('contactanos', [ContactanosController::class, 'store'])->name('contactanos.store');