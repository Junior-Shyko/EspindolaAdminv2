<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ContactSiteController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ContactSiteController::class)->group(function () {
    Route::get('/todos-contatos', 'all')->name('site.contact.all');
});
Route::prefix('vistoria')->group(function () {
    Route::controller(SurveyController::class)->group(function () {
        Route::get('all', 'all')->name('vistoria.all');
    });
});