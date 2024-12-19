<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//github
Route::resource('todos', TodoController::class);
Route::post('todos/mark-completed', [TodoController::class, 'markAsCompleted'])->name('todos.mark-completed');
Route::post('todos/bulk-delete', [TodoController::class, 'bulkDelete'])->name('todos.bulk-delete');
