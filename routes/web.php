<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\UserViewController::class, 'indexDashboard']);
Route::get('/list_resep', [App\Http\Controllers\UserViewController::class, 'index']);
Route::get('/resep_detail/{id}', [App\Http\Controllers\UserViewController::class, 'show'])->name('User.rsp');

Route::get('/signin', function () {
    return view('login');
});
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('/profile', [App\Http\Controllers\Auth\LoginController::class, 'profile'])->name('user.profile');
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
Route::get('/tambahResep', [App\Http\Controllers\Auth\ResepController::class, 'create']);
Route::post('/addResep', [App\Http\Controllers\Auth\ResepController::class, 'store']);
Route::post('/addKategori', [App\Http\Controllers\Auth\ResepController::class, 'storeKat'])->name('tambahKat');

Route::get('/resepDetail/{id}', [App\Http\Controllers\Auth\ResepController::class, 'show'])->name('resepDetail.show');
Route::put('/resepEdit/{id}', [App\Http\Controllers\Auth\ResepController::class, 'update'])->name('resep.update');

Route::delete('/resepDetail/{id}', [App\Http\Controllers\Auth\ResepController::class, 'destroy'])->name('resepDetail.destroy');

