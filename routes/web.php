<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/tasks', App\Http\Controllers\Task\TaskIndexController::class)->name('tasks.index');
    Route::get('/create', App\Http\Controllers\Task\TaskCreateController::class)->name('tasks.create');
    Route::post('/tasks', App\Http\Controllers\Task\TaskStoreController::class)->name('tasks.store');
    Route::get('/tasks/{task}', App\Http\Controllers\Task\TaskShowController::class)->name('tasks.show');
    Route::get('/tasks/{task}/edit', App\Http\Controllers\Task\TaskEditController::class)->name('tasks.edit');
    Route::patch('/tasks/{task}', App\Http\Controllers\Task\TaskUpdateController::class)->name('tasks.update');
    Route::delete('/tasks/{task}', App\Http\Controllers\Task\TaskDestroyController::class)->name('tasks.destroy');
});

require __DIR__.'/auth.php';
