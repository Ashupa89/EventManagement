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
    return view('add_event');
});
Route::post('add-event', [\App\Http\Controllers\EventController::class, 'createEvent']);
Route::post('update-event/{id}', [\App\Http\Controllers\EventController::class, 'updateEvent']);
Route::get('event-list', [\App\Http\Controllers\EventController::class, 'index']);
Route::get('edit-event/{event}', [\App\Http\Controllers\EventController::class, 'editEvent']);
Route::get('view-event/{event}', [\App\Http\Controllers\EventController::class, 'viewEvent']);
