<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public $casts = [
        'billing_address'  => 'collection',
        'shipping_address' => 'collection',
    ];

    public $fillable = [
        'stripe_checkout_session_id',
        'amount_shipping',
        'amount_discount',
        'amount_tax',
        'amount_subtotal',
        'amount_total',
        'billing_address',
        'shipping_address',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
