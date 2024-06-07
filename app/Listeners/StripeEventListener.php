<?php

namespace App\Listeners;

use App\Actions\Webshop\HandleCheckoutSessionCompleted;
//use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{
    /**
     * Handle the event.
     */
    public function handle(WebhookReceived $event): void
    {
        Log::info('Payload from Stripe: ', $event->payload['data']['object']['id']);

    }
}
