<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use App\Events\WelcomeMailEvent;
use App\Listeners\WelcomeMailNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        WelcomeMailEvent::class => [
            WelcomeMailNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
