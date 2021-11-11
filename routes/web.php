<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApproveController;
use App\Http\Controllers\RegisterLeavesController;
use App\Http\Controllers\HelpCenterController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\JobHistoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RequestMeetingController;

use App\Mail\TicketStatusEmail;

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
    Route::get('/cancel_job/{ticket_id}', [ JobController::class, "cancel_job" ])->name('cancel_job');
    Route::get('/reactivate/{ticket_id}', [ JobController::class, "reactivate" ])->name('reactivate');
    Route::post('/request_job', [ JobController::class, "request_job" ])->name('request_job');

    Route::get('/tracker', [ JobController::class, "tracker" ])->name('tracker');
    Route::get('/ticket/{ticket_id}', [JobController::class, 'ticket'])->name('ticket');

    Route::get('/profile', [ UserController::class, "profile" ])->name('profile');
    Route::get('/profile_edit/{id}', [ UserController::class, "profile_edit" ])->name('profile_edit');
    Route::post('/updateProfile', [ UserController::class, "updateProfile" ])->name('updateProfile');

    Route::get('/user', [ UserController::class, "index_view" ])->name('user');
    Route::get('/user_new', [ UserController::class, "index_view_new" ])->name('user_new');


    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');
    Route::post('/createUser', [ UserController::class, "createUser" ])->name('createUser');
   
   

    Route::get('/approve_meeting', [ ApproveController::class, "index" ])->name('approve_meeting');
    Route::get('/appMeeting/{id}', [ ApproveController::class, "appMeeting" ])->name('appMeeting');
    Route::get('/rejMeeting/{id}', [ ApproveController::class, "rejMeeting" ])->name('rejMeeting');
    Route::get('/meeting_edit/{id}', [ ApproveController::class, "meeting_edit" ])->name('meeting_edit');
    Route::post('/updateMeeting', [ ApproveController::class, "updateMeeting" ])->name('updateMeeting');


    Route::get('/request_meeting', [ RequestMeetingController::class, "index" ])->name('request_meeting');
    Route::post('/requestMeeting', [ RequestMeetingController::class, "requestMeeting" ])->name('requestMeeting');
    
   
   
   
    Route::get('/register_leaves', [ RegisterLeavesController::class, "index" ])->name('register_leaves');
    Route::get('/leaves_edit', [ RegisterLeavesController::class, "index_2" ])->name('leaves_edit');
    Route::post('/requestleaves', [ RegisterLeavesController::class, "requestleaves" ])->name('requestleaves');
    Route::get('/leaves_edit/{id}', [ RegisterLeavesController::class, "leaves_edit" ])->name('leaves_edit');
    Route::post('/updateLeaves', [ RegisterLeavesController::class, "updateLeaves" ])->name('updateLeaves');
    Route::get('/delete/{id}', [ RegisterLeavesController::class, "delete" ])->name('delete');

    
    

    Route::get('/help_center', [ HelpCenterController::class, "index" ])->name('help_center');
    Route::get('/downloadFile', [ HelpCenterController::class, "downloadFile" ])->name('downloadFile');

    Route::get('/inventory', [ InventoryController::class, "index" ])->name('inventory');
    Route::post('/update_stock', [ InventoryController::class, "add_stock" ])->name('update_stock');
    Route::post('/add_transaction', [ InventoryController::class, "add_transaction" ])->name('add_transaction');
    Route::get('/all_transaction', [ InventoryController::class, "all_transaction" ])->name('all_transaction');
    Route::post('/addStock', [ InventoryController::class, "addStock" ])->name('addStock');
    
    //only use to initiate/add base item
    Route::get('/init_inventory', [ InventoryController::class, "init_state" ])->name('init_inventory');

    Route::get('/job_history_main', [ JobHistoryController::class, "index" ])->name('job_history_main');
    

    Route::post('/post_message', [ PostController::class, "post_message" ])->name('post_message');

    // job status 
    Route::get('/acknowledged/{ticket_id}', [ JobController::class, "acknowledged" ])->name('acknowledged');
    Route::get('/prepared/{ticket_id}', [ JobController::class, "prepared" ])->name('prepared');
    Route::get('/approved/{ticket_id}', [ JobController::class, "approved" ])->name('approved');
    Route::get('/sent/{ticket_id}', [ JobController::class, "sent" ])->name('sent');
    Route::get('/received/{ticket_id}', [ JobController::class, "received" ])->name('received');
    Route::get('/closed/{ticket_id}', [ JobController::class, "closed" ])->name('closed');

    // assign printer 
    Route::post('/assign_printer/{ticket_id}', [ JobController::class, "assign_printer" ])->name('assign_printer');
    
    // test mailable 
    Route::get('/testmail', function(){
        return new TicketStatusEmail();
    });
    
});
