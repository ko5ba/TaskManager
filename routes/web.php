<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Task\TaskController;
use App\Http\Middleware\CorrectUrl;
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
});

Route::fallback(function(){
    return redirect()->route('home');
});

/*
*Добавить после обновления таблицы tags
*Route::get('/tags', App\Http\Controllers\Tag\TagIndexController::class)->name('tags.index');
*Route::get('/tag_create', App\Http\Controllers\Tag\TagCreateController::class)->name('tags.create');
*Route::post('/tags', App\Http\Controllers\Tag\TagStoreController::class)->name('tags.store');
*Route::get('/tags/{tag}', App\Http\Controllers\Tag\TagShowController::class)->name('tags.show');
*Route::get('/tags/{tag}/edit', App\Http\Controllers\Tag\TagEditController::class)->name('tags.edit');
*Route::patch('/tags/{tag}', App\Http\Controllers\Tag\TagUpdateController::class)->name('tags.update');
*Route::delete('/tags/{tag}', App\Http\Controllers\Tag\TagDestroyController::class)->name('tags.destroy');
});
*/


require __DIR__.'/auth.php';
