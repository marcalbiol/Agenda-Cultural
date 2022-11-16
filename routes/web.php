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


// TODO cambiar nombre rutas
Route::get('/events/id/{id}', [EventsController::class, 'eventsById']);


/**
 * muestra eventos de un año en especifico
 *
 */
Route::get('events/nextYear/{year}', [EventsController::class, 'eventsYear']);

/**
 * filtra por categoria
 * teatre, exposicions, concerts, fires-i-mercats
 */
Route::get('/events/category/{categoria}', [EventsController::class, 'eventsCategory']);

/**
 * filtra por municipio
 * tarragona, lleida, girona, barcelona
 */
Route::get('/events/ubicacions/{ubicacio}', [EventsController::class, 'eventsMunicipi']);
