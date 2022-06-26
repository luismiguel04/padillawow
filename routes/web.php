<?php

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('provedors', App\Http\Controllers\ProvedorController::class)->middleware('auth');
Route::resource('cuentas', App\Http\Controllers\CuentaController::class)->middleware('auth');
Route::resource('pagos', App\Http\Controllers\PagoController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/rcuentas', [App\Http\Controllers\PagoController::class, 'cuentas'])->middleware('auth');
Route::post('/edits/cuentas', [App\Http\Controllers\PagoController::class, 'cuentas'])->middleware('auth');
Route::get('/creates', [App\Http\Controllers\PagoController::class, 'create'])->middleware('auth');
Route::get('/edits/{pago_id}', [App\Http\Controllers\PagoController::class, 'edit'])->middleware('auth');

Route::get('/pago-file/{filename}', array(
    'as'=> 'filePago',
    'uses' => 'App\Http\Controllers\PagoController@getPago'
));