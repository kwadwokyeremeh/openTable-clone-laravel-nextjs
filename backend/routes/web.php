<?php

use App\Http\Controllers\ItemsController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\SearchController;
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
    return ['Laravel' => app()->version()];
});
require __DIR__.'/auth.php';
Route::get('/restaurants',[ RestaurantController::class,'index']);
Route::get('/restaurant/{slug}',[RestaurantController::class, 'show']);
Route::get('/restaurant/{slug}/menu',[ItemsController::class,'show']);
Route::get('/search/parameters/{name}',[SearchController::class,'parameters']);
Route::get('/search/{city?}/{cuisine?}/{price?}',[SearchController::class,'search']);

