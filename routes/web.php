
<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user/verification/{token}', [App\Http\Controllers\ResetEmailController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\ResetEmailController::class, 'updatePassword'])->name('password.update');

Route::post('/send/request/friend',[App\Http\Controllers\InvitationController::class,'send'])->name('send.friend.request');
Route::get('/friend/request/{id}/{status}',[App\Http\Controllers\InvitationController::class,'repond'])->name('repond.friend.request');

Route::post('/create/group',[App\Http\Controllers\GroupController::class,'create'])->name('create.group');
Route::post('/add/user/group',[App\Http\Controllers\GroupController::class,'add'])->name('add.group');
Route::get('/group/request/{id}/{status}',[App\Http\Controllers\GroupController::class,'repond'])->name('repond.group.request');
Route::get('/group/delete/{id}/{status}',[App\Http\Controllers\GroupController::class,'delete'])->name('delete.group.request');

// Chat
Route::post('/send/message',[App\Http\Controllers\ChatController::class,'send'])->name('send.message');
Route::get('/get/message/{id}',[App\Http\Controllers\ChatController::class,'all'])->name('all.message');
Route::get('/get/last/message/{id}/{last}',[App\Http\Controllers\ChatController::class,'last'])->name('last.message');
Route::post('/send/file',[App\Http\Controllers\ChatController::class,'sendFile'])->name('send.file');

// Group
Route::post('/send/group/message',[App\Http\Controllers\ChatController::class,'sendGroup'])->name('group.send.message');
Route::get('/get/group/message/{id}',[App\Http\Controllers\ChatController::class,'allGroup'])->name('all.message');
Route::get('/get/group/last/message/{id}/{last}',[App\Http\Controllers\ChatController::class,'groupLast'])->name('group.last.message');

//Reset
Route::post('/send/email',[App\Http\Controllers\ResetEmailController::class,'sendEmail'])->name('send.email');


//Content Check
Route::get('/check/adult/content',[App\Http\Controllers\CheckController::class,'get']);
Route::post('/check/adult/content',[App\Http\Controllers\CheckController::class,'check'])->name('check.image');
Route::get('/check/image/{id}',[App\Http\Controllers\CheckController::class,'getImage']);
