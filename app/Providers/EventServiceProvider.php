<?php

namespace App\Providers;

use App\Models\ProductEntry;
use App\Models\ProductOutput;
use App\Observers\ProductEntryObserver;
use App\Observers\ProductOutputObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    protected $observers = [
        ProductOutput::class => [ProductOutputObserver::class],
        ProductEntry::class => [ProductEntryObserver::class],
    ];

    public function boot()
    {
    }

    public function shouldDiscoverEvents()
    {
        return false;
    }
}
