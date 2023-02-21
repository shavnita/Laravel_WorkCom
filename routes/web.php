<?php

use App\Http\Controllers\AccidentController;
use App\Http\Controllers\AccidentNotificationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndustryContoller;
use App\Http\Controllers\InjuryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UpdateController;
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

Route::get('/', [HomeController::class, 'index']);

Route::group(['middleware'=>['auth']], function(){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::resource('categories', CategoryController::class)->middleware('is_admin');
    Route::resource('categories', CategoryController::class);

    Route::resource('employer', EmployerController::class);

    Route::resource('industry', IndustryContoller::class);

    Route::resource('accident', AccidentController::class);

    Route::resource('injury', InjuryController::class);

    Route::resource('notification', AccidentNotificationController::class);

    Route::resource('updates', UpdateController::class);

});



require __DIR__.'/auth.php';


