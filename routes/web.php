<?php

use App\Http\Controllers\AbsensiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\DetailAbsensiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JawabController;
use App\Http\Controllers\MedpartController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TugasController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\PesertaLoginMiddleware;
use App\Http\Middleware\PesertaMiddleware;
use App\Models\Config;
use App\Models\DetailAbsensi;

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


Route::get('/coba', [HomeController::class, 'index']);


Route::get('/cara_mudah_membuat_website_pertamamu', function () {
    return view('blog1');
});

Route::get('/cara_praktis_membuat_web_portofolio_sendiri', function () {
    return view('blog2');
});


// Admin
Route::get('/back/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/back/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::post('/back/signin', [AdminController::class, 'signin'])->name('admin.signin');

// Medpart

Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/back', [BackController::class, 'index'])->name('admin.dashboard');
    Route::get('/back/medpart', [MedpartController::class, 'index']);
    Route::get('/back/medpart/create', [MedpartController::class, 'create']);
    Route::post('/back/medpart/store', [MedpartController::class, 'store']);
    Route::get('/back/medpart/{id}/edit', [MedpartController::class, 'show']);
    Route::put('/back/medpart/update/{id}/{gambar}', [MedpartController::class, 'update']);
    Route::delete('/back/medpart/delete/{id}/{gambar}', [MedpartController::class, 'destroy']);
    Route::get('/back/sponsor', [SponsorController::class, 'index']);
    Route::get('/back/sponsor/create', [SponsorController::class, 'create']);
    Route::post('/back/sponsor/store', [SponsorController::class, 'store']);
    Route::get('/back/sponsor/{id}/edit', [SponsorController::class, 'show']);
    Route::put('/back/sponsor/update/{id}/{gambar}', [SponsorController::class, 'update']);
    Route::delete('/back/sponsor/delete/{id}/{gambar}', [SponsorController::class, 'destroy']);
    Route::get('/back/user', [UserController::class, 'index']);
    Route::get('/back/bayar', [UserController::class, 'bayar'])->name('admin.bayar');
    Route::get('/back/bayar/wa', [AdminController::class, 'kirimInvitanWhatsapp'])->name('admin.bayar.wa');
    // tugas
    Route::get('/back/tugas', [TugasController::class, 'index']);
    Route::get('/back/tugas/send_email/{id}', [TugasController::class, 'send_email'])->name('admin.task.send_email');
    Route::get('/back/tugas/create', [TugasController::class, 'create']);
    Route::post('/back/tugas/store', [TugasController::class, 'store']);
    Route::get('/back/tugas/{id}/edit', [TugasController::class, 'show']);
    Route::put('/back/tugas/update/{id}/{file}', [TugasController::class, 'update']);
    Route::delete('/back/tugas/delete/{id}/{file}', [TugasController::class, 'destroy']);
    Route::get('/back/penilaian/collect/{id}', [TugasController::class, 'collect'])->name('admin.collect');
    Route::get('/back/penilaian/update/{id}', [TugasController::class, 'update_sheet'])->name('admin.updatesheet');
    Route::get('/back/penilaian/{id?}/{email?}', [TugasController::class, 'nilai'])->name('admin.nilai');

    Route::put('/back/penilaian/edit/{id}/{idTugas}', [TugasController::class, 'edit']);
    // confirmation
    Route::get('/back/confirmation/{id}', [UserController::class, 'confirmation'])->name('admin.confirmation');
    Route::get('/back/reject/{id}', [UserController::class, 'reject'])->name('admin.reject');
    Route::get('/back/editor', [ConfigController::class, 'create'])->name('admin.editor');
    Route::post('/back/editor/save', [ConfigController::class, 'store'])->name('admin.save.editor');
    // Absensi
    Route::get("/back/absen",[AbsensiController::class,"index"])->name("admin.absen.index");
    Route::get("/back/absen/edit/{data}",[AbsensiController::class,"edit"])->name("admin.absen.edit");
    Route::delete("/back/absen/{absensi}",[AbsensiController::class,"destroy"])->name("admin.absen.destroy");
    Route::put("/back/absen/{absensi}",[AbsensiController::class,"update"])->name("admin.absen.update");
    Route::get("/back/absen/detail/{absensi}",[AbsensiController::class,"detail"])->name("admin.absen.detail");
    Route::get("/back/absen/create",[AbsensiController::class,"create"])->name("admin.absen.create");
    Route::post("/back/absen/store",[AbsensiController::class,"store"])->name("admin.absen.store");

});




// Peserta
Route::middleware(PesertaMiddleware::class)->group(function () {
    Route::get('/account', [PesertaController::class, 'index'])->name('peserta.account');
    Route::get("/logout", [PesertaController::class, 'logout'])->name('peserta.logout');
    Route::get("/payment", [PesertaController::class, 'payment'])->name('peserta.payment');
    Route::get("/information", [PesertaController::class, 'information'])->name('peserta.information');
    Route::post("/pay", [PesertaController::class, 'uploadPayment'])->name('peserta.pay');
    Route::post('/change_account', [PesertaController::class, 'changeProfile'])->name('peserta.change.account');
    Route::post('/change_password', [PesertaController::class, 'changePassword'])->name('peserta.change.password');
    Route::get('/tugas', [PesertaController::class, 'listTask'])->name('peserta.listtask');
    Route::get('/absensi', [DetailAbsensiController::class, 'index'])->name('peserta.absensi');
    Route::get('/absensi/{data}', [DetailAbsensiController::class, 'show'])->name('peserta.absen');
    Route::post('/absen', [DetailAbsensiController::class, 'store'])->name('peserta.absen.post');
    Route::post('/jawab', [JawabController::class, 'post'])->name('peserta.jawab');
    Route::delete('/jawab/delete', [JawabController::class, 'destroy'])->name('peserta.delete.jawab');
    Route::get('/tugas/{id}', [PesertaController::class, 'task'])->name('peserta.task');
    Route::get('/sertifikat', [PesertaController::class, 'sertifikat'])->name('peserta.sertifikat');
});

Route::middleware(PesertaLoginMiddleware::class)->group(function () {
    Route::get('/login', [PesertaController::class, 'login'])->name('peserta.login');
    Route::get('/register', [PesertaController::class, 'register'])->name('peserta.register');
    /**
 * socialite auth
 */
    Route::get('/auth/login/{provider}', [SocialiteController::class, 'redirectToProvider'])->name('socialite.auth');
    Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);
    // forgot
    Route::get('/forgot', [PesertaController::class, 'forgotPassword'])->name('peserta.forgot');
    Route::post('/request_reset', [PesertaController::class, 'requestReset'])->name('peserta.forgot.post');
    Route::get('/reset/{token}', [PesertaController::class, 'resetPassword'])->name('peserta.reset');
    Route::post('/reset_password', [PesertaController::class, 'resetPasswordPost'])->name('peserta.reset.post');
    Route::post('/signup', [PesertaController::class, 'signup'])->name('peserta.signup');
    Route::post('/signin', [PesertaController::class, 'signin'])->name('peserta.signin');
});
