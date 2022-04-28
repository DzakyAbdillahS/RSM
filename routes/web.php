<?php

use App\Http\Controllers\HargaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MduPlnController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\MduPlnGarduController;
use App\Http\Controllers\NonMduGarduController;
use App\Http\Controllers\NonMduPlnGarduController;
use App\Http\Controllers\JenisMonitoringController;
use App\Http\Controllers\NonMduTiangBesiController;
use App\Http\Controllers\NonMduTiangBetonController;

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

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('layouts.template');
    });
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //Pekerjaan
    Route::resource('/pekerjaan', PekerjaanController::class);

    //Harga Material
    Route::resource('/harga-material', HargaController::class);

    //Monitoring
    Route::get('/pekerjaan/monitoring/{id}', [MonitoringController::class, 'index'])->name('monitoring.index');

    //MDU PLN
    Route::get('/{id}/monitoring/mdu-pln/{jenis}', [MduPlnController::class, 'index'])->name('MduPln.index');
    Route::get('/excelmdupln/{id}', [MduPlnController::class, 'excelmdupln'])->name('MduPln.excelmdupln');
    // Route::get('/{id}/monitoring/mdu-pln/{jenis}/create', [MduPlnController::class, 'create'])->name('MduPln.create');
    Route::post('/{id}/monitoring/mdu-pln/{jenis}/create', [MduPlnController::class, 'store'])->name('MduPln.store');
    Route::get('/monitoring/mdu-pln/edit/{detail}', [MduPlnController::class, 'edit'])->name('MduPln.edit');
    Route::put('/monitoring/mdu-pln/edit/{detail}', [MduPlnController::class, 'update'])->name('MduPln.update');
    Route::delete('/monitoring/mdu-pln/destroy/{detail}', [MduPlnController::class, 'destroy'])->name('MduPln.destroy');

    //Non MDU Tiang Besi
    Route::get('/{id}/monitoring/non-mdu-tiang-besi/{jenis}', [NonMduTiangBesiController::class, 'index'])->name('NonMduTiangBesi.index');
    Route::get('/excelnonmdutiangbesi/{id}', [NonMduTiangBesiController::class, 'excelNonMduTiangBesi'])->name('NonMduTiangBesi.excelNonMduTiangBesi');
    Route::post('/{id}/monitoring/non-mdu-tiang-besi/{jenis}/create', [NonMduTiangBesiController::class, 'store'])->name('NonMduTiangBesi.store');
    // Route::get('/monitoring/non-mdu-tiang-besi/edit/{detail}', [NonMduTiangBesiController::class, 'edit'])->name('NonMduTiangBesi.edit');
    Route::put('/monitoring/non-mdu-tiang-besi/edit/{detail}', [NonMduTiangBesiController::class, 'update'])->name('NonMduTiangBesi.update');
    Route::delete('/monitoring/non-mdu-tiang-besi/destroy/{detail}', [NonMduTiangBesiController::class, 'destroy'])->name('NonMduTiangBesi.destroy');

    //Non MDU Tiang Beton
    Route::get('/{id}/monitoring/non-mdu-tiang-beton/{jenis}', [NonMduTiangBetonController::class, 'index'])->name('NonMduTiangBeton.index');
    Route::get('/excelnonmdutiangbeton/{id}', [NonMduTiangBetonController::class, 'excelNonMduTiangBeton'])->name('NonMduTiangBeton.excelNonMduTiangBeton');
    Route::post('/{id}/monitoring/non-mdu-tiang-beton/{jenis}/create', [NonMduTiangBetonController::class, 'store'])->name('NonMduTiangBeton.store');
    // Route::get('/monitoring/non-mdu-tiang-beton/edit/{detail}', [NonMduTiangBetonController::class, 'edit'])->name('NonMduTiangBeton.edit');
    Route::put('/monitoring/non-mdu-tiang-beton/edit/{detail}', [NonMduTiangBetonController::class, 'update'])->name('NonMduTiangBeton.update');
    Route::delete('/monitoring/non-mdu-tiang-beton/destroy/{detail}', [NonMduTiangBetonController::class, 'destroy'])->name('NonMduTiangBeton.destroy');

    //MDU Gardu
    Route::get('/{id}/monitoring/mdu-pln-gardu/{jenis}', [MduPlnGarduController::class, 'index'])->name('MduPlnGardu.index');
    Route::get('/excelMduPlnGardu/{id}', [MduPlnGarduController::class, 'excelMduPlnGardu'])->name('MduPlnGardu.excelMduPlnGardu');
    Route::post('/{id}/monitoring/mdu-pln-gardu/{jenis}/create', [MduPlnGarduController::class, 'store'])->name('MduPlnGardu.store');
    // Route::get('/monitoring/mdu-pln-gardu/edit/{detail}', [MduPlnGarduController::class, 'edit'])->name('MduPlnGardu.edit');
    Route::put('/monitoring/mdu-pln-gardu/edit/{detail}', [MduPlnGarduController::class, 'update'])->name('MduPlnGardu.update');
    Route::delete('/monitoring/mdu-pln-gardu/destroy/{detail}', [MduPlnGarduController::class, 'destroy'])->name('MduPlnGardu.destroy');

    //Non MDU Gardu
    Route::get('/{id}/monitoring/non-mdu-gardu/{jenis}', [NonMduGarduController::class, 'index'])->name('NonMduGardu.index');
    Route::get('/excelNonMduGardu/{id}', [NonMduGarduController::class, 'excelNonMduGardu'])->name('NonMduGardu.excelNonMduGardu');
    Route::post('/{id}/monitoring/non-mdu-gardu/{jenis}/create', [NonMduGarduController::class, 'store'])->name('NonMduGardu.store');
    // Route::get('/monitoring/non-mdu-gardu/edit/{detail}', [NonMduGarduController::class, 'edit'])->name('MduPlnGardu.edit');
    Route::put('/monitoring/non-mdu-gardu/edit/{detail}', [NonMduGarduController::class, 'update'])->name('NonMduGardu.update');
    Route::delete('/monitoring/non-mdu-gardu/destroy/{detail}', [NonMduGarduController::class, 'destroy'])->name('NonMduGardu.destroy');


});
Auth::routes();
