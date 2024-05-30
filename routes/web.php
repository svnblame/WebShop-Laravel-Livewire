<?php

use App\Livewire\Cart;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return redirect(route('dashboard')); });

Route::get('/dashboard', \App\Livewire\StoreFront::class)
    ->name('dashboard');

Route::get('/product/{productId}', \App\Livewire\Product::class)
    ->name('product');

Route::get('/cart', Cart ::class)
    ->name('cart');

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});
