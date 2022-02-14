<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::middleware(['guest'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
    Route::get('/ebook/{id}', [App\Http\Controllers\EBookController::class, 'show'])->name('ebook-detail');
    Route::post('/ebook/{id}', [App\Http\Controllers\EBookController::class, 'rent'])->name('ebook-rent');
    
    Route::get('/cart', [App\Http\Controllers\OrderController::class, 'cart'])->name('cart');
    Route::post('/cart/{id}', [App\Http\Controllers\OrderController::class, 'delete'])->name('cart-delete');
    Route::post('/submitOrder', [App\Http\Controllers\OrderController::class, 'submit'])->name('submit-order');

    Route::get('/success', [App\Http\Controllers\OrderController::class, 'success'])->name('success');
    
    Route::get('/profile', [App\Http\Controllers\AccountController::class, 'profile'])->name('profile');
    Route::post('/profile', [App\Http\Controllers\AccountController::class, 'updateProfile'])->name('update-profile');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/account-maintenance', [App\Http\Controllers\AdminController::class, 'maintenance'])->name('maintenance');
    Route::get('/update-role/{id}', [App\Http\Controllers\AdminController::class, 'showRole'])->name('show-role');
    Route::post('/update-role/{id}', [App\Http\Controllers\AdminController::class, 'updateRole'])->name('update-role');
    Route::post('/delete-account/{id}', [App\Http\Controllers\AdminController::class, 'deleteAccount'])->name('delete-account'); 
});

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});