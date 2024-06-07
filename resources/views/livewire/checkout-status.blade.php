<div class="bg-white rounded shadow mt-12 p-5 max-w-xl mx-auto">
    @if($this->order)
        <p>
            Thank you for your order!
            Your payment has been successfully received for order #{{ $this->order->id }}
        </p>
    @else
        <p wire:poll>
            Thank you! We waiting for payment confirmation.
        </p>
    @endif
</div>
