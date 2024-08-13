<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventPersonaProvider as PersonaProvider;
use Illuminate\Support\Facades\Event;
use App\Events\PersonaSaved;
use App\Listeners\OptimizePersonaImage;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

class EventPersonaProvider extends PersonaProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PersonaSaved::class => [
            OptimizePersonaImage::class,
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
