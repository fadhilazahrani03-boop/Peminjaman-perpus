<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\User\KatalogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','role:user'])->name('dashboard');

Route::middleware('auth','verified')->group(function () {
    Route::get('/admin/dashboard', function(){
        if(auth()->user()->role !== 'admin'){
            abourt(403, 'Unauthorized action');
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth','verified')->group(function () {
    Route::get('/admin/dashboard', function(){
        if(auth()->user()->role !== 'admin'){
            abourt(403, 'Akses ditolak');
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('/admin/buku', Bukucontroller::class, ['as' => 'admin']);
    Route::resource('/admin/user', usercontroller::class, ['as' => 'admin']);
    Route::resource('/admin/peminjaman', PeminjamanController::class, ['as' => 'admin']); 
    Route::patch('/admin/peminjaman/{peminjaman}/kembali', [PeminjamanController::class, 'updateStatus'])->name('admin.peminjaman.kembali');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [KatalogController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/pinjam', [KatalogController::class, 'store'])->name('user.pinjam');
});


require __DIR__.'/auth.php';
