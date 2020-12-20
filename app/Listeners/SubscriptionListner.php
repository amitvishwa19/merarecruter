<?php

namespace App\Listeners;

use App\User;
use App\Events\SubscriptionEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\SubscriptionSlackNotification;

class SubscriptionListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  SubscriptionEvent  $event
     * @return void
     */
    public function handle(SubscriptionEvent $event)
    {
        //app('log')->debug($event->subscriber_email);
        User::first()->notify(new SubscriptionSlackNotification($event->subscriber_email));
    }
}
