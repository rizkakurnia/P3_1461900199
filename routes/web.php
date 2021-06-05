<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',  [SiswaController::class, 'index']);
Route::get('/siswa/cari', [SiswaController::class, 'search']);
Route::get('/siswa/tambah', [SiswaController::class, 'tambah']);
Route::post('/siswa/store', [SiswaController::class, 'store']);
Route::get('/siswa/hapus/{id}', [SiswaController::class, 'hapus']);
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit']);
