<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Http\Controllers\{
    DashboardController as Dashboard,
    BookController as Book,
    ReviewController as Review,
    UserController as User,
    NotificationController as Notification,
    LandingController as Landing,
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

Route::name('landing.')->group(function() {
    Route::get('/', [Landing::class, 'home'])->name('home');
    Route::get('/wash-services', [Landing::class, 'servicesList'])->name('services.index');
    Route::get('/wash-services/{slug}', [Landing::class, 'servicesDetail'])->name('services.show');
    Route::get('/about-us', [Landing::class, 'about'])->name('about');
    Route::get('/contact-us', [Landing::class, 'contact'])->name('contact');
    Route::post('/message-us', [Landing::class, 'message'])->name('message');
});

Route::middleware(['auth'])->group(function() {
    Route::name('notifications.')->prefix('notifications')->group(function() {
        Route::post('/mark-all-as-read', [Notification::class, 'markAllAsRead'])->name('mark_all_as_read');
    });

    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

    Route::name('books.')->prefix('books')->group(function() {
        Route::get('/', [Book::class, 'index'])->name('index');
        Route::get('/create', [Book::class, 'create'])->name('create');
        Route::post('/store', [Book::class, 'store'])->name('store');

        Route::prefix('{id}')->group(function() {
            Route::get('/', [Book::class, 'show'])->name('show');
            Route::get('/invoice', [Book::class, 'viewInvoice'])->name('invoice');
            Route::get('/review', [Review::class, 'create'])->name('add_review');
            Route::get('/edit-state-to-cancel', [Book::class, 'editStateToCancel'])->name('edit_state_to_cancel');
            Route::post('/review', [Review::class, 'store'])->name('review');
            Route::put('/confirm', [Book::class, 'confirmNewBook'])->name('confirm');
            Route::put('/update', [Book::class, 'update'])->name('update');
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
