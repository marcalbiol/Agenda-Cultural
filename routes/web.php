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


/**
 * where : columna
 * value : valor columna
 * orderBy : columna
 * orderType : desc/asc
 * URL -> http://127.0.0.1:8000/events/where/tags_categor_es/agenda:categories/infantil/order-by/tags_categor_es/desc
 */
Route::get('/events/where/{where}/{value}/order-by/{orderBy}/{orderType}', [EventsController::class, 'index'])
    ->where('value', '(.*(?:%2F:)?.*)');

Route::get('/events/{event}', [EventsController::class, 'getById']);
