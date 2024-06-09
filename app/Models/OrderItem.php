<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    public $fillable = [
        'product_variant_id',
        'name',
        'description',
        'price',
        'quantity',
        'amount_discount',
        'amount_subtotal',
        'amount_tax',
        'amount_total',
    ];

    protected function casts(): array
    {
        return [
            'price' => MoneyCast::class,
            'amount_discount' => MoneyCast::class,
            'amount_tax' => MoneyCast::class,
            'amount_subtotal' => MoneyCast::class,
            'amount_total' => MoneyCast::class,
        ];
    }
}
