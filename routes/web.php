<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RentalController;
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


Route::get('/new-genre', [GenreController::class, 'create'])->name('genres.create');
Route::post('/new-genre', [GenreController::class, 'store'])->name('genres.store');

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/new-book', [BookController::class, 'create'])->name('books.create');
Route::post('/new-book', [BookController::class, 'store'])->name('books.store');

Route::get('/books/book/{id}', [BookController::class, 'show'])->name('books.show');
Route::delete('/books/book/{id}', [BookController::class, 'destroy'])->name('books.destroy');

Route::get('/rentals', [RentalController::class, 'index'])->name('rentals.index');
Route::post('/rentals/book/{id}', [RentalController::class, 'store'])->name('rentals.store');

Route::get('/back', [RentalController::class, 'showBack'])->name('rentals.showBack');
Route::post('/back/{id}', [RentalController::class, 'updateBack'])->name('rentals.updateBack');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 
require __DIR__.'/auth.php';
// Route::resource('genres', GenreController::class);
// Route::resource('books', BookController::class);
// Route::get('books/{book}/rent', [RentalController::class, 'create'])->name('books.rent');
// Route::post('books/{book}/rent', [RentalController::class, 'store']);
// Route::resource('rentals', RentalController::class);

