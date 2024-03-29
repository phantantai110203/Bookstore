<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookadminController;
use App\Http\Controllers\InvoiceDetailComtroller;
use App\Http\Controllers\InvoiceDetailadminController;
use App\Http\Controllers\InvoiceadminController;
use App\Http\Controllers\FavoritebookController;
use App\Http\Controllers\InvoiceController;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use Illuminate\Support\Facades\Route;

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


//Bat buoc dang nhap
Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    //admin mới được truy cập
    Route::prefix('admin')->middleware('can:role')->group(function () {
        Route::resource('/users', UserController::class);
        Route::resource('/books', BookadminController::class);
        Route::resource('/invoices', InvoiceadminController::class);
        Route::resource('/invoicesdetail', InvoiceDetailadminController::class);
        Route::get('/print-order', 'InvoiceadminController@print_order');
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
    });
    Route::resource('/user', UserController::class);
    Route::get('/user/{user}', [UserController::class, 'detail'])->name('detail.index');

    //giỏ hàng
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'create'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/delete/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    //comment
    Route::post('/comment/{book_id}', [CommentController::class, 'create'])->name('add.comment');
    Route::put('/comments/update/{id}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/delete/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
    //yêu thích
    Route::get('/favorite', [FavoritebookController::class, 'index'])->name('favoritebook.index');
    Route::post('/favorite/add', [FavoritebookController::class, 'create'])->name('favoritebook.add');
    Route::post('/favorite/update/{id}', [FavoritebookController::class, 'update'])->name('favoritebook.update');
    Route::delete('/favorite/delete/{id}', [FavoritebookController::class, 'destroy'])->name('favoritebook.destroy');
    Route::delete('/favorite/{id}', [FavoritebookController::class, 'destroy'])->name('favoritebook.destroy');
});

//Khong can dang nhap
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/book/{book}', [HomeController::class, 'book'])->name('detail.book');
Route::get('/category/{category}', [HomeController::class, 'category'])->name('detail.category');
Route::get('/search', [HomeController::class, 'search'])->name('index.search');




Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login');
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('register', [LoginController::class, 'postregister'])->name('register');

Route::resource('/', BookController::class);

Route::fallback(function () {
    return view('pages.404');
});
Route::get('/payment', [PaymentController::class, 'index'])->name('index.payment');
Route::get('/user-show', function () {
    //return view('welcome');
    return view('pages.user-show');
});
Route::get('/invoice', function () {
    //return view('welcome');
    return view('pages.invoice');
});

Route::get('/invoice', [InvoiceController::class, 'index'])->name('index.invoice');
Route::post('/invoice/store', [InvoiceController::class, 'store'])->name('invoice.store');
