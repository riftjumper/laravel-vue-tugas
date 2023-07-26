<?php

use Illuminate\Support\Facades\Route;

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
    return view('layouts.dashboard');
});
Route::get('/dashboard', function () {
    return view('layouts.dashboard');
});
Route::get('/test', function () {
    return view('layouts.test');
});
Route::get('/user', function () {
    return view('layouts.user');
});
Route::get('/inventori', function () {
    return view('layouts.inventori');
});
Route::get('/transaksi', function () {
    return view('layouts.transaksi');
});
Route::get('/rekap-tahunan', function () {
    return view('layouts.rekap-tahunan');
});

//API

Route::get('api/user',[\App\Http\Controllers\BuatUserController::class, 'api']);
