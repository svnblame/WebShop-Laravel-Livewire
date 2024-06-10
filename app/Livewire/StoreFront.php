<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class StoreFront extends Component
{
    use WithPagination;

    #[Url]
    public $keywords;

    #[Computed]
    public function products(): LengthAwarePaginator
    {
        return Product::query()
            ->when($this->keywords, fn($query) => $query->where('name', 'like', "%{$this->keywords}%"))
            ->paginate(config('app.pagination.perPage'));
    }

    public function render()
    {
        return view('livewire.store-front');
    }
}
