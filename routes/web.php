<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\datakamarController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//logout
Route::get('/logout',[ProfileController::class,'logout']);
//tampil data
Route::get('/data_kamar',[datakamarController::class,'index'])->name('data_kamar');
Route::get('/data_kamar',[datakamarController::class,'read'])->name('data_kamar');
//create data
Route::get('/create_kamar',[datakamarController::class,'create'])->name('create_kamar');
Route::post('/simpan_kamar',[datakamarController::class,'store'])->name('simpan_kamar');
//edit data
Route::get('/data_kamar/{id}/edit_kamar',[datakamarController::class,'edit'])->name('edit_kamar');
Route::put('/update_kamar/{id}',[datakamarController::class,'update'])->name('update_kamar');
//hapus data
Route::get('/delete_kamar/{id}',[datakamarController::class,'destroy'])->name('delete_kamar');
//middleware
// Route::group(['middleware' =>[auth]], function() {
//     Route::get('/dashboard',[datakamarController::class,'index'])->name('dashboard');
// });

// Route::resource('User',datakamarController::class)->middleware('islogin');