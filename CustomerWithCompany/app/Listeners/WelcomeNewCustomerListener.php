<?php

namespace App\Listeners;

use App\Providers\NewCustomerHasRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Mail\WelcomeNewUserMail;
use Illuminate\Support\Facades\Mail;


class WelcomeNewCustomerListener implements ShouldQueue 
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
     * @param  NewCustomerHasRegisteredEvent  $event
     * @return void
     */
    public function handle($event)
    {
        sleep(10);
        Mail::to($event->customer->email)->send(new WelcomeNewUserMail());
    }
}
