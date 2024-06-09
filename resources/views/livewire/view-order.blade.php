<div class="grid grid-cols-2 gap-4">
    <x-panel class="mt-12 col-span-2" title="Order Details for your order #{{ $this->order->id }}">
        <table class="w-full">
            <thead>
            <tr>
                <th class="text-left pl-2">Product</th>
                <th class="text-left pl-2">Quantity</th>
                <th class="text-right pl-2">Item Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($this->order->items as $item)
                <tr>
                    <td class="pl-2">{{ $item->name }}<br>{{ $item->description }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td class="text-right">{{ $item->amount_total }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            @if($this->order->amount_shipping->isPositive())
            <tr>
                <td colspan="2" class="text-right font-bold">Shipping</td>
                <td class="text-right font-bold">{{ $this->order->amount_shipping }}</td>
            </tr>
            @endif
            @if($this->order->amount_discount->isPositive())
            <tr>
                <td colspan="2" class="text-right font-bold">Discount</td>
                <td class="text-right font-bold">{{ $this->order->amount_discount }}</td>
            </tr>
            @endif
            <tr>
                <td colspan="2" class="text-right font-bold">Tax</td>
                <td class="text-right font-bold">{{ $this->order->amount_tax }}</td>
            </tr>
            <tr>
                <td colspan="2" class="text-right font-bold">Subtotal</td>
                <td class="text-right font-bold">{{ $this->order->amount_subtotal }}</td>
            </tr>
            <tr>
                <td colspan="2" class="text-right font-bold">Total</td>
                <td class="text-right font-bold">{{ $this->order->amount_total }}</td>
            </tr>
            </tfoot>
        </table>
    </x-panel>

    <x-panel class="col-span-1" title="Billing Information">
        @foreach($this->order->billing_address->filter() as $value)
            {{ $value }} <br>
        @endforeach
    </x-panel>

    <x-panel class="col-span-1" title="Shipping Information">
        @foreach($this->order->shipping_address->filter() as $value)
            {{ $value }} <br>
        @endforeach
    </x-panel>
</div>
