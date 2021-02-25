<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\LogController;
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
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('tasks', \App\Http\Controllers\TasksController::class);
    Route::resource('users', \App\Http\Controllers\UsersController::class);
    Route::resource('items', \App\Http\Controllers\ItemController::class);
    Route::get("/items/takeitem/{item:id}", [ItemController::class, 'takeitem'])->name("items.takeitem");
    Route::patch("/items/updateUser/{item}", [ItemController::class, 'updateUser'])->name("items.updateUser");
    Route::get('/logs/index/', [LogController::class, 'index'])->name('logs.index');
    Route::get('/logs/index/csv/', [LogController::class, 'exportCsv'])->name('logs.csv');
    Route::resource('category', \App\Http\Controllers\CategoryController::class);
});
