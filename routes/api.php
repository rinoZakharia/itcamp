<?php

use App\Http\Controllers\MedpartController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SponsorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('sponsor', [SponsorController::class, 'getAPI']);
Route::get('medpart', [MedpartController::class, 'getAPI']);

Route::get('notification', [NotificationController::class, 'index']);
Route::get('read_notif', [NotificationController::class, 'markAsRead']);
