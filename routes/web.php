
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

Route::post('/send/request/friend',[App\Http\Controllers\InvitationController::class,'send'])->name('send.friend.request');
Route::get('/friend/request/{id}/{status}',[App\Http\Controllers\InvitationController::class,'repond'])->name('repond.friend.request');

Route::post('/create/group',[App\http\Controllers\GroupController::class,'create'])->name('create.group');
Route::post('/add/user/group',[App\http\Controllers\GroupController::class,'add'])->name('add.group');
Route::get('/group/request/{id}/{status}',[App\Http\Controllers\GroupController::class,'repond'])->name('repond.group.request');

// Chat
Route::post('/send/message',[App\Http\Controllers\ChatController::class,'send'])->name('send.message');
Route::get('/get/message/{id}',[App\Http\Controllers\ChatController::class,'all'])->name('all.message');
Route::get('/get/last/message/{id}/{last}',[App\Http\Controllers\ChatController::class,'last'])->name('last.message');
Route::post('/send/file',[App\Http\Controllers\ChatController::class,'sendFile'])->name('send.file');

// Group
Route::post('/send/group/message',[App\Http\Controllers\ChatController::class,'sendGroup'])->name('group.send.message');
Route::get('/get/group/message/{id}',[App\Http\Controllers\ChatController::class,'allGroup'])->name('all.message');
Route::get('/get/group/last/message/{id}/{last}',[App\Http\Controllers\ChatController::class,'groupLast'])->name('group.last.message');
