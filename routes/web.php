<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/projects', [ProjectController::class, 'index'])
        ->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])
        ->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])
        ->name('projects.store');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])
        ->name('projects.show');
});


Route::middleware(['auth'])->group(function () {
    // Trigger a scan for a project
    Route::post('/projects/{project}/scan', [ScanController::class, 'store'])
        ->name('projects.scan.store');
});


require __DIR__ . '/auth.php';
