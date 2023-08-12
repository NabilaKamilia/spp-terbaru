<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PenempatanKelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TarifSppController;
use App\Http\Controllers\UserController;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);

// Route::middleware('jwt')->group(function () {
Route::get("/my-profile", [AuthController::class, 'me'])->middleware('jwt');
Route::put("/update-profile", [UserController::class, 'updateApi'])->middleware('jwt');


Route::prefix('spp')->group(function () {
    Route::get('/', [TarifSppController::class, 'indexApi']);
    Route::post('/', [TarifSppController::class, 'storeApi']);
    Route::get('/{id}', [OrderController::class, 'show']);
    Route::put('/{id}', [OrderController::class, 'update']);
    Route::delete('/{id}', [OrderController::class, 'destroy']);
});


Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'indexApi']);
});

Route::prefix('siswa')->group(function () {
    Route::get('/', [SiswaController::class, 'indexApi']);
    Route::get('/transaksi', [SiswaController::class, 'indexTransaksiApi']);
    Route::get('/{id}', [SiswaController::class, 'showApi']);
});

Route::prefix("kelas")->group(function () {
    Route::get("/", [KelasController::class, 'indexApi']);
});
// });

Route::prefix('penempatan-kelas')->group(function () {
    Route::get('/', [PenempatanKelasController::class, 'index']);
    Route::post('/', [PenempatanKelasController::class, 'store']);
    Route::get('/{id}', [PenempatanKelasController::class, 'show']);
    Route::put('/{id}', [PenempatanKelasController::class, 'update']);
    Route::delete('/{id}', [PenempatanKelasController::class, 'destroy']);
});

Route::prefix("transaksi")->group(function()
{
    Route::get("/", [TransaksiController::class, 'indexApi']);
    Route::get("/siswa", [TransaksiController::class, 'indexMy'])->middleware('jwt');
    Route::get("/export", [TransaksiController::class, 'export']);
    Route::put("/status/{id}", [TransaksiController::class, 'updateStatus']);
    Route::get("/pdf/{id}", [TransaksiController::class, 'exportPDF']);
    Route::get('/{id}', [TransaksiController::class, 'show']);
    Route::get('/snap/{id}', [TransaksiController::class, 'showSnapToken']);
});
Route::prefix('transaction')->group(function () {
    Route::get('/{id}', [OrderController::class, 'showSnapToken']);
});
