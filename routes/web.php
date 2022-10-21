<?php

use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;
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


// Route::resource('mahasiswa', MahasiswaController::class)
//     ->except(
//         [
//             'index', // View Mahasiswa
//             'create', // Create Mahasiswa
//             'store', // Create Mahasiswa
//             'edit', // Edit Mahasiswa
//             'update',// Edit Mahasiswa
//             'destroy' // Delete Mahasiswa
//         ]
//     );

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index'); // View Mahasiswa
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create'); // Create Mahasiswa
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store'); // Create Mahasiswa
Route::get('/mahasiswa/{mahasiswa}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit'); // Edit Mahasiswa
Route::put('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'update'])->name('mahasiswa.update'); // Edit Mahasiswa
Route::delete('/mahasiswa/{mahasiswa}/delete', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy'); // Delete Mahasiswa
