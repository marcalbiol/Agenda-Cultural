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

// Here is where you can register web routes for you application. These
// routes are loaded by the RoueServiceProvider within a group which
// contains the "web" middleware group. Now create something great!


Route::get('/', function () {
    return view('welcome');
});

/**
 * eventName = denominaci
 * eventCodi = 20210120034
 */
Route::get('events/name/{eventName}/codi/{eventCodi}', [EventsController::class, 'getEventNameWithCodi']);

/**
 * eventos por categoria
 */
Route::get('events/category/ambit/{categoryName}', [EventsController::class, 'getEventsFromCategory']);
Route::get('events/nameEvent/{nameEvent}', [EventsController::class, 'getEventName']);

/**
 * Llistat de tots els events que es facin
 * a la província ordenats per data d’inici.
 * No es mostren els esdeveniments finalitzats.
 */
Route::get('events/provincia/from/{provinceName}', [EventsController::class, 'getEventsFromProvince']);

Route::get('events/name/{nameEvent}', [EventsController::class, 'getEventName']);

/**
 * http://127.0.0.1:8000/events/provincia/tarragona/categoria/teatre
 * permite buscar evento por provincia y categoria
 */
Route::get('events/provincia/{provinceName}/categoria/{categoryName}', [EventsController::class, 'getEventsFromProvinceAndCategory']);

Route::get('/events/{event}', [EventsController::class, 'show']);

Route::get('/events/date/{year}/{month}', [EventsController::class, 'getByDate']);

Route::get('/events/generate-sitemap', [EventsController::class, 'generateSitemap']);

