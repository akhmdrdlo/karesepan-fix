<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user/index');
});
Route::get('/signin', function () {
    return view('login');
});
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/daftar', function () {
    return view('register');
});
Route::resource('users', App\Http\Controllers\Auth\RegisterController::class);
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'store']);


Route::get('/dashboard', function () {
    return view('admin/dashboard');
});

Route::get('/resep', [App\Http\Controllers\Auth\ResepController::class, 'index']);
Route::get('/tambahResep', function () {
    return view('admin/tambah_resep');
});
Route::post('/addResep', [App\Http\Controllers\Auth\ResepController::class, 'store']);

Route::get('/resepDetail/{id}', [App\Http\Controllers\Auth\ResepController::class, 'show'])->name('resepDetail.show');
