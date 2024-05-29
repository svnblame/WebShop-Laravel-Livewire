<div class="bg-white rounded-lg shadow p-5 mt-12">
    <table class="w-full">
        <thead>
            <tr>
                <th class="text-left">Product</th>
                <th class="text-left">Quantity</th>
                <th class="text-left">Size</th>
                <th class="text-left">Color</th>
            </tr>
        </thead>
        <tbody>
            @foreach($this->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->variant->size }}</td>
                    <td>{{ $item->variant->color }}</td>
            @endforeach
        </tbody>
    </table>

</div>
