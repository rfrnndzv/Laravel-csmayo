<?php

use App\Http\Controllers\AmedicaController;
use App\Http\Controllers\AnexoController;
use App\Http\Controllers\CmedicaController;
use App\Http\Controllers\RecaudacionesController;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FarmaciaController;
use App\Http\Controllers\HclinicaController;
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

//Rutas para USUARIOS(solo administradores)
Route::get('listapdf', [UsuarioController::class, 'exportarPdf'])->name('usuarios.pdf');
Route::get('usuario/busca', [UsuarioController::class, 'busca']);
Route::middleware('soporte')->resource('usuario', UsuarioController::class);

//Rutas para RECAUDACIONES
Route::get('recaudaciones/responsable', [RecaudacionesController::class, 'responsable']);
Route::get('recaudaciones/archivados', [RecaudacionesController::class, 'archivados'])->name('recaudaciones.archivados');
Route::get('recaudaciones/activa/{paciente}', [RecaudacionesController::class, 'activa'])->name('recaudaciones.activa');
Route::middleware('recaudaciones')->resource('recaudaciones', RecaudacionesController::class)->parameters(['recaudaciones' => 'paciente']);

//Rutas para ANEXO
Route::middleware('anexo')->post('anexo/reserva', [AnexoController::class, 'reserva'])->name('anexo.reserva');

//Rutas para ATENCION MEDICA
Route::middleware('amedica')->get('amedica/crea/{anexo}', [AmedicaController::class, 'crea'])->name('amedica.crea');

//Rutas para CONSULTA MEDICA
Route::get('cmedica/receta', [CmedicaController::class, 'receta']);
Route::middleware('cmedica')->get('cmedica/crea/{amedica}', [CmedicaController::class, 'crea'])->name('cmedica.crea');
Route::middleware('cmedica')->resource('cmedica', CmedicaController::class)->parameters(['cmedica' => 'anexo']);

//Rutas para HISTORIA CLINICA
Route::middleware('hclinica')->resource('hclinica', HclinicaController::class);

//Rutas para RECETAS(FARMACIA)
Route::middleware('farmacia')->get('farmacia/actualizar', [FarmaciaController::class, 'actualizar'])->name('farmacia.actualizar');
Route::middleware('farmacia')->get('farmacia/{anexo}/pdf', [FarmaciaController::class, 'pdf'])->name('farmacia.pdf');
Route::middleware('farmacia')->resource('farmacia', FarmaciaController::class)->parameters(['farmacia' => 'anexo']);;

//Rutas para CONTACTOS
Route::get('contactanos', [ContactanosController::class, 'index'])->name('contactanos.index');
Route::post('contactanos', [ContactanosController::class, 'store'])->name('contactanos.store');