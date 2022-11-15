<?php

use App\Http\Controllers\EventsController;
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

Route::get('/events', [EventsController::class, 'index']);

/**
 * filtra por categoria
 * teatre, exposicions, concerts, fires-i-mercats
 */
Route::get('/events/category/{category}', [EventsController::class, 'eventsCategory']);

/**
 * filtra por municipio
 * tarragona, lleida, girona, barcelona
 */
Route::get('/events/ubicacions/{ubicacio}', [EventsController::class, 'eventsMunicipi']);
