<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\ProductUpdated;
use App\Models\ProductSubscription;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ProductUpdatedNotificationMail;

class SendSubscriberEmailNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductUpdated $event): void
    {
        $subscriberIds = ProductSubscription::where('product_id', '=', $event->product->id)->pluck('user_id');
        $users = User::whereIn('id', $subscriberIds)->get();

        foreach ($users as $recipient) {
            Mail::to($recipient)->send(new ProductUpdatedNotificationMail($recipient, $event->product));
        }
    }
}
