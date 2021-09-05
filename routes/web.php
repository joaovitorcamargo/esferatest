<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Auth\LoginController,
    HomeController,
    EmpresaController,
    FuncionarioController
};
use Illuminate\Support\Facades\Auth;

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
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/registercompany',[EmpresaController::class, 'register'])->name('registercompany');
Route::get('/editcompany/{id}/edit',[EmpresaController::class, 'edit'])->name('editcompany');
Route::post('/removecompany/{id}',[EmpresaController::class, 'destroy'])->name('removecompany');
Route::put('/editcompany/{id}',[EmpresaController::class, 'update'])->name('updatecompany');
Route::post('/confirmregistercompany',[EmpresaController::class, 'confirmregister'])->name('confirmregistercompany');
Route::get('/registercolaborator',[FuncionarioController::class, 'register'])->name('registercolaborator');
Route::get('/editcolaborator/{id}/edit',[FuncionarioController::class, 'edit'])->name('editcolaborator');
Route::post('/removecolaborator/{id}',[FuncionarioController::class, 'destroy'])->name('removecolaborator');
Route::put('/editcolaborator/{id}',[FuncionarioController::class, 'update'])->name('updatecolaborator');
Route::post('/confirmregistercolaborator',[FuncionarioController::class, 'confirmregister'])->name('confirmregistercolaborator');
