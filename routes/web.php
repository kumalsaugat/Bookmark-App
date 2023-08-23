<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

    //Bookmarks
    Route::get('/bookmarks', [App\Http\Controllers\BookmarkController::class, 'index'])->name('bookmarks.index');
    Route::get('/bookmark/add', [App\Http\Controllers\BookmarkController::class, 'add'])->name('bookmark.add');
    Route::get('/bookmark/view/{bookmark}', [App\Http\Controllers\BookmarkController::class, 'view'])->name('bookmark.view');
    Route::post('/bookmark/preview', [App\Http\Controllers\BookmarkController::class, 'getPreviewData'])->name('bookmark.getPreviewData');
    Route::post('/bookmark/make-active',[App\Http\Controllers\BookmarkController::class, 'makeActive'])->name('bookmark.active');

});



require __DIR__.'/auth.php';
