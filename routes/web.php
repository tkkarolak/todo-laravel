<?php

use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\JobController;
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

Route::get('/helloworld', [HelloWorldController::class, 'showHelloWorld']);

Route::get('/jobs/list', [JobController::class, 'index']);

Route::get('/jobs/calendar/{datetime?}', [JobController::class, 'calendar'])->name('jobs.calendar');


