<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\GuidelineController;
use App\Http\Controllers\HomeController;

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

// we need to change this welcome page as well, remove this comment when view part is completed.
Route::get('/', function () {
    return view('welcome');
});

// route for home page for both authenticated and unauthenticated users
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// new routes added
Route::get('/scholarships', [ScholarshipController::class, 'index'])->name('scholarships');

Route::middleware(['auth'])->group(function () {
    // Routes for authenticated users
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');
    
});

Route::get('/downloads', [DownloadController::class, 'index'])->name('downloads');
Route::get('/guidelines',[GuidelineController::class, 'index'])->name('guidelines');
require __DIR__.'/auth.php';
