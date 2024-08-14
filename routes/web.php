<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Tag\TagController;
use App\Http\Controllers\Task\TaskController;
use App\Http\Middleware\CorrectUrl;
use App\Models\Task;
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
})->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/tasks', TaskController::class)
        ->missing(function() {
            return redirect()->route('tasks.index');
        });
    Route::resource('/tags', TagController::class)
        ->missing(function(){
            return redirect()->route('tags.index');
        });
    Route::get('/tasks-ready', [TaskController::class, 'indexReadyTask'])->name('tasks.index.ready');
    Route::post('/tasks-ready/{task}', [TaskController::class, 'addReadyTask'])->name('task.add.ready');
    Route::get('/tasks-ready/{task}', [TaskController::class, 'showReadyTask'])->name('tasks.show.ready');
});

Route::fallback(function(){
    return redirect()->route('home');
});

require __DIR__.'/auth.php';
