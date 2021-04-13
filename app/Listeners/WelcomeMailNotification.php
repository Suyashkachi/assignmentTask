<?php

namespace App\Listeners;

use App\Mail\WelcomeMail;
use App\Events\WelcomeMailEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class WelcomeMailNotification implements ShouldQueue
{
    public function __construct()
    {
        
    }

    public function handle(WelcomeMailEvent $event)
    {
        Mail::to($event->email)->send(new WelcomeMail($event->email));
    }
}
