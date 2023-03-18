<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController as GuestHome;

use App\Http\Controllers\Petugas\CategoryController;
use App\Http\Controllers\Petugas\VillageController;
use App\Http\Controllers\Petugas\MasyarakatController;
use App\Http\Controllers\Petugas\PetugasController;
use App\Http\Controllers\Petugas\PengaduanController;
use App\Http\Controllers\Petugas\HomeController;

use App\Http\Controllers\masyarakat\PengaduanController as MasyarakatPengaduan;


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

// authentication
Route::get('login', [AuthController::class, 'loginView'])->name('login.view');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'registerMasyarakat'])->name('masyarakat.register');
Route::get('register', [AuthController::class, 'registerMasyarakatView'])->name('masyarakat.register.view');
Route::post('logout', [AuthController::class, 'logout'])->middleware(['auth:petugas,masyarakat'])->name('logout');

Route::get('/', [GuestHome::class, 'index'])->name('home');

Route::prefix('petugas')->name('petugas.')->group( function(){
    Route::middleware(['auth:petugas','ceklevel:admin'])->group(function(){
        
        Route::resource('category', CategoryController::class);
        Route::resource('village', VillageController::class);
        Route::resource('masyarakat', MasyarakatController::class);
        Route::resource('petugas', PetugasController::class);
        Route::resource('pengaduan', PengaduanController::class);
    });

    Route::middleware(['auth:petugas','ceklevel:admin,petugas'])->group(function(){
        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

        Route::post('tanggapan/{id}', [PengaduanController::class, 'tanggapan'])->name('tanggapan');
        // Route::get('pengaduan/pdf', [PengaduanController::class, 'pdf'])->name('pengaduan.pdf');
        Route::resource('pengaduan', PengaduanController::class)->except('create','update','store','destroy');
    });
});

route::get('pdf', function(){
    return view('pdf');
});

Route::middleware(['auth:masyarakat'])->prefix('masyarakat')->name('masyarakat.')->group( function(){
    Route::resource('pengaduan', MasyarakatPengaduan::class);
});
