<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApproveController;
use App\Http\Controllers\RegisterLeavesController;
use App\Http\Controllers\HelpCenterController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\JobHistoryController;
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

    Route::get('/profile', [ UserController::class, "profile" ])->name('profile');

    Route::get('/user', [ UserController::class, "index_view" ])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');
    Route::post('/createUser', [ UserController::class, "createUser" ])->name('createUser');
   
   

    Route::get('/approve_meeting', [ ApproveController::class, "index" ])->name('approve_meeting');
    Route::get('/request_meeting', [ ApproveController::class, "index_request" ])->name('request_meeting');
    
    Route::get('/register_leaves', [ RegisterLeavesController::class, "index" ])->name('register_leaves');
    Route::view('/leaves/edit_main/{userId}', "pages.leaves.leaves-edit_main")->name('leaves.edit');
    Route::view('/leaves_edit/{userId}',[ RegisterLeavesController::class, "editLeaves"])->name('leaves_edit');
    
    

    Route::get('/help_center', [ HelpCenterController::class, "index" ])->name('help_center');

    Route::get('/inventory', [ InventoryController::class, "index" ])->name('inventory');

    Route::get('/job_history_main', [ JobHistoryController::class, "index" ])->name('job_history_main');
});
