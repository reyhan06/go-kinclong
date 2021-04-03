<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Http\Controllers\{
    DashboardController as Dashboard,
    BookController as Book,
    ReviewController as Review,
    UserController as User,
};

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
    return view('welcome');
});

Route::get('/tes', function () {
    $start_at = new Carbon('2021-04-03 09:00:00');
    $end_at = new Carbon('2021-04-04 09:00:00');

    return $start_at->diffInMinutes($end_at);
});

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

    Route::name('books.')->prefix('books')->group(function() {
        Route::get('/', [Book::class, 'index'])->name('index');
        Route::get('/create', [Book::class, 'create'])->name('create');
        Route::post('/store', [Book::class, 'store'])->name('store');

        Route::prefix('{id}')->group(function() {
            Route::get('/', [Book::class, 'show'])->name('show');
            Route::get('/invoice', [Book::class, 'viewInvoice'])->name('invoice');
            Route::put('/confirm', [Book::class, 'confirmNewBook'])->name('confirm');
            Route::put('/end', [Book::class, 'end'])->name('end');
            Route::put('/cancel', [Book::class, 'cancel'])->name('cancel');
        });
    });

    Route::name('reviews.')->prefix('reviews')->group(function() {
        Route::get('/', [Review::class, 'index'])->name('index');
        Route::get('/create', [Review::class, 'create'])->name('create');
        Route::post('/store', [Review::class, 'store'])->name('store');
    });

    Route::name('users.')->prefix('users')->group(function() {
        Route::get('/', [User::class, 'index'])->name('index');
        Route::get('/create', [User::class, 'create'])->name('create');
        Route::post('/store', [User::class, 'store'])->name('store');

        Route::prefix('{username}')->group(function() {
            Route::get('/', [User::class, 'show'])->name('show');
            Route::put('/update', [User::class, 'update'])->name('update');
        });
    });
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
