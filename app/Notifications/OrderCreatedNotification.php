<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class OrderCreatedNotification extends Notification
{
    use Queueable;

    protected Order $order;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
        Log::info('OrderCreatedNotification initialized', ['order_id' => $order->id]);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        Log::info('Generating email content for order', ['order_id' => $this->order->id]);

        return (new MailMessage)
            ->greeting('Dear '.$this->order->full_name.',')
            ->subject('New Order Received | Code '.$this->order->code)
            ->line('We are getting started on your order right away.')
            ->line('Your Order Code is '.$this->order->code)
            ->action('See Order Confirmation', $this->order->getCheckoutConfirmtionPath())
            ->line('Thank you for using our application!');
    }
}
