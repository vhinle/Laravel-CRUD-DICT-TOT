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

# Pages
Route::get('/page1', [MovieController::class, 'index']);
Route::get('/add-movie-form', [MovieController::class, 'show_add_form']);
Route::post('/add-movie', [MovieController::class, 'add_movie']);


Route::post('/delete-movie/{id}', [MovieController::class, 'do_delete']);
Route::get('/delete-movie/{id}', [MovieController::class, 'do_delete']);


Route::get('/edit-movie-form/{id}', [MovieController::class, 'show_edit_form']);
Route::post('/edit-movie/{id}', [MovieController::class, 'edit_movie']);



// Route::get('/add-movie-form', function () {
//     return view('pages.add-movie-form');
// });

// Route::post('/add-movies', function (Request $request) {

//     $query = DB::table('movies')
//         ->insert([
//             'title' => $request->input('title'),
//             'decription' => $request->input('description'),
//             'star_rating' => $request->input('star_rating'),
//             'director' => $request->input('director'),
//             'date_published' => $request->input('date_published'),
//             'created_at' => now()
//         ]);

//     if ($query) {
//         return redirect(url('/page1'))->with('success', 'New Record Successfully Saved');
//     }
// });
// Route::get('/add-movies', function () {

//     $query = DB::table('movies')
//         ->insert([
//             'title' => 'Batman',
//             'decription' => 'Action, Suspense',
//             'star_rating' => 9.3,
//             'director' => "Warner Bros.",
//             'date_published' => '2024-01-02',
//             'created_at' => now()
//         ]);

//     if ($query)
//         echo 'Saved';
// });

// Route::get('/delete-movie', function () {

//     $query = DB::table('movies')
//         ->where('id', 5)
//         ->delete();

//     if ($query)
//         echo 'Record Deleted';
// });

// Route::get('/update-movie', function () {

//     $query = DB::table('movies')
//         ->where('id', 1)
//         ->update([
//             'title' => 'Batman 4',
//             'decription' => 'Action, Suspense',
//             'star_rating' => 9.3,
//             'director' => "Warner Bros.",
//             'date_published' => '2024-01-02',
//             'updated_at' => now()
//         ]);

//     if ($query)
//         echo 'Saved';
// });



// ================ BOOK ===============

Route::get('/page2', [BookController::class, 'index'])->name('books.index');

Route::get('/add-book-form', [BookController::class, 'show_add_form'])->name('books.create');
Route::post('/add-book', [BookController::class, 'add_book'])->name('books.store');

Route::get('/delete-book/{id}', [BookController::class, 'delete_book'])->name('books.delete');

Route::get('edit-form-book/{id}', [BookController::class, 'show_edit_form'])->name('books.edit');
Route::post('edit-form-book/{id}', [BookController::class, 'edit_book'])->name('books.update');

// Route::get('/add-book', function () {

//     $query = DB::table('books')
//         ->insert([
//             'title' => fake()->sentence(),
//             'description' => fake()->text(),
//             'country_id' => fake()->numberBetween(1, 10),
//             'stocks' => fake()->numberBetween(1, 500),
//             'amount' => fake()->randomFloat(2, 1, 1000),
//             'photo' => fake()->imageUrl(),
//             'created_at' => now()
//         ]);

//     if ($query)
//         echo 'New Record Successfully Saved';
// });

Route::get('/update-book/{id}', function ($id) {

    $query = DB::table('books')
        ->where('id', $id)
        ->update([
            'title' => fake()->sentence(),
            'description' => fake()->text(),
            'country_id' => fake()->numberBetween(1, 10),
            'stocks' => fake()->numberBetween(1, 500),
            'amount' => fake()->randomFloat(2, 1, 1000),
            'photo' => fake()->imageUrl(),
            'updated_at' => now()
        ]);

    if ($query)
        echo 'Record Successfully Updated';
});






Route::get('/page3', function () {
    return view('pages.page3');
});
Route::get('/page4', function () {
    return view('pages.page4-helper');
});

Route::get('/query-test', function () {

    //Raw Query
    $data = DB::select("SELECT * FROM movies");

    //Query Builder
    $data = DB::table('movies')->get(); //chaining

    $data = DB::table('movies')->where('id', 4)->get();

    /**
     * Retrieve all movies from the 'movies' table where the 'id' is greater than 50.
     *
     * This query fetches the records from the 'movies' table in the database
     * where the 'id' column has a value greater than 50.
     *
     * @return \Illuminate\Support\Collection The collection of movie records.
     */
    $data = DB::table('movies')->where('id', '>', 50)->get();


    /**
     * Retrieve a collection of movies from the database where the movie ID is greater than 50
     * and the creation date is less than 3.
     *
     * @return \Illuminate\Support\Collection A collection of movies matching the criteria.
     */
    $data = DB::table('movies')
        ->where('id', '>', 50)
        ->where('created_at', '<', 3)
        ->get();


    $data = DB::table('movies')
        ->where('id', '>', 50)
        ->whereOr('created_at', '<', 3)
        ->get();

    $data = DB::table('movies')
        ->whereBetween('created_at', ['2024-9-1', '2024-10-30'])
        ->orderBy('title', 'asc')
        ->get();

    $data = DB::table('movies')
        ->select('title', 'star_rating')
        ->whereBetween('created_at', ['2024-9-1', '2024-10-30'])
        ->orderBy('title', 'asc')
        ->get();

    $data = DB::table('movies')
        ->orderBy('title', 'asc')
        ->count(); //avg, sum

    $data = DB::table('movies')
        ->orderBy('title', 'asc')
        ->avg('star_rating');

    $data = DB::table('movies')
        ->orderBy('title', 'asc')
        ->sum('star_rating');

    $data = DB::table('movies')
        ->where([
            ['id', '>', 50],
            ['created_at', '<', 3]
        ])->get();

    $data = DB::table('movies')
        ->whereLike('decription', '%a%')
        ->orderBy('title', 'asc')
        ->get();


    dd($data);
});
