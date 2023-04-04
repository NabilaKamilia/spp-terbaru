<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TarifSppController;
use App\Http\Controllers\UserController;
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
});
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');   
        Route::resource('kelas', KelasController::class);
        Route::resource('user', UserController::class);
        Route::resource('siswa', SiswaController::class);
        Route::resource('tarifspp', TarifSppController ::class);




    });       
    Route::prefix('kepsek')
    ->middleware(['auth', 'kepsek'])
    ->group(function() {
        Route::get('/', [DashboardController::class, 'index']) ->name('dashboard');   
        


        
    });       
Auth::routes();

