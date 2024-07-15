<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookadminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavoritebookController;
use App\Http\Controllers\InvoiceadminController;
use App\Http\Controllers\InvoiceDetailAdminController;
use App\Models\Payment;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
        Route::get('oders',[InvoiceadminController::class, 'index'])->name('oders.index');
        Route::get('/invoices/{invoice}', [InvoiceadminController::class,'show'])->name('invoices.detail');
        Route::resource('/category', CategoryController::class);
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


        // Route::get('dashboard', function () {
        //      return view('admin.dashboard');

        //   })->name('dashboard');


    });



    Route::post('/thayDoiTrangThaiDonHang', [InvoiceadminController::class, 'thayDoiTrangThaiDonHang'])->name('thayDoiTrangThaiDonHang');
    Route::resource('/user',UserController::class);
    Route::get('/user/{user}', [UserController::class, 'detail'])->name('detail.index');

    //giỏ hàng
    Route::get('/kiemtrathanhtoan',[CartController::class, 'thanhToan'])->name('kiemtrathanhtoan');
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
    Route::post('/favorite/remove', [FavoriteBookController::class, 'remove'])->name('favoritebook.remove');
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


Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
Route::post('/invoice/store', [InvoiceController::class, 'store'])->name('invoice.store');
Route::post('/invoice', [InvoiceController::class, 'create']);
//Route::resource('/invoices', InvoiceController::class);



Route::get('/detail', function () {
    //return view('welcome');
    return view('pages.invoice-detail');
});

Route::get('slug/{slug}', function($slug){
    return Str::slug($slug);
});

// Route::get('/invoicedetail}', function () {
//     return view("pages.invoice-detail");
Route::get('/transaction-history', [InvoiceController::class, 'transactionHistory'])->name('transaction.history');
//vnpay

Route::post('/vnpay-return', [InvoiceController::class, 'vnpayReturn'])->name('vnpay_return');
Route::post('/vnpay-payment', [InvoiceController::class, 'vnpayPayment'])->name('vnpay_payment');


//payment

Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');

//cart
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');


//trang lịch sử của user
Route::get('/detail', function () {
    return view('pages.invoice-detail');
});
Route::get('/invoicedetails/{id}', [InvoiceController::class, 'show'])->name('invoicedetails');
Route::resource('/invoicedetails', InvoiceController::class);
Route::post('/invoicedetails/{id}/cancel',  [InvoiceController::class ,'cancel'])->name('cancel.order');


Route::post('/payment', [PaymentController::class, 'paymomo'])->name('payment.momo');
Route::get('/momo/return', [PaymentController::class, 'handleReturn'])->name('momo.return');