<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test', function () {
      Mail::to('jeffrey@laracast.com')->send(
        new JobPosted()
      );
      return 'Done';
});
Route::view('/', 'home');
Route::view('/contact', 'contact');
// Route::resource('jobs', JobController::class)->only('index','show');
// Route::resource('jobs', JobController::class)->except(['index','show'])->middleware('auth');
Route::get('/jobs', [JobController::class,'index']);
Route::get('/jobs/create',[JobController::class,'create']);
Route::get('/jobs/{job}',[JobController::class,'show']);
Route::post('/jobs',[JobController::class,'store'])->middleware('auth');
Route::get('/jobs/{job}/edit',[JobController::class,'edit'])
->middleware('auth')
->can('edit','job');

Route::patch('/jobs/{job}',[JobController::class,'update']);
Route::delete('/jobs/{job}',[JobController::class,'destroy']);

//Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
