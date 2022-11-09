<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MedpartController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\PesertaLoginMiddleware;
use App\Http\Middleware\PesertaMiddleware;

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

Route::get('/back', [BackController::class, 'index']);
// Admin
Route::get('/back/admin', [AdminController::class, 'index']);
// Medpart
Route::get('/back/medpart', [MedpartController::class, 'index']);
Route::get('/back/medpart/create', [MedpartController::class, 'create']);
Route::post('/back/medpart/store', [MedpartController::class, 'store']);
Route::get('/back/medpart/{id}/edit', [MedpartController::class, 'show']);
Route::put('/back/medpart/update/{id}/{gambar}', [MedpartController::class, 'update']);
Route::delete('/back/medpart/delete/{id}/{gambar}', [MedpartController::class, 'destroy']);
// Sponsor
Route::get('/back/sponsor', [SponsorController::class, 'index']);
Route::get('/back/sponsor/create', [SponsorController::class, 'create']);
Route::post('/back/sponsor/store', [SponsorController::class, 'store']);
Route::get('/back/sponsor/{id}/edit', [SponsorController::class, 'show']);
Route::put('/back/sponsor/update/{id}/{gambar}', [SponsorController::class, 'update']);
Route::delete('/back/sponsor/delete/{id}/{gambar}', [SponsorController::class, 'destroy']);


// Peserta
Route::get('/back/user', [UserController::class, 'index']);




// Peserta
Route::middleware(PesertaMiddleware::class)->group(function () {
    Route::get('/dashboard', [PesertaController::class, 'index'])->name('peserta.dashboard');
    Route::get("/logout", [PesertaController::class, 'logout'])->name('peserta.logout');
});

Route::middleware(PesertaLoginMiddleware::class)->group(function () {
    Route::get('/login', [PesertaController::class, 'login'])->name('peserta.login');
    Route::get('/register', [PesertaController::class, 'register'])->name('peserta.register');
    Route::post('/signup', [PesertaController::class, 'signup'])->name('peserta.signup');
    Route::post('/signin', [PesertaController::class, 'signin'])->name('peserta.signin');
});
