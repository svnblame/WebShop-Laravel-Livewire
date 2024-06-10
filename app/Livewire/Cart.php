<?php

namespace App\Livewire;

use App\Actions\Webshop\CreateStripeCheckoutSession;
use App\Factories\CartFactory;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Illuminate\View\View as CartView;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Cart extends Component
{
    #[Computed]
    public function cart(): Collection|\App\Models\Cart|array
    {
        return CartFactory::make()->loadMissing(['items', 'items.product', 'items.variant']);
    }

    #[Computed]
    public function items()
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

    public function render(): Factory|Application|View|CartView|ApplicationContract
    {
        return view('livewire.cart');
    }

    public function checkout(CreateStripeCheckoutSession $checkoutSession)
    {
        return $checkoutSession->createFromCart($this->cart);
    }
}
