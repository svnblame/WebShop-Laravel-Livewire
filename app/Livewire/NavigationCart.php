<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\View\View as ViewAlias;
use Livewire\Component;

class NavigationCart extends Component
{
    public $listeners = [
        'productAddedToCart' => '$refresh',
        'productRemovedFromCart' => '$refresh',
    ];

    public function render(): Factory|Application|View|ViewAlias|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.navigation-cart');
    }

    public function getCountProperty()
    {
        return CartFactory::make()->items()->sum('quantity');
    }
}
