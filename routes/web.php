<?php

use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('layouts.main');
});

Route::get('/', function () {
    return view('tasks.create');
});

Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');


Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');


Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');


// Rute resource untuk Task tanpa middleware auth
Route::resource('tasks', TaskController::class);



