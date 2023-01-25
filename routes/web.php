<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MailSenderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
Route::get('/', function () {
    return view('welcome');
});

*/
    //home views
    Route::get('/', [JobController::class, 'indexshow']);

    Route::get('/web', [JobController::class, 'ShowWeb']);
    Route::get('/graphics', [JobController::class, 'ShowGraphics']);

//admin Dashboard


Route::get('/dashboard', [JobController::class, 'dashboardshow'])->middleware(['auth', 'verified'])->name('dashboard');

Route::Post('/UploadJob', [JobController::class, 'UploadJobs'])->middleware(['auth', 'verified'])->name('uploadJob');

Route::get('edit/{id}', [JobController::class,'requestview'])->middleware(['auth', 'verified'])->name('EditJob');

Route::Post('/EditJob', [JobController::class, 'EditJob'])->middleware(['auth', 'verified'])->name('EditJob');

Route::get('/delete/{id}', [JobController::class, 'DeleteJob'])->middleware(['auth', 'verified'])->name('EditJob');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//send mail route
    Route::post('contact', [MailSenderController::class, 'sendMail']);
