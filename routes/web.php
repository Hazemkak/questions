<?php

use App\Http\Controllers\AskController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/ask',[AskController::class,'index'])->name('ask');
Route::post('/ask',[AskController::class,'store']);
Route::get('/questions',[QuestionController::class,'index'])->name('questions');
Route::post('/questions',[QuestionController::class,'store']);
Route::get('/questions/{question}',[QuestionController::class,'show']);
Route::post('/questions/delete/{answer}',[QuestionController::class,'delete']);
Route::post('/questions/remove/{question}',[QuestionController::class,'remove']);
