<?php

use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReplyController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('discussion', DiscussionController::class);
Route::resource('discussion/{discussion}/replies', ReplyController::class);

Route::post('discussion/{discussion}/replies/{reply}/mark-as-best-reply', [DiscussionController::class, 'reply'])->name('discussion.best-reply');
