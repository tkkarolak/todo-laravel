<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

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

Route::middleware('auth')->group(function() {

    Route::get('/jobs/list', [JobController::class, 'index'])->name('jobs.list');
    Route::get('/jobs/calendar/{datetime?}', [JobController::class, 'calendar'])->name('jobs.calendar');
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs/create', [JobController::class, 'store']);
    Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.details');
    Route::get('/jobs/{id}/edit', [JobController::class, 'edit'])->name('jobs.edit');
    Route::patch('/jobs/{id}/edit', [JobController::class, 'update']);
    Route::get('jobs/{id}/accept', [JobController::class, 'accept'])->name('jobs.accept');
    Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('jobs.delete');

});

require __DIR__.'/auth.php';
