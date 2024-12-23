<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class SendOrderCreatedNotification
{
    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        Log::info('SendOrderCreatedNotification listener handling event', [
            'order_id' => $event->order->id,
            'email' => $event->order->email,
        ]);

        try {
            Notification::route('mail', [
                $event->order->email => $event->order->full_name
            ])->notify(new OrderCreatedNotification($event->order));

            Log::info('Notification sent successfully');
        } catch (\Exception $e) {
            Log::error('Failed to send notification', [
                'error_message' => $e->getMessage(),
            ]);
        }
    }
}
