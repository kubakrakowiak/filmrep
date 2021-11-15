<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\DirectorsController;
use App\Http\Controllers\ReviewsController;
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
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('/movies', MoviesController::class, [
    'except' => ['index', 'show']
])->middleware(['auth', 'permission']);
Route::resource('/movies', MoviesController::class, [
    'only' => ['index', 'show']
]);

Route::resource('/actors', ActorsController::class, [
    'except' => ['index', 'show']
])->middleware(['auth', 'permission']);;
Route::resource('/actors', ActorsController::class, [
    'only' => ['index', 'show']
]);

Route::resource('/directors', DirectorsController::class, [
    'except' => ['index', 'show',]
])->middleware(['auth', 'permission']);;
Route::resource('/directors', DirectorsController::class, [
    'only' => ['index', 'show',]
]);

Route::resource('/movies/{id}/review', ReviewsController::class, [
    'except' => ['index']
])->middleware(['auth']);
