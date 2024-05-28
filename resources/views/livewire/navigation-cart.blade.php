<x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
    {{ __('Cart Items') }} ({{ $this->count }})
</x-nav-link>
