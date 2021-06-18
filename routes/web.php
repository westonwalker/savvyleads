<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;

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

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [LeadController::class, 'index'])->middleware(['auth'])->name('dashboard');

    Route::get('/clients', [ClientController::class, 'index'])->middleware(['auth', 'admin'])->name('clients.index');
    Route::get('/clients/create', [ClientController::class, 'create'])->middleware(['auth', 'admin'])->name('clients.create');
    
    Route::get('/leads', [LeadController::class, 'index'])->middleware(['auth'])->name('leads.index');

    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->middleware(['auth'])->name('users.edit');

    Route::get('/jobs', [JobController::class, 'index'])->middleware(['auth'])->name('jobs.index');
    
    Route::get('/analytics', function () {
        return view('analytics.index');
    })->middleware(['auth'])->name('analytics.index');

});

require __DIR__.'/auth.php';