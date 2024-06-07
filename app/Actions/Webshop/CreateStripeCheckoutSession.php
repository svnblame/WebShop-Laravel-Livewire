<?php

namespace App\Actions\Webshop;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Database\Eloquent\Collection;

class CreateStripeCheckoutSession
{
    public function createFromCart(Cart $cart)
    {
        return $cart->user
            ->allowPromotionCodes()
            ->checkout(
                $this->formatCartItems($cart->items),
                [
                    'customer_update' => [
                        'shipping' => 'auto',
                    ],
                    'shipping_address_collection' => [
                        'allowed_countries' => ['US']
                    ],
                    'success_url' => route('checkout-status') . '?session_id={CHECKOUT_SESSION_ID}',
                    'cancel_url' => route('cart'),
                    'metadata' => [
                        'user_id' => $cart->user->id,
                        'cart_id' => $cart->id,
                    ]
                ]
            );
    }

    private function formatCartItems(Collection $cartItems): array
    {
        return $cartItems->loadMissing('product', 'variant')->map(function (CartItem $cartItem) {
            return [
                'price_data' => [
                    'currency' =>  'USD',
                    'unit_amount'  => $cartItem->product->price->getAmount(),
                    'product_data' => [
                        'name'        => $cartItem->product->name,
                        'description' => "Size: {$cartItem->variant->size} - Color: {$cartItem->variant->color}",
                        'metadata'    => [
                            'product_id'         => $cartItem->product->id,
                            'product_variant_id' => $cartItem->product_variant_id,
                        ]
                    ]
                ],
                'quantity' => $cartItem->quantity,
            ];
        })->toArray();
    }
}
