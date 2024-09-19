<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

// ================ MOVIEWS ===============

Route::get('/page1', [MovieController::class, 'index']);
Route::get('/add-movie-form', [MovieController::class, 'show_add_form']);
Route::post('/add-movie', [MovieController::class, 'add_movie']);
Route::get('/delete-movie/{id}', [MovieController::class, 'do_delete']);
Route::get('/edit-movie-form/{id}', [MovieController::class, 'show_edit_form']);
Route::post('/edit-movie/{id}', [MovieController::class, 'edit_movie']);

// ================ BOOK ===============

Route::get('/page2', [BookController::class, 'index'])->name('books.index');

Route::get('/add-book-form', [BookController::class, 'show_add_form'])->name('books.create');
Route::post('/add-book', [BookController::class, 'add_book'])->name('books.store');
Route::get('/delete-book/{id}', [BookController::class, 'delete_book'])->name('books.delete');
Route::get('edit-form-book/{id}', [BookController::class, 'show_edit_form'])->name('books.edit');
Route::post('edit-form-book/{id}', [BookController::class, 'edit_book'])->name('books.update');

Route::get('/dummy-movies', function () {
    $movies = [];
    for ($i = 0; $i < 10; $i++) {
        $movie = [
            'category_id' => fake()->numberBetween(1, 3),
            'title' => fake()->sentence(3),
            'decription' => fake()->paragraph,
            'star_rating' => fake()->numberBetween(1, 10),
            'director' => fake()->name,
            'date_published' => fake()->date,
            'picture' => fake()->imageUrl,
            'created_at' => now()
        ];
        DB::table('movies')->insert($movie);
        $movies[] = $movie;
    }
    return "Done!";
});
