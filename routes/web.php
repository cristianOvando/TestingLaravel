<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\CategoriesController;

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

Route::get('/home', function () {
    return view('home');
});

Route::get('/tasks', [TasksController::class, 'index'])->name('tasks');

Route::post('/tasks', [TasksController::class, 'store'])->name('tasks');

Route::get('/tasks/{id}', [TasksController::class, 'show'])->name('tasks-edit');
Route::patch('/tasks/{id}', [TasksController::class, 'update'])->name('tasks-update');
Route::delete('/tasks/{id}', [TasksController::class, 'destroy'])->name('tasks-destroy');

Route::resource('categories', CategoriesController::class);
