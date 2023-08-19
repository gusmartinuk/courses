<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ContentController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    /* Admin section */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/courses')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('courses.index');
        Route::get('/create', [CourseController::class, 'create'])->name('courses.create');
        Route::post('/', [CourseController::class, 'store'])->name('courses.store');
        Route::get('/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
        Route::put('/{course}', [CourseController::class, 'update'])->name('courses.update');
        Route::delete('/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
    });

    Route::prefix('/courses/{course_id}/lessons')->group(function () {
        Route::get('/', [LessonController::class, 'index'])->name('lessons.index');
        Route::get('/create', [LessonController::class, 'create'])->name('lessons.create');
        Route::post('/', [LessonController::class, 'store'])->name('lessons.store');
        Route::get('/{lesson}/edit', [LessonController::class, 'edit'])->name('lessons.edit');
        Route::put('/{lesson}', [LessonController::class, 'update'])->name('lessons.update');

        Route::delete('/{lesson}', [LessonController::class, 'destroy'])->name('lessons.destroy');
        });

    });
    Route::prefix('/contents')->group(function () {
        Route::get('/', [ContentController::class, 'index'])->name('contents.index');
        Route::get('/create', [ContentController::class, 'create'])->name('contents.create');
        Route::post('/', [ContentController::class, 'store'])->name('contents.store');
        Route::get('/{content}/edit', [ContentController::class, 'edit'])->name('contents.edit');
        Route::put('/{content}', [ContentController::class, 'update'])->name('contents.update');
        Route::delete('/{content}', [ContentController::class, 'destroy'])->name('contents.destroy');
    });

require __DIR__.'/auth.php';

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
