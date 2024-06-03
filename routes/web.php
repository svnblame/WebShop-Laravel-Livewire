<?php

use App\Livewire\Cart;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return redirect(route('home')); });

Route::get('/home', \App\Livewire\StoreFront::class)
    ->name('home');

Route::get('/product/{productId}', \App\Livewire\Product::class)
    ->name('product');

Route::get('/cart', Cart ::class)
    ->name('cart');

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/home', function () {
//        return view('home');
//    })->name('home');
//});
