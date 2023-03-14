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
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/restaurants',[ RestaurantController::class,'index']);
Route::get('/restaurant/{slug}',[RestaurantController::class, 'show']);
Route::get('/restaurant/{slug}/menu',[ItemsController::class,'show']);
Route::get('/search/parameters/{name}',[SearchController::class,'parameters']);
Route::get('/search/{city?}/{cuisine?}/{price?}',[SearchController::class,'search']);

