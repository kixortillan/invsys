<?php

namespace App\Listeners\Auth;

use Illuminate\Auth\Events\Registered;
use App\Notifications\Auth\UserRegistered as Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegistered
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        //
        $event->user->notify(new Notification($event->user));
    }
}
