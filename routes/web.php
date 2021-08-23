<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
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
    // return view('welcome');
    return redirect('login');
});

Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function() {
    // Route::view('/dashboard', "dashboard")->name('dashboard');
    Route::get('/dashboard', [TaskController::class, "index"])->name('dashboard');

    Route::get('/new_job', [ JobController::class, "index" ])->name('new_job');
    Route::post('/request_job', [ JobController::class, "request_job" ])->name('request_job');

    Route::get('/tracker', [ JobController::class, "tracker" ])->name('tracker');

    Route::get('/profile', [ UserController::class, "profile" ])->name('profile');

    Route::get('/user', [ UserController::class, "index_view" ])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');
});
