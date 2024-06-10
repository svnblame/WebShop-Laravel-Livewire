<?php

use App\Livewire\Cart;
use App\Livewire\CheckoutStatus;
use App\Livewire\MyOrders;
use App\Livewire\ViewOrder;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return redirect(route('home')); });

Route::get('/home', \App\Livewire\StoreFront::class)
    ->name('home');

Route::get('/product/{productId}', \App\Livewire\Product::class)
    ->name('product');

Route::get('/cart', Cart ::class)
    ->name('cart');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/checkout-status', CheckoutStatus::class)
        ->name('checkout-status');

    Route::get('/order/{orderId}', ViewOrder::class)
        ->name('view-order');

    Route::get('/my-orders', MyOrders::class)
        ->name('my-orders');
});


Route::get('/preview', function() {
    $cart = \App\Models\User::first()->cart;

    return new \App\Mail\AbandonedCartReminder($cart);
});
