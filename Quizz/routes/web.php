<?php

use App\Http\Controllers\UserController;
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
    return redirect("/questions");
});

Route::get('/users/login', [UserController::class, 'login'])->name('login');
Route::post('/users/answer-login', [UserController::class, 'postLogin'])->name('post_login');
Route::post('/users/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/users/register', [UserController::class, 'register'])->name('register');
Route::post('/users/answer-register', [UserController::class, 'postRegister'])->name('post_register');


Route::get('/questions', [\App\Http\Controllers\QuestionController::class, 'index'])->middleware('auth');
Route::get('/questions/create', [\App\Http\Controllers\QuestionController::class, 'create'])->name("questions.create") ->middleware('auth');
Route::post('/questions/save', [\App\Http\Controllers\QuestionController::class, 'save'])->name("questions.save")->middleware('auth');
Route::post('/questions/post_result', [\App\Http\Controllers\QuestionController::class, 'resultPost'])->name("post_result")->middleware('auth');
Route::get('/questions/result', [\App\Http\Controllers\QuestionController::class, 'result'])->name("get_result")->middleware('auth');
