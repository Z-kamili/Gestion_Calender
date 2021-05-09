<?php

use App\Http\Controllers\EventController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('home');
})->name('dashboard');

Route::group(['middleware' => ['auth']],function(){

    Route::resource('Events', 'App\Http\Controllers\CalendarController');
    Route::resource('Statistic', 'App\Http\Controllers\Gestion_StatisticController');
    Route::get('/event',[EventController::class,'index']);
    Route::post('/event/Add',[EventController::class,'store']);
    Route::get('/event/show',[EventController::class,'show']);
    Route::post('/event/edit/{id}',[EventController::class,'edit']);
    Route::post('/event/update/{event}',[EventController::class,'update']);
    Route::post('/event/delete/{id}',[EventController::class,'destroy']);

});


