<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Cart extends Component
{
    public function getCartProperty(): Collection|\App\Models\Cart|array
    {
        return CartFactory::make()->loadMissing(['items', 'items.product', 'items.variant']);
    }

    public function getItemsProperty()
    {
        return $this->cart->items;
    }

    public function increment($itemId): void
    {
        $this->cart->items()->find($itemId)?->increment('quantity');
    }

    public function decrement($itemId): void
    {
        $item = $this->cart->items()->find($itemId);

        if ($item->quantity > 1) $item->decrement('quantity');
    }

    public function delete($itemId): void
    {
        $this->cart->items()->where('id', $itemId)->delete();

        $this->dispatch('productRemovedFromCart');
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
