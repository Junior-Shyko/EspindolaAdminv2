<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ContactSiteController;
use App\Models\ContactSite;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');  

});

Route::controller(ContactSiteController::class)->group(function () {
    Route::get('/contato-site', 'index')->name('contato-site');
    Route::get('editar-contato/{id}', 'edit')->name('editar-contato');
    Route::post('/salvar-contato', 'store')->name('save.contact');
    Route::patch('editar-contato/{id}', 'update')->name('update.contact');
    Route::delete('excluir-contato/{id}', 'destroy')->name('destroy.contact');
});
